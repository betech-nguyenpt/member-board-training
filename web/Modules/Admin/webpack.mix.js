const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/resources/js/app.js', 'js/admin.js')
    .sass(__dirname + '/resources/sass/app.scss', 'css/admin.css');

if (mix.inProduction()) {
    mix.version();
}