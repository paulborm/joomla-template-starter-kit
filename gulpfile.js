var gulp            = require('gulp');
var plumber         = require('gulp-plumber');
var rename          = require('gulp-rename');
var autoprefixer    = require('gulp-autoprefixer');
var concat          = require('gulp-concat');
var uglify          = require('gulp-uglify');
var cache           = require('gulp-cache');
var minifycss       = require('gulp-minify-css');
var sass            = require('gulp-sass');

gulp.task('styles', function(){
  gulp.src(['scss/template.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 10 versions'))
    .pipe(gulp.dest('css/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('css/'))
});

gulp.task('scripts', function(){
  return gulp.src(['js/vendors/*.js', 'js/*.js'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('template.js'))
    .pipe(gulp.dest('js/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js/'))
});

gulp.task('build', ['styles', 'scripts']);

gulp.task('default', ['build', 'browser-sync'], function(){
  gulp.watch("scss/**/*.scss", ['styles']);
  gulp.watch("js/**/*.js", ['scripts']);
});