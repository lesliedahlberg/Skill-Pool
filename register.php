<? //ERIK ?>
<? require_once "inc/session.php"; ?>
<html ng-app="register" ng-controller="registerCtrl">
<? require "inc/head.php"; ?>

<body>

  <label for="reg_form" name="message" id="message">Enter desired information below:</label>

  <form id="reg_form" class="form-register" ng-submit="processRegForm()">
    <input type="text" name="email" id="email" placeholder="Email" /> <!-- Required -->
    <input type="password" name="pass" id="pass" placeholder="Desired password" /> <!-- Required -->
    <input type="password" name="second_pass" id="second_pass" placeholder="Retype password" /> <!-- Required -->
    <input type="text" name="first_name" id="first_name" placeholder="First name" />  <!-- Saved in view state-->
    <input type="text" name="last_name" id="last_name" placeholder="Surname" /> <!-- Saved in view state-->
  </form>

</body>

<script src="ctrl/register.js"></script>

</html>
