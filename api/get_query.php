
<? //FILIP, LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Check conditions/Validation
  if (!empty($_REQUEST['search'])) {
    $search_keys = preg_split('/\s+/', $_REQUEST['search']);
    //......
  }else {
    $errors['search'] = "No search query";
  }


  foreach ($search_keys as $key => $value) {
    $result[] = DB::queryFirstField("SELECT name FROM skill WHERE soundex(name) like soundex(%s) AND name != %s",$value,$value);
  }

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Found matches';
    $data['result'] = $result;
  }

  //Return data
  echo json_encode($data);
?>
