<? //ERIK ?>
<?
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
  if (empty($_POST['email']))
  {
    $errors['email'] = 'Email is required.';
    $execquery = false;
  }
  else {
    $email = $_POST['email'];
  }

  if (empty($_POST['pass']))
  {
    $errors['pass'] = 'Password is required.';
    $execquery = false;
  }
  else {
    $pass = $_POST['pass'];
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
  $result = DB::query("SELECT id, hash, first_name FROM user WHERE email=%s;", $email);
  $count = DB::count();

  if($count == 1 && $result['hash'][0] == md5($pass))
  {
    //Set return statement
    $data['success'] = true;
    $data['result'] = $result;

    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['id'] = $result['id'][0];
    $_SESSION['user_name'] = $result['first_name'][0];
  }
  }

  //Return data
  echo json_encode($data);
  die();
?>
