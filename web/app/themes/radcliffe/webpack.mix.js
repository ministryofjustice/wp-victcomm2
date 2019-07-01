const mix_ = require('laravel-mix');

var _asset = './assets/';

mix_.setPublicPath('./dist')
    .js([
        _asset + 'js/global.js',
        _asset + 'js/navigation.js',
        _asset + 'js/skip-link-focus-fix.js'
    ], 'js/main.min.js')
    .js(_asset + 'js/IE8.js', 'dist/js/ie8.js')
    .js([
        _asset + 'js/evidence-sort.js',
        _asset + 'js/field_date.js',
    ], 'dist/js/custom-admin.min.js')
    .js(_asset + 'js/combodate.js', 'dist/js/combodate.min.js')
    .js(_asset + 'js/faqs.js', 'dist/js/faqs.min.js')
    .copy(_asset + 'js/*.min.js', 'dist/js/')
    .styles([
        _asset + 'css/locale.css',
        _asset + 'css/flex.css',
        _asset + 'css/header.css',
        _asset + 'css/navigation.css',
        _asset + 'css/forms.css',
        _asset + 'css/custom.css'
    ], 'dist/css/custom.min.css')
    .styles(_asset + 'css/custom-admin.css', 'dist/css/custom-admin.min.css')
    .styles(_asset + 'css/jquery-ui.css', 'dist/css/jquery-ui.min.css')
    .styles('style.css', 'dist/css/style.min.css')
    .copy(_asset + 'img/*', 'dist/img/');

if (mix_.inProduction()) {
    mix_.version();
} else {
    mix_.sourceMaps();
}
