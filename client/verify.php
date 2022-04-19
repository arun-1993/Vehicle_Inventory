    <?php include 'header.php';
if (isset($_SESSION['Loggedin']) == true) {
 header("Location:$root/index.php");
}

$sent       = false;
$invalidotp = false;

if (isset($_GET['username']) & isset($_GET['msg'])) {
 if (null != $_GET['username'] & null != $_GET['msg']) {
  {
   $sent       = true;
   $username   = $_GET['username'];
   $mailselect = $mysqli->prepare("SELECT * FROM user where username=?");
   $mailselect->bind_param('s', $username);
   $mailselect->execute();
   $mail       = $mailselect->get_result();
   $mailresult = $mail->fetch_assoc();
   $email      = $mailresult['email'];
   $selectotp  = $mysqli->prepare('SELECT * FROM email_verification WHERE verification_mail=?');
   $selectotp->bind_param('s', $email);
   $selectotp->execute();
   $result1 = $selectotp->get_result();
   $result  = $result1->fetch_array();

   if (!$result) {
    header("Location:error-404.php");
    die;
   }

   if ("POST" == $_SERVER["REQUEST_METHOD"]) {

    @$OTP = $_POST['otp'];
    if ($OTP == $result['verification_token']) {
     $status      = "Verified";
     $setverified = $mysqli->prepare('UPDATE user set user_status= ? WHERE email=?');
     $setverified->bind_param('ss', $status, $email);
     $setverified->execute();
     if ($setverified->execute()) {
      $deleteused = $mysqli->prepare("DELETE FROM email_verification WHERE verification_mail = ?");
      $deleteused->bind_param('s', $email);
      $deleteused->execute();
     }
     header("Location:$root/login.php?request=verified");

    } else {
     $invalidotp = true;
    }
   }

  }
 } else {
  header("Location:$root/error-404.php");
 }
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
            <form action="" method="post">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="gray-form clearfix">


                            <?php if (true == $sent && false == $invalidotp) {
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>OTP</strong> Sent successfully!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
}
if (true == $invalidotp) {
 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>OTP</strong> is invalid!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
} ?>
                            <div class="mb-3">
                                <label class="form-label" for="email" name='otp'>OTP</label>
                                <input id="name" class="form-control" type="password"
                                    placeholder="Enter OTP Recived on mail" name="otp" minlength="5" maxlength="5"
                                    required>
                            </div>

                            <div class="d-grid">
                                <button name="submitotp" class="button red btn-block">Verify OTP</button>
                            </div>
                            <span>didn't recived OTP <a
                                    href="<?php echo $root; ?>/regenerateotp.php?username=<?php echo $username; ?>"
                                    style="color:blue">click here to generate again</a></span>
                        </div>

                    </div>
                </div>
            </form>
            <!-- forgot password form End-->
        </div>
    </section>


    <?php include 'footer.php';

?>