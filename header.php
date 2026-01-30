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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> x-data="{ mobileMenuOpen: false }">

    <?php wp_body_open(); ?>

    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <nav class="container-inner">
            <div class="flex h-16 items-center justify-between">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-primary-600">
                        <?php bloginfo('name'); ?>
                    </a>
                </div>

                <!-- Desktop Navigation (example) -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <!-- Add your menu items here -->
                    <a href="#" class="text-neutral-700 hover:text-primary-600 transition-colors">Home</a>
                    <a href="#" class="text-neutral-700 hover:text-primary-600 transition-colors">About</a>
                    <a href="#" class="text-neutral-700 hover:text-primary-600 transition-colors">Contact</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                            type="button"
                            class="text-neutral-700 hover:text-primary-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen"
                 x-collapse
                 class="md:hidden border-t border-neutral-200">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <a href="#" class="block rounded-lg px-3 py-2 text-base font-medium text-neutral-700 hover:bg-neutral-100 hover:text-primary-600 transition-colors">Home</a>
                    <a href="#" class="block rounded-lg px-3 py-2 text-base font-medium text-neutral-700 hover:bg-neutral-100 hover:text-primary-600 transition-colors">About</a>
                    <a href="#" class="block rounded-lg px-3 py-2 text-base font-medium text-neutral-700 hover:bg-neutral-100 hover:text-primary-600 transition-colors">Contact</a>
                </div>
            </div>
        </nav>
    </header>
