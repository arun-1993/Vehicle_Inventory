<?php

include 'header.php';

$id = $_SESSION['userid'];

$selectquery = "select * from appointment a JOIN vehicle v JOIN model_master m JOIN user u where a.vehicle_id=v.vehicle_id and v.model_id=m.model_id and a.user_id=u.user_id AND u.user_role_id = 3 AND u.user_id = $id  ORDER BY appointment_id DESC ";
$result = mysqli_query($conn,$selectquery);

?>
<!--=================================
inner-intro -->

<section class="inner-intro bg-1 bg-overlay-black-70">
	<div class="container">
		<div class="row text-center intro-title">
			<div class="col-md-6 text-md-start d-inline-block">
				<h1 class="text-white">Appointments</h1>
			</div>
			<div class="col-md-6 text-md-end float-end">
				<ul class="page-breadcrumb">

				</ul>
			</div>
		</div>
	</div>
</section>


<section class="inner-service  page-section-ptb">
	<div class="container mt-3 table-responsive">
		<div class="row g-0" style = "border:1px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
			<table  class = "table table-hover table-bordered" >
				<thead style = "background-color:#a52531; ">
					<tr style="color:#ebf3fa;font-size:17px">
						<th>Vehicle</th>
						<th>Schedule</th>								
						<th>Comments</th>	
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(mysqli_num_rows($result) == 0): ?>
					<tr style="color:black">
						<td class="text-center" colspan="5">
							No appointments have been scheduled by you yet. Go on, book an appointment!
						</td>
					</tr>
					<?php else: ?>
					<?php while($row=mysqli_fetch_assoc($result)) : ?>
					<tr style="color:black">														
						<td><?php echo $row['model_name']; ?></td>
						<td><?php echo $row['appointment_schedule']; ?></td>														
						<td><?php echo $row['appointment_comments']; ?></td>
						<td>
							<?php if($row['appointment_status']=="Upcoming") : ?>
							<span style='color:#307FCE'>Upcoming</span>
							<?php elseif($row['appointment_status']=="Completed") : ?>
							<span style='color:#18F70D'>Completed</span>
							<?php elseif($row['appointment_status']=="Requested") : ?>
							<span style='color:#D29C36'>Requested</span>
							<?php else : ?>
							<span style='color:red'>Cancelled</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if($row['appointment_status'] == "Requested" ||$row['appointment_status'] == "Upcoming" ) : ?>
							<a class = "btn btn-outline-danger" href="cancelappointment.php?id=<?php echo $row['appointment_id']; ?>">Cancel</a>
							<?php elseif($row['appointment_status'] == "Cancelled") : ?>
							Cancelled
							<?php else : ?>
							Completed
							<?php endif; ?>
						</td>
					</tr>
					<?php endwhile; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<?php include 'footer.php' ?></body>
</html>