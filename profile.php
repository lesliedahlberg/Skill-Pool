<? require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body>
    <? $nav_current_page = "profile.php";
    require "inc/nav.php" ?>
    <div class="container">
      <div class="row">
        <h1>Profile</h1>
        <div class="col-md-2" ng-init="getUser()">
            <img ng-show="!user.photo_link" src="img/profile/default.png"/><img class="img-responsive" ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/>
            <span ng-show="!show.photoLink">
              <a href="" ng-click="show.photoLink=!show.photoLink">
                <span class="glyphicon glyphicon-camera"></span>
              </a>
            </span>
            <span ng-show="show.photoLink">
            <form action="api/change_photo.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            </span>
        </div>
        <section class="col-md-10" ng-init="getUser()">
          <table class="table">
            <tr>
              <td class="col-md-1">First Name:</td>
              <td class="col-md-4">
                <span ng-show="!show.firstName">{{user.first_name }}
                  <a href="" ng-click="show.firstName=!show.firstName">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.firstName">

                    <form role="form" ng-submit="processFormFirstName();">
                      <div class="input-group">
                          <input type="text" class="form-control" name="firstName" id="firstName" ng-model="firstNameData.firstName">
                          <span class="input-group-btn">
                               <button type="submit" class="btn btn-default">Submit</button>
                          </span>
                      </div>
                    </form>

                </span>
              </td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td>
                <span ng-show="!show.lastName">{{user.last_name }}
                  <a href="" ng-click="show.lastName=!show.lastName">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.lastName">
                  <form role="form" ng-submit="processFormLastName();" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="lastName" id="lastName" ng-model="lastNameData.lastName">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Submit</button>
                        </span>
                      </div>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>E-mail:</td>
              <td>{{user.email }}
              </td>
            </tr>
            <tr>
              <td>Registered since:</td>
              <td>{{user.registration_date }}
              </td>
            </tr>
            <tr>
              <td>Title:</td>
              <td>
                <span ng-show="!show.title">{{user.title }}
                  <a href="" ng-click="show.title=!show.title">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.title">
                  <form role="form" ng-submit="processFormTitle();" >
                    <div class="input-group">

                        <input type="text" class="form-control" name="title" id="title" ng-model="titleData.title">
                        <span class="input-group-btn">

                        <button type="submit" class="btn btn-default">Submit</button>
                      </span>
                      </div>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>Address:</td>
              <td>
                <span ng-show="!show.address">{{user.city }}, {{user.zip_code}}, {{user.country}}
                  <a href="" ng-click="show.address=!show.address">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.address">
                  <form role="form" ng-submit="processFormAddress();" class="form-inline">
                        <input type="text" class="form-control" name="city" id="city" ng-model="addressData.city">
                        <input type="text" class="form-control" name="zipCode" id="zipCode" ng-model="addressData.zipCode">
                        <input type="text" class="form-control" name="country" id="country" ng-model="addressData.country">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>Telephone:</td>
              <td>
                <span ng-show="!show.telephone">{{user.telephone }}
                  <a href="" ng-click="show.telephone=!show.telephone">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.telephone">

                  <form role="form" ng-submit="processFormTelephone();" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="telephone" id="telephone" ng-model="phoneData.telephone">
                        <span class="input-group-btn">

                          <button type="submit" class="btn btn-default">Submit</button>
                        </span>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>Homepage:</td>
              <td>
                <span ng-show="!show.homepage">{{user.homepage }}
                  <a href="" ng-click="show.homepage=!show.homepage">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.homepage">

                  <form role="form" ng-submit="processFormHomepage();" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="homepage" id="homepage" ng-model="homepageData.homepage">
                        <span class="input-group-btn">

                        <button type="submit" class="btn btn-default">Submit</button>
                      </span>
                      </div>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>About Me:</td>
              <td>
                <span ng-show="!show.aboutMe">{{user.about_me }}
                  <a href="" ng-click="show.aboutMe=!show.aboutMe">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.aboutMe">
                  <form role="form" ng-submit="processFormAboutMe();" class="form-inline">
                        <textarea rows="5" type="text" class="form-control" name="aboutMe" id="aboutMe" ng-model="aboutMeData.aboutMe"></textarea>
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
          </table>
        </section>
      </div>

      <h1>Skills</h1>
      <div ng-init="getSkills()">
        <a ng-repeat="skill in skills" href="board.php?skill_id={{skill.id}}" class="skill btn btn-primary">{{skill.name}}</a>

      </div>

      <h1>Add Skill</h1>
      <form role="form" ng-submit="addSkill();" ng-init="getSkills();getCategories();">
        <div id="skill-group" class="form-group">
          <label for="skill">Skill name:</label>
          <input type="text" class="form-control" name="skill" id="skill" ng-model="addSkill.skill">
          <span class="help-block" ng-show="errorSkill">{{ errorSkill }}</span>
        </div>

        <!-- Chosen category required for database input -->
        <select class="pull-right" name="selectedcategory" id="selectedcategory" ng-model="addSkill.selectedcategory">

          <option value="" >Choose category</option>

            <option ng-repeat="category in categories">{{category.name}}</option>

        </select>



        <button type="submit" class="btn btn-default">Add</button>

      </form>


  </div>



  </body>
  <script src="ctrl/profile.js"></script>
  <script>
  var options = {
  url: function(phrase) {
    return "api/autocomplete_for_add_skills.php?search=" + phrase + "&format=json";
  },

  getValue: "name"
  };

  $("#skill").easyAutocomplete(options);
  </script>
  <? require "inc/foot.php"; ?>
</html>
