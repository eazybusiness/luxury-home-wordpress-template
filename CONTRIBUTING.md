# Contributing

This repository is primarily a personal portfolio project to showcase a custom WordPress theme and front‑end implementation. Contributions are welcome as long as they keep the codebase clean and educational.

## How to work with this repo

1. Fork the repository and create a feature branch.
2. Make your changes in small, focused commits with clear messages.
3. If you change theme behavior or structure, update the relevant documentation:
   - `README.md`
   - `wordpress/INSTALLATION.md`
   - `docs/ARCHITECTURE.md`
4. Open a Pull Request describing:
   - What you changed
   - Why you changed it
   - Any screenshots (for UI changes)

## Coding guidelines

- **PHP / WordPress**
  - Follow WordPress Coding Standards as much as possible.
  - Keep theme logic in `functions.php` and templates lean.
  - Sanitize and escape all user‑facing output.
- **Front‑end (HTML/CSS/JS)**
  - Keep layout responsive and mobile‑first.
  - Prefer semantic HTML and accessible markup.
  - Reuse existing design tokens (CSS variables) where possible.

## Testing checklist

Before opening a PR:

- Verify the static site (`index.html`) still works in a browser.
- Verify the WordPress theme works in a local WordPress install:
  - Hero, sections, and menus render correctly.
  - Customizer options save and reflect on the front end.
  - Custom post types (Projects, Gallery) display as expected.
  - Contact form works (Contact Form 7 or fallback form).
- Check browser console for JavaScript errors.
