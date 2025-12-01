<?php
/**
 * Main template file for Bonsai WordPress Theme
 * @package Bonsai
 * @subpackage Bonsai_Theme
 */

get_header(); ?>

<main>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1><?php echo get_theme_mod('bonsai_hero_title', 'OASIS OF SERENITY'); ?></h1>
            <p class="subtitle"><?php echo get_theme_mod('bonsai_hero_subtitle', '安らぎのオアシス'); ?></p>
            <p style="margin-bottom: 2rem; opacity: 0.9;">
                <?php echo get_theme_mod('bonsai_hero_description', 'Experience luxury living inspired by Japanese bonsai philosophy'); ?>
            </p>
            <a href="#project" class="cta-button"><?php echo get_theme_mod('bonsai_hero_cta_text', 'Explore Our Vision'); ?></a>
        </div>
    </section>

    <!-- Bonsai Philosophy Section -->
    <section id="serenity" class="philosophy">
        <div class="container">
            <h2 class="section-title fade-in"><?php echo get_theme_mod('bonsai_philosophy_title', 'BONSAI PHILOSOPHY'); ?></h2>
            <div class="philosophy-content">
                <div class="philosophy-text fade-in">
                    <h3 style="font-weight: 300; margin-bottom: 1rem; color: var(--secondary-color);">
                        <?php echo get_theme_mod('bonsai_philosophy_subtitle', 'BEAUTY IN SIMPLICITY'); ?>
                    </h3>
                    <?php
                    $philosophy_content = get_theme_mod('bonsai_philosophy_content', 
                        'Bonsai is not just a small tree in a pot — it is the heart of a timeless Japanese art form that embodies harmony between nature and human presence. It reveals beauty in its purest form, through delicate details crafted within limited space.');
                    echo '<p>' . esc_html($philosophy_content) . '</p>';
                    
                    $philosophy_content_2 = get_theme_mod('bonsai_philosophy_content_2',
                        'Bonsai is a deep philosophy that teaches serenity, mindfulness, and the ability to see beauty in simplicity. At Bonsai, we bring this philosophy to life through our residential projects — compact spaces designed with thoughtful intention and meticulous attention to detail.');
                    echo '<p style="margin-top: 1rem;">' . esc_html($philosophy_content_2) . '</p>';
                    
                    $philosophy_content_3 = get_theme_mod('bonsai_philosophy_content_3',
                        'Every corner is an investment in experience, every square meter is used with intelligence, and every element reflects elegance born from simplicity.');
                    echo '<p style="margin-top: 1rem; font-style: italic; color: var(--text-light);">' . esc_html($philosophy_content_3) . '</p>';
                    ?>
                    <a href="#project" class="cta-button" style="margin-top: 2rem;">
                        <?php echo get_theme_mod('bonsai_philosophy_cta', 'Discover Our Projects'); ?>
                    </a>
                </div>
                <div class="philosophy-image fade-in">
                    <?php
                    $philosophy_image = get_theme_mod('bonsai_philosophy_image', 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80');
                    echo '<img src="' . esc_url($philosophy_image) . '" alt="Bonsai Tree" style="width: 100%; height: 400px; object-fit: cover;">';
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="project" style="background: var(--bg-white);">
        <div class="container">
            <h2 class="section-title fade-in"><?php echo get_theme_mod('bonsai_features_title', 'ATTRACTIVE INVESTMENT'); ?></h2>
            <div class="features">
                <?php
                // Display features from WordPress options or default
                $features = array(
                    array(
                        'icon' => 'fas fa-home',
                        'title' => get_theme_mod('bonsai_feature_1_title', 'Luxury Living'),
                        'content' => get_theme_mod('bonsai_feature_1_content', 'Experience the perfect blend of traditional Japanese aesthetics and modern luxury in every carefully designed space.')
                    ),
                    array(
                        'icon' => 'fas fa-leaf',
                        'title' => get_theme_mod('bonsai_feature_2_title', 'Natural Harmony'),
                        'content' => get_theme_mod('bonsai_feature_2_content', 'Our designs bring nature indoors, creating serene environments that promote peace and wellbeing.')
                    ),
                    array(
                        'icon' => 'fas fa-gem',
                        'title' => get_theme_mod('bonsai_feature_3_title', 'Meticulous Craftsmanship'),
                        'content' => get_theme_mod('bonsai_feature_3_content', 'Every detail is thoughtfully considered, from the layout to the materials, reflecting the precision of bonsai art.')
                    ),
                    array(
                        'icon' => 'fas fa-map-marker-alt',
                        'title' => get_theme_mod('bonsai_feature_4_title', 'Vibrant Location'),
                        'content' => get_theme_mod('bonsai_feature_4_content', 'Situated in prime locations that offer both tranquility and convenience, perfect for modern living.')
                    ),
                    array(
                        'icon' => 'fas fa-users',
                        'title' => get_theme_mod('bonsai_feature_5_title', 'Expert Team'),
                        'content' => get_theme_mod('bonsai_feature_5_content', 'Our team of designers and architects brings decades of experience in creating exceptional living spaces.')
                    ),
                    array(
                        'icon' => 'fas fa-chart-line',
                        'title' => get_theme_mod('bonsai_feature_6_title', 'Smart Investment'),
                        'content' => get_theme_mod('bonsai_feature_6_content', 'Invest in a property that not only provides luxury living but also promises excellent returns and value appreciation.')
                    )
                );

                foreach ($features as $index => $feature) {
                    echo '<div class="feature-card fade-in">';
                    echo '<div class="feature-icon"><i class="' . esc_attr($feature['icon']) . '"></i></div>';
                    echo '<h3 style="font-weight: 400; margin-bottom: 1rem;">' . esc_html($feature['title']) . '</h3>';
                    echo '<p>' . esc_html($feature['content']) . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section style="background: var(--bg-light);">
        <div class="container">
            <h2 class="section-title fade-in"><?php echo get_theme_mod('bonsai_gallery_title', 'GALLERY'); ?></h2>
            <div class="gallery">
                <?php
                // Get gallery images from WordPress media or use defaults
                $gallery_images = get_theme_mod('bonsai_gallery_images', '');
                if (empty($gallery_images)) {
                    // Default gallery images
                    $default_images = array(
                        array('src' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'title' => 'Serene Living Space'),
                        array('src' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'title' => 'Modern Design'),
                        array('src' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'title' => 'Gourmet Kitchen'),
                        array('src' => 'https://images.unsplash.com/photo-1600566753376-12c8ac737b36?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'title' => 'Peaceful Retreat'),
                        array('src' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'title' => 'Spa Bathroom'),
                        array('src' => 'https://images.unsplash.com/photo-1600047509358-9dc75507daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'title' => 'Outdoor Oasis')
                    );
                    
                    foreach ($default_images as $image) {
                        echo '<div class="gallery-item fade-in">';
                        echo '<img src="' . esc_url($image['src']) . '" alt="' . esc_attr($image['title']) . '">';
                        echo '<div class="gallery-overlay">';
                        echo '<span style="color: white; font-size: 1.2rem;">' . esc_html($image['title']) . '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="designer">
        <div class="container">
            <h2 class="section-title fade-in"><?php echo get_theme_mod('bonsai_team_title', 'OUR TEAM'); ?></h2>
            <div class="features">
                <?php
                $team_members = array(
                    array(
                        'icon' => 'fas fa-user-tie',
                        'title' => get_theme_mod('bonsai_team_1_title', 'Lead Architect'),
                        'content' => get_theme_mod('bonsai_team_1_content', 'Bringing over 20 years of experience in luxury residential design with a focus on Japanese aesthetics.')
                    ),
                    array(
                        'icon' => 'fas fa-paint-brush',
                        'title' => get_theme_mod('bonsai_team_2_title', 'Interior Designer'),
                        'content' => get_theme_mod('bonsai_team_2_content', 'Specializing in creating serene spaces that balance modern functionality with traditional beauty.')
                    ),
                    array(
                        'icon' => 'fas fa-drafting-compass',
                        'title' => get_theme_mod('bonsai_team_3_title', 'Project Manager'),
                        'content' => get_theme_mod('bonsai_team_3_content', 'Ensuring every project meets our exacting standards for quality and attention to detail.')
                    )
                );

                foreach ($team_members as $member) {
                    echo '<div class="feature-card fade-in">';
                    echo '<div class="feature-icon"><i class="' . esc_attr($member['icon']) . '"></i></div>';
                    echo '<h3 style="font-weight: 400; margin-bottom: 1rem;">' . esc_html($member['title']) . '</h3>';
                    echo '<p>' . esc_html($member['content']) . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Brochure Section -->
    <section id="brochure" style="background: var(--bg-light);">
        <div class="container">
            <h2 class="section-title fade-in"><?php echo get_theme_mod('bonsai_brochure_title', 'BROCHURE'); ?></h2>
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <p style="font-size: 1.1rem; margin-bottom: 2rem; color: var(--text-dark);">
                    <?php echo get_theme_mod('bonsai_brochure_description', 'Download our comprehensive brochure to learn more about the Bonsai philosophy and our exclusive residential projects.'); ?>
                </p>
                <?php
                $english_brochure = get_theme_mod('bonsai_english_brochure_url', '#');
                $arabic_brochure = get_theme_mod('bonsai_arabic_brochure_url', '#');
                ?>
                <a href="<?php echo esc_url($english_brochure); ?>" class="cta-button" style="margin-right: 1rem;">
                    <i class="fas fa-download"></i> <?php echo get_theme_mod('bonsai_english_brochure_text', 'Download English Brochure'); ?>
                </a>
                <a href="<?php echo esc_url($arabic_brochure); ?>" class="cta-button" style="background: var(--primary-color);">
                    <i class="fas fa-download"></i> <?php echo get_theme_mod('bonsai_arabic_brochure_text', 'Download Arabic Brochure'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title fade-in"><?php echo get_theme_mod('bonsai_contact_title', 'CONTACT US'); ?></h2>
            <div class="contact-form fade-in">
                <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]'); ?>
                <!-- Fallback form if Contact Form 7 is not active -->
                <?php if (!shortcode_exists('contact-form-7')) : ?>
                <form id="contactForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="bonsai_contact_form">
                    <?php wp_nonce_field('bonsai_contact_nonce'); ?>
                    <div class="form-group">
                        <label for="name"><?php echo get_theme_mod('bonsai_form_name_label', 'Full Name'); ?> *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo get_theme_mod('bonsai_form_email_label', 'Email Address'); ?> *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo get_theme_mod('bonsai_form_phone_label', 'Phone Number'); ?></label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="subject"><?php echo get_theme_mod('bonsai_form_subject_label', 'Subject'); ?> *</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message"><?php echo get_theme_mod('bonsai_form_message_label', 'Message'); ?> *</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <?php if (get_theme_mod('bonsai_enable_recaptcha', true)) : ?>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="<?php echo esc_attr(get_theme_mod('bonsai_recaptcha_site_key', '')); ?>"></div>
                    </div>
                    <?php endif; ?>
                    <button type="submit" class="cta-button" style="width: 100%;">
                        <?php echo get_theme_mod('bonsai_form_submit_text', 'Send Message'); ?>
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
