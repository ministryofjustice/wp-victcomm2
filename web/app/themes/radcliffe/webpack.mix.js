const mix_ = require('laravel-mix');

var _asset = './';

mix_.setPublicPath('./dist')
    .js(_asset + 'js/global.js', 'js/main.min.js')
    .js(_asset + 'js/theme-customizer.js', 'dist/js/theme-customizer.min.js')
    .styles(_asset + 'style.css', 'dist/css/style.min.css')
  .copyDirectory(_asset + 'images/', 'dist/images/');

if (mix_.inProduction()) {
    mix_.version();
} else {
    mix_.sourceMaps();
}
