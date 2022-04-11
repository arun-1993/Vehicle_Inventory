<?php include('header.php');?>

<?php

$selectbodycolor = "select * from bodycolor";
$selectresult = mysqli_query($conn,$selectbodycolor);

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
											<h5><a href="addcolor.php" style="color:blue;">ADD EXTERIOR COLOR</a></h5>
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
												<?php while($row=mysqli_fetch_assoc($selectresult)) : ?>
													<tr>														
														<td><?php echo $row['color_id']; ?></td>
														<td><?php echo $row['color']; ?></td>
														<?php if($_SESSION['Role'] == 1) : ?>
														<td>
															<form action="coloredit.php" method="post">
																<input type="hidden" name="edit_id" value="<?php echo $row['color_id']; ?>">
																<button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
															</form>
														</td>
														<td>		
															<a href="deletecolor.php?id=<?php echo $row['color_id']; ?>" class="btn btn-danger delete-confirmation">DELETE</a>
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
