# Bonsai Website - Oasis of Serenity

A luxury real estate website inspired by Japanese bonsai philosophy, featuring dual-language support (English/Arabic RTL), modern design, and WordPress compatibility.

## What this project demonstrates (WordPress portfolio)

- Custom WordPress theme built from a bespoke HTML/CSS/JS design.
- Use of the WordPress Customizer for hero text, colors, footer copy, SEO meta, social links, and more.
- Custom post types for Projects and Gallery items, wired into the front page layout.
- Contact form flow using Contact Form 7 with a secure fallback form handled in `functions.php`.
- RTL‑ready, translation‑ready front-end for English/Arabic experiences.
- Modern front-end techniques: smooth scrolling, IntersectionObserver animations, lightbox, and lazy-loaded imagery.

## How I built this

1. Started from a single-page marketing concept for a luxury real estate brand and designed the layout in plain HTML, CSS, and vanilla JavaScript.
2. Iterated on a mobile‑first layout with responsive grids, smooth scrolling, and scroll‑based animations to keep the experience lightweight but premium.
3. Extracted visual design tokens (colors, spacing, typography) into CSS variables so the theme could be easily re‑skinned.
4. Converted the static page into a WordPress theme by splitting the layout into `header.php`, `index.php`, and `footer.php`, and wiring everything through `functions.php`.
5. Added custom post types for Projects and Gallery so real content can be managed from the WordPress admin instead of hard‑coding cards.
6. Implemented WordPress Customizer options for hero copy, section texts, colors, SEO meta, social links, and contact settings.
7. Integrated Contact Form 7 with a fallback PHP form handler, plus hooks for reCAPTCHA and Google Analytics.

## Features

- ✅ **Responsive Design**: Mobile-first approach with desktop optimization
- ✅ **SEO Optimized**: Meta tags, semantic HTML, structured data
- ✅ **Professional Animations**: Smooth scroll animations and micro-interactions
- ✅ **Gallery Lightbox**: Interactive image gallery with modal viewing
- ✅ **Contact Form**: Functional contact form with validation
- ✅ **Modern UI**: Clean, minimalist luxury aesthetic
- ✅ **Performance Optimized**: Lazy loading, optimized animations
- ✅ **Cross-browser Compatible**: Works on all modern browsers

## Project Structure

```
bonsai-website/
├── index.html           # Static one-page marketing site
├── style.css            # Static site styling
├── script.js            # Static site interactions
├── wordpress/           # Production-ready WordPress theme
│   ├── style.css        # Theme stylesheet + WP headers
│   ├── functions.php    # Theme setup, CPTs, Customizer, contact handler
│   ├── index.php        # One-page layout using WP data
│   ├── header.php       # Head, navigation, meta tags
│   ├── footer.php       # Footer, social links, analytics hooks
│   ├── script.js        # Theme JavaScript
│   ├── INSTALLATION.md  # Theme installation & configuration
│   └── bonsai.zip       # Zipped theme for quick upload
├── docs/
│   └── ARCHITECTURE.md  # High-level architecture & flow
├── CONTRIBUTING.md      # Contribution guidelines
├── LICENSE              # GPL-2.0-or-later license
├── .gitignore           # Git ignore rules
└── README.md            # Project documentation
```

## Sections Included

1. **Home**: Hero section with compelling messaging
2. **Serenity**: Bonsai philosophy and brand story
3. **Project**: Investment opportunities and features
4. **Designer**: Team information and expertise
5. **Gallery**: Visual showcase with lightbox
6. **Brochure**: Download section for marketing materials
7. **Contact**: Contact form with reCAPTCHA support

## WordPress Integration

This repository already includes a fully working WordPress theme in `wordpress/` that reuses the same visual design as the static page.

### Theme Highlights
- HTML/CSS/JS from the static page ported into WordPress templates.
- Custom post types for projects (`bonsai_project`) and gallery items (`bonsai_gallery`).
- Theme Customizer controls for hero content, philosophy copy, brochure texts, colors, SEO meta, social links, and contact settings.
- Built-in support for Contact Form 7, with a secure PHP fallback handler.
- RTL/translation ready via `Text Domain: bonsai` and RTL helper classes in the stylesheet.

For full installation and configuration details, see:
- `wordpress/INSTALLATION.md`
- `docs/ARCHITECTURE.md`

### Required Plugins
- **Polylang** or **WPML** for dual-language support
- **Contact Form 7** for enhanced contact functionality
- **Yoast SEO** for advanced SEO optimization
- **reCAPTCHA** integration for spam protection

## Installation Instructions

### Static Version (Current)
1. Upload all files to your web server
2. Update contact form endpoint in `script.js`
3. Add Google Analytics tracking code
4. Configure reCAPTCHA keys

### WordPress Version
1. Create or use an existing WordPress installation.
2. Follow the detailed steps in `wordpress/INSTALLATION.md` to upload and activate the Bonsai theme.
3. Install the suggested plugins (Polylang/WPML, Contact Form 7, SEO plugin).
4. Configure language/RTL settings and customize content via the WordPress Customizer.

## Customization

### Colors
Edit CSS variables in `style.css`:
```css
:root {
    --primary-color: #2c3e50;
    --secondary-color: #27ae60;
    --accent-color: #e67e22;
}
```

### Content
All content is easily editable:
- Text content in HTML files
- Images can be updated via URLs
- Contact form fields are customizable
- Gallery images are responsive

### Arabic RTL Support
The website is prepared for Arabic RTL:
- CSS includes RTL-specific styles
- Text direction will automatically adjust
- Navigation and layout optimized for RTL

## Performance Features

- **Lazy Loading**: Images load as needed
- **Optimized Animations**: Hardware-accelerated CSS
- **Minified Code**: Clean, efficient markup
- **CDN Ready**: External resources loaded from CDNs

## SEO Features

- Semantic HTML5 structure
- Meta tags for social sharing
- Open Graph implementation
- Mobile-friendly design
- Fast loading times
- Clean URLs structure

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Mobile browsers (iOS Safari, Android Chrome)

## Contact Form Integration

The contact form includes:
- Client-side validation
- Email format verification
- Required field checking
- reCAPTCHA integration ready
- Success/error notifications

## Analytics Integration

- Google Analytics ready
- Event tracking for interactions
- Page view tracking
- User engagement metrics

## Future Enhancements

- **Property Listings**: Dynamic property database
- **Virtual Tours**: 360° property viewing
- **Booking System**: Schedule property visits
- **Multi-language**: Additional language support
- **E-commerce**: Property investment platform

## Support

For technical support or customization requests:
- Email: info@bonsai.sa
- Phone: +966 50 123 4567

## License

The theme code (PHP, HTML, CSS, and JavaScript) is licensed under **GPL-2.0-or-later**.

See the `LICENSE` file for full terms. The Bonsai brand name, logo, and any proprietary content remain the property of their respective owners.

---

**Note**: This is the English version. Arabic RTL version will be developed based on client approval of this initial design.
