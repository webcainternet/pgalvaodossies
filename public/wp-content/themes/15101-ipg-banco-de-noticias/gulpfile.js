var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    //jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    install = require("gulp-install");

// install dependencies
gulp.src(['./bower.json', './package.json']).pipe(install());

// css
gulp.task('styles', function() {
    return sass([
        'public/css/sass/main.scss'
    ], {
        style: 'expanded',
        lineNumbers: true
            //sourcemap: true
    })
    .on('error', function (err) {
        console.error('Error', err.message);
    })
    //.pipe(sourcemaps.write())
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('public/css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('public/css'));
});

gulp.task('copy-jquery', function() {
    var bowerPrefix = './public/bower_components';
    var vendor = [
        bowerPrefix + '/jquery/dist/jquery.js'
    ];

    return gulp.src(vendor)
    .pipe(concat('jquery.js'))
    .pipe(gulp.dest('public/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('public/js'));
});

gulp.task('vendor-scripts', function() {
    var bowerPrefix = './public/bower_components';
    var vendor = './public/js/vendor';
    var vendor = [
        bowerPrefix + '/flexSlider/jquery.flexslider.js',
        bowerPrefix + '/chosen/chosen.jquery.js',
        bowerPrefix + '/blueimp-file-upload/js/vendor/jquery.ui.widget.js',
        bowerPrefix + '/blueimp-file-upload/js/jquery.iframe-transport.js',
        bowerPrefix + '/blueimp-file-upload/js/jquery.fileupload.js',
        bowerPrefix + '/underscore/underscore.js',
        bowerPrefix + '/jquery-mask-plugin/dist/jquery.mask.js',
        bowerPrefix + '/featherlight/release/featherlight.min.js',
        bowerPrefix + '/chosen/chosen.jquery.min.js',
        bowerPrefix + '/blockUI/jquery.blockUI.js',
        bowerPrefix + '/moment/moment.js',
        vendor + '/jquery.hoverIntent.js',
        vendor + '/underscore.js'
    ];

    return gulp.src(vendor)
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('public/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('public/js'));
});

// js
gulp.task('scripts', function() {
    return gulp.src('public/js/scripts/*.js')
    //.pipe(jshint())
    //.pipe(jshint.reporter('default'))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('public/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('public/js'));
});

// images
gulp.task('images', function() {
    return gulp.src('public/images/raw/**/*')
    .pipe(cache(imagemin({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    })))
    .pipe(gulp.dest('public/images'));
});

gulp.task('watch', function() {
    gulp.watch('public/css/**/*.scss', ['styles']);
    gulp.watch('public/js/**/*.js', ['scripts']);
    gulp.watch('public/images/**/*', ['images']);
});

gulp.task('clearCache', function() {
  cache.clearAll();
});

// default
gulp.task('default', ['watch'], function() {
    gulp.start('clearCache', 'styles', 'copy-jquery', 'vendor-scripts', 'scripts', 'images');
});
