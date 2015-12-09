<? //FILIP ?>
<?
  //DB login
  require_once "../inc/session.php";
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_REQUEST['skill']))
    $errors['skill'] = 'Skill name is required.';

  if (empty($_REQUEST['selectedcategory']))
    $errors['text'] = 'Category for skill is required.';

  $skill_name = $_REQUEST['skill'];
  $category_name = $_REQUEST['selectedcategory'];

  //Get data from DB
  $skill_id = DB::queryFirstRow("SELECT * FROM skill WHERE name = %s",$skill_name);
  $category_id = DB::queryFirstRow("SELECT * FROM category WHERE name = %s",$category_name);

  if (empty($errors)) {
    if($category_id != NULL){

      if($skill_id['id'] == NULL) {
        //Write to db
        DB::insert('skill', array(
          'category_id' => $category_id['id'],
          'name' => $_REQUEST['skill']
        ));

        $skill_id = DB::queryFirstRow("SELECT LAST_INSERT_ID()");

      }

      $user_has_skill = DB::queryFirstRow("SELECT * from user_skill WHERE skill_id=%i AND user_id=%i",$skill_id['id'], $_SESSION['id']);

      if($user_has_skill == NULL) {
        DB::insert('user_skill', array(
          'skill_id' => $skill_id['id'],
          'user_id' => $_SESSION['id']
        ));
      }

    }else{
      $errors['category_id'] = "Category required!";
    }
  }



  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Success!';
  }

  //Return data
  echo json_encode($data);
?>
