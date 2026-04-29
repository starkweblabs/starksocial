<?php
/**
 * Brand Sheet Configuration — Stark Social Media Agency
 *
 * Single source of truth. Color values from Stark's official brand
 * standards PDF (Rough-Style-Guide-3-7.pdf, Apr 2026).
 *
 * v5 — Apr 29 2026:
 *   - Identity copy locked: tagline, mission, vendor-facing description.
 *   - No more TODOs in identity.
 */

declare(strict_types=1);

return [

    /* ------------------------------------------------------------------
     * Client identification & status
     * ------------------------------------------------------------------ */
    'client' => [
        'slug'        => 'stark',
        'name'        => 'Stark Social Media Agency',
        'short_name'  => 'Stark Social',
        'website'     => 'https://starksocial.com',
        'updated'     => '2026-04-29',
        'active'      => true,
    ],

    /* ------------------------------------------------------------------
     * Identity
     * ------------------------------------------------------------------ */
    'identity' => [
        'tagline'     => 'Marketing that earns its keep',
        'mission'     => 'We run full-service marketing for small and mid-sized businesses across Southern California — social, ads, web, SEO, brand, content, fractional CMO. The work over the words.',
        'description' => 'Stark Social Media Agency is a full-service marketing agency based in Southern California, working with small and mid-sized businesses across the region. The team handles social media management, paid advertising, web design, SEO, content creation, brand strategy, audit and consulting, and fractional CMO services. The agency was founded by Nathan Imhoff and operates on a small-team, deep-focus model — fewer clients, more attention. Brand stewardship — including the upkeep of this brand sheet — is part of an ongoing Stark Care Pro retainer.',
    ],

    /* ------------------------------------------------------------------
     * Colors — primary + secondary (Purple and Orange removed in v4)
     * ------------------------------------------------------------------ */
    'colors' => [

        'primary' => [

            [
                'name'    => 'Dark Blue',
                'pantone' => '2945 C',
                'hex'     => '#004C97',
                'rgb'     => [0, 76, 151],
                'cmyk'    => [100, 53, 2, 16],
                'usage'   => 'Primary brand color. Headlines, CTA backgrounds, navigation.',
                'tints'   => [
                    ['name' => 'Tint +1', 'pantone' => '285 C', 'hex' => '#0072CE', 'rgb' => [0, 114, 206],  'cmyk' => [90, 48, 0, 0]],
                    ['name' => 'Tint +2', 'pantone' => '279 C', 'hex' => '#418FDE', 'rgb' => [65, 143, 222], 'cmyk' => [68, 34, 0, 0]],
                ],
                'shades'  => [
                    ['name' => 'Shade +1', 'pantone' => '541 C', 'hex' => '#003C71', 'rgb' => [0, 60, 113], 'cmyk' => [100, 58, 9, 46]],
                    ['name' => 'Shade +2', 'pantone' => '648 C', 'hex' => '#002E5D', 'rgb' => [0, 46, 93],  'cmyk' => [100, 71, 9, 56]],
                ],
            ],

            [
                'name'    => 'Red',
                'pantone' => 'Bright Red C',
                'hex'     => '#F93822',
                'rgb'     => [249, 56, 34],
                'cmyk'    => [0, 78, 74, 0],
                'usage'   => 'Accent. Inline code, error states, signature CTAs. Forms the Stark logo gradient.',
                'tints'   => [
                    ['name' => 'Tint +1', 'pantone' => '171 C', 'hex' => '#FF5C39', 'rgb' => [255, 92, 57],   'cmyk' => [0, 61, 72, 0]],
                    ['name' => 'Tint +2', 'pantone' => '170 C', 'hex' => '#FF8674', 'rgb' => [255, 134, 116], 'cmyk' => [0, 48, 50, 0]],
                ],
                'shades'  => [
                    ['name' => 'Shade +1', 'pantone' => '485 C',  'hex' => '#DA291C', 'rgb' => [218, 41, 28], 'cmyk' => [0, 95, 100, 0]],
                    ['name' => 'Shade +2', 'pantone' => '7621 C', 'hex' => '#AB2328', 'rgb' => [171, 35, 40], 'cmyk' => [0, 98, 91, 30]],
                ],
            ],

            [
                'name'    => 'Light Blue',
                'pantone' => '2727 C',
                'hex'     => '#307FE2',
                'rgb'     => [48, 127, 226],
                'cmyk'    => [70, 47, 0, 0],
                'usage'   => 'Interactive elements, links, scroll progress bar, seasonal accent base.',
                'tints'   => [
                    ['name' => 'Tint +1', 'pantone' => '279 C', 'hex' => '#418FDE', 'rgb' => [65, 143, 222],  'cmyk' => [68, 34, 0, 0]],
                    ['name' => 'Tint +2', 'pantone' => '278 C', 'hex' => '#8BB8E8', 'rgb' => [139, 184, 232], 'cmyk' => [45, 14, 0, 0]],
                ],
                'shades'  => [
                    ['name' => 'Shade +1', 'pantone' => '285 C',  'hex' => '#0072CE', 'rgb' => [0, 114, 206], 'cmyk' => [90, 48, 0, 0]],
                    ['name' => 'Shade +2', 'pantone' => '7693 C', 'hex' => '#004976', 'rgb' => [0, 73, 118],  'cmyk' => [100, 57, 9, 47]],
                ],
            ],
        ],

        'secondary' => [

            [
                'name'    => 'Yellow',
                'pantone' => 'Yellow C',
                'hex'     => '#FEDD00',
                'rgb'     => [254, 221, 0],
                'cmyk'    => [0, 1, 100, 0],
                'usage'   => 'Focus rings (accessibility-compliant). Use sparingly elsewhere.',
                'tints'   => [
                    ['name' => 'Tint +1', 'pantone' => '106 C', 'hex' => '#F9E547', 'rgb' => [249, 229, 71], 'cmyk' => [0, 0, 75, 0]],
                    ['name' => 'Tint +2', 'pantone' => '100 C', 'hex' => '#F6EB61', 'rgb' => [246, 235, 97], 'cmyk' => [0, 0, 56, 0]],
                ],
                'shades'  => [
                    ['name' => 'Shade +1', 'pantone' => '103 C', 'hex' => '#C5A900', 'rgb' => [197, 169, 0], 'cmyk' => [5, 5, 100, 16]],
                    ['name' => 'Shade +2', 'pantone' => '111 C', 'hex' => '#AA8A00', 'rgb' => [170, 138, 0], 'cmyk' => [8, 21, 100, 28]],
                ],
            ],

            [
                'name'    => 'Green',
                'pantone' => '354 C',
                'hex'     => '#00B140',
                'rgb'     => [0, 177, 64],
                'cmyk'    => [81, 0, 92, 0],
                'usage'   => 'Success states, positive metrics.',
                'tints'   => [
                    ['name' => 'Tint +1', 'pantone' => '3405 C', 'hex' => '#00AF66', 'rgb' => [0, 175, 102],  'cmyk' => [88, 0, 68, 0]],
                    ['name' => 'Tint +2', 'pantone' => '7479 C', 'hex' => '#26D07C', 'rgb' => [38, 208, 124], 'cmyk' => [56, 0, 58, 0]],
                ],
                'shades'  => [
                    ['name' => 'Shade +1', 'pantone' => '348 C', 'hex' => '#00843D', 'rgb' => [0, 132, 61], 'cmyk' => [96, 2, 100, 12]],
                    ['name' => 'Shade +2', 'pantone' => '349 C', 'hex' => '#046A38', 'rgb' => [4, 106, 56], 'cmyk' => [90, 12, 95, 40]],
                ],
            ],

            [
                'name'    => 'Magenta',
                'pantone' => '213 C',
                'hex'     => '#E31C79',
                'rgb'     => [227, 28, 121],
                'cmyk'    => [0, 92, 18, 0],
                'usage'   => 'Hero CTAs, contact buttons.',
                'tints'   => [
                    ['name' => 'Tint +1', 'pantone' => '212 C', 'hex' => '#F04E98', 'rgb' => [240, 78, 152],  'cmyk' => [0, 78, 8, 0]],
                    ['name' => 'Tint +2', 'pantone' => '218 C', 'hex' => '#E56DB1', 'rgb' => [229, 109, 177], 'cmyk' => [2, 63, 0, 0]],
                ],
                'shades'  => [
                    ['name' => 'Shade +1', 'pantone' => '226 C', 'hex' => '#D0006F', 'rgb' => [208, 0, 111], 'cmyk' => [0, 100, 2, 0]],
                    ['name' => 'Shade +2', 'pantone' => '220 C', 'hex' => '#A50050', 'rgb' => [165, 0, 80],  'cmyk' => [5, 100, 25, 24]],
                ],
            ],
        ],
    ],

    /* ------------------------------------------------------------------
     * Gradients
     * ------------------------------------------------------------------ */
    'gradients' => [

        'ui' => [
            [
                'name'  => 'Dark Blue',
                'css'   => 'linear-gradient(135deg, #0C4E97 0%, #1D65B8 100%)',
                'usage' => 'CTA section backgrounds, dark editorial blocks. The primary moody backdrop.',
            ],
            [
                'name'  => 'Red',
                'css'   => 'linear-gradient(135deg, #F93822 0%, #DA291C 100%)',
                'usage' => 'High-attention buttons, urgent accent surfaces. Same hex stops as the Stark logo gradient.',
            ],
            [
                'name'  => 'Light Blue',
                'css'   => 'linear-gradient(135deg, #307FE2 0%, #539AEF 100%)',
                'usage' => 'Interactive accents, hover states, scroll progress indicators.',
            ],
        ],

        'logo' => [
            [
                'name'  => 'Logo Background Gradient',
                'css'   => 'linear-gradient(135deg, #418FDE 0%, #FFFFFF 100%)',
                'usage' => 'Composition gradient sitting behind the Stark mark. Light Blue Tint +1 (PMS 279 C) into white. Not a UI primitive — only used inside the logo lockup.',
            ],
            [
                'name'  => 'Logo Stark Gradient',
                'css'   => 'linear-gradient(135deg, #F93822 0%, #DA291C 100%)',
                'usage' => 'Fill for the "STARK" wordmark. Red True (Bright Red C) into Red Shade +1 (PMS 485 C). Same hex stops as the Red UI gradient — keep the naming distinct in print/handoff specs.',
            ],
        ],
    ],

    /* ------------------------------------------------------------------
     * Typography
     * ------------------------------------------------------------------ */
    'typography' => [
        'fonts' => [
            [
                'name'    => 'Barlow',
                'role'    => 'Primary',
                'usage'   => 'Body copy, headings, UI. The default font everywhere.',
                'license' => 'SIL Open Font License (free for commercial use)',
                'source'  => 'https://fonts.google.com/specimen/Barlow',
                'weights' => [
                    ['weight' => 400, 'name' => 'Regular',   'file' => 'barlow-v13-latin-regular.woff2'],
                    ['weight' => 500, 'name' => 'Medium',    'file' => 'barlow-v13-latin-500.woff2'],
                    ['weight' => 600, 'name' => 'SemiBold',  'file' => 'barlow-v13-latin-600.woff2'],
                    ['weight' => 700, 'name' => 'Bold',      'file' => 'barlow-v13-latin-700.woff2'],
                    ['weight' => 800, 'name' => 'ExtraBold', 'file' => 'barlow-v13-latin-800.woff2'],
                ],
            ],
            [
                'name'    => 'Barlow Condensed',
                'role'    => 'Display',
                'usage'   => 'Eyebrows, all-caps labels, condensed UI. Used for contrast against Barlow.',
                'license' => 'SIL Open Font License (free for commercial use)',
                'source'  => 'https://fonts.google.com/specimen/Barlow+Condensed',
                'weights' => [
                    ['weight' => 400, 'name' => 'Regular',  'file' => 'barlow-condensed-v13-latin-regular.woff2'],
                    ['weight' => 500, 'name' => 'Medium',   'file' => 'barlow-condensed-v13-latin-500.woff2'],
                    ['weight' => 600, 'name' => 'SemiBold', 'file' => 'barlow-condensed-v13-latin-600.woff2'],
                    ['weight' => 700, 'name' => 'Bold',     'file' => 'barlow-condensed-v13-latin-700.woff2'],
                ],
            ],
        ],
        'scale' => [
            ['name' => 'Heading 1', 'size' => 'clamp(2.6rem, 4vw, 3.6rem)',     'weight' => 800, 'letter_spacing' => '-0.03em',  'sample' => 'Display headline'],
            ['name' => 'Heading 2', 'size' => 'clamp(1.85rem, 2.4vw, 2.45rem)', 'weight' => 800, 'letter_spacing' => '-0.02em',  'sample' => 'Section heading'],
            ['name' => 'Heading 3', 'size' => 'clamp(1.25rem, 1.6vw, 1.55rem)', 'weight' => 800, 'letter_spacing' => '-0.015em', 'sample' => 'Subsection title'],
            ['name' => 'Body',      'size' => '1rem',                            'weight' => 400, 'letter_spacing' => '0',        'sample' => 'Body copy reads at 18px on desktop with a 1.65 line-height for comfortable long-form reading.'],
            ['name' => 'Eyebrow',   'size' => '0.78rem',                         'weight' => 700, 'letter_spacing' => '0.14em',   'sample' => 'EYEBROW LABEL', 'uppercase' => true, 'family' => 'condensed'],
            ['name' => 'Small',     'size' => '0.92rem',                         'weight' => 400, 'letter_spacing' => '0',        'sample' => 'Small / meta text'],
        ],
    ],

    'logos' => [],
    'voice' => [],

    'contact' => [
        'brand_questions' => 'hello@starksocial.com',
    ],

    'sections' => [
        'identity',
        'colors',
        'gradients',
        'typography',
        'logos',
    ],
];
