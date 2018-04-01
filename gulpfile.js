var gulp = require('gulp'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    plumber = require('gulp-plumber'),
    imagemin = require('gulp-imagemin'),
    mozjpeg = require('imagemin-mozjpeg');

gulp.task('sass', function() {
    gulp.src('assets/stylesheets/**/*.scss')
        .pipe(plumber())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(rename({
          extname: '.min.css'
        }))
        .pipe(gulp.dest('public/css'));
});

gulp.task('imagemin', function() {
    gulp.src('app/assets/images/**/*')
        .pipe(plumber())
        .pipe(imagemin([
            mozjpeg({
                quality:85,
                progressive: true
            }),
            imagemin.svgo(),
            imagemin.optipng(),
            imagemin.gifsicle()
        ]))
        .pipe(gulp.dest('public/img'));
});

gulp.task('watch', function () {
    watch(['assets/sass/**/*.scss'], function(event){
        gulp.start('sass');
    });
});
