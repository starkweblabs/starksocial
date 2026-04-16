# Stark Social — Site Assets

This folder contains all CSS, JS, and content extracted from the live starksocial.com site for use in the Phase 2 GeneratePress rebuild.

## Structure

```
global/
  global-css.css      ← Full global CSS from WPCode
  global-js.js        ← Full global JS from WPCode
  functions.php       ← Child theme functions.php (from starksocial.zip)

pages/
  [page-name]/
    content.txt       ← Page copy and content
    page-css.css      ← Page-specific CSS from Cornerstone
    page-js.js        ← Page-specific JS from Cornerstone (delete if none)

templates/
  [template-name]/
    template-notes.txt  ← Template logic and CPT field notes
    template-css.css    ← Template CSS
    template-js.js      ← Template JS (delete if none)
```

## How to fill these in

### Global CSS + JS
1. Log into starksocial.com WP Admin
2. Go to WPCode → Snippets
3. Find global CSS snippet → copy all → paste into `global/global-css.css`
4. Find global JS snippet → copy all → paste into `global/global-js.js`

### functions.php
Already in starksocial.zip — copy contents into `global/functions.php`

### Page CSS + JS
1. Open each page in Cornerstone
2. Go to page settings → Custom CSS → copy → paste into `pages/[page]/page-css.css`
3. Go to page settings → Custom JS → copy → paste into `pages/[page]/page-js.js`
4. Delete `page-js.js` if the page has no custom JS

### Page Content
Copy the visible text content from each live page into `content.txt`
Focus on: headlines, subheads, body copy, CTA text, list items

## Priority order for filling in

1. `global/` — do this first, applies everywhere
2. `pages/home/` — highest priority page
3. `pages/services/` and all service pages
4. `pages/about/` and `pages/contact/`
5. Templates
6. Utility and legal pages last
