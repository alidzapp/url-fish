'use strict';

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	minify = require('gulp-minify-css'),
	rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	livereload = require('gulp-livereload');

gulp.task('css', function() {
	gulp.src('assets/css/main.scss')
	.pipe(sass())
	.pipe(rename('all.min.css'))
	.pipe(minify())
	.pipe(gulp.dest('assets/css'))
	.pipe(livereload())
});

gulp.task('js', function() {
	gulp.src([
		'assets/js/main.js',
		'assets/js/controllers/**.js',
		'assets/js/modules.js',
		'assets/js/routes.js'
	])
	.pipe(concat('all.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('assets/js'))
	.pipe(livereload())
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('assets/css/**/*.scss', ['css']);
	gulp.watch(['assets/js/**/*.js', '!assets/js/all.min.js'], ['js']);
});

gulp.task('default', ['watch']);
