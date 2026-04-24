# CHANGELOG.md — Stark Social Media Agency
**Project:** starksocial.com
**Format:** newest first

---

## [2.0.2] — April 24 2026

### Added
- Bottom UI cluster on staging — A11y + back-to-top + Perfex chat widget
  - `js/stark-bottom-ui.js` — scroll choreography, 50% show / 40% hide (hysteresis)
  - Cluster styling appended to `custom.css`
  - `functions.php` — renders markup in `wp_footer`, enqueues JS, injects Perfex embed
- **Interruptible scroll-to-top** — RAF-based custom easing, cancels on any user input (touchstart, wheel, keydown, mousedown). Fixes mobile smooth-scroll fights.
- `scroll-behavior: auto` forced on `html` — disables native smooth-scroll site-wide, eliminating iOS momentum-vs-smooth-scroll conflicts
- Staging chat suppression by default — Perfex widget off on staging via `STARK_PRCHAT_ON_STAGING` constant (no wasted tokens)
- Widget ID constant `STARK_PRCHAT_WIDGET_ID` — overrideable via `wp-config.php`

### Decided
- Chat bot = Perfex PRChat (hub.starksocial.com) replacing Olark at launch
- Chat bot shape = squircle (asymmetric border-radius, Olark-style)
- Chat bot position = bottom-right, solo (NOT part of left cluster)
- Entrance = slide from right after 400ms + single pulse ring at 3s
- A11y + back-to-top = left-side pair (A11y at `left:10px` → slides to `left:64px` at 50% scroll; back-to-top slides up into `left:10px`)
- Themeco Pro's `.x-scroll-top` is NOT ported — rebuilt from scratch as `.stark-back-to-top`
- Olark stays live on production through Phase 2 launch; remove at cutover; do NOT cancel Olark sub until Perfex chat verified in production

### Port pending
- 13 keeper WPCode PHP snippets → `functions.php` (Work CPT, taxonomies, reading time, SVG support, form validation, etc.)
- Phase 1 scroll progress + velocity JS (`header-js.js`) → `js/stark-global.js`
- Full `:root` token system + core components (`.stark-card`, `.stark-btn`, `.stark-section`) in `custom.css`
- AIOSEO podcast breadcrumb filter → RankMath equivalent
- OpenAI API key configuration in Perfex admin

---

## [2.0.1] — April 24 2026

### Environment
- Staging app confirmed as `wcrjhscubc` on server 676057 (INSTRUCTIONS.md had stale `rctcpyewsk`)
- `wp-config.php` constants set on staging:
  - `WP_DEBUG=true`, `WP_DEBUG_DISPLAY=false`, `WP_DEBUG_LOG=true` (BetterDocs PHP 8.4 deprecation output no longer breaks login)
  - `WP_REDIS_DISABLED=true`
  - `STARK_ENV=staging`
- BetterDocs 4.3.11 → 4.3.12
- Plugin inventory confirmed: ACF Pro, GenerateBlocks Pro, GP Premium, Gravity Forms, RankMath Pro, Complianz, FacetWP, FileBird Pro, WPCode Premium, SearchWP
- GeneratePress Premium activated as parent; Stark Social v2.0.0 child uploaded

---

## [2.0.0] — April 24 2026

### Added — Stark Social GeneratePress child theme
- Full Phase 1 `functions.php` port (adapted for GeneratePress):
  - Podcast CPT + activation flush
  - `data-author-login` attribute (transient-cached)
  - Passgen conditional enqueue + `[password_generator]` shortcode
  - BetterDocs + Gravity Forms style dequeues + `gform_disable_css`
  - `stark_seconds_to_hms` + `[starkpodmeta]` (transient-cached, SHOW TABLES guard)
  - Weekly `nate_prune_db_event` — Podlove prune + BetterDocs search log truncate
  - Podcast featured image preload (LCP assist)
  - Security headers (HSTS production-only)
  - Podcast/MediaElement conditional dequeue
  - Blog rewrite rules `/blog/` + `/blog/page/N/`
  - BetterDocs `/docs/` → `/support/knowledgebase/` breadcrumb URL fix
  - GF notification `<br />` strip filter (resolves ERR-001)
- Phase 1 assets carried verbatim: 9 Barlow WOFF2s, `author-box.js`, `excerpt-length.js`, `passgen/` trio (CSS renamed from `1passgen.css`), two arrow SVGs
- New for Phase 2: `STARK_ENV` flag + red staging admin badge, seasonal accent inline bootstrap, Barlow WOFF2 preload (3 weights), `custom.css` enqueue with `:root` tokens

### Removed from Phase 1
- Themeco Pro shims (`x_enqueue_parent_stylesheet`, `x-theme` no-op)
- AIOSEO LLMS filter + Cornerstone `cs_component` regex
- AIOSEO cache truncation from weekly cron
- `Template: pro` → `Template: generatepress`

### Fixed
- Password generator CSS enqueue — Phase 1 referenced `passgen.css` but file was named `1passgen.css`

---

## [1.2.4] — April 2026 (Phase 1 live site)

### Fixed
- Gravity Forms → Perfex CRM webhook rebuilt via custom PHP
- Backup cron `*/5 * * * *` → `0 * * * *` (memory exhaustion)
- Perfex email template image paths (124 templates, MySQL find-and-replace)
- Gravity Forms email templates rebuilt (div-based)

### Infrastructure
- Themesic REST API module permanently deactivated
- Signature generator deployed

---

## [1.2.3] — Early 2026

- Seasonal accent system
- Scroll velocity CSS variable
- Reveal + tilt effects
- Accessibility button with scroll offset
- Back-to-top button redesign
- `[starkpodmeta]` shortcode
- Podlove DB prune cron

---

## [1.1.0] — 2025

- GF Mailgun, FacetWP, SearchWP+BetterDocs, Google Site Kit
- Stark Site Toolkit plugin, WPCode Premium
- Password Generator, Complianz GDPR
- Object Cache Pro, Breeze, Cloudflare Enterprise
- Security headers, generator/XMLRPC removal

---

## [1.0.0] — Initial Build

- Themeco Pro/X + Stark Social child
- Barlow + Barlow Condensed (WOFF2)
- Podcast CPT + Podlove
- Blog at `/blog/`
- AIOSEO Pro + 5 addons
- BetterDocs Pro
- Brand: `#004C97`, `#F93822`, `#307FE2`, `#031B34`
