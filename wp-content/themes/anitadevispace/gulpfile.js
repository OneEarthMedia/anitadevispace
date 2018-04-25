var gulp = require('gulp');
// Sass Pre-processor
var sass = require('gulp-sass');
// Minify CSS
var cleanCSS = require('gulp-clean-css');
// Minify JS
var uglify = require('gulp-uglify');
// Rename destination file
var rename = require("gulp-rename");

// Compile the main style.css 
gulp.task('sass', function() {
  return gulp.src('./sass/style.scss')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('./'));
});

// Compress Theme JS
gulp.task('compress-themejs', function () {
  return gulp.src('./js/theme.js')
    .pipe(rename('theme.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js/min/'));    
});

// Compress Navigation JS
gulp.task('compress-navjs', function () {
  return gulp.src('./js/navigation.js')
    .pipe(rename('navigation.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js/min/'));    
});

// Watch for changes in the /sass folder
gulp.task('watch', function() {
    // Watch for changes in SASS folder
    gulp.watch('./sass/**/*.scss', ['sass']);
    // Watch for changes in the theme JS file
    gulp.watch('./js/theme.js', ['compress-themejs']);
    // Watch for changes in the Navigation JS file
    gulp.watch('./js/navigation.js', ['compress-navjs']);
});