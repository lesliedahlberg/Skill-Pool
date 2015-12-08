<? //FILIP ?>
<? //require_once "inc/session.php" ?>
<html ng-app="category" ng-controller="categoryCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body ng-init="getCategories()">
    <? //require "inc/nav.php" ?>
    <table class="table">
      <tr ng-repeat="category in categories">
        <td>{{category.id}}</td>
        <td>{{category.name}}</td>

      </tr>
    </table>



    <h1>Add Category</h1>


    <form role="form" ng-submit="addCategory();">
      <div id="category-group" class="form-group">
        <label for="category">Category name:</label>
        <input type="text" class="form-control" name="category" id="category" ng-model="formData.category">
        <span class="help-block" ng-show="errorCategory">{{ errorCategory }}</span>
      </div>

      <button type="submit" class="btn btn-default">Add</button>

    </form>

    <!-- Test of Add skill -->
    <h1>Add Skill</h1>


    <form role="form" ng-submit="addSkill();">
      <div id="skill-group" class="form-group">
        <label for="skill">Skill name:</label>
        <input type="text" class="form-control" name="skill" id="skill" ng-model="formData.skill">
        <span class="help-block" ng-show="errorSkill">{{ errorSkill }}</span>
      </div>

      <!-- Chosen category required for database input -->
      <select class="pull-right" name="chosen_category" id="chosen_category">

        <option value="">Choose category</option>

          <option ng-repeat="category in categories">
            {{ category.id }}
          </option>

      </select>



      <button type="submit" class="btn btn-default">Add</button>

    </form>





  </body>
  <script src="ctrl/category.js"></script>
  <script src="ctrl/skill.js"></script>

  <? require "inc/foot.php"; ?>
</html>
