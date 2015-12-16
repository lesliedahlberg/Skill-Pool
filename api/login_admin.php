<?
  session_start();
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $errors['email'] = null;
  $errors['pass'] = null;
  $errors['invalid'] = null;

  $data = array();

  //Variables
  $execquery = true;
  $result = NULL;
  $email = NULL;
  $pass = NULL;
  $success = false;

  //Check conditions/Validation
  if (empty($_REQUEST['email']))
  {
    $errors['email'] = 'Email is required.';
    $execquery = false;
  }
  else {
    $email = $_REQUEST['email'];
  }

  if (empty($_REQUEST['pass']))
  {
    $errors['pass'] = 'Password is required.';
    $execquery = false;
  }
  else {
    $pass = $_REQUEST['pass'];
  }

  if(!$execquery)
  {
    if (!empty($errors))
    {
    $data['success'] = $success;
    $data['errors']  = $errors;

    echo json_encode($data); //Return data
    die();
    }
  }


  //Get data from DB
  $result = DB::queryFirstRow("SELECT id, hash, first_name, status, email, admin FROM user WHERE email=%s;", $email);
  $count = DB::count();

  if($count == 0)
  {
    $errors['invalid'] = "Input email is not registered. ";
  }
  if($result['status'] == 0)
  {
    $errors['invalid'] .= "This account needs to be verified before it can be accessed, please check your email.";
  }
  if($result['admin'] == 0){
    $errors['invalid'] .= "This account is not an admin account";
  }
  else{ // if status == verified

    if($result['hash'] == md5($pass))
    {
      //Set return statement
      $success = true;

      $_SESSION['admin'] = true;
      $_SESSION['logged-in'] = true;
      $_SESSION['id'] = $result['id'];
      $_SESSION['user_name'] = $result['first_name'];
      $_SESSION['email'] = $result['email'];
    }
    else
    {
        $errors['pass'] = "Incorrect password. ";
        $success = false;
    }
  }
  $data['success'] = $success;
  $data['result'] = $result;
  $data['errors'] = $errors;

  //Return data
  echo json_encode($data);
  die();
?>
