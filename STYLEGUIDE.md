# STYLEGUIDE.md — Stark Social Media Agency
**Project:** starksocial.com  
**Last Updated:** April 2026  
**Scope:** Brand, visual design, CSS conventions, code standards, copy voice

---

## Brand Colors

```css
/* Primary */
--stark-dark-blue:         #004C97;
--stark-primary-red:       #F93822;
--stark-primary-light-blue:#307FE2;

/* Secondary */
--stark-secondary-orange:  #FF8200;
--stark-secondary-yellow:  #FEDD00;
--stark-secondary-green:   #00B140;
--stark-secondary-purple:  #87189D;
--stark-secondary-magenta: #E31C79;

/* Dark background */
--stark-bg:                #0b0f1a;

/* Gradients */
--gradient-dark-blue:      linear-gradient(135deg, #0C4E97 0%, #1D65B8 100%);
--gradient-red:            linear-gradient(135deg, #F93822 0%, #DA291C 100%);
--gradient-light-blue:     linear-gradient(135deg, #307FE2 0%, #539AEF 100%);
```

Hover variants of each gradient reverse direction (`hover` suffix).

---

## Typography

**Font:** Barlow + Barlow Condensed (self-hosted WOFF2 in child theme `/fonts/`)  
**Base:** `18px` / `line-height: 1.65`  
**Smoothing:** `-webkit-font-smoothing: antialiased`

### Type Scale

| Element | Size | Weight | Letter-spacing |
|---|---|---|---|
| h1 | `clamp(2.6rem, 4vw, 3.6rem)` | 800 | -0.03em |
| h2 | `clamp(1.85rem, 2.4vw, 2.45rem)` | 800 | -0.02em |
| h3 | `clamp(1.25rem, 1.6vw, 1.55rem)` | 800 | -0.015em |
| h4 | `1.1rem` | 750 | -0.01em |
| h5 | `1rem` | 700 | -0.005em |
| h6 | `0.95rem` | 700 | 0 |
| Body | `1rem` / `18px` | 400 | — |
| Eyebrow | `0.78rem` | 700 | `0.14em` uppercase |
| Small/meta | `0.92rem` | 400 | — |

---

## UI Tokens

```css
/* Text */
--stark-text:       #111;
--stark-muted:      rgba(17,17,17,.62);
--stark-muted-2:    rgba(17,17,17,.48);

/* Surfaces */
--stark-surface:    #fff;
--stark-rule:       rgba(17,17,17,.14);
--stark-rule-soft:  rgba(17,17,17,.08);

/* Accent (dynamic, seasonal) */
--stark-accent:          rgba(48,127,226,0.85);
--stark-accent-soft:     rgba(48,127,226,0.14);
--stark-accent-glow:     rgba(48,127,226,0.35);

/* Border radii */
--stark-radius-card: 14px;
--stark-radius-ui:   16px;
--stark-radius-field:14px;
--stark-radius-btn:  12px;

/* Layout widths */
--stark-max-wide:    1400px;
--stark-max-search:  1040px;
--stark-max-article: 960px;
```

---

## Seasonal Accents

The accent color shifts subtly per season via `data-stark-season` on `<html>`:

| Season | Months | `--stark-accent` |
|---|---|---|
| Spring | Mar–May | `rgba(68,149,255,.90)` |
| Summer | Jun–Aug | `rgba(33,165,255,.88)` |
| Fall | Sep–Nov | `rgba(30,92,195,.88)` |
| Winter | Dec–Feb | `rgba(92,178,255,.82)` |

Set inline in `<head>` via inline JS snippet to prevent flash.

---

## Layout System

### Sections
`.stark-section` — base padding: `clamp(5rem, 12vh, 9rem) 0`  
`.stark-section-tight` — `clamp(3.75rem, 9vh, 6.5rem) 0`  
`.stark-section-loose` — `clamp(6.5rem, 14vh, 11rem) 0`

### Containers
`.stark-inner` — max-width `1400px`, horizontal padding `clamp(20px, 3vw, 56px)`  
`.stark-inner-narrow` — max-width `960px`  
`.stark-inner-medium` — max-width `1040px`

### Breakpoints
- Mobile: `≤ 599px`
- Tablet: `600px – 899px`
- Desktop: `≥ 900px`

