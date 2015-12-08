angular.module('login', []).controller('loginCtrl', function($scope, $http) {
  $scope.processLoginForm = function() {

    $http({
          method  : 'POST',
          url     : 'api/login.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
          data = JSON.stringify(data).replace(/\\n/g, "\\n")
                                     .replace(/\\'/g, "\\'")
                                     .replace(/\\"/g, '\\"')
                                     .replace(/\\&/g, "\\&")
                                     .replace(/\\r/g, "\\r")
                                     .replace(/\\t/g, "\\t")
                                     .replace(/\\b/g, "\\b")
                                     .replace(/\\f/g, "\\f");
          // remove non-printable and other non-valid JSON chars
          data = data.replace(/[\u0000-\u0019]+/g,"");

          var arr = $.map(JSON.parse(data), function(el) { return el });

          if (arr[0] !== true) {
            //$scope.errorPass = arr;//JSON.stringify(arr);
          //  $scope.errorEmail = arr['success'];//JSON.stringify(data.success);
            // if not successful, bind errors to error variables
            $scope.errorEmail = arr['errors']['email'];
            $scope.errorPass = arr['errors']['pass'];
          } else {
            location.reload();
          }
        }
      );
}
});
