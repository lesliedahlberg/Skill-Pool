<? //FILIP ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_POST['skill']))
    $errors['skill'] = 'Skill name is required.';

  if (empty($_POST['selectedcategory']))
    $errors['text'] = 'Category for skill is required.';



  // NÅGOT BLIR FEL HÄR - Den verkar inte få över ngt från Post
  $category_name = $_POST['selectedcategory'];



  //Get data from DB
  $category_id = DB::queryOneField('id', "SELECT category.id FROM category WHERE category.name=%s", '$category_name');

  //Write to db
  DB::insert('skill', array(
    'category_id' => $category_id,
    'name' => $_POST['skill']
  ));


  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Post added successfully!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
