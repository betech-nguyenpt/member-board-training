const mix = require('laravel-mix');

/**
 *--------------------------------------------------------------------------
 * Mix Asset Management
 *--------------------------------------------------------------------------
 *
 * Mix provides a clean, fluent API for defining some Webpack build steps
 * for your Laravel application. By default, we are compiling the Sass
 * file for the application as well as bundling up all the JS files.
 *
 */

/**
 * Configure path to assets
 */
const assets = 'resources/assets/'
const nodes = 'node_modules/'
const paths = {
    assets: assets,
    nobleui: assets + 'themes/nobleui/',
    angularjs: assets + 'angularjs/',

}

/**
 * Nobleui themes asset
 */
mix.js(paths.assets + 'js/app.js', 'public/assets/js')
    .sass(paths.assets + 'sass/app.scss', 'public/assets/css')
    .copyDirectory(paths.nobleui + 'fonts', 'public/assets/fonts')
    // .copyDirectory(paths.nobleui + 'media', 'public/assets/media')
    .styles([
        paths.nobleui + 'vendors/core/core.css',
        paths.nobleui + 'css/style.css',
        paths.nobleui + 'css/custom.css',
    ], 'public/assets/nobleui/css/library.min.css')
    .scripts([
        paths.nobleui + 'vendors/core/core.js',
        paths.nobleui + 'js/template.js',
    ], 'public/assets/nobleui/js/library.min.js')
    .css(paths.nobleui + 'css/custom.css', 'public/assets/nobleui/css/custom.min.css');


/**
 * AngularJS asset
 */
mix.scripts([
        nodes + 'jquery/dist/jquery.min.js',
        paths.angularjs + 'angular.min.js',
        paths.angularjs + 'angular-route.js',
        paths.angularjs + 'angular-aria.js',
        paths.angularjs + 'angular-animate.js',
        paths.angularjs + 'angular-messages.js',
        paths.angularjs + 'moment.min.js',
        paths.angularjs + 'angular-filter.js',
        paths.angularjs + 'angularjsConfig.js',
    ], 'public/assets/nobleui/js/angularjs.min.js')
    .js(paths.angularjs + 'controller/RootController.js', 'public/assets/nobleui/js/root-angularjs.min.js');

/**
 * Version all compiled assets
 */
mix.version();

/**
 * Browsersync configuration options
 */
mix.browserSync({
    host: 'local-member-board.betech.com',
    proxy: 'local-member-board.betech.com',
    port: 8888,
    open: false,
    files: [
        'resources/**/*.php',
        'Modules/**/*.php',
        'public/assets/**/*.js',
        'public/assets/**/*.css',
    ],
    watchOptions: {
        usePolling: true,
        interval: 500
    }
});
