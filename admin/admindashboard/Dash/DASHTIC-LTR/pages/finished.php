<?php  
	include 'header.php';
	if(isset($_GET['id'])){
	$appointmentid = $_GET['id'];
	$updateappointment = "UPDATE appointment SET appointment_status = 'Completed' WHERE appointment_id = $appointmentid ";
	mysqli_query($conn,$updateappointment);?>
	<script> window.location = 'appointment.php'; </script>
	<?php
	}

?>