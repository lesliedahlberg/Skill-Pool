<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_POST['category']))
    $errors['category'] = 'Category name is required.';

  //Write to db
  DB::insert('category', array(
      'name' => $_POST['category'],
    ));

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Category added successfully!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
