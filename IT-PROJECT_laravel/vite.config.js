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
                "resources/js/adminside/declaration.js",
                "resources/css/adminside/declaration.css",
                "resources/js/adminside/admission-slip.js",
                "resources/css/adminside/admission-slip.css",
                "resources/css/adminside/form-fees.css",
                "resources/js/adminside/form-fees.js",
                "resources/css/adminside/carousel.css",
                "resources/js/adminside/carousel.js",

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
        //cors: {
           // origin: "localhost:5173", //(change depending on your IP for css and js to multiple devices) (sample: http://10.135.140.117:8000)
        //}
    },
});
