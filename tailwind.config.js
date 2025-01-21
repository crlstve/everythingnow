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
        'serif': ['"Poppins"'],
      },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
      screens: {
        sm: '600px',
        md: '728px',
        lg: '984px',
        xl: '1120px',
        '2xl': '1280px',
      },
    },      
  },
  variants: {},
  plugins: [],
}