let mix = require('laravel-mix');

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

mix.js('resources/assets/jsx/backend/page/common/select.js', 'public/js/backend/common/select.js')
   .js('resources/assets/jsx/backend/page/common/sortable.js', 'public/js/backend/common/sortable.js')
   .js('resources/assets/jsx/backend/page/common/upload.js', 'public/js/backend/common/upload.js')
   .js('resources/assets/jsx/backend/page/app.js', 'public/js/backend/app.js')
   .js('resources/assets/jsx/backend/page/youtube.js', 'public/js/backend/youtube.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('resources/assets/img', 'public/img', false)
   .copy('resources/assets/vendor', 'public/vendor', false)
   .copy('resources/assets/js', 'public/js', false)
   .copy('resources/assets/css', 'public/css', false);
