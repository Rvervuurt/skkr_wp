<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage wp-theme-skkr
 * @since 1.0.0
 */

get_header(); ?>

<main class="site-main sk-py-20">

    <div class="container sk-mx-auto sk-max-w-4xl sk-px-6">

        <div class="sk-flex sk-flex-col sk-gap-8">

            <!-- 404 Header -->
            <div class="sk-text-center">
                <h1 class="sk-mb-4 sk-font-serif sk-text-6xl sk-font-bold sk-text-primary-600 dark:sk-text-primary-400">404</h1>
                <h2 class="sk-mb-4 sk-text-3xl sk-font-bold dark:sk-text-white">Siden kunne ikke findes</h2>
                <p class="sk-text-lg sk-text-gray-600 dark:sk-text-gray-300">
                    Beklager, men den side du leder efter eksisterer ikke eller er blevet flyttet. Du kan gå tilbage til <a href="<?php echo esc_url(home_url('/')); ?>" class="sk-font-semibold sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400">forsiden</a>.
                </p>
            </div>

            <!-- Divider -->
            <div class="sk-border-t sk-border-primary-200 dark:sk-border-dark-border"></div>

            <!-- Contact Information -->
            <div class="sk-rounded-2xl sk-border sk-border-primary-200 sk-bg-primary-50 sk-p-8 dark:sk-border-dark-border dark:sk-bg-dark-elevated">
                <div class="sk-mb-6 sk-flex sk-items-center sk-gap-3">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        class="sk-h-8 sk-w-8 sk-text-primary-600 dark:sk-text-primary-400"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3a49.5 49.5 0 0 1-4.02-.163 2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"
                        />
                    </svg>
                    <h3 class="sk-text-2xl sk-font-bold dark:sk-text-white">Har du brug for hjælp?</h3>
                </div>

                <p class="sk-mb-6 sk-text-gray-700 dark:sk-text-gray-300">
                    Selvom siden ikke kunne findes, er vi her stadig for at hjælpe. Du kan altid kontakte et af følgende steder:
                </p>

                <div class="sk-grid sk-gap-6 md:sk-grid-cols-3">
                    <!-- Kvindehjemmet -->
                    <div class="sk-rounded-lg sk-border sk-border-primary-200 sk-bg-white sk-p-6 dark:sk-border-dark-border dark:sk-bg-gray-800">
                        <h4 class="sk-mb-3 sk-font-bold dark:sk-text-white">Kvindehjemmet</h4>
                        <div class="sk-flex sk-flex-col sk-gap-2">
                            <a
                                href="https://kvindehjemmet.dk/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="sk-inline-flex sk-items-center sk-gap-2 sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-4 sk-w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                                Hjemmeside
                            </a>
                            <a
                                href="tel:004535819845"
                                class="sk-inline-flex sk-items-center sk-gap-2 sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-4 sk-w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                35 81 98 45
                            </a>
                        </div>
                    </div>

                    <!-- Lev Uden Vold -->
                    <div class="sk-rounded-lg sk-border sk-border-primary-200 sk-bg-white sk-p-6 dark:sk-border-dark-border dark:sk-bg-gray-800">
                        <h4 class="sk-mb-3 sk-font-bold dark:sk-text-white">Lev Uden Vold</h4>
                        <div class="sk-flex sk-flex-col sk-gap-2">
                            <a
                                href="https://levudenvold.dk/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="sk-inline-flex sk-items-center sk-gap-2 sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-4 sk-w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                                Hjemmeside
                            </a>
                            <a
                                href="tel:1888"
                                class="sk-inline-flex sk-items-center sk-gap-2 sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-4 sk-w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                1888
                            </a>
                        </div>
                    </div>

                    <!-- Mandecentret -->
                    <div class="sk-rounded-lg sk-border sk-border-primary-200 sk-bg-white sk-p-6 dark:sk-border-dark-border dark:sk-bg-gray-800">
                        <h4 class="sk-mb-3 sk-font-bold dark:sk-text-white">Mandecentret</h4>
                        <div class="sk-flex sk-flex-col sk-gap-2">
                            <a
                                href="https://mandecentret.dk/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="sk-inline-flex sk-items-center sk-gap-2 sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-4 sk-w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                                Hjemmeside
                            </a>
                            <a
                                href="tel:004570116263"
                                class="sk-inline-flex sk-items-center sk-gap-2 sk-text-primary-600 hover:sk-underline dark:sk-text-primary-400"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-4 sk-w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                70 11 62 63
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="sk-text-center">
                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="sk-inline-flex sk-items-center sk-gap-2 sk-rounded-full sk-bg-primary-600 sk-px-8 sk-py-4 sk-font-semibold sk-text-white sk-transition-colors hover:sk-bg-primary-700 dark:sk-bg-primary-500 dark:hover:sk-bg-primary-600"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sk-h-5 sk-w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Tilbage til forsiden
                </a>
            </div>

        </div>

    </div>

</main>

<?php get_footer();
