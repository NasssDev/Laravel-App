const mix = require('laravel-mix');

mix.js('resources/js/laravel-tel-input.js', 'public/js')
    .postCss("resources/css/laravel-tel-input.css", "public/css", [
        // require("tailwindcss"),
    ]);
mix.copy('node_modules/intl-tel-input/build/js/utils.js', 'public/vendor/intl-tel-input/build/js');
