# CHANGELOG.md — Stark Social Media Agency
**Project:** starksocial.com
**Format:** newest first

## [2.0.5] — April 29 2026

### Added — Brand Sheet stark/ scaffold + full data layer (Phase 3.3)
- Initial scaffold at `brand-sheet/stark/` per CHANGELOG 2.0.4 architecture: per-client folder, plain PHP, no DB, `config.php` as single source of truth, `cp -r stark/ {client-slug}/` to onboard a new client
- `index.php` orchestrator, `lib/active-check.php` (Perfex hook stub), `inactive.php` fallback for cancelled Care Pro
- Section files: `identity.php`, `colors.php`, `gradients.php`, `typography.php`, `logos.php` (auto-skips when empty)
- 9 self-hosted Barlow + Barlow Condensed woff2 files in `assets/fonts/`, wired via `@font-face`
- `assets/js/brand-sheet.js` — vanilla click-to-copy on any `[data-copy]` element with Clipboard API + textarea fallback

### Added — Canonical brand data from Stark's official standards PDF
- Pantone (PMS) values for every primary + secondary color
- CMYK replaced with brand-calibrated press values (RGB-converted approximations dropped)
- Tint/shade families: each color now has Tint +1, Tint +2, Shade +1, Shade +2 with full PMS/RGB/CMYK/hex
- Tint/shade family chip rows render beneath each True swatch — hover for full spec, click to copy hex, True chip distinguished by thicker border
- Logo composition gradients (Logo Background, Logo Stark) added as a separate subsection from UI/CSS gradients

