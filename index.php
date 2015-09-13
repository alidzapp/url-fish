<!DOCTYPE html>

<html lang="en" ng-app="passrun" ng-controller="PassrunCtrl">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<base href="/">
		<title ng-bind="title"></title>
	</head>

	<body>

		<a href="/">Home</a>
		<a href="/about">About</a>
		<a href="/contact">Contact</a>

		<div ng-view></div>

		<script src="assets/js/angular.min.js" type="text/javascript"></script>
		<script src="assets/js/angular-route.min.js" type="text/javascript"></script>
		<script src="assets/js/main.js" type="text/javascript"></script>

	</body>

</html>
