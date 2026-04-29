<?php
/**
 * Section: Typography
 *
 * Renders each font family with weight specimens, plus the type scale.
 * Required in scope: $config
 */

declare(strict_types=1);

$typography = $config['typography'] ?? [];
if (empty($typography)) return;

$fonts = $typography['fonts'] ?? [];
$scale = $typography['scale'] ?? [];
?>
<section class="bs-section" id="typography">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Typography</p>
    <h2 class="bs-h2">Type system</h2>
    <p class="bs-section__lede">Self-hosted woff2 — no Google Fonts CDN, no FOIT. License is SIL Open Font, free for commercial use including offset and merch.</p>

    <?php foreach ($fonts as $font): ?>
      <article class="bs-font" style="font-family: '<?= htmlspecialchars($font['name']) ?>', system-ui, sans-serif">
        <header class="bs-font__head">
          <h3 class="bs-font__name"><?= htmlspecialchars($font['name']) ?></h3>
          <p class="bs-font__role"><?= htmlspecialchars($font['role']) ?> — <?= htmlspecialchars($font['usage']) ?></p>
          <p class="bs-font__meta">
            <?= htmlspecialchars($font['license']) ?>
            <?php if (!empty($font['source'])): ?>
              · <a href="<?= htmlspecialchars($font['source']) ?>" target="_blank" rel="noopener">Source</a>
            <?php endif; ?>
          </p>
        </header>

        <div class="bs-weights">
          <?php foreach ($font['weights'] as $w): ?>
            <div class="bs-weight">
              <span class="bs-weight__sample" style="font-weight: <?= (int) $w['weight'] ?>">Aa</span>
              <span class="bs-weight__num"><?= (int) $w['weight'] ?></span>
              <span class="bs-weight__name"><?= htmlspecialchars($w['name']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </article>
    <?php endforeach; ?>

    <?php if (!empty($scale)): ?>
      <h3 class="bs-h3">Type scale</h3>
      <div class="bs-scale">
        <?php foreach ($scale as $s):
          $family = (($s['family'] ?? '') === 'condensed') ? 'Barlow Condensed' : 'Barlow';
          $upper  = !empty($s['uppercase']) ? 'text-transform: uppercase;' : '';
          $sample_style = sprintf(
              "font-family: '%s', sans-serif; font-size: %s; font-weight: %d; letter-spacing: %s; %s",
              htmlspecialchars($family),
              htmlspecialchars($s['size']),
              (int) $s['weight'],
              htmlspecialchars($s['letter_spacing']),
              $upper
          );
        ?>
          <div class="bs-scale__row">
            <div class="bs-scale__sample" style="<?= $sample_style ?>">
              <?= htmlspecialchars($s['sample']) ?>
            </div>
            <div class="bs-scale__meta">
              <strong><?= htmlspecialchars($s['name']) ?></strong>
              <span><?= htmlspecialchars($s['size']) ?></span>
              <span>Weight <?= (int) $s['weight'] ?> · LS <?= htmlspecialchars($s['letter_spacing']) ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
