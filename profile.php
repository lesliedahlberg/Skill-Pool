<? require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body>
    <? $nav_current_page = "profile.php";
    require "inc/nav.php" ?>
    <div class="container">
      <div class="row">
        <h1>Profile</h1>
        <div class="col-md-2"><img ng-show="!user.photo_link" src="img/profile/default.png"/><img ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/></div>
        <section class="col-md-10" ng-init="getUser()">
          <table class="table">
            <tr>
              <td>First Name:</td>
              <td>
                <span ng-show="!show.firstName">{{user.first_name }}
                  <a href="" ng-click="show.firstName=!show.firstName">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </span>
                <span ng-show="show.firstName">
                  <form role="form" ng-submit="processFormFirstName();" class="form-inline">
                        <input type="text" class="form-control" name="firstName" id="firstName" ng-model="firstNameData.firstName">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td>
                <span ng-show="!show.lastName">{{user.last_name }}
                  <a href="" ng-click="show.lastName=!show.lastName">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </span>
                <span ng-show="show.lastName">
                  <form role="form" ng-submit="processFormLastName();" class="form-inline">
                        <input type="text" class="form-control" name="lastName" id="lastName" ng-model="lastNameData.lastName">
                        <button type="submit" class="btn btn-default">Submit</button>
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
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </span>
                <span ng-show="show.title">
                  <form role="form" ng-submit="processFormTitle();" class="form-inline">
                        <input type="text" class="form-control" name="title" id="title" ng-model="titleData.title">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>Address:</td>
              <td>
                <span ng-show="!show.address">{{user.city }}, {{user.zip_code}}, {{user.country}}
                  <a href="" ng-click="show.address=!show.address">
                    <span class="glyphicon glyphicon-pencil"></span>
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
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </span>
                <span ng-show="show.telephone">
                  <form role="form" ng-submit="processFormTelephone();" class="form-inline">
                        <input type="text" class="form-control" name="telephone" id="telephone" ng-model="phoneData.telephone">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>Homepage:</td>
              <td>
                <span ng-show="!show.homepage">{{user.homepage }}
                  <a href="" ng-click="show.homepage=!show.homepage">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </span>
                <span ng-show="show.homepage">
                  <form role="form" ng-submit="processFormHomepage();" class="form-inline">
                        <input type="text" class="form-control" name="homepage" id="homepage" ng-model="homepageData.homepage">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
            <tr>
              <td>About Me:</td>
              <td>
                <span ng-show="!show.aboutMe">{{user.about_me }}
                  <a href="" ng-click="show.aboutMe=!show.aboutMe">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </span>
                <span ng-show="show.aboutMe">
                  <form role="form" ng-submit="processFormAboutMe();" class="form-inline">
                        <input type="text" class="form-control" name="aboutMe" id="aboutMe" ng-model="aboutMeData.aboutMe">
                        <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </span>
              </td>
            </tr>
          </table>
        </section>
      </div>
  </div>

  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
