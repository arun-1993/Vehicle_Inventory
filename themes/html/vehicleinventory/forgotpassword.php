<?php include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once('mail/login_credentials.php');
        
require_once('mail/vendor/autoload.php');
 ?>
 <?php 
  if(isset($_SESSION['Loggedin'])==true){ // will redirect to home is user is logged in already
    ?>
    <script>window.location = "index.php"; </script> 
    <?php
  }

?>


<?php 

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
 }
 
   $newpassword = generateRandomString(); // will generate a random password


?>
<?php $usernotexist = false;?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $selectuserquery = "SELECT count(email) as num FROM user where email = '$email' and user_role_id = 3 ";
    
    $executequery = mysqli_query($conn,$selectuserquery);
    $row = mysqli_fetch_assoc($executequery);
    
    if($row['num']==1){
        $hashedpassword = password_hash($newpassword,PASSWORD_DEFAULT);

        $queryupdate = "UPDATE user SET password = '$hashedpassword' WHERE email = '$email'" ;
        if(mysqli_query($conn,$queryupdate)){
        $msg = "Greetings, <br> Your password has been reset, new password is '$newpassword'. <br> Kindly, change your password once you login with generated password. <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
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
  <script>alert('Your new password sent to your registered email. Kindly, check your inbox or spam folder.');
window.location = "index.php";</script>

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


}


?>
<section class="login-form page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="section-title">
           
           <h2>Forgot Password?</h2>
           <div class="separator"></div>
         </div><?php if($usernotexist==true){ echo '<div class="alert alert-danger" role="alert">
  <strong>OOPS!</strong> Seems like You are not registerd with us!
  
</div>';
         } ?>

         
</div>
      </div>
    </div>

     <!-- forgot password form start-->
    <form action="" method = "post">

      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
          <div class="gray-form clearfix">
            <div class="mb-3">
              <label class="form-label" for="email">Email* </label>
              <input id="name" class="form-control" type="text" placeholder="Enter registered Email" name="email">
            </div>
            
            <div class="d-grid">
              <button  class="button red btn-block">Reset Password</button> 
            </div>
          </div>
        
        </div>
      </div>
    </form>
    <!-- forgot password form End-->
    </div>
  </section>
