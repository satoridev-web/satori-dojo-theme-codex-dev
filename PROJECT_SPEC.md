# SATORI Dojo Theme — PROJECT_SPEC (Phase 1, v0.1.0)

## 1. Overview

**Project:** SATORI Dojo  
**Type:** Lightweight, reusable WordPress theme for clubs / dojos / small organisations  
**Primary pilot site:** Mumeishi Kendo Club (https://www.mumeishikendo.com.au/)  
**Status:** Phase 1 — MVP theme for public-facing site

SATORI Dojo is a classic/hybrid WordPress theme designed as a **fast, modern, PWA-ready front end** for clubs and similar organisations. It will be dogfooded on Mumeishi Kendo Club but **must remain generic and reusable** for other clubs/businesses.

The theme should:

- Be **lightweight** (no page builder dependency, minimal JS).
- Use the **block editor** for page content.
- Use the **Customizer** for branding, layout, club/business details, and social links.
- Be compatible with SATORI plugins (e.g. SATORI Forms, SATORI Events, future SATORI Club Core).
- Be suitable for PWA use (clean HTML, good performance, sensible caching, minimal blocking assets).

---

## 2. Goals (Phase 1)

1. Provide a **ready-to-use public website** structure for Mumeishi Kendo Club:
   - Home, About, Training, Join Us, Gallery, Contact.
   - Clean, modern, mobile-first layout.

2. Implement a **reusable SATORI Dojo theme**:
   - No hard-coded “Mumeishi” branding.
   - Club/business details configurable via Customizer (and later via SATORI Club Core plugin).

3. Implement **Customizer-based configuration**:
   - Brand & Identity (logo, colours).
   - Typography (basic controls).
   - Layout (container width, header/footer style).
   - Club/Business Details (name, address, contact, training times – basic).
   - Social Media links.
   - Custom CSS (optional Custom JS with caution).

4. Provide a small set of **block patterns** tailored for clubs:
   - Hero section with CTA.
   - Training info section.
   - Instructor / team grid.
   - CTA strip (e.g. “Join Us”).
   - Simple layout that can be easily reused.

5. Ensure the theme is **ready for Phase 2**:
   - Plays nicely with SATORI Forms (for EOIs, Contact).
   - Ready to use SATORI Events (for Events / News in later phases).
   - Structured, clean codebase ready for ongoing Codex-driven work.

---

## 3. Non-Goals (Phase 1)

- No full **member portal** UI yet.
- No deep **PWA implementation** inside the theme (that will be SATORI PWA Shell plugin later).
- No advanced **dynamic layouts** or mega menu.
- No full integration with an external CRM or payment gateway.
- No complex block theme FSE setup — this is a **classic/hybrid** theme, not a full Site Editor theme.

---

## 4. Target WordPress & Technical Requirements

- **Minimum WordPress version:** 6.3+ (block editor assumed).
- **PHP minimum:** 7.4+ (prefer 8.0+ compatible).
- Theme must follow:
  - WordPress theme standards.
  - PHPCS with WPCS ruleset (see SATORI standard practice).
- Use `theme.json` where appropriate for:
  - Colour palette.
  - Typography presets.
  - Spacing presets.
- Classic theme structure (e.g. `functions.php`, `header.php`, `footer.php`, `index.php`) with support for:
  - Block editor styles.
  - Editor-style CSS where needed.

---

## 5. High-Level Features (Phase 1)

### 5.1 Templates & Layouts

**Required templates:**

- `style.css` — Theme header + minimal CSS scaffold.
- `functions.php` — Theme setup, script/style enqueue, Customizer registration, etc.
- `index.php` — Fallback loop.
- `front-page.php` — Homepage template (used when front page is a static page).
- `page.php` — Basic page layout for About, Training, Join Us, Contact, etc.
- `single.php` — For posts (if used).
- `archive.php` — For post archives (basic).
- `404.php` — Simple, branded 404 page.
- `search.php` (optional but recommended) — Basic search template.

**Layout principles:**

- Single main container with optional “boxed” vs “wide” layout controlled via Customizer setting.
- Responsive header:
  - Logo + Site title.
  - Primary navigation.
  - Mobile menu (hamburger / off-canvas).
- Responsive footer:
  - Configurable column count (1–4).
  - Uses widgets and/or theme-defined areas.
  - Displays club/business contact details and social icons.

---

## 6. Customizer Design (Phase 1)

### 6.1 Panels & Sections (Initial)

**Panel:** “SATORI Dojo — Theme Options”  
Under this panel, create sections:

1. **Brand & Identity**
   - Logo upload(s) (primary, optional dark/light).
   - Site accent / primary colour (colour picker).
   - Secondary colour (optional).
   - Background colour (basic).

2. **Typography**
   - Headings font (select from a predefined set: system, plus a few safe Google Fonts).
   - Body font (same approach).
   - Base font size (slider or select).
   - Line height / spacing presets (simple toggle: compact / normal / spacious).

3. **Layout**
   - Container width: `narrow`, `standard`, `wide`.
   - Header layout: 
     - `logo-left-nav-right`
     - `logo-centered-nav-below`.
   - Footer columns: `1`, `2`, `3`, `4`.

4. **Club / Business Details**
   - Club/Business name.
   - Tagline/slogan (optional).
   - Address.
   - Map URL (e.g. Google Maps link).
   - Email contact (general).
   - Phone number(s).
   - Training times (simple textfields or textarea for now – structured fields may move to SATORI Club Core later).

5. **Social Media**
   - Text inputs for URLs:
     - Facebook
     - Instagram
     - YouTube
     - TikTok (optional)
   - Toggles:
     - Show icons in header.
     - Show icons in footer.

6. **Custom Code**
   - Custom CSS textarea (output in `<head>`).
   - Optional Custom JS textarea:
     - Output in footer.
     - Should include a clear warning in comments.

---

## 7. Block Patterns (Phase 1)

Use the `patterns/` directory and standard WordPress pattern registration.

**Patterns to implement:**

1. **Hero — “Club Hero”**
   - Large hero image, overlay gradient.
   - Heading, subheading.
   - Primary CTA button (e.g. “Join Us”).
   - Secondary CTA (e.g. “Training Times”).

2. **Training Info Section**
   - Two or three columns:
     - Training days & times.
     - Venue address.
     - “What to bring / wear” bullet list.

3. **Instructors / Team Grid**
   - 2–4 cards, each with:
     - Avatar / photo.
     - Name.
     - Role/Title.
     - Short bio.

4. **CTA Strip**
   - Full-width band:
     - Short text (e.g. “Ready to begin your training?”).
     - One button (link to Join Us or Contact).

Patterns should be generic and not hard-code “Kendo” or “Mumeishi” in text – sample copy should be neutral and editable.

---

## 8. Integration Points (Phase 1)

These are **soft integration points**; plugin dependencies should be optional.

### 8.1 SATORI Forms

- The theme should:
  - Provide nice styling for form elements (inputs, selects, buttons).
  - Ensure `.wp-block` form patterns look consistent.
- It must **not** hard-code form IDs. Instead:
  - Provide optional pattern examples with placeholders.
  - Rely on Gutenberg blocks/shortcodes rendered by the plugin.

### 8.2 SATORI Events (Future Use)

- Archive and single templates should have:
  - Clean `entry-title`, `entry-meta`, `entry-content` structure.
  - Basic CSS utility classes so SATORI Events templates can blend with the theme easily.
- No direct dependency in Phase 1.

---

## 9. Performance & PWA Readiness (Phase 1)

- Minimise render-blocking assets:
  - Single main CSS file (compiled/minimal).
  - JS should be enqueued in the footer where possible.
- Avoid large external libraries in Phase 1.
- Ensure:
  - Mobile-friendly navigation.
  - Good Lighthouse / Core Web Vitals foundations.
- Prepare for PWA:
  - Simple, clean HTML structure.
  - Meaningful `id`/`class` where needed.
  - No heavy client-side frameworks.

Full PWA implementation will be handled by a separate **SATORI PWA Shell** plugin in a later phase.

---

## 10. Coding Standards & Tooling

- Use **PHPCS** with **WordPress Coding Standards (WPCS)**.
- Provide:
  - `.phpcs.xml.dist`
  - `.editorconfig`
- Namespace/Prefix:
  - PHP functions should be prefixed with `satori_dojo_`.
  - Template tags also use `satori_dojo_` prefix.
  - Text domain: `satori-dojo`.

---

## 11. Deliverables for Phase 1 (v0.1.0)

1. A functional WordPress theme folder:
   - Installable and selectable in Appearance → Themes.
   - Does not fatal error on activation.
   - Passes basic PHPCS/WPCS checks.

2. Working **Customizer** with:
   - Defined panels/sections and controls as per section 6.
   - Settings correctly applied to front end (colours, layout, fonts, club details, socials).

3. Basic **templates**:
   - Home (front-page), pages, posts, archive, 404 – all using the defined layout.

4. At least **2–3 block patterns** implemented and usable in the block editor.

5. Basic **documentation** in README:
   - Short description.
   - Requirements.
   - How to install and activate.
   - Where to find Customizer options.

---

## 12. Future Phases (For Reference Only)

Future phases (not part of v0.1.0) will include:

- Tighter integration with SATORI Club Core plugin (centralised club details).
- Member portal styling.
- PWA enhancements via SATORI PWA Shell plugin.
- Additional patterns (event listings, announcement feeds, etc.).
- More advanced typography and layout options.
