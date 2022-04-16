<?php include('header.php');

$selecttransmission = $mysqli->prepare("select * from transmission") ;
$selecttransmission->execute();
$selectresult = $selecttransmission->get_result();

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
											<h2>Transmission</h2>
											<?php if($_SESSION['Role'] == 1) : ?>
											<h5><a href="<?php echo $root;?>/addtransmission.php" style="color:blue;">ADD TRANSMISSION</a></h5>
											<?php endif; ?>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-25p border-bottom-0">Transmission Id</th>
														<th class="wd-25p border-bottom-0">Transmission Type</th>
														<?php if($_SESSION['Role'] == 1) : ?>
														<th class="wd-25p border-bottom-0">EDIT</th>
														<th class="wd-25p border-bottom-0">DELETE</th>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>
												<?php while($row=mysqli_fetch_assoc($selectresult)) : ?>
													<tr>														
														<td><?php echo $row['transmission_id']; ?></td>
														<td><?php echo $row['transmission_type']; ?></td>
														<?php if($_SESSION['Role'] == 1) : ?>
														<td>
															<a class="btn btn-success" href="<?=$root;?>/transmissionedit.php?id=<?=$row['transmission_id'];?>">EDIT </a>
														</td>
														<td>		
															<a href="<?php echo $root;?>/transmissiondelete.php?id=<?php echo $row['transmission_id']; ?>" class="btn btn-danger delete-confirmation">DELETE</a>			
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