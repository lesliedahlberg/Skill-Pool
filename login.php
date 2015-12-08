<? //ERIK ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="login" ng-controller="loginCtrl" ng-init="title='login'">

<? require "inc/head.php"; ?>

<link href="css/login.css" rel="stylesheet"/>

<body>
  <div class="container">
        <form class="form-signin" ng-submit="processLoginForm()">
          <h2 class="form-signin-heading">Please sign in</h2>
          <label for="email" class="sr-only">Email address</label>
          <span ng-show="errorPass">{{ errorPass }}</span>
          <input type="email" id="email" name="email" class="form-control" ng-model="formData.email" placeholder="Email address" required autofocus/>
          <label for="pass" class="sr-only">Password</label>
          <span class="help-block" ng-show="errorEmail">{{ errorEmail }}</span>
          <input type="password" id="pass" name="pass" class="form-control" ng-model="formData.pass" placeholder="Password" required/>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

      </div> <!-- /container -->

</body>

<script src="ctrl/login.js"></script>
<? require "inc/foot.php"; ?>
</html>
