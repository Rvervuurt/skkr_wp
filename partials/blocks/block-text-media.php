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

?>

<section id="<?php echo esc_attr($id); ?>" class="hero-block sk-container">
    <div class="hero-container sk-grid sk-items-center sk-gap-20 lg:sk-grid-cols-2">
        <div class="sk-flex sk-flex-col sk-gap-6 <?php if($order == 'rtl') { ?> sk-order-2 <?php } ?> ">

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
        <div class="sk-rounded-3xl sk-bg-primary-100 dark:!sk-text-neutral-950 <?php if($order == 'rtl') { ?> sk-order-1 <?php } ?> <?php if($type == 'image') { ?> sk-mx-auto max-lg:sk-max-w-[75%] max-md:sk-max-w-full <?php } ?>">
        <?php if ($type === 'image'): ?>
            <?php echo wp_get_attachment_image( $img_id, 'medium-large', '', array( 'class' => 'sk-shadow-xl sk-rounded-3xl overflow-hidden ' . $rotation ) ); ?>
            <?php elseif ($type === 'code'): ?>
                <div class="sk-flex sk-flex-col sk-gap-4 sk-p-8">
                    <h2 class="dark:!sk-text-neutral-950">Sådan gør du:</h2>
                    <div>
                        <p>1. Tilføj følgende script lige før din &lt;/body&gt;-tag</p>
                        <div class="sk-flex sk-w-full sk-flex-nowrap sk-items-center sk-gap-4">
                            <pre id="copy-script-tag">&lt;script type="text/javascript" src="https://skkr.dk/dist/scripts/skkr.js" async&gt;&lt;/script&gt;</pre>
                            <div class="sk-group sk-relative">
                                <p class="sk-absolute -sk-top-7 sk-left-1/2 -sk-translate-x-1/2 sk-whitespace-nowrap sk-rounded sk-bg-neutral-900 sk-px-1 sk-py-0.5 sk-text-xs sk-text-white sk-opacity-0 sk-transition-opacity group-hover:sk-opacity-100">
                                    Klik for at kopiere
                                </p>
                                <button class="sk-btn sk-btn-primary sk-btn-sm" data-copy-target="#copy-script-tag">
                                    <svg class="sk-h-4 sk-w-4 sk-flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>2. Tilføj denne div til stedet hvor du vil integrere vores ikon</p>
                        <div class="sk-flex sk-w-full sk-items-center sk-gap-4 lg:sk-flex-nowrap">
                            <pre id="copy-button-tag">&lt;button id="skkr-icon" style="width: 32px;"&gt;&lt;/button&gt;</pre>
                            <div class="sk-group sk-relative">
                                <p class="sk-absolute -sk-top-7 sk-left-1/2 -sk-translate-x-1/2 sk-whitespace-nowrap sk-rounded sk-bg-neutral-900 sk-px-1 sk-py-0.5 sk-text-xs sk-text-white sk-opacity-0 sk-transition-opacity group-hover:sk-opacity-100">
                                    Klik for at kopiere
                                </p>
                                <button class="sk-btn sk-btn-primary sk-btn-sm" data-copy-target="#copy-button-tag">
                                    <svg class="sk-h-4 sk-w-4 sk-flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p><small>Skkr-logoet fylder 100% bredde af elementet, så sæt gerne en størrelse på der passer jeres side. Derudover vil logoet tage være samme farven som teksten.</small></p>
                    </div>
                </div>
            <?php elseif ($type === 'example'): ?>
            <div class="sk-relative sk-left-4 sk-top-2 sk-flex sk-flex-wrap sk-items-center sk-justify-start sk-gap-2">
                <p class="sk-text-bold sk-text-sm">Ændr farve:</p>
                <button class="sk-group sk-relative sk-h-6 sk-w-6 sk-rounded-full sk-border-2 sk-border-neutral-200 sk-bg-primary-600 sk-transition-transform hover:sk-scale-110" data-color-change="sk-text-primary-600" aria-label="Primary color">
                </button>
                <button class="sk-group sk-relative sk-h-6 sk-w-6 sk-rounded-full sk-border-2 sk-border-neutral-200 sk-bg-neutral-900 sk-transition-transform hover:sk-scale-110" data-color-change="sk-text-neutral-900" aria-label="Black color">
                </button>
                <button class="sk-group sk-relative sk-h-6 sk-w-6 sk-rounded-full sk-border-2 sk-border-neutral-200 sk-bg-red-600 sk-transition-transform hover:sk-scale-110" data-color-change="sk-text-red-600" aria-label="Red color">
                </button>
                <button class="sk-group sk-relative sk-h-6 sk-w-6 sk-rounded-full sk-border-2 sk-border-neutral-200 sk-bg-green-600 sk-transition-transform hover:sk-scale-110" data-color-change="sk-text-green-600" aria-label="Green color">
                </button>
            </div>
                <div class="sk-flex sk-flex-col sk-gap-6 sk-p-8">
                    <div id="icon-container" class="sk-flex sk-h-full sk-w-full sk-items-center sk-justify-center sk-gap-2 sk-text-primary-600 sk-transition-colors">
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
                        <button id="skkr-icon" class="sk-h-8 sk-w-8"></button>
                    </div>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
