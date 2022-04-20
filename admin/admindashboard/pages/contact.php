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
						<!--End Page header-->

						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
										<h2>Contact</h2>										
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example2">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Name</th>
														<th class="wd-25p border-bottom-0">Email</th>
														<th class="wd-25p border-bottom-0">Phone No.</th>
														<th class="wd-25p border-bottom-0">Message</th>
														<th class="wd-25p border-bottom-0">DateTime</th>
													</tr>
												</thead>
												<tbody>
<?php
	$selectcontact = $mysqli->prepare("SELECT * from contact ORDER BY feedback_time DESC");
	$selectcontact->execute();
	$selectresult = $selectcontact->get_result();
	
	
	while($row=mysqli_fetch_assoc($selectresult))
	{		
?>
													<tr>
														<td><?php echo $row['name']; ?></td>													
														<td><?php echo $row['email']; ?></td>
														<td><?php echo $row['phone']; ?></td>
														<td><?php echo $row['message']; ?></td>
														<td><?php echo $row['feedback_time']; ?></td>
														
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
				</div>
			</div>

			<?php include('footer.php') ?>