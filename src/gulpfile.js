// REQUIRE GULP & PLUGINS
//----------------------------------------------------------
var gulp       = require('gulp'),
    prefix     = require('gulp-autoprefixer'),
    livereload = require('gulp-livereload'),
    minifycss  = require('gulp-minify-css'),
    notify     = require('gulp-notify'),
    sass       = require('gulp-ruby-sass'),
    shell      = require('gulp-shell'),
    svg2png    = require('gulp-svg2png'),
    svgmin     = require('gulp-svgmin'),
    uglify     = require('gulp-uglify');

// STYLES
//----------------------------------------------------------
gulp.task('styles', function () {
  gulp.src('sass/*.scss')
// Compile
  .pipe(sass({
    compass: true,
    require: ['susy']
  }))
// Prefix
  .pipe(prefix('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
  .pipe(gulp.dest('../css'))
// Minify
  // .pipe(minifycss())
  // .pipe(gulp.dest('../css'))
// Reload
  .pipe(livereload())
// Notify
  // .pipe(notify({message:'Styles complete'}));
});

// SCRIPTS
//----------------------------------------------------------
gulp.task('scripts', function () {
  gulp.src('js/**/*.js')
// Uglify
  .pipe(uglify())
  .pipe(gulp.dest('../js'))
// Reload
// .pipe(livereload())
// Notify
  // .pipe(notify({message:'Scripts complete'}));
});

// IMAGES
//----------------------------------------------------------
gulp.task('images', function () {
  gulp.src('img/*.svg')
// Minify SVG files
  .pipe(svgmin([{
    cleanupIDs: false,
    removeViewBox: false
  }]))
  .pipe(gulp.dest('../img'))
// Create PNG files
  .pipe(svg2png())
  .pipe(gulp.dest('../img'))
// Reload
// .pipe(livereload())
// Notify
  // .pipe(notify({message:'Images complete'}));
});

// DRUSH
//----------------------------------------------------------
gulp.task('drush', shell.task([
  'drush cache-clear theme-registry'
]));

// WATCH
//----------------------------------------------------------
gulp.task('watch', function() {
  // Start livereload and watch on css/js changes.
  var server = livereload();
  // Watch .scss files to run styles task.
  gulp.watch('sass/**/*.scss', ['styles']);
  // Watch .js files to run scripts task.
  gulp.watch('js/**/*.js', ['scripts']);
  // Watch .svg files to run images task.
  gulp.watch('img/*.svg', ['images']);
  // Watch php, inc and info file changes to run drush task.
  gulp.watch('../**/*.{php,inc,info}', ['drush']);
});

// DEFAULT
//----------------------------------------------------------
gulp.task('default', ['styles', 'scripts', 'images', 'drush', 'watch']);
