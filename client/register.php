<?php

include_once 'header.php';

$msg = null;

if (isset($_SESSION['Loggedin'])) {
 header("Location:$root/index.php");
}

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
 if (isset($_POST['Username']) && isset($_POST['Firstname']) && isset($_POST['Lastname']) && isset($_POST['Password']) && isset($_POST['Email'])) {
  $firstname       = $_POST["Firstname"];
  $lastname        = $_POST["Lastname"];
  $email           = $_POST["Email"];
  $username        = $_POST["Username"];
  $password        = $_POST["Password"];
  $confirmPassword = $_POST["confirmPassword"];
  $address         = $_POST["Address"];
  $checkUsername   = "SELECT * FROM `user` WHERE username  LIKE   '$username'";
  $userexists      = mysqli_query($conn, $checkUsername);
  $checkUsermail   = "SELECT * FROM `user` WHERE email  LIKE   '$email'";
  $mailexists      = mysqli_query($conn, $checkUsermail);

  if (mysqli_num_rows($userexists) >= 1 && mysqli_num_rows($mailexists) >= 1) {
   $msg = 'invalidboth';
  } elseif (mysqli_num_rows($mailexists) >= 1) {
   $msg = 'invalidmail';
  } elseif (mysqli_num_rows($userexists) >= 1) {
   $msg = 'invalidusername';
  } else {
   $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

   if ($password == $confirmPassword) {
    $verified   = "False";
    $role       = 3;
    $insertinfo = $mysqli->prepare("INSERT INTO `user` (`user_role_id`, `first_name`, `last_name`, `email`, `username`, `password`, `address`)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insertinfo->bind_param('issssss', $role, $firstname, $lastname, $email, $username, $hashedpassword, $address);
    $insertinfo->execute();

    $row = $insertinfo->get_result();

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

    $inserttoken = $mysqli->prepare("INSERT INTO email_verification(verification_mail,verification_token) VALUES(?,?)");
    $inserttoken->bind_param('ss', $email, $otp);
    $inserttoken->execute();

    if (null != $email) {

     $subject = 'Email Verification';
     $content = "Greetings, <br> Your verification OTP is '$otp'. <br> <a href='$root/verify.php?username=$username'>Click Here</a> To verify <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
     sendMail($subject, $content);
     header("Location:verify.php?username=$username&msg=sent");
    }
   }
  }
 }
}

?>

<!--=================================
        inner-intro -->

<!--=================================
        inner-intro -->

<!--=================================
        register-form-start  -->

<section class="register-form page-section-ptb" style="background-color:white;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="section-title">
                    <h2>Register With Us</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <form action="" method="post" id="form">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="gray-form">
                        <div class="row">
                            <?php if (!is_null($msg)): ?>
                            <?php if ('invalidusername' == $msg): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like this username is already taken please choose
                                another one!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php elseif ('invalidmail' == $msg): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like this email is already taken please choose
                                another one
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php elseif ('invalidboth' == $msg): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like this username and mail is already taken please
                                choose
                                another one!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">First Name*</label>
                                <input class="form-control" type="text" placeholder="Your Name" id="Firstname"
                                    name="Firstname" value="<?=@$firstname; ?>" minlength="2" maxlength="20" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name*</label>
                                <input class="form-control" type="text" placeholder="Last Name" id="Lastname"
                                    name="Lastname" value="<?=@$lastname; ?>" minlength="2" maxlength="20" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input class="form-control" type="email" id="Email" placeholder="Enter your email"
                                name="Email" value="<?=@$email; ?>" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username* </label>
                            <input class="form-control" type="text" placeholder="Choose your user name" id="Username"
                                name="Username" value="<?=@$username; ?>" minlength="4" maxlength="20" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password* </label>
                            <input class="form-control" type="password" placeholder="Enter Password" id="Password"
                                name="Password" minlength="8" required>
                            <span id="error" style="color:red"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password*</label>
                            <input class="form-control" type="password" placeholder="Confirm Password"
                                name="confirmPassword" minlength="8">
                        </div>


                        <label class="form-label">Address</label>
                        <textarea class="form-control" id="Address" placeholder="Enter your Address" name="Address"
                            minlength="5" maxlength="65535"><?=@$address; ?></textarea>
                        <br />
                        <button type="submit" class="button red">Register an account</button>
                    </div>
                    <p class="link text-center">
                        Already have an account?
                        Please <a href="<?=$root; ?>/login.php">login here</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>

</html>