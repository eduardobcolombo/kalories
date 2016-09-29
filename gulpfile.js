const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(mix => {
    mix.sass('app.scss')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/build/fonts/bootstrap')
        .webpack('app.js');

});


var phpunit = require('gulp-phpunit');

var gulp = require('gulp'),
    notify  = require('gulp-notify'),
    phpunit = require('gulp-phpunit');

gulp.task('phpunit', function() {
    var options = {debug: false, notify: true};
    gulp.src('phpunit.xml')
        .pipe(phpunit('phpunit',options));
});

gulp.task('default', function(){
    gulp.run('phpunit');
    gulp.watch('**/*.php', function(){
        gulp.run('phpunit');
    });
});