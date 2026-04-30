<?php
/**
 * Stark Brand Guide — orchestrator
 * v8.3: Top bar gets dynamic class for transparency over cover.
 *       Site footer removed (now lives inside closing page on blue).
 */

declare(strict_types=1);

require_once __DIR__ . '/lib/active-check.php';

$config = require __DIR__ . '/config.php';

if (empty($config['client']['active'])) {
    require __DIR__ . '/inactive.php';
    exit;
}

$client_name = $config['client']['name']      ?? 'Brand Guide';
$short_name  = $config['client']['short_name'] ?? $client_name;
$updated     = $config['client']['updated']    ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars($client_name) ?> Brand Guide — colors, typography, logos, voice, and design tokens.">
  <title><?= htmlspecialchars($client_name) ?> — Brand Guide</title>
  <link rel="stylesheet" href="assets/css/brand-sheet.css">
</head>
<body>

  <header class="bs-bar bs-bar--over-cover" id="bs-bar">
    <div class="bs-bar__inner">
      <div class="bs-brand">
        <span class="bs-brand__name"><?= htmlspecialchars($short_name) ?></span>
        <span class="bs-brand__label">Brand Guide</span>
      </div>
      <div class="bs-meta">
        <?php if ($updated): ?>
          <span class="bs-meta__updated">Updated <?= htmlspecialchars($updated) ?></span>
        <?php endif; ?>
        <button class="bs-btn" onclick="window.print()">Print / Save PDF</button>
      </div>
    </div>
  </header>

  <main class="bs-main">
    <?php
      $sections = $config['sections'] ?? [];
      foreach ($sections as $section_name) {
          $section_file = __DIR__ . '/sections/' . $section_name . '.php';
          if (file_exists($section_file)) {
              include $section_file;
          }
      }
    ?>
  </main>

  <script src="assets/js/brand-sheet.js"></script>
  <script>
    // Top bar transparency over cover, frosted glass on scroll
    (function() {
      const bar = document.getElementById('bs-bar');
      const cover = document.getElementById('cover');
      if (!bar || !cover) return;

      function updateBar() {
        const coverBottom = cover.getBoundingClientRect().bottom;
        // Switch to frosted state once we've scrolled past the cover
        if (coverBottom <= 60) {
          bar.classList.remove('bs-bar--over-cover');
          bar.classList.add('bs-bar--frosted');
        } else {
          bar.classList.add('bs-bar--over-cover');
          bar.classList.remove('bs-bar--frosted');
        }
      }

      updateBar();
      window.addEventListener('scroll', updateBar, { passive: true });
      window.addEventListener('resize', updateBar, { passive: true });
    })();
  </script>
</body>
</html>
