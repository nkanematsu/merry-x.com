var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    plumber = require('gulp-plumber'),
    imagemin = require('gulp-imagemin');

gulp.task('sass', function() {
    gulp.src('assets/sass/**/*.scss')
        .pipe(plumber())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest('public/css'));
});

gulp.task('imagemin', function(){
    gulp.src('public/img/**/*.jpg')
        .pipe(imagemin())
        .pipe(gulp.dest('public/img'));
});

gulp.task('watch', function () {
    watch(['assets/sass/**/*.scss'], function(event){
        gulp.start('sass');
    });
});
