# NAMING-CONVENTION.md — Stark Social Systems
**Project:** Stark Social Agency Operations
**Last Updated:** April 29, 2026
**Read this before naming any file, folder, or chat.**

---

## Purpose

This document locks down two things:

1. **Where files live** — GitHub, Google Drive, or Perfex Hub.
2. **How files are named** — so the team can find anything in under 30 seconds.

If you're new, read this start to finish before creating, renaming, or moving anything. If you're confused about where something belongs, ask Nathan — don't guess.

---

## The Three Systems

Stark Social runs on three systems, each with one job. Files live in exactly one of them.

| System | Job | Examples |
|---|---|---|
| **GitHub** | Build & coordination | Code, markdown, content drafts, signature feature CSS |
| **Google Drive** | Business & assets | Research, deliverables, pitch decks, client meeting notes |
| **Perfex Hub** | Client-facing portal | Active project status, invoices, CRM, client communication |

### What goes in GitHub

Anything that meets ALL of these:
- Text-based (`.md`, `.css`, `.js`, `.php`, `.txt`, `.html`, `.json`)
- Benefits from version history
- Read by Claude chats during build sessions
- Under ~5MB per file

Specifically:
- All `.md` coordination files (BUILDPLAN, CHANGELOG, ERRORLOG, etc.)
- All site code (CSS, JS, PHP, templates)
- All page content drafts as `.txt` files
- Small screenshots that document component states (compressed PNG)
- Style guide page templates and tokens

### What goes in Google Drive

Anything that meets ANY of these:
- Binary or non-diffable (`.docx`, `.pdf`, `.psd`, `.ai`, `.mp4`, `.zip`)
- Larger than ~5MB
- Needs realtime collaborative editing (Google Docs, Sheets)
- Sent to or received from clients
- Doesn't need version history

Specifically:
- Voice-of-customer research, competitive intel, discovery notes
- Original photography, hero images, video assets
- Pitch decks, proposals, contracts (working drafts)
- Client-facing style guides and brand systems (deliverables)
- Meeting recordings and transcripts
- Pre-launch screenshots used in case studies

### What goes in Perfex Hub

Anything client-facing and live:
- Active project status visible to client
- Invoices and payment records
- Support tickets
- Project deliverables once they're approved and shared with the client
- Drip campaign management (eventually)

### What goes nowhere

- Files with credentials, API keys, OAuth tokens, passwords
- `wp-config.php`, `.env` files, database exports
- Any `.html` exports from a live site
- Anything you can't share with a new contractor on day one

These get destroyed or stored in a password manager (1Password, Bitwarden). Never in any of the three systems above.

---

## Repo Naming Rules (GitHub)

Repo files live in terminals, URLs, and code. They follow strict rules.

### Format

```
[scope]-[role]-[subject]-[detail].[ext]
```

- **scope** — `stark`, `hmf` (Henry Mayo Fitness), `hmh` (Henry Mayo Hospital), or omit if obviously Stark
- **role** — `build`, `seo`, `copy`, `blog`, `qa` (matches chat names)
- **subject** — what the file is about
- **detail** — version, date, or qualifier — only when needed

### Hard Rules

- **Lowercase only.** `homepage.css` not `Homepage.css`.
- **Hyphens, not underscores or spaces.** `nav-mobile.css` not `nav_mobile.css` or `nav mobile.css`.
- **No parentheses, brackets, or special characters.** Never `homepage(2).css`.
- **No `(1)` or `(2)` for versions.** Use `-v2`, `-v3`.
- **ISO dates only.** `2026-04-29` — never `4-29-26` or `april-29`.
- **Extensions always lowercase.** `.png` not `.PNG`.
- **Top-level docs in CAPS.** `BUILDPLAN.md`, `CHANGELOG.md`, `INSTRUCTIONS.md` — these are signals, not files you scroll past.

### Folders Carry Context — Don't Repeat It

If a file lives in `pages/home/`, the filename does not include "home."

```
✅ pages/home/content.txt
✅ pages/home/page-css.css
✅ pages/about/content.txt

❌ pages/home/home-content.txt
❌ pages/home/homepage-page-css.css
```

### Examples

