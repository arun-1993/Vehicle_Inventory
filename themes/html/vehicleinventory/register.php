<?php include 'header.php';?>
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
        
        $insertinfo = "INSERT INTO `user` (`user_role_id`, `first_name`, `last_name`, `email`, `username`, `password`, `address`) 
        VALUES (3, '$firstname', '$lastname', '$email', '$username', '$hashedpassword', '$address')";
        $row = mysqli_query($conn,$insertinfo);
        
        ?>
        
        <?php 
        // session_start();
        $_SESSION['Loggedin'] = true;
        $_SESSION['Username'] = $username;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $_POST['Email'];
        $_SESSION['name'] = $_POST['Firstname'].' '.$_POST['Lastname'];
        ?>
        <script> alert("Loggedin! <?php echo $_SESSION['Username'];?>");
    
        window.location= 'index.php'; </script>
      <?php

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
    <form action="register.php" method="post" id ="form">
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
                <p class="link">Already have an account? please <a href="login.php"> login here </a></p>
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
 