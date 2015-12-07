<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Get data from DB
  $result = DB::query("SELECT * FROM skill");

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Skills retrieved!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
