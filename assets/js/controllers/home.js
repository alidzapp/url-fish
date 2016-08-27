angular.module('urlfish').controller('HomeCtrl', ['$scope', '$timeout', '$http', '$httpParamSerializer', function($scope, $timeout, $http, $httpParamSerializer) {
  $scope.notice = function(field) {
    if (field == $scope.field) {
      return true;
    };
  };

  $scope.new = {
    duration: 1
  };

  $scope.errors = {
    password: 'If left blank, anyone who visits the URL can view your message.',
    unknown: 'An unknown error occured. Please try again another time.'
  };

  $scope.active = function(current) {
    if (current == $scope.new.duration) {
      return 'active';
    };
  };

  $scope.duration = function(duration) {
    $scope.new.duration = duration;
  };

  $scope.submit = function() {
    $scope.load = true;

    $timeout(function() {
      if ($scope.load) {
        $scope.loading = true;
      }
    }, 200);

    var fishNew = $http({
      data: $httpParamSerializer($scope.new),
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      method: 'POST',
      url: '/requests/new.php'
    });

    fishNew.then(function(response) {
      $scope.load = false;
      $scope.loading = false;

      if (response.data.type) {
        $scope.type = response.data.type;
        $scope.field = response.data.field;
        $scope.message = response.data.message;

        if ($scope.type == 'success') {
          $scope.link = $scope.new.url;

          $scope.new = {
            duration: 1
          };

          $scope.form.$setPristine();
        }

      } else {
        $scope.type = 'error';
        $scope.field = 'submit';
        $scope.message = $scope.errors.unknown;
      }
    });
  };
}]);
