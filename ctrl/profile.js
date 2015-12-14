angular.module('profile', ['mgcrea.ngStrap']).controller('profileCtrl', function($scope, $http) {
  $scope.show = {};
  $scope.addressData = {};
  $scope.firstNameData = {};
  $scope.lastNameData = {};
  $scope.titleData = {};
  $scope.phoneData = {};
  $scope.aboutMeData = {};
  $scope.homepageData = {};


  $scope.getSuggestion = function(viewValue) {
    var params = {search: viewValue, sensor: false};
    return $http.get('api/autocomplete_for_add_skills.php', {params: params})
    .then(function(res) {
      return res.data;
    });
  };

  $scope.addSkill = function(formName) {
    $scope.myForm = formName;
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
          $scope.getSkills();
          $scope.myForm.unbind('submit');
          $scope.formMessage = data.message;
          $scope.errorSkill = "";
          $scope.errorMessage = "";
          $scope.addSkill = "";
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

  $scope.removeSkill = function (skillId, userId){

    $scope.sId = skillId;
    $scope.usrId = userId;

    $http({
      url : "api/remove_skill_for_user.php?skill_id="+$scope.sId+"&user_id="+$scope.usrId,
      method : "POST"
    }).success(function (response) {
      if(response.success == true){
        $scope.skill = response.result;
        $scope.skill_message = response.message;
        $scope.getSkills($scope.cId); // för att visa nytt resultat efter borttagning av en skill
        $scope.skill_error = "";
        $scope.category_error = "";

      }else {
        $scope.skill_error = response.errors.exists;
        $scope.skill_e = true;
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

  $scope.processFormPhoto = function() {
    var file = $scope.photo;
    $scope.message = file;
    var uploadUrl = 'api/change_photo.php';
    fileUpload.uploadFileToUrl(file, uploadUrl);
  };

})
.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}])
.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
          alert("YES");
        })
        .error(function(){
          alert("NO");
        });
    }
}]);
