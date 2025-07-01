import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Mengaktifkan dark mode berbasis class: <html class="dark">
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [
                    "Inter",
                    "IBM Plex Sans",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            colors: {
                // Light Theme (default)
                primary: "#4C9F9A",
                "primary-hover": "#3C8682",
                secondary: "#FFC078",
                "secondary-hover": "#E6A95F",
                background: "#F8FAFC",
                surface: "#FFFFFF",
                border: "#E2E8F0",
                "text-primary": "#1E293B",
                "text-secondary": "#64748B",

                // Dark Theme override (gunakan `dark:` prefix untuk akses)
                dark: {
                    primary: "#3C8F8A",
                    "primary-hover": "#2E6F6B",
                    secondary: "#FF7043",
                    "secondary-hover": "#E95E32",
                    background: "#1E1E2A",
                    surface: "#2A2A3D",
                    border: "#3C3C5A",
                    "text-primary": "#F1F1F1",
                    "text-secondary": "#B5B5C1",
                },

                danger: "#E53935",
                success: "#34D399",
                info: "#60A5FA",
            },

            borderRadius: {
                xl: "1rem",
                "2xl": "1.5rem",
            },

            boxShadow: {
                soft: "0 4px 10px rgba(0, 0, 0, 0.08)",
            },

            transitionDuration: {
                DEFAULT: "200ms",
            },

            scale: {
                101: "1.01",
            },
        },
    },

    plugins: [forms],
};
