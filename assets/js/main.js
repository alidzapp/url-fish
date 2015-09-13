!function() {

	var passrun = angular.module('passrun', [
		'ngRoute'
	]);

	passrun.controller('MainCtrl', ['$scope', function($scope) {
		$scope.title = 'Pass.run';
	}]);

	passrun.controller('HomeCtrl', ['$scope', '$http', '$httpParamSerializer', function($scope, $http, $httpParamSerializer) {
		$scope.data = undefined;
		$scope.type = undefined;

		$scope.run = {
			duration: 1
		};

		$scope.errors = {
			password: 'If left blank, anyone with the URL can view this run.',
			unknown: 'An unknown error occured. Please try again another time.',
		};

		$scope.active = function(current){
			if(current == $scope.run.duration) {
				return 'active';
			};
		};

		$scope.duration = function(duration){
			$scope.run.duration = duration;
		};

		$scope.submit = function(){
			var run_new = $http({
				data: $httpParamSerializer($scope.run),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				method: 'POST',
				url: '/requests/new.php'
			});

		  	run_new.then(function(response) {
		  		if(response.data.type) {
		  			$scope.type = response.data.type;
			    	$scope.data = response.data.content;
			    } else {
			    	$scope.type = 'error';
			    	$scope.data = $scope.errors.unknown;
			    }
		    });
		};
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
			controller: 'HomeCtrl',
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

}();
