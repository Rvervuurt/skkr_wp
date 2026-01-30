# SKKR Theme Setup Summary

The WordPress theme has been configured to match the static HTML styling from the `html` folder.

## Changes Made

### 1. Tailwind Configuration (`tailwind.config.js`)
- **Added prefix**: `sk-` prefix for all Tailwind classes
- **Updated colors**: Changed from blue primary colors to orange/red theme matching SKKR brand
  - primary-50: #fff6ed
  - primary-100: #ffead4
  - primary-200: #ffd0a9
  - primary-300: #ffaf72
  - primary-400: #fe8339
  - primary-500: #fd6012
  - primary-600: #e94408 (brand color)
  - primary-700: #c53209
  - primary-800: #9c2810
  - primary-900: #7e2410
  - primary-950: #440e06
- **Updated fonts**:
  - sans: "Source Sans"
  - serif: "Pangaia"
  - mono: "Courier Prime"
- **Added custom plugin**: bg-primary-600 variant support
- **Updated plugins**: Using @tailwindcss/typography

### 2. Custom Fonts
- **Copied font files** from `html/assets/fonts/` to `wp-theme-skkr/assets/fonts/`:
  - Source Sans (Regular, Light)
  - Pangaia (Bold, Medium, Ultralight)
  - Courier Prime (Bold)
- **Created font-face declarations** in `src/styles/components/typography.css`
- **Configured webpack** to copy fonts to `dist/fonts/` directory

### 3. Component Styles
Created two new CSS component files:

#### `src/styles/components/typography.css`
- Font-face declarations for custom fonts
- Base body typography styles with sk-body class
- Heading styles (h1-h6) using Pangaia serif font
- Link styles for sections

#### `src/styles/components/buttons.css`
- Button component styles (.sk-btn)
- Button size variations (.sk-btn-sm)
- Button color variations:
  - .sk-btn-primary
  - .sk-btn-secondary
  - .sk-btn-white
  - .sk-btn-white-outline
  - .sk-btn-alert

### 4. Main Stylesheet (`src/styles/main.css`)
- Restructured to match HTML version
- Imports component stylesheets
- Added core styles:
  - Smooth scrolling
  - Alpine.js x-cloak support
  - sk-body background color
  - Slide transitions
  - Container styles

### 5. WordPress Integration
- **Updated `functions.php`**: Added filter to apply `sk-body` class to all pages
- **Updated `webpack.mix.js`**: Added font file copying to build process

## Build Command

To compile the theme assets:
```bash
cd wp-theme-skkr
npm run prod  # Production build
npm run dev   # Development build
npm run watch # Development with file watching
```

## Usage Notes

1. **All Tailwind classes now use the sk- prefix**
   - Example: `sk-bg-primary-600`, `sk-text-white`, `sk-flex`, etc.

2. **Body class**: The `sk-body` class is automatically added to all pages via the body_class filter

3. **Custom fonts**: The theme uses the same fonts as the static HTML:
   - Body text: Source Sans
   - Headings: Pangaia
   - Code/monospace: Courier Prime

4. **Colors**: All primary colors match the SKKR brand orange/red theme (#e94408)

## Next Steps

When creating WordPress templates, remember to:
1. Use the `sk-` prefix for all Tailwind classes
2. Use the custom button classes (`.sk-btn`) for buttons
3. The `sk-body` class is automatically applied, so styles will work as expected
4. Reference the static HTML files in the `html` folder for styling examples

## File Structure
```
wp-theme-skkr/
├── assets/
│   └── fonts/              # Custom font files
├── dist/                   # Compiled assets
│   ├── fonts/              # Copied fonts
│   ├── scripts/            # Compiled JavaScript
│   └── styles/             # Compiled CSS
└── src/
    ├── scripts/            # Source JavaScript
    └── styles/
        ├── components/
        │   ├── typography.css  # Font faces & typography
        │   └── buttons.css     # Button styles
        └── main.css        # Main stylesheet
```
