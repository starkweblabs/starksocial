# BUILDPLAN.md — Stark Social Media Agency
**Project:** starksocial.com Phase 2 Rebuild  
**Last Updated:** April 2026  
**Status:** 🟡 In Planning — Migration Decision Made

---

## Strategic Decision

**Migrating from Themeco Pro/X + Cornerstone → GeneratePress Premium + Gutenberg/GenerateBlocks**

### Why
- Current mobile PageSpeed: **47** / LCP: **9.8s** (platform ceiling, not tunable)
- Desktop: 79 — hardware masking builder bloat (149KB unused JS, 6,178KB total payload)
- Cornerstone export broken — cannot extract content cleanly
- All visual CSS is already written and fully portable (~2,000 lines in WPCode global CSS)
- Phase 2 is a redesign anyway — staging move = natural migration window

### What Stays
- All custom PHP in `functions.php` (Podcast CPT, Podlove, shortcodes, security headers)
- All plugin logic: Gravity Forms → Perfex CRM webhook, SearchWP, BetterDocs, FacetWP
- Portfolio CPT structure + ACF Pro fields
- Barlow font stack (self-hosted WOFF2 already in child theme)

### What Changes
- Theme: Pro/X → GeneratePress Premium
- Builder: Cornerstone → GenerateBlocks (or native Gutenberg + custom patterns)
- SEO: AIOSEO (5 addons) → RankMath Pro (Phase 2, installed fresh on staging)
- CSS delivery: WPCode global → child theme `style.css` + page-specific CSS via `wp_enqueue_scripts`

---

## Stack

| Layer | Current | Phase 2 |
|---|---|---|
| Theme | Themeco Pro/X | GeneratePress Premium |
| Builder | Cornerstone | GenerateBlocks + Gutenberg |
| CSS | WPCode global + per-page | Child theme + enqueued page CSS |
| SEO | AIOSEO + 5 addons | RankMath Pro (fresh install, AIOSEO data imported) |
| Forms | Gravity Forms | Gravity Forms (keep) |
| CRM | Perfex Hub (custom webhook) | Perfex Hub (keep) |
| Caching | Breeze + Object Cache Pro | Breeze + Object Cache Pro (keep) |
| Search | SearchWP + 3 addons | SearchWP (keep) |
| Docs | BetterDocs Pro + SearchWP | BetterDocs Pro (keep) |
| Hosting | Cloudways | Cloudways (keep) |

---

## Page Inventory (22 pages + 4 templates)

### Core (Priority 1)
- [ ] Home (`/`)
- [ ] About (`/about/`)
- [ ] Contact (`/contact/`)
- [ ] Services Hub (`/services/`)

### Services (Priority 2)
- [ ] Social Media Management (`/social-media-management/`)
- [ ] Paid Social Advertising (`/paid-advertising/`)
- [ ] Web Design (`/web-design/`)
- [ ] SEO (`/seo/`)
- [ ] Content Creation (`/content-creation/`)
- [ ] Brand Strategy & Identity (`/brand-strategy-identity/`)
- [ ] Digital Marketing Audit & Consulting (`/audit-consulting/`) — **NEW**
- [ ] Fractional CMO (`/fractional-cmo/`) — **NEW**

### Portfolio (Priority 2 — NEW in Phase 2)
- [ ] Portfolio archive (`/portfolio/`)
- [ ] Portfolio single (CPT template)
- [ ] Portfolio CPT fields (ACF Pro — already defined)

### Blog & Podcast
- [ ] Blog archive (`/blog/`)
- [ ] Blog single post template
- [ ] Podcast archive (`/podcast/`)
- [ ] Podcast single template

### Support
- [ ] Support hub (`/support/`)
- [ ] Knowledgebase (`/knowledgebase/`) — BetterDocs

### Author Pages
- [ ] Nathan Imhoff (`/author/nathan-imhoff/`)
- [ ] Deanna L. Miller (`/author/deanna-l-miller/`)

### Utility
- [ ] 404 (`/404-error/`)
- [ ] Search Results
- [ ] Password Generator (`/password-generator/`)

### Legal (copy-forward)
- [ ] Privacy Policy
- [ ] Terms of Service
- [ ] Cookie Policy
- [ ] Accessibility Statement

---

## Phase 2 Build Phases

### Phase 2.0 — Environment Setup
- [x] Set up GitHub repo for project docs
- [x] Migration decision made (GeneratePress)
- [ ] Fresh WordPress install on staging (`staging.starksocial.com`)
- [ ] Install GeneratePress Premium + GenerateBlocks Pro
- [ ] Install RankMath Pro (fresh — no AIOSEO import needed on staging)
- [ ] Install Gravity Forms + existing license
- [ ] Install ACF Pro
- [ ] Port `functions.php` to new child theme
- [ ] Port global CSS to child theme `style.css`
- [ ] Port global + page JS to enqueued scripts
- [ ] Disable Redis on staging (`WP_REDIS_DISABLED = true`)
- [ ] Disable Gravity Forms → Perfex webhook on staging
- [ ] Verify nav: transparent → frosted glass transition
- [ ] Verify mega menu (desktop) + accordion (mobile)

### Phase 2.1 — Core Pages
- [ ] Home
- [ ] About
- [ ] Contact
- [ ] Services hub

### Phase 2.2 — Service Pages
- [ ] All 8 service pages (shared template, unique content)
- [ ] New: Digital Marketing Audit & Consulting page
- [ ] New: Fractional CMO page

### Phase 2.3 — Portfolio
- [ ] Portfolio CPT + ACF fields audit
- [ ] Portfolio archive page
- [ ] Portfolio single template (case study layout: hero, carousel, 3-stat row, overview/challenge/solution/results, project details sidebar, prev/next)
- [ ] Migrate existing case studies
- [ ] Mockup assets: supplied by Nathan, assembled in Build chat
- [ ] Case study copy: Claude — Copy/Voice chat
- [ ] Portfolio SEO + schema: Claude — SEO chat

