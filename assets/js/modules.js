! function() {

	angular.module('urlfish').directive('focus', function() {
    return {
      restrict: 'A',
      link: function(scope, element) {
        element[0].focus();
      }
    };
  });

}();
