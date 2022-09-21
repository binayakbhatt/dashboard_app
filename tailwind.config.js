const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/Http/Livewire/**/*.php",
    ],

    theme: {
        extend: {
            colors: {
                strongCyan: "hsl(171, 66%, 44%)",
                lightBlue: "hsl(233, 100%, 69%)",
                customRed: "hsl(1, 76%, 39%)",
                Blue: "hsl(225, 39%, 59%)",
                lightGreen: "hsl(138, 72%, 40%)",
            },

            fontFamily: {
                sans: ["Bai Jamjuree", "sans-serif"],
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
