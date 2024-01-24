/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./../../public/css/flowbite.css",
    "./../../public/css/flowbite.js",
    "./../../public/css/style.js",
    "./../../resources/**/*.{html,js,php,css}",
  ],
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/container-queries'),
  ],
}

