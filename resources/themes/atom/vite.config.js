import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/themes/atom/css/app.css",
                "resources/themes/atom/js/app.js"
            ],
        }),


        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '@': '/resources/themes/atom/js',
        }
    },
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: path.resolve(__dirname, "tailwind.config.js"),
                }),
            ],
        },
    },
});