### Added — PDF / print polish (landscape brand book)
- `@page { size: letter landscape; margin: 0.5in 0.55in 0.6in 0.55in; }` — PDFs default to landscape
- Running headers/footers via CSS Paged Media: "Stark Social Media Agency · Brand Sheet" top-left, page number top-right, "starksocial.com" bottom-right (Chrome-supported; Safari falls back gracefully)
- `@page :first` suppresses running headers on the cover page
- Cover-page treatment for `#identity` in print: 36pt headline, accent-blue tagline, body copy sized for page, `page-break-after: always`
- `print-color-adjust: exact` forces browsers to render color backgrounds (default behavior strips them)
- 3-column color/gradient/logo grids in print
- Family chips hidden in print (don't compress usefully at small sizes)

### Removed
- Purple and Orange from active secondary palette per Nathan (rarely used). Reinstate by adding entries back to `config.php`.

### Decided
- Stark's brand sheet is built first as the master template; client onboarding = `cp -r stark/ {client-slug}/` + edit `config.php`. No multi-tenancy.
- Hosting architecture: `brand.starksocial.com/` = marketing landing; `brand.starksocial.com/{slug}` = each client's sheet (path-based, simpler SSL story than subdomain-based)
- Custom client domains via CNAME → `brand.starksocial.com`, server reads Host header, looks up slug, serves their sheet without redirect (branded URL stays in address bar)
- Implementation deferred — restructure into `clients/` folder with top-level dispatcher, build apex landing page, configure Cloudways for the subdomain + custom-domain routing
- PDF export v1 = browser print stylesheet (no library). Revisit Dompdf only if fidelity demands it.
- Self-hosted fonts: each brand sheet instance carries its own `assets/fonts/`. Clients bring their own fonts when onboarding.

### Fixed
- Cleaned up two transcription typos in source brand PDF: Dark Blue True hex (Page 2 said `0C4E97`, RGB matches `004C97`); Light Blue Shade +2 hex (PDF said `004C97`, RGB matches `004976`)

### Modified
- Identity copy authored by Nathan directly in `config.php`: tagline "Marketing that earns its keep", mission listing services and ending in "The work over the words", description with founder reference and Care Pro stewardship line

### Open for next session
- Cover headline letter-spacing fix (Barlow "a A" glyph collision at 36pt on the cover page)
- Type scale `.bs-scale` page-break-inside to fix dead space on page 5
- Hosting buildout (apex landing + dispatcher + custom domain support)
- Logos drop-in (SVG + PNG variants → `assets/logos/`, entries to config)
- Voice section content from STYLEGUIDE
- Perfex sync direction + auth model
- Email signature generator (port from Hub when ready)

## [2.0.4] — April 29 2026

### Decided — Stark Brand Sheet (Phase 3.3)

- **Concept defined.** Stark Care Pro yearly retainer feature: shareable brand asset page, one URL per client, designed for vendor handoff (printers, media outlets, freelancers). Replaces the brand-PDF and reduces back-and-forth on logo/color/font requests.
- **Stack:** Plain PHP. WordPress, ResourceSpace, Pimcore, and SaaS platforms (Brandfolder/Frontify) all evaluated and rejected. Plain PHP fits the asset volume (~30-50 per client), Nathan's skill set, and the premium positioning best.
- **Architecture:** Per-client folder, `config.php` for all client-specific data, independent installs (no multi-tenant single install). Onboarding a new client = copy folder + drop in assets + edit config.
- **Perfex integration:** Uses same webhook pattern as existing GF→Perfex lead flow. Care Pro cancellation flips `'active' => false` in client config, sheet returns inactive notice. Reactivation reverses.
- **Sales positioning:** Justifies Care Pro retainer through ongoing brand stewardship — most agencies hand off a brand PDF at launch and disappear, Stark keeps the brand sheet current.
- **Timeline:** Parked. Do NOT start until Phase 2 and first Henry Mayo Fitness site are both shipped.

### Added

- **BUILDPLAN.md Phase 3.3 section** — full spec for the Stark Brand Sheet, sections, Definition of Done, decisions log
- **brand-sheet/README.md** — standalone product README capturing architecture, onboarding workflow, Perfex integration, and rejected alternatives. Lives at `~/Projects/stark-phase-2/brand-sheet/README.md` as a placeholder folder for the future product.

### Strategic context

- Original conversation reframed multiple times: design system documentation page → live brand demo → Brandfolder-style portal → DAM productized tier → final framing as "shareable brand sheet for vendor handoff." The vendor-handoff framing is the one that aligns with what clients actually need and what Stark can deliver without building an enterprise platform.
- Henry Mayo Fitness pitch is already submitted, so the brand sheet is no longer gated on that pitch — it's a future Care Pro feature, not a pitch artifact.
- Phase 2 launch is now gated on shipping at least one Henry Mayo Fitness site first. Phase 2 launches with Henry Mayo as the inaugural case study, not before.

## [2.0.3] — April 29 2026

### Repo cleanup
- Archived `Current Child Folder/` (old Phase 1 child theme snapshot) to Drive at `Stark Social Media Agency → Tech → Phase 2 (2026) → Reference/`
- Deleted redundant zip uploads from `starksocial-site/`: `First Pages.zip`, `global.zip`, `Site Features.zip`, `global/Header and Footer Only.zip` — unzipped versions remain, Git history preserves originals
- Deleted generic `START-PROMPT.md` (the five role-specific prompts remain)

### Renamed
- `starksocial-site/` → `site-content/` — disambiguates from `stark-social/` (the active GeneratePress child theme code)
- `pages/Deanna L Miller/` → `pages/team/deanna-miller/`
- `pages/Nathan Imhoff/` → `pages/team/nathan-imhoff/`

### Added
- `NAMING-CONVENTION.md` — locks down where files live (GitHub vs Drive vs Perfex), naming rules for both repo and Drive, folder structures, onboarding checklist for new team members
- INSTRUCTIONS.md updated to reflect new repo structure, new file paths, and to include `NAMING-CONVENTION.md` in `STARK-CONTEXT.md` regeneration command

### Decided
- **Style guide page added to Phase 2 scope.** Single page at `starksocial.com/style-guide`, scoped to Stark's own brand system, components rendered live from production CSS. Dual-purpose — internal design tool during build and sales artifact for Henry Mayo Fitness pitch. Full spec coming to BUILDPLAN.md in next pass.
- Research files (`.docx`) live in Drive at `Stark Social Media Agency` shared drive, not committed to repo by design

### Environment
- Repo location moving from `~/Desktop/starksocial` → `~/Projects/stark-phase-2` (final step of cleanup, executed after this commit)

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
