
	<?php 
	
	include 'header.php';
	include '_dbconnect.php';?>

	<?php 

 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES)){
 $image = $_FILES['photo']['name'];
 $username= $_SESSION['username'];
 $query = "Update user set user_image = '$image' where username ='$username' ";
 mysqli_query($conn,$query);
 
 }
if (isset($_SESSION['username'])) {
	 
	$username =$_SESSION['username'];
	$query = " SELECT * FROM USER WHERE username = '$username' OR email = '$username' AND (user_role_id=1 OR user_role_id=2) ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	$userquery = "SELECT COUNT(*) as number FROM USER";
	$user = mysqli_fetch_assoc(mysqli_query($conn,$userquery));
	$teamquery = "SELECT COUNT(*) as number FROM USER where user_role_id = 1 OR user_role_id=2";
	$team = mysqli_fetch_assoc(mysqli_query($conn,$teamquery));
	$brandquery = "SELECT COUNT(*) as number FROM brand_master";
	$brand = mysqli_fetch_assoc(mysqli_query($conn,$brandquery));
	$modelquery = "SELECT COUNT(*) as number FROM model_master";
	$model = mysqli_fetch_assoc(mysqli_query($conn,$modelquery));
	$vehiclequery = "SELECT COUNT(*) as number FROM vehicle";
	$vehicle = mysqli_fetch_assoc(mysqli_query($conn,$vehiclequery));
	$appointmentquery = "SELECT COUNT(*) as number FROM appointment where appointment_status != 'cancelled' AND appointment_status != 'completed'";
	$appointment = mysqli_fetch_assoc(mysqli_query($conn,$appointmentquery));
}
else{
	
	?>
	<script>window.location= 'login.php';</script>
	<?php
	
}


?>

<body class="app sidebar-mini light-mode default-sidebar">
		
		
<!---Global-loader-->
<div id="global-loader" >
	<img src="https://codeigniter.spruko.com/Dashtic/DASHTIC-LTR/public/assets/images/svgs/loader.svg" alt="loader">
</div>

<div class="page">
	<div class="page-main">

		<!--aside open-->


		<?php include 'sidebar.php';?>
		<!--aside closed-->

		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include 'pageheader.php';?>
				<!--/app header-->						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Dashboard</h4>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">
							<div class="col-xl-6 col-md-12 col-lg-12">
								<div class="card bg-primary text-white">
									<div class="card-body">
										<div class="row">
											<div class="col-xl-7 col-md-12 col-lg-6">
												<div class="d-block card-header border-0 text-center px-0">		
													<h1 class="text-center mb-4" style="padding-top:20px;">Welcome <?php echo $row['first_name'] . '&nbsp;' . $row['last_name']; ?>,</b></h1>
													<h3 class="text-center mb-4"> To </h3>
													<h3 class="text-center mb-4"> AutoTrack Admin</h3>
												
												</div>
												
											</div>
											<div class="col-xl-5 col-md-12 col-lg-6">
												<img class="mx-auto text-center w-90" alt="img" src="../public/assets/images/photos/award.png">
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card">
									<div class="card-body text-center">
										<span class="fs-50 icon-muted"><i class="mdi mdi-human-male-female  icon-dropshadow-info text-info"></i></span>
										<p class=" mb-1">Total Users</p>
										<h2 class="mb-1 fs-40 font-weight-bold"><?php echo $user['number']?></h2>
										
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card">
									<div class="card-body text-center">
										<span class="fs-50 icon-muted"><i class="mdi mdi-account-multiple icon-dropshadow-success text-success"></i></span>
										<p class=" mb-1 ">Team Strength</p>
										<h2 class="mb-1 fs-40 font-weight-bold"><?php echo $team['number'];?></h2>
										
									</div>
								</div>
							</div>
							
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="row">
									
									
								
									<div class="col-xl-3 col-lg-6 col-md-12">
										<div class="card">
											<div class="card-body">
												<i class="mdi mdi-tag-text-outline card-custom-icon icon-dropshadow-warning text-warning fs-60"></i>
												<p class=" mb-1">Total Brands</p>
												<h2 class="mb-1 font-weight-bold"><?php echo $brand['number'];?></h2>

											</div>
										</div>
									</div>
									
									<div class="col-xl-3 col-lg-6 col-md-12">
										<div class="card">
											<div class="card-body">
												<i class="mdi mdi-vector-square card-custom-icon icon-dropshadow-muted text-muted fs-60"></i>
												<p class=" mb-1">Total Models</p>
												<h2 class="mb-1 font-weight-bold"><?php echo $model['number'];?></h2>

											</div>
										</div>
									</div>
									
									<div class="col-xl-3 col-lg-6 col-md-12">
										<div class="card">
											<div class="card-body">
												<i class="mdi mdi-taxi card-custom-icon icon-dropshadow-primary text-primary fs-60"></i>
												<p class=" mb-1">Vehicles in Stock</p>
												<h2 class="mb-1 font-weight-bold"><?php echo $vehicle['number'];?></h2>

											</div>
										</div>
									</div>
									
									<div class="col-xl-3 col-lg-6 col-md-12">
										<div class="card">
											<div class="card-body">
												<i class="mdi mdi-calendar-multiple card-custom-icon icon-dropshadow-danger text-danger fs-60"></i>
												<p class=" mb-1">Active Appointments</p>
												<h2 class="mb-1 font-weight-bold"><?php echo $appointment['number'];?></h2>

											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
										<h2>Appointment</h2>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0">User Name</th>
														<th class="wd-20p border-bottom-0">Vehicle id</th>
														<th class="wd-20p border-bottom-0">Model Name</th>
														<th class="wd-25p border-bottom-0">Appointment DateTime</th>
														<th class="wd-15p border-bottom-0">Appointment Status</th>														
														<th class = "wd-15p border-bottom-0">Take Action</th>													
													</tr>
												</thead>
												<tbody>
