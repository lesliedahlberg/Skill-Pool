angular.module('admin', []).controller('adminCtrl', function($scope, $http) {

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
      $scope.getCategories();
  }

  $scope.getSkills = function (id){

    $scope.id = id;

    $http({
      url : "api/get_skills_for_category.php?category_id="+$scope.id,
      method : "POST"
    }).success(function (response) {
      if(response.success == true){
        $scope.skills = response.result;
        $scope.skills_message = response.message;
      }else {
        $scope.skills_error = response.error;
      }
    });
  }

  $scope.removeCategory = function (id){

    $scope.id = id;

    $http({
      url : "api/remove_category.php?category_id="+$scope.id,
      method : "POST"
    }).success(function (response) {
      if(response.success == true){
        $scope.category = response.result;
        $scope.category_message = response.message;
        $scope.getCategories(); // för att visa nytt resultat efter borttagning av kategori
        $scope.category_error = "";
      }else {
        $scope.category_error = response.errors.exists;
      }
    });
  }

  $scope.removeSkill = function (skillId, catId){

    $scope.sId = skillId;
    $scope.cId = catId;

    $http({
      url : "api/remove_skill.php?skill_id="+$scope.sId,
      method : "POST"
    }).success(function (response) {
      if(response.success == true){
        $scope.skill = response.result;
        $scope.skill_message = response.message;
        $scope.getSkills($scope.cId); // för att visa nytt resultat efter borttagning av en skill
        $scope.skill_error = "";
        $scope.category_error = "";

      }else {
        $scope.skill_error = response.errors.exists;
        $scope.skill_e = true;
      }
    });
  }

});
