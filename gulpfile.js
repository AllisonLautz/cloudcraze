var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var base = '';

gulp.task('browserSync', function() {
  browserSync.init({
    proxy: 'localhost/wordpress',
    open: 'external'
  });
});

gulp.task('sass', function() {
  return gulp.src(base + 'scss/calc.scss')
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
  .pipe(autoPrefixer({
    browsers: ['> 1%', 'last 2 versions']
  }))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(base + 'styles'))
  .pipe(browserSync.stream());
});

gulp.task('js', function() {
  return gulp.src(base + 'js/src/[^_]*.js')
  .pipe(uglify()).on('error', function(e) {
    console.log(e.toString());
    this.emit('end');
  })
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(base + 'js/dist'))
  .pipe(browserSync.stream());
});

gulp.task('default', ['browserSync', 'sass', 'js'], function() {
  gulp.watch(base + 'scss/calc.scss', ['sass']);
  gulp.watch(base + 'js/src/*.js', ['js']);
  gulp.watch(base + '**/*.php', browserSync.reload);
});
