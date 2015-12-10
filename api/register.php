<? //ERIK ?>
<?
  session_start();
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";
  require_once '../lib/php/class.phpmailer.php';

  //Arrays
  $errors = array();
  $errors['email'] = null;
  $errors['pass'] = null;
  $errors['first_name'] = null;
  $errors['last_name'] = null;
  $errors['exists'] = null;
  $errors['mail'] = null;

  $data = array();

  //Variables
  $execquery = true;
  $result = null;
  $email = null;
  $pass = null;
  $first_name = null;
  $last_name = null;
  $success = false;
  $vericode = null;
  $to = null;


//  first_name last_name email pass

  //Check conditions/Validation
  if (empty($_REQUEST['email']))
  {
    $errors['email'] = 'Email is required.';
    $execquery = false;
  }
  else {
    $email = $_REQUEST['email'];
  }
  if (empty($_REQUEST['pass']))
  {
    $errors['pass'] = 'Password is required.';
    $execquery = false;
  }
  else {
    $pass = $_REQUEST['pass'];
  }
  if (empty($_REQUEST['first_name']))
  {
    $errors['first_name'] = 'First name is required.';
    $execquery = false;
  }
  else {
    $first_name = $_REQUEST['first_name'];
  }
  if (empty($_REQUEST['last_name']))
  {
    $errors['last_name'] = 'Last name is required.';
    $execquery = false;
  }
  else {
    $last_name = $_REQUEST['last_name'];
  }

  if(!$execquery) //If data not recieved exit
  {
    if (!empty($errors))
    {
    $data['success'] = $success;
    $data['errors']  = $errors;

    echo json_encode($data); //Return data
    die();
    }
  }

  //Check if email already registered return error if exists
  DB::query("SELECT * from user WHERE email=%s", $email);
  if( DB::count() > 0)
  {
    $data['success'] = $success;
    $errors['exists'] = "Email is already registered";
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  //Insert into DB, apperantly MeekroDB's errorhandler handles inserts errors
  DB::insert('user', array(
                      'email' => $email,
                      'hash' => md5($pass),
                      'verification_code' => md5($pass),
                      'first_name' => $first_name,
                      'last_name' => $last_name,
                      'status' => 0
  ));


  //Get verification_code in order to generate verification url
  $res = DB::queryFirstRow("SELECT verification_code from user WHERE email=%s", $email);

  $vericode = $res['verification_code'];

  $body = '

  Thanks for signing up!

  Please click this link to activate your account:
  http://127.0.0.1:8080/projects/skill-pool/verify.php?email='.$email.'&hash='.$vericode; // Our message above including the link

  $mail = new PHPMailer();

  //$mail->SMTPDebug = 1; //Use for getting debuginformation
  $mail->IsSMTP();
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
  $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
  $mail->Username   = "skillpoolswe@gmail.com";  // GMAIL username
  $mail->Password   = "rootroot";            // GMAIL password
  $mail->SetFrom('noreply@skillpool.se', 'mail-bot');
  $mail->Subject    = "Signup | Verification";
  $mail->MsgHTML($body);
  $address = $email;//"whoto@otherdomain.com";
  $mail->AddAddress($address);

  if(!$mail->Send()) { //Error handling
    $errors['mail'] = "Mailer error: " . $mail->ErrorInfo;
  } else {
  //  echo "Message sent!";
  }


  //Set return statement, everything OK if it came this long
  $success = true;
  $data['success'] = $success;
  $data['errors']  = $errors;

  //Return data
  echo json_encode($data);
  die();
?>
