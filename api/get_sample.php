<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  /*if (empty($_POST['title']))
    $errors['title'] = 'Title is required.';

  if (empty($_POST['text']))
    $errors['text'] = 'Text is required.';
  */

  //Get data from DB
  $result = DB::query("SELECT * FROM user");

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Categories retrieved successfully!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
