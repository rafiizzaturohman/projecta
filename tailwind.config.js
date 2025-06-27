import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "IBM Plex Sans", "ui-sans-serif", "system-ui"],
            },
            colors: {
                primary: "#00BFA6",
                "primary-hover": "#009688",
                secondary: "#FFD369",
                "secondary-hover": "#FFC043",
                background: "#1A1C2C",
                surface: "#24263B",
                border: "#3B3D52",
                "text-primary": "#F8F9FA",
                "text-secondary": "#A9ADC1",
                danger: "#EF5350",
                success: "#66BB6A",
                info: "#4FC3F7",
            },
            borderRadius: {
                xl: "1rem",
                "2xl": "1.5rem",
            },
            boxShadow: {
                soft: "0 4px 10px rgba(0, 0, 0, 0.2)",
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
