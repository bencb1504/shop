const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.styles([
    'public/assets/web/css/custom/index.css',
    'public/assets/web/css/custom/product_detail.css',
    ], 'public/assets/web/css/custom/web.css').version();

// mix.js("public/assets/web/js/web.js", "public/js").version();
mix.js("resources/assets/js/web.js", "public/js").version();