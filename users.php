<? //FILIP ?>
<? require_once "inc/session.php"; ?>
<html ng-app="users" ng-controller="usersCtrl">
<? require "inc/head.php"; ?>

<!-- Custom CSS -->
<link href="css/users.css" rel="stylesheet">

<body ng-cloak ng-init="user_id=<?if(empty($_REQUEST['user_id'])){echo -1;}else{echo $_REQUEST['user_id'];}?>">
  <? $nav_current_page = "users.php";
  require "inc/nav.php" ?>
  <div class="container">

    <section ng-init="getUsers()" ng-if="user_id == -1">
      <h1>Search</h1>

      <form role="form" ng-submit="getUsers()">
        <div id="user-group" class="form-group">
          <div class="input-append">
            <div class="col-md-8">
            <input type="text" class="form-control" name="search" id="search" ng-model="formData.search">
            <span class="help-block" ng-show="errorSearch">{{errorSearch}}</span>
            </div>
            <div class="col-md-4">
            <button type="submit" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
            </button>
          </div>
          </div>
        </div>
      </form>
      <br><br>

      <h1>People</h1>
      <div class="row text-center">
          <div ng-repeat="user in users" class="col-md-3 col-sm-6 hero-feature">


                    <div class="thumbnail">
                      <img ng-show="!user.photo_link" src="img/profile/default.png"/><img ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/>
                        <div class="caption">
                            <h3>{{user.first_name}} {{user.last_name}}</h3>
                            <p>Registred {{user.registration_date}}</p>
                            <p>
                                <a href="#" class="btn btn-primary">Profile</a> <a href="mailto:{{user.email}}" class="btn btn-default">Contact</a>
                            </p>
                        </div>
                    </div>

          </div>
        </div>
    </section>




  </div>

</body>
<script src="ctrl/users.js"></script>
<? require "inc/foot.php" ?>
</html>
