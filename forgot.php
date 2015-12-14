<? //ERIK ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="forgot" ng-controller="forgotCtrl" ng-init="title='Forgot'">
<? require "inc/head.php"; ?>

<link href="css/login.css" rel="stylesheet"/>

<body>
    <div class="container">
        <form class="form-signin" ng-submit="processForgotForm()">
          <div ng-if="!success">
          <h2 class="form-signin-heading">Enter email to reset password</h2>
          <label for="email" class="sr-only">Email address</label>
          <input type="email" id="email" name="email" class="form-control" ng-model="formData.email" placeholder="Email address" required autofocus/><br/>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Reset password</button>
          <button class="btn btn-lg btn-default btn-block" type="button" onclick="location.href='login.php'">Return to login</button>
          <span ng-show="error" class="text-danger"><br/>{{error}}</span>
          </div>
          <div ng-if="success">
              <h2 class="form-signin-heading">Please check your email</h2>
              <button class="btn btn-lg btn-default btn-block" type="button" onclick="location.href='login.php'">Return to login</button>
          </div>
        </form>
    </div> <!-- /container -->
</body>

<? require "inc/foot.php"; ?>
<script src="ctrl/forgot.js"></script>

</html>