### Phase 2.4 — Blog & Podcast
- [ ] Blog archive template
- [ ] Blog single post template (carry existing Stark blog CSS patterns)
- [ ] Podcast archive
- [ ] Podcast single (Podlove integration test)

### Phase 2.5 — Support & Utility
- [ ] Support hub
- [ ] Knowledgebase (BetterDocs re-integration)
- [ ] 404, Search Results, Password Generator
- [ ] Author page templates

### Phase 2.6 — Legal
- [ ] Copy-forward all 4 legal pages
- [ ] Verify Complianz GDPR cookie banner placement

### Phase 2.7 — QA & Launch
- [ ] PageSpeed audit (target: desktop 95+, mobile 85+)
- [ ] Core Web Vitals — all green
- [ ] Cross-browser + device testing
- [ ] Accessibility audit (target: 98+)
- [ ] RankMath SEO score 90+ per page
- [ ] Schema validation — zero errors
- [ ] Local SEO landing pages verified
- [ ] DNS cutover from staging to production
- [ ] Post-launch monitoring

---

## Workstream Ownership

| Chat | Name | Scope |
|---|---|---|
| `Stark — Build` | Build | GeneratePress, templates, CSS, PHP, components, nav |
| `Stark — SEO` | SEO & Local | RankMath, local landing pages, schema, keyword mapping |
| `Stark — Copy` | Copy & Voice | Voice guide, page copy, service pages, local messaging |
| `Stark — Blog` | Blog | Audit existing posts, cull, refresh, 2026 content calendar |
| `Stark — QA` | QA | PageSpeed, accessibility, schema validation, cross-browser |

**Portfolio ownership:** Template (Build) + Copy (Copy) + Schema (SEO) — coordinated via .md files  
**Nathan's role:** Project Director — decisions, approvals, cross-chat coordination  
Each chat starts with the standard START-PROMPT pulling all `.md` files from GitHub.  
Each chat logs completed work to CHANGELOG.md, errors to ERRORLOG.md, and checks off BUILDPLAN.md at session end.

---

## Phase 3 (Future)

### Phase 3.1 — Stark Social Ongoing
- Drip campaigns via Perfex CRM for client services
- MainWP full integration + client site reporting
- Navigation/menu refinement based on analytics
- Performance push (target: mobile 90+)
- Wincher rank tracking review + content gap fill

### Phase 3.2 — Stark Hosting (Separate Website)
**Scope:** Standalone hosting brand built on Cloudways reseller (Cloudways Agency)

**What it offers:**
- Domain registration
- Business email hosting
- Managed WordPress hosting (white-labeled Cloudways)
- Unmanaged hosting options

**Structure:**
- Separate brand and domain (TBD — not Stark Social)
- Separate WordPress site, separate Cloudways app
- Cross-promoted on `starksocial.com` as a partner service
- Billing/client management: integrate with Perfex Hub or dedicated billing platform (WHMCS or Blesta)

**Tech stack (planned):**
- Cloudways Agency reseller account
- WHMCS or Blesta for client billing + provisioning
- Domain registration via OpenSRS or Enom reseller API
- Email hosting via Zoho Mail reseller or similar

**Advertising on Stark Social:**
- Service card on homepage "stack" section
- Dedicated page: `starksocial.com/hosting/`
- Footer link
- Blog content: "Why hosting matters for your business"

**Do not start until Phase 2 is live.**

---

## Navigation Structure (Locked)

**Desktop:** Transparent on load → slim frosted glass on scroll  
**Mobile:** Same transition, burger → full screen dark glass overlay

**Primary nav (5 items):**
- Work (portfolio)
- Services (mega menu, 2x4 grid)
- Blog
- Podcast
- Contact

**Services mega menu:**
```
Social Media Mgmt     Paid Advertising
Web Design            SEO
Content Creation      Brand Strategy
Audit & Consulting    Fractional CMO
[View All Services →]
```

**Utility (top right):** Support · Client Portal  
**Mobile services:** Accordion expand inline (no separate screen, no Back button)

---

## Key URLs & Infrastructure

- **Live site:** `starksocial.com`
- **Staging:** `staging.starksocial.com`
- **Perfex Hub:** `hub.starksocial.com`
- **MainWP:** `cpanel.starksocial.com`
- **Cloudways Server:** 676057
- **Perfex App ID:** `knaqmwdvju`
- **Staging App ID:** `rctcpyewsk`
- **Gravity Forms → Perfex webhook:** `hub.starksocial.com/webhooks/lead.php`
- **Webhook secret:** stored in `wp-config.php`
- **GitHub:** `github.com/starkweblabs/starksocial`

---

## Notes

- `wp_49z880xoig_mainwp_stream` tables missing in WP DB — MainWP stream plugin tables not yet created; non-blocking warning
- BetterDocs: all default styles are dequeued in `functions.php`; custom styling in global CSS
- Gravity Forms: all default styles dequeued; custom styling in global CSS
- Podcast scripts conditionally loaded only on podcast pages (already optimized)
- Blog rewrites: `/blog/` and `/blog/page/N/` handled via `add_rewrite_rule` in `functions.php`
- Podlove DB tables: `wp_podlove_episode` — queried directly in `starkpodmeta` shortcode
# CHANGELOG.md — Stark Social Media Agency
**Project:** starksocial.com  
**Format:** newest first

---

## [Unreleased] — Phase 2 Planning

### Decided
- Migrate from Themeco Pro/X + Cornerstone to GeneratePress Premium
- Reason: Mobile PageSpeed 47, LCP 9.8s — platform ceiling confirmed, not tunable
- All custom CSS confirmed portable (global CSS ~2,000 lines in WPCode)
- All custom JS confirmed portable (seasonal accents, scroll progress, reveal, tilt)
- `functions.php` confirmed portable — no Themeco dependencies except enqueue helper

### Planned
- Move current site to staging
- Begin GeneratePress build on production
- Add Portfolio CPT (new in Phase 2)

---

## [1.2.4] — April 2026

