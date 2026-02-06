<?php
/**
 * Custom Walker for Footer Menus
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

class SKKR_Footer_Menu_Walker extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     */
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

        $output .= '<li>';

        $atts = [];
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = 'sk-transition-colors hover:sk-text-white';

        if (!empty($item->target)) {
            $atts['target'] = $item->target;
        }

        if (!empty($item->xfn)) {
            $atts['rel'] = $item->xfn;
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<a' . $attributes . '>';
        $output .= $title;
        $output .= '</a>';
    }
}