---

## Components

### Buttons

**Base class:** `.x-anchor-button.stark-btn`  
All buttons use glass morphism base: `backdrop-filter: blur(10px)`, `border: 1px solid rgba(...)`, lift on hover (`translateY(-2px)`).

| Class | Description |
|---|---|
| `.stark-btn` | Default glass/white button |
| `.blue-btn` | Dark blue gradient, white text |
| `.magenta-btn` | Magenta gradient, white text |
| `.stark-glass-magenta` | Glass magenta, semi-transparent |
| `.white-trns-btn` | Transparent white glass (for dark backgrounds) |
| `.ghost-btn` | No background, no border, text-only |
| `.stark-glass-accent` | Accent-tinted glass |
| `.spotify-btn` | Spotify green glass (podcast use only) |

All buttons: `min-height: 52px`, `border-radius: var(--stark-radius-btn)`, `font-weight: 750`.  
Mobile: `min-height: 46px`, `border-radius: 14px`.  
Focus: `outline: 3px solid rgba(254,221,0,0.9)` (yellow — accessibility compliant).

### Cards

**`.stark-card`** — Glass morphism card with radial gradient overlay:  
- `background: rgba(255,255,255,0.78)`, `backdrop-filter: blur(14px)`  
- `border: 1px solid rgba(0,0,0,0.06)`, `border-radius: 14px`  
- Hover: `translateY(-2px)`, deeper shadow

**`.stark-halo-card`** — Editorial signal rows (not interactive):  
- No background, no border, no box-shadow  
- Left dot: `5px` circle, `rgba(48,127,226,0.55)` with halo ring  
- Hairline divider between items  
- `cursor: default` — explicitly non-interactive

**`.stark-process-card`** — Process/steps:  
- White background, subtle border, numbered step badge

**`.stark-outcome`** — Results/outcomes:  
- White, hover border accent `rgba(0,76,151,0.18)`

### Navigation

**`.stark-nav`** — Hero overlay nav (white text)  
**`.stark-sticky-nav`** — Sticky nav, appears on scroll:  
- `background: rgba(255,255,255,.90)`, `backdrop-filter: blur(10px)`  
- Scroll progress bar via `--stark-scroll` CSS variable  
- Velocity glow effect via `--stark-vel`

**Off-canvas menu** (mobile): Dark glass, `rgba(10,56,120,0.58)` → `rgba(5,34,84,0.78)` gradient, `blur(14px)`.  
Menu items: `border-radius: 14px`, hover shifts `translateX(2px)`.

### CTA Section

`.stark-cta` — Dark blue gradient background (`--gradient-dark-blue`)  
Two-column grid: copy left, actions right (stacks on mobile).  
Primary button: red gradient. Secondary: transparent with white border.

### FAQ

`.stark-faq-item` — List items with left dot, hover background tint.  
Dot animates on hover: `rgba(48,127,226,0.7)` fill.

---

## Interaction Patterns

- **Hover lift:** `translateY(-2px)` — universal for cards, buttons
- **Hover press:** `translateY(0) scale(0.99)` — button active state  
- **Transition timing:** `180ms cubic-bezier(.2,.8,.2,1)` — standard  
- **Fast transitions:** `160ms ease` — buttons, menu items
- **Reveal animation:** `.stark-reveal` + IntersectionObserver, `threshold: 0.15`  
- **Tilt effect:** `.stark-tilt` — `rotateX/Y(±3deg)` on mousemove, clamped  
- **Always:** `@media (prefers-reduced-motion: reduce)` — disable all motion, `transition: none`

---

## Design Principles (Nathan's Aesthetic)

- **Apple-minimal:** Clean hairlines, generous whitespace, gray secondary text
- **No bold color bars** as decorative elements
- Glass morphism is used for depth, not decoration — always with purpose
- Radial gradient overlays on cards create material quality without complexity
- Typography does the work: tight letter-spacing, large weight contrast (400 body / 800 headings)
- Seasonal accents: subtle shifts, never jarring, always within the blue family
- CTA sections are the exception: full dark blue, this is intentional contrast

---

## Code Standards

