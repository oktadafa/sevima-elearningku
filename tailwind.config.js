/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/.blade.php",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

