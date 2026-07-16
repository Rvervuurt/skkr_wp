# WP Theme Skeleton

A minimal WordPress theme skeleton with Tailwind CSS, Alpine.js, and ACF blocks.

## Features

- 🎨 **Tailwind CSS** with `sk-` prefix and plugins:
  - @tailwindcss/typography
  - @tailwindcss/forms
  - @tailwindcss/aspect-ratio
  - @tailwindcss/container-queries
  - **Important**: All Tailwind classes must use the `sk-` prefix (e.g., `sk-flex`, `sk-bg-blue-500`)
- ⚡ **Alpine.js** with plugins:
  - @alpinejs/collapse
  - @alpinejs/focus
  - @alpinejs/intersect
- 🎯 **Two basic ACF blocks**:
  - Hero block with gradient backgrounds
  - Text/Media block (50/50 split) with animations
- 📦 **Modern build flow** with Laravel Mix, PostCSS, and versioning
- 🛠️ **Smooth scroll** for anchor links

## Structure

```
wp-theme-skkr/
├── dist/                     # → Built assets (generated)
├── partials/
│   ├── blocks/               # → ACF block templates
│   │   ├── block-hero.php
│   │   └── block-text-media.php
│   └── content/
│       └── content-page.php
├── src/
│   ├── scripts/              # → Source JavaScript
│   │   └── main.js
│   ├── styles/               # → Source CSS
│   │   └── main.css
│   ├── acf-gutenberg-blocks.php
│   ├── enqueue-scripts.php
│   └── setup.php
├── templates/
│   └── acf-json/             # → ACF JSON files
├── .editorconfig
├── .gitignore
├── footer.php
├── functions.php
├── header.php
├── index.php
├── package.json
├── page.php
├── postcss.config.js
├── README.md
├── style.css
├── tailwind.config.js
└── webpack.mix.js
```

## Installation

### 1. Install the theme

Upload the theme to `/wp-content/themes/` or clone it directly:

```bash
cd wp-content/themes/
git clone [your-repo] wp-theme-skkr
cd wp-theme-skkr
```

### 2. Install dependencies

```bash
npm install
```

### 3. Configure BrowserSync (optional)

Edit `webpack.mix.js` and change the proxy to match your local development domain:

```javascript
proxy: 'your-site.test', // Change this
```

### 4. Build assets

For development (with file watching):
```bash
npm run watch
```

For production (minified):
```bash
npm run prod
```

### 5. Activate in WordPress

1. Activate the theme in WordPress admin
2. Install and activate **Advanced Custom Fields (ACF)** plugin
3. Configure the ACF fields for the blocks (see below)

## ACF Field Configuration

### Hero Block
Create a field group with location rule: **Block is equal to Hero**

Fields:
- `hero_title` (Text) - Main headline
- `hero_subtitle` (Text) - Small text above title
- `hero_text` (WYSIWYG) - Description text
- `hero_button_text` (Text) - Button label
- `hero_button_link` (URL) - Button URL
- `hero_background_style` (Select) - Options: `gradient`, `solid`
- `hero_background_color` (Text) - Tailwind class with prefix (e.g., `sk-bg-primary-500`)

### Text/Media Block
Create a field group with location rule: **Block is equal to Text / Media**

Fields:
- `text_media_title` (Text) - Section title
- `text_media_text` (WYSIWYG) - Description text
- `text_media_image` (Image) - Featured image
- `text_media_position` (Select) - Options: `left`, `right`
- `text_media_button_text` (Text) - Button label (optional)
- `text_media_button_link` (URL) - Button URL (optional)

## Development

### Available NPM Scripts

```bash
npm run dev      # Build for development
npm run watch    # Build and watch for changes
npm run prod     # Build for production (minified)
```

### Customizing Tailwind

Edit `tailwind.config.js` to customize colors, fonts, spacing, etc.

**Important: Tailwind Prefix**

This theme uses the `sk-` prefix for all Tailwind classes to avoid conflicts with WordPress and other plugins.

Examples:
```html
<!-- Standard Tailwind classes with sk- prefix -->
<div class="sk-flex sk-items-center sk-gap-4 sk-p-6">
  <h2 class="sk-text-2xl sk-font-bold sk-text-primary-600">Title</h2>
  <button class="sk-bg-primary-500 sk-text-white sk-px-4 sk-py-2 sk-rounded">
    Click me
  </button>
</div>
```

The theme includes a custom color palette:
- `primary` (orange shades from 50-950)
- Custom font families: Source Sans, Pangaia, Courier Prime

### Adding Custom Blocks

1. Register the block in `src/acf-gutenberg-blocks.php`
2. Create the template in `partials/blocks/block-{name}.php`
3. Configure ACF fields in WordPress admin
4. Use Tailwind utility classes with `sk-` prefix and Alpine.js for interactivity

### JavaScript Utilities

The theme includes several JavaScript utilities in `src/scripts/main.js`:

- **Alpine.js**: Available globally as `window.Alpine`
- **Smooth Scroll**: Automatic for anchor links

Example Alpine.js usage (with sk- prefix for Tailwind classes):
```html
<div x-data="{ open: false }" class="sk-p-4">
  <button @click="open = !open" class="sk-bg-primary-500 sk-text-white sk-px-4 sk-py-2 sk-rounded">
    Toggle
  </button>
  <div x-show="open" x-collapse class="sk-mt-4 sk-p-4 sk-bg-gray-100">
    Content here
  </div>
</div>
```

## Included Packages

### Dependencies
- **alpinejs** - Lightweight JavaScript framework
- **@alpinejs/collapse** - Collapse/expand animations
- **@alpinejs/focus** - Focus management utilities
- **@alpinejs/intersect** - Intersection observer support

### Dev Dependencies
- **tailwindcss** - Utility-first CSS framework
- **@tailwindcss/typography** - Beautiful typographic defaults
- **@tailwindcss/forms** - Form styling
- **@tailwindcss/aspect-ratio** - Aspect ratio utilities
- **@tailwindcss/container-queries** - Container query support
- **laravel-mix** - Build tool wrapper around Webpack
- **browser-sync** - Live reloading

## Optional Packages

The theme is intentionally minimal. Here are some packages you might want to add later:

- **Swiper** - Modern touch slider for carousels
- **GLightbox** - Lightweight lightbox for images/videos
- **AOS** (Animate On Scroll) - More scroll animations
- **Choices.js** - Enhanced select dropdowns
- **Day.js** - Lightweight date library
- **Cleave.js** - Input formatting/masking

## License

MIT License
