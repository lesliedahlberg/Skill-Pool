<? //JONATHAN ?>
<?
session_start();
//DB login
require_once '../lib/php/meekrodb.class.php';
require_once "../inc/db_credentials.php";

//Arrays
$errors = array();
$data = array();
$data = json_decode(file_get_contents("php://input"));
echo json_encode($data);
//Check conditions/Validation
if (empty($_FILES)){
  $errors['photo'] = 'Photo is required.';
}
//Set return statement
if (!empty($errors)) {
  $data['success'] = false;
  $data['errors']  = $errors;
} else {
  $data['success'] = true;
  $data['message'] = 'Photo added successfully!';
  $data['result'] = $result;
  //write to db
  //change to session['email']
}

//Return data
echo json_encode($data);

?>
