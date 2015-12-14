angular.module('board', []).controller('boardCtrl', function($scope, $http) {

  $scope.formData = {};

  $scope.getSkills = function (){
    $http.get("api/get_skills_sorted_by_recent_posts.php")
    .success(function (response) {
      if(response.success == true){
        $scope.skills = response.result;
        $scope.skills_message = response.message;
      }else {
        $scope.skills_error = response.error;
      }
    });
    $scope.getEmptySkills();
  }

  $scope.getEmptySkills = function (){
    $http.get("api/get_skills_without_posts.php")
    .success(function (response) {
      if(response.success == true){
        $scope.empty_skills = response.result;
        $scope.empty_skills_message = response.message;
      }else {
        $scope.empty_skills_error = response.error;
      }
    });
  }

  $scope.getSkill = function (){

    $http.get("api/get_skill_for_id.php?skill_id="+$scope.skill_id)
    .success(function (response) {
      if(response.success == true){
        $scope.skill = response.result;
        $scope.skill_message = response.message;
      }else {
        $scope.skill_error = response.error;
      }

    });
  }

  $scope.getBoard = function (){
    $http.get("api/get_board_for_skill.php?skill_id="+$scope.skill_id)
    .success(function (response) {
      if(response.success == true){
        $scope.board = response.result;
        $scope.board_message = response.message;
      }else {
        $scope.board_error = response.error;
      }
    });
  }

  $scope.addPost = function(formName) {
    $scope.myForm = formName;
    $scope.formData.skill_id = $scope.skill_id;
    $http({
          method  : 'POST',
          url     : 'api/add_to_board_for_skill.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
      $scope.msg = data;
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTitle = data.errors.title;
          $scope.errorMessage = data.errors.message;
        } else {
          $scope.getBoard();
          $scope.myForm.unbind('submit');
          $scope.formMessage = data.message;
          $scope.errorTitle = "";
          $scope.errorMessage = "";
          $scope.formData = "";
        }
      });
  }


});
