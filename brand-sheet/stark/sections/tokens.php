<?php
/**
 * Section: Tokens
 *
 * Renders the CSS variable system actually used in production. Each token
 * shows variable name, computed value, optional swatch (color tokens),
 * usage prose, and click-to-copy on the variable name.
 *
 * Closes with the Phase 1 → Phase 2 legacy mapping table for the rename
 * cutover. Source of truth: STYLEGUIDE.md §UI Tokens.
 */

declare(strict_types=1);

$tokens         = $config['tokens'] ?? [];
$legacy_mapping = $config['legacy_mapping'] ?? [];

if (empty($tokens) && empty($legacy_mapping)) return;

if (!function_exists('bs_render_token_row')) {
    function bs_render_token_row(array $t, bool $is_seasonal = false): void
    {
        $variable = $t['variable'] ?? '';
        $value    = $t['value'] ?? '';
        $type     = $t['type'] ?? 'text';
        $usage    = $t['usage'] ?? '';

        // For seasonal accent rows, the "variable" is the season name;
        // the actual CSS selector is html[data-stark-season="X"]
        $copy_value = $is_seasonal
            ? 'html[data-stark-season="' . $variable . '"] { --stark-accent: ' . $value . '; }'
            : $variable;

        $display_var = $is_seasonal
            ? '[data-stark-season="' . $variable . '"]'
            : $variable;
        ?>
        <div class="bs-token">
          <?php if ($type === 'color'): ?>
            <div class="bs-token__chip" style="background: <?= htmlspecialchars($value) ?>" aria-hidden="true"></div>
          <?php else: ?>
            <div class="bs-token__chip bs-token__chip--size" aria-hidden="true">
              <span class="bs-token__chip-label"><?= htmlspecialchars($value) ?></span>
            </div>
          <?php endif; ?>
          <div class="bs-token__body">
            <button type="button" class="bs-copy bs-token__var" data-copy="<?= htmlspecialchars($copy_value) ?>"><?= htmlspecialchars($display_var) ?></button>
            <span class="bs-token__value"><?= htmlspecialchars($value) ?></span>
            <?php if ($usage): ?>
              <p class="bs-token__usage"><?= htmlspecialchars($usage) ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php
    }
}
?>
<section class="bs-section" id="tokens">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Tokens</p>
    <h2 class="bs-h2">Design tokens</h2>
    <p class="bs-section__lede">The CSS variables that build every Stark surface. Click any variable name to copy. Source of truth: <code>STYLEGUIDE.md</code> in the Phase 2 repo.</p>

    <?php if (!empty($tokens['ui'])): ?>
      <h3 class="bs-h3">Functional UI</h3>
      <p class="bs-token-group__lede">Text, surface, and rule colors. The everyday tokens.</p>
      <div class="bs-token-grid">
        <?php foreach ($tokens['ui'] as $t) bs_render_token_row($t); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($tokens['accent'])): ?>
      <h3 class="bs-h3">Dynamic accent</h3>
      <p class="bs-token-group__lede">Live accent values. Default = Sky Signal at 0.85 alpha. Overridden seasonally — see below.</p>
      <div class="bs-token-grid">
        <?php foreach ($tokens['accent'] as $t) bs_render_token_row($t); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($tokens['seasons'])): ?>
      <h3 class="bs-h3">Seasonal overrides</h3>
      <p class="bs-token-group__lede">Set on <code>&lt;html data-stark-season="…"&gt;</code> at runtime. Each one overrides <code>--stark-accent</code>.</p>
      <div class="bs-token-grid">
        <?php foreach ($tokens['seasons'] as $t) bs_render_token_row($t, true); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($tokens['layout'])): ?>
      <h3 class="bs-h3">Layout</h3>
      <p class="bs-token-group__lede">Radii and max widths. Every dimensional decision lives here.</p>
      <div class="bs-token-grid">
        <?php foreach ($tokens['layout'] as $t) bs_render_token_row($t); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($legacy_mapping)): ?>
      <h3 class="bs-h3">Phase 1 → Phase 2 rename</h3>
      <p class="bs-token-group__lede">Phase 2 simplifies brand color naming. Phase 1 production CSS keeps its current names until cutover. Mapping below documents both for the transition period. Hub uses a separate <code>--ss-*</code> namespace; mapped here too.</p>
      <div class="bs-legacy-table-wrap">
        <table class="bs-legacy-table">
          <thead>
            <tr>
              <th scope="col">Phase 2 (canonical)</th>
              <th scope="col">Phase 1 — starksocial.com</th>
              <th scope="col">Phase 1 — hub.starksocial.com</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($legacy_mapping as $row): ?>
              <tr>
                <td><code><?= htmlspecialchars($row['phase_2']) ?></code></td>
                <td><code><?= htmlspecialchars($row['phase_1_marketing']) ?></code></td>
                <td><code><?= $row['phase_1_hub'] ? htmlspecialchars($row['phase_1_hub']) : '<span class="bs-legacy-na">—</span>' ?></code></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</section>
