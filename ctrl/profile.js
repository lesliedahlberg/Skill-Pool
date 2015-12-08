angular.module('profile', []).controller('profileCtrl', function($scope, $http) {


  $scope.processFormAddress = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_address.php',
          data    : $.param($scope.formData),
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
          $scope.formData = "";
        }
      });
  };

  $scope.processFormFirstName = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_first_name.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorFirstName = data.errors.firstName;
        } else {
          $scope.formMessageFirstName = data.message;
          $scope.errorFirstName = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormLastName = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_last_name.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorLastName = data.errors.lastName;
        } else {
          $scope.formMessageLastName = data.message;
          $scope.errorLastName = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormTitle = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_title.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTitle = data.errors.title;
        } else {
          $scope.formMessageTitle = data.message;
          $scope.errorTitle = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormTelephone = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_telephone_number.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTelephone = data.errors.telephone;
        } else {
          $scope.formMessageTelephone = data.message;
          $scope.errorTelephone = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormHomepage = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_homepage.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorHomepage = data.errors.homepage;
        } else {
          $scope.formMessageHomepage = data.message;
          $scope.errorHomepage = "";
          $scope.formData = "";
        }
      });
  };

  $scope.processFormAboutMe = function() {

    $http({
          method  : 'POST',
          url     : 'api/change_about_me.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorAboutMe = data.errors.aboutMe;
        } else {
          $scope.formMessageAboutMe = data.message;
          $scope.errorAboutMe = "";
          $scope.formData = "";
        }
      });
  };
});
