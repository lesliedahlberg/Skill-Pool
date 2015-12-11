<? //FILIP ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //variables
  $errors = array();
  $data = array();
  $skills_in_category = array();
  $category_id = 0;

  //Arguments
  if (!empty($_REQUEST['category_id'])){
    $category_id = $_REQUEST['category_id'];
  }

  //Check conditions/Validation
  if (empty($_REQUEST['category_id']))
    $errors['category_id'] = 'Category is required.';

  // Check if category exists
  $category_existing = DB::query("SELECT * FROM category WHERE category.id=%i", $_REQUEST['category_id']);
  if(DB::count() == 0)
  {
    $errors['exists'] = "Category doesn't exist or is already deleted";
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // look for skills in category to delete
  $skills_in_category = DB::query("SELECT * FROM skill WHERE skill.category_id = %i", $category_id);
  if(DB::count() > 0)
  {
    $errors['exists'] = "Category contains skills, please delete them first";
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // Delte from db
  DB::delete('category', "id=%s", $_REQUEST['category_id']);

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
