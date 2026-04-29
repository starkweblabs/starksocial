<?php
/**
 * Shown when client['active'] is false (Care Pro lapsed or cancelled).
 *
 * Required: $config in scope (set by index.php before this is required).
 */

declare(strict_types=1);

$client = $config['client'] ?? ['name' => 'this client'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Brand Sheet — Unavailable</title>
<link rel="stylesheet" href="assets/css/brand-sheet.css">
</head>
<body class="bs-inactive">
  <div class="bs-inactive__card">
    <h1>Brand sheet unavailable</h1>
    <p>The brand sheet for <strong><?= htmlspecialchars($client['name']) ?></strong> is not currently being maintained as part of an active Stark Care Pro retainer.</p>
    <p>For brand asset questions, contact <a href="mailto:hello@starksocial.com">hello@starksocial.com</a>.</p>
  </div>
</body>
</html>
