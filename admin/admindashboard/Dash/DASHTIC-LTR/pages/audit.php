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
										<h2>User</h2>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0">Model Name</th>
														<th class="wd-15p border-bottom-0">Model Year</th>
														<th class="wd-20p border-bottom-0">Vehicle Price</th>
														<th class="wd-15p border-bottom-0">Vehicle Vin</th>
														<th class="wd-25p border-bottom-0">Kilometers Driven</th>
                                                        <th class="wd-25p border-bottom-0">Sold Date</th>
													</tr>
												</thead>
												<tbody>
<?php
	$selectaudit = $mysqli->prepare("select * from vehicle_audit u JOIN model_master m where u.model_id=m.model_id ");                                                                                
	$selectaudit->execute();	
	$result = $selectaudit->get_result();
		
	while($row=$result->fetch_assoc())
	{
?>
													<tr>
														<td><?php echo $row['model_name']; ?></td>
														<td><?php echo $row['model_year']; ?></td>
														<td><?php echo $row['vehicle_price']; ?></td>
														<td><?php echo $row['vehicle_vin']; ?></td>
														<td><?php echo $row['kms_driven']; ?></td>
                                                        <td><?php echo $row['sold_date']; ?></td>
													</tr>
	<?php
	}
	?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!--/div-->
							</div>
						</div>
						<!-- /Row -->
						</div>
				</div><!-- end app-content-->
			</div>

			<?php include('footer.php') ?>
