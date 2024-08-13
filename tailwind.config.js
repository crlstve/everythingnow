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
  darkMode: 'selector',
  theme: {
    extend: {},
      fontFamily: {
        'sans': ['"Montserrat"'],
      },      
  },
  variants: {},
  plugins: [],
}