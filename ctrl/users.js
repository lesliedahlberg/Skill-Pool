angular.module('users', ['mgcrea.ngStrap']).controller('usersCtrl', function($scope, $http) {

  $scope.formData = {};

  $scope.getSuggestion = function(viewValue) {
    var params = {search: viewValue, sensor: false};
    return $http.get('api/autocomplete_for_add_skills.php', {params: params})
    .then(function(res) {
      return res.data;
    });
  };


  $scope.getUsers = function (page){
    var urel = "api/get_users.php?page="+page;
    var search = $scope.formData.search;
    if(search !== undefined || search != null) {
      urel = "api/get_users.php?search="+$scope.formData.search+"&page="+page;
    }
    $http({
      url : urel,
      method: "GET"
    }).success(function (response) {
      $scope.m = response;
      if(response.success == true){
        $scope.users = response.result;
        $scope.users_message = response.message;
      }else {
          //alert("error");
          $scope.search_error = response.search_variables;
          $scope.users_error = response.error;
      }
    });
  }

  $scope.getPageCount = function (){
    var urel = "api/get_number_of_pages.php?per_page=8.php";
    $http({
      url : urel,
      method: "GET"
    }).success(function (response) {
      if(response.success == true){
        $scope.pages = range(1,response.result);
        $scope.users_message = response.message;
      }else {
        $scope.search_error = response.search_variables;
        $scope.users_error = response.error;
      }
    });
  }

  function range(start, end) {
    var foo = [];
    for (var i = start; i <= end; i++) {
        foo.push(i);
    }
    return foo;
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

  $scope.getUserSkills = function(id) {
    var params = {user_id: id};
    return $http.get('api/get_skills_for_show_user.php', {params: params})
    .then(function(res) {
      return res.data.result;
    });
  };

  $scope.getSkills = function (){

    $http.get("api/get_skills_for_show_user.php?user_id="+$scope.user_id)
    .success(function (response) {
      if(response.success == true){
        $scope.skills = response.result;
        $scope.user_message = response.message;
      }else {
        $scope.user_error = response.error;
      }

    });
  }

});
