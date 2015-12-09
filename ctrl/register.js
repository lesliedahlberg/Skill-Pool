angular.module('register', []).controller('registerCtrl', function($scope) {
  $scope.formData = {};

  $scope.processLoginForm = function() {

    $http({
          method  : 'POST',
          url     : 'api/login.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorEmail = data.errors.email;
          $scope.errorPass = data.errors.pass;
        } else {
          $scope.result = data.result;
        }
      });
  };
});

$('form').on('submit',function(){
   var execsubmit = true;
   var passerror = "";
   var emailerror = "";

   if($('#pass').val()!=$('#confirm_pass').val()){
       passerror = 'Password must match';
       execsubmit = false;
   }
   if($('#email').val()!=$('#confirm_email').val()){
       emailerror = 'Email must match';
       execsubmit = false;
   }
   if(!execsubmit)
   {
     alert(passerror + " " + emailerror);
     return execsubmit;
   }
   return execsubmit;
});
