<?
session_start();

if(isset($_SESSION))
{

    if($_SESSION['logged_in'] == true)
    {
      header("Location: board.php");
      die();
    }
}
?>
