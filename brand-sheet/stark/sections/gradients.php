<?php
/**
 * Section: Gradients
 *
 * Two subsections:
 *   - UI / CSS gradients (used in components, buttons, sections)
 *   - Logo composition gradients (per Stark's brand standards PDF —
 *     these are color stops inside the logo lockup itself)
 *
 * Required in scope: $config
 */

declare(strict_types=1);

$gradients = $config['gradients'] ?? [];

// Back-compat: support old flat list.
$ui_gradients   = $gradients['ui']   ?? (isset($gradients[0]) ? $gradients : []);
$logo_gradients = $gradients['logo'] ?? [];

if (empty($ui_gradients) && empty($logo_gradients)) return;

if (!function_exists('bs_render_gradient')) {
    function bs_render_gradient(array $g): void
    {
        ?>
        <article class="bs-gradient">
          <div class="bs-gradient__chip" style="background: <?= htmlspecialchars($g['css']) ?>" aria-hidden="true"></div>
          <div class="bs-gradient__body">
            <h4 class="bs-gradient__name"><?= htmlspecialchars($g['name']) ?></h4>
            <button type="button" class="bs-copy bs-copy--block" data-copy="<?= htmlspecialchars($g['css']) ?>"><?= htmlspecialchars($g['css']) ?></button>
            <?php if (!empty($g['usage'])): ?>
              <p class="bs-gradient__usage"><?= htmlspecialchars($g['usage']) ?></p>
            <?php endif; ?>
          </div>
        </article>
        <?php
    }
}
?>
<section class="bs-section" id="gradients">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Gradient</p>
    <h2 class="bs-h2">Brand gradients</h2>
    <p class="bs-section__lede">Click any CSS string to copy. UI gradients are for buttons, sections, and accents. Logo gradients are composition specs for the Stark mark itself — keep these separate even when hex stops overlap.</p>

    <?php if (!empty($ui_gradients)): ?>
      <h3 class="bs-h3">UI / CSS</h3>
      <div class="bs-gradient-grid">
        <?php foreach ($ui_gradients as $g) bs_render_gradient($g); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($logo_gradients)): ?>
      <h3 class="bs-h3">Logo composition</h3>
      <div class="bs-gradient-grid">
        <?php foreach ($logo_gradients as $g) bs_render_gradient($g); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
