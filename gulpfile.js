'use strict';

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	minify = require('gulp-minify-css'),
	rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

gulp.task('css', function() {
	gulp.src('assets/css/main.scss')
	.pipe(sass())
	.pipe(rename('all.min.css'))
	.pipe(minify())
	.pipe(gulp.dest('assets/css'))
});

gulp.task('js', function() {
	gulp.src([
		'node_modules/angular/angular.min.js',
		'node_modules/angular-route/angular-route.min.js',
		'node_modules/angular-animate/angular-animate.min.js',
		'assets/js/main.js',
		'assets/js/controllers/**.js',
		'assets/js/modules.js',
		'assets/js/routes.js'
	])
	.pipe(concat('all.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('assets/js'))
});

gulp.task('watch', function() {
	gulp.watch('assets/css/**/*.scss', ['css']);
	gulp.watch(['assets/js/**/*.js', '!assets/js/all.min.js'], ['js']);
});

gulp.task('default', ['watch']);
