<?php
/**
 * Brand Guide Configuration — Stark Social Media Agency
 *
 * v8.1: Stewarded → Crafted (per Nathan, "Stewarded sounds like a church word").
 *       Cover meta: "Stewarded by" → "Maintained by" (different word for ongoing
 *       service vs the work itself).
 *       Identity description softened from "Brand stewardship" → "Brand work".
 */

declare(strict_types=1);

return [

    'client' => [
        'slug'        => 'stark',
        'name'        => 'Stark Social Media Agency',
        'short_name'  => 'Stark Social',
        'website'     => 'https://starksocial.com',
        'updated'     => '2026-04-29',
        'active'      => true,
    ],

    'cover' => [
        'background' => [
            'type'  => 'gradient',
            'value' => 'linear-gradient(135deg, #002A5C 0%, #004C97 50%, #307FE2 100%)',
        ],
        'logo' => [
            'file'      => 'stark-wordmark-light.svg',
            'max_width' => '320px',
        ],
        'doc_type_label' => 'BRAND GUIDE',
        'accent_color'   => '#FEDD00',
        'text_color'     => '#FFFFFF',
        'top_bar' => [
            'color'  => '#F93822',
            'height' => '8px',
        ],
    ],

    'closing' => [
        'background' => [
            'type'  => 'gradient',
            'value' => 'linear-gradient(135deg, #002A5C 0%, #004C97 100%)',
        ],
        'closing_line' => null,
        'crafted_by_text' => 'Crafted by Stark Social',
        'cta_text' => 'For brand questions, updates, or to start your own brand guide, contact hello@starksocial.com. Let\'s chat.',
        'logo' => [
            'file'      => 'stark-icon.svg',
            'max_width' => '90px',
        ],
        'text_color'  => '#FFFFFF',
        'accent_color' => '#FEDD00',
        'footer_bar' => [
            'color'  => '#F93822',
            'height' => '8px',
        ],
    ],

    'identity' => [
        'tagline'     => 'Marketing that earns its keep',
        'mission'     => 'We run full-service marketing for small and mid-sized businesses across Southern California — social, ads, web, SEO, brand, content, fractional CMO. The work over the words.',
        'description' => 'Stark Social Media Agency is a full-service marketing agency based in Southern California, working with small and mid-sized businesses across the region. The team handles social media management, paid advertising, web design, SEO, content creation, brand strategy, audit and consulting, and fractional CMO services. The agency was founded by Nathan Imhoff and operates on a small-team, deep-focus model — fewer clients, more attention. Brand work — including the upkeep of this brand guide — is part of an ongoing Stark Care Pro retainer.',
    ],

    'colors' => [
        'primary' => [
            ['name' => 'Midnight Anchor', 'role' => 'Dark Blue',  'variable' => '--stark-anchor', 'pantone' => '2945 C',       'hex' => '#004C97', 'rgb' => [0, 76, 151],  'cmyk' => [100, 53, 2, 16], 'usage' => 'The foundation. Headlines, navigation, CTA backgrounds, anything that needs gravity.'],
            ['name' => 'Ember Pulse',     'role' => 'Red',        'variable' => '--stark-pulse',  'pantone' => 'Bright Red C', 'hex' => '#F93822', 'rgb' => [249, 56, 34], 'cmyk' => [0, 78, 74, 0],   'usage' => 'The heat. Inline accents, error states, signature CTAs. Forms the Stark logo gradient.'],
            ['name' => 'Sky Signal',      'role' => 'Light Blue', 'variable' => '--stark-signal', 'pantone' => '2727 C',       'hex' => '#307FE2', 'rgb' => [48, 127, 226],'cmyk' => [70, 47, 0, 0],   'usage' => 'The current. Interactive elements, links, scroll progress bar, seasonal accent base.'],
        ],
        'secondary' => [
            ['name' => 'Caution Beacon', 'role' => 'Yellow',  'variable' => '--stark-beacon', 'pantone' => 'Yellow C', 'hex' => '#FEDD00', 'rgb' => [254, 221, 0], 'cmyk' => [0, 1, 100, 0],  'usage' => 'The attention. Focus rings (WCAG-compliant), accents on dark surfaces. Used sparingly elsewhere.'],
            ['name' => 'Moss Affirm',    'role' => 'Green',   'variable' => '--stark-affirm', 'pantone' => '354 C',    'hex' => '#00B140', 'rgb' => [0, 177, 64],  'cmyk' => [81, 0, 92, 0],  'usage' => 'The yes. Success states, positive metrics, confirmations.'],
            ['name' => 'Pop Spark',      'role' => 'Magenta', 'variable' => '--stark-spark',  'pantone' => '213 C',    'hex' => '#E31C79', 'rgb' => [227, 28, 121],'cmyk' => [0, 92, 18, 0],  'usage' => 'The conversion. Hero CTAs, contact buttons, anywhere the click matters.'],
        ],
    ],

    'gradients' => [
        'ui' => [
            ['name' => 'Anchor Gradient', 'css' => 'linear-gradient(135deg, #0C4E97 0%, #1D65B8 100%)', 'usage' => 'CTA section backgrounds, dark editorial blocks. The primary moody backdrop.'],
            ['name' => 'Pulse Gradient',  'css' => 'linear-gradient(135deg, #F93822 0%, #DA291C 100%)', 'usage' => 'High-attention buttons, urgent accent surfaces. Same hex stops as the Stark logo gradient.'],
            ['name' => 'Signal Gradient', 'css' => 'linear-gradient(135deg, #307FE2 0%, #539AEF 100%)', 'usage' => 'Interactive accents, hover states, scroll progress indicators.'],
        ],
        'logo' => [
            ['name' => 'Logo Background Gradient', 'css' => 'linear-gradient(135deg, #418FDE 0%, #FFFFFF 100%)', 'usage' => 'Composition gradient sitting behind the Stark mark. PMS 279 C into white. Not a UI primitive — only used inside the logo lockup.'],
            ['name' => 'Logo Stark Gradient',      'css' => 'linear-gradient(135deg, #F93822 0%, #DA291C 100%)', 'usage' => 'Fill for the "STARK" wordmark. Bright Red C into PMS 485 C. Same hex stops as the UI Pulse gradient — keep the naming distinct in print/handoff specs.'],
        ],
    ],

    'tokens' => [
        'ui' => [
            ['variable' => '--stark-text',      'value' => '#111',                'type' => 'color', 'usage' => 'Primary text color. Body, headings, default ink.'],
            ['variable' => '--stark-muted',     'value' => 'rgba(17,17,17,0.62)', 'type' => 'color', 'usage' => 'Secondary text. Captions, meta info, deprioritized labels.'],
            ['variable' => '--stark-muted-2',   'value' => 'rgba(17,17,17,0.48)', 'type' => 'color', 'usage' => 'Tertiary text. Use sparingly — almost-disappeared.'],
            ['variable' => '--stark-surface',   'value' => '#fff',                'type' => 'color', 'usage' => 'Primary surface. Cards, panels, default backgrounds.'],
            ['variable' => '--stark-bg',        'value' => '#0b0f1a',             'type' => 'color', 'usage' => 'Reserved for dark surfaces — photo overlays, future dark mode.'],
            ['variable' => '--stark-rule',      'value' => 'rgba(17,17,17,0.14)', 'type' => 'color', 'usage' => 'Standard hairline border. Card edges, dividers.'],
            ['variable' => '--stark-rule-soft', 'value' => 'rgba(17,17,17,0.08)', 'type' => 'color', 'usage' => 'Quiet hairline. Internal section breaks within cards.'],
        ],
        'accent' => [
            ['variable' => '--stark-accent',      'value' => 'rgba(48,127,226,0.85)', 'type' => 'color', 'usage' => 'Live accent. Default = Sky Signal. Seasonal overrides applied at runtime.'],
            ['variable' => '--stark-accent-soft', 'value' => 'rgba(48,127,226,0.14)', 'type' => 'color', 'usage' => 'Accent washes. Hover states, subtle background tints.'],
            ['variable' => '--stark-accent-glow', 'value' => 'rgba(48,127,226,0.35)', 'type' => 'color', 'usage' => 'Accent glow. Velocity glow, focus halos.'],
        ],
        'seasons' => [
            ['variable' => 'spring', 'value' => 'rgba(68,149,255,0.90)', 'type' => 'color', 'usage' => 'March–May.'],
            ['variable' => 'summer', 'value' => 'rgba(33,165,255,0.88)', 'type' => 'color', 'usage' => 'June–August.'],
            ['variable' => 'fall',   'value' => 'rgba(30,92,195,0.88)',  'type' => 'color', 'usage' => 'September–November.'],
            ['variable' => 'winter', 'value' => 'rgba(92,178,255,0.82)', 'type' => 'color', 'usage' => 'December–February.'],
        ],
        'layout' => [
            ['variable' => '--stark-radius-card',  'value' => '14px',   'type' => 'size', 'usage' => 'Cards, panels.'],
            ['variable' => '--stark-radius-ui',    'value' => '16px',   'type' => 'size', 'usage' => 'Larger UI surfaces.'],
            ['variable' => '--stark-radius-field', 'value' => '14px',   'type' => 'size', 'usage' => 'Form inputs, sidebar search, all input fields site-wide.'],
            ['variable' => '--stark-radius-btn',   'value' => '12px',   'type' => 'size', 'usage' => 'Buttons.'],
            ['variable' => '--stark-max-wide',     'value' => '1400px', 'type' => 'size', 'usage' => 'Default content max-width.'],
            ['variable' => '--stark-max-search',   'value' => '1040px', 'type' => 'size', 'usage' => 'Search results, medium-density content.'],
            ['variable' => '--stark-max-article',  'value' => '960px',  'type' => 'size', 'usage' => 'Article body, long-form reading.'],
        ],
    ],

    'legacy_mapping' => [
        ['phase_2' => '--stark-anchor', 'phase_1_marketing' => '--stark-dark-blue',          'phase_1_hub' => '--ss-blue-dark'],
        ['phase_2' => '--stark-pulse',  'phase_1_marketing' => '--stark-primary-red',        'phase_1_hub' => '--ss-red'],
        ['phase_2' => '--stark-signal', 'phase_1_marketing' => '--stark-primary-light-blue', 'phase_1_hub' => '--ss-blue-light'],
        ['phase_2' => '--stark-beacon', 'phase_1_marketing' => '--stark-secondary-yellow',   'phase_1_hub' => '--ss-yellow'],
        ['phase_2' => '--stark-affirm', 'phase_1_marketing' => '--stark-secondary-green',    'phase_1_hub' => '--ss-green'],
        ['phase_2' => '--stark-spark',  'phase_1_marketing' => '--stark-secondary-magenta',  'phase_1_hub' => null],
    ],

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

    'logos' => [
        [
            'name'        => 'Wordmark — Dark',
            'role'        => 'Primary, light backgrounds',
            'description' => 'The Stark wordmark in full color with "SOCIAL MEDIA AGENCY" beneath. Default lockup for any light surface — paper, white screens, photos with light areas.',
            'file'        => 'stark-wordmark-dark.svg',
            'background'  => 'light',
        ],
        [
            'name'        => 'Wordmark — Light',
            'role'        => 'Primary reversed, dark backgrounds',
            'description' => 'The Stark wordmark adapted for dark surfaces. Use on photos, dark blocks, and the Anchor gradient.',
            'file'        => 'stark-wordmark-light.svg',
            'background'  => 'dark',
        ],
        [
            'name'        => 'Stark Social Icon',
            'role'        => 'Brand mark',
            'description' => 'The original cloud lockup — Stark Social Agency\'s historical mark. Use as an avatar, social profile, or wherever a recognizable square brand element is needed.',
            'file'        => 'stark-icon.svg',
            'background'  => 'light',
        ],
        [
            'name'        => 'Web Icon',
            'role'        => 'Crafted-by mark',
            'description' => 'The icon Stark places on websites it builds — a small "designed by Stark" signature on client sites.',
            'file'        => 'stark-web-icon.svg',
            'background'  => 'light',
        ],
    ],

    'voice' => [],

    'contact' => [
        'brand_questions' => 'hello@starksocial.com',
    ],

    'sections' => [
        'cover',
        'identity',
        'colors',
        'gradients',
        'tokens',
        'typography',
        'logos',
        'closing',
    ],
];
