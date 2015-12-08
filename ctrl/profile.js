angular.module('address', []).controller('addressCtrl', function($scope, $http) {
  $scope.changeAddress = function (){
    $http.get("api/change_address.php")
    .success(function (response) {
      if(response.success == true){
        $scope.address = response.result;
        $scope.message = response.message;
      }else {
        $scope.error = response.error;
      }
    });
  }


  $scope.processFormAddress = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_address.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorZipCode = data.errors.zipCode;
          $scope.errorCity = data.errors.city;
          $scope.errorCountry = data.errors.country;
        } else {
          $scope.formMessage = data.message;
          $scope.errorZipCode = "";
          $scope.errorCity = "";
          $scope.errorCountry = "";
          $scope.formData = "";
        }
      });
  };
});
