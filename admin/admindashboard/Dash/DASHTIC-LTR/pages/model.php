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
										<h2>Model</h2>
										<h5><a href="addmodel.php" style="color:blue;">ADD MODEL</a></h5>
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
														<th class="wd-25p border-bottom-0">Edit</th>
														<th class="wd-25p border-bottom-0">Delete</th>
													</tr>
												</thead>
												<tbody>
<?php
	$selectmodel = "select * from model_master m JOIN brand_master b where m.brand_id=b.brand_id";
	$selectresult = mysqli_query($conn,$selectmodel);
	
	
	while($row=mysqli_fetch_assoc($selectresult))
	{
		$mid=$row['model_id'];
		$name=$row['brand_name'];
?>
													<tr>														
														<td><?php echo $row['model_id']; ?></td>
														<td><?php echo $row['brand_name']; ?></td>
														<td><?php echo $row['model_name']; ?></td>
														<td>
														<!--<form action="modeledit.php" method="post">
															<input type="hidden" name="edit_id" value="// echo $row['model_id']; ?>">
															<button type="submit" name="edit_btn" class="btn btn-success">EDIT </button>
														</form>-->
														<a href="modeledit.php?id=<?php echo $mid?>&name=<?php echo $name?>" class="btn btn-success">EDIT</a>
														</td>
														<td>		
														<a href="modeldelete.php?id=<?php echo $mid?>" class="btn btn-danger delete-confirmation">DELETE</a>
															
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