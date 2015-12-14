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
    //$search = urlencode($_GET['search']);
    $search = $_GET['search'];

    // split search string into array of strings
    $search_pieces = preg_split('/\s+/', $search);

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

      $sql = "SELECT DISTINCT
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
                            user.telephone,
                            user.homepage
                            FROM user
                            LEFT JOIN user_skill
                            ON user.id=user_skill.user_id
                            LEFT JOIN skill
                            ON skill.id=user_skill.skill_id";

        $sql .= " WHERE ";
        $i = 0;
        foreach ($search_pieces as $value) {
          if($i != 0){
            $sql .= " OR ";
          }
          $sql .= "skill.name LIKE '%".$value."%' OR
                    user.first_name LIKE '%".$value."%' OR
                    user.last_name  LIKE '%".$value."%' OR
                    user.title  LIKE '%".$value."%' OR
                    user.city  LIKE '%".$value."%' OR
                    user.country  LIKE '%".$value."%' OR
                    user.zip_code LIKE '%".$value."%' OR
                    user.telephone LIKE '%".$value."%' OR
                    user.homepage LIKE '%".$value."%'
                    ";
          $i++;
        }

        $data['sql'] = $sql;


        $result = DB::query($sql);

      /*$result = DB::query("SELECT DISTINCT
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
                            user.homepage
                            FROM user
                            LEFT JOIN user_skill
                            ON user.id=user_skill.user_id
                            LEFT JOIN skill
                            ON skill.id=user_skill.skill_id
                            WHERE skill.name LIKE %ls OR user.first_name IN %ls
                            OR user.last_name IN %ls", $search_pieces, $search_pieces, $search_pieces);*/

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
