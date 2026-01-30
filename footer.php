<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */
?>

<footer class="bg-neutral-900 text-neutral-300">
    <div class="container-inner py-12 lg:py-16">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">

            <!-- Footer Column 1 -->
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">
                    <?php bloginfo('name'); ?>
                </h3>
                <p class="text-sm text-neutral-400">
                    <?php bloginfo('description'); ?>
                </p>
            </div>

            <!-- Footer Column 2 -->
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Services</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Footer Column 3 -->
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">Resources</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Documentation</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Support</a></li>
                </ul>
            </div>

            <!-- Footer Column 4 -->
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">Follow Us</h3>
                <div class="flex space-x-4">
                    <!-- Add your social media links here -->
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <div class="mt-8 border-t border-neutral-800 pt-8 text-center text-sm text-neutral-500">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
