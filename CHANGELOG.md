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
