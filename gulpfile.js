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

//  1. Styles
//  1.2. Styles Editor
//  2. Scripts
//  3. Build
//  4. Default (Build then Serve)










/*#####################################################################*/
/*#######                  1. STYLES (SASS)                     #######*/
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
/*#######               1. STYLES-EDITOR (SASS)                 #######*/
/*#####################################################################*/


gulp.task('styles-editor', function(){
  gulp.src(['scss/editor.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 5 versions'))
    .pipe(gulp.dest('css/'));
});






/*#####################################################################*/
/*#######                     2. SCRIPTS                        #######*/
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
/*#######              3. BUILD (BUILD WEBSITE)                 #######*/
/*#####################################################################*/ 


gulp.task('build', ['styles', 'styles-editor', 'scripts']);







/*#####################################################################*/
/*#######            4. DEFAULT - BUILD AND SERVE               #######*/
/*#####################################################################*/ 


gulp.task('default', ['build'], function () {
  gulp.watch(['scss/**/*.scss', '!scss/editor.scss'], ['styles']);
  gulp.watch('scss/editor.scss', ['styles-editor']);
  gulp.watch('js/template.js', ['scripts']);
});

