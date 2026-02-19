<?php
/**
 * Register Modal Slides Custom Post Type
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

function skkr_register_modal_slides_cpt() {
    $labels = array(
        'name'               => __('Modal Slides', 'skkr'),
        'singular_name'      => __('Modal Slide', 'skkr'),
        'menu_name'          => __('Modal Slides', 'skkr'),
        'add_new'            => __('Add New Slide', 'skkr'),
        'add_new_item'       => __('Add New Slide', 'skkr'),
        'edit_item'          => __('Edit Slide', 'skkr'),
        'new_item'           => __('New Slide', 'skkr'),
        'view_item'          => __('View Slide', 'skkr'),
        'search_items'       => __('Search Slides', 'skkr'),
        'not_found'          => __('No slides found', 'skkr'),
        'not_found_in_trash' => __('No slides found in Trash', 'skkr'),
        'parent_item_colon'  => __('Parent Slide:', 'skkr'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-slides',
        'capability_type'     => 'post',
        'hierarchical'        => true, // Enable parent/child relationships
        'supports'            => array('title', 'page-attributes'),
        'show_in_rest'        => true,
        'rest_base'           => 'modal-slides',
    );

    register_post_type('modal_slide', $args);
}
add_action('init', 'skkr_register_modal_slides_cpt');

/**
 * Add custom REST API fields for modal slides
 */
add_action('rest_api_init', function() {
    // Expose ACF fields as both 'acf' and 'acf_fields' for compatibility
    register_rest_field('modal_slide', 'acf', array(
        'get_callback' => function($post) {
            return get_fields($post['id']) ?: array();
        },
        'schema' => null,
    ));

    // Also register as acf_fields for backward compatibility
    register_rest_field('modal_slide', 'acf_fields', array(
        'get_callback' => function($post) {
            return get_fields($post['id']) ?: array();
        },
        'schema' => null,
    ));

    // Expose children IDs for easy navigation
    register_rest_field('modal_slide', 'children', array(
        'get_callback' => function($post) {
            $children = get_children(array(
                'post_parent' => $post['id'],
                'post_type'   => 'modal_slide',
                'post_status' => 'publish',
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ));
            return array_map(function($child) {
                return $child->ID;
            }, $children);
        },
        'schema' => null,
    ));
});
