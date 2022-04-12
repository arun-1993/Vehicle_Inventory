		<?php include 'header.php';
		require_once '_dbconnect.php';
		$emailtaken = false; // assumes that mail id is not taken initially

		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['Username'])){
		$username = $_SESSION['Username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		// $mail = $_POST['email'];

		$address=$_POST['address'];


		if($emailtaken == false)
		{
		$mailupdatequery = $mysqli->prepare("UPDATE user SET first_name =?, last_name = ?,  address= ? WHERE username = ?");
		$mailupdatequery->bind_param('ssss',$firstname,$lastname,$address,$username);
		$mailupdatequery->execute();


		if($mailupdatequery->execute())
		{
		echo '<script> window.location = "index.php" </script>';
		}
		}
		}
		if(isset($_SESSION['Username']))
		{
		$role=3;
		$Username = $_SESSION['Username'];
		$fetchuserdetails = $mysqli->prepare("SELECT * FROM user where username = ?  AND user_role_id = ?");
		$fetchuserdetails->bind_param('si',$Username,$role);
		$fetchuserdetails->execute();


		$result = $fetchuserdetails->get_result();
		$row =$result->fetch_array();

		}


		?>





		<!--=================================
		inner-intro-start -->

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
		inner-intro-end -->


		<!--=================================
		register-form-start  -->

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
				case "old_false": // when entered old password is incorrect
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Holy guacamole!</strong> Invalid Current Password
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
					break;
				
				case "mismatch": // when entered new password mismatches with Confirm password
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Holy guacamole!</strong> Passwords did not match
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
					break;
				
				case "same": // when new password is same as old password
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
		<!-- <div class="mb-3">
		<label class="form-label">Email address</label>
		<input type="email" class="form-control" value = "<?php echo $row['email'];?>" name="email">
		<span id="error" style= "color:red"></span>
		</div> -->
		<div class="mb-3">
		<label class="form-label">Address</label>
		<input type="textarea" class="form-control" value = "<?php echo $row['address'];?>" name="address">
		</div>  
		<div>				
		<button type="submit" class="button red">Edit Profile</button> 
		</div>						
		</form>
		<p class="link">Want to Change your password? please <a href="<?php echo $root;?>/javascript:void(0)" id="btn_changepassword"> click here </a></p>
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