### Fixed
- Gravity Forms → Perfex CRM lead integration rebuilt via custom PHP webhook
  - Endpoint: `hub.starksocial.com/webhooks/lead.php`
  - Auth: `X-Webhook-Secret: starksocial_gf_2026`
  - Replaces broken Themesic REST API module permanently
- Backup cron corrected from `*/5 * * * *` → `0 * * * *` (was exhausting server memory)
- Perfex email template image paths fixed (124 templates, MySQL find-and-replace via SSH)
  - Images: `stark-logo-light.png`, `email-footer-bar.png`
  - Path: `hub.starksocial.com/media/public/custom/emails/`
- Gravity Forms email templates rebuilt (div-based, no tables)
  - Resolves: Apple Mail dark mode, `wpautop` `<br />` injection, Spark rendering

### Infrastructure
- Themesic REST API module v2.1.6 permanently deactivated
  - Config referenced non-existent table (`user_api` vs `tbluser_api`)
  - License expired December 2024, JWT failures
  - Activating module caused server crash
- Signature generator deployed: `hub.starksocial.com/internal/signature-generator.html`
- CSUN signature variant built as downloadable file
- Stark Social interactive style guide built from `custom.css`

---

## [1.2.3] — Early 2026

### Added
- Seasonal accent system (`data-stark-season` attribute + CSS variables)
- Scroll velocity CSS variable (`--stark-vel`) for progress bar glow effect
- Reveal animation system (`.stark-reveal` + IntersectionObserver)
- Tilt effect (`.stark-tilt` + mousemove handler)
- Accessibility button (`.stark-a11y-btn`) with scroll-driven left offset
- Back-to-top button redesign (CSS chevron, `starkChevronNudge` animation)
- `starkpodmeta` shortcode for podcast episode metadata
- Podlove DB prune cron (`nate_prune_db_event`, weekly)
- Weekly AIOSEO cache + BetterDocs search log truncation

### Fixed
- BetterDocs breadcrumb URL: `/docs/` → `/support/knowledgebase/`
- Podcast scripts/MediaElement conditionally dequeued on non-podcast pages
- `gform_pre_send_email` filter strips `<br />` from notification bodies

---

## [1.1.0] — 2025

### Added
- Gravity Forms Mailgun addon
- FacetWP for portfolio filtering
- SearchWP + BetterDocs integration
- Google Site Kit
- Stark Site Toolkit custom plugin (v1.2.4)
- WPCode Premium for global CSS/JS injection
- Password Generator page + shortcode (`[password_generator]`)
- Complianz GDPR Premium cookie management
- Cookie banner centered horizontally (overrides default bottom-right position)

### Infrastructure
- Object Cache Pro activated
- Breeze caching configured
- Cloudflare Enterprise handling HTTPS redirects (not PHP)
- Security headers added: `X-Content-Type-Options`, `X-Frame-Options`, `X-XSS-Protection`, `HSTS`
- WP generator tag removed, XMLRPC disabled

---

## [1.0.0] — Initial Build

### Established
- Themeco Pro/X parent + Stark Social child theme
- Barlow + Barlow Condensed (self-hosted WOFF2, `/fonts/`)
- Podcast CPT (`/podcast/`) + Podlove Podcasting Plugin
- Blog at `/blog/` with custom rewrite rules
- AIOSEO Pro + EEAT, Image SEO, Index Now, Local Business addons
- BetterDocs Pro knowledge base at `/support/knowledgebase/`
- ACF Pro for CPT field management
- Pretty Links for URL shortening/tracking
- Brand system: Dark Blue `#004C97`, Red `#F93822`, Light Blue `#307FE2`, Navy `#031B34`
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
# STYLEGUIDE.md — Stark Social Media Agency
**Project:** starksocial.com  
**Last Updated:** April 2026  
**Scope:** Brand, visual design, CSS conventions, code standards, copy voice

---

## Brand Colors

```css
/* Primary */
--stark-dark-blue:         #004C97;
--stark-primary-red:       #F93822;
--stark-primary-light-blue:#307FE2;

/* Secondary */
--stark-secondary-orange:  #FF8200;
--stark-secondary-yellow:  #FEDD00;
--stark-secondary-green:   #00B140;
--stark-secondary-purple:  #87189D;
--stark-secondary-magenta: #E31C79;

/* Dark background */
--stark-bg:                #0b0f1a;

/* Gradients */
--gradient-dark-blue:      linear-gradient(135deg, #0C4E97 0%, #1D65B8 100%);
--gradient-red:            linear-gradient(135deg, #F93822 0%, #DA291C 100%);
--gradient-light-blue:     linear-gradient(135deg, #307FE2 0%, #539AEF 100%);
```

Hover variants of each gradient reverse direction (`hover` suffix).

---

## Typography

**Font:** Barlow + Barlow Condensed (self-hosted WOFF2 in child theme `/fonts/`)  
**Base:** `18px` / `line-height: 1.65`  
**Smoothing:** `-webkit-font-smoothing: antialiased`

### Type Scale

| Element | Size | Weight | Letter-spacing |
|---|---|---|---|
| h1 | `clamp(2.6rem, 4vw, 3.6rem)` | 800 | -0.03em |
| h2 | `clamp(1.85rem, 2.4vw, 2.45rem)` | 800 | -0.02em |
| h3 | `clamp(1.25rem, 1.6vw, 1.55rem)` | 800 | -0.015em |
| h4 | `1.1rem` | 750 | -0.01em |
| h5 | `1rem` | 700 | -0.005em |
| h6 | `0.95rem` | 700 | 0 |
| Body | `1rem` / `18px` | 400 | — |
| Eyebrow | `0.78rem` | 700 | `0.14em` uppercase |
| Small/meta | `0.92rem` | 400 | — |

---

## UI Tokens

