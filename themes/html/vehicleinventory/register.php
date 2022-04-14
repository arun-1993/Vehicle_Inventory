<?php

include_once 'header.php';
include_once 'mail/login_credentials.php';
if (isset($_SESSION['Loggedin']) == true) {
 header("Location:$root/index.php");
}

require_once 'mail/vendor/autoload.php';
require_once '_dbconnect.php';

use PHPMailer\PHPMailer\PHPMailer;

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
 if (isset($_POST['Username']) && isset($_POST['Firstname']) && isset($_POST['Lastname']) && isset($_POST['Password']) && isset($_POST['Email'])) {
  $firstname       = $_POST["Firstname"];
  $lastname        = $_POST["Lastname"];
  $email           = $_POST["Email"];
  $username        = $_POST["Username"];
  $password        = $_POST["Password"];
  $confirmPassword = $_POST["confirmPassword"];
  $address         = $_POST["Address"];
  $checkUsername   = "SELECT * FROM `user` WHERE username = '$username'";
  $userexists      = mysqli_query($conn, $checkUsername);
  $checkUsermail   = "SELECT * FROM `user` WHERE email = '$email'";
  $mailexists      = mysqli_query($conn, $checkUsermail);

  if (mysqli_num_rows($userexists) >= 1 && mysqli_num_rows($mailexists) >= 1) {
   header("Location:$root/register.php?msg=invalidboth");

  } elseif (mysqli_num_rows($mailexists) >= 1) {
   header("Location:$root/register.php?msg=invalidmail");
  } elseif (mysqli_num_rows($userexists) >= 1) {

   header("Location:$root/register.php?msg=invalidusername");
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

     $msg  = "Greetings, <br> Your verification OTP is '$otp'. <br> <a href='localhost/vehicle_inventory/themes/html/vehicleinventory/verify.php?username=$username'>Click Here</a> To verify <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
     $mail = new PHPMailer(true);

     $subject = 'Email Verification';
     $content = $msg;
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
                            <?php if (isset($_GET['msg'])) {
 if ('invalidusername' == $_GET['msg']) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like this username is already taken please choose
                                another one!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
} elseif ('invalidusername' == $_GET['msg']) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like this email is already taken please choose
                                another one
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
} elseif ('invalidboth' == $_GET['msg']) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>OOPS!</strong> Seems like this username and mail is already taken please
                                choose
                                another one!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
}
}

?>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">First Name*</label>
                                <input class="form-control" type="text" placeholder="Your Name" id="Firstname"
                                    name="Firstname">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name*</label>
                                <input class="form-control" type="text" placeholder="Last Name" id="Lastname"
                                    name="Lastname">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input class="form-control" type="email" id="Email" placeholder="Enter your email"
                                name="Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username* </label>
                            <input class="form-control" type="text" placeholder="Choose your user name" id="Username"
                                name="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password* </label>
                            <input class="form-control" type="password" placeholder="Enter Password" id="Password"
                                name="Password">
                            <span id="error" style="color:red"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password*</label>
                            <input class="form-control" type="password" placeholder="Confirm Password"
                                name="confirmPassword">
                        </div>


                        <label class="form-label">Address</label>
                        <textarea class="form-control" id="Address" placeholder="Enter your Address"
                            name="Address"></textarea>
                        <br />
                        <button type="submit" class="button red">Register an account</button>


        </form>
        <p class="link">Already have an account? please <a href="<?php echo $root; ?>/login.php"> login here
            </a></p>
    </div>
    </div>
    </div>
    </div>
</section>




<?php include 'footer.php'; ?>
</body>

</html>