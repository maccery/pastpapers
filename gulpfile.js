const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less')
        .scripts('app.js')
        .version(['css/app.css', 'js/app.js'])
        .copy('bower_components/bootstrap/fonts', 'public/fonts')
        .copy('bower_components/jquery/dist/jquery.min.js', 'public/js')
        .copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js');
});