```css
/* Text */
--stark-text:       #111;
--stark-muted:      rgba(17,17,17,.62);
--stark-muted-2:    rgba(17,17,17,.48);

/* Surfaces */
--stark-surface:    #fff;
--stark-rule:       rgba(17,17,17,.14);
--stark-rule-soft:  rgba(17,17,17,.08);

/* Accent (dynamic, seasonal) */
--stark-accent:          rgba(48,127,226,0.85);
--stark-accent-soft:     rgba(48,127,226,0.14);
--stark-accent-glow:     rgba(48,127,226,0.35);

/* Border radii */
--stark-radius-card: 14px;
--stark-radius-ui:   16px;
--stark-radius-field:14px;
--stark-radius-btn:  12px;

/* Layout widths */
--stark-max-wide:    1400px;
--stark-max-search:  1040px;
--stark-max-article: 960px;
```

---

## Seasonal Accents

The accent color shifts subtly per season via `data-stark-season` on `<html>`:

| Season | Months | `--stark-accent` |
|---|---|---|
| Spring | Mar–May | `rgba(68,149,255,.90)` |
| Summer | Jun–Aug | `rgba(33,165,255,.88)` |
| Fall | Sep–Nov | `rgba(30,92,195,.88)` |
| Winter | Dec–Feb | `rgba(92,178,255,.82)` |

Set inline in `<head>` via inline JS snippet to prevent flash.

---

## Layout System

### Sections
`.stark-section` — base padding: `clamp(5rem, 12vh, 9rem) 0`  
`.stark-section-tight` — `clamp(3.75rem, 9vh, 6.5rem) 0`  
`.stark-section-loose` — `clamp(6.5rem, 14vh, 11rem) 0`

### Containers
`.stark-inner` — max-width `1400px`, horizontal padding `clamp(20px, 3vw, 56px)`  
`.stark-inner-narrow` — max-width `960px`  
`.stark-inner-medium` — max-width `1040px`

### Breakpoints
- Mobile: `≤ 599px`
- Tablet: `600px – 899px`
- Desktop: `≥ 900px`

---

## Components

### Buttons

**Base class:** `.x-anchor-button.stark-btn`  
All buttons use glass morphism base: `backdrop-filter: blur(10px)`, `border: 1px solid rgba(...)`, lift on hover (`translateY(-2px)`).

| Class | Description |
|---|---|
| `.stark-btn` | Default glass/white button |
| `.blue-btn` | Dark blue gradient, white text |
| `.magenta-btn` | Magenta gradient, white text |
| `.stark-glass-magenta` | Glass magenta, semi-transparent |
| `.white-trns-btn` | Transparent white glass (for dark backgrounds) |
| `.ghost-btn` | No background, no border, text-only |
| `.stark-glass-accent` | Accent-tinted glass |
| `.spotify-btn` | Spotify green glass (podcast use only) |

All buttons: `min-height: 52px`, `border-radius: var(--stark-radius-btn)`, `font-weight: 750`.  
Mobile: `min-height: 46px`, `border-radius: 14px`.  
Focus: `outline: 3px solid rgba(254,221,0,0.9)` (yellow — accessibility compliant).

### Cards

**`.stark-card`** — Glass morphism card with radial gradient overlay:  
- `background: rgba(255,255,255,0.78)`, `backdrop-filter: blur(14px)`  
- `border: 1px solid rgba(0,0,0,0.06)`, `border-radius: 14px`  
- Hover: `translateY(-2px)`, deeper shadow

**`.stark-halo-card`** — Editorial signal rows (not interactive):  
- No background, no border, no box-shadow  
- Left dot: `5px` circle, `rgba(48,127,226,0.55)` with halo ring  
- Hairline divider between items  
- `cursor: default` — explicitly non-interactive

**`.stark-process-card`** — Process/steps:  
- White background, subtle border, numbered step badge

**`.stark-outcome`** — Results/outcomes:  
- White, hover border accent `rgba(0,76,151,0.18)`

### Navigation

**`.stark-nav`** — Hero overlay nav (white text)  
**`.stark-sticky-nav`** — Sticky nav, appears on scroll:  
- `background: rgba(255,255,255,.90)`, `backdrop-filter: blur(10px)`  
- Scroll progress bar via `--stark-scroll` CSS variable  
- Velocity glow effect via `--stark-vel`

**Off-canvas menu** (mobile): Dark glass, `rgba(10,56,120,0.58)` → `rgba(5,34,84,0.78)` gradient, `blur(14px)`.  
Menu items: `border-radius: 14px`, hover shifts `translateX(2px)`.

### CTA Section

`.stark-cta` — Dark blue gradient background (`--gradient-dark-blue`)  
Two-column grid: copy left, actions right (stacks on mobile).  
Primary button: red gradient. Secondary: transparent with white border.

### FAQ

`.stark-faq-item` — List items with left dot, hover background tint.  
Dot animates on hover: `rgba(48,127,226,0.7)` fill.

---

## Signature Features — DO NOT REMOVE

These are defining UI moments that must survive the Phase 2 migration exactly as they work today. They are non-negotiable design decisions.

### 1. Scroll Progress Bar
A thin blue line that runs edge-to-edge along the bottom of the sticky nav, growing from left to right as the user scrolls down the page.

- Only visible when the sticky nav is in frosted glass state (scrolled)
- Color: `color-mix(in srgb, var(--stark-accent) 78%, white 0%)`
- Height: `2px` desktop / `3px` at `≥ 900px`
- Driven by `--stark-scroll` CSS variable (0 to 1) set via scroll event listener
- Velocity glow: as scroll speed increases, the bar glows via `--stark-vel` variable
- Transition: `120ms linear` — feels live, not laggy
- Implementation: CSS `scaleX(var(--stark-scroll))` on `::after` pseudo-element of `.x-bar-content`
- Reduced motion: transition disabled, bar still shows statically

### 2. A11y Button + Back-to-Top Choreography
Two fixed-position utility buttons that perform a coordinated entrance as the user scrolls.

**A11y button (`.stark-a11y-btn`):**
- Labeled "A11y" — accessibility settings shortcut
- Fixed to bottom-left, starts at `left: 10px`
- As user scrolls to 50% of page, it smoothly slides right to `left: 64px` — making room for the back-to-top button to appear beside it
- Movement eased with `cubic-bezier(.22,.61,.36,1)`
- Icon: accessibility symbol

