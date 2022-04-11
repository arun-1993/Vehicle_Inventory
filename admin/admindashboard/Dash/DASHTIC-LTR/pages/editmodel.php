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
										<h4 class="card-title">Edit Model</h4>
									</div>
									<div class="card-body">
										
											<div class="">

<?php

if(isset($_GET['id']) && isset($_GET['name']))
{
	$mid = $_GET['id'];
	$name = $_GET['name'];
	
	//echo $name;
	//echo $id;
	$query = "select * from model_master m JOIN brand_master b where m.brand_id=b.brand_id and model_id= $mid ";
	$query_run = mysqli_query($conn, $query);
	
	foreach($query_run as $row)
	{
		?>
		

												<form method="POST" action="">
												<!--<input type="hidden" name="edit_id" value="<?php //echo $row['model_id']?>">-->
												<div class="form-group">
													<label class="form-label">Brand Name</label>
													<select class="form-control" name="brand_id" required>
														<option value=""> -- Select Brand -- </option>
<?php
	$sql1 = "SELECT * FROM brand_master ORDER BY brand_name";
	$result1 = mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_array($result1))
	{
?>
                                                <option value="<?php echo $row1['brand_id']?>"
												<?php if($name == $row1['brand_name'])
													echo "selected"; ?>>
												<?php echo $row1['brand_name']?>
												</option>
<?php
	}
?>
                                            </select>

												</div>	
												<div class="form-group">
													<label class="form-label">Model Name</label>
													<input type="text" class="form-control" name="model_name" value="<?php echo $row['model_name']?>" placeholder="Enter Model Name" required>
												</div>
												
												<div class="form-group">
													<label class="form-label">General Description</label>
													<textarea class="form-control" name="general_description" placeholder="Enter a General Description" required><?php echo $row['general_description']; ?></textarea>
												</div>
											</div>
											<a href="model.php" class="btn btn-danger mt-4 mb-0">Cancel</a>
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
	//$id = $_POST['edit_id'];
	$bid = $_POST['brand_id'];
	$model = $_POST['model_name'];
	$description = $_POST["general_description"];
	
	$query = "UPDATE model_master SET brand_id='$bid', model_name='$model', general_description='$description' WHERE model_id=$mid";
	$query_run = mysqli_query($conn, $query);
	
	if($query_run)
	{
		
		?>
		<script>window.location = "model.php"</script>
		<?php
		
		
	}
	else
	{
		?>
		<script>window.location = "model.php"</script>
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