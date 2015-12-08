<?php
  if(!isset($_SESSION))
  {
    header("Location: login.php");
    die();
  }

  if($_SESSION['logged_in'] !== true)
  {
    header("Location: login.php");
    die();
  }
?>
