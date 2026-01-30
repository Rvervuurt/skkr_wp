<?php
/**
 * Theme setup
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

if (!function_exists('skkr_setup')) {
    function skkr_setup() {

        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Enable HTML5 markup
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        ]);

        // Add theme support for selective refresh for widgets
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for responsive embedded content
        add_theme_support('responsive-embeds');

        // Add support for editor styles
        add_theme_support('editor-styles');

        // Add support for wide and full alignment
        add_theme_support('align-wide');
    }
    add_action('after_setup_theme', 'skkr_setup');
}

// Set image sizes
if (!function_exists('skkr_after_switch_theme')) {
    function skkr_after_switch_theme() {
        update_option('thumbnail_size_w', 150);
        update_option('thumbnail_size_h', 150);
        update_option('thumbnail_crop', 1);

        update_option('medium_size_w', 920);
        update_option('medium_size_h', 1200);

        update_option('large_size_w', 2000);
        update_option('large_size_h', 1200);
    }
    add_action('after_setup_theme', 'skkr_after_switch_theme');
}
