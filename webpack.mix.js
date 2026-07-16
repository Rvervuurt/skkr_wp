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

// Dev/watch builds go to "dev/" (gitignored) so the committed production
// "dist/" folder is only ever touched by `npm run prod`.
const outDir = mix.inProduction() ? "dist" : "dev";

// Public Path
mix.setPublicPath(`./${outDir}`);

// BrowserSync
mix.browserSync({
  proxy: "https://skkrwp.test",
  files: [
    "*.php",
    "partials/**/*.php",
    "templates/**/*.php",
    "src/**/*.php",
    "skkr.html",
    "dev/**/*",
  ],
  injectChanges: true,
  notify: false,
  https: true,
});

// JavaScript
mix.js("src/scripts/main.js", `${outDir}/scripts`); // Standalone bundle
mix.js("src/scripts/skkr.js", `${outDir}/scripts`); // Standalone bundle
mix.js("src/scripts/skkr_alpine.js", `${outDir}/scripts`); // Standalone bundle for iframe

// Styles
mix.postCss("src/styles/main.css", `${outDir}/styles`, [
  require("postcss-import"),
  require("tailwindcss"),
  require("autoprefixer"),
]);

// Copy fonts (won't trigger rebuild due to watchOptions ignoring build output)
mix.copyDirectory("assets/fonts", `${outDir}/fonts`);

// Options
mix.options({
  processCssUrls: false,
  postCss: [require("autoprefixer")],
});

// Configure webpack to ignore build output, node_modules, and system files
mix.webpackConfig({
  watchOptions: {
    ignored: /node_modules|[\\/](dist|dev)[\\/]|\.git|\.DS_Store/,
    aggregateTimeout: 300,
    poll: false,
  },
  optimization: {
    splitChunks: false, // Disable all code splitting - create standalone bundles
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
