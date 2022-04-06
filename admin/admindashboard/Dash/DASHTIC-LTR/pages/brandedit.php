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

						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Edit Form</h4>
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
										<h4 class="card-title">Edit Brand</h4>
									</div>
									<div class="card-body">
										
											<div class="">

<?php

if(isset($_POST['edit_btn']))
{
	$id = $_POST['edit_id'];
	//echo $id;
	$query = "SELECT * from brand_master WHERE brand_id= $id ";
	$query_run = mysqli_query($conn, $query);
	
	foreach($query_run as $row)
	{
		?>
		

												<form method="POST" action="">
												<input type="hidden" name="edit_id" value="<?php echo $row['brand_id']?>">
												<div class="form-group">
													<label class="form-label">Brand Name</label>
													<input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name" value="<?php echo $row['brand_name']?>" required>
												</div>												
											</div>
											<a href="brand.php" class="btn btn-danger mt-4 mb-0">Cancel</a>
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
	$id = $_POST['edit_id'];
	$brand = $_POST['brand_name'];
	
	$query = "UPDATE brand_master SET brand_name='$brand' WHERE brand_id= $id";
	$query_run = mysqli_query($conn, $query);
	
	if($query_run)
	{
		
		?>
		<script>window.location = "brand.php"</script>
		<?php
		
		
	}
	else
	{
		?>
		<script>alert("Error! Please try again.");</script>
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