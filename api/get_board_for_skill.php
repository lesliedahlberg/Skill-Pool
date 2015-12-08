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
    SELECT skill_id, user_id, date_added, message, skill_message.title, email, first_name, last_name, registration_date, photo_link, user.title, city, zip_code, country, telephone, homepage, about_me FROM skill_message LEFT JOIN user ON skill_message.user_id = user.id WHERE skill_id = %i ORDER BY date_added DESC
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
