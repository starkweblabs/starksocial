# ERRORLOG.md — Stark Social Media Agency
**Project:** starksocial.com  
**Format:** newest first | Status: 🔴 Open · 🟡 In Progress · ✅ Resolved · ⚪ Won't Fix

---

## Open / Monitoring

### WRN-001 — MainWP Stream Tables Missing
**Status:** ⚪ Won't Fix (non-blocking)  
**Detected:** April 2026  
**Error:** `Warning: The following tables are not present in the WordPress database: wp_49z880xoig_mainwp_stream, wp_49z880xoig_mainwp_stream_meta`  
**Context:** Appears on every WP-CLI command. MainWP stream logging plugin installed but tables never created.  
**Impact:** None to site functionality. MainWP activity logging non-functional.  
**Resolution:** Will address in Phase 3 MainWP integration work. Tables created by re-saving MainWP Stream settings or manual `CREATE TABLE`.

---

## Resolved

### ERR-006 — Breeze 2.4.5 Fatal Error on Activation
**Status:** ✅ Resolved — April 24 2026  
**Error:** `Uncaught TypeError: array_merge(): Argument #2 must be of type array, string given in config-cache.php:507`  
**Impact:** Live site starksocial.com went down completely  
**Root Cause:** `breeze_advanced_settings` option had `breeze-exclude-urls` stored as a string `"Array\nblog/page/"` instead of an array. Breeze 2.4.5 update triggered `write_config_cache()` which called `array_merge()` on the corrupted value and crashed.  
**Fix:**
1. Renamed plugin folder to disable: `mv wp-content/plugins/breeze wp-content/plugins/breeze-disabled`
2. Installed 2.4.4: `wp plugin install breeze --version=2.4.4 --force`
3. Fixed corrupted option:
```bash
wp option update breeze_advanced_settings '{"breeze-exclude-urls":["blog/page/"],"cached-query-strings":["utm_source","utm_medium"],"breeze-wp-emoji":"1","breeze-store-googlefonts-locally":"1","breeze-store-googleanalytics-locally":"1","breeze-store-facebookpixel-locally":"1","breeze-store-gravatars-locally":"0","breeze-enable-api":"1","breeze-api-token":"iJZ8Tj60PvVjpBnLYGbrc1zgNRobfXai"}' --format=json
```
4. Activated Breeze: `wp plugin activate breeze`  
**Do not update Breeze to 2.4.5** until Cloudways patches the array_merge bug.

---

## Resolved

### ERR-005 — Cornerstone Builder Export Failure
**Status:** ✅ Resolved (by migration decision)  
**Detected:** April 2026  
**Error:** Cornerstone throws error on page export attempt — unable to extract page data  
**Context:** Attempted to export homepage for Phase 2 migration planning  
**Root Cause:** Unknown — likely internal Cornerstone serialization issue or DB corruption  
**Resolution:** Migration to GeneratePress made export moot. All CSS/JS extracted from WPCode and child theme directly.

---

### ERR-004 — Backup Cron Memory Exhaustion
**Status:** ✅ Resolved — April 2026  
**Error:** Server memory exhaustion, site instability  
**Root Cause:** Backup cron firing every 5 minutes (`*/5 * * * *`)  
**Fix:** Corrected to hourly (`0 * * * *`), `auto_backup_enabled` set to `0` in Perfex DB  
**Location:** Cloudways server 676057 / Perfex app `knaqmwdvju`

---

### ERR-003 — Perfex Email Template Broken Images
**Status:** ✅ Resolved — April 2026  
**Error:** Logo and footer bar images broken in all Perfex email templates  
**Root Cause:** 124 templates had image paths missing `/emails/` subdirectory  
**Affected images:** `stark-logo-light.png`, `email-footer-bar.png`  
**Fix:** MySQL find-and-replace via SSH using `.my.cnf` at `~/public_html/.my.cnf`  
**Correct path:** `hub.starksocial.com/media/public/custom/emails/`

---

### ERR-002 — Themesic REST API Module Crash
**Status:** ✅ Resolved — April 2026 (permanently deactivated)  
**Error:** Activating Themesic REST API v2.1.6 caused server crash; JWT auth failures  
**Root Cause:**  
- Module referenced `user_api` table; actual table is `tbluser_api`  
- Support license expired December 2024, breaking JWT validation  
**Fix:** Module permanently deactivated. Gravity Forms → Perfex integration rebuilt via custom PHP webhook at `hub.starksocial.com/webhooks/lead.php`  
**Do not reactivate this module.**

---

### ERR-001 — Gravity Forms Notification Email `<br />` Injection
**Status:** ✅ Resolved — Early 2026  
**Error:** `wpautop` injecting `<br />` tags into GF notification email bodies, breaking HTML layout  
**Affected clients:** Apple Mail dark mode, Spark  
**Fix:** `gform_pre_send_email` filter strips `<br>` variants; email templates rebuilt as div-based layouts (no tables)

---

## Performance Baseline (April 2026)

Captured before Phase 2 migration. Target scores post-migration in BUILDPLAN.md.

| Metric | Desktop | Mobile |
|---|---|---|
| Performance | 79 | 47 |
| Accessibility | 95 | 95 |
| Best Practices | 96 | 96 |
| SEO | 92 | 100 |
| FCP | 1.0s | 5.8s |
| LCP | 1.7s | 9.8s |
| TBT | 0ms | 30ms |
| CLS | 0.212 | 0.251 |
| Speed Index | 1.8s | 6.3s |

**Primary issues flagged:**
- Render-blocking requests (est. savings 375ms desktop / 3,280ms mobile)
- Legacy JavaScript (savings 32KB)
- Font display (savings 50ms desktop / 840ms mobile)
- Unused JavaScript (savings 140KB)
- Unused CSS (savings 47KB)
- Enormous network payloads (total size ~6,178KB)
