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

        // Local (*.test) serves the gitignored dev/ build written by
        // `npm run watch`; everywhere else serves the committed dist/ build.
        $host = $_SERVER['HTTP_HOST'] ?? '';
        if (substr($host, -5) === '.test') {
            $dev_path = preg_replace('#^/dist/#', '/dev/', $path);
            if (file_exists(get_template_directory() . $dev_path)) {
                return get_template_directory_uri() . $dev_path;
            }
        }

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

        // Enqueue main script (standalone bundle with Alpine.js included)
        wp_enqueue_script(
            'skkr-scripts',
            skkr_mix('/dist/scripts/main.js'),
            [],
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
