<? //FILIP ?>
<? require_once "inc/session.php"; ?>
<html ng-app="admin" ng-controller="adminCtrl">

<? require "inc/head.php"; ?>
<body ng-init="getCategories()">

  <? $nav_current_page = "admin.php";
  require "inc/nav.php" ?>

<div class="col-md-3"></div>

<div class="panel-group col-md-6" id="accordion" role="tablist" aria-multiselectable="true">
  <h1>Manage categories and skills</h1>
  <h5>Click a category to expand</h5>
  <div class="panel panel-default" ng-repeat="category in categories">
    <div class="panel-heading" role="tab" id="heading{{category.id}}">
      <h4 class="panel-title">
        <a class="collapsed" ng-click="getSkills(category.id)" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{category.id}}" aria-expanded="true" aria-controls="collapse{{category.id}}">
          Category: {{category.id}} - {{category.name}}
        </a>

        <a href="" ng-click="removeCategory(category.id)">
          <span class="glyphicon glyphicon-remove text-danger pull-right"></span>
        </a>


      </h4>
    </div>
    <div id="collapse{{category.id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{category.id}}">
      <div class="panel-body">

        <!-- get skill for each category here -->
        <h4>Available skills in this category:</h4>

        <div>
          <a ng-repeat="skill in skills" ng-click="removeSkill(skill.id, category.id)" class="skill btn btn-primary glyphicon glyphicon-remove text-danger">{{skill.name}}</a>
        </div>

      </div>
    </div>
  </div>
  <span class="text-danger pull-right" ng-show="category_error">{{ category_error }}</span>
  <span class="text-danger pull-right" ng-show="skill_error">{{ skill_error }}</span>
  <br>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        <h4 class="panel-title">Add Category</h4>
        <form role="form" ng-submit="addCategory()">
          <div id="category-group" class="form-group">
            <label for="category">Name:</label>
            <input type="text" class="form-control" name="category" id="category" ng-model="formData.category">
            <span class="help-block" ng-show="errorCategory">{{ errorCategory }}</span>
          </div>
          <button type="submit" class="btn btn-default">Add</button>
        </form>
      </div>
    </div>
  </div>

</div>

<div class="col-md-3"></div>



</body>
<script src="ctrl/admin.js"></script>

<? require "inc/foot.php"; ?>
</html>
