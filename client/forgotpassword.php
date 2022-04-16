<?php
include 'header.php';

if (isset($_SESSION['Loggedin']) == true) {; // will redirect to home is user is logged in already
    header("Location: index.php");
}

$newpassword = createPassword(10);

$usernotexist = false;

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    $email           = $_POST['email'];
    $selectuserquery = "SELECT count(email) as num FROM user where email = '$email' and user_role_id = 3 ";

    $executequery = mysqli_query($conn, $selectuserquery);
    $row          = mysqli_fetch_assoc($executequery);

    if (1 == $row['num']) {
        $hashedpassword = password_hash($newpassword, PASSWORD_DEFAULT);

        $queryupdate = "UPDATE user SET password = '$hashedpassword' WHERE email = '$email'";
        if (mysqli_query($conn, $queryupdate)) {
            $sub = 'Password reset';
            $msg = "Greetings, <br> Your password has been reset, new password is '$newpassword'. <br> Kindly, change your password once you login with generated password. <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
            sendMail($sub, $msg, $email);

            header("Location: login.php?request=reset");
        }
    } else {
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
                </div>
                <?php if (true == $usernotexist): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>OOPS!</strong> Seems like You are not registerd with us!
                </div>';
                <?php endif;?>

            </div>
        </div>
    </div>

    <!-- forgot password form start-->
    <form action="" method="post">

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="gray-form clearfix">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email* </label>
                        <input id="name" class="form-control" type="mail" placeholder="Enter registered Email"
                            name="email" required>
                    </div>

                    <div class="d-grid">
                        <button class="button red btn-block">Reset Password</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <!-- forgot password form End-->
    </div>
</section>