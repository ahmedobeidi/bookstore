/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php", "./public/pages/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        Baskerville: "libre-Baskerville",
        Outfit: "Outfit",
      },
      colors: {
        white: "#ffffff",
        "white-gray": "#FCF6EC",
        "dark-black": "#0A0A0B",
        "dark-gray": "#999593",
        "off-gray": "#8E8989",
        "off-blue": "#1aa3e8",
        brown: "#B23A35",
        red: "#bf0000",
      },
      backgroundImage: {
        section1: "url('../images/section1.jpg')",
      },
    },
  },
  plugins: [],
};
