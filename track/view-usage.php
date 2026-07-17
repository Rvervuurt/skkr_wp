<?php
$logFile = __DIR__ . '/script-usage.json';

$data = [];
if (file_exists($logFile)) {
    $json = file_get_contents($logFile);
    $data = json_decode($json, true) ?? [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Script Usage Viewer</title>
    <style>
        body { font-family: sans-serif; padding: 2em; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Script Usage Log</h1>
    <table>
        <thead>
            <tr>
                <th>Domain</th>
                <th>Count</th>
                <th>Last Seen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $entry): ?>
                <tr>
                    <td><?= htmlspecialchars($entry['domain'] ?? 'unknown') ?></td>
                    <td><?= (int) ($entry['count'] ?? 0) ?></td>
                    <td><?= htmlspecialchars($entry['last_seen'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>