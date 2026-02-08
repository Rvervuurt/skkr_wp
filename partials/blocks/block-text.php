<?php
/**
 * Text Block Template
 *
 * @param   array $block The block settings and attributes.
 * @param   bool $is_preview True during AJAX preview.
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Get ACF fields
$title = get_field('title');
$text = get_field('text');
$show_edit_date = get_field('show_edit_date');

?>

<section id="<?php echo esc_attr($id); ?>" class="text-block sk-container">
    <div class="sk-mx-auto sk-max-w-4xl">

        <?php if ($show_edit_date): ?>
            <p class="sk-mb-4 sk-text-sm sk-text-neutral-600 dark:sk-text-dark-text-muted">
                <?php echo __('Last updated:', 'skkr'); ?>
                <time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                    <?php echo get_the_modified_date(); ?>
                </time>
            </p>
        <?php endif; ?>

        <?php if ($title): ?>
            <h2 class="sk-mb-6 sk-text-3xl sk-font-bold md:sk-text-4xl lg:sk-text-5xl"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($text): ?>
            <div class="sk-prose sk-prose-lg sk-max-w-none dark:sk-prose-invert">
                <?php echo wp_kses_post($text); ?>
            </div>
        <?php endif; ?>

    </div>
</section>
