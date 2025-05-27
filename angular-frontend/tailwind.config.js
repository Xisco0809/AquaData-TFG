/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,ts}", // detecta los ficheros donde Tailwind debe buscar clases
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1D4ED8',    // Azul personalizado
        secondary: '#9333EA',  // Morado personalizado
        accent: '#F59E0B',   // Amarillo acento
        black: '#000000'    // Negro personalizado
      },
      fontFamily: {
        sans: ['JetBrains Mono', 'sans-serif'], // Fuente predeterminada
      },
    },
  },
  plugins: [],
}
