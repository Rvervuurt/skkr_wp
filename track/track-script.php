<?php
// File path to store logs
$logFile = __DIR__ . '/script-usage.json';

// Get the Referer domain
$referer = $_SERVER['HTTP_REFERER'] ?? 'unknown';

// Get the type from the query parameter
$type = $_GET['type'] ?? 'load';

// Extract domain only
$host = parse_url($referer, PHP_URL_HOST) ?? 'unknown';

// Atomic read-modify-write with exclusive lock to prevent data loss under concurrent requests
$fp = fopen($logFile, 'c+');
if ($fp && flock($fp, LOCK_EX)) {
    $json = stream_get_contents($fp);
    $data = json_decode($json, true);
    if (!is_array($data)) {
        $data = [];
    }

    $found = false;
    foreach ($data as &$entry) {
        if ($entry['domain'] === $host) {
            if ($type === 'active') {
                $entry['count'] = ($entry['count'] ?? 0) + 1;
                $entry['last_seen'] = date('c');
            }
            $found = true;
            break;
        }
    }
    unset($entry);

    if (!$found) {
        $entry = ['domain' => $host, 'last_seen' => date('c')];
        if ($type === 'active') {
            $entry['count'] = 1;
        }
        $data[] = $entry;
    }

    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
    flock($fp, LOCK_UN);
    fclose($fp);
}

// Optional: return a 1x1 transparent GIF
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAPAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==');