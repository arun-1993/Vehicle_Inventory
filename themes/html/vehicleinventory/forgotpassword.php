<?php include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once('mail/login_credentials.php');
        
require_once('mail/vendor/autoload.php');
 ?>
 <?php 
  if(isset($_SESSION['Loggedin'])==true){
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
 
   $newpassword = generateRandomString();


?>
<?php $usernotexist = false;?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $query = "SELECT count(email) as num FROM user where email = '$email' and user_role_id = 3 ";
    
    $executequery = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($executequery);
    
    if($row['num']==1){
        $hashedpassword = password_hash($newpassword,PASSWORD_DEFAULT);

        $queryupdate = "UPDATE user SET password = '$hashedpassword' WHERE email = '$email'" ;
        if(mysqli_query($conn,$queryupdate)){
        $msg = "Your has been reset <br> new password is '$newpassword' ";
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
          $mail->Subject = 'Password Resetted';
          $mail->Body    = $msg;
          
          $mail->AltBody = 'Body in plain text for non-HTML mail clients';
          $mail->send();
          ?>
  <script>alert('password has been changed check your inbox or spam folder');
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
  <strong>OOPS!</strong> Seems like You are not registerd with us
  
</div>';
         } ?>

         
</div>
      </div>
    </div>
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
    </div>
  </section>
