<?php
include 'header.php';

if (isset($_SESSION['Loggedin'])) {
 header("Location:$root/index.php");
}

$usernotexist        = false;
$missmatchedpassword = false;
$notverified         = false;

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
 $username = $_POST["username"];
 $password = $_POST["password"];

 $selectuserquery = $mysqli->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
 $selectuserquery->bind_param('ss', $username, $username);
 $selectuserquery->execute();
 $result = $selectuserquery->get_result();
 $number = mysqli_num_rows($result); // fetches number of row in result

 if (1 == $number) {
  while ($row = mysqli_fetch_assoc($result)) {
   if ('Verified' == $row['user_status']) {
    if (3 != $row['user_role_id']) {
     header('HTTP/1.1 307 Temporary Redirect');
     header("Location: $root/../admin/");
    } elseif (password_verify($password, $row['password'])) {
     $_SESSION['Loggedin'] = true;
     $_SESSION['Username'] = $row['username'];
     $_SESSION['userid']   = $row['user_id'];
     $_SESSION['email']    = $row['email'];
     $_SESSION['name']     = $row['first_name'] . ' ' . $row['last_name'];

     if (isset($_GET['loc'])) {
      header("Location: " . $_GET['loc']);
     } else {
      header("Location: index.php");
     }
    } else {
     $missmatchedpassword = true;
    }
   } else {
    $notverified = true;
   }
  }
 } else {
  $usernotexist = true;
 }
}

?>

<!--=================================
login-form-start  -->

<section class="login-form page-section-ptb" style="background-color:white;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">

                    <h2>Login To Your Account</h2>
                    <div class="separator"></div>
                </div>
                <?php if (true == $usernotexist): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> Seems like You are not registerd with us!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                <?php elseif (true == $missmatchedpassword): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> Invalid Credentials, please verify them and retry.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                <?php elseif (true == $notverified): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> Seems like you have not verified yor mail yet !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                <?php endif; ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <form action="" method="post" id="loginform">
                    <div class="gray-form clearfix">
                        <?php if (isset($_GET['request'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php if ('verified' == $_GET['request']): ?>
                            <strong>YAY!</strong> You have been verified! Please login to continue.
                            <?php elseif ('reset' == $_GET['request']): ?>
                            <strong>YAY!</strong> Your password has been reset successfully!<br />Please check your
                            email for your new password
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label class="form-label" for="name">Username* </label>
                            <input id="name" class="form-control" type="text" placeholder="Username" name="username"
                                minlength="4" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Password">Password* </label>
                            <input id="Password" class="form-control" type="password" placeholder="Password"
                                minlength="8" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="button red" style="background:red">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex" style="padding-top:1rem">
                <p class="link" style="text-align:center;font-size:1rem"> <a
                        href="<?=$root; ?>/forgotpassword.php"><strong> Forgot password?</strong> </a></p>
            </div>
            <div>
                <p class="link text-center">Haven't Registered with us? please <a href="<?=$root; ?>/register.php">
                        Register here </a></p>
            </div>
        </div>
    </div>
</section>

<!--=================================
login-form-end  -->
<?php include 'footer.php'; ?>
</body>

</html>