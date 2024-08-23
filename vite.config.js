import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from 'tailwindcss'
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                path.resolve(__dirname, './resources/css/app.css'),
                path.resolve(__dirname, './resources/js/app.js'),
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss({
                    config: path.resolve(__dirname, "tailwind.config.js"),
                }),
            ],
        },
    },
});