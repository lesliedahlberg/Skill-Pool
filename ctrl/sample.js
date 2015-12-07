angular.module('sample', []).controller('sampleCtrl', function($scope, $http) {
  $scope.getSample = function (){
    $http.get("api/get_sample.php")
    .success(function (response) {
      if(response.success == true){
        $scope.sample = response.result;
        $scope.message = response.message;
      }else {
        $scope.error = response.error;
      }
    });
  }

  $scope.processForm = function() {
    $http({
          method  : 'POST',
          url     : 'api/add_sample.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTitle = data.errors.title;
          $scope.errorText = data.errors.text;
        } else {
          $scope.formMessage = data.message;
          $scope.errorTitle = "";
          $scope.errorText = "";
          $scope.formData = "";
        }
      });
  };



});
