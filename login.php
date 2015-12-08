<? //ERIK ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="login" ng-controller="loginCtrl" ng-init="title='login'">

<? require "inc/head.php"; ?>

<body>
  <form role="form" ng-submit="processLoginForm()">
    <div class="form-group">
      Email: <input type="text" name="email" id="email" placeholder="Email..." ng-model="formData.email" class="form-control"/>
      <span class="help-block" ng-show="errorEmail">{{ errorEmail }}</span>
    </div>

    <div class="form-group">
      Password: <input type="password" name="pass" id="pass" placeholder="Password..." ng-model="formData.pass" class="form-control"/>
      <span class="help-block" ng-show="errorPass">{{ errorPass }}</span>
    </div>

    <button type="submit" class="btn btn-default">Login</button>
    
  </form>

</body>

<script src="ctrl/login.js"></script>

</html>
