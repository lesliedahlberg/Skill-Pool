<? //ERIK ?>
<?
  session_start();
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Variables
  $execquery = true;
  $result = NULL;
  $email = NULL;
  $pass = NULL;

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
    $data['success'] = false;
    $data['errors']  = $errors;

    echo json_encode($data); //Return data
    die();
    }
  }


  //Get data from DB
  $result = DB::queryFirstRow("SELECT id, hash, first_name FROM user WHERE email=%s;", $email);
  $count = DB::count();
  if($result['hash'] == md5($pass))
  {
    //Set return statement
    $data['success'] = true;
    $data['result'] = $result;


    $_SESSION['logged_in'] = true;
    $_SESSION['id'] = $result['id'];
    $_SESSION['user_name'] = $result['first_name'];
  }


  //Return data
  echo $_SESSION['logged_in'];
  echo json_encode($data);
  die();
?>
