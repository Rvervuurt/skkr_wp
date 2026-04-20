<?php
// File path to store logs
$logFile = __DIR__ . '/script-usage.json';

// Get the Referer domain
$referer = $_SERVER['HTTP_REFERER'] ?? 'unknown';

// Get the type from the query parameter
$type = $_GET['type'] ?? 'load';

// Read current log file
$data = [];
if (file_exists($logFile)) {
    $json = file_get_contents($logFile);
    $data = json_decode($json, true) ?? [];
}

// Extract domain only
$host = parse_url($referer, PHP_URL_HOST) ?? 'unknown';

// // Skip tracking if the domain is skkr.dk
// if (str_ends_with($host, 'skkr.dk')) {
//     header('Content-Type: image/gif');
//     echo base64_decode('R0lGODlhAQABAPAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==');
//     exit;
// }

$found = false;

// Update if exists, otherwise add new
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
    $entry = [
        'domain' => $host,
        'last_seen' => date('c')
    ];
    if ($type === 'active') {
        $entry['count'] = 1;
    }
    $data[] = $entry;
}

// Save back to JSON
file_put_contents($logFile, json_encode($data, JSON_PRETTY_PRINT));

// Optional: return a 1x1 transparent GIF
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAPAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==');