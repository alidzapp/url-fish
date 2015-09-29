!function() {

	var urlfish = angular.module('urlfish', [
		'ngRoute'
	]);

	urlfish.controller('MainCtrl', ['$scope', '$http', '$httpParamSerializer', function($scope, $http, $httpParamSerializer) {
		$scope.notice = function(field) {
			if(field == $scope.field) {
				return true;
			};
		};

		$scope.run = {
			duration: 1
		};
 
		$scope.errors = {
			password: 'If left blank, anyone who visits the URL can view your message.',
			unknown: 'An unknown error occured. Please try again another time.'
		};

		$scope.active = function(current) {
			if(current == $scope.run.duration) {
				return 'active';
			};
		};

		$scope.duration = function(duration) {
			$scope.run.duration = duration;
		};

		$scope.submit = function(type) {
			var run_new = $http({
				data: $httpParamSerializer($scope.run),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				method: 'POST',
				url: '/requests/' + type + '.php'
			});

		  	run_new.then(function(response) {
		  		//temp
		  		console.log(response.data);
		  		
		  		if(response.data.type) {
		  			$scope.type = response.data.type;
		  			$scope.field = response.data.field;
			    	$scope.message = response.data.message;
			    } else {
			    	$scope.type = 'error';
			    	$scope.field = 'submit';
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
			templateUrl: 'templates/home.php'
		});

		$routeProvider.when('/about', {
			templateUrl: 'templates/about.php'
		});

		$routeProvider.when('/contact', {
			templateUrl: 'templates/contact.php'
		});

		$routeProvider.otherwise({
			templateUrl: 'templates/url.php'
		});
	}]);

}();
