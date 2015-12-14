<? //LESLIE ?>
<? require_once "inc/session.php"; ?>
<html ng-app="board" ng-controller="boardCtrl">
  <? require "inc/head.php"; ?>
  <body ng-cloak ng-init="skill_id=<?if(empty($_REQUEST['skill_id'])){echo -1;}else{echo $_REQUEST['skill_id'];}?>">
    <? $nav_current_page = "board.php";
    require "inc/nav.php" ?>

    <div class="container">

      <ol class="breadcrumb">
        <li><a href="users.php">Home</a></li>
        <li><a href="board.php">Boards</a></li>
        <li class="active" ng-if="skill != null">{{skill.name}}</li>
      </ol>

      <section ng-init="getBoard();getSkill()" ng-if="skill_id != -1">
        <h1>{{skill.name}}</h1>
          <form name="formName" role="form" ng-submit="addPost(formName);">
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

      <section ng-init="getSkills()" ng-if="skill_id == -1">
        <h1>Welcome to Boards <? echo($_SESSION['user_name'])?>!</h1>
        <ul class="list-group" >
          <li class="list-group-item" ng-repeat="skill in skills">
            <span class="badge">{{skill.post_count}}</span>
            <a href="?skill_id={{skill.id}}">{{skill.name}}</a>
          </li>
          <li class="list-group-item" ng-repeat="skill in empty_skills">
            <span class="badge">{{skill.post_count}}</span>
            <a href="?skill_id={{skill.id}}">{{skill.name}}</a>
          </li>
        </ul>
      </section>

    </div>

  </body>
  <script src="ctrl/board.js"></script>
  <? require "inc/foot.php" ?>
</html>
