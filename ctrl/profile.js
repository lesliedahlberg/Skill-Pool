angular.module('profile', []).controller('profileCtrl', function($scope, $http) {

  $scope.getUser = function (){
    $http.get("api/get_logged_in_user.php")
    .success(function (response) {
      if(response.success == true){
        $scope.user = response.result;
        $scope.user_message = response.message;
        $scope.firstNameData.firstName = $scope.user.first_name;
        $scope.addressData.city = $scope.user.city;
        $scope.addressData.zipCode = $scope.user.zip_code;
        $scope.addressData.country = $scope.user.country;
        $scope.lastNameData.lastName = $scope.user.last_name;
        $scope.titleData.title = $scope.user.title;
        $scope.phoneData.telephone = $scope.user.telephone;
        $scope.aboutMeData.aboutMe = $scope.user.about_me;
        $scope.homepageData.homepage = $scope.user.homepage;
      }else {
        $scope.user_error = response.error;
      }
    });
  }


  $scope.processFormAddress = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_address.php',
          data    : $.param($scope.addressData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorZipCode = data.errors.zipCode;
          $scope.errorCity = data.errors.city;
          $scope.errorCountry = data.errors.country;
        } else {
          $scope.formMessageAddress = data.message;
          $scope.errorZipCode = "";
          $scope.errorCity = "";
          $scope.errorCountry = "";
        }
      });
  };

  $scope.processFormFirstName = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_first_name.php',
          data    : $.param($scope.firstNameData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorFirstName = data.errors.firstName;
        } else {
          $scope.formMessageFirstName = data.message;
          $scope.errorFirstName = "";
        }
      });
  };

  $scope.processFormLastName = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_last_name.php',
          data    : $.param($scope.lastNameData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorLastName = data.errors.lastName;
        } else {
          $scope.formMessageLastName = data.message;
          $scope.errorLastName = "";
        }
      });
  };

  $scope.processFormTitle = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_title.php',
          data    : $.param($scope.titleData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTitle = data.errors.title;
        } else {
          $scope.formMessageTitle = data.message;
          $scope.errorTitle = "";
        }
      });
  };

  $scope.processFormTelephone = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_telephone_number.php',
          data    : $.param($scope.phoneData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTelephone = data.errors.telephone;
        } else {
          $scope.formMessageTelephone = data.message;
          $scope.errorTelephone = "";
        }
      });
  };

  $scope.processFormHomepage = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_homepage.php',
          data    : $.param($scope.homepageData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorHomepage = data.errors.homepage;
        } else {
          $scope.formMessageHomepage = data.message;
          $scope.errorHomepage = "";
        }
      });
  };

  $scope.processFormAboutMe = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_about_me.php',
          data    : $.param($scope.aboutMeData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorAboutMe = data.errors.aboutMe;
        } else {
          $scope.formMessageAboutMe = data.message;
          $scope.errorAboutMe = "";
        }
      });
  };
});
