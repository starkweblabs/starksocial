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