<?php
	$sql = "select * from appointment a JOIN vehicle v JOIN model_master m JOIN user u where a.vehicle_id=v.vehicle_id and v.model_id=m.model_id and a.user_id=u.user_id ORDER BY a.appointment_status,appointment_schedule";
	$result = mysqli_query($conn,$sql);
	
	
	while($row=mysqli_fetch_assoc($result))
	{
		$aid=$row['appointment_id'];
?>
													<tr>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['vehicle_id']; ?></td>	
														<td><?php echo $row['model_name']; ?></td>
														<td><?php echo $row['appointment_schedule']; ?></td>
														<td><?php 
												$id=$row['appointment_id'];
												if($row['appointment_status']=="Upcoming")
												{
													echo "<h6 style='color:#307FCE'>Upcoming</h6>";
											?>													
											<?php
												}												
												else if($row['appointment_status']=="Completed")
												{
													echo "<h6 style='color:#317B31'>Completed</h6>";
												}
												else if($row['appointment_status']=="Requested")
												{
													echo "<h6 style='color:#D29C36'>Requested</h6>";
												}
												else
												{
													echo "<h6 style='color:#D12D2D'>Cancelled</h6>";
												}
											?></td>													
														
											
											<td>
											
									

<?php
	if($row['appointment_status']=='Requested')
	{
		echo '<select id="action" name="action" onchange="change_appointment(this.value, '.$id.');">';
		echo '<option value=""> --Action-- </option>';
		echo '<option value="accept">Accept</option>';
		echo '<option value="reject">Reject</option>';
		echo '</select>';
	}

	else if($row['appointment_status']=='Upcoming')
	{
		echo '<select id="action" name="action" onchange="change_appointment(this.value, '.$id.');">';
		echo '<option value=""> --Action-- </option>';
		echo '<option value="reject">Reject</option>';
		echo '<option value="finished">Completed</option>';
		echo '</select>';
	}
	
?>
<?php 
	if($row['appointment_status'] == 'Cancelled')
	{	
		echo "<h6 style='color:#D12D2D'>Cancelled</h6>";
	}
	
	elseif($row['appointment_status'] == "Completed")
	{
		echo "<h6 style='color:#317B31'>Completed</h6>";
	}

?>
											
											
											
											
											</td>
													</tr>
	<?php
	}
	?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div>
						</div>
							
							
						</div>
						<!--End row-->

						
						</div>
				</div><!-- end app-content-->
			</div>

			<?php include 'footer.php';?>
			<script>
			function change_appointment(value, id)
			{
				var path = "appoint-" + value + ".php?id=" + id;
				window.location=path;
			}
		</script>
	</body>
</html>
