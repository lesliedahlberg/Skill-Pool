<? //JONATHAN ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Check conditions/Validation
  if (empty($_POST['city']))
    $errors['city'] = 'City is required.';

  if (empty($_POST['zipCode']))
    $errors['zipCode'] = 'Zipcode is required.';

  if (empty($_POST['country']))
    $errors['country'] = 'Country is required.';

  //Write to db
  $username = "jln14010@student.mdh.se";
  DB::update('user', array(
      'zip_code' => $_POST['zipCode'],
      'city' => $_POST['city'],
      'country' => $_POST['country']
    ),'email=%s', $username);

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'New address added successfully!';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
