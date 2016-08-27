angular.module('urlfish').config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
  $locationProvider.html5Mode(true);

  $routeProvider.when('/', {
    controller: 'HomeCtrl',
    templateUrl: 'templates/home.php'
  });

  $routeProvider.when('/about', {
    templateUrl: 'templates/about.php'
  });

  $routeProvider.when('/disclaimer', {
    templateUrl: 'templates/disclaimer.php'
  });

  $routeProvider.otherwise({
    controller: 'URLCtrl',
    templateUrl: 'templates/url.php'
  });
}]);
