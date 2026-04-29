<?php
/**
 * Section: Logos
 *
 * Renders each logo variant with a display card (light or dark background)
 * and a list of download links by format/size.
 *
 * Auto-skips render when 'logos' array is empty — drop SVGs in assets/logos/
 * and add entries to config.php under 'logos' to populate.
 *
 * Required in scope: $config
 */

declare(strict_types=1);

$logos = $config['logos'] ?? [];
if (empty($logos)) return;

if (!function_exists('bs_render_logo')) {
    function bs_render_logo(array $l): void
    {
        $bg_class = (($l['background'] ?? 'light') === 'dark') ? 'bs-logo--dark' : 'bs-logo--light';
        $svg      = $l['files']['svg'] ?? null;
        ?>
        <article class="bs-logo <?= $bg_class ?>">
          <div class="bs-logo__display">
            <?php if ($svg): ?>
              <img src="assets/logos/<?= htmlspecialchars($svg) ?>" alt="<?= htmlspecialchars($l['name']) ?>">
            <?php else: ?>
              <span class="bs-logo__placeholder">No SVG</span>
            <?php endif; ?>
          </div>
          <div class="bs-logo__body">
            <h3 class="bs-logo__name"><?= htmlspecialchars($l['name']) ?></h3>
            <?php if (!empty($l['description'])): ?>
              <p class="bs-logo__desc"><?= htmlspecialchars($l['description']) ?></p>
            <?php endif; ?>
            <ul class="bs-downloads">
              <?php if (!empty($l['files']['svg'])): ?>
                <li><a class="bs-download" href="assets/logos/<?= htmlspecialchars($l['files']['svg']) ?>" download>SVG</a></li>
              <?php endif; ?>
              <?php if (!empty($l['files']['png']) && is_array($l['files']['png'])): ?>
                <?php foreach ($l['files']['png'] as $png): ?>
                  <li><a class="bs-download" href="assets/logos/<?= htmlspecialchars($png['file']) ?>" download>PNG · <?= (int) $png['size'] ?>px</a></li>
                <?php endforeach; ?>
              <?php endif; ?>
              <?php if (!empty($l['files']['eps'])): ?>
                <li><a class="bs-download" href="assets/logos/<?= htmlspecialchars($l['files']['eps']) ?>" download>EPS</a></li>
              <?php endif; ?>
              <?php if (!empty($l['files']['pdf'])): ?>
                <li><a class="bs-download" href="assets/logos/<?= htmlspecialchars($l['files']['pdf']) ?>" download>PDF</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </article>
        <?php
    }
}
?>
<section class="bs-section" id="logos">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Logo</p>
    <h2 class="bs-h2">Logo files</h2>
    <p class="bs-section__lede">SVG is canonical — vector, scales to any size. PNGs are provided in standard widths for vendors who can't take vector. EPS/PDF available for offset print on request.</p>

    <div class="bs-logo-grid">
      <?php foreach ($logos as $l) bs_render_logo($l); ?>
    </div>
  </div>
</section>
