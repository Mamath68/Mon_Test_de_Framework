/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.{html,css,js,php}",
    "./views/**/*.phtml",
    "./app/controllers/**/*.php",
  ],
  theme: {
    extend: {
      width: {
        "3/10": "30%",
        "7/10": "70%",
      },
      colors: {
        aqua: "aqua", // Ajoute la couleur aqua
      },
    },
  },
  plugins: [],
};

