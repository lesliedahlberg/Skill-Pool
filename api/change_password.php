<? //ERIK ?>
<?
  /* Takes in old password, new password through request and email through session. Returns data.success == true if successful, false + error otherwise */

  session_start();
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  $errors = array();
  $data = array();

  $success = false;
  $email = null;
  $old = null;
  $new = null;
  $result = null;
  $forgot = null; //Flag for telling whether request is forgot or change
  $verification_hash = null;

  if(isset($_REQUEST['forgot']))
  {
    $forgot = true;
  }
  else
  {
    $forgot = false;
  }

  if($forgot != true)
  {
    if(isset($_REQUEST['old']) && isset($_REQUEST['new']) && isset($_SESSION['email']))
    {
      $old = $_REQUEST['old'];
      $new = $_REQUEST['new'];
      $email = $_REQUEST['email'];

      $result = DB::query("SELECT hash FROM user WHERE email=%s", $email);

      //Check if old pass matches and update if they match
      if(md5($old) == md5($result['hash']))
      {
        DB::update('user', array('hash' => md5($new)), "email=%s", $email);
        $data['success'] = true;
      }
      else
      {
          $errors['pass'] = "Old password is incorrect";
          $data['errors'] = $errors;
          $data['success'] = false;
      }
    }
    else
    {
        $errors['pass'] = "API recieved empty request";
        $data['errors'] = $errors;
        $data['success'] = false;
    }
  }
  else
  {
    if(isset($_REQUEST['new']) && isset($_REQUEST['email']) && isset($_REQUEST['hash']))
    {
      $new = $_REQUEST['new'];
      $email = $_REQUEST['email'];
      $verification_hash = $_REQUEST['hash'];

      DB::query("SELECT verification_code FROM user WHERE email=%s", $email);
      if(DB::count() == 0)
      {
        $errors['pass'] = "Verification code invalid";
        $data['errors'] = $errors;
        $data['success'] = false;
      }
      else
      {
        DB::update('user', array('hash' => md5($new)), "email=%s", $email);
        $data['success'] = true;
      }
    }
    else
    {
        $errors['pass'] = "API recieved empty request";
        $data['errors'] = $errors;
        $data['success'] = false;
    }
  }

  echo json_encode($data);
  die();
?>
