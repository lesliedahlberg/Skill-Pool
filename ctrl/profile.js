angular.module('profile', []).controller('profileCtrl', function($scope, $http) {
  $scope.show = {};
  $scope.addressData = {};
  $scope.firstNameData = {};
  $scope.lastNameData = {};
  $scope.titleData = {};
  $scope.phoneData = {};
  $scope.aboutMeData = {};
  $scope.homepageData = {};

  $scope.addSkill = function() {
    $scope.addSkill.skill_id = $scope.skill_id;
    $http({
          method  : 'POST',
          url     : 'api/add_skill_for_user.php',
          data    : $.param($scope.addSkill),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
      $scope.msg = data;
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorSkill = data.errors.skill;
          $scope.errorMessage = data.errors.message;
        } else {
          $scope.formMessage = data.message;
          $scope.errorSkill = "";
          $scope.errorMessage = "";
          $scope.addSkill = "";
          $scope.getSkill();
        }
      });
  }


  $scope.getCategories = function (){
    $http.get("api/get_categories.php")
    .success(function (response) {
      if(response.success == true){
        $scope.categories = response.result;
        $scope.categories_message = response.message;
      }else {
        $scope.categories_error = response.error;
      }
    });
  }

  $scope.getSkills = function (){
    $http.get("api/get_skills_for_user.php")
    .success(function (response) {
      if(response.success == true){
        $scope.skills = response.result;
        $scope.skills_message = response.message;
      }else {
        $scope.skills_error = response.error;
      }
    });
  }


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
          $scope.show.address = false;
          $scope.getUser();
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
          $scope.show.firstName = false;
          $scope.getUser();
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
          $scope.show.lastName = false;
          $scope.getUser();
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
          $scope.show.title = false;
          $scope.getUser();
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
          $scope.show.telephone = false;
          $scope.getUser();
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
          $scope.show.homepage = false;
          $scope.getUser();
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
          $scope.show.aboutMe = false;
          $scope.getUser();
        }
      });
  };
});
