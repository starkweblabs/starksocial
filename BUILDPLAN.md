# BUILDPLAN.md — Stark Social Media Agency
**Project:** starksocial.com Phase 2 Rebuild
**Last Updated:** April 24 2026
**Status:** 🟢 Phase 2.0 in progress

---

## Strategic Decision

**Migrating from Themeco Pro/X + Cornerstone → GeneratePress Premium + Gutenberg/GenerateBlocks**

### Why
- Mobile PageSpeed 47, LCP 9.8s — platform ceiling, not tunable
- Desktop 79, hardware masking builder bloat (149KB unused JS, 6,178KB total)
- Cornerstone export broken
- All visual CSS portable; redesign is already planned

### What Stays
- All custom PHP in `functions.php`
- Plugin logic: Gravity Forms → Perfex CRM webhook, SearchWP, BetterDocs, FacetWP
- Portfolio CPT structure + ACF Pro fields
- Barlow font stack

### What Changes
- Theme: Pro/X → GeneratePress Premium
- Builder: Cornerstone → GenerateBlocks + Gutenberg
- SEO: AIOSEO → RankMath Pro (fresh on staging)
- CSS: WPCode global → child theme `custom.css` + page-specific CSS

---

## Stack

| Layer | Phase 2 |
|---|---|
| Theme | GeneratePress Premium |
| Builder | GenerateBlocks + Gutenberg |
| CSS | `custom.css` in child theme |
| SEO | RankMath Pro |
| Forms | Gravity Forms |
| CRM | Perfex Hub |
| Chat | Perfex PRChat (replaces Olark at launch) |
| Caching | Breeze + Object Cache Pro |
| Search | SearchWP |
| Docs | BetterDocs Pro |
| Hosting | Cloudways |

---

## Page Inventory (22 pages + 4 templates)

### Core (Priority 1)
- [ ] Home (`/`)
- [ ] About (`/about/`)
- [ ] Contact (`/contact/`)
- [ ] Services Hub (`/services/`)

### Services (Priority 2)
- [ ] Social Media Management
- [ ] Paid Social Advertising
- [ ] Web Design
- [ ] SEO
- [ ] Content Creation
- [ ] Brand Strategy & Identity
- [ ] Digital Marketing Audit & Consulting — NEW
- [ ] Fractional CMO — NEW

### Portfolio — NEW in Phase 2
- [ ] Portfolio archive (`/portfolio/`)
- [ ] Portfolio single template
- [ ] Portfolio CPT fields (ACF Pro — already defined)

### Blog & Podcast
- [ ] Blog archive + single
- [ ] Podcast archive + single (Podlove)

### Support
- [ ] Support hub
- [ ] Knowledgebase (`/support/knowledgebase/`)

### Author Pages
- [ ] Nathan Imhoff
- [ ] Deanna L. Miller

### Utility
- [ ] 404
- [ ] Search Results
- [ ] Password Generator

### Legal (copy-forward)
- [ ] Privacy Policy
- [ ] Terms of Service
- [ ] Cookie Policy
- [ ] Accessibility Statement

---

## Phase 2 Build Phases

### Phase 2.0 — Environment Setup
- [x] GitHub repo for project docs
- [x] Migration decision (GeneratePress)
- [x] Child theme v2.0.0 — full Phase 1 port — April 24 2026
- [x] Fresh WordPress on staging (Cloudways app `wcrjhscubc`, server 676057)
- [x] Plugin inventory confirmed active
- [x] GeneratePress parent + child theme uploaded and activated
- [x] `wp-config.php`: `STARK_ENV=staging`, `WP_REDIS_DISABLED=true`, debug flags set
- [x] Bottom UI cluster v2.0.1 — A11y + back-to-top + Perfex chat embed + mobile scroll fix — April 24 2026
- [ ] Paste Phase 1 design tokens + global CSS into `custom.css`
- [ ] Port 13 keeper WPCode snippets into `functions.php`
- [ ] Port Phase 1 scroll progress + velocity JS into `js/stark-global.js`
- [ ] Port AIOSEO podcast breadcrumb filter to RankMath
- [ ] Configure OpenAI API key in Perfex AI Chatbot
- [ ] Verify transparent → frosted glass nav
- [ ] Build mega menu (desktop) + accordion (mobile)

