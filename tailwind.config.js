/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './templates/*.php',
    './templates/**/*.php',
    './template-parts/*.php'
    './template-parts/**/*.php',
    './blocks/*.php',
    './blocks/**/*.php',
    './patterns/*.php',
    './patterns/**/*.php',
    './assets/js/*.js',
    './assets/js/**/*.js',
    './inc/*.php',
    './inc/**/*.php',
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}