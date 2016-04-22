var elixir = require('laravel-elixir');

/**
 * --------------------------------------------------------------------------
 * Elixir Asset Management
 * --------------------------------------------------------------------------
 *
 * Elixir provides a clean, fluent API for defining some basic Gulp tasks
 * for your Laravel application. By default, we are compiling the Sass
 * file for our application, as well as publishing vendor resources.
 *
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
    // TODO add browsersync.

        .less(['bootstrap.less'])
        .sass('frontend.scss')
        .sass('404.scss', 'public/css/404.css')
        .copy('resources/assets/img/1.jpg', 'public/img/1.jpg')
        .copy('resources/assets/img/2.jpg', 'public/img/2.jpg')
        .copy('resources/assets/img/3.jpg', 'public/img/3.jpg')
        .copy('resources/assets/img/4.jpg', 'public/img/4.jpg')

        // Group logos
        .copy('resources/assets/img/kapoenen.svg', 'public/img/kapoenen.svg')
        .copy('resources/assets/img/welpen.svg', 'public/img/welpen.svg')
        .copy('resources/assets/img/jongGivers.svg', 'public/img/jongGivers.svg')
        .copy('resources/assets/img/givers.svg', 'public/img/givers.svg')
        .copy('resources/assets/img/jins.svg', 'public/img/jins.svg')
        .copy('resources/assets/img/leiding.svg', 'public/img/leiding.svg')

        .copy('resources/assets/img/favicon.ico', 'public/img/favicon.ico')
        .copy('resources/assets/img/background.png', 'public/img/background.png')

        // VUE js setup
        .scripts(['vue/vue.js', 'vue/vue-resource.js'], 'public/js/vue.js')
        .scripts(['vue/components.js'], 'public/js/components.js')

        // cache busting
        .version(['404.css', 'bootstrap.js']);
});
