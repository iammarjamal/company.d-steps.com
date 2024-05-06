const colors = require('tailwindcss/colors');

module.exports = {
  darkMode: "class",
  
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.jsx",
  ],

  theme: {

    // Screens
    screens: {
      sm: "320px",
      // => @media (min-width: 640px) { ... }

      md: "768px",
      // => @media (min-width: 768px) { ... }

      lg: "1024px",
      // => @media (min-width: 1024px) { ... }

      xl: "1366px",
      // => @media (min-width: 1280px) { ... }
    },

    // Extend
    extend: {
      
      // Colors
      colors: {
        primary: colors.blue,
        secondary: colors.gray,

        success: colors.emerald,
        danger: colors.red,
        warning: colors.amber,
        info: colors.blue,

        white: colors.white,
        black: colors.black
      },

      // Animations
      keyframes: {
          shimmer: {
            "100%": {
            transform: "translateX(100%)",
          },
        },
      },
    },

  },
  plugins: [],
}