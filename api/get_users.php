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

  if(!empty($_REQUEST['per_page'])){
    $elements_per_page = $_REQUEST['per_page'];
  }



  //Arguments
  if (!empty($_GET['all'])) {
    $result = DB::query("SELECT * FROM user");
    //Set return statement
    if (!empty($errors)) {
      $data['success'] = false;
      $data['errors']  = $errors;
    } else {
      $data['success'] = true;
      $data['message'] = 'Users retrieved!';
      $data['result'] = $result;
    }
    //Return data and die
    echo json_encode($data);
    die();

  }

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
    $sql = "SELECT
               t1.id,
               t1.email,
               t1.first_name,
               t1.last_name,
               t1.registration_date,
               t1.photo_link,
               t1.title,
               t1.city,
               t1.country,
               t1.zip_code,
               t1.telephone,
               t1.homepage,
               GROUP_CONCAT(t1.skill_name SEPARATOR ', ') as skills
    FROM
     (SELECT DISTINCT
                    user.id as id,
                    user.email as email,
                    user.first_name as first_name,
                    user.last_name as last_name,
                    user.registration_date as registration_date,
                    user.photo_link as photo_link,
                    user.title as title,
                    user.city as city,
                    user.country as country,
                    user.zip_code as zip_code,
                    user.telephone as telephone,
                    user.homepage as homepage,
                    skill.name as skill_name,
                    skill.id as skill_id

                          FROM user
                          LEFT JOIN user_skill
                          ON user.id=user_skill.user_id
                          LEFT JOIN skill
                          ON skill.id=user_skill.skill_id";

      if($searching == true ){
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
      }

      $sql .= ") as t1 GROUP BY
     t1.id,
     t1.email,
     t1.first_name,
     t1.last_name,
     t1.registration_date,
     t1.photo_link,
     t1.title,
     t1.city,
     t1.country,
     t1.zip_code,
     t1.telephone,
     t1.homepage LIMIT $offset, $elements_per_page";


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
