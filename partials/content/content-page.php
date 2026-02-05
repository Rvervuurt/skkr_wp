<?php
/**
 * Template part for displaying page content
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content sk-flex sk-flex-col sk-gap-8 lg:sk-gap-12">
        <?php the_content(); ?>
    </div>

</article>