### PHP
- All functions prefixed `stark_`
- Hooks use anonymous functions for single-use; named functions for anything hooked in multiple places
- Transient caching for any DB queries in frontend output (key: `stark_{descriptor}_{id}`)
- Never store API keys in `functions.php` — use `wp-config.php` constants
- All DB queries use `$wpdb->prepare()`
- File includes in `~/public_html/` subdirectories only (not root — CodeIgniter routing blocks root PHP)

### CSS
- All custom properties on `:root`; seasonal overrides via `html[data-stark-season]`
- `!important` is acceptable in child theme overrides of Theme.co — will be removed in Phase 2
- Prefix all component classes with `stark-`
- BEM-lite: `.stark-component__element` for sub-elements when needed
- Never override WordPress core admin styles from frontend CSS

### JavaScript
- All JS wrapped in IIFE `(function(){})()` or arrow IIFE
- Check `prefers-reduced-motion` before any animation
- Use `{ passive: true }` on all scroll/touch event listeners
- IntersectionObserver preferred over scroll listeners for reveal
- Builder/preview detection: check for `.cs-preview` or `#cs-content` before running motion JS

### WordPress
- All CPTs registered in `functions.php` (not plugins) unless complex enough to warrant a plugin
- Conditionally enqueue scripts/styles — nothing global unless truly needed everywhere
- WPCode for global CSS/JS injection (Phase 1); child theme enqueue (Phase 2)

---

## Email / Notification Design

- **Layout:** Div-based, no tables (avoids `wpautop` injection)
- **Dark mode:** Tested in Apple Mail dark mode — no table cells that invert
- **Spark:** Tested — no background-color conflicts
- **Logo path:** `hub.starksocial.com/media/public/custom/emails/stark-logo-light.png`
- **Footer bar:** `hub.starksocial.com/media/public/custom/emails/email-footer-bar.png`
- Match Perfex Hub template styling: Dark Blue header, white body, footer bar

---

## Voice & Tone

- **Direct:** No filler, no "we're passionate about..." — say what you do
- **Confident without ego:** State outcomes, not superlatives
- **Human:** Write like a smart person talking, not a brochure
- **Agency, not freelancer:** "We" not "I" — team language
- **Proof over promises:** Lead with results where possible ("clients sending emails")
- **Accessible:** Plain English — no jargon unless the audience expects it

### Copy Patterns
- Eyebrows: SHORT CAPS, 2–4 words, no period
- Headlines: Sentence case, no period, tight letter-spacing
- Body: 2–3 sentences max per paragraph on marketing pages
- CTAs: Action verb first — "Get a proposal", "See our work", "Start here"

---

## Accessibility

- WCAG 2.1 AA target (currently scoring 95 on PageSpeed)
- Focus ring: `3px solid rgba(254,221,0,0.9)` (yellow) — consistent site-wide
- All interactive elements: `min-height: 44px`, `min-width: 44px` on mobile
- All images: descriptive `alt` text
- Heading hierarchy: never skip levels
- Color contrast: all text on backgrounds meets 4.5:1 minimum
- Reduced motion: all animations gated on `prefers-reduced-motion`

---

## File Structure (Phase 2 Child Theme)

```
starksocial/
├── style.css           ← Theme declaration only
├── functions.php       ← All PHP hooks, CPTs, shortcodes
├── custom.css          ← Global design system CSS (ported from WPCode)
├── fonts/              ← Barlow WOFF2 files
│   ├── barlow-v13-latin-regular.woff2
│   ├── barlow-v13-latin-500.woff2
│   ├── barlow-v13-latin-600.woff2
│   ├── barlow-v13-latin-700.woff2
│   ├── barlow-v13-latin-800.woff2
│   ├── barlow-condensed-v13-latin-regular.woff2
│   ├── barlow-condensed-v13-latin-500.woff2
│   ├── barlow-condensed-v13-latin-600.woff2
│   └── barlow-condensed-v13-latin-700.woff2
├── js/
│   ├── stark-global.js ← Season, scroll progress, velocity
│   ├── stark-reveal.js ← IntersectionObserver reveal + tilt
│   └── author-box.js   ← Author login attribute
├── img/                ← Theme-specific SVGs
├── passgen/            ← Password generator (keep as-is)
└── framework/          ← Custom template views
    └── views/custom/
        └── wp-404.php
```
