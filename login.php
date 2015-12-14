<? //ERIK ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="login" ng-controller="loginCtrl" ng-init="title='Login'">

<? require "inc/head.php"; ?>

<link href="css/login.css" rel="stylesheet"/>

<body>
  <div class="container">
        <form class="form-signin" ng-submit="processLoginForm()">
          <h2 class="form-signin-heading">Please sign in</h2>
          <label for="email" class="sr-only">Email address</label>
          <input type="email" id="email" name="email" class="form-control" ng-model="formData.email" placeholder="Email address" required autofocus/>
          <label for="pass" class="sr-only">Password</label>
          <input type="password" id="pass" name="pass" class="form-control" ng-model="formData.pass" placeholder="Password" required/>
          <div class="label">
            <a href="forgot.php" id="forgot" name="forgot">Forgot password</a>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 0.5em">Sign in</button>
          <button class="btn btn-lg btn-default btn-block" type="button" onclick="location.href='register.php'">Register</button>
          <span ng-show="error" class="text-danger"><br/>{{error}}</span>
        </form>

      </div> <!-- /container -->

</body>

<script src="ctrl/login.js"></script>
<? require "inc/foot.php"; ?>
</html>
