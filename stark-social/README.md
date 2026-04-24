# Stark Social — GeneratePress Child Theme

**Version:** 2.0.0 (Phase 2, April 2026)
**Parent:** GeneratePress Premium
**Target:** `staging.starksocial.com` (app `rctcpyewsk`)

Migrated from Themeco Pro/X + Cornerstone. Organization mirrors the Phase 1
theme: `functions.php` is a flat file with docblock-grouped sections,
feature code lives in self-contained folders (`passgen/`), per-concern JS
files live in `js/`.

## Install

1. Upload the `stark-social/` folder to `/wp-content/themes/` on staging.
2. Confirm GeneratePress Premium is installed as the parent.
3. Activate **Stark Social Media Agency**.
4. Add to staging's `wp-config.php` (above the "stop editing" line):
   ```php
   define( 'STARK_ENV', 'staging' );
   define( 'WP_REDIS_DISABLED', true );
   ```
5. Visit **Settings → Permalinks** once after activation to flush rewrite rules
   (theme activation also triggers this, but a manual flush is a safe belt-and-suspenders).

## Port status

### ✅ Ported verbatim from Phase 1
- All 9 Barlow WOFF2 files in `/fonts/`
- Both "Who We're For" arrow SVGs in `/img/`
- `/js/author-box.js` — Nathan/Deanna/Stark Social author-ID routing
- `/js/excerpt-length.js` — 50-word podcast excerpt truncate
- `/passgen/passgen.php` — markup
- `/passgen/passgen.js` — behavior
- `/passgen/passgen.css` — styling (renamed from `1passgen.css`; Phase 1 had a broken enqueue reference)

### ✅ Ported in `functions.php`
- Podcast CPT registration + activation flush
- `data-author-login` attribute on `<html>` (transient-cached)
- Export null-cast filters + term metadata null guard
- `stark-single-post` body class
- Passgen conditional enqueue + `[password_generator]` shortcode
- BetterDocs + Gravity Forms style dequeues
- `stark_seconds_to_hms` helper
- `[starkpodmeta]` shortcode with `wp_podlove_episode` query (transient-cached, SHOW TABLES guard)
- Podlove transient invalidation on `save_post_podcast`
- Weekly `nate_prune_db_event` cron (Podlove download-intent prune + BetterDocs search log truncate)
- Featured image preload on podcast singles
- Security headers (HSTS gated to production HTTPS)
- Podcast/MediaElement conditional dequeue (big Phase 1 perf win — preserved)
- `admin-font`, `masonry`, `imagesloaded` dequeues
- Comments removed from all post types
- Blog rewrite rules (`/blog/`, `/blog/page/N/`)
- BetterDocs `/docs/` → `/support/knowledgebase/` breadcrumb URL fix
- GF notification `<br />` strip filter (ERR-001)

### 🔀 Changed / removed
- Themeco Pro shims removed (`x_enqueue_parent_stylesheet`, `x-theme` no-op register)
- AIOSEO breadcrumb trail filter **preserved as commented reference** — TODO: port to `rank_math/frontend/breadcrumb/items` once RankMath is installed
- AIOSEO LLMS filter + Cornerstone `cs_component` regex **removed entirely**
- AIOSEO cache truncation removed from weekly cron

### ➕ Added for Phase 2
- `STARK_ENV` / `STARK_IS_STAGING` environment flag with staging admin-bar badge
- Seasonal accent inline bootstrap (no flash on first paint)
- GeneratePress child enqueue pattern (`generate-style` parent handle)
- Barlow WOFF2 preload (3 primary weights)
- `custom.css` enqueue — global design system
- `stark-global.js` + `stark-reveal.js` enqueues (stubs present; port pending)
- Conditional scoping for `author-box.js` and `excerpt-length.js`
- `Referrer-Policy`, `Permissions-Policy`, X-Pingback removal, emoji dequeue

## Port pending

- [ ] `custom.css` — paste ~2,000 lines of WPCode "Stark Global CSS" into the marked section (2–8)
- [ ] `js/stark-global.js` — paste WPCode global JS: scroll progress, velocity, A11y + back-to-top choreography
- [ ] `js/stark-reveal.js` — paste WPCode reveal + tilt JS
- [ ] `functions.php` → Podcast breadcrumb filter — RankMath port (commented AIOSEO version preserved as reference)
- [ ] Password Generator visual rebuild — see `passgen/README.md`

## Staging safety

- `STARK_ENV = 'staging'` surfaces a red **⚠ STAGING** node in the admin bar
- HSTS header suppressed on staging
- Gravity Forms → Perfex webhook is configured via the **GF Webhooks add-on**
  in the GF admin UI (not in PHP). Do **not** add the webhook feed on staging
  — this is a manual config step, not a code gate.

## Structure

```
stark-social/
├── style.css                         ← theme declaration
├── functions.php                     ← all PHP hooks, CPTs, shortcodes
├── custom.css                        ← global design system CSS
├── README.md                         ← this file
├── fonts/                            ← 9 Barlow WOFF2 files
├── img/                              ← 2 "Who We're For" SVGs
├── js/
│   ├── author-box.js                 ← Nathan/Deanna/Stark Social routing
│   ├── excerpt-length.js             ← 50-word podcast truncate
│   ├── stark-global.js               ← season, scroll, velocity, A11y (stub)
│   └── stark-reveal.js               ← reveal + tilt (stub)
├── passgen/
│   ├── passgen.php                   ← widget markup
│   ├── passgen.js                    ← widget behavior
│   ├── passgen.css                   ← widget styling (Phase 2 rebuild pending)
│   └── README.md                     ← Phase 2 rebuild spec
└── framework/
    └── views/
        └── custom/
            └── wp-404.php            ← 404 template (Phase 2.1 content)
```
