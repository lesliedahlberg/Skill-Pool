<? require_once "inc/session.php"; ?>
<html ng-app="sample" ng-controller="sampleCtrl">
<? require "inc/head.php"; ?>

<body ng-init="getSample()">
<h1><span class="glyphicon glyphicon-link"></span>Skill Pool</h1>
<ul>
  <li ng-repeat="user in sample">{{user.id}} | {{user.email}} | {{user.first_name}} {{user.last_name}}</li>
</ul>

</body>
<script src="ctrl/sample.js"></script>


</html>
