<? //ERIK ?>
<? require_once "inc/session_login_page.php"; ?>
<html ng-app="register" ng-controller="registerCtrl" ng-init="title='Register'">
<? require "inc/head.php"; ?>

<body id="body" ng-init="m='Ready'">
  <div class="container" id="container">
      <div class="row">
          <form class="form-signin" role="form" id="reg_form" ng-submit="processRegForm()">
            <div class="col-md-3"></div>
              <div class="col-md-6" ng-if="!registered">
                <h2 class="form-signin-heading" name="head_message" id="head_message">Enter below to register</h2>
                  <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                  <div class="form-group">
                      <label for="InputName">Enter first name</label>
                      <div class="input-group">
                          <input type="text" class="form-control" name="first_name" id="first_name" ng-model="formData.first_name" placeholder="First name..." required autofocus>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="InputName">Enter surname</label>
                      <div class="input-group">
                          <input type="text" class="form-control" name="last_name" id="last_name" ng-model="formData.last_name" placeholder="Surname..." required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="InputEmail">Enter Email</label>
                      <div class="input-group">
                          <input type="email" class="form-control" id="email" name="email" ng-model="formData.email" placeholder="Email..." required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="InputEmail">Confirm Email</label>
                      <div class="input-group">
                          <input type="email" class="form-control" id="confirm_email" name="confirm_email" placeholder="Email again..." required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="InputName">Enter password</label>
                      <div class="input-group">
                          <input type="password" class="form-control" name="pass" id="pass" ng-model="formData.pass" placeholder="Password..." required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="InputName">Confirm password</label>
                      <div class="input-group">
                          <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Password again..." required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block pull-right" type="submit" name="submit" id="submit">Register</button>
                  <!-- <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"> -->
                  <h3 ng-show="m">{{m}}</h3>
              </div>
              <div class="col-md-6" ng-if="registered">
                <h2 class="form-signin-heading" name="wait_for_verify_message" id="wait_for_verify_message">A verification email has been sent.</h2>
                <button class="btn btn-primary" onclick="location.href='login.php'">Click to return to Login</button>
              </div>
              <div class="col-md-3"></div>
          </form>
      </div>
  </div>
</body>

<? require "inc/foot.php"; ?>
<script src="ctrl/register.js"></script>

</html>
