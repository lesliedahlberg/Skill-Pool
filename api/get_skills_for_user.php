<? //JONATHAN ?>
<?
  //DB login
  require_once "../inc/session.php";
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";
  //Arrays
  $errors = array();
  $data = array();

  //Arguments
  if (!empty($_SESSION['id'])){
    $user_id = $_SESSION['id'];
  }
    $result = DB::query("SELECT * from skill where id IN(Select skill_id from user_skill where user_skill.user_id=%i)", $user_id);


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
