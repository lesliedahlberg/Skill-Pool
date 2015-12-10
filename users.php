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
                                <a href="users.php?user_id={{user.id}}" class="btn btn-primary">Profile</a> <a href="mailto:{{user.email}}" class="btn btn-default" data-toggle="modal" data-target="#modal_{{user.id}}">Contact</a>
                            </p>
                        </div>
                    </div>


                    <div id="modal_{{user.id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{user.first_name}} {{user.last_name}}</h4>
                          </div>
                          <div class="modal-body">
                            <p>Telephone: {{user.telephone}}</p>
                            <p>E-mail: {{user.email}}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>

          </div>
        </div>
    </section>
    </div>

    <section ng-init="getUser()" ng-if="user_id != -1">

    <!-- Show selected user profile here -->
    <div class="container">
      <div class="row">
        <h1>Profile</h1>
        <div class="col-md-2" ng-init="getUser()">
            <img ng-show="!user.photo_link" src="img/profile/default.png"/><img class="img-responsive" ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/>
        </div>
        <section class="col-md-10" ng-init="getUser()">
          <table class="table">
            <tr>
              <td>First Name:</td>
              <td>
                {{user.first_name }}
              </td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td>
                {{user.last_name }}
              </td>
            </tr>
            <tr>
              <td>E-mail:</td>
              <td>{{user.email }}
              </td>
            </tr>
            <tr>
              <td>Registered since:</td>
              <td>{{user.registration_date }}
              </td>
            </tr>
            <tr>
              <td>Title:</td>
              <td>
                {{user.title }}
              </td>
            </tr>
            <tr>
              <td>Address:</td>
              <td>
                {{user.city }}, {{user.zip_code}}, {{user.country}}
              </td>
            </tr>
            <tr>
              <td>Telephone:</td>
              <td>
                {{user.telephone }}
              </td>
            </tr>
            <tr>
              <td>Homepage:</td>
              <td>
                {{user.homepage }}
              </td>
            </tr>
            <tr>
              <td>About Me:</td>
              <td>
                {{user.about_me }}
              </td>
            </tr>
          </table>
        </section>
      </div>

      <h1>Skills</h1>
      <div ng-init="getSkills()">
        <a ng-repeat="skill in skills" href="board.php?skill_id={{skill.id}}" class="skill btn btn-primary">{{skill.name}}</a>
      </div>


  </div>



</section>

</body>
<script src="ctrl/users.js"></script>
<? require "inc/foot.php" ?>
</html>
