(function() {

	var passrun = angular.module('passrun', [
		'ngRoute'
	]);

	passrun.controller('PassrunCtrl', ['$scope', '$http', '$location', function($scope, $http, $location) {
		$scope.title = 'Pass.run';
	}]);

	passrun.directive('focus', function() {
        return {
            restrict: 'A',
            link: function(scope, element) {
                element[0].focus();
            }
        };
    });

	passrun.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
		$locationProvider.html5Mode(true);

		$routeProvider.when('/', {
			templateUrl: 'templates/home.php'
		});

		$routeProvider.when('/about', {
			templateUrl: 'templates/about.php'
		});

		$routeProvider.when('/contact', {
			templateUrl: 'templates/contact.php'
		});

		$routeProvider.otherwise({
			templateUrl: 'templates/other.php'
		});
	}]);

})();
