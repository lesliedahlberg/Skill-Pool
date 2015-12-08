<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Arguments
  if (empty($_REQUEST['skill_id'])){
    $errors['skill_id'] = "A skill is required!";
  }

  if (empty($_REQUEST['user_id'])){
    $errors['user_id'] = "A user is required!";
  }

  if (empty($_REQUEST['message'])){
    $errors['message'] = "Message required!";
  }

  if (empty($_REQUEST['title'])){
    $errors['title'] = "Title required!";
  }

  //Get data from DB
  if(empty($errors)) {
    DB::insert('skill_message', array(
        'skill_id' => $_REQUEST['skill_id'],
        'user_id' => $_REQUEST['user_id'],
        'message' => $_REQUEST['message'],
        'title' => $_REQUEST['title']
      ));
  }

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Board retrieved!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
