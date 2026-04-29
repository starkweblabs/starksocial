# INSTRUCTIONS.md — Stark Social Project System
**Project:** starksocial.com Phase 2
**Last Updated:** April 29, 2026
**Read this first — every chat, every session.**

---

## What This Project Is

A full rebuild of starksocial.com from Themeco Pro/X + Cornerstone to GeneratePress Premium + GenerateBlocks. This is a multi-chat system where each Claude chat has a specific role and they coordinate through shared markdown files on GitHub.

**Nathan Imhoff is Project Director.** All decisions go through him. Claude chats execute, Nathan approves.

---

## The Six Chats

| Chat Name | Role | Start Prompt File |
|---|---|---|
| `Stark — Build` | GeneratePress, CSS, PHP, templates, components (Phase 2 site rebuild) | `START-PROMPT-BUILD.md` |
| `Stark — Style Guide` | Style guide page on current site + Phase 2 port | `START-PROMPT-STYLEGUIDE.md` |
| `Stark — SEO` | RankMath, schema, local pages, keyword mapping | `START-PROMPT-SEO.md` |
| `Stark — Copy` | Page copy, voice, service pages, case studies | `START-PROMPT-COPY.md` |
| `Stark — Blog` | Blog audit, refresh, 2026 content calendar | `START-PROMPT-BLOG.md` |
| `Stark — QA` | PageSpeed, accessibility, schema validation | `START-PROMPT-QA.md` |

