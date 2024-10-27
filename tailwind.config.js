/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/**/*.{php,js}","./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: "#264653", // charcoal
        secondary: "#2A9D8F", // persian green
        tertiary: "#E9C46A", //saffron
        fourth: "#F4A261", //sandy brown
        fifth: "#E76F51", //burnt sienna
        sixth:"#8A89C0", //cool gray
        active: "#1e3b47", //red
        content: '#F1F5F9',
        sidebar: '#1C2434',
        menu: '#333A48',
      },
    },
  },
  plugins: [require('flowbite/plugin')],
};
