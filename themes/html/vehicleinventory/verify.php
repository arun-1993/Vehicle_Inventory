<?php include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once('mail/login_credentials.php');
        
require_once('mail/vendor/autoload.php');?>

<?php 

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
 }
 
   $otp = generateRandomString(); // will generate a random password


?>
<?php 
    $email = @$_POST['Email'];
    $insertotp = $mysqli->prepare("INSERT INTO `email_verification` (`verification_mail`, `verification_token`) VALUES(?,?)");
    $insertotp->bind_param('ss',$email,$otp);
    $insertotp->execute();

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = @$_POST['Email'];
    
    
    if($email!=NULL){
        
        $msg = "Greetings, <br> Your password has been reset, new password is '$otp'. <br> Kindly, change your password once you login with generated password. <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
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
          ?>
  

<?php
          // echo "Mail has been sent successfully!";
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }
}
    else{

        $usernotexist = true;
    }






?>





<section class="login-form page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="section-title">
            <h2>Verify OTP </h2>
           <h2></h2>
           <div class="separator"></div>
         
        

         
</div>
      </div>
    </div>

     <!-- forgot password form start-->
    <form action="" method = "post">

      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
          <div class="gray-form clearfix">
          <div class="mb-3">
              <!-- <label class="form-label" for="email" name = 'otp'>Email</label> -->
              <input id="name" class="form-control" value  = "<?php echo @$_POST['Email'];?> "type="hidden" placeholder="Enter OTP Recived on mail" name="email">
            </div>
            <div class="mb-3">
              <label class="form-label" for="email" name = 'otp'>OTP</label>
              <input id="name" class="form-control" type="text" placeholder="Enter OTP Recived on mail" name="otp">
            </div>
            
            <div class="d-grid">
              <button name="submitotp"  class="button red btn-block">Verify OTP</button> 
            </div>
          </div>
        
        </div>
      </div>
    </form>
    <!-- forgot password form End-->
    </div>
  </section>
<?php 
    if(isset($_POST['submitotp']))
    {   $email=$_POST['email'];
        $selectotp = $mysqli->prepare('SELECT * FROM email_verification WHERE verification_mail=?');
        $selectotp->bind_param('s',$email);
        $selectotp->execute();
        $result1= $selectotp->get_result();
        $result = $result1->fetch_array();
        $OTP = $_POST['otp'];
        if($OTP ==$result['verification_token']){
            echo "<script>alert(1)</script>";
        }
        else{
            echo "<script>alert(0)</script>";
        }

    }

?>





























<?php include 'footer.php';

?>