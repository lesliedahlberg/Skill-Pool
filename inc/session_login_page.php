<?
  if(isset($_SESSION))
  {
    if($_SESSION['logged_in'] === true)
    {
      header("Location: users.php");
      die();
    }
  }
?>
