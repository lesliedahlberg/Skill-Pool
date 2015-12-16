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
            <img ng-show="!user.photo_link" class="img-circle img-responsive" src="img/profile/default.png"/><img class="img-circle img-responsive" ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/>
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
          <table class="table table-hover">
            <tr>
              <th class="col-md-1">First Name:</th>
              <td class="col-md-4">
                <span ng-show="!show.firstName"><span ng-click="show.firstName=!show.firstName" class="click-to-edit">{{user.first_name}}</span>
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
              <th>Last Name:</th>
              <td>
                <span ng-show="!show.lastName"><span ng-click="show.lastName=!show.lastName" class="click-to-edit">{{user.last_name }}</span>
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
              <th>E-mail:</th>
              <td><a href="mailto:{{user.email }}">{{user.email }}</a>
              </td>
            </tr>
            <tr>
              <th>Registered since:</th>
              <td>{{user.registration_date }}
              </td>
            </tr>
            <tr>
              <th>Title:</th>
              <td>
                <span ng-show="!show.title"><span ng-click="show.title=!show.title" class="click-to-edit">{{user.title }}</span>
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
              <th>Address:</th>
              <td>
                <span ng-show="!show.address"><span ng-click="show.address=!show.address" class="click-to-edit">{{user.city }}, {{user.zip_code}}, {{user.country}}</span>
                  <a href="" ng-click="show.address=!show.address">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
                <span ng-show="show.address">
                  <form role="form" ng-submit="processFormAddress();" class="form-inline">
                        <input type="text" class="form-control" placeholder="City" name="city" id="city" ng-model="addressData.city">
                        <input type="text" class="form-control" placeholder="Zip Code" name="zipCode" id="zipCode" ng-model="addressData.zipCode">
                        <input type="text" class="form-control" placeholder="Country" name="country" id="country" ng-model="addressData.country">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <th>Telephone:</th>
              <td>
                <span ng-show="!show.telephone"><span ng-click="show.telephone=!show.telephone" class="click-to-edit">{{user.telephone }}</span>
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
              <th>Homepage:</th>
              <td>
                <span ng-show="!show.homepage"><span ng-click="show.homepage=!show.homepage" class="click-to-edit"><a href="{{user.homepage }}">{{user.homepage }}</a></span>
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
              <th>About Me:</th>
              <td>
                <span ng-show="!show.aboutMe"><span ng-click="show.aboutMe=!show.aboutMe" class="click-to-edit">{{user.about_me}}</span>
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
            <tr>
              <th>Change password:</th>
              <td>
                <span ng-show="!show.aboutMe"><span onclick="location.href='change_password_logged_in.php'" class="click-to-edit">**********</span>
                  <a href="change_password_logged_in.php">
                    <span class="glyphicon glyphicon-pencil pull-right"></span>
                  </a>
                </span>
              </td>
            </tr>
          </table>
        </section>
      </div>

      <h1>Skills</h1>
      <div ng-show="!show.skill" ng-init="getSkills()">
        <a ng-repeat="skill in skills" href="board.php?skill_id={{skill.id}}" class="skill btn btn-primary">{{skill.name}}</a>
        <a href="" ng-click="show.skill=!show.skill">
          <span class="glyphicon glyphicon-pencil pull-right"></span>
        </a>
      </div>

      <div ng-show="show.skill" ng-init="getSkills()">
        <a href="" ng-repeat="skill in skills" ng-click="removeSkill(skill.id, user.id)" class="skill btn btn-danger">{{skill.name}} <span class="glyphicon glyphicon-remove"></span></a>
        <a href="" ng-click="show.skill=!show.skill">
          <span class="glyphicon glyphicon-pencil pull-right"></span>
        </a>
      </div>

      <h1>Add Skill</h1>
      <form name="formName" role="form" ng-submit="addSkill(formName);" ng-init="getSkills();getCategories();">
        <div id="skill-group" class="form-group">
          <label for="skill">Skill name:</label>
          <input bs-options="skill.name as skill.name for skill in getSuggestion($viewValue)" bs-typeahead type="text" class="form-control" name="skill" id="skill" ng-model="addSkill.skill">
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
  <? require "inc/foot.php"; ?>
</html>
