<? require_once "inc/session.php" ?>
<html ng-app="category" ng-controller="categoryCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body ng-init="addCategory()">
    <? require "inc/nav.php" ?>
    <table class="table">
      <tr ng-repeat="category in category">
        <td>{{category.id}}</td>
        <td>{{category.name}}</td>
      </tr>
    </table>
    <h1>Add Category</h1>

    <form role="form" ng-submit="processForm()">
      {{ formMessage }}
      <div id="category-group" class="form-group">
        <label for="category">Category name:</label>
        <input type="text" class="form-control" name="category" id="category" ng-model="formData.category">
        <span class="help-block" ng-show="errorCategory">{{ errorCategory }}</span>
      </div>

      <button type="submit" class="btn btn-default">Add</button>

    </form>
  </body>
  <script src="ctrl/category.js"></script>
  <? require "inc/foot.php"; ?>
</html>
