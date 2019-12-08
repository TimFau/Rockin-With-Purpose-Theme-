var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
let cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

gulp.task('styles', function(done) {
    gulp.src('css/src/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.init())
    .pipe(concat('styles.css'))
    .pipe(gulp.dest('css/dest/'))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(concat('styles.min.css'))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest('css/dest/'));
    done();
});
gulp.task('scripts', function(done) {
    gulp.src('js/src/*.js')
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat('scripts.min.js'))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest('js/dest/'));
    done();
});
//Watch task
gulp.task('default',function() {
    browserSync.init({
        // server: {
        //     baseDir: "./"
        // }
        proxy: "http://localhost/rockin-with-purpose"
    });
    gulp.watch('css/src/*.scss', gulp.series('styles'));
    gulp.watch('js/src/*.js', gulp.series('scripts'));
    gulp.watch('css/dest/*.css').on("change", reload);
    gulp.watch('js/dest/*.js').on("change", reload);
    gulp.watch('*.php').on("change", reload);
});