<? //Erik ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="changepassforgot" ng-controller="changepassforgotCtrl" ng-init="title='Change Password'">
<? require "inc/head.php"; ?>

<link href="css/login.css" rel="stylesheet"/>

<body>
    <div class="container">
        <form class="form-signin" ng-submit="processChangePasswordForgot()">
          <div ng-if="!success">
            <h2 class="form-signin-heading" name="head_message" id="head_message">Enter new password</h2>
            <input type="password" id="new" name="new" class="form-control" ng-model="formData.new" placeholder="New password" required autofocus/>
            <input type="password" id="matchnew" name="matchnew" class="form-control" ng-model="formData.matchnew" placeholder="New password again..." required/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Change password</button>
            <button class="btn btn-lg btn-default btn-block" type="button" onclick="location.href='login.php'">Return to login</button>
            <span ng-show="error" class="text-danger"><br/>{{error}}</span>
          </div>
          <div ng-if="success">
            <h2 class="form-signin-heading">Change successful!</h2>
            <button class="btn btn-lg btn-default btn-block" type="button" onclick="location.href='login.php'">Return to login</button>
          </div>
        </form>
    </div> <!-- /container -->
</body>

<? require "inc/foot.php"; ?>
<script src="ctrl/change_password.js"></script>

</html>
