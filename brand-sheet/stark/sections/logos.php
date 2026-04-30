<?php
/**
 * Section: Logos / Lockups
 * v8.13: Split into two tiers — wordmarks (2-col, wide displays) and
 *        icons (3-col, square displays). Driven by 'kind' field per logo.
 */

declare(strict_types=1);

$logos = $config['logos'] ?? [];

if (empty($logos)) return;

// Partition by kind. Default to wordmark if not specified (back-compat).
$wordmarks = [];
$icons     = [];
foreach ($logos as $logo) {
    $kind = $logo['kind'] ?? 'wordmark';
    if ($kind === 'icon') {
        $icons[] = $logo;
    } else {
        $wordmarks[] = $logo;
    }
}

if (!function_exists('bs_render_logo_card')) {
    function bs_render_logo_card(array $logo): void
    {
        $name        = $logo['name']        ?? '';
        $role        = $logo['role']        ?? '';
        $description = $logo['description'] ?? '';
        $file        = $logo['file']        ?? '';
        $background  = $logo['background']  ?? 'light';
        $kind        = $logo['kind']        ?? 'wordmark';
        ?>
        <article class="bs-logo bs-logo--<?= htmlspecialchars($background) ?> bs-logo--<?= htmlspecialchars($kind) ?>">
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
        <?php
    }
}
?>

<section class="bs-section" id="logos">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Logo</p>
    <h2 class="bs-h2">Lockups</h2>
    <p class="bs-section__lede">Four variants. Each has a job. Use the dark wordmark on light backgrounds, the light wordmark on dark backgrounds, the icon as a brand mark or social avatar, and the web icon to mark sites Stark builds.</p>

    <?php if (!empty($wordmarks)): ?>
      <p class="bs-h3 bs-h3--group">Wordmarks</p>
      <div class="bs-logo-grid bs-logo-grid--wordmarks">
        <?php foreach ($wordmarks as $logo) bs_render_logo_card($logo); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($icons)): ?>
      <p class="bs-h3 bs-h3--group">Icons</p>
      <div class="bs-logo-grid bs-logo-grid--icons">
        <?php foreach ($icons as $logo) bs_render_logo_card($logo); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
