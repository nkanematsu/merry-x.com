var gulp = require("gulp"),
    sass = require("gulp-sass"),
    watch = require("gulp-watch");

gulp.task("sass", function() {
    gulp.src("assets/sass/**/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("html/css"));
});

gulp.task("watch", function () {
    watch(["assets/sass/**/*.scss"], function(event){
        gulp.start("sass");
    });
});
