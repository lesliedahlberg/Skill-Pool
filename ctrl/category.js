angular.module('category', []).controller('categoryCtrl', function($scope, $http) {

  $scope.formData = {};


  $scope.getCategories = function (){
    $http.get("api/get_categories.php")
    .success(function (response) {
      if(response.success == true){
        $scope.categories = response.result;
        $scope.categories_message = response.message;
      }else {
        $scope.categories_error = response.error;
      }
    });
  }


  $scope.addCategory = function() {
    $scope.formData.category_id = $scope.category_id;
    $http({
          method  : 'POST',
          url     : 'api/add_category.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
      $scope.msg = data;
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorCategory = data.errors.category;
          $scope.errorMessage = data.errors.message;
        } else {
          $scope.formMessage = data.message;
          $scope.errorCategory = "";
          $scope.errorMessage = "";
          $scope.formData = "";
          $scope.getCategory();
        }
      });
  }





});
