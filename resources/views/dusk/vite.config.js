import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import fs from "fs";
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const tailwindcss = await import('tailwindcss').then(module => module.default);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                path.resolve(__dirname, './css/app.scss'),
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
                tailwindcss({
                    config: path.resolve(__dirname, "tailwind.config.js"),
                }),
            ],
        },
    },
});
