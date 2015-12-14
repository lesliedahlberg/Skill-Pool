angular.module('forgot', []).controller('forgotCtrl', function($scope, $http) {
  $scope.success = false;
  $scope.formData = {};

  $scope.processForgotForm = function(){
    $http.get("api/forgot_password.php?email=" + $scope.formData.email)
    .success(function (response) {
      if(response.success == true){
        $scope.success = response.success;
      }else{
        $scope.success = response.success;
        $scope.error = response.error;
      }
    });
  }
});
