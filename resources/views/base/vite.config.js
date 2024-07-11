import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import fs from "fs";

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
            configureServer() {
                const resolvedSourceDir = path.resolve(__dirname, './images');
                const resolvedTargetDir = path.resolve(__dirname, '../../../public/images');

                fs.unlink(resolvedTargetDir, (err) => {})

                if (!fs.existsSync(resolvedSourceDir)) {
                    return;
                }

                fs.symlinkSync(resolvedSourceDir, resolvedTargetDir, 'dir');
            },
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
