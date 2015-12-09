<? require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body>
    <? require "inc/nav.php" ?>

    <div class="container" ng-init="getUser()">
      <pre>
        {{user}}
      </pre>

    </div>
  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
