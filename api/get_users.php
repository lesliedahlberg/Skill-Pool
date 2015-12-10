<? //LESLIE ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //Arrays
  $errors = array();
  $data = array();

  //Defaults
  $elements_per_page = 5;
  $offset = 0;
  $order_by = "id";
  $searching = false;
  $search_pieces = array();


  //Arguments
  if (!empty($_GET['search'])){
    $searching = true;
    $search = $_GET['search'];

    // split search string into array of strings
    $search_pieces = explode(" ", $search);

    // mysql select where IN needs comma separated array
    //$variables_imploded = implode(",",$search_pieces);

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
    /*
    $search_query_sql = "WHERE ";

    $i=0;
    foreach ($search as $keyword) {
      if($i>0){
        $search_query_sql .= " OR ";
      }
      $search_query_sql .= "t1.search LIKE '%$keyword%'";
      $i++;

    }*/

      $result = DB::query("SELECT * FROM user WHERE first_name IN ($search_pieces) OR last_name IN ($search_pieces)");



    /*$result = DB::query("
      SELECT
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
        FROM
        (
          SELECT
            t1.id as id
          FROM
            (
              SELECT
                user.id as id,
                CONCAT(
                  COALESCE(user.first_name,''),
                  ', ',
                  COALESCE(user.last_name,''),
                  ', ',
                  COALESCE(user.email,''),
                  ', ',
                  COALESCE(user.zip_code,''),
                  ', ',
                  COALESCE(user.city,''),
                  ', ',
                  COALESCE(user.country,''),
                  ', ',
                  COALESCE(GROUP_CONCAT(skill.name SEPARATOR ', '),'')
                ) as search
              FROM
                user_skill,
                user,
                skill
              WHERE
                user.id = user_skill.user_id AND
                user_skill.skill_id = skill.id
              GROUP BY
                user.id,
                user.first_name,
                user.last_name,
                user.email,
                user.zip_code,
                user.country,
                user.city
            ) AS t1 ".
          $search_query_sql
        .") as t2,
        user
      WHERE
      user.id = t2.id
    ");*/
    //
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
