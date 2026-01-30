<?php
/**
 * The template file used to render a static page
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

get_header(); ?>

<main class="site-main">

    <div class="container">

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('partials/content/content', 'page');
            }
        }
        ?>

    </div>

</main>

<?php get_footer();
