# Quick Start Guide

## Installation

1. **Clone or copy the theme**
   ```bash
   cd wp-content/themes/
   # Copy wp-theme-skkr folder here
   ```

2. **Install dependencies**
   ```bash
   cd wp-theme-skkr
   npm install
   ```

3. **Update BrowserSync proxy**

   Edit `webpack.mix.js` line 20:
   ```javascript
   proxy: 'your-site.test', // Change to your local domain
   ```

4. **Build assets**
   ```bash
   npm run watch
   ```

5. **Activate theme in WordPress**

6. **Install ACF Plugin**
   - Install "Advanced Custom Fields" plugin
   - Activate it

## Setting Up Blocks

### Hero Block

1. Go to **ACF → Field Groups → Add New**
2. Name: "Hero Block"
3. Location: **Block** is equal to **Hero**
4. Add these fields:

| Field Label | Field Name | Field Type | Options |
|------------|-----------|-----------|---------|
| Title | hero_title | Text | - |
| Subtitle | hero_subtitle | Text | - |
| Text | hero_text | WYSIWYG Editor | - |
| Button Text | hero_button_text | Text | - |
| Button Link | hero_button_link | URL | - |
| Background Style | hero_background_style | Select | gradient, solid |
| Background Color | hero_background_color | Text | Default: bg-primary-500 |

### Text/Media Block

1. Go to **ACF → Field Groups → Add New**
2. Name: "Text/Media Block"
3. Location: **Block** is equal to **Text / Media**
4. Add these fields:

| Field Label | Field Name | Field Type | Options |
|------------|-----------|-----------|---------|
| Title | text_media_title | Text | - |
| Text | text_media_text | WYSIWYG Editor | - |
| Image | text_media_image | Image | Return: Image ID |
| Media Position | text_media_position | Select | left, right |
| Button Text | text_media_button_text | Text | - |
| Button Link | text_media_button_link | URL | - |

## Common Tailwind Classes

### Colors
```
Text: text-primary-600, text-neutral-700
Background: bg-primary-500, bg-neutral-100
```

### Spacing
```
Padding: p-4, px-8, py-12
Margin: m-4, mx-auto, mt-8
Gap: gap-4, gap-8
```

### Layout
```
Flex: flex, flex-col, items-center, justify-between
Grid: grid, grid-cols-2, gap-8
Container: container-inner (custom class)
```

### Typography
```
Size: text-base, text-lg, text-xl, text-2xl, text-3xl
Weight: font-normal, font-semibold, font-bold
Leading: leading-tight, leading-relaxed
```

### Responsive
```
sm: (640px+)
md: (768px+)
lg: (1024px+)
xl: (1280px+)
2xl: (1536px+)

Example: md:grid-cols-2 lg:text-xl
```

### Buttons
```html
<a href="#" class="button button-primary">Click me</a>
<a href="#" class="button button-secondary">Secondary</a>
```

## Alpine.js Examples

### Toggle (Collapse)
```html
<div x-data="{ open: false }">
  <button @click="open = !open">Toggle</button>
  <div x-show="open" x-collapse>
    Content here
  </div>
</div>
```

### Intersection Observer
```html
<div x-data
     x-intersect.once="$el.classList.add('opacity-100')"
     class="opacity-0 transition-opacity duration-700">
  Fades in when scrolled into view
</div>
```

### Mobile Menu
```html
<div x-data="{ open: false }">
  <button @click="open = !open">Menu</button>
  <nav x-show="open" x-collapse>
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
  </nav>
</div>
```

## NPM Commands

```bash
npm run dev      # Build for development
npm run watch    # Build and watch for changes (+ BrowserSync)
npm run prod     # Build for production (minified)
```

## Customization Tips

1. **Colors**: Edit `tailwind.config.js` → theme.extend.colors
2. **Fonts**: Edit `tailwind.config.js` → theme.extend.fontFamily
3. **Add custom CSS**: Add to `src/styles/main.css` in @layer components
4. **Add JavaScript**: Add to `src/scripts/main.js`

## Troubleshooting

**Assets not loading?**
- Make sure you ran `npm run watch` or `npm run prod`
- Check that `dist/` folder exists with compiled files

**BrowserSync not working?**
- Check proxy in `webpack.mix.js` matches your local domain
- Restart `npm run watch`

**Blocks not showing?**
- Make sure ACF plugin is activated
- Check field groups are assigned to correct blocks
- Clear WordPress cache

## Need Help?

Check the full README.md for detailed documentation.
