<?php include('header.php');?>
 
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
						
<?php

if(isset($_POST["brand_id"]) && isset($_POST["model_name"]))
	{
		$brandid = $_POST["brand_id"];
		$modelname = $_POST["model_name"];
		$description = $_POST["general_description"];
		
		if($brandid!='' && $modelname!='')
		{		
			$modelinsert = $mysqli->prepare("INSERT INTO model_master (brand_id, model_name, general_description) values(?, ?, ?)");
			$modelinsert->bind_param('iss',$brandid, $modelname, $description);
			$insertresult = $modelinsert->execute();
			
			if($insertresult)
			{
		
		?>
		<script>window.location = "model.php"</script>
		<?php	
	}	
		}
		else
		{
		?>
		<script>window.location = "model.php"</script>
		<?php
		
		}
	}
?>
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Add Appointment</h4>
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
											<button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save Model</button>
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
		<!--Footer-->
			<?php include('footer.php'); ?>
			<!-- End Footer-->
	</body>
</html>