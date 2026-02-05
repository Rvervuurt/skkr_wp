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
$order = get_field('order');
$type = get_field('type');

if($order == 'rtl') {
    $rotation = '-sk-rotate-6';
} else {
    $rotation = 'sk-rotate-6';
}


$img_id = get_field('media');
$wysiwyg_text = get_field('text')

?>

<section id="<?php echo esc_attr($id); ?>" class="hero-block sk-container">
    <div class="hero-container sk-flex sk-items-center sk-gap-10 lg:sk-gap-20 <?php if($order == 'rtl') { ?> sk-flex-row-reverse <?php } ?> ">
        <div class="sk-flex sk-flex-col sk-gap-6 lg:sk-w-1/2">

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
        <div class="sk-rounded-3xl sk-bg-primary-100 lg:sk-w-1/2 dark:!sk-text-neutral-950">
            <?php if ($type === 'image'): ?>
                <?php echo wp_get_attachment_image( $img_id, 'medium-large', '', array( 'class' => 'sk-shadow-xl sk-rounded-3xl overflow-hidden ' . $rotation ) ); ?>
            <?php elseif ($type === 'text'): ?>
                <div class="sk-p-8">
                    <h2 class="dark:!sk-text-neutral-950">Sådan gør du:</h2>
                    <p>1. Tilføj følgende script til din &lt;head&gt;</p>
                    <pre>&lt;script type="text/javascript" src="https://skkr.dk/dist/scripts/main.min.js"&gt;&lt;/script&gt;</pre>
                    <p>2. Tilføj denne div til stedet hvor du vil integrere vores ikon</p>
                    <pre>&lt;button id="skkr-icon"&gt;&lt;/button&gt;</pre>
                    <p><small>Skkr-logoet er 32px*32px og vil tage være samme farven som teksten.</small></p>
                                    </div>
            <?php elseif ($type === 'example'): ?>
                <div class="sk-p-20">
                    <div class="sk-flex sk-h-full sk-w-full sk-items-center sk-justify-center sk-gap-2 sk-text-primary-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                            fill="none"
                        >
                            <g clip-path="url(#a_x9p3n4j6)" class="sk-opacity-40">
                            <path
                                fill="currentColor"
                                fill-rule="evenodd"
                                d="M15.964 0h.072C24.853 0 32 7.147 32 15.964v.072C32 24.853 24.853 32 16.036 32h-.072C7.147 32 0 24.853 0 16.036v-.072C0 7.147 7.147 0 15.964 0ZM9.659 10.814a.5.5 0 0 1 .388-.814h3.008a.5.5 0 0 1 .39.186l3.147 3.892 3.76-3.924a.5.5 0 0 1 .361-.154h1.115a.5.5 0 0 1 .361.846l-4.453 4.646 4.605 5.694a.5.5 0 0 1-.389.814h-3.007a.5.5 0 0 1-.39-.186l-3.147-3.892-3.76 3.924a.5.5 0 0 1-.361.154h-1.115a.5.5 0 0 1-.361-.846l4.453-4.646-4.605-5.694Z"
                                clip-rule="evenodd"
                            />
                            </g>
                            <defs>
                            <clipPath id="a_x9p3n4j6">
                                <path fill="#fff" d="M0 0h32v32H0z" />
                            </clipPath>
                            </defs>
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                            fill="none"
                        >
                            <g clip-path="url(#a_j6t9v4k8)" class="sk-opacity-40">
                            <path
                                fill="currentColor"
                                fill-rule="evenodd"
                                d="M15.964 0h.072C24.853 0 32 7.147 32 15.964v.072C32 24.853 24.853 32 16.036 32h-.072C7.147 32 0 24.853 0 16.036v-.072C0 7.147 7.147 0 15.964 0ZM20.5 8.5A.5.5 0 0 0 20 8h-2.5a3.5 3.5 0 0 0-3.5 3.5v3h-2.5a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 .5.5H14v6.5a.5.5 0 0 0 .5.5H16a.5.5 0 0 0 .5-.5V17h2.59a.5.5 0 0 0 .49-.402l.3-1.5a.5.5 0 0 0-.49-.598H16.5v-3a1 1 0 0 1 1-1H20a.5.5 0 0 0 .5-.5V8.5Z"
                                clip-rule="evenodd"
                            />
                            </g>
                            <defs>
                            <clipPath id="a_j6t9v4k8">
                                <path fill="#fff" d="M0 0h32v32H0z" />
                            </clipPath>
                            </defs>
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                            fill="none"
                        >
                            <g clip-path="url(#a_f3p6y8k2)" class="sk-opacity-40">
                            <path
                                fill="currentColor"
                                fill-rule="evenodd"
                                d="M15.964 0h.072C24.853 0 32 7.147 32 15.964v.072C32 24.853 24.853 32 16.036 32h-.072C7.147 32 0 24.853 0 16.036v-.072C0 7.147 7.147 0 15.964 0ZM11 12a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm-.75 1.5a.5.5 0 0 0-.5.5v7.5a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 .5-.5V14a.5.5 0 0 0-.5-.5h-1.5Zm4 0a.5.5 0 0 0-.5.5v7.5a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 .5-.5V18a2 2 0 0 1 4 0v3.5a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 .5-.5v-4a4 4 0 0 0-6.5-3.123V14a.5.5 0 0 0-.5-.5h-1.5Z"
                                clip-rule="evenodd"
                            />
                            </g>
                            <defs>
                            <clipPath id="a_f3p6y8k2">
                                <path fill="#fff" d="M0 0h32v32H0z" />
                            </clipPath>
                            </defs>
                        </svg>
                        <button id="skkr-icon"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
