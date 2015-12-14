angular.module('changepassforgot', []).controller('changepassforgotCtrl', function($scope, $http) {
  $scope.success = false;
  $scope.formData = {};
  var get = QueryString();//creates associative array of $_GET
  $scope.processChangePasswordForgot = function(){
  $http({
        method  : 'POST',
        url     : 'api/change_password.php?forgot=true&email='+get['email']+'&hash='+get['hash'],
        data    : $.param($scope.formData),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
       })
  .success(function(data) {
        if(data.success == true){
          $scope.success = true;
        }
        else{
          $scope.error = data.errors.pass;
        }
      }
    );
  }
});

angular.module('changepassloggedin', []).controller('changepassloggedinCtrl', function($scope, $http) {
  $scope.success = false;
  $scope.formData = {};
  var get = QueryString();//creates associative array of $_GET
  $scope.processChangePasswordLoggedIn = function(){
  $http({
        method  : 'POST',
        url     : 'api/change_password.php',
        data    : $.param($scope.formData),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
       })
  .success(function(data) {
        if(data.success == true){
          $scope.success = true;
        }
        else{
        //  $scope.error = data.errors.pass;
        }
      }
    );
  }
});

$('form').on('submit',function(){
   var execsubmit = true;
   var passerror = "";

   if($('#new').val()!=$('#matchnew').val()){
       passerror = 'Password must match';
       execsubmit = false;
   }
   if(!execsubmit)
   {
     $('#head_message').html(passerror);
     $('#body').css("background-color", '#ff4d4d');
     return execsubmit;
   }
   return execsubmit;
});


function QueryString () {
  // This function is anonymous, is executed immediately and
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  }
    return query_string;
}
