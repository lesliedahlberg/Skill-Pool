<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Defaults
  $elements_per_page = 8;
  $offset = 0;
  $order_by = "id";
  $searching = false;
  $search_pieces = array();

  //Arguments
  if (!empty($_GET['search'])){
    $searching = true;
    $search = urlencode($_GET['search']);

    // split search string into array of strings
    $search_pieces = explode(" ", $search);

  }

  if (!isset($search_pieces)){
    $errors['search_variables'] = "Nothing to search for";
  }

  if (!empty($_GET['page'])){
    $page = $_GET['page'];
    $offset = ($page-1)*$elements_per_page;
    if($offset<1 || !is_numeric($offset))
      $offset = 0;
  }


  //Get data from DB
  if($searching == true){

      $result = DB::query("SELECT DISTINCT
                            user.id,
                            user.email,
                            user.first_name,
                            user.last_name,
                            user.registration_date,
                            user.photo_link,
                            user.title,
                            user.city,
                            user.country,
                            user.zip_code,
                            user.status,
                            user.telephone,
                            user.homepage,
                            user.about_me
                            FROM user
                            RIGHT JOIN user_skill
                            ON user.id=user_skill.user_id
                            RIGHT JOIN skill
                            ON skill.id=user_skill.skill_id
                            WHERE skill.name IN %ls OR user.first_name IN %ls
                            OR user.last_name IN %ls", $search_pieces, $search_pieces, $search_pieces);

  }else{
    // If not searching, just show all users
    $result = DB::query("SELECT * FROM user LIMIT %i, %i", $offset, $elements_per_page);
  }


  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;

  } else {
    $data['success'] = true;
    $data['message'] = 'Users retrieved!';
    $data['result'] = $result;

  }

  //Return data
  echo json_encode($data);
?>
