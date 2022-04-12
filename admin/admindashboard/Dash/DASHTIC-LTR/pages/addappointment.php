<?php

include('header.php');

include_once('mail/login_credentials.php');  
require 'mail/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$appointment_created = false;
$user_created = false;
$user_found = false;

if(isset($_POST["submit"]))
{
	$brand_id = $_POST['brand'];
	$model_id = $_POST['model'];
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	$schedule = $_POST['schedule'];
	$comments = $_POST['comments'];

	$user_query = "SELECT * FROM user WHERE email = '$email'";
	$user_result = mysqli_query($conn, $user_query);

	$vehicle_query = "SELECT * FROM vehicle WHERE model_id = '$model_id' LIMIT 1";
	$vehicle_result = mysqli_query($conn, $vehicle_query);
	$vehicle_id = mysqli_fetch_array($vehicle_result)['vehicle_id'];

	if(mysqli_num_rows($user_result) == 1)
	{
		$user_found = true;

		$user_id = mysqli_fetch_array($user_result)['user_id'];
		$appointment_query = "INSERT INTO appointment (user_id, vehicle_id, appointment_schedule, appointment_status, appointment_comments) VALUES ($user_id, $vehicle_id, '$schedule', 'Upcoming', '$comments')";
		
		if($appointment_result = mysqli_query($conn, $appointment_query))
		{
			$appointment_created = true;
		}
	}
	
	else
	{
		$username = explode('@', $email)[0];

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$password = '';
		$length = 10;
		
		for ($i = 0; $i < $length; $i++)
		{
			$password .= $characters[random_int(0, $charactersLength - 1)];
		}

		$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

		$create_query = "INSERT INTO user (user_role_id, first_name, last_name, email, username, password, address, user_status) VALUES (3, '$first_name', '$last_name', '$email', '$username', '$hashedpassword', 'Ahmedabad', 'Verified')";

		$user_created = true;

		$mail_text = "Greetings $first_name,<br /><br />A new user has been created for you with the following credentials:<br />Username: $username<br />Password: $password<br />The appointment has been set for $schedule.<br />You can login to view your appointment and edit your information.<br /><br />Kind regards,<br />AutoTrack Team";

		if($create_result = mysqli_query($conn, $create_query))
		{
			$user_query = "SELECT * FROM user WHERE email = '$email'";
			$user_result = mysqli_query($conn, $user_query);

			$user_id = mysqli_fetch_array($user_result)['user_id'];
			$appointment_query = "INSERT INTO appointment (user_id, vehicle_id, appointment_schedule, appointment_status, appointment_comments) VALUES ($user_id, $vehicle_id, '$schedule', 'Upcoming', '$comments')";
			
			if($appointment_result = mysqli_query($conn, $appointment_query))
			{
				$appointment_created = true;
			}

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
				$mail->addAddress('arun0306.r@gmail.com');
				$mail->addAddress('jitendrabhavsar469@gmail.com');
				$mail->addAddress('riyavora16@gmail.com');
				
				$mail->isHTML(true);
				$mail->Subject = 'Appointment';
				$mail->Body    = $mail_text; 
				
				$mail->AltBody = "Greetings, your new password is $password";
				$mail->send();
				//echo "Mail has been sent successfully!";

			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
}

$brand_query = "SELECT * FROM brand_master ORDER BY brand_name";
$brand_result = mysqli_query($conn,$brand_query);

if(isset($_GET['brand']) && $_GET['brand'] >= 1)
{
	$brand_id = $_GET['brand'];
	$model_query = "SELECT * FROM model_master WHERE brand_id = $brand_id ORDER BY model_name";
}

else
{
	$model_query = "SELECT * FROM model_master ORDER BY model_name";
}
	
$model_result = mysqli_query($conn,$model_query);

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
				<div class="page-header">
					<div class="page-leftheader">
						<h4 class="page-title">Appointment</h4>
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
								<h4 class="card-title">Add Appointment</h4>
							</div>
<<<<<<< HEAD
							<div class="card-body">
								<?php if($user_created && $appointment_created) : ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Holy guacamole!</strong> A new user has been created and the appointment set.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php elseif($user_found && $appointment_created) : ?>
								<div class="alert alert-primary alert-dismissible fade show" role="alert">
									<strong>Holy guacamole!</strong> Appointment has been set for the user.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php endif; ?>
								<div class="">
									<form method="POST" action="">
										<div class="form-group">
											<label class="form-label">Brand Name *</label>
											<select class="form-control" id="brand" name="brand" onchange="fetch_models(this.form)" required>
												<option value=""> -- Select Brand -- </option>
												<?php while($brand = mysqli_fetch_array($brand_result)) : ?>
													<?php if($brand_id == $brand['brand_id']) : ?>
													<option value="<?php echo $brand['brand_id']?>" selected><?php echo $brand['brand_name']?></option>
													<?php else : ?>
													<option value="<?php echo $brand['brand_id']?>"><?php echo $brand['brand_name']?></option>
													<?php endif; ?>
												<?php endwhile; ?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Model Name *</label>
											<select class="form-control" id="model" name="model" required>
												<option value=""> -- Select Model -- </option>
												<?php while($model = mysqli_fetch_array($model_result)) : ?>
												<option value="<?php echo $model['model_id']?>"><?php echo $model['model_name']?></option>
												<?php endwhile; ?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">First Name *</label>
											<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
										</div>
										<div class="form-group">
											<label class="form-label">Last Name *</label>
											<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required>
										</div>
										<div class="form-group">
											<label class="form-label">Email *</label>
											<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
										</div>	
										<div class="form-group">
											<label class="form-label">Datetime *</label>
											<input id="appointment_date" class="form-control" type="" name="schedule" required>
										</div>
										<div class="form-group">
											<label class="form-label">Comments <small>(Optional)</small></label>
											<textarea class="form-control" name="comments" placeholder="Extra comments about the appointment"></textarea>
										</div>
										<button type="submit" name="submit" class="btn btn-block btn-primary mt-4 mb-0">Add Appointment</button>
									</form>
=======
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
										<h4 class="card-title">Add Appointment</h4>
									</div>
									<div class="card-body">
										
											<div class="">
												<form method="POST" action="">
                                                <div class="form-group">
													<label class="form-label">First Name*</label>
													<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?php echo @$firstname; ?>" required>
												</div>
                                                <div class="form-group">
													<label class="form-label">Email*</label>
													<input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo @$email; ?>" required>
												</div>
												<div class="form-group">
													<label class="form-label">Brand Name*</label>
													<select class="form-control" id="l13" name="brand_id" required>
														<option value=""> -- Select Brand -- </option>
<?php										
	$sql1 = "SELECT * FROM brand_master ORDER BY brand_name";
	$result1 = mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_array($result1))
	{
?>
                                                <option value="<?php echo $row1['brand_id']?>"><?php echo $row1['brand_name']?></option>
<?php
	}
?>
                                            </select>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Model Name*</label>
													<select class="form-control" id="l13" name="brand_id" required>
														<option value=""> -- Select Model -- </option>
<?php										
	$sql1 = "SELECT * FROM model_master ORDER BY model_name";
	$result1 = mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_array($result1))
	{
?>
                                                <option value="<?php echo $row1['model_id']?>"><?php echo $row1['model_name']?></option>
<?php
	}
?>
                                            </select>
												</div>	
                                                <div class="form-group">
													<label class="form-label">Datetime</label>
													<input id="appointment_date" class="form-control" type="" name="date"  required>
												</div>
												</div>

												<div class="form-group">
													<label class="form-label">General Description*</label>
													<textarea class="form-control" name="general_description" placeholder="Enter a General Description" required></textarea>
												</div>
												
											</div>
											<button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save Appointment</button>
											</form>
									
									</div>
>>>>>>> 60e8935c61d8e5dec816af3e27f35d2549bbc5c7
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
		</div>
	</div><!-- end app-content-->
</div>
<!--Footer-->
<?php include('footer.php'); ?>
<!-- End Footer-->
<script>
	function fetch_models(form)
	{
		var brand = form.brand.options[form.brand.options.selectedIndex].value;

		self.location = '?brand=' + brand;
	}
</script>
</body>
</html>