<?php
/**
 * Section: Closing Page
 *
 * Final page of the brand guide. JSON-driven via $config['closing'].
 * v8.1: "Stewarded by Stark Social" → "Crafted by Stark Social".
 */

declare(strict_types=1);

$closing = $config['closing'] ?? null;
$client  = $config['client']  ?? [];

if (empty($closing)) return;

$bg_type  = $closing['background']['type']  ?? 'gradient';
$bg_value = $closing['background']['value'] ?? '#FFFFFF';

$bg_style = '';
switch ($bg_type) {
    case 'gradient':
        $bg_style = 'background: ' . $bg_value . ';';
        break;
    case 'solid':
        $bg_style = 'background-color: ' . $bg_value . ';';
        break;
    case 'image':
        $bg_style = 'background: url(\'assets/logos/' . $bg_value . '\') center/cover no-repeat;';
        break;
    case 'white':
    default:
        $bg_style = 'background: #FFFFFF;';
        break;
}

$is_dark = in_array($bg_type, ['gradient', 'image']) || ($bg_type === 'solid' && $bg_value !== '#FFFFFF' && $bg_value !== '#fff');

$text_color   = $closing['text_color']   ?? ($is_dark ? '#FFFFFF' : '#111111');
$accent_color = $closing['accent_color'] ?? '#FEDD00';

$closing_line   = $closing['closing_line']   ?? null;
$crafted_by     = $closing['crafted_by_text'] ?? 'Crafted by Stark Social';
$cta_text       = $closing['cta_text'] ?? '';

$logo_file = $closing['logo']['file'] ?? null;
$logo_max  = $closing['logo']['max_width'] ?? '90px';

$footer_bar = $closing['footer_bar'] ?? null;
?>

<section class="bs-closing<?= $is_dark ? ' bs-closing--dark' : ' bs-closing--light' ?>"
         id="closing"
         style="<?= $bg_style ?> --closing-text: <?= htmlspecialchars($text_color) ?>; --closing-accent: <?= htmlspecialchars($accent_color) ?>;">

  <div class="bs-closing__inner">

    <?php if ($logo_file): ?>
      <div class="bs-closing__logo" style="max-width: <?= htmlspecialchars($logo_max) ?>;">
        <img src="assets/logos/<?= htmlspecialchars($logo_file) ?>" alt="Stark Social">
      </div>
    <?php endif; ?>

    <p class="bs-closing__crafted-by"><?= htmlspecialchars($crafted_by) ?></p>

    <?php if ($closing_line): ?>
      <h2 class="bs-closing__line"><?= htmlspecialchars($closing_line) ?></h2>
    <?php endif; ?>

    <?php if ($cta_text): ?>
      <p class="bs-closing__cta"><?= htmlspecialchars($cta_text) ?></p>
    <?php endif; ?>

    <p class="bs-closing__url">starksocial.com</p>

  </div>

  <?php if ($footer_bar && !empty($footer_bar['color'])): ?>
    <div class="bs-closing__bar"
         style="background: <?= htmlspecialchars($footer_bar['color']) ?>;
                height: <?= htmlspecialchars($footer_bar['height'] ?? '8px') ?>;"></div>
  <?php endif; ?>
</section>
