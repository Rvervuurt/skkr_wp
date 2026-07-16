const plugin = require("tailwindcss/plugin");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./*.html",
    "./src/**/*.{js,php}",
    "./partials/**/*.php",
    "./templates/**/*.php",
  ],
  safelist: ["sk-w-5", "sk-h-5"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Source Sans", "sans-serif"],
        serif: ["Pangaia", "serif"],
        mono: ["Courier Prime", "serif"],
      },
      colors: {
        "primary-50": "#fff6ed",
        "primary-100": "#ffead4",
        "primary-200": "#ffd0a9",
        "primary-300": "#ffaf72",
        "primary-400": "#fe8339",
        "primary-500": "#fd6012",
        "primary-600": "#e94408",
        "primary-700": "#c53209",
        "primary-800": "#9c2810",
        "primary-900": "#7e2410",
        "primary-950": "#440e06",
        // Warm dark mode colors
        "dark-bg": "#1a0f0a",
        "dark-surface": "#251812",
        "dark-elevated": "#2d1f17",
        "dark-border": "#3d2b20",
        "dark-text": "#e8d5c4",
        "dark-text-muted": "#b8a99a",
      },
      keyframes: {
        marquee: {
          from: { transform: "translateX(0)" },
          to: { transform: "translateX(-100%)" },
        },
      },
      animation: {
        // Duration is set per block instance via the --asa-duration inline style
        marquee: "marquee var(--asa-duration, 30s) linear infinite",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require("@tailwindcss/typography"),
    plugin(function ({ addVariant }) {
      // Don't include the prefix - Tailwind adds it automatically to the HTML class,
      // but NOT to selectors in variant definitions
      addVariant("bg-primary-600", `:is(.sk-bg-primary-600) &`);
      addVariant("bg-primary-100", `:is(.sk-bg-primary-100) &`);
      addVariant("bg-neutral-900", `:is(.sk-bg-neutral-900) &`);
    }),
  ],
  prefix: "sk-",
};
