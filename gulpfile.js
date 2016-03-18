var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
var jsFiles = [
    'bootstrap/affix.js',
    'bootstrap/alert.js',
    'bootstrap/button.js',
    'bootstrap/carousel.js',
    'bootstrap/collapse.js',
    'bootstrap/dropdown.js',
    'bootstrap/modal.js',
    'bootstrap/tooltip.js',
    'bootstrap/popover.js',
    'bootstrap/scrollspy.js',
    'bootstrap/tab.js',
    'bootstrap/transition.js'
];


elixir(function(mix) {
    mix.scripts(jsFiles, 'public/js/bootstrap.js')
        .less(['bootstrap.less', 'bootstrap.less'])
        .sass('frontend.scss')
        .sass('404.scss', 'public/css/404.css')
        .copy('resources/assets/img/favicon.ico', 'public/img/favicon.ico')
        .copy('resources/assets/img/background.png', 'public/img/background.png');
});
