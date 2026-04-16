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

| Workstream | Chat | Scope |
|---|---|---|
| Build | Claude — Build | GeneratePress, templates, CSS, PHP, components |
| SEO & Local | Claude — SEO | RankMath, local pages, schema, keyword mapping |
| Copy & Voice | Claude — Copy | Voice guide, page copy, blog briefs, local messaging |
| Portfolio | Build + Copy + SEO | Template (Build), copy (Copy), schema (SEO) |
| QA | Claude — QA | PageSpeed, accessibility, schema, cross-browser |

Each chat starts with the standard START-PROMPT pulling all `.md` files from GitHub.

---

## Phase 3 (Future)

- Drip campaigns via Perfex CRM for client services
- MainWP full integration + client site reporting
- Navigation/menu refinement based on analytics
- Performance push (target: mobile 90+)
- Wincher rank tracking review + content gap fill

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
├── passgen/            ← Password generator (keep as-is)
└── framework/          ← Custom template views
    └── views/custom/
        └── wp-404.php
```
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
