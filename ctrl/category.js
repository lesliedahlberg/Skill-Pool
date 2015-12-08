angular.module('category', []).controller('categoryCtrl', function($scope, $http) {
  $scope.addCategory = function (){
    $http.get("api/add_category.php")
    .success(function (response) {
      if(response.success == true){
        $scope.category = response.result;
        $scope.message = response.message;
      }else {
        $scope.error = response.error;
      }
    });
  }

  $scope.processForm = function() {

    $http({
          method  : 'POST',
          url     : 'api/add_category.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorCategory = data.errors.category;
        } else {
          $scope.formMessage = data.message;
          $scope.errorTitle = "";
          $scope.errorText = "";
          $scope.formData = "";
        }
      });
  };

});