### Phase 2.1 — Core Pages
- [ ] Home · About · Contact · Services hub

### Phase 2.2 — Service Pages (8)
- [ ] All 8 service pages (shared template, unique content)
- [ ] New: Audit & Consulting + Fractional CMO

### Phase 2.3 — Portfolio
- [ ] CPT + ACF fields audit
- [ ] Archive + single template
- [ ] Migrate existing case studies

### Phase 2.4 — Blog & Podcast
- [ ] Archive + single templates for both

### Phase 2.5 — Support & Utility
- [ ] Support hub, knowledgebase, 404, search, password generator, author pages

### Phase 2.6 — Legal
- [ ] Copy-forward 4 legal pages

### Phase 2.7 — QA & Launch
- [ ] PageSpeed (desktop 95+, mobile 85+)
- [ ] Core Web Vitals green
- [ ] Cross-browser + device
- [ ] Accessibility 98+
- [ ] RankMath 90+ per page
- [ ] Schema validation zero errors
- [ ] Local SEO landing pages verified
- [ ] **Remove Olark embed from live before DNS cutover**
- [ ] DNS cutover
- [ ] Post-launch: verify Perfex chat, then cancel Olark subscription

---

## Workstream Ownership

| Chat | Scope |
|---|---|
| `Stark — Build` | GeneratePress, templates, CSS, PHP, components, nav |
| `Stark — SEO` | RankMath, local landing pages, schema, keyword mapping |
| `Stark — Copy` | Voice guide, page copy, service pages, local messaging |
| `Stark — Blog` | Audit, cull, refresh, 2026 content calendar |
| `Stark — QA` | PageSpeed, a11y, schema, cross-browser |

Portfolio: Template (Build) + Copy (Copy) + Schema (SEO).
Nathan: Project Director — decisions, approvals, cross-chat coordination.

---

## Phase 3 (Future)

### Phase 3.1 — Stark Social Ongoing
- Perfex drip campaigns for client services
- MainWP full integration + client site reporting
- Nav refinement based on analytics
- Performance push (mobile 90+)
- Wincher rank tracking review

### Phase 3.2 — Stark Hosting (Separate Site)
- Standalone hosting brand on Cloudways reseller
- Offerings: domain, email, managed + unmanaged WP hosting
- Separate brand, domain, Cloudways app
- Billing via WHMCS or Blesta
- Cross-promoted on starksocial.com
- **Do not start until Phase 2 is live**

---

## Navigation Structure (Locked)

**Desktop:** Transparent on load → slim frosted glass on scroll
**Mobile:** Same transition, burger → full screen dark glass overlay

**Primary nav (5 items):**
- Work (portfolio)
- Services (mega menu, 2×4 grid)
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
**Mobile services:** Accordion expand inline, no Back button

---

## Key URLs & Infrastructure

- Live: `starksocial.com` (app `rvqkxhngas`)
- Staging: `staging.starksocial.com` (app `wcrjhscubc`)
- Perfex Hub: `hub.starksocial.com` (app `knaqmwdvju`)
- MainWP: `cpanel.starksocial.com`
- Cloudways server: 676057
- GF → Perfex webhook: `hub.starksocial.com/webhooks/lead.php`
- Perfex chat widget ID: `67d3563318b5547bfab53fa6366ace82`
- GitHub: `github.com/starkweblabs/starksocial`

---

## Notes

- BetterDocs default styles dequeued in `functions.php`; styling in `custom.css`
- Gravity Forms default styles dequeued
- Podcast scripts conditionally loaded only on podcast pages
- Blog rewrites: `/blog/` + `/blog/page/N/` via `add_rewrite_rule`
- Podlove DB tables: `wp_podlove_episode` queried directly in `starkpodmeta`
- Mobile smooth scroll: kill CSS `scroll-behavior: smooth`; JS does programmatic scroll with touch interrupts
