<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Get data from DB
  $result = DB::query("
    SELECT *, 0 as post_count FROM skill WHERE skill.id NOT IN (SELECT skill.id FROM skill JOIN skill_message ON skill.id = skill_message.skill_id GROUP BY skill.id) ORDER BY skill.name ASC
  ");

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
