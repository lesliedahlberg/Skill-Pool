<? //JONATHAN ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_POST['lastName'])){
    $errors['lastName'] = 'Last name is required.';
  }
  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'New last name added successfully!';
    $data['result'] = $result;
    //write to db
    //change to session['email']
    $username = "jln14010@student.mdh.se";
    DB::update('user', array(
        'last_name' => $_POST['lastName']
      ),'email=%s', $username);
  }

  //Return data
  echo json_encode($data);
?>
