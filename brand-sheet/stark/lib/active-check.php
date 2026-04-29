<?php
/**
 * Active-status check for the brand sheet.
 *
 * For now: reads the 'active' flag from config. When the Care Pro retainer
 * lapses, this flag flips to false and inactive.php is served instead.
 *
 * Future: webhook receiver (webhook.php) that Perfex Hub calls when a
 * Care Pro contract status changes. The webhook will rewrite the 'active'
 * value in config.php directly. Auth via shared secret + HMAC signature.
 *
 * Direction is push (Perfex → brand sheet). Open question: where does the
 * shared secret live? Per-client constant in config? Single env var?
 */

declare(strict_types=1);

function stark_brand_sheet_is_active(array $config): bool
{
    return !empty($config['client']['active']);
}
