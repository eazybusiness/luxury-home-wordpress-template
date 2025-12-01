# Bonsai Theme Architecture

## Overview

This repository contains two closely related parts:

- **Static landing page** (`index.html`, `style.css`, `script.js`)
  - A one‑page luxury real‑estate site inspired by Japanese bonsai philosophy.
- **Custom WordPress theme** (`wordpress/`)
  - A production‑ready theme that ports the same design into WordPress, with
    Customizer options, custom post types, and contact form integration.

This structure is intentional for portfolio purposes: it demonstrates taking a
custom design from pure HTML/CSS/JS into a fully functional WordPress theme.

## High‑level request flow

```mermaid
flowchart TD
    A[Browser request] --> B[WordPress front controller index.php]
    B --> C[Load active theme: Bonsai]
    C --> H[header.php]
    C --> I[index.php]
    C --> F[footer.php]

    I --> CPTs[Custom Post Types\n`bonsai_project`, `bonsai_gallery`]
    I --> Customizer[Theme Customizer options]
    I --> Contact[Contact Form 7 shortcode\nor fallback native form]

    Contact --> AdminPost[admin-post.php handler\n(bonsai_contact_form)]
```

## Key WordPress concepts demonstrated

- **Theme setup (`functions.php`)**
  - `add_theme_support` for title tag, post thumbnails, HTML5 features, custom logo.
  - `register_nav_menus` for primary and footer menus.
  - Global `$content_width` configuration.
- **Custom post types**
  - `bonsai_project` for property listings.
  - `bonsai_gallery` for gallery items.
  - REST‑enabled with custom slugs and icons.
- **Customizer integration**
  - Sections for hero content, philosophy copy, brochure texts.
  - Theme color controls wired to CSS variables via inline `<style>` in `wp_head`.
  - Contact settings (email, reCAPTCHA toggle/key).
  - Social media URLs.
  - SEO meta description, keywords, and Google Analytics tracking ID.
- **Contact form flow**
  - Primary path: Contact Form 7 shortcode rendered in the Contact section.
  - Fallback path: native form posts to `admin-post.php` with nonce validation;
    a custom handler in `functions.php` sends email via `wp_mail`.
- **Front‑end behavior**
  - Smooth scrolling navigation and header scroll effect.
  - IntersectionObserver‑based fade‑in animations.
  - Gallery lightbox implemented in vanilla JS.
  - Lazy‑loaded images with a small `loaded` state helper.

## File map

Top‑level project:

- `index.html` – Static marketing page version.
- `style.css` – Static site styles (mirrored into theme styles).
- `script.js` – Static site interactions and animations.
- `wordpress/` – WordPress theme source.
- `docs/ARCHITECTURE.md` – This document.

WordPress theme (`wordpress/`):

- `style.css` – Theme stylesheet + WordPress theme headers.
- `functions.php` – Theme setup, Customizer, CPTs, scripts/styles enqueue, contact handler.
- `header.php` – Document head, meta tags, logo/menu output, mobile menu button.
- `index.php` – Single‑page layout using Customizer values and CPT‑backed sections.
- `footer.php` – Footer, social links, dynamic text, analytics + reCAPTCHA output.
- `script.js` – Front‑end interactions reused from the static version.
- `INSTALLATION.md` – How to install and configure the theme on a WordPress site.

Use this document as a quick reference when walking someone through the
architecture during an interview or portfolio review.
