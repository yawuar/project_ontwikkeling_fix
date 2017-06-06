var elixir = require('laravel-elixir');

require('laravel-elixir-sass-compass');

elixir(function(mix) {
  mix.compass("*", "public/css", {
   sass: "resources/assets/sass",
});
});
