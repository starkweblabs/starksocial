<?php
/**
 * Section: Cover Page
 * v8.3: BRAND GUIDE label moved above logo. Meta block removed.
 *       Tagline larger. Strict left-aligned column.
 */

declare(strict_types=1);

$cover  = $config['cover']  ?? null;
$client = $config['client'] ?? [];

if (empty($cover)) return;

$bg_type  = $cover['background']['type']  ?? 'gradient';
$bg_value = $cover['background']['value'] ?? '#FFFFFF';

$bg_style = '';
switch ($bg_type) {
    case 'gradient': $bg_style = 'background: ' . $bg_value . ';'; break;
    case 'solid':    $bg_style = 'background-color: ' . $bg_value . ';'; break;
    case 'image':    $bg_style = 'background: url(\'assets/logos/' . $bg_value . '\') center/cover no-repeat;'; break;
    case 'white':
    default:         $bg_style = 'background: #FFFFFF;'; break;
}

$is_dark = in_array($bg_type, ['gradient', 'image']) || ($bg_type === 'solid' && $bg_value !== '#FFFFFF' && $bg_value !== '#fff');

$text_color   = $cover['text_color']   ?? ($is_dark ? '#FFFFFF' : '#111111');
$accent_color = $cover['accent_color'] ?? '#FEDD00';

$logo_file  = $cover['logo']['file']      ?? null;
$logo_max   = $cover['logo']['max_width'] ?? '320px';

$doc_label  = $cover['doc_type_label'] ?? 'BRAND GUIDE';

$top_bar = $cover['top_bar'] ?? null;

$client_name = $client['name'] ?? 'Brand Guide';
$tagline     = $config['identity']['tagline'] ?? '';
?>

<section class="bs-cover<?= $is_dark ? ' bs-cover--dark' : ' bs-cover--light' ?>"
         id="cover"
         style="<?= $bg_style ?> --cover-text: <?= htmlspecialchars($text_color) ?>; --cover-accent: <?= htmlspecialchars($accent_color) ?>;">

  <?php if ($top_bar && !empty($top_bar['color'])): ?>
    <div class="bs-cover__bar bs-cover__bar--top"
         style="background: <?= htmlspecialchars($top_bar['color']) ?>;
                height: <?= htmlspecialchars($top_bar['height'] ?? '8px') ?>;"></div>
  <?php endif; ?>

  <div class="bs-cover__inner">

    <p class="bs-cover__doc-label"><?= htmlspecialchars($doc_label) ?></p>

    <?php if ($logo_file): ?>
      <div class="bs-cover__logo" style="max-width: <?= htmlspecialchars($logo_max) ?>;">
        <img src="assets/logos/<?= htmlspecialchars($logo_file) ?>" alt="<?= htmlspecialchars($client_name) ?>">
      </div>
    <?php endif; ?>

    <?php if ($tagline): ?>
      <h1 class="bs-cover__tagline"><?= htmlspecialchars($tagline) ?></h1>
    <?php endif; ?>

  </div>

</section>
