import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/adminside/index.js",
                "resources/css/adminside/index.css",
                "resources/js/adminside/req-management.js",
                "resources/css/adminside/req-management.css",
                "resources/js/adminside/dashboard.js",
                "resources/css/adminside/dashboard.css",
                "resources/js/adminside/bill-pay.js",
                "resources/css/adminside/bill-pay.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: "localhost", // Allow external connections (change depending on your IP)
        port: 5173,
        hmr: {
            host: "localhost", //(change depending on your IP)
        },
    },
});