`Stark — Planning` (this repo's origin chat) is retired — decisions are made, plan is locked.

---

## How Every Session Works

### Starting a session
1. Regenerate STARK-CONTEXT.md on your Mac:
```bash
cd ~/Projects/stark-phase-2
cat BUILDPLAN.md CHANGELOG.md ERRORLOG.md STYLEGUIDE.md SEO-STRATEGY.md VOICE-GUIDE.md NAMING-CONVENTION.md > STARK-CONTEXT.md
```
2. Open a new Claude chat (or continue existing one)
3. Name it correctly (e.g. `Stark — Build`, `Stark — Style Guide`)
4. Paste the role prompt from the relevant `START-PROMPT-*.md` file
5. Paste the full contents of `STARK-CONTEXT.md` after the role prompt
6. Attach any relevant asset files (CSS, content, screenshots)
7. Tell Claude what you're working on today

### Ending a session
Claude will provide exact markdown to update the relevant `.md` files. You:
1. Open the file on your Mac
2. Paste in the update
3. Save
4. Push to GitHub:
```bash
cd ~/Projects/stark-phase-2
git add .
git commit -m "Brief description of what changed"
git push
```

That's it. Every other chat will have the latest context next time.

---

## The Logging Requirement

Every chat must log at session end. Claude provides exact text to add to:

- **CHANGELOG.md** — what was completed this session (newest first, follows `## [version] — date` format with subsections like `### Added`, `### Decided`, `### Fixed`, `### Environment`)
- **ERRORLOG.md** — any errors encountered and how they were fixed
- **BUILDPLAN.md** — check off completed items, update status
- **SEO-STRATEGY.md** — SEO decisions and keyword assignments (SEO chat only)
- **VOICE-GUIDE.md** — voice/copy decisions (Copy chat only)
- **STYLEGUIDE.md** — design decisions, token additions (Style Guide chat primary; others secondary)

**Never skip this step.** It's what keeps all six chats in sync.

---

## File Structure

```
stark-phase-2/                        ← GitHub repo root (lives at ~/Projects/stark-phase-2/)
│
├── INSTRUCTIONS.md                   ← Read this first (you are here)
├── NAMING-CONVENTION.md              ← Where files live + how to name them
├── BUILDPLAN.md                      ← Master build plan + checklist
├── CHANGELOG.md                      ← Everything completed, newest first
├── ERRORLOG.md                       ← Errors, fixes, warnings
├── STYLEGUIDE.md                     ← Brand, design, CSS, code standards
├── SEO-STRATEGY.md                   ← Keywords, schema, local SEO plan
├── VOICE-GUIDE.md                    ← Brand voice, copy patterns, market messaging
├── STARK-CONTEXT.md                  ← Combined context (regenerate before each chat)
│
├── START-PROMPT-BUILD.md             ← Paste to start Stark — Build
├── START-PROMPT-STYLEGUIDE.md        ← Paste to start Stark — Style Guide
├── START-PROMPT-SEO.md               ← Paste to start Stark — SEO
├── START-PROMPT-COPY.md              ← Paste to start Stark — Copy
├── START-PROMPT-BLOG.md              ← Paste to start Stark — Blog
├── START-PROMPT-QA.md                ← Paste to start Stark — QA
│
├── stark-social/                     ← Active GeneratePress child theme code
│   ├── functions.php
│   ├── style.css
│   ├── custom.css
│   ├── fonts/                        ← Barlow + Barlow Condensed woff2
│   ├── img/
│   ├── js/                           ← Global JS (stark-global, stark-bottom-ui, etc.)
│   ├── framework/views/
│   └── passgen/                      ← Password generator
│
└── site-content/                     ← Page documentation, content, screenshots
    ├── README.md
    ├── global/
    │   ├── functions.php
    │   ├── global-css.css
    │   ├── global-js.js
    │   ├── Header/
    │   └── Footer/
    │
    ├── pages/
    │   ├── 404/
    │   ├── about/
    │   ├── accessibility-statement/
    │   ├── audit-consulting/
    │   ├── blog/
    │   ├── brand-strategy/
    │   ├── contact/
    │   ├── content-creation/
    │   ├── cookie-policy/
    │   ├── fractional-cmo/
    │   ├── home/
    │   ├── knowledgebase/
    │   ├── paid-advertising/
    │   ├── password-generator/
    │   ├── podcast/
    │   ├── portfolio/
    │   ├── privacy-policy/
    │   ├── search-results/
    │   ├── seo/
    │   ├── services/
    │   ├── social-media-management/
    │   ├── support/
    │   ├── team/
    │   │   ├── deanna-miller/
    │   │   └── nathan-imhoff/
    │   ├── terms-of-service/
    │   └── web-design/
    │
    ├── templates/
    │   ├── author/
    │   ├── blog-archive/
    │   ├── blog-single/
    │   ├── podcast-archive/
    │   ├── podcast-single/
    │   └── portfolio-single/
    │
    └── Site Features/                ← Signature feature reference screenshots
```

**Research files** (Voice of Customer, Stark Data Dump, Competitive Intelligence x2) live in Drive at:
**Stark Social Media Agency → Tech → Phase 2 (2026) → Research/**

They are not committed to the repo by design — `.docx` files don't belong in Git.

---

## What's Safe to Add to the Repo

✅ Safe:
- `.md` files
- `.css` files
- `.js` files
- `.txt` files
- `.php` files
- `.png` / `.jpg` screenshots and mockups (small)
- `.svg` icons and graphics

❌ Never add:
- `.html` exports from the live site (contain embedded credentials and OAuth tokens)
- `wp-config.php` or any file with passwords, API keys, or secrets
- Database exports
- Any file containing tokens, OAuth credentials, or private keys
- `.docx` research files (these go in Drive)
- `.zip` archives — if you need to send Claude a bundle, attach it directly to the chat instead of committing

---

## Chat Boundaries — Who Does What

**Build chat handles:**
- GeneratePress child theme setup
- All CSS porting and writing for Phase 2 site pages
- All PHP (functions.php, CPTs, shortcodes)
- Page templates in GenerateBlocks
- Navigation (header, footer, mega menu, mobile menu)
- Plugin configuration (ACF, Gravity Forms, BetterDocs, FacetWP, SearchWP)
- Audio player (blog + podcast unified player)
- ElevenLabs API integration
- Password generator rebuild

**Style Guide chat handles:**
- Style guide page on current site (`starksocial.com/style-guide`)
- Style guide page port to Phase 2 (`staging.starksocial.com/style-guide` → live at launch)
- Page sections, layout, component demos, token rendering
- Coordinates with Build chat to receive Phase 2 components for porting
- Coordinates with Copy chat for written sections (voice, code standards intros)

**SEO chat handles:**
- RankMath Pro configuration
- Schema markup per page type (including style guide page once it's ready to index)
- Local landing page URL structure and schema
- Keyword mapping from Wincher
- Redirect mapping (AIOSEO → RankMath)
- Sitemap and robots.txt

**Copy chat handles:**
- All page copy (homepage, services, about, contact, local pages)
- Case study copy
- Brand voice decisions
- Email/form copy
- Blog content briefs
- Style guide written sections (voice summary, code standards intros)

**Blog chat handles:**
- Audit of existing posts (keep/refresh/delete)
- Post rewrites and refreshes
- 2026 content calendar
- New post drafts

**QA chat handles:**
- PageSpeed audits (staging only — never live)
- Accessibility checks (including style guide page)
- Schema validation
- Cross-browser testing
- Pre-launch checklist

**Do not cross these boundaries.** If Build chat needs copy, it asks Nathan. If Copy chat needs a technical decision, it asks Nathan. Nathan coordinates across chats.

---

## Key Infrastructure

| Item | Value |
|---|---|
| Live site | `starksocial.com` |
| Staging | `staging.starksocial.com` |
| Live SSH user | `rvqkxhngas` |
| Live app ID | `rvqkxhngas` |
| Staging app ID | `wcrjhscubc` |
| Cloudways server | `676057` |
| Perfex Hub | `hub.starksocial.com` |
| Perfex app ID | `knaqmwdvju` |
| MainWP | `cpanel.starksocial.com` |
| GF → Perfex webhook | `hub.starksocial.com/webhooks/lead.php` |
| GitHub repo | `github.com/starksocialmedia/starksocial` |
| Local repo path | `~/Projects/stark-phase-2/` |

**Important:** All Phase 2 build work happens on staging. Never modify the live site during Phase 2 — except for the Style Guide chat's Phase A work, which deliberately deploys to the current live site at `starksocial.com/style-guide`.

---

## Phase 2 Targets

| Metric | Current | Target |
|---|---|---|
| PageSpeed Mobile | 47 | 85+ |
| PageSpeed Desktop | 79 | 95+ |
| Accessibility | 95 | 98+ |
| Core Web Vitals | Failing | All green |
| RankMath Score | — | 90+ per page |
| Schema Errors | Unknown | Zero |

---

## Signature Features — Must Survive Migration

These are non-negotiable. Every chat must protect them:

1. **Scroll progress bar** — thin blue line, edge to edge, real-time, velocity glow on scroll speed
2. **A11y + back-to-top choreography** — A11y slides right as user scrolls, back-to-top slides in beside it, both match visually
3. **Transparent → frosted glass nav** — transparent on hero, 80px → 56px on scroll, progress bar appears in frosted state only
4. **Mobile accordion menu** — no scroll required, services expand inline, no Back button

---

## Quick Reference — Start Any Chat

1. `cd ~/Projects/stark-phase-2`
2. `cat BUILDPLAN.md CHANGELOG.md ERRORLOG.md STYLEGUIDE.md SEO-STRATEGY.md VOICE-GUIDE.md NAMING-CONVENTION.md > STARK-CONTEXT.md`
3. Open new Claude chat
4. Paste role prompt from `START-PROMPT-[CHAT].md`
5. Paste `STARK-CONTEXT.md` contents
6. Attach relevant asset files
7. Tell Claude what you're working on
