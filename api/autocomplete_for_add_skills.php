<? //FILIP ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Check conditions/Validation
  if (!empty($_REQUEST['search'])) {
    $search_keys = preg_split('/\s+/', $_REQUEST['search']);

    $query_add_on = " WHERE ";
    foreach ($search_keys as $key => $value) {
      if($key > 0){
        $query_add_on .= " OR ";
      }
      $query_add_on .= "(CONVERT(`name` USING utf8) LIKE '%" . $value . "%')";
    }
  }else {
    $errors['search'] = "No search query";
  }



  $result = DB::query("SELECT *  FROM `skill`".$query_add_on);




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
