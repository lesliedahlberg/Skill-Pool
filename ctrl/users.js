angular.module('users', []).controller('usersCtrl', function($scope, $http) {

  $scope.formData = {};

  $scope.getUsers = function (){
    var urel = "api/get_users.php";
    var search = $scope.formData.search;
    if(search !== undefined) {
      urel = "api/get_users.php?search[]="+$scope.formData.search;
    }
    alert(urel);
    $http({
      url : urel;
      method: "GET"
    }).success(function (response) {
      alert(response);
      if(response.success == true){
        $scope.users = response.result;
        $scope.users_message = response.message;
      }else {
        $scope.users_error = response.error;
      }
    });
  }

  $scope.getUser = function (){

    $http.get("api/get_user_for_id.php?user_id="+$scope.user_id)
    .success(function (response) {
      if(response.success == true){
        $scope.user = response.result;
        $scope.user_message = response.message;
      }else {
        $scope.user_error = response.error;
      }

    });
  }

});
