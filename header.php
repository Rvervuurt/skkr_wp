<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <script>
        // Prevent flash of light mode - must run before page renders
        (function() {
            const darkMode = localStorage.getItem('darkMode') === 'true' ||
                           (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (darkMode) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    <?php require_once get_template_directory() . '/dist/sri.php'; ?>
    <script
      type="text/javascript"
      src="<?= get_template_directory_uri(); ?>/dist/scripts/skkr.js"
      integrity="<?= SKKR_JS_SRI; ?>"
      crossorigin="anonymous"
    ></script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> x-data="{ mobileMenuOpen: false, float: false, darkMode: false }">

    <?php wp_body_open(); ?>

    <header
        :class="float ? '': ''"
        class="sk-fixed sk-top-2 sk-z-50 sk-mx-4 sk-flex sk-w-[calc(100%-2rem)] sk-items-center sk-justify-between sk-rounded-full sk-border sk-border-primary-200 sk-bg-white sk-px-6 sk-py-4 dark:sk-border-dark-border dark:sk-bg-dark-elevated">

        <!-- Logo -->
        <div class="sk-flex sk-items-center sk-gap-2 sk-text-primary-600 dark:sk-text-primary-400">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="sk-flex sk-items-center sk-gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="sk-h-8 sk-w-8"
                    viewBox="0 0 64 64"
                    fill="none">
                    <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M32 64c17.673 0 32-14.327 32-32C64 14.327 49.673 0 32 0 14.327 0 0 14.327 0 32c0 17.673 14.327 32 32 32Zm11.944-32.833a2.464 2.464 0 0 1-2.464 2.387h-.005a2.464 2.464 0 0 1-2.463-2.387 2.275 2.275 0 0 0-4.547 0l-.001.031v16.3l-.002.1a7.05 7.05 0 0 1-1.602 4.112c-1.214 1.46-3.105 2.47-5.666 2.47-2.564 0-4.452-1.014-5.641-2.517a6.883 6.883 0 0 1-1.459-4.165 2.464 2.464 0 1 1 4.929 0c0 .258.107.743.395 1.107.202.254.631.646 1.776.646 1.146 0 1.63-.396 1.877-.693.314-.377.444-.859.464-1.125V31.198l-.001-.03a2.275 2.275 0 0 0-4.548 0 2.465 2.465 0 0 1-2.463 2.386h-.005a2.464 2.464 0 0 1-2.463-2.387 2.275 2.275 0 0 0-4.547 0 2.465 2.465 0 0 1-2.464 2.387h-.002a2.464 2.464 0 0 1-2.464-2.483C10.67 19.318 20.225 9.82 31.999 9.82s21.33 9.498 21.421 21.25a2.464 2.464 0 0 1-2.464 2.484h-.002a2.464 2.464 0 0 1-2.463-2.387 2.275 2.275 0 0 0-4.547 0Z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sk-font-serif sk-text-3xl sk-font-bold sk-leading-3"><?php bloginfo('name'); ?></span>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <div class="sk-hidden md:sk-block">
            
            <ul class="sk-flex sk-items-center sk-gap-6 dark:sk-text-white">
                <?php
                // You can replace these with WordPress menu
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'fallback_cb' => false,
                ));
                ?>
            </ul>
        </div>

        <!-- Mobile menu button -->
        <div class="md:sk-hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    type="button"
                    class="sk-text-primary-600 hover:sk-opacity-80 focus:sk-outline-none dark:sk-text-primary-400">
                <svg class="sk-h-6 sk-w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen"
             x-collapse
             class="sk-absolute sk-left-0 sk-right-0 sk-top-full sk-mt-2 sk-rounded-3xl sk-border sk-border-primary-200 sk-bg-white sk-p-4 md:sk-hidden dark:sk-border-dark-border dark:sk-bg-dark-elevated">
            <ul class="sk-space-y-2">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'fallback_cb' => false,
                ));
                ?>
                <li>
                    <button @click="darkMode = !darkMode"
                            type="button"
                            class="sk-flex sk-w-full sk-items-center sk-gap-2 sk-py-2 sk-text-primary-600 hover:sk-opacity-80 dark:sk-text-primary-400">
                        <svg x-show="darkMode" class="sk-h-5 sk-w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg x-show="!darkMode" class="sk-h-5 sk-w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                    </button>
                </li>
            </ul>
        </div>
    </header>
