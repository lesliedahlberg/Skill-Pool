<? //ERIK ?>
<?
  require_once 'lib/php/meekrodb.class.php';
  require_once "inc/db_credentials.php";

  //Arrays
  $data = array();
  $success = false;
  $error = "GET not set";

  if(isset($_GET))
  {
    if(isset($_GET['email']) && isset($_GET['hash']))
    {
      $email = $_GET['email'];
      $hash = $_GET['hash'];

      $result = DB::queryFirstRow("SELECT id FROM user WHERE email=%s AND verification_code=%s", $email, $hash);
      $count = DB::count();

      if($count == 0)
      {
        $error = "Email or hash invalid";
        $success = false;
      }
      else {
        DB::update('user', array('status' => 1), "id=%i", $result['id']);
        $error = null;
        $success = true;
      }
    }
  }

  $data['error'] = $error;
  $data['success'] = $success;

  //Return data
  echo json_encode($data);
?>
