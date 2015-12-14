<? //FILIP ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //variables
  $errors = array();
  $data = array();
  $user_id = 0;

  //Arguments
  if (!empty($_REQUEST['user_id'])){
    $user_id = $_REQUEST['user_id'];
  }

  //Check conditions/Validation
  if (empty($_REQUEST['user_id']))
    $errors['user_id'] = 'User ID is required.';

  // Check if user exists
  $user_existing = DB::query("SELECT * FROM user WHERE user.id=%i", $_REQUEST['user_id']);
  if(DB::count() == 0)
  {
    $errors['exists'] = "User doesn't exist or is already deleted";
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // Delte from db
  DB::delete('skill_message', "user_id=%s", $_REQUEST['user_id']);
  DB::delete('user_skill', "user_id=%s", $_REQUEST['user_id']);
  DB::delete('user', "id=%s", $_REQUEST['user_id']);

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Removed!';
  }

  //Return data
  echo json_encode($data);
?>
