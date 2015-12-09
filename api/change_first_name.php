<? //JONATHAN ?>
<?
  session_start();
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_REQUEST['firstName'])){
    $errors['firstName'] = 'First name is required.';
  }
  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'New first name added successfully!';
    //write to db
    //change to session['email']
    $id = $_SESSION['id'];
    DB::update('user', array(
        'first_name' => $_REQUEST['firstName']
      ),'id=%s', $id);
  }

  //Return data
  echo json_encode($data);
?>
