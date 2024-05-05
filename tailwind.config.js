/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
      theme: {
        extend: {
            colors: {
                maroon: '#780000',
                redi: '#c1121f',
                cream: '#fdf0d5',
                navy: '#003049',
                sky: '#669bbc',
            },
        },
    },
  plugins: [],
}

