<? //FILIP ?>
<? require_once "inc/session.php"; ?>
<html ng-app="users" ng-controller="usersCtrl">
<? require "inc/head.php"; ?>

<body ng-cloak ng-init="user_id=<?if(empty($_REQUEST['user_id'])){echo -1;}else{echo $_REQUEST['user_id'];}?>">
  <? $nav_current_page = "users.php";
  require "inc/nav.php" ?>

  <div class="container">

    <section ng-init="getBoard();getSkill()" ng-if="user_id != -1">
      <h1>{{skill.name}}</h1>
        <form role="form" ng-submit="addPost();">
          <div id="title-group" class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" ng-model="formData.title">
            <span class="help-block" ng-show="errorTitle">{{ errorTitle }}</span>
          </div>

          <div id="text-group" class="form-group">
            <label for="text">Text:</label>
            <textarea class="form-control" name="text" id="text" rows="10" ng-model="formData.message"></textarea>
            <span class="help-block" ng-show="errorMessage">{{ errorMessage }}</span>
          </div>

          <button type="submit" class="btn btn-default">Publish</button>

        </form>

      <div class="panel panel-default" ng-repeat="post in board">
        <div class="panel-heading">
            <h3 class="panel-title">{{post.message_title}}</h3>
          </div>
        <div class="panel-body">
          {{post.message}}
        </div>
        <div class="panel-footer">Added {{post.date_added}} by {{post.first_name}} {{post.last_name}}</div>
      </div>

    </section>

    <section ng-init="getUsers()" ng-if="user_id == -1">
      <h1>People</h1>
        <div class="row">
          <div ng-repeat="user in users" class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{user.first_name}} {{user.last_name}}</h3>
              </div>
              <div class="panel-body">
                {{user.title}} | {{user.registration_date}} | {{user.city}} | {{user.country}} | {{user.zip}} | {{user.telephone}} | {{user.homepage}} | {{user.about_me}}
              </div>
            </div>

          </div>
        </div>
    </section>

  </div>

</body>
<script src="ctrl/users.js"></script>
<? require "inc/foot.php" ?>
</html>
