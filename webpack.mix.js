const mix = require("laravel-mix");

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
mix.setPublicPath("./dist");

// BrowserSync
mix.browserSync({
  proxy: "https://skkrwp.test",
  files: ["*.php", "partials/**/*.php", "templates/**/*.php", "src/**/*.php"],
  injectChanges: true,
  notify: false,
  https: true,
});

// JavaScript
mix.js("src/scripts/main.js", "dist/scripts").extract(); // Extract vendor libraries

// Styles
mix.postCss("src/styles/main.css", "dist/styles", [
  require("postcss-import"),
  require("tailwindcss"),
  require("autoprefixer"),
]);

// Copy fonts (won't trigger rebuild due to watchOptions ignoring dist/)
mix.copyDirectory("assets/fonts", "dist/fonts");

// Options
mix.options({
  processCssUrls: false,
  postCss: [require("autoprefixer")],
});

// Configure webpack to ignore dist, node_modules, and system files
mix.webpackConfig({
  watchOptions: {
    ignored: /node_modules|dist|\.git|\.DS_Store/,
    aggregateTimeout: 300,
    poll: false,
  },
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
