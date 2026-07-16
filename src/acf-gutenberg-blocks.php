<?php
/**
 * Registers Gutenberg Blocks with ACF
 *
 * @package WordPress
 * @subpackage skkr
 * @since 1.0.0
 */

if (!function_exists('skkr_acf_register_block')) {
    function skkr_acf_register_block() {

        // Check if ACF function exists
        if (function_exists('acf_register_block')) {

            // Register Hero block
            acf_register_block([
                'name'              => 'hero',
                'title'             => __('Hero', 'skkr'),
                'description'       => __('A hero section block.', 'skkr'),
                'render_template'   => 'partials/blocks/block-hero.php',
                'category'          => 'skkr-blocks',
                'icon'              => 'cover-image',
                'mode'              => 'edit',
                'keywords'          => ['hero', 'banner'],
                'supports'          => [
                    'align' => false,
                    'anchor' => true,
                ]
            ]);

            // Register Text/Media block
            acf_register_block([
                'name'              => 'text-media',
                'title'             => __('Text / Media', 'skkr'),
                'description'       => __('A 50/50 text and media section.', 'skkr'),
                'render_template'   => 'partials/blocks/block-text-media.php',
                'category'          => 'skkr-blocks',
                'icon'              => 'align-pull-left',
                'mode'              => 'edit',
                'keywords'          => ['text', 'media', 'image'],
                'supports'          => [
                    'align' => false,
                    'anchor' => true,
                ]
            ]);

            // Register Oneliner block
            acf_register_block([
                'name'              => 'oneliner',
                'title'             => __('Oneliner', 'skkr'),
                'description'       => __('A oneliner section.', 'skkr'),
                'render_template'   => 'partials/blocks/block-oneliner.php',
                'category'          => 'skkr-blocks',
                'icon'              => 'align-pull-left',
                'mode'              => 'edit',
                'keywords'          => ['text'],
                'supports'          => [
                    'align' => false,
                    'anchor' => true,
                ]
            ]);

            // Register Text block
            acf_register_block([
                'name'              => 'text',
                'title'             => __('Text', 'skkr'),
                'description'       => __('A simple text block with title and content.', 'skkr'),
                'render_template'   => 'partials/blocks/block-text.php',
                'category'          => 'skkr-blocks',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => ['text', 'content', 'paragraph'],
                'supports'          => [
                    'align' => false,
                    'anchor' => true,
                ]
            ]);
        }
    }
    add_action('acf/init', 'skkr_acf_register_block');
}

// Add custom block category
if (!function_exists('skkr_block_category')) {
    function skkr_block_category($categories, $post) {
        return array_merge(
            $categories,
            [
                [
                    'slug'  => 'skkr-blocks',
                    'title' => __('Theme Blocks', 'skkr'),
                    'icon'  => 'layout',
                ],
            ]
        );
    }
    add_filter('block_categories_all', 'skkr_block_category', 10, 2);
}
