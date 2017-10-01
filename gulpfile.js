var gulp = require('gulp'),
plumber = require('gulp-plumber'),
rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin'),
cache = require('gulp-cache');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');
var sftp = require('gulp-sftp');
var changed = require('gulp-changed');
var newer = require('gulp-newer');
var cache = require('gulp-cached');



gulp.task('images', function(){
  gulp.src('src/images/**/*')
  .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
  .pipe(gulp.dest('dist/images/'));
});

gulp.task('styles', function(){
  gulp.src(['src/styles/**/*.scss'])
  .pipe(plumber({
    errorHandler: function (error) {
      console.log(error.message);
      this.emit('end');
    }}))
  .pipe(sass())
  .pipe(autoprefixer('last 2 versions'))
  .pipe(gulp.dest('dist/styles/'))
  .pipe(rename({suffix: '.min'}))
  .pipe(minifycss())
  .pipe(gulp.dest('dist/styles/'))
});

gulp.task('scripts', function(){
  return gulp.src('src/scripts/**/*.js')
  .pipe(plumber({
    errorHandler: function (error) {
      console.log(error.message);
      this.emit('end');
    }}))
  .pipe(concat('main.js'))
  .pipe(gulp.dest('dist/scripts/'))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest('dist/scripts/'))
});

gulp.task('deploy', function () {

  return gulp.src([
    '!git/**',
    '!node_modules/**',
    '!inc/**',
    '**/*'
    ])
  .pipe(cache('test'))
  .pipe(sftp({
    host: '188.166.115.151',
    user: 'ftpuser',
    pass: 'SMRxw89',
    remotePath: 'elinternander/wp-content/themes/copywriter-portfolio-theme'
  }));
});

gulp.task('default', function(){
  gulp.watch("src/styles/**/*.scss", ['styles']);
  gulp.watch("src/scripts/**/*.js", ['scripts']);
  //gulp.watch("**/*",['deploy']);
});
