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

if( !function_exists( 'skkr_allowed_block_types' ) ) {
 
	function dinero_allowed_block_types( $allowed_blocks, $editor_context ) {

        $allowed_blocks = array(
            //CORE
            // 'core/audio',
            // 'core/button', // Erstat med ACF buttons
            // 'core/buttons', // Erstat med ACF buttons
            // 'core/classic-editor',
            // 'core/column',
            // 'core/columns',
            'core/embed', // Kan ikke altid erstattes med oEmbed
            // 'core/gallery',
            // 'core/group',
            'core/heading',
            // 'core/html',
            'core/image',
            // 'core/list',
            // 'core/list-item',
            // 'core/more',
            // 'core/navigation-link',
            // 'core/navigation-submenu',
            'core/paragraph',
            // 'core/pullquote', // Erstat med blockquote
            // 'core/quote', // Erstat med blockquote
            // 'core/search',
            // 'core/separator',
            // 'core/shortcode',
            // 'core/spacer',
            // 'core/table',
            'core/video',
            
            'acf/hero',
            'acf/text-media',
            'acf/oneliner',
        );
		
        // $acf_blocks = acf_get_block_types();
        // $allowed_blocks = array();
        // foreach ($acf_blocks as $block) {			
        //     $allowed_blocks[] = $block['name'];
        // }

		return $allowed_blocks;
		
	
	}

	add_filter( 'allowed_block_types_all', 'dinero_allowed_block_types', 25, 2 );

}
