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
- All plugin logic: Gravity Forms → Perfex CRM webhook, AIOSEO, SearchWP, BetterDocs, FacetWP
- Portfolio CPT structure + ACF Pro fields
- Barlow font stack (self-hosted WOFF2 already in child theme)

### What Changes
- Theme: Pro/X → GeneratePress Premium
- Builder: Cornerstone → GenerateBlocks (or native Gutenberg + custom patterns)
- SEO: AIOSEO (5 addons) → evaluate RankMath Pro consolidation in Phase 3
- CSS delivery: WPCode global → child theme `style.css` + page-specific CSS via `wp_enqueue_scripts`

---

## Stack

| Layer | Current | Phase 2 |
|---|---|---|
| Theme | Themeco Pro/X | GeneratePress Premium |
| Builder | Cornerstone | GenerateBlocks + Gutenberg |
| CSS | WPCode global + per-page | Child theme + enqueued page CSS |
| SEO | AIOSEO + 5 addons | AIOSEO (keep) → evaluate RankMath Phase 3 |
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
- [ ] Migrate current site to staging subdomain
- [ ] Create new GeneratePress install on production
- [ ] Install GeneratePress Premium + GenerateBlocks
- [ ] Port `functions.php` to new child theme
- [ ] Port global CSS to child theme `style.css`
- [ ] Port global + page JS to enqueued scripts
- [ ] Verify Gravity Forms → Perfex webhook still fires
- [ ] Verify all plugin connections (AIOSEO, SearchWP, BetterDocs)
- [ ] Set up GitHub repo for project docs

### Phase 2.1 — Core Pages
- [ ] Home
- [ ] About
- [ ] Contact
- [ ] Services hub

### Phase 2.2 — Service Pages
- [ ] All 6 service pages (shared template, unique content)

### Phase 2.3 — Portfolio
- [ ] Portfolio CPT + ACF fields audit
- [ ] Portfolio archive page
- [ ] Portfolio single template
- [ ] Migrate existing case studies

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
- [ ] PageSpeed audit (target: desktop 90+, mobile 70+)
- [ ] Cross-browser + device testing
- [ ] Accessibility audit (target: maintain 95)
- [ ] Schema/SEO audit
- [ ] DNS cutover from staging to production
- [ ] Post-launch monitoring

---

## Phase 3 (Future)

- Drip campaigns via Perfex CRM for client services
- MainWP full integration + client site reporting
- SEO stack consolidation (evaluate RankMath Pro)
- Navigation/menu final lockdown
- Performance push (target: mobile 85+)

---

## Key URLs & Infrastructure

- **Live site:** `starksocial.com`
- **Staging:** TBD
- **Perfex Hub:** `hub.starksocial.com`
- **MainWP:** `cpanel.starksocial.com`
- **Cloudways Server:** 676057
- **Perfex App ID:** `knaqmwdvju`
- **Gravity Forms → Perfex webhook:** `hub.starksocial.com/webhooks/lead.php`
- **Webhook secret:** stored in `wp-config.php`

---

## Notes

- `wp_49z880xoig_mainwp_stream` tables missing in WP DB — MainWP stream plugin tables not yet created; non-blocking warning
- BetterDocs: all default styles are dequeued in `functions.php`; custom styling in global CSS
- Gravity Forms: all default styles dequeued; custom styling in global CSS
- Podcast scripts conditionally loaded only on podcast pages (already optimized)
- Blog rewrites: `/blog/` and `/blog/page/N/` handled via `add_rewrite_rule` in `functions.php`
- Podlove DB tables: `wp_podlove_episode` — queried directly in `starkpodmeta` shortcode
