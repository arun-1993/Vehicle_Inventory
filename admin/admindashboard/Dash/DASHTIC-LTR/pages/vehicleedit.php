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
							<div class="col-lg-12 col-xl-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Model</h4>
									</div>
									<div class="card-body">
										
											<div class="">

<?php

if(isset($_GET['id']) && isset($_GET['model']) && isset($_GET['color']) && isset($_GET['fuel']) && isset($_GET['trans']))
{
	$vid = $_GET['id'];
	$model = $_GET['model'];
	$color = $_GET['color'];
	$fuel = $_GET['fuel'];
	$trans = $_GET['trans'];
	
	//echo $name;
	//echo $id;
	
	$query = "select * from vehicle v JOIN model_master m JOIN bodycolor c JOIN fuel_type f JOIN transmission t where v.model_id=m.model_id and v.exterior_color=c.color_id and v.fuel_type_id=f.fuel_type_id and v.transmission_id=t.transmission_id and vehicle_id= $vid ";
	$query_run = mysqli_query($conn, $query);
	
	foreach($query_run as $row)
	{
		?>
		

												<form method="POST" action="" enctype = "multipart/form-data">
												<!--<input type="hidden" name="edit_id" value="<?php //echo $row['model_id']?>">-->
												<div class="form-group">
													<label class="form-label">Model Name</label>
													<select class="form-control" name="model_id" required>
														<option value=""> -- Select Model -- </option>
<?php
	$sql1 = "SELECT * FROM model_master ORDER BY model_name";
	$result1 = mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_array($result1))
	{
?>
                                                <option value="<?php echo $row1['model_id']?>"
												<?php if($model == $row1['model_name'])
													echo "selected"; ?>>
												<?php echo $row1['model_name']?>
												</option>
<?php
	}
?>
                                            </select>

												</div>	
												<div class="form-group">
													<label class="form-label">Exterior Body Color</label>
													<select class="form-control" name="exterior_color" required>
														<option value=""> -- Select Body Color -- </option>
<?php
	$sql2 = "SELECT * FROM bodycolor ORDER BY color";
	$result2 = mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_array($result2))
	{
?>
                                                <option value="<?php echo $row2['color_id']?>"
												<?php if($color == $row2['color'])
													echo "selected"; ?>>
												<?php echo $row2['color']?>
												</option>
<?php
	}
?>
                                            </select>

												</div>	
												<div class="form-group">
													<label class="form-label">Fuel Type</label>
													<select class="form-control" name="fuel_type_id" required>
														<option value=""> -- Select Fuel Type -- </option>
<?php
	$sql3 = "SELECT * FROM fuel_type ORDER BY fuel_type";
	$result3 = mysqli_query($conn,$sql3);
	while($row3 = mysqli_fetch_array($result3))
	{
?>
                                                <option value="<?php echo $row3['fuel_type_id']?>"
												<?php if($fuel == $row3['fuel_type'])
													echo "selected"; ?>>
												<?php echo $row3['fuel_type']?>
												</option>
<?php
	}
?>
                                            </select>

												</div>	
												<div class="form-group">
													<label class="form-label">Transmission</label>
													<select class="form-control" name="transmission_id" required>
														<option value=""> -- Select Transmission Type -- </option>
<?php
	$sql4 = "SELECT * FROM transmission ORDER BY transmission_type";
	$result4 = mysqli_query($conn,$sql4);
	while($row4 = mysqli_fetch_array($result4))
	{
?>
                                                <option value="<?php echo $row4['transmission_id']?>"
												<?php if($trans == $row4['transmission_type'])
													echo "selected"; ?>>
												<?php echo $row4['transmission_type']?>
												</option>
<?php
	}
?>
                                            </select>

												</div>	
												<div class="form-group">
													<label class="form-label">Model Year</label>
													<input type="text" class="form-control" name="model_year" value="<?php echo $row['model_year']?>" placeholder="Enter Model Year" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Seating Capacity</label>
													<input type="text" class="form-control" name="seating_capacity" value="<?php echo $row['seating_capacity']?>" placeholder="Enter Seating Capacity" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Vehicle Price</label>
													<input type="text" class="form-control" name="vehicle_price" value="<?php echo $row['vehicle_price']?>" placeholder="Enter Vehicle Price" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Vehicle Vin</label>
													<input type="text" class="form-control" name="vehicle_vin" value="<?php echo $row['vehicle_vin']?>" placeholder="Enter VIN" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Kilometers Driven</label>
													<input type="text" class="form-control" name="kms_driven" value="<?php echo $row['kms_driven']?>" placeholder="Enter Distance Driven" required>
												</div>	
												<div class="form-group">
													<label class="form-label">Vehicle Description</label>
													<textarea class="form-control" name="vehicle_description" placeholder="Enter Vehicle Description" required><?php echo $row['vehicle_description']?></textarea>
												</div>	
												<div class="form-group">
													<label class="form-label">Vehicle Image</label>
													<input type="file" name="image">
												</div>	
											</div>
											<a href="vehicle.php" class="btn btn-danger mt-4 mb-0">Cancel</a>
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
	$mid = $_POST['model_id'];
	$cid = $_POST['exterior_color'];
	$fid = $_POST['fuel_type_id'];
	$tid = $_POST['transmission_id'];
	$year = $_POST['model_year'];
	$cap = $_POST['seating_capacity'];
	$vin = $_POST['vehicle_vin'];
	$kms = $_POST['kms_driven'];
	$desc = $_POST['vehicle_description'];
	$image = $_FILES["image"]["name"];
	$extension = pathinfo($image,PATHINFO_EXTENSION);
	$random = rand(0,10000);
	$rename = 'upload'.date('ymd'). $random;
	$newname = $rename. '.' . $extension;
	if(!$_FILES['image']['error'] == 4){
	$query = "UPDATE vehicle SET model_id='$mid', exterior_color='$cid', fuel_type_id='$fid', transmission_id='$tid', model_year='$year', seating_capacity='$cap', vehicle_vin='$vin', kms_driven='$kms', vehicle_description='$desc', vehicle_image='$newname'  WHERE vehicle_id= $vid";
	//echo $query;
	//die;
	$query_run = mysqli_query($conn, $query);
	move_uploaded_file($_FILES['image']['tmp_name'],'../../../../../themes/html/vehicleinventory/images/car/'.$newname);	
	}
	else{
		$query = "UPDATE vehicle SET model_id='$mid', exterior_color='$cid', fuel_type_id='$fid', transmission_id='$tid', model_year='$year', seating_capacity='$cap', vehicle_vin='$vin', kms_driven='$kms', vehicle_description='$desc' WHERE vehicle_id= $vid";
	//echo $query;
	//die;
	$query_run = mysqli_query($conn, $query);
		
	}
	
	if($query_run)
	{
		
		?>
		<script>window.location = "vehicle.php"</script>
		<?php
		
		
	}
	else
	{
		?>
		<script>window.location = "vehicle.php"</script>
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