<?php include 'header.php';?>


<!--=================================
 header -->


<!--=================================
 inner-intro -->



<!--=================================
 inner-intro -->

 <?php
    $usernotexist = false;
    $missmatchedpassword = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
      $username = $_POST["username"];
      $password = $_POST["password"]; 
    
    
      $sql = "SELECT * FROM `user` WHERE username = '$username' or email = '$username' AND  user_role_id = 3";
      $result = mysqli_query($conn,$sql);
      $number = mysqli_num_rows($result);
      if($number==1)
      { 
        while($row = mysqli_fetch_assoc($result)){
        if(password_verify($password,$row['password'])){
          ?>
          <?php
          // session_start();
          $_SESSION['Loggedin'] = true;
          $_SESSION['Username'] = $row['username'];
          $_SESSION['userid'] = $row['user_id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['first_name'].' '.$row['last_name'];
          ?>
          <script>
         
          <?php if(isset($_GET['loc'])) : ?>
            window.location= "<?php echo $_GET['loc']; ?>";
          <?php else : ?>
            window.location= "index.php";
          <?php endif; ?>
          </script>
          
          <?php
          
        }
        else
        {
          $missmatchedpassword = true;
          ?>
          <?php
    
        }
      }
      }
  
  else{
   
    $usernotexist = true;
   ?>
    <?php
  
  
  }
  }
  
  ?>

<!--=================================
 login-form  -->




 <section class="login-form page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="section-title">
           
           <h2>Login To Your Account</h2>
           <div class="separator"></div>
         </div><?php if($usernotexist==true){ echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOPS!</strong> Seems like You are not registerd with us
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
         } ?>
         <?php if($missmatchedpassword==true){ echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOPS!</strong> Invalid Credential please Re-enter
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
         } ?>
         
</div>
      </div>
    </div>
    <form action="" method = "post">

      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
          <div class="gray-form clearfix">
            <div class="mb-3">
              <label class="form-label" for="name">Username* </label>
              <input id="name" class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="mb-3">
              <label class="form-label" for="Password">Password* </label>
              <input id="Password" class="form-control" type="password" placeholder="Password" name="password">
            </div>
            
            <div class="d-grid">
              <button  class="button red btn-block">Log in</button> 
            </div>
          </div>
        
        </div>
      </div>
      
    </form>
    
         <div class = "flex" style = "padding-top:1rem">
         <p class="link" style = "text-align:center;font-size:1rem"> <a href="forgotpassword.php"><strong> Forgot password?</strong> </a></p>
        </div>

    </div>
  </section>

<!--=================================
 login-form  -->


<!--=================================
 footer -->

<?php include 'footer.php';?>
</body>
</html>
4