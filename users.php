<? //FILIP ?>
<? require_once "inc/session.php"; ?>
<html ng-app="users" ng-controller="usersCtrl">
<? require "inc/head.php"; ?>

<!-- Custom CSS -->
<link href="css/users.css" rel="stylesheet">

<body ng-cloak ng-init="user_id=<?if(empty($_REQUEST['user_id'])){echo -1;}else{echo $_REQUEST['user_id'];}?>">
  <? $nav_current_page = "users.php";
  require "inc/nav.php" ?>
  <div class="container typeahead-demo">

    <section ng-init="getUsers();" ng-if="user_id == -1">
      <h1>Search</h1>


      <form role="form" ng-submit="getUsers()">
        <div class="input-group">
          <!--<input type="text" placeholder="Enter state" bs-options="address.geometry as address.geometry for address in getAddress2($viewValue)" bs-typeahead class="form-control" name="search" id="search" ng-model="formData.search">-->
          <input type="text" placeholder="Enter state" bs-options="skill.name as skill.name for skill in getSuggestion($viewValue)" bs-typeahead class="form-control" name="search" id="search" ng-model="formData.search" ng-keyup="getUsers();getDidYouMean()">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
            </button>
          </span>
        </div>
      </form>

      <h1 ng-show="users[0]">People</h1>
      <div ng-show="!users[0]">
        <span class="h1">Did You Mean: </span>
        <a class="skill btn btn-primary" href="" ng-repeat="tag in didYouMean" ng-click="formData.search=tag;getUsers()">{{tag}}</a>



      </div>
      <div class="row text-center">
          <div ng-repeat="user in users" class="col-lg-3 col-sm-6 col-xs-12 hero-feature">
                    <div class="thumbnail">
                      <img class="img-circle img-responsive img-profile" ng-show="!user.photo_link" src="img/profile/default.png"/><img class="img-circle img-responsive img-profile" ng-show="user.photo_link" src="img/profile/{{user.photo_link}}"/>
                        <div class="caption">
                            <h3>{{user.first_name}} {{user.last_name}}</h3>

                              <code ng-show="user.skills">{{user.skills}}</code>
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
                            <p>E-mail: <a href="mailto:{{user.email}}">{{user.email}}</a></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>

          </div>
        </div>
        <ul ng-init="getPageCount()" class="pagination">
          <li ng-repeat="page in pages"><a href="" ng-click="getUsers(page);">{{page}}</a></li>
        </ul>
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
              <td><a href="mailto:{{user.email}}">{{user.email }}</a>
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
                <a href="{{user.homepage}}">{{user.homepage }}</a>
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
        <ui-gmap-google-map center='map.center' zoom='map.zoom'></ui-gmap-google-map>
      </div>

      <h1>Skills</h1>
      <div ng-init="getSkills()">
        <a ng-repeat="skill in skills" href="board.php?skill_id={{skill.id}}" class="skill btn btn-primary">{{skill.name}}</a>
      </div>


  </div>



</section>

</body>
<script src="ctrl/users.js"></script>
<script>
var options = {
	url: function(phrase) {
		return "api/autocomplete_for_add_skills.php?search=" + phrase + "&format=json";
	},

  listLocation: "result",
	getValue: "name"
};

$("#search").easyAutocomplete(options);</script>
<? require "inc/foot.php" ?>
</html>
