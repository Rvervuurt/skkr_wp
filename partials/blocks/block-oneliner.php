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
$title = get_field('title');

?>

<section id="<?php echo esc_attr($id); ?>" class="hero-block sk-container sk-rounded-3xl sk-bg-primary-600">
    <div class="sk-container sk-grid sk-w-full sk-items-center sk-justify-center sk-gap-10">
        <?php if ($title): ?>
            <h2 class="hero-title sk-text-center"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
    </div>
</section>
