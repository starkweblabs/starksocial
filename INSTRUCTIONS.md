# INSTRUCTIONS.md — Stark Social Project System
**Project:** starksocial.com Phase 2  
**Last Updated:** April 2026  
**Read this first — every chat, every session.**

---

## What This Project Is

A full rebuild of starksocial.com from Themeco Pro/X + Cornerstone to GeneratePress Premium + GenerateBlocks. This is a multi-chat system where each Claude chat has a specific role and they coordinate through shared markdown files on GitHub.

**Nathan Imhoff is Project Director.** All decisions go through him. Claude chats execute, Nathan approves.

---

## The Five Chats

| Chat Name | Role | Start Prompt File |
|---|---|---|
| `Stark — Build` | GeneratePress, CSS, PHP, templates, components | `START-PROMPT-BUILD.md` |
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
cd ~/Desktop/starksocial
cat BUILDPLAN.md CHANGELOG.md ERRORLOG.md STYLEGUIDE.md SEO-STRATEGY.md VOICE-GUIDE.md > STARK-CONTEXT.md
```
2. Open a new Claude chat (or continue existing one)
3. Name it correctly (e.g. `Stark — Build`)
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
cd ~/Desktop/starksocial
git add .
git commit -m "Brief description of what changed"
git push
```

That's it. Every other chat will have the latest context next time.

---

## The Logging Requirement

Every chat must log at session end. Claude provides exact text to add to:

- **CHANGELOG.md** — what was completed this session (newest first)
- **ERRORLOG.md** — any errors encountered and how they were fixed
- **BUILDPLAN.md** — check off completed items, update status
- **SEO-STRATEGY.md** — SEO decisions and keyword assignments (SEO chat only)
- **VOICE-GUIDE.md** — voice/copy decisions (Copy chat only)

**Never skip this step.** It's what keeps all five chats in sync.

---

## File Structure

```
starksocial/                          ← GitHub repo root
│
├── INSTRUCTIONS.md                   ← Read this first (you are here)
├── BUILDPLAN.md                      ← Master build plan + checklist
├── CHANGELOG.md                      ← Everything completed, newest first
├── ERRORLOG.md                       ← Errors, fixes, warnings
├── STYLEGUIDE.md                     ← Brand, design, CSS, code standards
├── SEO-STRATEGY.md                   ← Keywords, schema, local SEO plan
├── VOICE-GUIDE.md                    ← Brand voice, copy patterns, market messaging
├── STARK-CONTEXT.md                  ← Combined context (regenerate before each chat)
│
├── START-PROMPT-BUILD.md             ← Paste to start Stark — Build
├── START-PROMPT-SEO.md              ← Paste to start Stark — SEO
├── START-PROMPT-COPY.md             ← Paste to start Stark — Copy
├── START-PROMPT-BLOG.md             ← Paste to start Stark — Blog
├── START-PROMPT-QA.md               ← Paste to start Stark — QA
│
├── starksocial-site/                 ← Site asset files
│   ├── global/
│   │   ├── global-css.css            ← Full global CSS from WPCode
│   │   ├── global-js.js              ← Full global JS from WPCode
│   │   └── functions.php             ← Child theme functions.php
│   │
│   └── pages/
│       ├── home/
│       │   ├── content.txt           ← Page copy
│       │   ├── page-css.css          ← Page-specific CSS
│       │   ├── page-js.js            ← Page-specific JS (delete if none)
│       │   ├── Homepage-Desktop.png  ← Desktop screenshot
│       │   └── Homepage-Mobile.png   ← Mobile screenshot
│       ├── about/
│       ├── contact/
│       └── [other pages as completed]
│
└── research/                         ← Voice of customer + competitive intel
    ├── 01_-_Stark_Data_Dump.docx
    ├── 02_-_Voice_Of_Customer_Research.docx
    ├── 03_-_Competitive_Intelligence_Research_-_Overall.docx
    └── 04_-_Competitive_Intelligence_Research_-_Santa_Clarita_Focused.docx
```

---

## What's Safe to Add to the Repo

✅ Safe:
- `.md` files
- `.css` files
- `.js` files
- `.txt` files
- `.php` files
- `.png` / `.jpg` screenshots and mockups
- `.docx` research files
- `.zip` of child theme (no credentials inside)

❌ Never add:
- `.html` exports from the live site (contain embedded credentials and OAuth tokens)
- `wp-config.php` or any file with passwords, API keys, or secrets
- Database exports
- Any file containing tokens, OAuth credentials, or private keys

---

## Chat Boundaries — Who Does What

**Build chat handles:**
- GeneratePress child theme setup
- All CSS porting and writing
- All PHP (functions.php, CPTs, shortcodes)
- Page templates in GenerateBlocks
- Navigation (header, footer, mega menu, mobile menu)
- Plugin configuration (ACF, Gravity Forms, BetterDocs, FacetWP, SearchWP)
- Audio player (blog + podcast unified player)
- ElevenLabs API integration
- Password generator rebuild

**SEO chat handles:**
- RankMath Pro configuration
- Schema markup per page type
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

**Blog chat handles:**
- Audit of existing posts (keep/refresh/delete)
- Post rewrites and refreshes
- 2026 content calendar
- New post drafts

**QA chat handles:**
- PageSpeed audits (staging only — never live)
- Accessibility checks
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
| Staging app ID | `rctcpyewsk` |
| Cloudways server | `676057` |
| Perfex Hub | `hub.starksocial.com` |
| Perfex app ID | `knaqmwdvju` |
| MainWP | `cpanel.starksocial.com` |
| GF → Perfex webhook | `hub.starksocial.com/webhooks/lead.php` |
| GitHub repo | `github.com/starkweblabs/starksocial` |

**Important:** All build work happens on staging. Never modify the live site during Phase 2.

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

1. `cd ~/Desktop/starksocial`
2. `cat BUILDPLAN.md CHANGELOG.md ERRORLOG.md STYLEGUIDE.md SEO-STRATEGY.md VOICE-GUIDE.md > STARK-CONTEXT.md`
3. Open new Claude chat
4. Paste role prompt from `START-PROMPT-[CHAT].md`
5. Paste `STARK-CONTEXT.md` contents
6. Attach relevant asset files
7. Tell Claude what you're working on
