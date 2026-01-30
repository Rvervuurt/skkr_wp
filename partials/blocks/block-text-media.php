<?php
/**
 * Text/Media Block Template
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
$title = get_field('text_media_title');
$text = get_field('text_media_text');
$image = get_field('text_media_image');
$media_position = get_field('text_media_position') ?: 'right'; // left or right
$button_text = get_field('text_media_button_text');
$button_link = get_field('text_media_button_link');

// Set order classes based on media position
if ($media_position == 'left') {
    $text_order = 'order-2';
    $media_order = 'order-1';
} else {
    $text_order = 'order-1';
    $media_order = 'order-2';
}
?>

<section id="<?php echo esc_attr($id); ?>" class="text-media-block">
    <div class="text-media-container">

        <div class="<?php echo esc_attr($text_order); ?>">
            <?php if ($title): ?>
                <h2 class="text-media-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <div class="text-media-text">
                    <?php echo wp_kses_post($text); ?>
                </div>
            <?php endif; ?>

            <?php if ($button_text && $button_link): ?>
                <div class="mt-8">
                    <a href="<?php echo esc_url($button_link); ?>" class="button button-primary">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-media-image <?php echo esc_attr($media_order); ?>"
             x-data
             x-intersect.once="$el.classList.add('opacity-100', 'translate-y-0')"
             class="opacity-0 translate-y-4 transition-all duration-700">
            <?php if ($image): ?>
                <?php echo wp_get_attachment_image($image, 'large'); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
