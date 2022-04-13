<?php

include 'header.php';

$usernotexist = false; 
$missmatchedpassword = false;
$notverified = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $username = $_POST["username"];
    $password = $_POST["password"]; 


    $selectuserquery = $mysqli->prepare("SELECT * FROM user WHERE username = '$username' OR email = '$username'");
    $selectuserquery->execute();
    $result = $selectuserquery->get_result();
    $number = mysqli_num_rows($result); // fetches number of row in result
    if($number==1)
    { 
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['user_status']=='Verified')
            {
                if($row['user_role_id'] == 3)
                {
                    header('HTTP/1.1 307 Temporary Redirect');
                    header('Location: post.php');
                }

                elseif(password_verify($password,$row['password']))
                {
                    $_SESSION['Loggedin'] = true;
                    $_SESSION['Username'] = $row['username'];
                    $_SESSION['userid'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['first_name'].' '.$row['last_name'];
                    
                    if(isset($_GET['loc']))
                    {
                        echo $_GET['loc'];
                    }

                    else
                    {
                        echo "index.php";
                    }
                }

                else
                {
                    $missmatchedpassword = true;
                }
            }

            else
            {
                $notverified=true;
            }
        }
    }

    else
    {
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
                <?php if($usernotexist==true) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> Seems like You are not registerd with us!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                <?php elseif($missmatchedpassword==true) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> Invalid Credentials, please verify them and retry.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                <?php elseif($notverified==true) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> Seems like you have not verified yor mail yet !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                <?php endif; ?>
            </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <form action="" method = "post" id="loginform">
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
            </div>
            <div class = "flex" style = "padding-top:1rem">
                <p class="link" style = "text-align:center;font-size:1rem"> <a href="<?php echo $root;?>/forgotpassword.php"><strong> Forgot password?</strong> </a></p>
            </div>
            <div>
                <p class="link text-center">Haven't Registered with us? please <a href="<?php echo $root;?>/register.php"> Register here </a></p>
            </div>
        </div>
    </div>
</section>

<!--=================================
login-form-end  -->
<?php include 'footer.php';?>
</body>
</html>