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
            colors: {
                // Base palette
                primary: {
                    DEFAULT: "#5289ad",
                    light: "#6fa3c2",
                    dark: "#3f6f8d",
                },
                secondary: "#acbcbf",
                accent: "#698696",

                // Backgrounds
                background: {
                    light: "#f4fcfb",
                    dark: "#243c4c",
                },

                // Text colors
                text: {
                    light: "#243c4c",
                    dark: "#f4fcfb",
                },

                // Optional UI surfaces
                surface: {
                    light: "#ffffff",
                    dark: "#2f4c5c",
                },
            },
        }
    },

    plugins: [forms],
};