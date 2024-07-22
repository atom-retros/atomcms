import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import buildImages from '../../js/build/images'
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                path.resolve(__dirname, './css/app.css'),
                path.resolve(__dirname, './js/app.js'),
            ],
        }),
        {
            name: 'sync',
            apply: 'build',
            configureServer: () => buildImages(),
            buildStart: () => buildImages(),
        },
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
            "@": path.resolve(__dirname, './js'),
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
