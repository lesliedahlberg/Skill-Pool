angular.module('login', []).controller('loginCtrl', function($scope, $http) {
  $scope.processLoginForm = function() {

    $http({
          method  : 'POST',
          url     : 'api/login.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
          $scope.m = data;
          if(data.success == true){
            location.reload();
          }
        }
      );
}
});
