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
    container: {
      //   center: true,
      //   padding: '2rem',
    },
    screens: {
      xsm: "350px",
      sm: "576px",
      md: "800px",
      lg: "992px",
      xl: "1200px",
      xxl: "1400px",
    },
    extend: {
      boxShadow: {
        // neon: "0 0 10px red,0 0 10px green , 0 0 10px blue",
      },
      colors: {
        frontend: {
          highlight: {
            1: "#fef9c3",
            2: "#fef08a",
            3: "#fde047",
            4: "#facc15",
            5: "#eab308",
            6: "#ca8a04",
            7: "#a16207",
            8: "#854d0e",
            9: "#713f12",
          },
          dark: {
            1: "#f3f4f6",
            2: "#e5e7eb",
            3: "#d1d5db",
            4: "#9ca3af",
            5: "#6b7280",
            6: "#4b5563",
            7: "#374151",
            8: "#1f2937",
            9: "#111827",
          },
        },
        // myindigo: {
        // 	100: "#d1e2e0",
        // 	200: "#a3c5c1",
        // 	300: "#74a9a3",
        // 	400: "#468c84",
        // 	500: "#186f65",
        // 	600: "#135951",
        // 	700: "#0e433d",
        // 	800: "#0a2c28",
        // 	900: "#051614",
        // },
      },
      fontFamily: {
        sans: ["Figtree", ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [forms],
};
