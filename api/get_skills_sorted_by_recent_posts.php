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
    SELECT skill.id as id, skill.name as name, skill.category_id as category_id, t1.count as post_count FROM (SELECT skill_id, MAX(date_added) as date_added, COUNT(id) as count FROM skill_message GROUP BY skill_id) as t1, skill WHERE t1.skill_id = skill.id ORDER BY t1.date_added DESC
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