```
✅ BUILDPLAN.md
✅ NAMING-CONVENTION.md
✅ stark-seo-keyword-map.md
✅ stark-qa-pagespeed-2026-04-29.md
✅ pages/home/content.txt
✅ pages/home/Homepage-Desktop.png      ← screenshot exception, see below
✅ global/global-css.css
✅ global/functions.php

❌ Stark SEO Keyword Map.md             ← spaces, capitals
❌ pages/home/Page CSS (final).css      ← spaces, parens, vague version
❌ stark_qa_pagespeed_4-29-26.md        ← underscores, non-ISO date
```

### Screenshot Exception

Screenshots saved automatically by macOS/browser tools come in with capitalized names like `Homepage-Desktop.png`. These can stay as-is to avoid friction. New screenshots should still follow the convention where practical.

---

## Repo Folder Structure

The repo's folder layout is established in `INSTRUCTIONS.md`. Two rules for adding new folders:

1. **Mirror existing patterns.** New page folders go in `starksocial-site/pages/[page-name]/` with the same internal structure as `home/`.
2. **Lowercase, hyphens, descriptive.** `case-studies/` not `CaseStudies/` or `case_studies/`.

---

## Drive Naming Rules (Google Drive)

Drive files live in a GUI, get shared with clients, and are read by people who don't know what `kebab-case` means. Different rules apply.

### Format

```
[Scope] [Phase] — [Role] — [Subject] [Status/Version]
```

The em-dash (`—`) matches the chat naming convention (`Stark — Build`). Visual continuity matters when switching between Drive and chats all day.

### Rules

- **Capitalize normally.** Title Case for major words.
- **Spaces are fine.** This is a GUI, not a terminal.
- **Use em-dashes (`—`) to separate sections.** Cleaner than hyphens for compound names.
- **Status suffix at the end.** `Draft`, `v2`, `v3`, `Final`, or ISO date.
- **No "Final" alone.** "Final" lies. If you must use it, pair with date or version: `Homepage Copy Final 2026-04-29.docx`. Better: just version it (`v4`, `v5`).
- **ISO dates only.** Same as repo. `2026-04-29` not `4/29/26`.
- **No emojis in filenames.** They break searches and look unprofessional in client-facing folders.

### Examples

```
✅ Stark P2 — Build — Homepage Mockup v3.png
✅ Stark P2 — Copy — Services Page Draft.docx
✅ Stark P2 — Research — Voice of Customer.docx
✅ Stark P2 — QA — PageSpeed Audit 2026-04-29.pdf
✅ Henry Mayo Fitness — Pitch Deck v2.pdf
✅ Henry Mayo Fitness — Discovery Notes 2026-04-29.docx
✅ Henry Mayo Fitness — Style Guide Sample v1.pdf

❌ homepage_final_FINAL_v2.png          ← multiple finals, underscores
❌ HMF deck.pdf                         ← undefined abbreviation
❌ Pitch Deck (newest).pdf              ← parens, vague
❌ 🔥 Pitch Deck.pdf                     ← emoji
```

### Client Codes

Spell out client names until you have 5+ active clients. `Henry Mayo Fitness` is clearer than `HMF` and worth the extra characters. Revisit when scale demands abbreviation, and when you do, document the codes in this file.

---

## Drive Folder Structure

```
Stark Social Media Agency (shared drive)
│
├── Tech/                              ← Stark's own tech & dev work
│   ├── Phase 2 (2026)/                ← current rebuild project assets
│   │   ├── Research/                  ← VOC, competitive intel
│   │   ├── Screenshots/               ← heavy mockups, before/afters
│   │   ├── Mockups/                   ← Figma exports, design rounds
│   │   └── Deliverables/              ← finished assets, pitch versions
│   ├── Phase 1 Archive (2020)/        ← old build, reference only
│   ├── Original Site Archive (2015)/  ← original site, reference only
│   └── Backups/                       ← site backups (zipped)
│
├── Clients/                           ← per-client folders
│   ├── Henry Mayo Fitness/
│   │   ├── 01 Pitch/                  ← pre-engagement
│   │   ├── 02 Discovery/              ← discovery phase
│   │   ├── 03 Build/                  ← active build
│   │   └── 04 Launch/                 ← post-launch deliverables
│   └── [other clients follow same pattern]
│
├── Operations/                        ← internal agency stuff
│   ├── Templates/                     ← reusable proposals, decks
│   ├── Contracts/                     ← signed agreements
│   ├── Brand/                         ← Stark's own brand assets
│   └── HR/                            ← team docs
│
└── Research/                          ← cross-client research, market intel
```

