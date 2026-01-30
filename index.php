<?php
/**
 * The main template file
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
                the_content();
            }
        }
        ?>
    </div>

</main>

<?php get_footer();