**Back-to-top button (`.x-scroll-top`):**
- Fixed bottom-right
- Hidden off-screen (`translateX(-18px)`, `opacity: 0`) until user scrolls
- Slides in from the left with `opacity: 1` when triggered
- Pure CSS chevron pointing up (no icon font dependency)
- Subtle `starkChevronNudge` animation pulses every 4.2s to hint at the action
- Hover: chevron turns accent blue, button lifts `translateY(-2px)`
- Both buttons share the same glass morphism style: `rgba(255,255,255,.62)`, `backdrop-filter: blur(10px)`, `border-radius: 14px`

**The choreography:** A11y slides left → gap opens → back-to-top slides into the gap. Feels intentional, not accidental.

---

## Interaction Patterns

- **Hover lift:** `translateY(-2px)` — universal for cards, buttons
- **Hover press:** `translateY(0) scale(0.99)` — button active state  
- **Transition timing:** `180ms cubic-bezier(.2,.8,.2,1)` — standard  
- **Fast transitions:** `160ms ease` — buttons, menu items
- **Reveal animation:** `.stark-reveal` + IntersectionObserver, `threshold: 0.15`  
- **Tilt effect:** `.stark-tilt` — `rotateX/Y(±3deg)` on mousemove, clamped  
- **Always:** `@media (prefers-reduced-motion: reduce)` — disable all motion, `transition: none`

---

## Design Principles (Nathan's Aesthetic)

- **Apple-minimal:** Clean hairlines, generous whitespace, gray secondary text
- **No bold color bars** as decorative elements
- Glass morphism is used for depth, not decoration — always with purpose
- Radial gradient overlays on cards create material quality without complexity
- Typography does the work: tight letter-spacing, large weight contrast (400 body / 800 headings)
- Seasonal accents: subtle shifts, never jarring, always within the blue family
- CTA sections are the exception: full dark blue, this is intentional contrast

---

## Code Standards

### PHP
- All functions prefixed `stark_`
- Hooks use anonymous functions for single-use; named functions for anything hooked in multiple places
- Transient caching for any DB queries in frontend output (key: `stark_{descriptor}_{id}`)
- Never store API keys in `functions.php` — use `wp-config.php` constants
- All DB queries use `$wpdb->prepare()`
- File includes in `~/public_html/` subdirectories only (not root — CodeIgniter routing blocks root PHP)

### CSS
- All custom properties on `:root`; seasonal overrides via `html[data-stark-season]`
- `!important` is acceptable in child theme overrides of Theme.co — will be removed in Phase 2
- Prefix all component classes with `stark-`
- BEM-lite: `.stark-component__element` for sub-elements when needed
- Never override WordPress core admin styles from frontend CSS

### JavaScript
- All JS wrapped in IIFE `(function(){})()` or arrow IIFE
- Check `prefers-reduced-motion` before any animation
- Use `{ passive: true }` on all scroll/touch event listeners
- IntersectionObserver preferred over scroll listeners for reveal
- Builder/preview detection: check for `.cs-preview` or `#cs-content` before running motion JS

### WordPress
- All CPTs registered in `functions.php` (not plugins) unless complex enough to warrant a plugin
- Conditionally enqueue scripts/styles — nothing global unless truly needed everywhere
- WPCode for global CSS/JS injection (Phase 1); child theme enqueue (Phase 2)

---

## Email / Notification Design

- **Layout:** Div-based, no tables (avoids `wpautop` injection)
- **Dark mode:** Tested in Apple Mail dark mode — no table cells that invert
- **Spark:** Tested — no background-color conflicts
- **Logo path:** `hub.starksocial.com/media/public/custom/emails/stark-logo-light.png`
- **Footer bar:** `hub.starksocial.com/media/public/custom/emails/email-footer-bar.png`
- Match Perfex Hub template styling: Dark Blue header, white body, footer bar

---

## Voice & Tone

- **Direct:** No filler, no "we're passionate about..." — say what you do
- **Confident without ego:** State outcomes, not superlatives
- **Human:** Write like a smart person talking, not a brochure
- **Agency, not freelancer:** "We" not "I" — team language
- **Proof over promises:** Lead with results where possible ("clients sending emails")
- **Accessible:** Plain English — no jargon unless the audience expects it

### Copy Patterns
- Eyebrows: SHORT CAPS, 2–4 words, no period
- Headlines: Sentence case, no period, tight letter-spacing
- Body: 2–3 sentences max per paragraph on marketing pages
- CTAs: Action verb first — "Get a proposal", "See our work", "Start here"

---

## Accessibility

- WCAG 2.1 AA target (currently scoring 95 on PageSpeed)
- Focus ring: `3px solid rgba(254,221,0,0.9)` (yellow) — consistent site-wide
- All interactive elements: `min-height: 44px`, `min-width: 44px` on mobile
- All images: descriptive `alt` text
- Heading hierarchy: never skip levels
- Color contrast: all text on backgrounds meets 4.5:1 minimum
- Reduced motion: all animations gated on `prefers-reduced-motion`

---

## File Structure (Phase 2 Child Theme)

```
starksocial/
├── style.css           ← Theme declaration only
├── functions.php       ← All PHP hooks, CPTs, shortcodes
├── custom.css          ← Global design system CSS (ported from WPCode)
├── fonts/              ← Barlow WOFF2 files
│   ├── barlow-v13-latin-regular.woff2
│   ├── barlow-v13-latin-500.woff2
│   ├── barlow-v13-latin-600.woff2
│   ├── barlow-v13-latin-700.woff2
│   ├── barlow-v13-latin-800.woff2
│   ├── barlow-condensed-v13-latin-regular.woff2
│   ├── barlow-condensed-v13-latin-500.woff2
│   ├── barlow-condensed-v13-latin-600.woff2
│   └── barlow-condensed-v13-latin-700.woff2
├── js/
│   ├── stark-global.js ← Season, scroll progress, velocity
│   ├── stark-reveal.js ← IntersectionObserver reveal + tilt
│   └── author-box.js   ← Author login attribute
├── img/                ← Theme-specific SVGs
├── passgen/            ← Password generator (rebuild in Phase 2)
└── framework/          ← Custom template views
    └── views/custom/
        └── wp-404.php
```

