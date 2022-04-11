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
						<h2>Appointment</h2>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered text-nowrap" id="example1">
								<thead>
									<tr>
										<th class="wd-15p border-bottom-0">User Name</th>
										<th class="wd-20p border-bottom-0">Vehicle id</th>
										<th class="wd-20p border-bottom-0">Model Name</th>
										<th class="wd-25p border-bottom-0">Appointment DateTime</th>
										<th class="wd-15p border-bottom-0">Appointment Status</th>
										<th class="wd-15p border-bottom-0">Comments</th>
										<th class = "wd-15p border-bottom-0">Take Action</th>													
									</tr>
								</thead>
												<tbody>
<?php
	$selectappointment = $mysqli->prepare("select * from appointment a JOIN vehicle v JOIN model_master m JOIN user u where a.vehicle_id=v.vehicle_id and v.model_id=m.model_id and a.user_id=u.user_id ORDER BY a.appointment_status,a.appointment_schedule");
	$selectappointment->execute();
	$selectresult = $selectappointment->get_result();
	
	
	while($row=$selectresult->fetch_assoc())
	{
		$aid=$row['appointment_id'];
?>
													<tr>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['vehicle_id']; ?></td>	
														<td><?php echo $row['model_name']; ?></td>
														<td><?php echo $row['appointment_schedule']; ?></td>
														<td><?php 
												$id=$row['appointment_id'];
												if($row['appointment_status']=="Upcoming")
												{
													echo "<h6 style='color:#307FCE'>Upcoming</h6>";
											?>													
											<?php
												}												
												else if($row['appointment_status']=="Completed")
												{
													echo "<h6 style='color:#317B31'>Completed</h6>";
												}
												else if($row['appointment_status']=="Requested")
												{
													echo "<h6 style='color:#D29C36'>Requested</h6>";
												}
												else
												{
													echo "<h6 style='color:#D12D2D'>Cancelled</h6>";
												}
											?></td>
														<td><?php echo $row['appointment_comments']; ?></td>
														
											
											<td>
											
									

<?php
	if($row['appointment_status']=='Requested')
	{
		echo '<select id="action" name="action" onchange="change_appointment(this.value, '.$id.');">';
		echo '<option value=""> --Action-- </option>';
		echo '<option value="accept">Accept</option>';
		echo '<option value="reject">Reject</option>';
		echo '</select>';
	}

	else if($row['appointment_status']=='Upcoming')
	{
		echo '<select id="action" name="action" onchange="change_appointment(this.value, '.$id.');">';
		echo '<option value=""> --Action-- </option>';
		echo '<option value="reject">Reject</option>';
		echo '<option value="finished">Completed</option>';
		echo '</select>';
	}
	
?>
<?php 
	if($row['appointment_status'] == 'Cancelled')
	{	
		echo "Cancelled";
	}
	
	elseif($row['appointment_status'] == "Completed")
	{
		echo "Completed";
	}

?>
											
											
											
											
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

		<script>
			function change_appointment(value, id)
			{
				var path = "appoint-" + value + ".php?id=" + id;
				window.location=path;
			}
		</script>
