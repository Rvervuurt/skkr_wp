<?php
$logFile = __DIR__ . '/script-usage.json';

$data = [];
if (file_exists($logFile)) {
    $json = file_get_contents($logFile);
    $data = json_decode($json, true) ?? [];
}

// Newest activity first
usort($data, function ($a, $b) {
    return strcmp($b['last_seen'] ?? '', $a['last_seen'] ?? '');
});

// Domains with clicks are real installs; load-only entries are mostly
// referrer spam and crawlers executing the script (they never click).
$withClicks = array_filter($data, fn($e) => ($e['count'] ?? 0) > 0);
$loadOnly   = array_filter($data, fn($e) => ($e['count'] ?? 0) === 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Script Usage Viewer</title>
    <style>
        body { font-family: sans-serif; padding: 2em; max-width: 60em; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        details { margin-top: 2.5em; }
        summary { cursor: pointer; color: #666; }
        details table { margin-top: 1em; }
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
            <?php foreach ($withClicks as $entry): ?>
                <tr>
                    <td><?= htmlspecialchars($entry['domain'] ?? 'unknown') ?></td>
                    <td><?= (int) ($entry['count'] ?? 0) ?></td>
                    <td><?= htmlspecialchars($entry['last_seen'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <details>
        <summary>Load pings without clicks — likely bots, crawlers and referrer spam (<?= count($loadOnly) ?>)</summary>
        <table>
            <thead>
                <tr>
                    <th>Domain</th>
                    <th>Last Seen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loadOnly as $entry): ?>
                    <tr>
                        <td><?= htmlspecialchars($entry['domain'] ?? 'unknown') ?></td>
                        <td><?= htmlspecialchars($entry['last_seen'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </details>
</body>
</html>
