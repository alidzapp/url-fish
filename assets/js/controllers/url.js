! function() {

	angular.module('urlfish').controller('URLCtrl', ['$scope', '$location', '$http', '$httpParamSerializer', '$sce', function($scope, $location, $http, $httpParamSerializer, $sce) {
		$scope.notice = function(field) {
			if(field == $scope.field) {
				return true;
			};
		};

		$scope.auth = {};
 
		$scope.errors = {
			unknown: 'An unknown error occured. Please try again another time.'
		};

		$scope.submit = function(type) {
			var fishAuth = $http({
				data: $httpParamSerializer($scope.auth),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				method: 'POST',
				url: '/requests/get/' + type + '.php'
			});

		  	fishAuth.then(function(response) {
		  		//temp
		  		console.log(response.data);

		  		if(response.data.type) {
		  			$scope.type = response.data.type;
		  			$scope.field = response.data.field;
			    	$scope.message = $sce.trustAsHtml(response.data.message);
			    } else {
			    	$scope.type = 'error';
			    	$scope.field = 'submit';
			    	$scope.message = $scope.errors.unknown;
			    }
		    });
		};
	}]);

}();
