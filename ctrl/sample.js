//['ui.bootstrap'] måste inkluderas för att interaktiva bootstrap element ska fungera, kolla https://angular-ui.github.io/bootstrap/ för exempel på angularjs bootstrap implementationen

angular.module('sample', ['ui.bootstrap']).controller('sampleCtrl', function($scope, $http) {
  $scope.getSample = function (){
    $http.get("api/get_sample.php")
    .success(function (response) {
      if(response.success == true){
        $scope.sample = response.result;
        $scope.message = response.message;
      }else {
        $scope.error = response.error;
      }
    });
  }
});
