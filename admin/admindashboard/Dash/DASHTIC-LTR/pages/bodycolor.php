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
										<h2>Exterior Color</h2>
										<h5><a href="addcolor.php" style="color:blue;">ADD EXTERIOR COLOR</a></h5>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Color Id</th>
														<th class="wd-25p border-bottom-0">Color</th>											
														<th class="wd-25p border-bottom-0">Edit</th>
														<th class="wd-25p border-bottom-0">Delete</th>
													</tr>
												</thead>
												<tbody>
<?php
	$selectbodycolor = "select * from bodycolor";
	$selectresult = mysqli_query($conn,$selectbodycolor);
	
	
	while($row=mysqli_fetch_assoc($selectresult))
	{
		$cid=$row['color_id'];
?>
													<tr>														
														<td><?php echo $row['color_id']; ?></td>
														<td><?php echo $row['color']; ?></td>
														<td>
														<form action="editcolor.php" method="post">
															<input type="hidden" name="edit_id" value="<?php echo $row['color_id']; ?>">
															<button type="submit" name="edit_btn" class="btn btn-success">EDIT </button>
														</form>
														</td>
														<td>		
														<a href="deletecolor.php?id=<?php echo $cid?>" class="btn btn-danger delete-confirmation">DELETE</a>
															
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
							</div>
						</div>
						</div>
				</div>
			</div>

			<?php include('footer.php') ?>
