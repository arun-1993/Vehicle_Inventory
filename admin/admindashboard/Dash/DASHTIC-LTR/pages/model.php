<?php include('header.php');?>

<?php

$selectmodel = $mysqli->prepare("select * from model_master m JOIN brand_master b where m.brand_id=b.brand_id");
$selectmodel->execute();
$selectresult = $selectmodel->get_result();

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
											<h2>Model</h2>
											<?php if($_SESSION['Role'] == 1) : ?>
											<h5><a href="<?php echo $root;?>/addmodel.php" style="color:blue;">ADD MODEL</a></h5>
											<?php endif; ?>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Model Id</th>
														<th class="wd-25p border-bottom-0">brand Name</th>
														<th class="wd-25p border-bottom-0">Model Name</th>
														<?php if($_SESSION['Role'] == 1) : ?>
														<th class="wd-25p border-bottom-0">Edit</th>
														<th class="wd-25p border-bottom-0">Delete</th>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>
												<?php while($row=mysqli_fetch_assoc($selectresult)) : ?>
													<tr>														
														<td><?php echo $row['model_id']; ?></td>
														<td><?php echo $row['brand_name']; ?></td>
														<td><?php echo $row['model_name']; ?></td>
														<?php if($_SESSION['Role'] == 1) : ?>
														<td>
															<a href="<?php echo $root;?>/editmodel.php?id=<?php echo $row['model_id']; ?>" class="btn btn-success">EDIT</a>
														</td>
														<td>		
															<a href="<?php echo $root;?>/deletemodel.php?id=<?php echo $row['model_id']; ?>" class="btn btn-danger delete-confirmation">DELETE</a>
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