<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-link"></span>Skill Pool</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <? if($nav_current_page=="users.php") echo 'class="active "' ?>><a href="users.php">People</a></li>
        <li <? if($nav_current_page=="profile.php") echo 'class="active "' ?>><a href="profile.php">Profile</a></li>
        <li <? if($nav_current_page=="board.php") echo 'class="active "' ?>><a href="board.php">Boards</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li <? if($nav_current_page=="admin.php") echo 'class="active "' ?>><a href="admin.php">Admin</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
