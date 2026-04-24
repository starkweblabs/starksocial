# passgen/ — Password Generator

Self-contained feature folder. Enqueued conditionally in `functions.php`
when the page slug is `password-generator`.

## Files (Phase 1 port — verbatim)

- `passgen.php` — widget markup (returned by the `[password_generator]` shortcode)
- `passgen.js` — DOM bindings, length slider, copy-to-clipboard, password generation
- `passgen.css` — styling (renamed from `1passgen.css`; the Phase 1 enqueue
  referenced `passgen.css` so the theme's own styles were never actually loading —
  the live site was styling this via WPCode globally)

## Phase 2 visual rebuild — required

The current CSS uses pill buttons and iOS-style toggle switches that conflict
with the Apple-minimal glass aesthetic. Full rebuild required before launch.
Reference: STYLEGUIDE.md → Annotated Feature Notes → Password Generator.

### Per Nathan's annotated screenshot

- **Bigger widget** — right-column widget needs more presence, fill more space
- **More spacing, more intentional** — generous padding inside the widget
- **Copy button + form = one unified thing** — COPY PASSWORD button integrated
  into the password output field, not floating above it separately. One
  component: output field with copy action embedded on the right end
- **No pill shapes anywhere** — toggles, buttons, all of it
- **Glass buttons** — `.stark-btn` glass morphism for Generate and Copy
- **Toggles** — replace iOS pill toggles with Stark-styled checkbox buttons
  or small glass toggle chips using `--stark-radius-btn`

### Target styling

- `stark-card` container for the widget (`rgba(255,255,255,.78)`, `backdrop-filter: blur(14px)`)
- Slider: accent blue `--stark-accent` thumb and fill
- Buttons: `.stark-btn.blue-btn` for Generate, ghost/secondary for Copy
- Generated output: monospace, red (`--stark-primary-red`) — matches the
  existing `code` element style
- Form inputs: match the site-wide form standard from STYLEGUIDE (sidebar
  search reference):
  - `background: rgba(255,255,255,0.92)`
  - `border: 1px solid rgba(0,0,0,0.10)`
  - `border-radius: var(--stark-radius-field)` (14px)
  - `box-shadow: 0 0.75rem 1.75rem rgba(0,0,0,0.08)`
  - Focus: `border-color: rgba(48,127,226,0.55)`, `box-shadow: 0 0 0 0.25rem rgba(48,127,226,0.18)`

### Implementation plan

1. Rewrite `passgen.php` markup: change `.container > .form-inner-wrapper`
   structure so the copy button lives **inside** the output field's wrapper
2. Rewrite `passgen.css` from scratch using Stark design tokens (no
   `!important` unless absolutely needed)
3. Keep `passgen.js` mostly as-is — selectors may need minor updates if
   markup changes
4. Test on staging, verify accessibility (focus rings, label associations,
   keyboard-only use)

**Owner:** Claude — Build
**Priority:** Phase 2.5 (Support & Utility) — not blocking core pages
