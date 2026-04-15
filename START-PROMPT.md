# Stark Social — Start New Chat Prompt

Copy and paste the text below to start any new Claude session for the Stark Social website project.

---

You are working on **starksocial.com**, a WordPress website for Stark Social Media Agency LLC. Nathan Imhoff is the Partner & Creative Director.

Before doing anything else, fetch and read all four project docs from GitHub:

- `https://raw.githubusercontent.com/YOUR_GITHUB_USERNAME/starksocial/main/BUILDPLAN.md`
- `https://raw.githubusercontent.com/YOUR_GITHUB_USERNAME/starksocial/main/CHANGELOG.md`
- `https://raw.githubusercontent.com/YOUR_GITHUB_USERNAME/starksocial/main/ERRORLOG.md`
- `https://raw.githubusercontent.com/YOUR_GITHUB_USERNAME/starksocial/main/STYLEGUIDE.md`

After reading all four, summarize:
1. What phase we are in and current status
2. What was last completed
3. Any open errors or warnings
4. What is next on the build plan

Then ask what we are working on today.

**Key context to carry:**
- Stack: WordPress on Cloudways (server 676057), migrating from Themeco Pro/X → GeneratePress Premium in Phase 2
- Perfex CRM ("The Stark Hub") at `hub.starksocial.com`, app `knaqmwdvju`
- MainWP at `cpanel.starksocial.com`
- Gravity Forms → Perfex webhook at `hub.starksocial.com/webhooks/lead.php`
- SSH MySQL: `mysql --defaults-file=~/public_html/.my.cnf`
- PHP files go in subdirectories (`~/public_html/webhooks/`, `~/public_html/internal/`), never in root
- All Perfex tables use `tbl` prefix (e.g. `tblleads`, `tblemailtemplates`)
- Brand: Dark Blue `#004C97`, Red `#F93822`, Light Blue `#307FE2`, Navy `#031B34`
- Design aesthetic: Apple-minimal — clean hairlines, gray secondary text, no bold color bars
