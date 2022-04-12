        <?php include 'header.php';
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        include_once('mail/login_credentials.php');

        require 'mail/vendor/autoload.php';?>
        <?php
        require_once '_dbconnect.php';

        if(isset($_SESSION['Loggedin'])==true){
        ?>
        <script>window.location = "index.php";</script>
        <?php
        }
        ?>


        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        if(isset($_POST['Username']) && isset($_POST['Firstname'])&&  isset($_POST['Lastname']) && isset($_POST['Password'])&& isset($_POST['Email']))
        {
        $firstname = $_POST["Firstname"];
        $lastname = $_POST["Lastname"];
        $email = $_POST["Email"];
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $confirmPassword = $_POST["confirmPassword"];
        $address = $_POST["Address"];
        $checkUsername = "SELECT * FROM `user` WHERE username = '$username'";
        $userexists =  mysqli_query($conn,$checkUsername);
        $checkUsermail = "SELECT * FROM `user` WHERE email = '$email'";
        $mailexists = mysqli_query($conn,$checkUsermail);


        if(mysqli_num_rows($userexists)>=1 || mysqli_num_rows($mailexists)>=1)
        {

        ?>
        <script> alert("Username or Email already exists, please try another one.");</script> 
        <?php

        }

        else
        {
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        if($password == $confirmPassword )
        { 
        $verified= "False";
        $role=3;
        $insertinfo = $mysqli->prepare("INSERT INTO `user` (`user_role_id`, `first_name`, `last_name`, `email`, `username`, `password`, `address`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertinfo->bind_param('issssss',$role,$firstname,$lastname,$email,$username,$hashedpassword,$address);
        $insertinfo->execute();

        $row = $insertinfo->get_result();



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

        $inserttoken = $mysqli->prepare("INSERT INTO email_verification(verification_mail,verification_token) VALUES(?,?)");
        $inserttoken->bind_param('ss',$email,$otp);
        $inserttoken->execute();

        if($email!=NULL){

        $msg = "Greetings, <br> Your verification OTP is '$otp'. <br> <a href='localhost/vehicle_inventory/themes/html/vehicleinventory/verify.php?username=$username'>Click Here</a> To verify <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.";
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
        $mail->Subject = ' Email Verification.';
        $mail->Body    = $msg;

        $mail->AltBody = '';
        $mail->send();
        header("Location:verify.php?username=$username&msg=sent");
        ?>



        <?php
        // echo "Mail has been sent successfully!";
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        }
        }


        else
        {

        ?>
        <script> alert("Password must match with confirm password");</script> 
        <?php

        }
        }
        }

        else
        {
        echo '<script>alert("Check missing fields")</script>';
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
        <form action="" method="post" id ="form">
        <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
        <div class="gray-form">
        <div class="row">
        <div class="mb-3 col-md-6">
        <label class="form-label">First Name*</label>
        <input class="form-control" type="text" placeholder="Your Name" name="Firstname" required>
        </div>
        <div class="mb-3 col-md-6">
        <label class="form-label">Last Name*</label>
        <input class="form-control" type="text" placeholder="Last Name" name="Lastname" required>
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label">Email *</label>
        <input  class="form-control" type="email" placeholder="Enter your email" name="Email" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Username* </label>
        <input  class="form-control" type="text" placeholder="Choose your user name" name="Username" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Password* </label>
        <input class="form-control" type="password" placeholder="Enter Password" id ="Password" name="Password" required>
        <span id ="error" style = "color:red"></span>
        </div>
        <div class="mb-3">
        <label class="form-label">Confirm Password*</label>
        <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword" required>
        </div>


        <label class="form-label">Address</label>
        <textarea class="form-control" placeholder="Enter your Address" name="Address" required></textarea>
        <br />
        <button type  = "submit" class="button red">Register an account</button>


        </form>
        <p class="link">Already have an account? please <a href="<?php echo $root;?>/login.php"> login here </a></p>
        </div>
        </div>
        </div>
        </div>
        </section>
        <!--=================================
        register-form-end  -->

        <script>

        var password = document.getElementById("Password");
        var form = document.getElementById("form");
        var errorElement = document.getElementById("error");
        form.addEventListener('submit', (e)=>{
        let message = [];
        if(password.value.length<8){
        message.push('Password must have minimum 8 characters')
        }
        if(message.length>0){
        e.preventDefault()
        errorElement.innerText = message.join(',')
        }
        })

        </script>



        <?php include 'footer.php';?>

        </body>
        </html>
