import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('tailwindcss-animatecss')({
          classes: ['animate__animated', 'animate__fadeIn', 'animate__bounce', 'animate__fadeInUp', 'animate__pulse'],
          settings: {
            animatedSpeed: 9000,
          },
          variants: ['responsive'],
        }),
      ],
};
