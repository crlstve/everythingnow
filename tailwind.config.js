/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './*.php',
      './templates/*.php',
      './templates/**/*.php',
      './template-parts/**/*.php',
      './template-parts/*.php',
      './inc/**/*.php',
      './inc/*.php',
      './blocks/**/*.php',
      './blocks/*.php',
      './classes/**/*.php',
      './classes/*.php',
    ],
  },
  darkMode: false, //you can set it to media(uses prefers-color-scheme) or class(better for toggling modes via a button)
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
}