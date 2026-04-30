<?php
/**
 * Section: Identity
 * v8.10: Two-column layout — copy on left, meta box on right.
 *        Eyebrow standardized to hero size (1.15rem).
 */

declare(strict_types=1);

$client   = $config['client']   ?? [];
$identity = $config['identity'] ?? [];

if (empty($client) && empty($identity)) return;

$client_name  = $client['name']         ?? '';
$tagline      = $identity['tagline']    ?? '';
$mission      = $identity['mission']    ?? '';
$description  = $identity['description'] ?? '';

$website      = $client['website']      ?? '';
$website_url  = $client['website_url']  ?? '';
$updated      = $client['updated']      ?? '';
$founded      = $client['founded']      ?? '';
$headquarters = $client['headquarters'] ?? '';
$serving      = $client['serving']      ?? '';
?>

<section class="bs-section bs-identity" id="identity">
  <div class="bs-section__inner">
    <p class="bs-eyebrow bs-eyebrow--lg">Identity</p>

    <div class="bs-identity__grid">

      <div class="bs-identity__copy">
        <?php if ($client_name): ?>
          <h2 class="bs-h2"><?= htmlspecialchars($client_name) ?></h2>
        <?php endif; ?>

        <?php if ($tagline): ?>
          <p class="bs-tagline"><?= htmlspecialchars($tagline) ?></p>
        <?php endif; ?>

        <?php if ($mission): ?>
          <p class="bs-lede"><?= htmlspecialchars($mission) ?></p>
        <?php endif; ?>

        <?php if ($description): ?>
          <p class="bs-body"><?= htmlspecialchars($description) ?></p>
        <?php endif; ?>
      </div>

      <aside class="bs-identity__meta" aria-label="Brand information">
        <dl class="bs-meta-card">

          <?php if ($founded): ?>
            <div class="bs-meta-card__row">
              <dt>Founded</dt>
              <dd><?= htmlspecialchars($founded) ?></dd>
            </div>
          <?php endif; ?>

          <?php if ($headquarters): ?>
            <div class="bs-meta-card__row">
              <dt>Headquarters</dt>
              <dd><?= htmlspecialchars($headquarters) ?></dd>
            </div>
          <?php endif; ?>

          <?php if ($serving): ?>
            <div class="bs-meta-card__row">
              <dt>Serving</dt>
              <dd><?= htmlspecialchars($serving) ?></dd>
            </div>
          <?php endif; ?>

          <?php if ($website): ?>
            <div class="bs-meta-card__row">
              <dt>Website</dt>
              <dd>
                <?php if ($website_url): ?>
                  <a href="<?= htmlspecialchars($website_url) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($website) ?></a>
                <?php else: ?>
                  <?= htmlspecialchars($website) ?>
                <?php endif; ?>
              </dd>
            </div>
          <?php endif; ?>

          <?php if ($updated): ?>
            <div class="bs-meta-card__row">
              <dt>Updated</dt>
              <dd><?= htmlspecialchars($updated) ?></dd>
            </div>
          <?php endif; ?>

        </dl>
      </aside>

    </div>
  </div>
</section>
