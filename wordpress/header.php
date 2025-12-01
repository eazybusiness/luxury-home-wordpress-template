<?php
/**
 * Header template for Bonsai WordPress Theme
 * @package Bonsai
 * @subpackage Bonsai_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php echo get_theme_mod('bonsai_meta_description', 'Bonsai brings Japanese philosophy to luxury residential living. Experience serenity in meticulously designed spaces where beauty meets simplicity.'); ?>">
    <meta name="keywords" content="<?php echo get_theme_mod('bonsai_meta_keywords', 'bonsai, luxury living, real estate, serenity, japanese philosophy, oasis'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php echo get_theme_mod('bonsai_og_description', 'Experience luxury living inspired by Japanese bonsai philosophy'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_theme_mod('bonsai_favicon', get_template_directory_uri() . '/favicon.ico'); ?>">
    
    <!-- WordPress Head -->
    <?php wp_head(); ?>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Header Navigation -->
    <header>
        <nav class="container">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } else {
                $logo_text = get_theme_mod('bonsai_logo_text', 'BONSAI');
                echo '<a href="' . esc_url(home_url('/')) . '" class="logo">' . esc_html($logo_text) . '</a>';
            }
            ?>
            
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-links',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
            } else {
                // Fallback menu
                echo '<ul class="nav-links">';
                echo '<li><a href="#home">Home</a></li>';
                echo '<li><a href="#designer">Designer</a></li>';
                echo '<li><a href="#serenity">Serenity</a></li>';
                echo '<li><a href="#project">Project</a></li>';
                echo '<li><a href="#brochure">Brochure</a></li>';
                echo '<li><a href="#contact">Contact</a></li>';
                echo '</ul>';
            }
            ?>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>
