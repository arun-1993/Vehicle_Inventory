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
						<!--End Page header-->

						<!-- Row -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
										<h2>Vehicle</h2>
										<h5><a href="addvehicle.php" style="color:blue;">ADD VEHICLE</a></h5>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1" >
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Vehicle Image</th>
														<th class="wd-15p border-bottom-0">Model Name</th>
														<th class="wd-15p border-bottom-0">Color</th>
														<th class="wd-20p border-bottom-0">Fuel Type</th>
														<th class="wd-15p border-bottom-0">Transmission Type</th>
														<th class="wd-10p border-bottom-0">Model Year</th>
														<th class="wd-25p border-bottom-0">Seating Capacity</th>
														<th class="wd-25p border-bottom-0">Vehicle Price</th>
														<th class="wd-25p border-bottom-0">Vehicle Vin</th>
														<th class="wd-25p border-bottom-0">Kms-driven</th>														
														<th class="wd-25p border-bottom-0">Edit</th>
														<th class="wd-25p border-bottom-0">Delete</th>
													</tr>
												</thead>
												<tbody>
<?php
	$selectvehicle = $mysqli->prepare("select * from vehicle v JOIN model_master m JOIN bodycolor c JOIN fuel_type f JOIN transmission t where v.model_id=m.model_id and v.exterior_color=c.color_id and v.fuel_type_id=f.fuel_type_id and v.transmission_id=t.transmission_id ORDER BY model_name") ;
	$selectvehicle->execute();

	$result = $selectvehicle->get_result();
	
	
	while($row=$result->fetch_assoc())
	{
		$vid=$row['vehicle_id'];
		$model=$row['model_name'];
		$color=$row['color'];
		$fuel=$row['fuel_type'];
		$trans=$row['transmission_type'];
?>
													<tr>
														<td><img src="../../../../../themes/html/vehicleinventory/images/car/<?php echo $row['vehicle_image']?>" height="100" width="350" style="border-radius:12%"></td>
														<td><?php echo $row['model_name']; ?></td>
														<td><?php echo $row['color']; ?></td>
														<td><?php echo $row['fuel_type']; ?></td>
														<td><?php echo $row['transmission_type']; ?></td>
														<td><?php echo $row['model_year']; ?></td>
														<td><?php echo $row['seating_capacity']; ?></td>
														<td><?php echo $row['vehicle_price']; ?></td>
														<td><?php echo $row['vehicle_vin']; ?></td>
														<td><?php echo $row['kms_driven']; ?></td>														
														<td>
														<a href="vehicleedit.php?id=<?php echo $vid?>&model=<?php echo $model?>&color=<?php echo $color?>&fuel=<?php echo $fuel?>&trans=<?php echo $trans?>" class="btn btn-success">EDIT</a>
														</td>
														<td>		
														<a href="vehicledelete.php?id=<?php echo $vid?>" class="btn btn-danger audit-confirmation">DELETE</a>
													</tr>
	<?php
	}
	?>
												</tbody>
											</table>
										</div>
									</div>
								</div>															</div>
						</div>
						<!-- /Row -->
						</div>
				</div><!-- end app-content-->
			</div>

			<?php include('footer.php') ?>
			

	<script>
			var elems = document.getElementsByClassName('audit-confirmation');
			var confirmIt = function (e) {
				var dialog = 'Only use the delete function if the vehicle has been sold.\nIf you are trying to delete it due to an error in the information,\nplease use the edit function or contact the administrator.\nARE YOU SURE THE CAR HAS BEEN SOLD?'
				if (!confirm(dialog)) e.preventDefault();
			};
			for (var i = 0, l = elems.length; i < l; i++) {
				elems[i].addEventListener('click', confirmIt, false);
			}
	</script>
