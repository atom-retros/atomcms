import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/global.css",
                "resources/js/global.js",
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
            "@": "/resources/js",
        },
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
