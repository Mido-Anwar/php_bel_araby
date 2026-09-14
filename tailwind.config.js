import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-color": "#1e293b",
                "secondary-color": "#1e293b",
                "logo-color": "#f3ebeb",
                "background-color": "#f9f9f9",
                "nav-list-1": "#2b384f",
                "nav-list-2": "#3a4861",
                "nav-color-1": "#f3ebeb",
                "nav-color-2": "#f3ebeb",
                "dashboard-bg": "#d0d1d3",
            },
        },
    },

    plugins: [forms],
};