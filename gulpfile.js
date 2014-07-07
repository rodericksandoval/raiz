// Load plugins
//----------------------------------------------------------
var gulp    = require('gulp'),
    prefix  = require('gulp-autoprefixer'),
    notify  = require('gulp-notify'),
    sass    = require('gulp-ruby-sass'),
    shell   = require('gulp-shell'),
    svg2png = require('gulp-svg2png'),
    svgmin  = require('gulp-svgmin'),
    uglify  = require('gulp-uglify');


// Styles task
//----------------------------------------------------------
gulp.task('sass', function () {
  gulp.src('src/scss/*.scss')
  .pipe(sass({
    require: ['susy'],
    noCache: true,
    style: "compressed",
    compass: true,
    lineNumbers: true,
    loadPath: 'scss/*'
  }))
  .pipe(prefix('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
  .pipe(gulp.dest('css'))
  .pipe(notify({ message: 'Styles task complete' }));
});


// Images task
//----------------------------------------------------------
gulp.task('img', function () {
  // Reducir svgs
  gulp.src('src/img/*.svg')
  .pipe(svgmin())
  .pipe(gulp.dest('img'))
  // Generar pngs
  gulp.src('src/img/*.svg')
  .pipe(svg2png())
  .pipe(gulp.dest('img'))
  .pipe(notify({ message: 'Images task complete' }));
});


// Scripts task
//----------------------------------------------------------
gulp.task('js', function () {
  gulp.src('src/js/**/*.js')
  .pipe(uglify())
  .pipe(gulp.dest('js'))
  .pipe(notify({ message: 'Scripts task complete' }));
});


// Drush task
//----------------------------------------------------------

gulp.task('drush', shell.task([
  'drush cache-clear theme-registry'
]));


// Watch task
//----------------------------------------------------------
gulp.task('watch', function() {
  // Watch .scss files to run sass task.
  gulp.watch('src/scss/**/*.scss', ['sass']);
  // Watch .svg files to run img task.
  gulp.watch('src/img/*.svg', ['img']);
  // Watch .js files to run js task.
  gulp.watch('src/js/**/*.js', ['js']);
  // Watch php, inc and info file changes to run drush task.
  gulp.watch('**/*.{php,inc,info}', ['drush']);
});


// Default task
//----------------------------------------------------------
gulp.task('default', ['sass', 'img', 'js', 'drush', 'watch']);

