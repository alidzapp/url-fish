'use strict';

var gulp = require('gulp'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

gulp.task('js', function() {
	gulp.src([
		'assets/js/angular.js',
		'assets/js/angular-route.js',
		'assets/js/main.js'
	])
	.pipe(concat('all.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('assets/js'));
});

gulp.task('default', ['js'], function() {
	console.log('Done');
});
