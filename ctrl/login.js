angular.module('login', []).controller('loginCtrl', function($scope, $http) {
  $scope.formData = {};

  $scope.processLoginForm = function() {
    //$param = json_decode($scope.formData);

  //  var res = $.parseJSON($scope.formData);
  //  var par = [res.email, res.pass]; // Array of the received response

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
          location.reload();
        }
      });
  };

});
