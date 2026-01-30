<?php
/**
 * Enqueue scripts and styles
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

/**
 * Get versioned asset path from mix-manifest.json
 */
if (!function_exists('skkr_mix')) {
    function skkr_mix($path) {
        static $manifest;

        if (!$manifest) {
            $manifest_path = get_template_directory() . '/mix-manifest.json';
            if (file_exists($manifest_path)) {
                $manifest = json_decode(file_get_contents($manifest_path), true);
            }
        }

        if ($manifest && isset($manifest[$path])) {
            return get_template_directory_uri() . $manifest[$path];
        }

        return get_template_directory_uri() . $path;
    }
}

if (!function_exists('skkr_enqueue_scripts')) {
    function skkr_enqueue_scripts() {

        // Enqueue main stylesheet
        wp_enqueue_style(
            'skkr-style',
            skkr_mix('/dist/styles/main.css'),
            [],
            null
        );

        // Enqueue vendor scripts (extracted by Laravel Mix)
        wp_enqueue_script(
            'skkr-vendor',
            skkr_mix('/dist/scripts/vendor.js'),
            [],
            null,
            true
        );

        // Enqueue manifest (required for code splitting)
        wp_enqueue_script(
            'skkr-manifest',
            skkr_mix('/dist/scripts/manifest.js'),
            [],
            null,
            true
        );

        // Enqueue main script
        wp_enqueue_script(
            'skkr-scripts',
            skkr_mix('/dist/scripts/main.js'),
            ['skkr-vendor', 'skkr-manifest'],
            null,
            true
        );

        // Localize script with WordPress data
        wp_localize_script('skkr-scripts', 'skkrData', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('skkr_nonce'),
            'homeUrl' => home_url('/'),
        ]);
    }
    add_action('wp_enqueue_scripts', 'skkr_enqueue_scripts');
}
