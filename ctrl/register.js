angular.module('register', []).controller('registerCtrl', function($scope, $http) {
  $scope.formData = {};
  $scope.registered = false;
  errormsg = "";
  $scope.processRegForm = function() {
    $('#body').css("background-color", 'white');
    $http({
          method  : 'POST',
          url     : 'api/register.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          if(data != undefined)
          {
            if(data.errors != undefined)
            {
              for(error in data.errors)
              {
                  if(error != null)
                  {
                    if (data.errors.hasOwnProperty(error))
                        errormsg = errormsg + (data.errors[error] || "");
                  }
              }
              $('#head_message').html(errormsg);
              $('#body').css("background-color", '#ff4d4d');
            }
          }
          if(data == undefined){$scope.m = "data undefined";}
          $scope.registered = false;
        } else {
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
