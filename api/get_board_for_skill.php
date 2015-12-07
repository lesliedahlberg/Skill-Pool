<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Arguments
  if (!empty($_GET['skill_id'])){
    $skill_id = $_GET['skill_id'];
  }

  //Get data from DB
  $result = DB::query("
    SELECT
      *
    FROM
      skill_message
    WHERE
      skill_message.skill_id = %i
    ORDER BY
      date_added DESC
  ", $skill_id);

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
