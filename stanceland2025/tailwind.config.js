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
            colors:{
                background: '#0E0C0A', //nero
                fontcolor: '#EFEDE3', //bianco
                specialcolor: '#E52E25', //arancio
                buttoncolor: '#2A241E', //nero più chiaro
                buttoncolorhover: '#0E0C0A', //nero più scuro
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
