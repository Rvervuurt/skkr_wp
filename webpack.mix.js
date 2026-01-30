const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Public Path
mix.setPublicPath('./dist');

// BrowserSync
mix.browserSync({
    proxy: 'dinero.test', // Change this to your local domain
    files: [
        'dist/**/*',
        '**/*.php'
    ],
    injectChanges: true,
    notify: false
});

// JavaScript
mix.js('src/scripts/main.js', 'dist/scripts')
    .extract(); // Extract vendor libraries

// Styles
mix.postCss('src/styles/main.css', 'dist/styles', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

// Copy fonts
mix.copyDirectory('assets/fonts', 'dist/fonts');

// Options
mix.options({
    processCssUrls: false,
    postCss: [
        require('autoprefixer'),
    ]
});

// Source maps
if (!mix.inProduction()) {
    mix.sourceMaps();
}

// Versioning
if (mix.inProduction()) {
    mix.version();
}

// Disable OS notifications
mix.disableNotifications();
