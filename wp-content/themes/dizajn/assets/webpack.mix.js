let mix = require('laravel-mix');

mix.js('src/js/scripts.js', 'dist/js/scripts.js')
    .sass('src/scss/style.scss', 'dist/css/style.css')
    .copy('src/fonts', 'dist/fonts')
    .copy('src/img', 'dist/img')
    .copy('src/static/js', 'dist/js')
    .copy('dist/css/style.css', '../')

mix.options({
    processCssUrls: false // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});
