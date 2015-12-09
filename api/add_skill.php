<? //FILIP ?>
<?
  //DB login
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



  // NÅGOT BLIR FEL HÄR - Den verkar inte få över ngt från Post
  $category_name = $_REQUEST['selectedcategory'];

  //Get data from DB
  $category_id = DB::queryFirstRow("SELECT * FROM category WHERE name = %s",$category_name);


  if (empty($errors)) {
    if($category_id != NULL){
      //Write to db
      DB::insert('skill', array(
        'category_id' => $category_id['id'],
        'name' => $_REQUEST['skill']
      ));
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
    $data['message'] = 'Post added successfully!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
