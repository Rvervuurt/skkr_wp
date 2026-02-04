const plugin = require("tailwindcss/plugin");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './src/**/*.{js,php}',
        './partials/**/*.php',
        './templates/**/*.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                "sans": ["Source Sans", "sans-serif"],
                "serif": ["Pangaia", "serif"],
                "mono": ["Courier Prime", "serif"],
            },
            colors: {
                'primary-50': '#fff6ed',
                'primary-100': '#ffead4',
                'primary-200': '#ffd0a9',
                'primary-300': '#ffaf72',
                'primary-400': '#fe8339',
                'primary-500': '#fd6012',
                'primary-600': '#e94408',
                'primary-700': '#c53209',
                'primary-800': '#9c2810',
                'primary-900': '#7e2410',
                'primary-950': '#440e06',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/typography"),
        plugin(function ({ addVariant }) {
            addVariant('bg-primary-600', '.sk-bg-primary-600 &');
        }),
    ],
    prefix: 'sk-',
};
