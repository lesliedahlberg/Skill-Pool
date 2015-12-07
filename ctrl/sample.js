angular.module('sample', []).controller('sampleCtrl', function($scope, $http) {
  $scope.getSample = function (){
    $http.get("api/get_sample.php")
    .success(function (response) {
      if(response.success == true){
        $scope.sample = response.results;
        $scope.message = response.message;
      }else {
        $scope.error = response.error;
      }
    });
  }
});
