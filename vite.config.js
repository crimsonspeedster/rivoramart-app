import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/css/bootstrap.min.css',
                'resources/assets/plugin/nice-select/nice-select.css',
                'resources/assets/plugin/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
                'resources/assets/plugin/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css',
                'resources/assets/plugin/nouislider/nouislider.min.css',
                'resources/assets/css/style.css',
                'resources/assets/js/back.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