---

## Feature Decisions & Scope

### 1. Password Generator (Rebuild in Phase 2)
**Current:** Pill-shaped form, doesn't match site design  
**Decision:** Rebuild to match Stark design system — `stark-card` container, `--stark-radius-field` inputs, Barlow font, brand colors. Remove pill shapes. Should feel like a native part of the site, not a widget drop-in.  
**Location:** `/password-generator/` — keep as shortcode `[password_generator]`, just rebuild the CSS  
**Owner:** Claude — Build

---

### 2. Live Chat (Olark → Evaluate)
**Current:** Olark free tier — button style is good, service is adequate. Also integrated with Perfex Hub.  
**Decision:** Evaluate before committing to Olark Pro.

**Options to consider:**
| Service | Pro | Con |
|---|---|---|
| **Olark Pro** | Already integrated with Hub, familiar | Older product, limited AI features |
| **Crisp** | Modern, free tier generous, good design | No native Perfex integration |
| **Tidio** | AI features, clean UI | Can get expensive |
| **Tawk.to** | Free forever | Design less polished |

**Recommendation:** If Hub integration is important, pay for Olark Pro. If Hub integration isn't critical for chat, Crisp is the better modern product.  
**Keep current Olark styling** from global CSS regardless of which service is chosen — the button style is already on-brand.  
**Decision needed by:** Before Phase 2 launch

---

### 3. Podcast (Podlove → Evaluate)
**Current:** Podlove Podcasting Plugin — hasn't been updated recently. Audio files on AWS S3.  
**Status:** Podcast on pause, considering relaunch.

**Options:**
| Option | Pro | Con |
|---|---|---|
| **Keep Podlove** | Already set up, AWS connected, CPT working | Plugin aging, less active development |
| **Seriously Simple Podcasting** | Active development, clean UI, good RSS | Migration work |
| **Castos** | Hosted platform, great analytics, WordPress plugin | Monthly cost, moves files off AWS |
| **Buzzsprout embed** | Simple, reliable | Loses on-site player control |

**Recommendation:** Keep Podlove for now since podcast is on pause. When relaunching evaluate Seriously Simple Podcasting — active development, better WordPress integration. Audio stays on AWS either way.  
**AWS S3 bucket:** Already configured, keep regardless of plugin choice.

---

### 4. Blog Audio Player — ElevenLabs AI Voice (Phase 2 Feature)
**Current:** Audio files manually created in Speechify, hosted on AWS S3, embedded in blog posts. Labor intensive.  
**Decision:** Replace manual Speechify workflow with ElevenLabs API — auto-generate audio from blog post content using Nathan or Deanna's cloned voice.

**Proposed workflow:**
1. Blog post published/updated in WordPress
2. WordPress hook triggers ElevenLabs API call with post content
3. ElevenLabs generates MP3 using cloned voice
4. MP3 uploaded to existing AWS S3 bucket automatically
5. Player on blog post pulls from S3 URL (same as today)

**Voice cloning:** ElevenLabs Professional Voice Clone — requires ~30 min of clean audio. Podcast episodes are ideal source material for both Nathan and Deanna.  
**ElevenLabs plan needed:** Creator ($22/mo) minimum for voice cloning  
**AWS:** Keep existing bucket and structure  
**Owner:** Claude — Build (WordPress hook + API integration)  
**Priority:** Phase 2 — high value, replaces manual labor entirely

---

### 5. Unified Audio Player (Blog + Podcast)
**Decision:** Both blog and podcast use the same base player component with different feature sets.

**Blog player (simple):**
- Play/pause, progress bar, speed control, volume
- "Listen to this post" label
- Matches `.stark-card` glass morphism style

**Podcast player (full):**
- All blog player features PLUS
- Chapter markers
- Transcript toggle (collapsible below player)
- Episode number + duration display
- Download button
- Subscribe links (Spotify, Apple, etc.)

**Design:** Same visual language — dark glass `rgba(10,16,28,.92)`, accent blue progress bar, Barlow font, `border-radius: 18px`. Feels like one product at two feature levels.  
**Owner:** Claude — Build  
**Note:** If switching from Podlove, verify chapter + transcript support in new plugin before committing.

---

### 6. Support Ticket Button → Perfex Hub
**Decision:** Add "Open a Support Ticket" as a utility action that redirects to `hub.starksocial.com/clients/open_ticket`

**Behavior:**
- Clicking opens `https://hub.starksocial.com/clients/open_ticket` in a new tab
- Perfex Hub handles authentication — existing clients log in, non-clients see login/register
- No custom auth needed on the WordPress side

**Placement:**
- Support page (`/support/`) — primary CTA
- Knowledgebase pages — sidebar or footer of articles
- Utility nav (top right alongside Client Portal)
- Mobile menu — utility section at bottom

**Button style:** `.stark-btn.blue-btn` — matches Client Portal button treatment  
**Label:** "Open a Support Ticket"  
**Icon:** ticket or message icon  
**Owner:** Claude — Build

---

## Page-by-Page Visual Reference (From Live Site Screenshots — April 2026)

### Homepage Hero
- Full-bleed cloud photo background
- All-caps white headline (keep weight and drama)
- Yellow all-caps subtitle — **Phase 2: replace with white/muted subtitle, sentence case** — yellow all-caps conflicts with Apple-minimal direction
- Single magenta CTA button — keep color, **replace pill shape with `--stark-radius-btn` (12px)**
- Transparent nav state on load, logo top-left, burger top-right

### Homepage — Who We're For Section
- Two-column: copy + H2 left, halo bullet points right
- Halo dots: `rgba(48,127,226,0.55)` with ring — keep exactly
- Service cards: 2×2 grid, icon + title + description — this is the reference layout for Phase 2 service card pattern

### Scroll Progress Bar (Confirmed Live)
- Thin blue line visible under sticky nav when scrolled
- Runs full width edge to edge ✅
- Must be pixel-perfect match in Phase 2

