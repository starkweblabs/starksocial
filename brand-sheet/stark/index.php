<?php
/**
 * Stark Brand Sheet — entry point.
 *
 * Reads config.php, checks active status, renders sections.
 * No database, no framework. config.php is the data store.
 */

declare(strict_types=1);

$config = require __DIR__ . '/config.php';

require_once __DIR__ . '/lib/active-check.php';

if (!stark_brand_sheet_is_active($config)) {
    require __DIR__ . '/inactive.php';
    exit;
}

$client = $config['client'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title><?= htmlspecialchars($client['name']) ?> — Brand Sheet</title>
<meta name="description" content="Brand sheet for <?= htmlspecialchars($client['name']) ?>. Logos, colors, typography, voice — for vendors, media, and partners.">
<link rel="stylesheet" href="assets/css/brand-sheet.css">
</head>
<body>

<header class="bs-bar">
  <div class="bs-bar__inner">
    <div class="bs-brand">
      <span class="bs-brand__name"><?= htmlspecialchars($client['name']) ?></span>
      <span class="bs-brand__label">Brand Sheet</span>
    </div>
    <div class="bs-meta">
      <span class="bs-meta__updated">Updated <?= htmlspecialchars($client['updated']) ?></span>
      <button type="button" class="bs-btn" onclick="window.print()">Print / Save PDF</button>
    </div>
  </div>
</header>

<main class="bs-main">
<?php foreach ($config['sections'] as $section): ?>
  <?php
    $section_path = __DIR__ . "/sections/{$section}.php";
    if (file_exists($section_path)) {
        require $section_path;
    }
  ?>
<?php endforeach; ?>
</main>

<footer class="bs-footer">
  <div class="bs-footer__inner">
    <p>Brand questions: <a href="mailto:<?= htmlspecialchars($config['contact']['brand_questions']) ?>"><?= htmlspecialchars($config['contact']['brand_questions']) ?></a></p>
    <p class="bs-footer__steward">Stewarded as part of Stark Care Pro. © <?= date('Y') ?> <?= htmlspecialchars($client['name']) ?>.</p>
  </div>
</footer>

<script src="assets/js/brand-sheet.js" defer></script>
</body>
</html>
