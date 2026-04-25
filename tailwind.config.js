import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')

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
                background: {
                    light: colors.gray[50],
                    dark: colors.slate[900]
                },

                surface: {
                    light: colors.slate[100],
                    dark: colors.slate[800]
                },
                primary: {
                    light: colors.violet[600],
                    dark: colors.violet[500],
                },
                text: {
                    light: colors.gray[500],
                    dark: colors.gray[400]
                },
                border: {
                    light: colors.gray[400],
                    dark: colors.gray[600]
                },
                accent: {
                    light: colors.gray[700],
                    dark: colors.gray[300]
                },
                muted: {
                    light: colors.gray[400],
                    dark: colors.gray[500]
                },
                secondary: "#A5D6FF",
                success: "#3FB950",
                danger: "#F85149",
            },
        }
    },

    plugins: [forms, require('@tailwindcss/typography')],
};