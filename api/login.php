<? //ERIK ?>
<?
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();
  $execquery = true;
  $result = NULL;

  //Check conditions/Validation
  if (empty($_POST['email']))
  {
    $errors['email'] = 'Email is required.';
    $execquery = false;
  }

  if (empty($_POST['pass']))
  {
    $errors['pass'] = 'Password is required.';
    $execquery = false;
  }

  //Get data from DB
  if($execquery)
    $result = DB::query("SELECT id FROM user WHERE email=%s AND hash=%s;", $_POST['email'], md5($_POST['pass']));

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
