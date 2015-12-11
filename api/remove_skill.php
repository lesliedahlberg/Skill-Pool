<? //FILIP ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //variables
  $errors = array();
  $data = array();
  $skill_existing = array();
  $skill_related_to_user = array();
  $skill_id = 0;

  //Arguments
  if (!empty($_REQUEST['skill_id'])){
    $skill_id = $_REQUEST['skill_id'];
  }

  //Check conditions/Validation
  if (empty($_REQUEST['skill_id'])) {
    $errors['skill_id'] = 'Skill is required.';
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // Check if skill exists
  $skill_existing = DB::query("SELECT * FROM skill WHERE skill.id=%i", $_REQUEST['skill_id']);
  if(DB::count() == 0)
  {
    $errors['exists'] = "Skill doesn't exist or is already deleted";
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // look for matches in relation database user_skill
  $skill_related_to_user = DB::query("SELECT * FROM user_skill WHERE user_skill.skill_id = %i", $skill_id);
  if(DB::count() > 0)
  {
    $errors['exists'] = "Some users has this skill, unable to delete"; // perhaps return a list of these users here
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // Delte from db
  DB::delete('skill', "id=%s", $_REQUEST['skill_id']);

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
