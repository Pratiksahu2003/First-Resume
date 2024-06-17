import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import dotenv from 'dotenv';

// Load environment variables from .env file
dotenv.config();

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        host: process.env.VITE_IP || 'localhost',
        port: 5173,
        strictPort: true
    }

});
