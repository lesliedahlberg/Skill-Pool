<? //ERIK ?>
<?
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();
  //$params = json_decode(file_get_contents('php://input'),true);

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


  //Get data from DB
  if($execquery)
    $result = DB::query("SELECT id FROM user WHERE email=%s AND hash=%s;", $email, md5($pass));

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
