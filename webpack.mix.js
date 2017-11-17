const { mix } = require('laravel-mix');

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


mix//.js('resources/assets/js/admin/flats/main.js', 'public/js/admin/flats')
   .js('resources/assets/js/app.js', 'public/js/app.js')
    // .extract(['vue'])
   .sass('resources/assets/sass/app.scss', 'public/css/app.css')
   .options({
       // processCssUrls: false,
       extractVueStyles: true
   });