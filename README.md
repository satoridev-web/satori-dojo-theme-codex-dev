# SATORI Dojo Theme

Classic/hybrid WordPress theme for clubs and community organisations. Built for fast, block-editor-driven sites with Customizer options for branding, layout, and club details.

## Requirements
- WordPress 6.3+
- PHP 7.4+ (8.x recommended)

## Installation
1. Copy this theme folder into `wp-content/themes/satori-dojo`.
2. In WordPress admin, go to **Appearance → Themes** and activate **SATORI Dojo**.
3. Set a static front page if desired and assign menus to the **Primary** and **Footer** locations.

## Customizer options
Navigate to **Appearance → Customize → SATORI Dojo — Theme Options** to configure:
- **Brand & Identity**: logo, primary/secondary/background colours.
- **Typography**: heading/body fonts and base font size.
- **Layout**: container width, header layout, footer column count.
- **Club / Business Details**: name, tagline, address, map URL, email, phone, training times.
- **Social Media**: profile URLs for Facebook, Instagram, YouTube, TikTok, with header/footer display toggles.
- **Custom Code**: small CSS overrides and optional footer JS (advanced use).

## Block patterns
Patterns live in the `patterns/` directory and are registered via `inc/patterns.php`:
- Club Hero
- Training Info Section
- Instructors / Team Grid
- CTA Strip

## Development notes
- Theme setup and supports: `inc/setup.php`
- Asset enqueueing: `inc/assets.php`
- Customizer logic and output: `inc/customizer.php`
- Helper tags and utilities: `inc/template-tags.php`
- Patterns registration: `inc/patterns.php`

Editor styles and front-end CSS/JS are in `assets/`. Update `theme.json` presets to align with palette/typography defaults as needed.
