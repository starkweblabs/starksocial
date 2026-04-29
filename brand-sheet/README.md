# Stark Brand Sheet

**Product status:** Concept / not yet started
**Phase:** 3.3 — see BUILDPLAN.md
**Last updated:** April 29, 2026

---

## What This Is

A shareable brand asset page. One URL per client. Replaces the brand-PDF and the "can you send me the logo again" emails.

Hosted by Stark as a Stark Care Pro yearly retainer feature. Clients forward the URL to printers, media outlets, ad agencies, and any vendor who needs their brand assets.

---

## How It Works (Client-Facing)

Client subscribes to Stark Care Pro. Stark builds them a brand sheet at `brand.{their-domain}.com` (or similar). The sheet contains:

- Their logos in multiple downloadable formats (SVG, PNG, JPG, EPS)
- Their colors with copy-to-clipboard hex/RGB/CMYK/Pantone values
- Their fonts with downloadable files and fallback guidance
- Templates (business cards, letterhead, social, email signature)
- Usage guidelines
- A single button that exports the entire sheet as a PDF

The client's marketing person sends the URL to a printer. The printer has everything they need. No back-and-forth.

If the client cancels Care Pro, the sheet deactivates automatically via a Perfex webhook.

---

## Architecture

**Stack:** Plain PHP. No framework, no WordPress, no DAM platform. Files on a server.

**Why plain PHP:** Lightweight, portable, fits Stark's existing PHP skill set, no framework lock-in, no maintenance overhead from a heavy platform. For ~30-50 assets per client, anything more complex is overkill.

**Per-client folder structure:**

```
brand-sheet-{client-slug}/
├── index.php            ← renders entire page
├── config.php           ← all client-specific data
├── pdf.php              ← generates PDF on demand
├── signature.php        ← email signature generator
├── assets/
│   ├── logos/           ← all logo variants
│   ├── fonts/           ← downloadable font files
│   ├── templates/       ← business cards, letterhead, etc.
│   └── images/          ← any other graphics
├── css/
│   └── sheet.css
├── js/
│   └── sheet.js         ← copy-to-clipboard, smooth scroll
└── README.md            ← per-client notes
```

**`config.php` shape:**

```php
<?php
return [
    'active' => true,                    // Perfex toggles this on cancellation
    'client_name' => 'Client Name',
    'client_slug' => 'client-name',
    'agency_contact' => 'nathan@starksocial.com',
    'last_updated' => '2026-04-29',
    'colors' => [
        [
            'name' => 'Primary Blue',
            'hex' => '#003F7F',
            'rgb' => '0, 63, 127',
            'cmyk' => '100, 50, 0, 50',
            'pantone' => 'PMS 287',
            'usage' => 'Primary brand color, headlines, primary buttons',
        ],
        // more colors
    ],
    'logos' => [
        [
            'name' => 'Primary Logo',
            'description' => 'Use on white or light backgrounds',
            'formats' => ['svg', 'png', 'jpg', 'eps'],
            'min_size_px' => 120,
            'clearspace_ratio' => 0.25,
        ],
        // more logos
    ],
    'fonts' => [
        [
            'name' => 'Barlow',
            'weights' => [400, 500, 600, 700, 800],
            'fallback' => 'Helvetica, Arial, sans-serif',
            'downloadable' => true,
        ],
        // more fonts
    ],
    'templates' => [
        // business cards, letterhead, social, etc.
    ],
    'guidelines' => [
        'dos' => [/* ... */],
        'donts' => [/* ... */],
    ],
];
```

---

## How to Add a New Client

Rough outline. Refine when first client is onboarded.

1. Receive client's brand assets (logos, fonts, color specs, templates) — collect via Drive folder, not committed to repo
2. Copy the master template folder, rename to `brand-sheet-{client-slug}`
3. Drop client's assets into `assets/` subfolders
4. Edit `config.php` with their data
5. Test locally
6. Deploy to chosen subdomain or path
7. Add client to Perfex Care Pro tier
8. Verify the cancellation webhook can target this install
9. Send the URL to the client with a brief on how to use it

Estimated build time per client (after master template is done): **4-8 hours**, mostly asset prep.

---

## Perfex Integration

Uses the same webhook pattern as the existing Gravity Forms → Perfex CRM lead flow.

**Cancellation flow:**

1. Client cancels Care Pro in Perfex Hub
2. Perfex fires a webhook to a Stark-hosted endpoint
3. Endpoint receives client identifier (slug)
4. Endpoint locates `brand-sheet-{client-slug}/config.php`
5. Endpoint flips `'active' => false`
6. Next request to that brand sheet shows: "Brand sheet for {Client Name} is currently inactive. Contact your agency to reactivate."

**Reactivation flow:** Same webhook, opposite direction. Renew Care Pro → flip flag back to `true`.

**Endpoint location:** TBD. Likely lives in the same place as the existing GF→Perfex webhook (`hub.starksocial.com/webhooks/`).

---

## What's Explicitly NOT Included

- **Client login or account system.** Public sheets, no auth.
- **Client-editable content.** Clients request changes; Stark updates `config.php` and assets. This is a feature, not a bug — it's what justifies the Care Pro retainer.
- **Versioning UI.** Git history covers it.
- **Analytics dashboards for clients.** Could add later if requested. Not in v1.
- **Multi-tenant single install.** Each client gets their own folder. Simpler to maintain, easier to customize per client, easier to deactivate without affecting others.
- **DAM features** (search, complex permissions, metadata schemas, AI tagging). Wrong product for that.

---

## Open Questions for When Build Starts

- Subdomain strategy: `brand.{client-domain}.com` vs `{client-slug}.starkbrand.com` vs path on existing client site
- PDF generation library: Dompdf, mPDF, wkhtmltopdf, or other
- How to handle clients who want to white-label heavily (different layout, not just colors/logos)
- Pricing for Care Pro tier (Nathan decision)
- Whether to offer a self-serve "request an update" form or keep all changes manual through Stark
- Email signature generator: standalone code adapted from Hub, or rebuilt fresh for the brand sheet context

---

## Why Not...

**Why not WordPress?**
Nathan's preference, and no value-add. The brand sheet is a static-ish page with light interactivity (copy-to-clipboard, PDF export). WordPress overhead isn't justified.

**Why not a DAM (ResourceSpace, Pimcore)?**
Both evaluated. Both rejected. Built for thousands of assets across enterprise teams. Generic UI undermines the premium positioning. Operating an enterprise DAM per client is unsustainable. Plain PHP serves the actual use case better.

**Why not a SaaS (Brandfolder, Frontify)?**
Wrong business model. Clients pay Stark for the brand sheet as part of their retainer. Reselling SaaS seats kills the margin and makes Stark a middleman.

**Why not multi-tenant single install?**
Intentional rejection. Independent installs mean: client customization is easy, deactivation can't accidentally affect others, no shared database to migrate or back up, easier to hand off if Stark ever sells a client account.

---

## Sales Positioning (For Pitches)

The brand sheet is the answer to a specific problem every brand-conscious client has: **"We hire a printer / media outlet / freelancer, and they ask us for the logo. We email them the logo. They ask for the right hex code. We email them the hex code. They use the wrong font. We catch it after it's printed."**

The brand sheet eliminates that. One URL. Always current. Always correct.

It's a tangible, ongoing deliverable that justifies a retainer. Most agencies don't offer this — they hand off a brand PDF at launch and disappear. Stark Care Pro means the brand stewardship continues.
