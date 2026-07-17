<?php
/**
 * Anonymous usage counter for the Skkr embed script.
 *
 * Stores per-domain data only: domain, click count and last-seen timestamp.
 * No IPs, cookies or user agents are recorded.
 *
 * ?type=load   (default) -> refreshes last_seen for the referring domain
 * ?type=active           -> also increments the click counter
 */

$logFile = __DIR__ . '/script-usage.json';

// Get the Referer domain
$referer = $_SERVER['HTTP_REFERER'] ?? '';

// Get the type from the query parameter
$type = $_GET['type'] ?? 'load';

// Extract domain only (parse_url returns null when missing, false on failure)
$host = parse_url($referer, PHP_URL_HOST);
if (!is_string($host) || $host === '') {
    $host = 'unknown';
}

// Atomic read-modify-write with exclusive lock to prevent data loss under concurrent requests
$fp = @fopen($logFile, 'c+');
if ($fp === false) {
    error_log('skkr track: cannot open ' . $logFile . ' for writing');
} elseif (!flock($fp, LOCK_EX)) {
    error_log('skkr track: cannot lock ' . $logFile);
    fclose($fp);
} else {
    $json = stream_get_contents($fp);
    $data = json_decode($json, true);
    if (!is_array($data)) {
        if (trim((string) $json) !== '') {
            error_log('skkr track: ' . $logFile . ' contained invalid JSON, starting fresh');
        }
        $data = [];
    }

    $found = false;
    foreach ($data as &$entry) {
        if (($entry['domain'] ?? null) === $host) {
            $entry['last_seen'] = date('c');
            $entry['count'] = ($entry['count'] ?? 0) + ($type === 'active' ? 1 : 0);
            $found = true;
            break;
        }
    }
    unset($entry);

    if (!$found) {
        $data[] = [
            'domain'    => $host,
            'last_seen' => date('c'),
            'count'     => $type === 'active' ? 1 : 0,
        ];
    }

    ftruncate($fp, 0);
    rewind($fp);
    if (fwrite($fp, json_encode($data, JSON_PRETTY_PRINT)) === false) {
        error_log('skkr track: failed writing ' . $logFile);
    }
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
}

// Return a 1x1 transparent GIF so the tracking pixel resolves cleanly
header('Content-Type: image/gif');
header('Cache-Control: no-store, no-cache, must-revalidate');
echo base64_decode('R0lGODlhAQABAPAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==');
