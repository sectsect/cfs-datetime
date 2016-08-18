var gulp			     = require('gulp');
var cssmin			     = require('gulp-cssmin');
var buffer               = require('vinyl-buffer');
var sass			     = require('gulp-sass');
var autoprefixer	     = require('gulp-autoprefixer');
var rename 				 = require('gulp-rename');
var mmq                  = require('gulp-merge-media-queries');
var plumber			     = require("gulp-plumber");
var notify			     = require('gulp-notify');
var imagemin		     = require('gulp-imagemin');
var pngquant		     = require('imagemin-pngquant');
var csscomb			     = require('gulp-csscomb');
var prettify		     = require('gulp-jsbeautifier');
const phpMinify          = require('gulp-php-minify');

/*==================================================
	image minify
================================================== */
gulp.task('image-min', function () {
	gulp.src(['./images/*.+(jpg|jpeg|png|gif|svg)', '!./images/sprites/*.+(jpg|jpeg|png|gif|svg)'])
//	.pipe(imagemin())
	.pipe(imagemin({
		progressive: true,
		svgoPlugins: [{removeViewBox: false}],
		use: [pngquant()]
	}))
	.pipe(gulp.dest("./images"));
});
/*==================================================
	JS format
================================================== */
gulp.task('format-js', function() {
	gulp.src(["./js/*.js", "!./js/*.min.js", "./js/**/*.js", "!./js/**/*.min.js"])
	.pipe(plumber())
	.pipe(prettify({mode: 'VERIFY_AND_WRITE', indentWithTabs: true, maxPreserveNewlines: 1}))
	.pipe(gulp.dest('./js'));
});
/*==================================================
	php minify
================================================== */
gulp.task('minify:php', () => gulp.src('./functions/class/src/*.php', { read: false })
	.pipe(phpMinify())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('./functions/class'))
);
/*==================================================
	sass
================================================== */
gulp.task("sass", function() {
	gulp.src("./sass/*scss")
	.pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
	.pipe(sass({outputStyle: 'compressed'}))
	.pipe(csscomb())
	.pipe(autoprefixer("last 2 version", "ie 8", "ie 9", 'android 4'))
	.pipe(mmq())
	.pipe(gulp.dest("./css"))
	.pipe(cssmin())
	.pipe(gulp.dest("./css"));
});
/*==================================================
	watch
================================================== */
gulp.task("default", ['sass'], function() {
	gulp.watch("sass/*.scss",["sass"]);
});
