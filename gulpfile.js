var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    plumber = require('gulp-plumber'),
<<<<<<< HEAD
    imagemin = require('gulp-imagemin'),
    mozjpeg = require('imagemin-mozjpeg');
=======
    imagemin = require('gulp-imagemin');
>>>>>>> 710c2be6fe767849616ffd268358713bb78a1638

gulp.task('sass', function() {
    gulp.src('app/assets/stylesheets/**/*.scss')
        .pipe(plumber())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest('public/css'));
});

<<<<<<< HEAD
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
=======
gulp.task('imagemin', function(){
    gulp.src('public/img/**/*.jpg')
        .pipe(imagemin())
>>>>>>> 710c2be6fe767849616ffd268358713bb78a1638
        .pipe(gulp.dest('public/img'));
});

gulp.task('watch', function () {
    watch(['assets/sass/**/*.scss'], function(event){
        gulp.start('sass');
    });
});
