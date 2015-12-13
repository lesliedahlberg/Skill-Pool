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
  <div class="panel panel-default" ng-repeat="category in categories">
    <div class="panel-heading" role="tab" id="heading{{category.id}}">
      <h4 class="panel-title">
        <a class="collapsed" ng-click="getSkills(category.id)" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{category.id}}" aria-expanded="true" aria-controls="collapse{{category.id}}">
          {{category.name}}
        </a>

        <!-- open dialog -->
        <a href="" class="pull-right" data-toggle="modal" data-target="#modal_{{category.id}}">
          <span class="glyphicon glyphicon-remove text-danger pull-right"></span>
        </a>

      </h4>
    </div>

    <div id="modal_{{category.id}}" class="modal fade" data-backdrop="" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete category</h4>
          </div>
          <div class="modal-body">
            <p>Do you really want to delete category <strong>{{category.name}}</strong>?</p>

          </div>
          <div class="modal-footer">
            <span class="text-danger" ng-show="category_error">{{ category_error }}</span>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button ng-click="removeCategory(category.id)" type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>

      </div>
    </div>


    <div id="collapse{{category.id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{category.id}}">
      <div class="panel-body">

        <!-- get skill for each category here -->

        <div ng-repeat="skill in skills">
          <!-- open dialog -->

          <a href="" data-toggle="modal" data-target="#skill_modal_{{skill.id}}_{{category.id}}" class="skill btn btn-danger">{{skill.name}} <span class="glyphicon glyphicon-remove"></span></a>
          <br><br>


          <div id="skill_modal_{{skill.id}}_{{category.id}}" class="modal" data-backdrop="" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete skill</h4>
                </div>
                <div class="modal-body">
                  <p>Do you really want to delete skill <strong>{{skill.name}}</strong>?</p>
                  <p><strong>Warning!</strong> This will also delete the skill board and all its posts (not recommended).</p>


                  <div ng-hide="!skill_e" class="ng-hide">
                    <p> ... </p>
                    <!-- !!!!!!!!! Jag ska fortsätta härifrån nästa gång: !!!!!!!!! -->



                  </div>

                </div>
                <div class="modal-footer">
                  <span class="text-danger" ng-show="skill_error">{{ skill_error }}</span>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button ng-click="removeSkill(skill.id, category.id)" type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>


    </div>





  </div>





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
