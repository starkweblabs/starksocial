<?php
/**
 * Section: Colors
 *
 * Each color renders with its True swatch + full data (HEX/RGB/CMYK/Pantone),
 * usage, and a family row of 5 chips (Shade+2, Shade+1, True, Tint+1, Tint+2)
 * with hover tooltips and click-to-copy.
 *
 * Required in scope: $config
 */

declare(strict_types=1);

$colors = $config['colors'] ?? ['primary' => [], 'secondary' => []];

if (!function_exists('bs_format_cmyk')) {
    function bs_format_cmyk(array $cmyk): string
    {
        return 'C' . $cmyk[0] . ' M' . $cmyk[1] . ' Y' . $cmyk[2] . ' K' . $cmyk[3];
    }
}

if (!function_exists('bs_render_family_chip')) {
    function bs_render_family_chip(array $variant, bool $is_true = false): void
    {
        $name    = $variant['name'] ?? '';
        $hex     = $variant['hex']  ?? '';
        $pantone = $variant['pantone'] ?? null;
        $tooltip = $name . ' · ' . $hex . ($pantone ? ' · PMS ' . $pantone : '');

        $cls = 'bs-family__chip' . ($is_true ? ' is-true' : '');

        // Short label below the chip
        $short = $is_true ? 'True' : (
            str_starts_with($name, 'Shade')
                ? 'Sh' . substr($name, -2)   // "Sh+1" / "Sh+2"
                : 'T' . substr($name, -2)    // "T+1" / "T+2"
        );
        ?>
        <div class="bs-family__cell<?= $is_true ? ' bs-family__cell--true' : '' ?>">
          <button type="button"
                  class="<?= $cls ?>"
                  style="background: <?= htmlspecialchars($hex) ?>"
                  title="<?= htmlspecialchars($tooltip) ?>"
                  aria-label="Copy <?= htmlspecialchars($tooltip) ?>"
                  data-copy="<?= htmlspecialchars($hex) ?>"></button>
          <span class="bs-family__var"><?= htmlspecialchars($short) ?></span>
        </div>
        <?php
    }
}

if (!function_exists('bs_render_color')) {
    function bs_render_color(array $c): void
    {
        $hex     = $c['hex'];
        $rgb     = isset($c['rgb'])  ? 'rgb(' . implode(', ', $c['rgb']) . ')' : '';
        $cmyk    = isset($c['cmyk']) ? bs_format_cmyk($c['cmyk']) : '';
        $pantone = $c['pantone'] ?? null;

        // Build family in display order: Shade+2, Shade+1, True, Tint+1, Tint+2
        $shades = $c['shades'] ?? [];
        $tints  = $c['tints']  ?? [];
        ?>
        <article class="bs-color">
          <div class="bs-color__chip" style="background: <?= htmlspecialchars($hex) ?>" aria-hidden="true"></div>
          <div class="bs-color__body">
            <h4 class="bs-color__name"><?= htmlspecialchars($c['name']) ?></h4>
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
            </dl>

            <?php if (!empty($c['usage'])): ?>
              <p class="bs-color__usage"><?= htmlspecialchars($c['usage']) ?></p>
            <?php endif; ?>

            <?php if ($shades || $tints): ?>
              <div class="bs-family">
                <p class="bs-family__label">Family — darker to lighter</p>
                <div class="bs-family__row">
                  <?php
                    // Shade +2, Shade +1 (PDF lists them shallowest first; reverse for darkest-left)
                    foreach (array_reverse($shades) as $s) bs_render_family_chip($s);
                    // True
                    bs_render_family_chip([
                        'name'    => 'True',
                        'hex'     => $c['hex'],
                        'pantone' => $c['pantone'] ?? null,
                    ], true);
                    // Tint +1, Tint +2
                    foreach ($tints as $t) bs_render_family_chip($t);
                  ?>
                </div>
              </div>
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
    <p class="bs-section__lede">Hex, RGB, CMYK, and Pantone values are all canonical — pulled from Stark's brand standards. Click any value to copy. Each color has a tint/shade family beneath it; hover any chip for full details, click to copy the hex.</p>

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
