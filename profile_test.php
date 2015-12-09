<? require_once "inc/session.php" ?>
<html ng-app="profile" ng-controller="profileCtrl" ng-init="title='Skill Pool'">
  <? require "inc/head.php"; ?>
  <body>
    <? require "inc/nav.php" ?>
<div class="container">
    <h1>Profile</h1>

    <section ng-init="getUser()">
      <table class="table">
        <tr>
          <td>First Name:</td>
          <td>
            <span ng-show="!show.firstName">{{user.first_name }}</span>
              <a href="" ng-click="show.firstName=true">
                <span class="glyphicon glyphicon-pencil"></span>
              </a>
          </td>
        </tr>
        <tr><td>Last Name:</td><td>{{user.last_name }}</td></tr>
        <tr><td>E-mail:</td><td>{{user.email }}</td></tr>
        <tr><td>Registered since:</td><td>{{user.registration_date }}</td></tr>
        <tr><td>Title:</td><td>{{user.title }}</td></tr>
        <tr><td>City:</td><td>{{user.city }}</td></tr>
        <tr><td>Zip Code:</td><td>{{user.zip_code }}</td></tr>
        <tr><td>Country:</td><td>{{user.country }}</td></tr>
        <tr><td>Telephone:</td><td>{{user.telephone }}</td></tr>
        <tr><td>Homepage:</td><td>{{user.homepage }}</td></tr>
        <tr><td>About Me:</td><td>{{user.about_me }}</td></tr>
        <tr><td>Photo:</td><td><img ng-show="!user.photo_link" src="img/profile/default.png"/><img ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/></td></tr>
      </table>
    </section>
</div>




  </body>
  <script src="ctrl/profile.js"></script>
  <? require "inc/foot.php"; ?>
</html>
