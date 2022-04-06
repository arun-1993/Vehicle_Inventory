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
										<h2>Brand</h2>
										<h5><a href="addbrand.php" style="color:blue;">ADD BRAND</a></h5>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Brand Id</th>
														<th class="wd-25p border-bottom-0">Brand Name</th>
														<th class="wd-25p border-bottom-0">EDIT</th>
														<th class="wd-25p border-bottom-0">DELETE</th>
													</tr>
												</thead>
												<tbody>
<?php
	$sql = "select * from brand_master ";
	$result = mysqli_query($conn,$sql);
	
	
	while($row=mysqli_fetch_assoc($result))
	{
		$bid=$row['brand_id'];
?>
													<tr>														
														<td><?php echo $row['brand_id']; ?></td>
														<td><?php echo $row['brand_name']; ?></td>
														<td>
														<form action="brandedit.php" method="post">
															<input type="hidden" name="edit_id" value="<?php echo $row['brand_id']; ?>">
															<button type="submit" name="edit_btn" class="btn btn-success">EDIT </button>
														</form>
														</td>
														<td>		
														<a href="branddelete.php?id=<?php echo $bid?>" class="btn btn-danger delete-confirmation">DELETE</a>
															
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
