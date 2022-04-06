<?php include('header.php');?>

<div class="page">
	<div class="page-main">

		<!--aside open-->
		<?php include('sidebar.php');?>
		<!--aside closed-->

		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include('pageheader.php');?>
				<!--/app header-->
						<!--Page header-->
						
						


<?php
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES)){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $address = $_POST["address"];
	$role = $_POST['role'];

    $checkUsername = "SELECT * FROM `user` WHERE username = '$username'AND user_role_id in(1,2)";
    $userexists =  mysqli_query($conn,$checkUsername);
    $checkUsermail = "SELECT * FROM `user` WHERE email = '$email'AND user_role_id in(1,2)";
    $mailexists = mysqli_query($conn,$checkUsermail);
    

    if(mysqli_num_rows($userexists)>=1 || mysqli_num_rows($mailexists)>=1)
    {

        ?>
        <script> alert("Email or Username already exists");</script> 
        <?php
        
    }
    else{
      $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

      if($password == $confirmPassword ){
		


        $insertinfo = "INSERT INTO `user` (`user_role_id`, `first_name`, `last_name`, `email`, `username`, `password`, `address`,`user_image` ) 
        VALUES ($role, '$firstname', '$lastname', '$email', '$username', '$hashedpassword', '$address','avatardefault_92824.png')";
        mysqli_query($conn,$insertinfo);
        $error = mysqli_error($conn);
        echo "$error";
        ?>
        
		   
        
      <?php
        
       
        
      }
      else{
        
        ?><script> alert("Password Must match with confirmed password");</script> 
        <?php
    }
  }
 
  }

?>




						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Add Employee</h4>
							</div>
						</div>
						<!--End Page header-->
						<!-- End Row -->

						<!-- Row -->
						<!-- Row -->
						<!-- End Row-->
						<div class="row">
							<div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Employee</h4>
									</div>
									<div class="card-body">
										
											<div class="">
												<form method="POST" action="" enctype="multipart/form-data" id ="form">
												<div class="form-group">
													<label class="form-label">First Name</label>
													<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
												</div>
												<div class="form-group">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" name="lastname" placeholder="Enter Lasr Name" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Username</label>
													<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Email</label>
													<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Role</label>
													<input type="text" class="form-control" placeholder = "1-superAdmin 2- Admin" name="role" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Password</label>
													<input type="password" class="form-control" name="password" placeholder="Enter Password" required id ="password">
													<span style="color:red" id = "error"></span>
												</div>
												<div class="form-group">
													<label class="form-label">Confirm Password</label>
													<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
												</div>
												<div class="form-group">
													<label class="form-label">Address</label>
													<textarea class="form-control" name="address" placeholder="Enter Address" required></textarea>
												</div>
																									
											</div>
											<button type="submit" name="emp_add" class="btn btn-primary mt-4 mb-0">Save Employee</button>
											</form>
									
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						</div>
				</div><!-- end app-content-->
			</div>	
		</div>

		<script>
 
 var password = document.getElementById("password");
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
			<!--Footer-->
			<?php include('footer.php'); ?>
			<!-- End Footer-->
	</body>
</html>