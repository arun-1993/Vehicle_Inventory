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

						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Edit Form</h4>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Fuel Type</h4>
									</div>
									<div class="card-body">
										
											<div class="">

<?php

if(isset($_POST['edit_btn']))
{
	$fueltypeid = $_POST['edit_id'];
	//echo $fueltypeid;
	$selectfueltype = $mysqli->prepare("SELECT * from fuel_type  WHERE fuel_type_id= ? ");
	$selectfueltype->bind_param('i',$fueltypeid);
	$selectfueltype->execute();
	$query_run = $selectfueltype->get_result();
	
	foreach($query_run as $row)
	{
		?>
		

												<form method="POST" action="">
												<input type="hidden" name="edit_id" value="<?php echo $row['fuel_type_id']?>">
												<div class="form-group">
													<label class="form-label">Fuel Type</label>
													<input type="text" class="form-control" name="fuel_type" value="<?php echo $row['fuel_type']?>" placeholder="Enter Fuel Type" required>
												</div>												
											</div>
											<a href="fueltype.php" class="btn btn-danger mt-4 mb-0">Cancel</a>
											<button type="submit" name="updatebtn" class="btn btn-primary mt-4 mb-0">Update</button>
											</form>
		<?php		
	}
}
?>

										
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						</div>
				</div><!-- end app-content-->
			</div>

<?php

if(isset($_POST['updatebtn']))
{
	$fueltypeid = $_POST['edit_id'];
	$fuel = $_POST['fuel_type'];
	
	$updatefueltype = $mysqli->prepare("UPDATE fuel_type SET fuel_type=? WHERE fuel_type_id= ?");
	$updatefueltype->bind_param('si',$fuel,$fueltypeid);
	$query_run = $updatefueltype->execute();
	
	if($query_run)
	{
		
		?>
		<script>window.location = "fueltype.php"</script>
		<?php
		
		
	}
	else
	{
		?>
		<script>window.location = "fueltype.php"</script>
		<?php
		
	}
}

?>		
		</div>
			<!--Footer-->
			<?php include('footer.php'); ?>
			<!-- End Footer-->
		
	</body>
</html>