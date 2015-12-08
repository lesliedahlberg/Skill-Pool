<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Arguments
  if (empty($_GET['user_id'])){
    $errors['user_id'] = "user_id required!";
  }

  //Get data from DB
  $result = DB::queryFirstRow("SELECT * FROM user WHERE id = %i", $_REQUEST['user_id']);


  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'User retrieved!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
