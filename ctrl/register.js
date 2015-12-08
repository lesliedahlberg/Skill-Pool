angular.module('register', []).controller('registerCtrl', function($scope) {
  $scope.formData = {};

  $scope.processLoginForm = function() {

    $http({
          method  : 'POST',
          url     : 'api/login.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorEmail = data.errors.email;
          $scope.errorPass = data.errors.pass;
        } else {
          session_start();
          $_SESSION['logged_in'] = true;
          header("Location: users.php");
          die();
        }
      });
  };
});
