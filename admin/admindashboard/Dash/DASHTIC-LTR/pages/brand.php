<?php include('header.php');?>

<?php

$selectbrand = "select * from brand_master ";
$selectresult = mysqli_query($conn,$selectbrand);

?>

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
										<h2>Brand</h2>
										<?php if($_SESSION['Role'] == 1) : ?>
										<h5><a href="addbrand.php" style="color:blue;">ADD BRAND</a></h5>
										<?php endif; ?>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Brand Id</th>
														<th class="wd-25p border-bottom-0">Brand Name</th>
														<?php if($_SESSION['Role'] == 1) : ?>
														<th class="wd-25p border-bottom-0">EDIT</th>
														<th class="wd-25p border-bottom-0">DELETE</th>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>
												<?php while($row=mysqli_fetch_assoc($selectresult)) : ?>
													<tr>
														<td><?php echo $row['brand_id']; ?></td>
														<td><?php echo $row['brand_name']; ?></td>
														<?php if($_SESSION['Role'] == 1) : ?>
														<td>
															<form action="editbrand.php" method="post">
																<input type="hidden" name="edit_id" value="<?php echo $row['brand_id']; ?>">
																<button type="submit" name="edit_btn" class="btn btn-success">EDIT </button>
															</form>
														</td>
														<td>		
															<a href="deletebrand.php?id=<?php echo $row['brand_id']?>" class="btn btn-danger delete-confirmation">DELETE</a>	
														</td>
														<?php endif; ?>
													</tr>
												<?php endwhile; ?>
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
