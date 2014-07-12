// REQUIRE GULP & PLUGINS
//----------------------------------------------------------
var gulp      = require('gulp'),
    prefix    = require('gulp-autoprefixer'),
    concat    = require('gulp-concat'),
    jshint    = require('gulp-jshint'),
    minifycss = require('gulp-minify-css'),
    notify    = require('gulp-notify'),
    sass      = require('gulp-ruby-sass'),
    shell     = require('gulp-shell'),
    svg2png   = require('gulp-svg2png'),
    svgmin    = require('gulp-svgmin'),
    uglify    = require('gulp-uglify');


// STYLES
//----------------------------------------------------------
// Sass
//--------------------------------------
gulp.task('sass', function () {
  gulp.src('scss/*.scss')
// Compile
//------------------
  .pipe(sass({
    // noCache: true,
    // style: "compressed",
    require: ['susy'],
    compass: true,
    lineNumbers: true
  }))
// Prefix
//------------------
  .pipe(prefix('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
  .pipe(gulp.dest('../css'))
// Minify
//------------------
  .pipe(minifycss())
  .pipe(gulp.dest('../css'))
// Notify
//------------------
  .pipe(notify({ message: 'Styles task complete' }));
});


// SCRIPTS
//----------------------------------------------------------

// Lint
//--------------------------------------
gulp.task('lint', function() {
  gulp.src('js/*.js')
  .pipe(jshint())
  .pipe(jshint.reporter('default'));
});

// Concatenate
//--------------------------------------
// gulp.task('scripts', function() {
//   gulp.src('js/*.js')
//   .pipe(concat('custom.js'))
//   .pipe(gulp.dest('../js'))
//   .pipe(uglify())
//   .pipe(gulp.dest('../js'));
// });

// Minify
//--------------------------------------
gulp.task('js', function () {
  gulp.src('js/**/*.js')
  .pipe(uglify())
  .pipe(gulp.dest('../js'))

// Notify
//------------------
  .pipe(notify({ message: 'Scripts task complete' }));
});


// IMAGES
//----------------------------------------------------------
gulp.task('img', function () {
  gulp.src('img/*.svg')
// Minify svgs
//------------------
  .pipe(svgmin())
  .pipe(gulp.dest('../img'))
// Create pngs
//------------------
  .pipe(svg2png())
  .pipe(gulp.dest('../img'))
// Notify
//------------------
  .pipe(notify({ message: 'Images task complete' }));
});


// DRUSH
//----------------------------------------------------------
gulp.task('drush', shell.task([
  'drush cache-clear theme-registry'
]));


// WATCH
//----------------------------------------------------------
gulp.task('watch', function() {
  // Watch .scss files to run sass task.
  gulp.watch('scss/**/*.scss', ['sass']);
  // Watch .svg files to run img task.
  gulp.watch('img/*.svg', ['img']);
  // Watch .js files to run js task.
  gulp.watch('js/**/*.js', ['lint', 'js']);
  // Watch php, inc and info file changes to run drush task.
  gulp.watch('../**/*.{php,inc,info}', ['drush']);
  // // Watch theme files for changes to run drush task.
  // gulp.watch('../css/*.css,../js/*.js,../**/*.{php,inc,info}', ['drush']);
});


// DEFAULT
//----------------------------------------------------------
gulp.task('default', ['sass', 'img', 'js', 'drush', 'watch']);
