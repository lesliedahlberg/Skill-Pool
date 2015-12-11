<? //FILIP ?>
<? //require_once "inc/session.php" ?>
<html ng-app="category" ng-controller="categoryCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body ng-init="getCategories()">

    <? $nav_current_page = "filip_test_remove_category.php";
    require "inc/nav.php" ?>


  <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">


    <div class="panel panel-default" ng-repeat="category in categories">
      <div class="panel-heading" role="tab" id="heading{{category.id}}">
        <h4 class="panel-title">
          <a class="collapsed" ng-click="getSkills(category.id)" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{category.id}}" aria-expanded="true" aria-controls="collapse{{category.id}}">
            Category: {{category.id}} - {{category.name}}
          </a>

          <a href="" ng-click="removeCategory(category.id)">
            <span class="glyphicon glyphicon-remove text-danger pull-right"></span>
          </a>

          <span class="text-danger pull-right" ng-show="category_error">{{ category_error }}</span>

        </h4>
      </div>
      <div id="collapse{{category.id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{category.id}}">
        <div class="panel-body">

          <!-- get skill for each category here -->
          <h4>Available skills in this category:</h4>

          <div>
            <a ng-repeat="skill in skills" ng-click="removeSkill(skill.id, category.id)" class="skill btn btn-primary glyphicon glyphicon-remove text-danger">{{skill.name}}</a>
          </div>
          <span class="text-danger" ng-show="skill_error">{{ skill_error }}</span>
        </div>
      </div>
    </div>
  </div>


  </body>
  <script src="ctrl/category.js"></script>

  <? require "inc/foot.php"; ?>
</html>
