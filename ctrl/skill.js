angular.module('skill', []).controller('skillCtrl', function($scope, $http) {

  $scope.formData = {};


  $scope.addSkill = function() {
    $scope.formData.skill_id = $scope.skill_id;
    $http({
          method  : 'POST',
          url     : 'api/add_skill.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
      $scope.msg = data;
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorSkill = data.errors.skill;
          $scope.errorMessage = data.errors.message;
        } else {
          $scope.formMessage = data.message;
          $scope.errorSkill = "";
          $scope.errorMessage = "";
          $scope.formData = "";
          $scope.getSkill();
        }
      });
  }


});
