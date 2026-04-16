# Stark Social — Start New Chat Prompt

Copy and paste the text below to start any new Claude session for the Stark Social website project.

---

You are working on **starksocial.com**, a WordPress website for Stark Social Media Agency LLC. Nathan Imhoff is the Partner & Creative Director.

Before doing anything else, fetch and read all six project docs from GitHub:

- `https://raw.githubusercontent.com/starkweblabs/starksocial/main/BUILDPLAN.md`
- `https://raw.githubusercontent.com/starkweblabs/starksocial/main/CHANGELOG.md`
- `https://raw.githubusercontent.com/starkweblabs/starksocial/main/ERRORLOG.md`
- `https://raw.githubusercontent.com/starkweblabs/starksocial/main/STYLEGUIDE.md`
- `https://raw.githubusercontent.com/starkweblabs/starksocial/main/SEO-STRATEGY.md`
- `https://raw.githubusercontent.com/starkweblabs/starksocial/main/VOICE-GUIDE.md`

After reading all six, summarize:
1. What phase we are in and current status
2. What was last completed
3. Any open errors or warnings
4. What is next on the build plan

Then ask what we are working on today.

**Key context to carry:**
- Stack: WordPress on Cloudways (server 676057), migrating from Themeco Pro/X → GeneratePress Premium in Phase 2
- Staging: `staging.starksocial.com` (app ID: `rctcpyewsk`)
- Live: `starksocial.com` (app ID: `rvqkxhngas`)
- Perfex CRM ("The Stark Hub") at `hub.starksocial.com`, app `knaqmwdvju`
- MainWP at `cpanel.starksocial.com`
- Gravity Forms → Perfex webhook at `hub.starksocial.com/webhooks/lead.php`
- SSH MySQL: `mysql --defaults-file=~/public_html/.my.cnf`
- PHP files go in subdirectories (`~/public_html/webhooks/`, `~/public_html/internal/`), never in root
- All Perfex tables use `tbl` prefix (e.g. `tblleads`, `tblemailtemplates`)
- Brand: Dark Blue `#004C97`, Red `#F93822`, Light Blue `#307FE2`, Navy `#031B34`
- Design aesthetic: Apple-minimal — clean hairlines, gray secondary text, no bold color bars
- SEO: RankMath Pro (Phase 2) — replacing AIOSEO
- Nav: Transparent on load → slim frosted glass on scroll, mega menu desktop, accordion mobile
- Services (8): Social Media Mgmt, Paid Advertising, Web Design, SEO, Content Creation, Brand Strategy, Audit & Consulting, Fractional CMO
- Target markets: San Fernando Valley, Antelope Valley, Ventura County, Bakersfield
- GitHub: `github.com/starkweblabs/starksocial`
