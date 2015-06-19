var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.sass('main.scss')
    mix.scripts([
        'gmap.js'
    ]);

});