### Blog Single — Audio Player
**Current state:**
- White card container, subtle border
- Label: "Listen to this article"
- Timestamps left (current) and right (total, negative format e.g. -5:53)
- Large play button center
- ±15 second skip buttons
- Speed control pill (1x dropdown)
- Download audio link with download icon

**Phase 2 upgrade:**
- Replace white card with dark glass: `rgba(10,16,28,.92)`, `backdrop-filter: blur(22px)`
- Accent blue progress bar
- Keep same controls, same layout
- Remove pill shape from speed control — use `--stark-radius-btn`
- "Listen to this article" label in eyebrow style (small caps, muted)
- ElevenLabs AI voice integration replaces manual Speechify workflow

### Podcast Single — Podlove Player
**Current state:**
- Episode art square left
- Episode title + podcast name
- Blue pill "Play Podcast" button
- Progress bar with timestamps
- Chapters button, download button, share button (icon row)
- Chapters panel: numbered list, chapter name, timestamp, X to close

**Phase 2 upgrade:**
- Same feature set, unified visual language with blog player
- Dark glass container matching blog player
- **Replace blue pill Play button** with `stark-btn blue-btn` style
- Keep chapters panel — it's a strong feature, just restyle to dark glass
- Transcript toggle to be added alongside chapters button

### Password Generator
**Current state (keep layout, fix styles):**
- Two-column: copy/tips left, widget right — **keep this layout**
- Widget: COPY PASSWORD button (top-right), password output area, length slider, toggle switches, GENERATE PASSWORD button

**What's wrong:**
- Pill-shaped iOS-style toggle switches — replace with Stark-styled checkboxes or squared toggles with `--stark-radius-ui`
- COPY PASSWORD and GENERATE PASSWORD buttons are pill-shaped — replace with `stark-btn` style
- Widget background too plain — upgrade to `stark-card` glass morphism

**Phase 2 target:**
- `stark-card` container for the widget
- Slider: accent blue `--stark-accent` thumb and fill
- Toggles: replace pill iOS style — use styled checkboxes or small `--stark-radius-btn` toggles in brand blue
- Buttons: `.stark-btn.blue-btn` for Generate, ghost/secondary for Copy
- Generated password output: monospace font, red (`--stark-primary-red`) to match existing `code` element style

### Footer Structure (Current → Phase 2)
**Current columns:** Logo+tagline | SERVICES | COMPANY | RESOURCES

**Phase 2 columns:** Logo+tagline | SERVICES (all 8) | COMPANY | RESOURCES + Support Ticket

**SERVICES column update (add new services):**
- Social Media Management
- Paid Advertising
- Web Design
- SEO
- Content Creation
- Brand Strategy & Identity
- Audit & Consulting ← NEW
- Fractional CMO ← NEW

**RESOURCES column update:**
- Knowledgebase
- Password Generator
- Client Portal
- Blog
- Podcast
- Open a Support Ticket ← NEW (links to `hub.starksocial.com/clients/open_ticket`)

**Social icons:** Facebook, Instagram, LinkedIn, YouTube, Apple Podcasts — keep all five

### CTA Section (Global)
- Dark blue gradient background — keep
- "Start a conversation" headline — good, keep
- Subtext: "Tell us what you're working on and we'll help you think it through. No pressure. If we're not a fit, we'll tell you." — keep this copy, it's very on-brand
- Magenta Contact Us button — keep color, fix pill shape to `--stark-radius-btn`

---

## Annotated Feature Notes (From Nathan — April 2026)
*These notes come directly from annotated screenshots and override any earlier general descriptions.*

### Password Generator — Exact Notes
- **Bigger widget** — the right-column widget needs to be larger and fill more space
- **More spacing, more intentional** — generous padding inside the widget, don't crowd the controls
- **Copy button + form = one unified thing** — COPY PASSWORD button should be integrated into the password output field, not floating above it separately. Think: output field with copy icon/button embedded on the right end — one component
- **No pill shapes anywhere** — toggles, buttons, all of it. Glass feel throughout
- **Glass buttons** — `.stark-btn` glass morphism style for Generate and Copy. Not flat, not pill — frosted glass with subtle border and depth
- **Toggles** — replace iOS pill toggles with Stark-styled checkbox buttons or small glass toggle chips using `--stark-radius-btn`

### Blog Audio Player — Exact Notes  
- **Love this look** — use the current blog player visual as the reference for the unified player design across the site
- **AI voice via ElevenLabs** — no more manual Speechify. Auto-generate on publish
- **Voice selection logic: based on post author**
  - Nathan wrote the post → Nathan's cloned voice
  - Deanna wrote the post → Deanna's cloned voice
  - Override field in post meta for edge cases
- **Avatar for each voice** — small circular avatar appears in the player next to "Listen to this article"
  - Nathan's avatar: his photo/headshot cropped to circle
  - Deanna's avatar: her photo/headshot cropped to circle
  - Sits left of the label, gives the player a human, personal feel
- **Label update:** "Listen to this article · Nathan" or "Listen to this article · Deanna" — identifies whose voice is reading

### Podcast Player — Exact Notes
- **Chapters: collapsible, not auto-open** — chapters panel should be closed by default, opened on tap/click. Currently opens automatically which takes up too much space on load
- **Play button: consistent site-wide button style** — the dark blue pill "Play Podcast" button needs to become `.stark-btn.blue-btn` to match every other button on the site. This is the site-wide button standardization note — applies everywhere
- **Sidebar search = site-wide form standard** — the sidebar search box style (white glass, rounded, focus ring) is the reference style for ALL forms: password generator, contact form, gravity forms, any input anywhere on the site
- **Categories sidebar widget** — should adopt the blog player's visual language: darker background treatment, cleaner typography. Currently too plain with grey counts

### Scroll Progress Bar — Exact Behavior (Confirmed)
- Grows from left edge → right edge as user scrolls
- **Touches both edges** — full viewport width, edge to edge, no padding/margin
- Moves in real time as user scrolls
- At 100% scroll = fully touches right edge

