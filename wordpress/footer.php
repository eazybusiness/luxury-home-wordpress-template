<?php
/**
 * Footer template for Bonsai WordPress Theme
 * @package Bonsai
 * @subpackage Bonsai_Theme
 */

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <h3 style="font-weight: 300; margin-bottom: 1rem;"><?php echo get_theme_mod('bonsai_footer_logo', 'BONSAI'); ?></h3>
                    <p><?php echo get_theme_mod('bonsai_footer_tagline', 'Oasis of Serenity'); ?></p>
                    <p style="margin-top: 0.5rem; opacity: 0.8;"><?php echo get_theme_mod('bonsai_footer_description', 'Experience luxury living inspired by Japanese philosophy'); ?></p>
                </div>
                <div>
                    <h4 style="font-weight: 400; margin-bottom: 1rem;"><?php echo get_theme_mod('bonsai_footer_quick_links_title', 'Quick Links'); ?></h4>
                    <ul style="list-style: none;">
                        <?php
                        if (has_nav_menu('footer')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => '',
                                'container'      => false,
                                'fallback_cb'    => false,
                                'items_wrap'     => '%3$s',
                            ));
                        } else {
                            echo '<li style="margin-bottom: 0.5rem;"><a href="' . esc_url(home_url('#home')) . '" style="color: white; text-decoration: none;">Home</a></li>';
                            echo '<li style="margin-bottom: 0.5rem;"><a href="' . esc_url(home_url('#designer')) . '" style="color: white; text-decoration: none;">Designer</a></li>';
                            echo '<li style="margin-bottom: 0.5rem;"><a href="' . esc_url(home_url('#serenity')) . '" style="color: white; text-decoration: none;">Serenity</a></li>';
                            echo '<li style="margin-bottom: 0.5rem;"><a href="' . esc_url(home_url('#project')) . '" style="color: white; text-decoration: none;">Project</a></li>';
                            echo '<li style="margin-bottom: 0.5rem;"><a href="' . esc_url(home_url('#brochure')) . '" style="color: white; text-decoration: none;">Brochure</a></li>';
                            echo '<li style="margin-bottom: 0.5rem;"><a href="' . esc_url(home_url('#contact')) . '" style="color: white; text-decoration: none;">Contact</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div>
                    <h4 style="font-weight: 400; margin-bottom: 1rem;"><?php echo get_theme_mod('bonsai_footer_contact_title', 'Contact Info'); ?></h4>
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-phone"></i> <?php echo get_theme_mod('bonsai_footer_phone', '+966 50 123 4567'); ?>
                    </p>
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-envelope"></i> <?php echo get_theme_mod('bonsai_footer_email', 'info@bonsai.sa'); ?>
                    </p>
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-map-marker-alt"></i> <?php echo get_theme_mod('bonsai_footer_address', 'Riyadh, Saudi Arabia'); ?>
                    </p>
                </div>
            </div>
            <div class="social-links">
                <?php
                $social_links = array(
                    'facebook' => get_theme_mod('bonsai_facebook_url', '#'),
                    'twitter' => get_theme_mod('bonsai_twitter_url', '#'),
                    'instagram' => get_theme_mod('bonsai_instagram_url', '#'),
                    'linkedin' => get_theme_mod('bonsai_linkedin_url', '#'),
                    'youtube' => get_theme_mod('bonsai_youtube_url', '#'),
                );

                foreach ($social_links as $platform => $url) {
                    if (!empty($url) && $url !== '#') {
                        echo '<a href="' . esc_url($url) . '" target="_blank"><i class="fab fa-' . esc_attr($platform) . '"></i></a>';
                    }
                }
                ?>
            </div>
            <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php echo get_theme_mod('bonsai_footer_copyright', 'All rights reserved.'); ?> | 
                    <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" style="color: white;"><?php echo get_theme_mod('bonsai_footer_privacy_text', 'Privacy Policy'); ?></a> | 
                    <a href="<?php echo esc_url(get_theme_mod('bonsai_terms_url', '#')); ?>" style="color: white;"><?php echo get_theme_mod('bonsai_footer_terms_text', 'Terms of Service'); ?></a>
                </p>
            </div>
        </div>
    </footer>

    <!-- WordPress Footer -->
    <?php wp_footer(); ?>

    <!-- Google reCAPTCHA -->
    <?php if (get_theme_mod('bonsai_enable_recaptcha', true)) : ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>

    <!-- Google Analytics -->
    <?php
    $ga_code = get_theme_mod('bonsai_google_analytics_code');
    if (!empty($ga_code)) :
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_code); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_attr($ga_code); ?>');
    </script>
    <?php endif; ?>

</body>
</html>
