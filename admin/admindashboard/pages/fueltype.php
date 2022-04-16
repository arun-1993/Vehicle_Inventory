<?php

include('header.php');

$sql = "select * from fuel_type";
$selectresult = mysqli_query($conn,$sql);

?>

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
											<h2>Fuel Type</h2>
											<?php if($_SESSION['Role'] == 1) : ?>
											<h5><a href="<?php echo $root;?>/addfuel.php" style="color:blue;">ADD FUEL TYPE</a></h5>
											<?php endif; ?>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Fuel Id</th>
														<th class="wd-25p border-bottom-0">Fuel Type</th>
														<?php if($_SESSION['Role'] == 1) : ?>
														<th class="wd-25p border-bottom-0">EDIT</th>
														<th class="wd-25p border-bottom-0">DELETE</th>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>
												<?php while($row=mysqli_fetch_assoc($selectresult)) : ?>
													<tr>														
														<td><?php echo $row['fuel_type_id']; ?></td>
														<td><?php echo $row['fuel_type']; ?></td>
														<?php if($_SESSION['Role'] == 1) : ?>
														<td>
															<a class="btn btn-success" href="editfueltype.php?id=<?=$row['fuel_type_id'];?>">EDIT </a>
														</td>
														<td>
															<a href="<?php echo $root;?>/deletefueltype.php?id=<?php echo $row['fuel_type_id']?>" class="btn btn-danger delete-confirmation">DELETE</a>
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
