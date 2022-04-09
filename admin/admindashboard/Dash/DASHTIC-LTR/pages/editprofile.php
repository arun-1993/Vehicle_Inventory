<?php include('header.php');?>


<?php  
$emailtaken= false;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])){
	$userid = $_GET['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mail = $_POST['email'];
	
	$address=$_POST['address'];
	$mailquery = "SELECT * from user where email = '$mail'";

	$mailresult = mysqli_query($conn, $mailquery);

	if(mysqli_num_rows($mailresult) != 0)
	{
		$mailrow = mysqli_fetch_array($mailresult);

		if($mailrow['user_id'] != $userid)
		{
			$emailtaken = true;
		}
	}

	if($emailtaken == false)
	{
		$query = "UPDATE user SET first_name ='$firstname', last_name = '$lastname', email = '$mail',  address= '$address' WHERE user_id = '$userid'";
		
		mysqli_query($conn,$query);

		if(mysqli_query($conn,$query))
		{
			echo "<script> alert('Successfully Updated'); </script>";
			echo '<script> window.location = "index.php" </script>';
		}
	}
}
if(isset($_GET['id']))
{

	$userid = $_GET['id'];
	$query = "SELECT * FROM user where user_id = $userid  AND user_role_id in(1,2)";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	
}


?>





<div class="page">
	<div class="page-main">

		<!--sidebar open-->
		<?php include('sidebar.php');?>
		<!--sidebar closed-->

		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include('pageheader.php');?>
				<!--/app header-->
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Edit Profile</h4>
							</div>
							
						</div>

						<div class="row">
							
							<div class="col-xl-8 col-lg-7">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Profile</div>
									</div><?php ?>
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
											<strong>Holy guacamole!</strong>New password was the same as your Current password. Please try another one.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>';
											break;
										}
									}
										
										?>
									<form action="" method = "post">

										<div class="card-body">
											<div class="row">
												<div class="col-sm-8 col-md-8">
													<div class="form-group">
														<label class="form-label">First Name</label>
														<input type="text" class="form-control" value = "<?php echo $row['first_name'];?>" name="firstname">
													</div>
												</div> 
												<div class="col-sm-8 col-md-8">
													<div class="form-group">
														<label class="form-label">Last Name</label>
														<input type="text" class="form-control" value = "<?php echo $row['last_name'];?>" name="lastname">
													</div>
												</div> 
												<div class="col-sm-8 col-md-8">
													<div class="form-group">
													<label class="form-label">Email address</label>
													<input type="email" class="form-control" value = "<?php echo $row['email'];?>" name="email" id = "email">
													<span style="color:red" id = "error"></span>
												</div>
											</div>
											
											
											<div class="col-md-8">
												<div class="form-group">
													<label class="form-label">Address</label>
													<input type="textarea" class="form-control" value = "<?php echo $row['address'];?>" name="address">
												</div>
												
											</div>
										</form>
											</div>
											<div class="card-footer text-right">
										<button class="btn btn-outline-primary" type="submit"  name="submit">Update Profile</button>&nbsp;&nbsp;
										<a href="javascript:void(0)" class = "btn btn-outline-primary" id="btn_changepassword" >Change Password</a>
										<a href="profile.php" class = "btn btn-outline-danger"  >Cancel</a>
                                        

										
									</div>
									
									<script>

												const editpassword = document.getElementById('btn_changepassword');
												editpassword.addEventListener('click', (event)=>{

													document.getElementById('editPassword').style = "display:visible";

												});
												


									</script>
										
									</div>
									</div>
									<div class="card" id = "editPassword" style = "display:none">
									<form method = "post" id ="form" action = "changepassword.php?id=<?php echo $row['user_id'];?>">
										<div class="card-header">
											<?php $error = false; ?>
										<div class="card-title">Change Password</div>
										</div>
										
										<div class="card-body">
											<div class="form-group col-md-8" >
											<label class="form-label">Current Password</label>
											<input type="password" class="form-control" name="oldpassword">
										</div>
										<div class="form-group col-md-8">
											<label class="form-label">New Password</label>
											<input type="password" class="form-control"name="newpassword">
											</div>
											<div class="form-group col-md-8">
											<label class="form-label">Confirm Password</label>
											<input type="password" class="form-control" name="confpassword">
											</div>								
												</div>
										<div class="card-footer text-right">
										<button class="btn btn-outline-primary" type="submit" name="submit">Update Password</button> &nbsp;&nbsp;
											</form>
                                        <a class="btn btn-outline-danger"  id ="canceledit" type="">Cancel</a>
									</div>
								<script> const canceledit  = document.getElementById('canceledit');
												canceledit.addEventListener('click', (event)=>{

													document.getElementById('editPassword').style = "display:none";

												});</script>


													
								</div>
							</div>
						</div>
						</div>
				</div>
			</div>
<?php 
		echo "	<script>
 
 
 var errorElement = document.getElementById('error');
 

    if($emailtaken){ 
		errorElement.innerText = ' This email is already taken please choose other one'

    } 

</script>"
?>



			<?php include('footer.php') ?>
		</div>

			</body>

</html>
