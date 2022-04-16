<?php include('header.php');?>

<?php

	$selectbodycolor = $mysqli->prepare("SELECT * FROM bodycolor");
	$selectbodycolor->execute();
	$selectresult = $selectbodycolor->get_result();

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
											<h2>Exterior Color</h2>
											<?php if($_SESSION['Role'] == 1) : ?>
											<h5><a href="<?php echo $root;?>/addcolor.php" style="color:blue;">ADD EXTERIOR COLOR</a></h5>
											<?php endif; ?>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Color Id</th>
														<th class="wd-25p border-bottom-0">Color</th>
														<?php if($_SESSION['Role'] == 1) : ?>
														<th class="wd-25p border-bottom-0">Edit</th>
														<th class="wd-25p border-bottom-0">Delete</th>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>

												<?php while($row=$selectresult->fetch_assoc()) : ?>
													<tr>														
														<td><?php echo $row['color_id']; ?></td>
														<td><?php echo $row['color']; ?></td>
														<?php if($_SESSION['Role'] == 1) : ?>
														<td>
															<a class="btn btn-success" href="editcolor.php?id=<?=$row['color_id'];?>">EDIT</a>
														</td>
														<td>		
															<a href="<?php echo $root;?>/deletecolor.php?id=<?php echo $row['color_id']; ?>" class="btn btn-danger delete-confirmation">DELETE</a>
														</td>
														<?php endif; ?>
													</tr>
												<?php endwhile; ?>
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
