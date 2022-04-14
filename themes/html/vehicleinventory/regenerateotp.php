        <?php include 'header.php';
if (isset($_SESSION['Loggedin']) == true) {
 header("Location:$root/index.php");
}

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
include_once 'mail/login_credentials.php';

require 'mail/vendor/autoload.php';
if (isset($_GET['username'])) {
 $username   = $_GET['username'];
 $mailselect = $mysqli->prepare("SELECT * FROM user where username=?");
 $mailselect->bind_param('s', $username);
 $mailselect->execute();
 $mail       = $mailselect->get_result();
 $mailresult = $mail->fetch_assoc();
 $email      = $mailresult['email'];
 function generateRandomString($length = 5)
 {
  $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString     = '';
  for ($i = 0; $i < $length; $i++) {
   $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
 }

 $otp = generateRandomString(); // will generate a random password

 $inserttoken = $mysqli->prepare("UPDATE email_verification SET verification_token=? WHERE verification_mail=?");
 $inserttoken->bind_param('ss', $otp, $email);
 $inserttoken->execute();
 if (null != $email) {

  $msg  = "Greetings, <br> Your verification OTP is '$otp'. <br> <a href='localhost/vehicle_inventory/themes/html/vehicleinventory/verify.php?username= $username'>Click Here</a> To verify <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
  $mail = new PHPMailer(true);

  try {
   $mail->SMTPDebug = 0;
   $mail->isSMTP();
   $mail->Host       = 'smtp.gmail.com;';
   $mail->SMTPAuth   = true;
   $mail->Username   = Username;
   $mail->Password   = Password;
   $mail->SMTPSecure = 'tls';
   $mail->Port       = 587;

   $mail->setFrom('info.autotrackinida@gmail.com', 'AutoTrack');
   $mail->addAddress($email);
   $mail->addAddress('arun0306.r@gmail.com');
   $mail->addAddress('jitendrabhavsar469@gmail.com');
   $mail->addAddress('riyavora16@gmail.com');

   $mail->isHTML(true);
   $mail->Subject = ' Password has been reset successfully.';
   $mail->Body    = $msg;

   $mail->AltBody = '';
   $mail->send();

   header("Location:verify.php?username=$username&msg=success");
   ?>


        <?php
// echo "Mail has been sent successfully!";
  } catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

 }
}
?>