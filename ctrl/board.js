angular.module('board', []).controller('boardCtrl', function($scope, $http) {
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

});
