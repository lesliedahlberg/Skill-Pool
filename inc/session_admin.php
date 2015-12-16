<?
  session_start();
  if(!isset($_SESSION))
  {
    header("Location: login_admin.php");
    die();
  }

  if($_SESSION['admin'] != true)
  {
    header("Location: login_admin.php");
    die();
  }
?>
