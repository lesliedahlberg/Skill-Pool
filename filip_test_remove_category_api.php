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
          <a href="" ng-click="removeCategory()"> <!-- ska fixa detta -->
            <span class="glyphicon glyphicon-remove text-danger pull-right"></span>
          </a>
        </h4>
      </div>
      <div id="collapse{{category.id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{category.id}}">
        <div class="panel-body">

        <!-- get skill for each category here -->
        <h4>Available skills in this category:</h4>

        <div> <!-- testat skicka in {{categories.id}} vilket logiskt sett är rätt, men det fungerar inte -->
          <a ng-repeat="skill in skills" href="" class="skill btn btn-primary glyphicon glyphicon-remove text-danger">{{skill.name}}</a>

        </div>

        </div>
      </div>
    </div>
  </div>


  </body>
  <script src="ctrl/category.js"></script>

  <? require "inc/foot.php"; ?>
</html>
