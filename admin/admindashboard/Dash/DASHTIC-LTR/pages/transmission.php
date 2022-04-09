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
										<h2>Transmission</h2>
										<h5><a href="addtransmission.php" style="color:blue;">ADD TRANSMISSION</a></h5>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Transmission Id</th>
														<th class="wd-25p border-bottom-0">Transmission Type</th>											
														<th class="wd-25p border-bottom-0">EDIT</th>
														<th class="wd-25p border-bottom-0">DELETE</th>
													</tr>
												</thead>
												<tbody>
<?php
	$sql = "select * from transmission";
	$result = mysqli_query($conn,$sql);
	
	
	while($row=mysqli_fetch_assoc($result))
	{
		$tid=$row['transmission_id'];
?>
													<tr>														
														<td><?php echo $row['transmission_id']; ?></td>
														<td><?php echo $row['transmission_type']; ?></td>
														<td>
														<form action="transmissionedit.php" method="post">
															<input type="hidden" name="edit_id" value="<?php echo $row['transmission_id']; ?>">
															<button type="submit" name="edit_btn" class="btn btn-success">EDIT </button>
														</form>
														</td>
														<td>		
														<a href="transmissiondelete.php?id=<?php echo $tid?>" class="btn btn-danger delete-confirmation">DELETE</a>
															
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
								<!--/div-->
							</div>
						</div>
						<!-- /Row -->
						</div>
				</div><!-- end app-content-->
			</div>

			<?php include('footer.php') ?>