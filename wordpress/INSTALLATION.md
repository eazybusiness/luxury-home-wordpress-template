# Bonsai WordPress Theme - Installation Guide

## 🚀 Quick Installation for Contest

### Prerequisites
- WordPress 5.0+ installed on your Ionos server
- PHP 7.4+ 
- MySQL 5.6+ or MariaDB 10.0+
- FTP/SFTP access to your server

### Step 1: Upload Theme Files
1. Navigate to `/wp-content/themes/` directory
2. Create a new folder called `bonsai`
3. Upload all WordPress theme files to `/wp-content/themes/bonsai/`:
   - `style.css`
   - `index.php`
   - `header.php`
   - `footer.php`
   - `functions.php`
   - `script.js`

### Step 2: Activate Theme
1. Login to WordPress admin: `yourdomain.com/wp-admin`
2. Go to **Appearance → Themes**
3. Find "Bonsai - Oasis of Serenity" and click **Activate**

### Step 3: Configure Theme Settings
1. Go to **Appearance → Customize**
2. Configure each section:

#### Hero Section
- Hero Title: "OASIS OF SERENITY"
- Hero Subtitle: "安らぎのオアシス"
- Hero Description: Your marketing text

#### Theme Colors
- Primary Color: `#2c3e50`
- Secondary Color: `#27ae60`
- Accent Color: `#e67e22`

#### Contact Settings
- Contact Email: Your email address
- Enable reCAPTCHA: Check if using
- reCAPTCHA Site Key: Your Google reCAPTCHA key

#### Social Media
- Add your social media URLs

#### SEO Settings
- Meta Description: SEO description
- Meta Keywords: SEO keywords
- Google Analytics: Your GA tracking ID

### Step 4: Set Up Navigation
1. Go to **Appearance → Menus**
2. Create a new menu called "Primary Menu"
3. Add menu items:
   - Home (URL: `#home`)
   - Designer (URL: `#designer`)
   - Serenity (URL: `#serenity`)
   - Project (URL: `#project`)
   - Brochure (URL: `#brochure`)
   - Contact (URL: `#contact`)
4. Assign to "Primary Menu" location

### Step 5: Configure Contact Form
**Option A: Use Contact Form 7 Plugin (Recommended)**
1. Install and activate Contact Form 7
2. Create a new contact form with fields:
   - Name (required)
   - Email (required)
   - Phone
   - Subject (required)
   - Message (required)
3. Add form ID to theme: `[contact-form-7 id="1" title="Contact form 1"]`

**Option B: Use Built-in Form**
1. Configure email in **Appearance → Customize → Contact Settings**
2. Set up reCAPTCHA if enabled
3. Form will work automatically

### Step 6: Add Content
#### Using Custom Post Types
1. Go to **Projects → Add New** for property listings
2. Go to **Gallery → Add New** for gallery items
3. Set featured images for each

#### Using Theme Customizer
1. Edit all text content in **Appearance → Customize**
2. Upload images via customizer or media library

### Step 7: Test Functionality
1. Test navigation links work smoothly
2. Test contact form submission
3. Test mobile responsiveness
4. Test animations and interactions
5. Verify all content is editable via WordPress admin

### Step 8: Prepare for Contest
1. **Create admin credentials for client:**
   - Username: `bonsai-admin`
   - Password: `Bonsai@2024!`
   - Role: Administrator

2. **Verify contest requirements:**
   - ✅ Fully functional WordPress website
   - ✅ All elements editable via admin
   - ✅ Mobile-first responsive design
   - ✅ SEO optimized
   - ✅ Professional animations
   - ✅ Contact form with reCAPTCHA ready
   - ✅ Social media integration
   - ✅ Google Analytics ready

## 📁 File Structure
```
/wp-content/themes/bonsai/
├── style.css           # Theme styles with WordPress headers
├── index.php           # Main template with WordPress functions
├── header.php          # Header with WordPress menu support
├── footer.php          # Footer with dynamic content
├── functions.php       # Theme setup and custom functionality
├── script.js           # Interactive JavaScript
└── INSTALLATION.md     # This file
```

## 🔧 Advanced Configuration

### Custom Post Types
The theme includes two custom post types:
- **Projects**: For property listings
- **Gallery**: For image gallery items

### Theme Customizer Options
All content is customizable via:
- **Hero Section**: Title, subtitle, description
- **Theme Colors**: Primary, secondary, accent colors
- **Contact Settings**: Email, reCAPTCHA
- **Social Media**: All platform URLs
- **SEO Settings**: Meta tags, Google Analytics

### RTL Support for Arabic
The theme is prepared for Arabic RTL:
- CSS includes RTL-specific styles
- Text direction automatically adjusts
- Ready for Arabic translation

## 🌐 Multilingual Setup (Future)
For Arabic version, install:
1. **Polylang** or **WPML** plugin
2. Configure Arabic as second language
3. Set RTL direction for Arabic
4. Translate content via plugin

## 📞 Support
For technical issues:
- Check WordPress debug log: `/wp-content/debug.log`
- Verify PHP version: 7.4+ required
- Check file permissions: 755 for folders, 644 for files
- Ensure WordPress memory limit: 128MB+

## ⚡ Performance Optimization
- Images lazy loaded automatically
- CSS/JS minified in production
- Compatible with caching plugins
- Optimized for mobile performance

---

**Theme Version**: 1.0.0  
**WordPress Version**: 5.0+  
**PHP Version**: 7.4+  
**Contest Ready**: ✅ YES
