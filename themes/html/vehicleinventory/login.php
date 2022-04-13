          <?php include 'header.php';?>


          <?php
$usernotexist        = false;
$missmatchedpassword = false;
$notverified         = false;

if ("POST" == $_SERVER["REQUEST_METHOD"]) {

          $username = $_POST["username"];
          $password = $_POST["password"];

          $selectuserquery = $mysqli->prepare("SELECT * FROM `user` WHERE username = '$username' or email = '$username' AND  user_role_id = 3");
          $selectuserquery->execute();
          $result = $selectuserquery->get_result();
          $number = mysqli_num_rows($result); // fetches number of row in result
          if (1 == $number) {
                    while ($row = mysqli_fetch_assoc($result)) {
                              if ('Verified' == $row['user_status']) {
                                        if (password_verify($password, $row['password'])) {

                                                  $_SESSION['Loggedin'] = true;
                                                  $_SESSION['Username'] = $row['username'];
                                                  $_SESSION['userid']   = $row['user_id'];
                                                  $_SESSION['email']    = $row['email'];
                                                  $_SESSION['name']     = $row['first_name'] . ' ' . $row['last_name'];
                                                  ?>

          <script>
          <?php if (isset($_GET['loc'])): ?>
          window.location= "<?php echo $_GET['loc']; ?>";
          <?php else: ?>
          window.location= "index.php";
          <?php endif;?>
          </script>

          <?php

                                        } else {
                                                  $missmatchedpassword = true;
                                                  ?>
          <?php

                                        }
                              } else {
                                        $notverified = true;
                              }
                    }
          } else {

                    $usernotexist = true;
                    ?>
          <?php

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
          </div><?php if (true == $usernotexist) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <strong>OOPS!</strong> Seems like You are not registerd with us!
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
}?>
          <?php if (true == $missmatchedpassword) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <strong>OOPS!</strong> Invalid Credentials, please verify them and retry.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
}?>
          <?php if (true == $notverified) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <strong>OOPS!</strong> Seems like you have not verified yor mail yet !
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
}?>

          </div>
          </div>
          </div>
          <form action="" method = "post" id="loginform">

          <div class="row justify-content-center">
          <div class="col-lg-6 col-md-12">
          <div class="gray-form clearfix">
          <div class="mb-3">
          <label class="form-label" for="name">Username* </label>
          <input id="name" class="form-control" type="text" placeholder="Username" name="username" required>
          </div>
          <div class="mb-3">
          <label class="form-label" for="Password">Password* </label>
          <input id="Password" class="form-control" type="password" placeholder="Password" name="password" required>
          </div>

          <div class="d-grid">
          <input type="submit" class="button red"  placeholder="Log in" style = "background:red">
          </div>
          </div>



          </form>

          <div class = "flex" style = "padding-top:1rem">
          <p class="link" style = "text-align:center;font-size:1rem"> <a href="<?php echo $root; ?>/forgotpassword.php"><strong> Forgot password?</strong> </a></p>
          </div>
          <div>
          <p class="link">Haven't Register with us? please <a href="<?php echo $root; ?>/register.php"> Register here </a></p>
          </div>
          </div>
          </div>
          </div>
          </section>

          <!--=================================
          login-form-end  -->
          <?php include 'footer.php';?>
          </body>
          </html>
