<? //ERIK ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";
  require_once '../lib/php/class.phpmailer.php';

  //Change this depending on your host (Just change port for localhost)
  $host = '127.0.0.1:8080';

  //Arrays
  $data = array();
  $success = false;
  $error = "GET not set";

  if(isset($_GET))
  {
    if(isset($_GET['email']))
    {
      $email = $_GET['email'];

      $result = DB::queryFirstRow("SELECT verification_code FROM user WHERE email=%s", $email);
      $count = DB::count();

      if($count == 0)
      {
        //$error = "Email or hash invalid";
        $error = "Email invalid. ";
        $success = false;
      }
      else {

        $error = null;

        $vericode = $result['verification_code'];

        $body = '

        Please click this link to enter a new password for your account:
        http://'.$host.'/projects/skill-pool/change_password.php?email='.$email.'&hash='.$vericode; // Our message above including the link

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
          $error += "Mailer error: " . $mail->ErrorInfo;
          $success = false;
        } else {
          $success = true;
        }
      }
    }
  }

  $data['error'] = $error;
  $data['success'] = $success;

  //Return data
  echo json_encode($data);
?>
