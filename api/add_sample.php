<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_POST['title']))
    $errors['title'] = 'Title is required.';

  if (empty($_POST['text']))
    $errors['text'] = 'Text is required.';


  //Write to db
  /*DB::insert('sample', array(
      'title' => $_POST['title'],
      'text' => $_POST['text'],
      'author' => "admin"
    ));*/

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Post added successfully!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
