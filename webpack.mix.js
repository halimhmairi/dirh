const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.combine([
    "public/css/nucleo-icons.css",
    "public/css/nucleo-svg.css",
    "node_modules/font-awesome/css/font-awesome.css", 
    "public/css/argon-dashboard.css",
],"public/css/app.css")

mix.combine([
    "public/js/core/popper.min.js",
    "public/js/core/bootstrap.min.js",
    "public/js/plugins/perfect-scrollbar.min.js",
    "public/js/plugins/smooth-scrollbar.min.js",
    "public/js/plugins/chartjs.min.js", 
],"public/js/app.js"); 
