import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/themes/noname-bootstrap/sass/app.scss",
                "resources/themes/noname-bootstrap/js/app.js"
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
            '@': '/resources/themes/noname-bootstrap/js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },
    
});
