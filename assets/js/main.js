!function() {

	var urlfish = angular.module('urlfish', [
		'ngRoute'
	]);

	urlfish.controller('MainCtrl', ['$scope', function($scope) {
		$scope.title = 'URL fish';
	}]);

	urlfish.controller('HomeCtrl', ['$scope', '$http', '$httpParamSerializer', function($scope, $http, $httpParamSerializer) {
		$scope.type = undefined;
		$scope.message = undefined;

		$scope.run = {
			duration: 1
		};

		$scope.errors = {
			password: 'If left blank, anyone with the URL can view your fish.',
			unknown: 'An unknown error occured. Please try again another time.'
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
		  		//temp
		  		console.log(response.data);
		  		
		  		if(response.data.type) {
		  			$scope.type = response.data.type;
			    	$scope.message = response.data.message;
			    } else {
			    	$scope.type = 'error';
			    	$scope.message = $scope.errors.unknown;
			    }
		    });
		};
	}]);

	urlfish.directive('focus', function() {
        return {
            restrict: 'A',
            link: function(scope, element) {
                element[0].focus();
            }
        };
    });

	urlfish.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
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