### Numbered Prefixes for Sequences

When folders represent a process (pitch → discovery → build → launch), use numbered prefixes (`01_`, `02_`) to force the right sort order. Otherwise alphabetical sort puts "Discovery" before "Pitch" — wrong.

### One Folder, One Purpose

If you find yourself wanting to put a file in two folders, one of these is true:
- The folder structure is wrong (fix it)
- The file should be linked from the second location, not duplicated (link via shortcut)
- The file is two things and should be split

Never duplicate files across folders. Drift starts immediately.

---

## Versioning, Dates, and Status

### Versions

Use `v1`, `v2`, `v3` — incrementing integers. No `v1.1`, `v1.2.3`, or other semver in filenames.

```
✅ Homepage Mockup v3.png
❌ Homepage Mockup v3.2.png
❌ Homepage Mockup version 3.png
```

### Dates

ISO format only: `YYYY-MM-DD`.

```
✅ 2026-04-29
❌ 4/29/26
❌ April 29, 2026
❌ 04292026
```

Why: ISO dates sort correctly in any file browser, parse universally, and avoid the US-vs-Europe ambiguity (`05-04` is May 4 in the US, April 5 in Europe).

### Status

For things that iterate over many versions, prefer dates. For things with discrete approval gates, prefer status:

- `Draft` → for in-progress
- `v2`, `v3`, etc. → for client-reviewed versions
- `Approved` → only when client has explicitly signed off
- `Archive` → for old versions kept for reference

Avoid: `Final`, `FINAL`, `Latest`, `Newest`, `Updated`. They lie.

---

## Forbidden Patterns

Things that cause real problems and should never happen:

| Pattern | Why It's Bad |
|---|---|
| `homepage_FINAL_v2_actually_final.docx` | You laugh, but it happens. Use proper versioning. |
| `Homepage (1).png`, `Homepage (2).png` | Drive auto-numbers on conflict. Rename immediately. |
| Spaces in repo files | Breaks terminal commands, URLs |
| Capital extensions (`.PNG`, `.JPG`) | Inconsistent across systems |
| `My Folder` in shared spaces | Possessives don't belong in shared drives |
| Files at the root of shared drive | Always belong inside a top-level category folder |
| Date as `2026_04_29` or `26-04-29` | Use ISO: `2026-04-29` |
| Files in two places | Pick one. Link from the other. |

---

## When Things Have to Move

If a file is in the wrong place, move it — don't copy it. After moving:

1. Update any references to the old location (in markdown files, in code)
2. Add a CHANGELOG.md entry noting the move
3. If it was in the repo, commit the move with a clear message: `git mv old/path new/path` then `git commit -m "move: [reason]"`

If a file is in the wrong format (binary in repo, text in Drive), convert it or move it. Don't leave hybrid messes.

---

## Onboarding Checklist for New Team Members

When someone new joins the team, they get access in this order:

1. **GitHub** — added as collaborator on `github.com/starkweblabs/starksocial`
2. **Google Drive** — added to `Stark Social Media Agency` shared drive
3. **Perfex Hub** — added as agency staff (not client)
4. **Password manager** — added to relevant vaults only

Before they touch anything, they read:
- `INSTRUCTIONS.md` (in repo root) — what the project is and how chats coordinate
- `NAMING-CONVENTION.md` (this file) — where things live and how they're named
- `BUILDPLAN.md` — what's currently being built
- The relevant `START-PROMPT-*.md` for whatever role they'll play

Their first task should always be a small, contained one — not a big-bang assignment. Test the system, then scale up.

---

## When to Break the Rules

Rules of thumb, not laws. Break them when:

- A file is so widely-known by a specific name that renaming would cause confusion (legacy carve-out — document the exception here)
- A client has their own naming convention you must respect inside their folder
- A tool (CMS, plugin) requires a specific filename that violates the convention

Document any exception inline in the relevant folder's README, or in this file under a new "Exceptions" section. Undocumented exceptions become new rules by accident.

---

## Updating This Document

Changes to this convention go through Nathan. To propose a change:

1. Open a PR against this file with the change clearly described
2. Note in the PR what existing files would need to be renamed to match
3. Wait for approval

Never silently change naming patterns mid-project — drift kills the system.
