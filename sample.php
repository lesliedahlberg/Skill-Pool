<? require_once "inc/session.php" ?>
<html ng-app="sample" ng-controller="sampleCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body ng-init="getSample()">
    <? require "inc/nav.php" ?>
    <table class="table">
      <tr ng-repeat="user in sample">
        <td>{{user.id}}</td>
        <td>{{user.email}}</td>
        <td>{{user.first_name}}</td>
        <td>{{user.last_name}}</td>
      </tr>
    </table>
    <h1>Add Post</h1>

    <form role="form" ng-submit="processForm()">
      {{formMessage}}
      <div id="title-group" class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" ng-model="formData.title">
        <span class="help-block" ng-show="errorTitle">{{ errorTitle }}</span>
      </div>

      <div id="text-group" class="form-group">
        <label for="text">Text:</label>
        <textarea class="form-control" name="text" id="text" rows="10" ng-model="formData.text"></textarea>
        <span class="help-block" ng-show="errorText">{{ errorText }}</span>
      </div>

      <button type="submit" class="btn btn-default">Publish</button>

    </form>
  </body>
  <script src="ctrl/sample.js"></script>
  <? require "inc/foot.php"; ?>
</html>
