var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
let cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

gulp.task('sass', function(done) {
    gulp.src('css/src/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('style.css'))
    .pipe(gulp.dest('../_RPWordpress1/'))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(concat('style.min.css'))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest('../_RPWordpress1/'));
    done();
});
gulp.task('js', function(done) {
    gulp.src('js/src/*.js')
    .pipe(sourcemaps.init())
    .pipe(uglify().on('error', function(e) {
        console.log(e)
    }))
    .pipe(concat('scripts.min.js'))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest('js/dest/'));
    done();
});
//Watch task
gulp.task('default',function() {
    browserSync.init({
        proxy: "http://localhost/rockin-with-purpose"
    });
    gulp.watch('css/src/**/*.scss', gulp.series('sass'));
    gulp.watch('js/src/*.js', gulp.series('js'));
    gulp.watch('../_RPWordpress1/style.min.css').on("change", reload);
    gulp.watch('js/dest/*.js').on("change", reload);
    gulp.watch('*.php').on("change", reload);
});