const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors') 

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                //sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: { 
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            }, 
            animation: {
                'fade-in': 'fade-in 0.5s linear forwards',
                marquee: 'marquee var(--marquee-duration) linear infinite',
                'spin-slow': 'spin 4s linear infinite',
                'spin-slower': 'spin 6s linear infinite',
                'spin-reverse': 'spin-reverse 1s linear infinite',
                'spin-reverse-slow': 'spin-reverse 4s linear infinite',
                'spin-reverse-slower': 'spin-reverse 6s linear infinite',
              },
              keyframes: {
                'fade-in': {
                  from: {
                    opacity: 0,
                  },
                  to: {
                    opacity: 1,
                  },
                },
                marquee: {
                  '100%': {
                    transform: 'translateY(-50%)',
                  },
                },
                'spin-reverse': {
                  to: {
                    transform: 'rotate(-360deg)',
                  },
                },
              },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
