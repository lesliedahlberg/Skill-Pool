<? //require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body ng-init="changeAddress()">
    <? require "inc/nav.php" ?>
    <h1>Change Address</h1>

    <form role="form" ng-submit="processFormAddress()">
      {{ formMessageAddress }}
      <div id="address-group" class="form-group">
        <label for="city">New city:</label>
        <input type="text" class="form-control" name="city" id="city" ng-model="formData.city">
        <span class="help-block" ng-show="errorCity">{{ errorCity }}</span>
        <label for="zipCode">New zipcode:</label>
        <input type="text" class="form-control" name="zipCode" id="zipCode" ng-model="formData.zipCode">
        <span class="help-block" ng-show="errorZipCode">{{ errorZipCode }}</span>
        <label for="country">New country:</label>
        <input type="text" class="form-control" name="country" id="country" ng-model="formData.country">
        <span class="help-block" ng-show="errorCountry">{{ errorCountry }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change Address</button>

    </form>

    <form role="form" ng-submit="processFormFirstName()">
      {{ formMessageFirstName }}
      <div id="firstName-group" class="form-group">
        <label for="firstName">New First Name:</label>
        <input type="text" class="form-control" name="firstName" id="firstName" ng-model="formData.firstName">
        <span class="help-block" ng-show="errorFirstName">{{ errorFirstName }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change First Name</button>

    </form>

    <form role="form" ng-submit="processFormLastName()">
      {{ formMessageLastName }}
      <div id="lastName-group" class="form-group">
        <label for="lastName">New Last Name:</label>
        <input type="text" class="form-control" name="lastName" id="lastName" ng-model="formData.lastName">
        <span class="help-block" ng-show="errorLastName">{{ errorLastName }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change Last Name</button>

    </form>

    <form role="form" ng-submit="processFormTitle()">
      {{ formMessageTitle }}
      <div id="title-group" class="form-group">
        <label for="title">New Title:</label>
        <input type="text" class="form-control" name="title" id="title" ng-model="formData.title">
        <span class="help-block" ng-show="errorTitle">{{ errorTitle }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change Title</button>

    </form>

    <form role="form" ng-submit="processFormTelephone()">
      {{ formMessageTelephone }}
      <div id="telephone-group" class="form-group">
        <label for="title">New Number:</label>
        <input type="text" class="form-control" name="telephone" id="telephone" ng-model="formData.telephone">
        <span class="help-block" ng-show="errorTelephone">{{ errorTelephone }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change Number</button>

    </form>

    <form role="form" ng-submit="processFormHomepage()">
      {{ formMessageHomepage }}
      <div id="homepage-group" class="form-group">
        <label for="title">New Homepage:</label>
        <input type="text" class="form-control" name="homepage" id="homepage" ng-model="formData.homepage">
        <span class="help-block" ng-show="errorHomepage">{{ errorHomepage }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change Homepage</button>

    </form>

    <form role="form" ng-submit="processFormAboutMe()">
      {{ formMessageAboutMe }}
      <div id="aboutMe-group" class="form-group">
        <label for="title">New About Me:</label>
        <input type="text" class="form-control" name="aboutMe" id="aboutMe" ng-model="formData.aboutMe">
        <span class="help-block" ng-show="errorAboutMe">{{ errorAboutMe }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change About Me</button>

    </form>
  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
