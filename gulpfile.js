var gulp            = require('gulp');
var plumber         = require('gulp-plumber');
var rename          = require('gulp-rename');
var autoprefixer    = require('gulp-autoprefixer');
var concat          = require('gulp-concat');
var uglify          = require('gulp-uglify');
var cache           = require('gulp-cache');
var minifycss       = require('gulp-minify-css');
var sass            = require('gulp-sass');



/*#####################################################################*/
/*#######                  INHALTSVERZEICHNIS                   #######*/
/*#####################################################################*/











/*#####################################################################*/
/*#####################################################################*/


gulp.task('styles', function(){
  gulp.src(['scss/template.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 5 versions'))
    .pipe(gulp.dest('css/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('css/'));
});






/*#####################################################################*/
/*#####################################################################*/


gulp.task('scripts', function(){
  return gulp.src(['js/template.js'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('js/'))
});








/*#####################################################################*/
/*#####################################################################*/ 


gulp.task('build', ['styles', 'scripts']);







/*#####################################################################*/
/*#####################################################################*/ 


gulp.task('default', ['build'], function () {
  gulp.watch('scss/**/*.scss', ['styles']);
  gulp.watch('js/template.js', ['scripts']);
});