### A11y + Back-to-Top Choreography — Exact Behavior (Confirmed)
**Starting state (page load):**
- A11y button: far bottom-left corner
- Back-to-top: hidden

**As user scrolls:**
- A11y button slowly slides right
- Scroll progress bar grows left to right

**Arriving state (mid-to-bottom of page):**
- Back-to-top button slides IN from the right into position
- Back-to-top button looks identical to A11y button — same glass style, same size, same border radius
- Both buttons sit bottom-left together: [↑] [A11y]
- Back-to-top is leftmost, A11y is to its right

**Both buttons share identical styling:**
- `background: rgba(255,255,255,.62)`
- `backdrop-filter: blur(10px) saturate(140%)`
- `border: 1px solid rgba(17,17,17,.10)`
- `border-radius: 14px`
- `width: 44px` / `height: 44px`
- `box-shadow: 0 16px 34px rgba(17,17,17,.14)`

### Site-Wide Form Standard (From Sidebar Search Reference)
All forms, inputs, and search fields across the site use this style:
- `background: rgba(255,255,255,0.92)`
- `border: 1px solid rgba(0,0,0,0.10)`
- `border-radius: var(--stark-radius-field)` (14px)
- `box-shadow: 0 0.75rem 1.75rem rgba(0,0,0,0.08)`
- Focus: `border-color: rgba(48,127,226,0.55)`, `box-shadow: 0 0 0 0.25rem rgba(48,127,226,0.18)`
- Applies to: contact form, password generator inputs, sidebar search, all Gravity Forms inputs, knowledgebase search
# SEO-STRATEGY.md — Stark Social Media Agency
**Project:** starksocial.com Phase 2  
**Owner:** Claude — SEO Chat  
**Last Updated:** April 2026  
**Tools:** RankMath Pro, Wincher, Google Search Console, Google Business Profile

---

## Goals

- RankMath SEO score 90+ on every page
- Core Web Vitals all green post-launch
- Schema validation zero errors
- Rank for agency keywords in 4 target markets
- Own digital marketing / fractional CMO searches in underserved SoCal suburbs

---

## SEO Stack (Phase 2)

| Tool | Role |
|---|---|
| RankMath Pro | On-page SEO, schema, redirects, local SEO |
| Wincher | Rank tracking, keyword research |
| Google Search Console | Indexing, performance, coverage |
| Google Business Profile | Local presence, service areas |
| Cloudways | Sitemap submission via RankMath |

**Migration note:** Fresh RankMath install on staging. No AIOSEO import needed — new site, new setup. Redirects from old site to be mapped before launch.

---

## Target Markets (Local SEO)

| Market | Region | Notes |
|---|---|---|
| San Fernando Valley | LA County | Closest to base, most competitive |
| Antelope Valley | LA County (north) | Underserved, low competition |
| Ventura County | Ventura | Strong SMB market |
| Bakersfield | Kern County | Very underserved, high opportunity |

### Strategy Per Market
- Dedicated landing page per market (not thin — genuine local value)
- `LocalBusiness` schema with `areaServed` per region
- Local testimonials/case studies referenced per page where possible
- Google Business Profile service areas set to all 4 markets
- Internal linking: service pages → local landing pages

### Local Landing Page URL Structure
```
/social-media-management/san-fernando-valley/
/social-media-management/antelope-valley/
/digital-marketing-antelope-valley/
/fractional-cmo-ventura-county/
/web-design-bakersfield/
```
*(Full URL map to be built in SEO chat)*

---

## Service Page Keyword Targets

*(To be populated from Wincher data — bring export to SEO chat)*

| Page | Primary Keyword | Secondary | Local Variant |
|---|---|---|---|
| Social Media Management | TBD | TBD | TBD |
| Paid Advertising | TBD | TBD | TBD |
| Web Design | TBD | TBD | TBD |
| SEO | TBD | TBD | TBD |
| Content Creation | TBD | TBD | TBD |
| Brand Strategy | TBD | TBD | TBD |
| Audit & Consulting | TBD | TBD | TBD |
| Fractional CMO | TBD | TBD | TBD |

---

## Schema Plan

| Page Type | Schema Type |
|---|---|
| Home | `Organization`, `WebSite`, `LocalBusiness` |
| Service pages | `Service`, `LocalBusiness` |
| Local landing pages | `LocalBusiness` with `areaServed` |
| Portfolio / case studies | `CreativeWork` |
| Blog posts | `Article`, `BreadcrumbList` |
| Podcast | `PodcastSeries`, `PodcastEpisode` |
| About | `Person` (Nathan + Deanna) |
| FAQ sections | `FAQPage` |

---

## Redirect Map

*(To be built before launch — maps old URLs to new)*

| Old URL | New URL | Status |
|---|---|---|
| TBD | TBD | — |

---

## RankMath Configuration Checklist

- [ ] Install RankMath Pro on staging
- [ ] Connect Google Search Console
- [ ] Set site type: Local Business
- [ ] Configure local SEO module (address, service areas)
- [ ] Enable schema for all post types
- [ ] Set breadcrumb separator
- [ ] Configure sitemap (include: pages, posts, podcasts, portfolio; exclude: legal, utility)
- [ ] Set robots.txt (block: staging, admin, search results)
- [ ] 404 monitor enabled
- [ ] Redirects module enabled
- [ ] Configure title + description templates per post type

---

## Wincher Keywords

*(Paste Wincher export here or bring to SEO chat)*

---

## Notes

- Antelope Valley and Bakersfield are highest opportunity — minimal agency competition
- Fractional CMO is a rising search term, low competition outside major metros
- Digital Marketing Audit is a strong entry-point service for local SEO — "free audit" angle
- Podcast content should be schema-marked up for potential rich results
# VOICE-GUIDE.md — Stark Social Media Agency
**Project:** starksocial.com Phase 2
**Owner:** Claude — Copy/Voice Chat
**Last Updated:** April 2026

## To Complete in Voice Chat
- Full homepage copy
- Service page copy (8 pages)
- About page copy
- Local landing page templates (4 markets)
- Case study copy
- Blog content calendar
