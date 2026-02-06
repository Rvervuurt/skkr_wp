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
 * Click to copy functionality
 */
function initClickToCopy() {
    const copyButtons = document.querySelectorAll('[data-copy-target]');

    copyButtons.forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();

            // Get the target element to copy from
            const targetSelector = button.getAttribute('data-copy-target');
            const targetElement = document.querySelector(targetSelector);

            if (!targetElement) return;

            // Get the text to copy
            const textToCopy = targetElement.textContent.trim();

            try {
                // Copy to clipboard
                await navigator.clipboard.writeText(textToCopy);

                // Show success feedback
                const tooltip = button.closest('.sk-group')?.querySelector('p');
                if (tooltip) {
                    const originalText = tooltip.textContent;
                    tooltip.textContent = 'Kopieret!';
                    tooltip.classList.remove('sk-opacity-0');
                    tooltip.classList.add('sk-opacity-100');

                    // Reset after 2 seconds
                    setTimeout(() => {
                        tooltip.textContent = originalText;
                        tooltip.classList.remove('sk-opacity-100');
                        tooltip.classList.add('sk-opacity-0');
                    }, 2000);
                }
            } catch (err) {
                console.error('Failed to copy text:', err);
            }
        });
    });
}

/**
 * Color change functionality for icon example
 */
function initColorChange() {
    const colorButtons = document.querySelectorAll('[data-color-change]');
    const iconContainer = document.getElementById('icon-container');

    if (!iconContainer) return;

    const defaultColorClass = 'sk-text-primary-600';
    let lockedColorClass = null; // Track the clicked/locked color for mobile

    // Array of all possible color classes
    const colorClasses = [
        'sk-text-primary-600',
        'sk-text-neutral-900',
        'sk-text-red-600',
        'sk-text-green-600'
    ];

    const applyColor = (colorClass) => {
        // Remove all color classes
        colorClasses.forEach(c => {
            iconContainer.classList.remove(c);
        });
        // Add the new color class
        iconContainer.classList.add(colorClass);
    };

    colorButtons.forEach(button => {
        // Change color on hover (desktop)
        button.addEventListener('mouseenter', () => {
            const newColorClass = button.getAttribute('data-color-change');
            applyColor(newColorClass);
        });

        // Reset to locked or default color when mouse leaves (desktop)
        button.addEventListener('mouseleave', () => {
            const colorToRestore = lockedColorClass || defaultColorClass;
            applyColor(colorToRestore);
        });

        // Click to lock color (mobile/touch fallback)
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const clickedColorClass = button.getAttribute('data-color-change');

            // Toggle: if clicking the same color, reset to default
            if (lockedColorClass === clickedColorClass) {
                lockedColorClass = null;
                applyColor(defaultColorClass);
            } else {
                lockedColorClass = clickedColorClass;
                applyColor(clickedColorClass);
            }
        });
    });
}

/**
 * Initialize everything when DOM is ready
 */
document.addEventListener('DOMContentLoaded', () => {
    initSmoothScroll();
    initClickToCopy();
    initColorChange();

    console.log('WP Theme SKKR loaded');
});

/**
 * Export utilities for use in other scripts
 */
export { initSmoothScroll, initClickToCopy, initColorChange };
