<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */
?>

<footer class="sk-bg-neutral-900 sk-text-neutral-300">
    <div class="container-inner sk-py-12 lg:sk-py-16">
        <div class="sk-mx-4 sk-grid sk-gap-8 md:sk-grid-cols-2 lg:sk-grid-cols-4">

            <!-- Footer Column 1 -->
            <div>
                <h3 class="sk-mb-4 sk-text-lg sk-font-semibold !sk-text-white">
                    <?php bloginfo('name'); ?>
                </h3>
                <p class="sk-text-sm sk-text-neutral-400">
                    <?php bloginfo('description'); ?>
                </p>
            </div>

            <!-- Footer Column 2 -->
            <div>
                <?php
                if (has_nav_menu('footer-2')) {
                    $menu_name = wp_get_nav_menu_name('footer-2');
                    if ($menu_name) {
                        echo '<h3 class="sk-mb-4 sk-text-lg sk-font-semibold !sk-text-white">' . esc_html($menu_name) . '</h3>';
                    }
                    wp_nav_menu([
                        'theme_location' => 'footer-2',
                        'container' => false,
                        'menu_class' => 'sk-space-y-2 sk-text-sm',
                        'fallback_cb' => false,
                        'depth' => 1,
                        'walker' => new SKKR_Footer_Menu_Walker(),
                    ]);
                }
                ?>
            </div>

            <!-- Footer Column 3 -->
            <div>
                <?php
                if (has_nav_menu('footer-3')) {
                    $menu_name = wp_get_nav_menu_name('footer-3');
                    if ($menu_name) {
                        echo '<h3 class="sk-mb-4 sk-text-lg sk-font-semibold !sk-text-white">' . esc_html($menu_name) . '</h3>';
                    }
                    wp_nav_menu([
                        'theme_location' => 'footer-3',
                        'container' => false,
                        'menu_class' => 'sk-space-y-2 sk-text-sm',
                        'fallback_cb' => false,
                        'depth' => 1,
                        'walker' => new SKKR_Footer_Menu_Walker(),
                    ]);
                }
                ?>
            </div>

            <!-- Footer Column 4 -->
            <div>
                <h3 class="sk-mb-4 sk-text-lg sk-font-semibold !sk-text-white">Follow Us</h3>
                <div class="sk-flex sk-space-x-4">
                    <!-- Add your social media links here -->
                    <a href="https://www.linkedin.com/company/skkr/" class="!sk-text-white" target="_blank">
                        <svg xmlns="https://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <g clip-path="url(#a_f3p6y8k2)">
                            <path fill="currentColor" fill-rule="evenodd" d="M15.964 0h.072C24.853 0 32 7.147 32 15.964v.072C32 24.853 24.853 32 16.036 32h-.072C7.147 32 0 24.853 0 16.036v-.072C0 7.147 7.147 0 15.964 0ZM11 12a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm-.75 1.5a.5.5 0 0 0-.5.5v7.5a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 .5-.5V14a.5.5 0 0 0-.5-.5h-1.5Zm4 0a.5.5 0 0 0-.5.5v7.5a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 .5-.5V18a2 2 0 0 1 4 0v3.5a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 .5-.5v-4a4 4 0 0 0-6.5-3.123V14a.5.5 0 0 0-.5-.5h-1.5Z" clip-rule="evenodd"></path>
                        </g>
                        <defs>
                            <clipPath id="a_f3p6y8k2">
                            <path fill="#fff" d="M0 0h32v32H0z"></path>
                            </clipPath>
                        </defs>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <div class="sk-mt-8 sk-border-t sk-border-neutral-800 sk-pt-8 sk-text-center sk-text-sm sk-text-neutral-500">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
