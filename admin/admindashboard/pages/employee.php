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
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
										<h2>Employee</h2>
										<h5><a href="<?php echo $root;?>/addemployee.php" style="color:blue;">Add Employee</a></h5>
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
	$getid = $mysqli->prepare("SELECT user_id from user where username =? ");
	$getid->bind_param('i',$username);
	$getid->execute();
	$idquery = $getid->get_result();
	$id = $idquery->fetch_assoc();
	$userid = $id['user_id'];
	$selectemployee = $mysqli->prepare("select * from user where user_role_id in(1,2) AND user_id != ? ");
	$selectemployee -> bind_param('i',$userid);
	$selectemployee->execute();
	$result = $selectemployee->get_result();
	
	
	while($row=$result->fetch_assoc())
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
														<a href="<?php echo $root;?>/deleteemployee.php?id=<?php echo $uid?>" class="btn btn-danger delete-confirmation">DELETE</a>
															
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
