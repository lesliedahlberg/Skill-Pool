<?
  session_start();

  if(isset($_SESSION))
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['logged_in'] == true)
      {
        header("Location: board.php");
        die();
      }
    }
  }
?>
