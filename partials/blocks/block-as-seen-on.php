<?php
/**
 * As Seen On Block Template
 *
 * Outputs the brands repeater as logo cards. Centers the cards when they
 * fit, turns into an auto-sliding marquee (paused on hover) when there
 * are more logos than fit the breakpoint: more than 2 on mobile,
 * more than 4 on tablet, more than 5 on desktop.
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
$introduction = get_field('introduction');
$brands = get_field('brands') ?: [];
$count = count($brands);

$track_base = 'sk-flex sk-flex-none sk-min-w-full sk-items-stretch sk-gap-8';
$slide_utils = 'sk-animate-marquee sk-justify-start sk-pr-8 group-hover:sk-[animation-play-state:paused] motion-reduce:sk-animate-none motion-reduce:sk-flex-wrap motion-reduce:sk-justify-center motion-reduce:sk-pr-0';

// At which breakpoints the cards should slide instead of being centered
if ($count > 5) {
    $track_classes = "$track_base $slide_utils";
    $dup_classes = 'motion-reduce:sk-hidden';
} elseif ($count === 5) {
    $track_classes = "$track_base $slide_utils lg:sk-animate-none lg:sk-flex-wrap lg:sk-justify-center lg:sk-pr-0";
    $dup_classes = 'lg:sk-hidden motion-reduce:sk-hidden';
} elseif ($count > 2) {
    $track_classes = "$track_base $slide_utils md:sk-animate-none md:sk-flex-wrap md:sk-justify-center md:sk-pr-0";
    $dup_classes = 'md:sk-hidden motion-reduce:sk-hidden';
} else {
    $track_classes = "$track_base sk-flex-wrap sk-justify-center";
    $dup_classes = '';
}

$has_slider = $count > 2;
$duration = max(20, $count * 4);

if (empty($brands) && !$is_preview) {
    return;
}
?>

<section id="<?php echo esc_attr($id); ?>" class="as-seen-on-block sk-container">
    <?php if ($title || $introduction): ?>
        <div class="sk-mx-auto sk-mb-10 sk-flex sk-max-w-2xl sk-flex-col sk-gap-4 sk-text-center">
            <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($introduction): ?>
                <p><?php echo esc_html($introduction); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (empty($brands)): ?>
        <p class="sk-text-center"><?php esc_html_e('Add brand logos to this block.', 'skkr'); ?></p>
    <?php else: ?>
        <div class="sk-group sk-flex sk-overflow-hidden" style="--asa-duration: <?php echo esc_attr($duration); ?>s">
            <?php for ($i = 0; $i < ($has_slider ? 2 : 1); $i++): ?>
                <ul class="<?php echo esc_attr(trim("$track_classes " . ($i > 0 ? $dup_classes : ''))); ?>" <?php echo $i > 0 ? 'aria-hidden="true"' : ''; ?>>
                    <?php foreach ($brands as $brand):
                        $logo = $brand['logo'];
                        $brand_name = $brand['brand_name'];
                        $brand_link = $brand['brand_link'];

                        if (!$logo) {
                            continue;
                        }

                        $image = wp_get_attachment_image($logo, 'medium', false, [
                            'class' => 'sk-block sk-w-full sk-h-auto sk-object-contain',
                            'alt'   => $brand_name ?: '',
                        ]);
                    ?>
                        <li class="sk-flex sk-w-[clamp(9rem,22vw,13rem)] sk-flex-none sk-items-center sk-justify-center sk-rounded-3xl sk-border sk-border-black/5 sk-bg-white sk-p-8">
                            <?php if ($brand_link): ?>
                                <a href="<?php echo esc_url($brand_link); ?>" class="sk-flex sk-h-full sk-w-full" target="_blank" rel="noopener" <?php if ($brand_name): ?>aria-label="<?php echo esc_attr($brand_name); ?>"<?php endif; ?>>
                                    <?php echo $image; ?>
                                </a>
                            <?php else: ?>
                                <?php echo $image; ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</section>
