/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.{vue,js}',
      './site/templates/**/*.{php,blade.php}',
      './storage/views/**/*.php',
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
    ],
  }
  