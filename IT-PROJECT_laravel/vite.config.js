import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: 'localhost', // Allow external connections (change depending on your IP)
        port: 5173,
        hmr: {
            host: 'localhost', //(change depending on your IP)
        },
    },
});
