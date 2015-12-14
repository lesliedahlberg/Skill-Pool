angular.module('login', []).controller('loginCtrl', function($scope, $http) {
  errormsg = "";
  $scope.processLoginForm = function() {

    $http({
          method  : 'POST',
          url     : 'api/login.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
          if(data.success == true){
            location.reload();
          }
          else{
            for(error in data.errors)
            {
                if(error != null)
                {
                  if (data.errors.hasOwnProperty(error))
                      errormsg = errormsg + (data.errors[error] || "");
                }
            }
            $scope.error = errormsg;
          }
        }
      );
}
});
