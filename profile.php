<? require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body>
    <? require "inc/nav.php" ?>
    <h1>Profile </h1>
    <pre ng-init="getUser()">
      {{user.email}} |
      {{user.first_name}} |
      {{user.last_name}} |
    </pre>

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

    <div ng-show="show.firstName">
      <form role="form" ng-submit="processFormFirstName()">
        {{ formMessageFirstName }}
        <div id="firstName-group" class="form-group">
          <label for="firstName">New First Name:</label>
          <input type="text" class="form-control" name="firstName" id="firstName" ng-model="firstNameData.firstName">
          <span class="help-block" ng-show="errorFirstName">{{ errorFirstName }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change First Name</button>

      </form>
    </div>

    <div ng-show="show.lastName">
      <form role="form" ng-submit="processFormLastName()">
        {{ formMessageLastName }}
        <div id="lastName-group" class="form-group">
          <label for="lastName">New Last Name:</label>
          <input type="text" class="form-control" name="lastName" id="lastName" ng-model="lastNameData.lastName">
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
          <input type="text" class="form-control" name="title" id="title" ng-model="titleData.title">
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
          <input type="text" class="form-control" name="telephone" id="telephone" ng-model="phoneData.telephone">
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
          <input type="text" class="form-control" name="homepage" id="homepage" ng-model="homepageData.homepage">
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
          <input type="text" class="form-control" name="aboutMe" id="aboutMe" ng-model="aboutMeData.aboutMe">
          <span class="help-block" ng-show="errorAboutMe">{{ errorAboutMe }}</span>
        </div>

        <button type="submit" class="btn btn-default">Change About Me</button>

      </form>
    </div>

  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
