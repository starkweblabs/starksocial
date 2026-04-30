<?php
/**
 * Section: Logos
 *
 * Renders each logo on a background appropriate to its variant.
 * Light-on-dark variants get dark backgrounds; everything else gets white.
 */

declare(strict_types=1);

$logos = $config['logos'] ?? [];

if (empty($logos)) return;
?>

<section class="bs-section" id="logos">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Logo</p>
    <h2 class="bs-h2">Lockups</h2>
    <p class="bs-section__lede">Four variants. Each has a job. Use the dark wordmark on light backgrounds, the light wordmark on dark backgrounds, the icon as a brand mark or social avatar, and the web icon to mark sites Stark builds.</p>

    <div class="bs-logo-grid">
      <?php foreach ($logos as $logo): ?>
        <?php
          $name        = $logo['name'] ?? '';
          $role        = $logo['role'] ?? '';
          $description = $logo['description'] ?? '';
          $file        = $logo['file'] ?? '';
          $background  = $logo['background'] ?? 'light';
        ?>
        <article class="bs-logo bs-logo--<?= htmlspecialchars($background) ?>">
          <div class="bs-logo__display">
            <?php if ($file): ?>
              <img src="assets/logos/<?= htmlspecialchars($file) ?>" alt="<?= htmlspecialchars($name) ?>">
            <?php else: ?>
              <span class="bs-logo__placeholder">No file</span>
            <?php endif; ?>
          </div>
          <div class="bs-logo__body">
            <div class="bs-logo__head">
              <h4 class="bs-logo__name"><?= htmlspecialchars($name) ?></h4>
              <?php if ($role): ?>
                <span class="bs-logo__role"><?= htmlspecialchars($role) ?></span>
              <?php endif; ?>
            </div>
            <?php if ($description): ?>
              <p class="bs-logo__desc"><?= htmlspecialchars($description) ?></p>
            <?php endif; ?>
            <?php if ($file): ?>
              <a class="bs-download" href="assets/logos/<?= htmlspecialchars($file) ?>" download>Download SVG</a>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
