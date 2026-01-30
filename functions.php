<?php
/**
 * Theme functions and definitions
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

// Theme setup
add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});

add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    if (basename($stylesheet) !== 'templates') {
        update_option('stylesheet', $stylesheet . '/templates');
    }
});

// Load text domain
function skkr_load_theme_textdomain() {
    load_theme_textdomain('wp-theme-skkr', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'skkr_load_theme_textdomain');

// Include theme files
$skkr_includes = [
    'src/setup.php',
    'src/acf-gutenberg-blocks.php',
    'src/enqueue-scripts.php',
];

array_walk($skkr_includes, function ($file) {
    if (!locate_template($file, true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'wp-theme-skkr'), $file), E_USER_ERROR);
    }
});

// Add sk-body class to body
function skkr_body_classes($classes) {
    $classes[] = 'sk-body';
    return $classes;
}
add_filter('body_class', 'skkr_body_classes');
