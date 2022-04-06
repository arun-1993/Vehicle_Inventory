<?php include 'header.php';?>
<?php
require_once '_dbconnect.php';
?>

<?php  
$emailtaken = false;
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['Username'])){
	$username = $_SESSION['Username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mail = $_POST['email'];
	
	$address=$_POST['address'];
	
	$mailquery = "SELECT * from user where email = '$mail'";

	$mailresult = mysqli_query($conn, $mailquery);

	if(mysqli_num_rows($mailresult) != 0)
	{
		$mailrow = mysqli_fetch_array($mailresult);

		if($mailrow['username'] != $username)
		{
			$emailtaken = true;
		}
	}

	if($emailtaken == false)
	{
		$query = "UPDATE user SET first_name ='$firstname', last_name = '$lastname', email = '$mail',  address= '$address' WHERE username = '$username'";
		
		mysqli_query($conn,$query);

		if(mysqli_query($conn,$query))
		{
			echo "<script> alert('Successfully Updated'); </script>";
			echo '<script> window.location = "index.php" </script>';
		}
	}
}
if(isset($_SESSION['Username']))
{

	$Username = $_SESSION['Username'];
	$query = "SELECT * FROM user where username = '$Username'  AND user_role_id = 3";
	
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	
}


?>



<!--=================================
 header -->


<!--=================================
 inner-intro -->

 <section class="inner-intro bg-1 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-start d-inline-block">
             <h1 class="text-white " style= "text-align:left">Edit Profile</h1>
           </div>
           
     </div>
  </div>
</section>

<!--=================================
 inner-intro -->


<!--=================================
 register-form  -->

 <section class="register-form page-section-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="section-title">
           <span>Welcome to </span>
           <h2>AutoTrack</h2>
           <div class="separator"></div>
         </div>
      </div>
    </div>
	<?php ?>
									<?php $error = false;
									if(isset($_GET['error'])){
										$error = $_GET['error'];
										switch($error)
										{
										case "old_false":
											echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
											<strong>Holy guacamole!</strong> Invalid Current Password
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>';
											break;
										
										case "mismatch":
											echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
											<strong>Holy guacamole!</strong> Passwords did not match
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>';
											break;
										
										case "same":
											echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
											<strong>Holy guacamole!</strong> New password was the same as your Current password. Please try another one.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>';
											break;
										}
									}
										
										?>
									<form action="" method = "post">

      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
          <div class="gray-form">
            <div class="row">
				<div class="mb-3 col-md-6">
					<label class="form-label">First Name</label>
					<input type="text" class="form-control" value = "<?php echo $row['first_name'];?>" name="firstname">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Last Name</label>
					<input type="text" class="form-control" value = "<?php echo $row['last_name'];?>" name="lastname">
				</div>
			</div>
				<div class="mb-3">
					<label class="form-label">Email address</label>
					<input type="email" class="form-control" value = "<?php echo $row['email'];?>" name="email">
					<span id="error" style= "color:red"></span>
			</div>
				<div class="mb-3">
					<label class="form-label">Address</label>
					<input type="textarea" class="form-control" value = "<?php echo $row['address'];?>" name="address">
				</div>  
<div>				
						<button type="submit" class="button red">Edit Profile</button> 
</div>						
              </form>
			  <p class="link">Want to Change your password? please <a href="javascript:void(0)" id="btn_changepassword"> click here </a></p>
              </div>
			  <script>

												const editpassword = document.getElementById('btn_changepassword');
												editpassword.addEventListener('click', (event)=>{

													document.getElementById('editPassword').style = "display:visible";

												});
												


									</script>
		
          </div>
		  
		  
    </div>
	</div>	
</br></br></br>
  <div class="container" id = "editPassword" style = "display:none">
    <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="section-title">
           <h4>Change Password</h4>
           <div class="separator"></div>
         </div>
      </div>
    </div>
	<form action="changepassword.php?id=<?php echo $row['user_id'];?>" method = "post">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
          <div class="gray-form">
            <div class="row">
				<div class="mb-3">
					<label class="form-label">Current Password</label>
					<input type="password" class="form-control" name="oldpassword">
				</div>
				<div class="mb-3">
					<label class="form-label">New Password</label>
					<input type="password" class="form-control" name="newpassword">
				</div>
			
				<div class="mb-3">
					<label class="form-label">Confirm Password</label>
					<input type="password" class="form-control" name="confpassword">
				</div>
			<div class="row">
				<div class="mb-3 col-md-6">				
					<button type="submit" class="button red">Update Password</button>
				</div>
				<div class="mb-3 col-md-6">
					<a  id ="canceledit" class="button red" style= "margin-left: 24px;">Cancel</a> 		
				</div>
			</div>	
				
				<script> const canceledit  = document.getElementById('canceledit');
					canceledit.addEventListener('click', (event)=>{

					document.getElementById('editPassword').style = "display:none";

					});</script>
			
			</div>		
              </form>
              </div>		
          </div>	  		  
    </div>
</div>	
	
  </section>


  <?php 
		echo "	<script>
 
 
 var errorElement = document.getElementById('error');
 

    if($emailtaken){ 
		errorElement.innerText = ' This email is already taken please choose other one'

    } 

</script>"
?>



<?php include 'footer.php';?>

</body>
</html>
