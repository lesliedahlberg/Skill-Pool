<? require_once "inc/session.php" ?>
<html ng-app="sample" ng-controller="sampleCtrl" ng-init="title='Skill Pool'">
<? require "inc/head.php"; ?>

<body ng-init="getSample()">
<h1><span class="glyphicon glyphicon-link"></span>Skill Pool</h1>
<table class="table">
  <tr ng-repeat="user in sample"><td>{{user.id}}</td><td>{{user.email}}</td><td>{{user.first_name}}</td><td>{{user.last_name}}</td></tr>
</table>
</body>
<script src="ctrl/sample.js"></script>


</html>
