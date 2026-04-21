import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
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
                // Brand colors
                primary: {
                    DEFAULT: "#5c7c89",
                    light: "#7f9aa5",
                    dark: "#46616b",
                },
                accent: {
                    DEFAULT: "#1f4959",
                    light: "#2b6173",
                    dark: "#163944",
                },

                // Neutral backgrounds
                background: {
                    light: "#ffffff",
                    dark: "#0a0f22",
                },

                // Deeper layers (cards, modals)
                surface: {
                    light: "#f8f9fa",
                    dark: "#1d2233",
                },

                // Text system
                text: {
                    primary: {
                        light: "#242424",
                        dark: "#ffffff",
                    },
                    secondary: {
                        light: "#5c7c89",
                        dark: "#7f9aa5",
                    },
                },

                // Borders / subtle UI
                border: {
                    light: "#e5e7eb",
                    dark: "#1f4959",
                },
            },
        }
    },

    plugins: [forms, require('@tailwindcss/typography')],
};