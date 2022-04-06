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
						
						
<?php

if(isset($_POST["submit"]))
	{
		// echo "<pre>";
		// print_r($_POST);
		// print_r($_FILES);
		// echo "</pre>";
		$mid = $_POST["model_id"];
		$cid = $_POST["exterior_color"];
		$fid = $_POST["fuel_type_id"];
		$tid = $_POST["transmission_id"];
		$year = $_POST["model_year"];
		$cap = $_POST["seating_capacity"];
		$price = $_POST["vehicle_price"];
		$vin = $_POST["vehicle_vin"];
		$kms = $_POST["kms_driven"];
		$desc = $_POST["vehicle_description"];
		if($_FILES["image"]["error"] == 0)
		{
			$image = $_FILES["image"]["name"];
			$extension = pathinfo($image,PATHINFO_EXTENSION);
			$random = rand(0,10000);
			$rename = 'upload'.date('ymd'). $random;
			$newname = $rename. '.' . $extension;
			move_uploaded_file($_FILES['image']['tmp_name'],'../../../../../themes/html/vehicleinventory/images/car/'.$newname);
			// $sql = "insert into vehicle(model_id,exterior_color,fuel_type_id,transmission_id,model_year,seating_capacity,vehicle_price,vehicle_vin,kms_driven,vehicle_description,vehicle_image) values('".$mid."','".$cid."','".$fid."','".$tid."','".$year."','".$cap."','".$price."','".$vin."','".$kms."','".$desc."','".$newname."')";
			// $result = mysqli_query($conn,$sql);
			// echo $sql;
			// die;
		}

		else
		{
			$newname = "ghost.png";
			// $sql = "insert into vehicle(model_id,exterior_color,fuel_type_id,transmission_id,model_year,seating_capacity,vehicle_price,vehicle_vin,kms_driven,vehicle_description,vehicle_image) values('".$mid."','".$cid."','".$fid."','".$tid."','".$year."','".$cap."','".$price."','".$vin."','".$kms."','".$desc."','".'ghost.png'."')";
			// $result = mysqli_query($conn,$sql);
			// echo $sql;
			// die;
		}

		// echo $sql;
		// die;
		
		if($mid!='' && $cid!='' && $fid!='' && $tid!='' && $year!='' && $cap!='' && $price!='' && $vin!='' && $kms!='' && $desc!='')
		{			
			$sql = "insert into vehicle(model_id,exterior_color,fuel_type_id,transmission_id,model_year,seating_capacity,vehicle_price,vehicle_vin,kms_driven,vehicle_description,vehicle_image) values('".$mid."','".$cid."','".$fid."','".$tid."','".$year."','".$cap."','".$price."','".$vin."','".$kms."','".$desc."','".$newname."')";
			$result = mysqli_query($conn,$sql);
			// echo $sql;
			// die;
			
		//	echo "result = " . $result;
			
			if($result)
			{
		
		?>
		<script>window.location = "vehicle.php"</script>
		<?php	
	}	
		}
		else
		{
		?>
		<script>alert("All fields are required to be filled");</script>
		<?php
		
		}
	}
?>
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Add Vehicle</h4>
							</div>
						</div>
						<!--End Page header-->
						<!-- End Row -->

						<!-- Row -->
						<!-- Row -->
						<!-- End Row-->
						<div class="row">
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Vehicle</h4>
									</div>
									<div class="card-body">
										
											<div class="">
												<form method="POST" action="" enctype="multipart/form-data">
												<div class="form-group">
													<label class="form-label">Model Name</label>
													<select class="form-control" id="l13" name="model_id" required>
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
													<label class="form-label">Color</label>
													<select class="form-control" id="l13" name="exterior_color" required>
														<option value=""> -- Select Body Color -- </option>
<?php										
	$sql2 = "SELECT * FROM bodycolor ORDER BY color";
	$result2 = mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_array($result2))
	{
?>
                                                		<option value="<?php echo $row2['color_id']?>"><?php echo $row2['color']?></option>
<?php
	}
?>
                                            </select>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Fuel Type</label>
													<select class="form-control" id="l13" name="fuel_type_id" required>
														<option value=""> -- Select Fuel Type -- </option>
<?php										
	$sql3 = "SELECT * from fuel_type ORDER BY fuel_type";
	$result3 = mysqli_query($conn,$sql3);
	while($row3 = mysqli_fetch_array($result3))
	{
?>
                                                <option value="<?php echo $row3['fuel_type_id']?>"><?php echo $row3['fuel_type']?></option>
<?php
	}
?>
                                            </select>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Transmission Type</label>
													<select class="form-control" id="l13" name="transmission_id" required>
														<option value=""> -- Select Transmission Type -- </option>
<?php										
	$sql4 = "SELECT * FROM transmission ORDER BY transmission_type";
	$result4 = mysqli_query($conn,$sql4);
	while($row4 = mysqli_fetch_array($result4))
	{
?>
                                                <option value="<?php echo $row4['transmission_id']?>"><?php echo $row4['transmission_type']?></option>
<?php
	}
?>
                                            </select>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Model Year</label>
													<input type="text" class="form-control" name="model_year" placeholder="Enter Model Year" required>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Seating Capacity</label>
													<input type="text" class="form-control" name="seating_capacity" placeholder="Enter Seating Capacity" required>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Vehicle Price</label>
													<input type="text" class="form-control" name="vehicle_price" placeholder="Enter Vehicle Price" required>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Vehicle Vin</label>
													<input type="text" class="form-control" name="vehicle_vin" placeholder="Enter VIN" required>
												</div>	
												
												<div class="form-group">
													<label class="form-label">Kilometers Driven</label>
													<input type="text" class="form-control" name="kms_driven" placeholder="Enter Distance Driven" required>
												</div>

												<div class="form-group">
													<label class="form-label">Vehicle Description</label>
													<textarea class="form-control" name="vehicle_description" placeholder="Enter Vehicle Description" required></textarea>
												</div>
												
												<div class="form-group">
													<label class="form-label">Vehicle Image</label>
													 <input type="file" name="image"  onchange="loadFile(event)">
												</div>
												
											</div>
											<button type="submit" name="submit" value="submit" class="btn btn-primary mt-4 mb-0">Save Vehicle</button>
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