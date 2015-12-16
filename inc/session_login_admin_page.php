<?
  session_start();

  if(isset($_SESSION))
  {
    if(isset($_SESSION['admin']))
    {
      if($_SESSION['admin'] == true)
      {
        header("Location: admin.php");
        die();
      }
    }
  }
?>
