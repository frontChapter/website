const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    theme: {
        colors: {
            ...colors,
            primary: colors.orange,
            secondary: colors.zinc,
            success: colors.green,
            error: colors.red,
            positive: colors.emerald,
            negative: colors.red,
            warning: colors.amber,
            info: colors.blue,
        },
        extend: {
            fontFamily: {
                kalameh: ["KalamehWeb", ...defaultTheme.fontFamily.sans],
                vazir: ["Vazirmatn", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                recolor: {
                    "0%, 100%": { "border-color": colors.orange[200] },
                    "50%": { "border-color": colors.orange[600] },
                },
                "text-recolor": {
                    "0%, 100%": { "color": colors.orange[200] },
                    "50%": { "color": colors.orange[600] },
                },
            },
            animation: {
                recolor: "recolor 2s linear infinite",
                "text-recolor": "text-recolor 2s linear infinite",
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
        "./resources/views/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
    ],

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
