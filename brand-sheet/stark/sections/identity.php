<?php
/**
 * Section: Identity
 *
 * Required in scope: $config
 */

declare(strict_types=1);

$identity = $config['identity'] ?? [];
$client   = $config['client'];
?>
<section class="bs-section" id="identity">
  <div class="bs-section__inner">
    <p class="bs-eyebrow">Identity</p>
    <h2 class="bs-h2"><?= htmlspecialchars($client['name']) ?></h2>

    <?php if (!empty($identity['tagline'])): ?>
      <p class="bs-tagline"><?= htmlspecialchars($identity['tagline']) ?></p>
    <?php endif; ?>

    <?php if (!empty($identity['mission'])): ?>
      <p class="bs-lede"><?= htmlspecialchars($identity['mission']) ?></p>
    <?php endif; ?>

    <?php if (!empty($identity['description'])): ?>
      <p class="bs-body"><?= htmlspecialchars($identity['description']) ?></p>
    <?php endif; ?>

    <dl class="bs-meta-list">
      <dt>Website</dt>
      <dd><a href="<?= htmlspecialchars($client['website']) ?>"><?= htmlspecialchars(parse_url($client['website'], PHP_URL_HOST) ?: $client['website']) ?></a></dd>
      <dt>Last updated</dt>
      <dd><?= htmlspecialchars($client['updated']) ?></dd>
    </dl>
  </div>
</section>
