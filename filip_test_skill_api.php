<? //FILIP ?>
<? //require_once "inc/session.php" ?>
<html ng-app="skill" ng-controller="skillCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body ng-init="getSkills();getCategories();">
    <? //require "inc/nav.php" ?>
    <table class="table">
      <tr ng-repeat="skill in skills">
        <td>{{skill.id}}</td>
        <td>{{skill.name}}</td>

      </tr>
    </table>




    <!-- Test of Add skill -->
    <h1>Add Skill</h1>


    <form role="form" ng-submit="addSkill();">
      <div id="skill-group" class="form-group">
        <label for="skill">Skill name:</label>
        <input type="text" class="form-control" name="skill" id="skill" ng-model="formData.skill">
        <span class="help-block" ng-show="errorSkill">{{ errorSkill }}</span>
      </div>

      <!-- Chosen category required for database input -->
      <select class="pull-right" name="selected_category" id="selected_category">

        <option value="" >Choose category</option>

          <option ng-repeat="category in categories">
            {{ category.name }}
          </option>

      </select>



      <button type="submit" class="btn btn-default">Add</button>

    </form>





  </body>
  <script src="ctrl/skill.js"></script>

  <? require "inc/foot.php"; ?>
</html>
