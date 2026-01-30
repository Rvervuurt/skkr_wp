/**
 * Main JavaScript
 *
 * This file is the entry point for all JavaScript
 *
 * @package wp-theme-skkr
 * @since 1.0.0
 */

// Import Alpine.js and plugins
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';
import intersect from '@alpinejs/intersect';

/**
 * Alpine.js Setup
 */
Alpine.plugin(collapse);
Alpine.plugin(focus);
Alpine.plugin(intersect);

// Make Alpine available globally
window.Alpine = Alpine;

// Start Alpine
Alpine.start();

/**
 * Smooth scroll for anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');

            // Skip if it's just "#"
            if (href === '#') return;

            const target = document.querySelector(href);

            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Initialize everything when DOM is ready
 */
document.addEventListener('DOMContentLoaded', () => {
    initSmoothScroll();

    console.log('WP Theme SKKR loaded');
});

/**
 * Export utilities for use in other scripts
 */
export { initSmoothScroll };
