! function() {

	angular.module('urlfish').controller('URLCtrl', ['$scope', '$http', '$httpParamSerializer', '$sce', function($scope, $http, $httpParamSerializer, $sce) {
		$scope.notice = function(field) {
			if(field == $scope.field) {
				return true;
			};
		};

		$scope.auth = {};
 
		$scope.errors = {
			unknown: 'An unknown error occured. Please try again another time.'
		};

		$scope.submit = function() {
			var fishAuth = $http({
				data: $httpParamSerializer($scope.auth),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				method: 'POST',
				url: '/requests/auth.php'
			});

		  	fishAuth.then(function(response) {
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
