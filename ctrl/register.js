angular.module('register', []).controller('registerCtrl', function($scope, $http) {
  $scope.formData = {};
  $scope.registered = false;
  //formData. first_name last_name email pass
  $scope.processRegForm = function() {
    //$scope.m = "processRegForm entered";
    $http({
          method  : 'POST',
          url     : 'api/register.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
      //$scope.m = ".success entered";
        if (!data.success) {
        //  $scope.m = ".success failed";
          // if not successful, bind errors to error variables
          // $scope.errorEmail = data.errors.email;
          if(data != undefined)
          {
          //  $scope.m = "data defined";
          //  $scope.m = JSON.stringify(data);
            if(data.errors != undefined)
            {
            //  $scope.m = "data.error defined";
              $('#head_message').html(data.errors.exists + data.errors.email + data.errors.pass + data.errors.first_name + data.errors.last_name);
              $('#body').css("background-color", '#ff4d4d');
            }
          }
          if(data == undefined){$scope.m = "data undefined";}
          $scope.registered = false;
        } else {
          $scope.m = data.errors.mail;
          $scope.registered = true;
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
     $('#head_message').html(passerror + " " + emailerror);
     $('#body').css("background-color", '#ff4d4d');
     return execsubmit;
   }
   return execsubmit;
});
