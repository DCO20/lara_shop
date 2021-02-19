const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])

    .styles('resources/views/assets/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css')
    .styles('resources/views/assets/css/all.min.css', 'public/assets/css/all.min.css')
    .styles('resources/views/assets/css/app.css', 'public/assets/css/app.css')
    .styles('resources/views/assets/css/auth.css', 'public/assets/css/auth.css')

    .scripts('resources/views/assets/js/bootstrap.bundle.min.js', 'public/assets/js/bootstrap.bundle.min.js')
    .scripts('resources/views/assets/js/app.js', 'public/assets/js/app.js')

    .copyDirectory('resources/views/assets/img', 'public/assets/img')

if (mix.inProduction()) {
    mix.version();
}
