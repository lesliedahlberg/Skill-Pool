<? //LESLIE ?>
<? require_once "inc/session.php"; ?>
<html ng-app="board" ng-controller="boardCtrl">
  <? require "inc/head.php"; ?>
  <body ng-init="skill_id=<?if(empty($_REQUEST['skill_id'])){echo -1;}else{echo $_REQUEST['skill_id'];}?>">
    <? require "inc/nav.php" ?>

    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="board.php">Boards</a></li>
      <li class="active" ng-if="skill != null">{{skill.name}}</li>
    </ol>
    <section ng-init="getBoard();getSkill()" ng-if="skill_id != -1">
      <h1>{{skill.name}}</h1>

      <div class="media" ng-repeat="post in board">
        <div class="media-left">
          <a href="#">
            <img class="media-object" src="img/avatar.png" alt="">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">{{post.title}}<small> {{post.date_added}} by {{post.first_name}} {{post.last_name}}</small></h4>
            {{post.message}}
        </div>
      </div>




    </section>

    <section ng-init="getSkills()" ng-if="skill_id == -1">
      <h1>Boards<small>(sorted by latest post)</small></h1>
      <ul ng-repeat="skill in skills">
        <li><a href="?skill_id={{skill.id}}">{{skill.name}}</a></li>
      </ul>
    </section>

  </body>
  <script src="ctrl/board.js"></script>
  <? require "inc/foot.php" ?>
</html>
