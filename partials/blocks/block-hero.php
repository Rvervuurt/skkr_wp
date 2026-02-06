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
// $subtitle = get_field('subtitle');
$text = get_field('introduction');

$img_id = get_field('media')

?>

<section id="<?php echo esc_attr($id); ?>" class="hero-block sk-container">
    <div class="hero-container sk-grid sk-items-center sk-gap-20 lg:sk-grid-cols-5">
        <div class="sk-flex sk-flex-col sk-gap-6 lg:sk-col-span-3">

            <?php if ($title): ?>
                <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>

            <?php if ($text): ?>
                <div class="hero-text">
                    <?php echo wp_kses_post($text); ?>
                </div>
            <?php endif; ?>

            <?php if(have_rows('component_buttons')) { ?>
                <div class="sk-flex sk-flex-nowrap sk-gap-4">
                    <?php while(have_rows('component_buttons')) {
                        the_row();
                        $button_style = get_sub_field('button_style');

                        if($button_style == 'solid') {
                            $button_classes = 'sk-btn sk-btn-primary';
                        } elseif($button_style == 'outline') {
                            $button_classes = 'sk-btn sk-btn-white';
                        }
                        $button_link = get_sub_field('button_link');

                ?>
                    <a href="<?= $button_link['url']; ?>" class="<?= $button_classes; ?>"><?= $button_link['title']; ?></a>
                <?php } ?>
            </div>  
            <?php } ?>
        </div>
        <div class="sk-mx-auto sk-rounded-3xl sk-bg-primary-100 max-lg:sk-max-w-[75%] max-md:sk-max-w-full lg:sk-col-span-2">
            <?php echo wp_get_attachment_image( $img_id, 'medium-large', '', array( 'class' => 'sk-shadow-xl sk-rotate-6' ) ); ?>
        </div>
    </div>
</section>
