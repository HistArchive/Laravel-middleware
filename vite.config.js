import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                // We don't deal with scss stuff: 'resources/sass/app.scss', 
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
