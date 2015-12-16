<?
  session_start();
  if(!isset($_SESSION))
  {
    header("Location: login.php");
    die();
  }

  if($_SESSION['admin'] != true)
  {
    header("Location: users.php");
    die();
  }
?>
