/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
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
      './assets/js/*.js',
    ],
  theme: {
    extend: {},
    fontFamily: {
      'sans': ['"Poppins"'],
    },
  },
  variants: {},
  plugins: [],
}