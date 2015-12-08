<? require_once "inc/session.php" ?>
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

      <button type="submit" class="btn btn-default">Change</button>

    </form>

    <form role="form" ng-submit="processFormFirstName()">
      {{ formMessageFirstName }}
      <div id="firstName-group" class="form-group">
        <label for="firstName">New First Name:</label>
        <input type="text" class="form-control" name="firstName" id="firstName" ng-model="formData.firstName">
        <span class="help-block" ng-show="errorFirstName">{{ errorFirstName }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change</button>

    </form>

    <form role="form" ng-submit="processFormLastName()">
      {{ formMessageLastName }}
      <div id="lastName-group" class="form-group">
        <label for="lastName">New Last Name:</label>
        <input type="text" class="form-control" name="lastName" id="lastName" ng-model="formData.lastName">
        <span class="help-block" ng-show="errorLastName">{{ errorLastName }}</span>
      </div>

      <button type="submit" class="btn btn-default">Change</button>

    </form>
  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
