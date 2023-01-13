const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'doodle-texture': "url('/images/doodle-bg.png')",
            },
            colors: {
                "n-green": "#679289",
                "n-orange": "#B35D44",
                "n-cream": "#EFF0EB",
                "n-white": "#F5F5F5",
                "n-grey": "#363838",
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
