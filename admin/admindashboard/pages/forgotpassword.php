

<?php

include_once 'header.php';
$nocredentials = false;

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    $email    = $_POST["email"];
    $username = $_POST["username"];

    $password       = createPassword(10);
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    $query = $mysqli->prepare("UPDATE user SET password = ? WHERE email = ? AND username = ? AND user_role_id IN (1,2)");
    $query->bind_param('sss', $hashedpassword, $email, $username);
    $result = $query->execute();

    if (mysqli_affected_rows($mysqli) == 0) {
        $nocredentials = true;
    } else {
        $subject = 'Password reset';
        $content = "Greetings,<br />Your new password is $password <br>";
        sendMail($subject, $content);
        header("Location: login.php");
    }
}

?>

    <div class="page">
        <div class="page-single">
            <div class="p-5">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="card-group mb-0">
                                    <div class="card p-4 page-content mt-0">
                                        <div class="card-body page-single-content">
                                            <div class="w-100">
                                                <div class="">
                                                    <h1 class="mb-2">Reset Password</h1>
                                                    <p class="text-muted">Enter your account email and username</p>
                                                </div>
                                                <?php if (true == $nocredentials): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×</button>
                                                    Invalid Username or mail!
                                                </div>
                                                <?php endif;?>
                                                <form action="" method="post">

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon"><svg class="svg-icon"
                                                                xmlns="http://www.w3.org/2000/svg" height="24"
                                                                viewBox="0 0 24 24" width="24">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z"
                                                                    opacity=".3" />
                                                                <circle cx="12" cy="8" opacity=".3" r="2" />
                                                                <path
                                                                    d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control" placeholder="Email"
                                                            name="email" required>
                                                    </div>
                                                    <div class="input-group mb-4">
                                                        <span class="input-group-addon"><svg class="svg-icon"
                                                                xmlns="http://www.w3.org/2000/svg" height="24"
                                                                viewBox="0 0 24 24" width="24">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z"
                                                                    opacity=".3" />
                                                                <circle cx="12" cy="8" opacity=".3" r="2" />
                                                                <path
                                                                    d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" />
                                                            </svg></span>
                                                        <input type="text" class="form-control" placeholder="Username"
                                                            name="username" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-lg btn-primary btn-block"
                                                                onclick="return forgotpassword();">Reset
                                                                Password</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                    <div class="card-body text-center justify-content-center page-single-content">
                                        <img src="<?=$root;?>/../public/assets/images/pattern/login.png" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center pt-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery js-->
    <script>
        function forgotpassword() {
            var dialog =
            "A new generated password will be sent to your email. Kindly, change your password once you login with generated password.";
            var check = confirm(dialog);
            return check;
        }
        </script>



<?php include 'footer.php';?>