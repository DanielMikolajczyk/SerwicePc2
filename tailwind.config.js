module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'sidebar': { 
          primary: "#1f2937",
          secondary: "#374151" 
        },
        'serwice': {
          blue: "#4b72db",
          lightblue: "#27c6da"
        }
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
