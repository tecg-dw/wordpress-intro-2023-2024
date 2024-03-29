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

mix.js('wp-content/themes/intro-wp/resources/js/site.js', 'wp-content/themes/intro-wp/public/js')
    .sass('wp-content/themes/intro-wp/resources/sass/site.scss', 'wp-content/themes/intro-wp/public/css')
    .copy('wp-content/themes/intro-wp/resources/img', 'wp-content/themes/intro-wp/public/img')
    .copy('wp-content/themes/intro-wp/resources/fonts', 'wp-content/themes/intro-wp/public/fonts')
    .options({
        processCssUrls: false
    });
