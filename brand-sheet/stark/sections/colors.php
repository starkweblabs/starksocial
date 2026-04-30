<?php
/**
 * Section: Colors
 *
 * Each color renders with: dual name (Midnight Anchor), role (Dark Blue),
 * full data block (HEX/RGB/CMYK/Pantone), variable name, and usage prose.
 *
 * Tints and shades dropped April 29 2026 — modern design tools generate
 * algorithmically; print designers work from canonical Pantone/CMYK.
 */

declare(strict_types=1);

$colors = $config['colors'] ?? ['primary' => [], 'secondary' => []];

if (!function_exists('bs_format_cmyk')) {
    function bs_format_cmyk(array $cmyk): string
    {
        return 'C' . $cmyk[0] . ' M' . $cmyk[1] . ' Y' . $cmyk[2] . ' K' . $cmyk[3];
    }
}

if (!function_exists('bs_render_color')) {
    function bs_render_color(array $c): void
    {
        $hex      = $c['hex'];
        $rgb      = isset($c['rgb'])  ? 'rgb(' . implode(', ', $c['rgb']) . ')' : '';
        $cmyk     = isset($c['cmyk']) ? bs_format_cmyk($c['cmyk']) : '';
        $pantone  = $c['pantone'] ?? null;
        $variable = $c['variable'] ?? null;
        $role     = $c['role'] ?? null;
        ?>
        <article class="bs-color">
          <div class="bs-color__chip" style="background: <?= htmlspecialchars($hex) ?>" aria-hidden="true"></div>
          <div class="bs-color__body">
            <div class="bs-color__head">
              <h4 class="bs-color__name"><?= htmlspecialchars($c['name']) ?></h4>
              <?php if ($role): ?>
                <span class="bs-color__role"><?= htmlspecialchars($role) ?></span>
              <?php endif; ?>
            </div>

            <dl class="bs-color__data">
              <dt>HEX</dt>
              <dd><button type="button" class="bs-copy" data-copy="<?= htmlspecialchars($hex) ?>"><?= htmlspecialchars($hex) ?></button></dd>

              <?php if ($rgb): ?>
                <dt>RGB</dt>
                <dd><button type="button" class="bs-copy" data-copy="<?= htmlspecialchars($rgb) ?>"><?= htmlspecialchars($rgb) ?></button></dd>
              <?php endif; ?>

              <?php if ($cmyk): ?>
                <dt>CMYK</dt>
                <dd><button type="button" class="bs-copy" data-copy="<?= htmlspecialchars($cmyk) ?>"><?= htmlspecialchars($cmyk) ?></button></dd>
              <?php endif; ?>

              <?php if ($pantone): ?>
                <dt>Pantone</dt>
                <dd><button type="button" class="bs-copy" data-copy="PMS <?= htmlspecialchars($pantone) ?>">PMS <?= htmlspecialchars($pantone) ?></button></dd>
              <?php endif; ?>

              <?php if ($variable): ?>
                <dt>Variable</dt>
                <dd><button type="button" class="bs-copy" data-copy="<?= htmlspecialchars($variable) ?>"><?= htmlspecialchars($variable) ?></button></dd>
              <?php endif; ?>
            </dl>

            <?php if (!empty($c['usage'])): ?>
              <p class="bs-color__usage"><?= htmlspecialchars($c['usage']) ?></p>
            <?php endif; ?>
          </div>
        </article>
        <?php
    }
}
?>

<section class="bs-section bs-section--colors" id="colors">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Color</p>
    <h2 class="bs-h2">Brand palette</h2>
    <p class="bs-section__lede">Six colors. Each one earns its place — there's nothing here that doesn't get used. Hex, RGB, CMYK, and Pantone are canonical for press work; variables are for build. Click any value to copy.</p>

    <?php if (!empty($colors['primary'])): ?>
      <h3 class="bs-h3">Primary</h3>
      <div class="bs-color-grid">
        <?php foreach ($colors['primary'] as $c) bs_render_color($c); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($colors['secondary'])): ?>
      <h3 class="bs-h3">Secondary</h3>
      <div class="bs-color-grid">
        <?php foreach ($colors['secondary'] as $c) bs_render_color($c); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
