angular.module('profile', []).controller('profileCtrl', function($scope, $http) {
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
  $scope.changeFirstName = function (){
    $http.get("api/change_first_name.php")
    .success(function (response) {
      if(response.success == true){
        $scope.firstName = response.result;
        $scope.message = response.message;
      }else {
        $scope.error = response.error;
      }
    });
  }

  $scope.changeLastName = function (){
    $http.get("api/change_last_name.php")
    .success(function (response) {
      if(response.success == true){
        $scope.lastName = response.result;
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
          $scope.formMessageAddress = data.message;
          $scope.errorZipCode = "";
          $scope.errorCity = "";
          $scope.errorCountry = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormFirstName = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_first_name.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorFirstName = data.errors.firstName;
        } else {
          $scope.formMessageFirstName = data.message;
          $scope.errorFirstName = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormLastName = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_last_name.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorLastName = data.errors.LastName;
        } else {
          $scope.formMessageLastName = data.message;
          $scope.errorLastName = "";
          $scope.formData = "";
        }
      });
  };
});
