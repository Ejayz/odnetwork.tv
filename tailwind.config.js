/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/**/*.{js,ts,jsx,tsx}",
    "./pages/**/*.{js,ts,jsx,tsx}",
    "./components/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'background': "url('/background.svg')",
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin'),
    require('prettier-plugin-tailwindcss')
  ],
  "pluginSearchDirs": false
}
