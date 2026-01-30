<?php
/**
 * Hero Block Template
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
$title = get_field('hero_title');
$subtitle = get_field('hero_subtitle');
$text = get_field('hero_text');
$button_text = get_field('hero_button_text');
$button_link = get_field('hero_button_link');
$background_style = get_field('hero_background_style') ?: 'gradient'; // gradient or solid
$background_color = get_field('hero_background_color') ?: 'bg-primary-500';

// Build background classes
$bg_class = $background_style === 'gradient'
    ? 'bg-gradient-to-br from-primary-500 to-primary-700'
    : $background_color;
?>

<section id="<?php echo esc_attr($id); ?>" class="hero-block <?php echo esc_attr($bg_class); ?>">
    <div class="hero-container">

        <?php if ($subtitle): ?>
            <p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <?php if ($title): ?>
            <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($text): ?>
            <div class="hero-text">
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
</section>
