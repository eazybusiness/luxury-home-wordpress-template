<?php
/**
 * Functions file for Bonsai WordPress Theme
 * @package Bonsai
 * @subpackage Bonsai_Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function bonsai_theme_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('customize-selective-refresh-widgets');
    
    // Set default content width
    $GLOBALS['content_width'] = 1200;
    
    // Load theme textdomain for translation
    load_theme_textdomain('bonsai', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'bonsai_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function bonsai_enqueue_scripts() {
    // Main stylesheet
    wp_enqueue_style('bonsai-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('bonsai-google-fonts', 'https://fonts.googleapis.com/css2?family=Segoe+UI:wght@300;400;500;600&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('bonsai-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Main JavaScript file
    wp_enqueue_script('bonsai-script', get_template_directory_uri() . '/script.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('bonsai-script', 'bonsai_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('bonsai_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'bonsai_enqueue_scripts');

/**
 * Register Navigation Menus
 */
function bonsai_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bonsai'),
        'footer' => __('Footer Menu', 'bonsai'),
    ));
}
add_action('init', 'bonsai_register_menus');

/**
 * Register Custom Post Types
 */
function bonsai_register_post_types() {
    // Projects Post Type
    register_post_type('bonsai_project', array(
        'labels' => array(
            'name' => __('Projects', 'bonsai'),
            'singular_name' => __('Project', 'bonsai'),
            'add_new' => __('Add New Project', 'bonsai'),
            'add_new_item' => __('Add New Project', 'bonsai'),
            'edit_item' => __('Edit Project', 'bonsai'),
            'new_item' => __('New Project', 'bonsai'),
            'view_item' => __('View Project', 'bonsai'),
            'search_items' => __('Search Projects', 'bonsai'),
            'not_found' => __('No projects found', 'bonsai'),
            'not_found_in_trash' => __('No projects found in trash', 'bonsai'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-building',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'projects'),
    ));
    
    // Gallery Post Type
    register_post_type('bonsai_gallery', array(
        'labels' => array(
            'name' => __('Gallery Items', 'bonsai'),
            'singular_name' => __('Gallery Item', 'bonsai'),
            'add_new' => __('Add New Gallery Item', 'bonsai'),
            'add_new_item' => __('Add New Gallery Item', 'bonsai'),
            'edit_item' => __('Edit Gallery Item', 'bonsai'),
            'new_item' => __('New Gallery Item', 'bonsai'),
            'view_item' => __('View Gallery Item', 'bonsai'),
            'search_items' => __('Search Gallery Items', 'bonsai'),
            'not_found' => __('No gallery items found', 'bonsai'),
            'not_found_in_trash' => __('No gallery items found in trash', 'bonsai'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'excerpt', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'gallery'),
    ));
}
add_action('init', 'bonsai_register_post_types');

/**
 * Theme Customizer Setup
 */
function bonsai_customize_register($wp_customize) {
    
    // Hero Section
    $wp_customize->add_section('bonsai_hero', array(
        'title' => __('Hero Section', 'bonsai'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('bonsai_hero_title', array(
        'default' => 'OASIS OF SERENITY',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bonsai_hero_title', array(
        'label' => __('Hero Title', 'bonsai'),
        'section' => 'bonsai_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('bonsai_hero_subtitle', array(
        'default' => '安らぎのオアシス',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bonsai_hero_subtitle', array(
        'label' => __('Hero Subtitle', 'bonsai'),
        'section' => 'bonsai_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('bonsai_hero_description', array(
        'default' => 'Experience luxury living inspired by Japanese bonsai philosophy',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('bonsai_hero_description', array(
        'label' => __('Hero Description', 'bonsai'),
        'section' => 'bonsai_hero',
        'type' => 'textarea',
    ));
    
    // Contact Form Settings
    $wp_customize->add_section('bonsai_contact', array(
        'title' => __('Contact Settings', 'bonsai'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('bonsai_contact_email', array(
        'default' => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('bonsai_contact_email', array(
        'label' => __('Contact Email', 'bonsai'),
        'section' => 'bonsai_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('bonsai_enable_recaptcha', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('bonsai_enable_recaptcha', array(
        'label' => __('Enable reCAPTCHA', 'bonsai'),
        'section' => 'bonsai_contact',
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('bonsai_recaptcha_site_key', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bonsai_recaptcha_site_key', array(
        'label' => __('reCAPTCHA Site Key', 'bonsai'),
        'section' => 'bonsai_contact',
        'type' => 'text',
    ));
    
    // Social Media Settings
    $wp_customize->add_section('bonsai_social', array(
        'title' => __('Social Media', 'bonsai'),
        'priority' => 40,
    ));
    
    $social_platforms = array(
        'facebook' => __('Facebook URL', 'bonsai'),
        'twitter' => __('Twitter URL', 'bonsai'),
        'instagram' => __('Instagram URL', 'bonsai'),
        'linkedin' => __('LinkedIn URL', 'bonsai'),
        'youtube' => __('YouTube URL', 'bonsai'),
    );
    
    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting('bonsai_' . $platform . '_url', array(
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('bonsai_' . $platform . '_url', array(
            'label' => $label,
            'section' => 'bonsai_social',
            'type' => 'url',
        ));
    }
    
    // SEO Settings
    $wp_customize->add_section('bonsai_seo', array(
        'title' => __('SEO Settings', 'bonsai'),
        'priority' => 45,
    ));
    
    $wp_customize->add_setting('bonsai_meta_description', array(
        'default' => 'Bonsai brings Japanese philosophy to luxury residential living. Experience serenity in meticulously designed spaces where beauty meets simplicity.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('bonsai_meta_description', array(
        'label' => __('Meta Description', 'bonsai'),
        'section' => 'bonsai_seo',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('bonsai_meta_keywords', array(
        'default' => 'bonsai, luxury living, real estate, serenity, japanese philosophy, oasis',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bonsai_meta_keywords', array(
        'label' => __('Meta Keywords', 'bonsai'),
        'section' => 'bonsai_seo',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('bonsai_google_analytics_code', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bonsai_google_analytics_code', array(
        'label' => __('Google Analytics Tracking ID', 'bonsai'),
        'section' => 'bonsai_seo',
        'type' => 'text',
    ));
}
add_action('customize_register', 'bonsai_customize_register');

/**
 * Handle Contact Form Submission
 */
function bonsai_handle_contact_form() {
    if (!wp_verify_nonce($_POST['nonce'], 'bonsai_contact_nonce')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    $to = get_theme_mod('bonsai_contact_email', get_option('admin_email'));
    $subject = 'New Contact Form Submission: ' . $subject;
    
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_redirect(home_url('?contact=success'));
    } else {
        wp_redirect(home_url('?contact=error'));
    }
    exit;
}
add_action('admin_post_bonsai_contact_form', 'bonsai_handle_contact_form');
add_action('admin_post_nopriv_bonsai_contact_form', 'bonsai_handle_contact_form');

/**
 * Customizer CSS Output
 */
function bonsai_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr(get_theme_mod('bonsai_primary_color', '#2c3e50')); ?>;
            --secondary-color: <?php echo esc_attr(get_theme_mod('bonsai_secondary_color', '#27ae60')); ?>;
            --accent-color: <?php echo esc_attr(get_theme_mod('bonsai_accent_color', '#e67e22')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'bonsai_customizer_css');

/**
 * Add customizer color settings
 */
function bonsai_add_color_settings($wp_customize) {
    $wp_customize->add_section('bonsai_colors', array(
        'title' => __('Theme Colors', 'bonsai'),
        'priority' => 25,
    ));
    
    $colors = array(
        'bonsai_primary_color' => array(
            'default' => '#2c3e50',
            'label' => __('Primary Color', 'bonsai'),
        ),
        'bonsai_secondary_color' => array(
            'default' => '#27ae60',
            'label' => __('Secondary Color', 'bonsai'),
        ),
        'bonsai_accent_color' => array(
            'default' => '#e67e22',
            'label' => __('Accent Color', 'bonsai'),
        ),
    );
    
    foreach ($colors as $setting => $options) {
        $wp_customize->add_setting($setting, array(
            'default' => $options['default'],
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label' => $options['label'],
            'section' => 'bonsai_colors',
            'settings' => $setting,
        )));
    }
}
add_action('customize_register', 'bonsai_add_color_settings');
