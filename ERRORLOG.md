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
