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
										<h2>Employee</h2>
										<h5><a href="addemployee.php" style="color:blue;">Add Employee</a></h5>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0">First Name</th>
														<th class="wd-15p border-bottom-0">Last Name</th>
														<th class="wd-20p border-bottom-0">Email</th>
														<th class="wd-15p border-bottom-0">Username</th>
														<th class="wd-25p border-bottom-0">Address</th>
														
														<th class="wd-25p border-bottom-0">Delete</th>
													</tr>
												</thead>
												<tbody>
<?php
	$username = $_SESSION['username'];
	$getid = "SELECT user_id from user where username ='$username' ";
	$idquery = mysqli_query($conn,$getid);
	$id = mysqli_fetch_assoc($idquery);
	$userid = $id['user_id'];
	$sql = "select * from user where user_role_id in(1,2) AND user_id != $userid ";
	$result = mysqli_query($conn,$sql);
	
	
	while($row=mysqli_fetch_assoc($result))
	{
		$uid=$row['user_id'];
?>
													<tr>
														<td><?php echo $row['first_name']; ?></td>
														<td><?php echo $row['last_name']; ?></td>
														<td><?php echo $row['email']; ?></td>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['address']; ?></td>
														<td>		
														<a href="employeedelete.php?id=<?php echo $uid?>" class="btn btn-danger delete-confirmation">DELETE</a>
															
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
