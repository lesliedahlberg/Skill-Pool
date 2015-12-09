<? require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body>
    <? require "inc/nav.php" ?>

    <h1>Profile</h1>

    <section ng-init="getUser()">
      <table class="table">
        <tr>
          <td>First Name:</td>
          <td>
            <span ng-show="!show.firstName">{{user.first_name }}
              <a href="" ng-click="show.firstName=!show.firstName">
                <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </span>
            <div ng-show="show.firstName" class="row">
              <form role="form" ng-submit="processFormFirstName()">
<<<<<<< HEAD
                    <input ng-init="getUser()" type="text" class="form-control" name="firstName" id="firstName" ng-model="firstNameData">
=======
                    <input type="text" class="form-control" name="firstName" id="firstName" ng-model="firstNameData.firstName">
>>>>>>> origin/master
              </form>
            </div>
          </td>
        </tr>
        <tr><td>Last Name:</td><td>{{user.last_name }}</td></tr>
        <tr><td>E-mail:</td><td>{{user.email }}</td></tr>
        <tr><td>Registered since:</td><td>{{user.registration_date }}</td></tr>
        <tr><td>Title:</td><td>{{user.title }}</td></tr>
        <tr><td>City:</td><td>{{user.city }}</td></tr>
        <tr><td>Zip Code:</td><td>{{user.zip_code }}</td></tr>
        <tr><td>Country:</td><td>{{user.country }}</td></tr>
        <tr><td>Telephone:</td><td>{{user.telephone }}</td></tr>
        <tr><td>Homepage:</td><td>{{user.homepage }}</td></tr>
        <tr><td>About Me:</td><td>{{user.about_me }}</td></tr>
        <tr><td>Photo:</td><td><img ng-show="!user.photo_link" src="img/profile/default.png"/><img ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/></td></tr>
      </table>
    </section>

    <h1>Change Address</h1>
    <div ng-show="show.address">
      <form role="form" ng-submit="processFormAddress()">
        {{ formMessageAddress }}
        <div id="address-group" class="form-group">
          <label for="city">New city:</label>
          <input type="text" class="form-control" name="city" id="city" ng-model="addressData.city">
          <span class="help-block" ng-show="errorCity">{{ errorCity }}</span>
          <label for="zipCode">New zipcode:</label>
          <input type="text" class="form-control" name="zipCode" id="zipCode" ng-model="addressData.zipCode">
          <span class="help-block" ng-show="errorZipCode">{{ errorZipCode }}</span>
          <label for="country">New country:</label>
          <input type="text" class="form-control" name="country" id="country" ng-model="addressData.country">
          <span class="help-block" ng-show="errorCountry">{{ errorCountry }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change Address</button>

      </form>
    </div>



    <div ng-show="show.lastName">
      <form role="form" ng-submit="processFormLastName()">
        {{ formMessageLastName }}
        <div id="lastName-group" class="form-group">
          <label for="lastName">New Last Name:</label>
          <input type="text" class="form-control" name="lastName" id="lastName" ng-model="lastNameData">
          <span class="help-block" ng-show="errorLastName">{{ errorLastName }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change Last Name</button>

      </form>
    </div>

    <div ng-show="show.title">
      <form role="form" ng-submit="processFormTitle()">
        {{ formMessageTitle }}
        <div id="title-group" class="form-group">
          <label for="title">New Title:</label>
          <input type="text" class="form-control" name="title" id="title" ng-model="titleData">
          <span class="help-block" ng-show="errorTitle">{{ errorTitle }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change Title</button>

      </form>
    </div>

    <div ng-show="show.telephone">
      <form role="form" ng-submit="processFormTelephone()">
        {{ formMessageTelephone }}
        <div id="telephone-group" class="form-group">
          <label for="title">New Number:</label>
          <input type="text" class="form-control" name="telephone" id="telephone" ng-model="phoneData">
          <span class="help-block" ng-show="errorTelephone">{{ errorTelephone }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change Number</button>

      </form>
    </div>

    <div ng-show="show.homepage">
      <form role="form" ng-submit="processFormHomepage()">
        {{ formMessageHomepage }}
        <div id="homepage-group" class="form-group">
          <label for="title">New Homepage:</label>
          <input type="text" class="form-control" name="homepage" id="homepage" ng-model="homepageData">
          <span class="help-block" ng-show="errorHomepage">{{ errorHomepage }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change Homepage</button>

      </form>
    </div>

    <div ng-show="show.aboutMe">
      <form role="form" ng-submit="processFormAboutMe()">
        {{ formMessageAboutMe }}
        <div id="aboutMe-group" class="form-group">
          <label for="title">New About Me:</label>
          <input type="text" class="form-control" name="aboutMe" id="aboutMe" ng-model="aboutMeData">
          <span class="help-block" ng-show="errorAboutMe">{{ errorAboutMe }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change About Me</button>

      </form>
    </div>

  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
