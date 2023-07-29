import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/css/app.css',
                'public/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'dist',
        manifest:true,
        rollupOptions: {
            input: {
                main: '/resources/js/app.js',
            },
        },
    },
});

