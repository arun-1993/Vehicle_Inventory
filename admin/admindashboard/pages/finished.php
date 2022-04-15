<?php  
	include 'header.php';
	if(isset($_GET['id'])){
	$appointmentid = $_GET['id'];
	$updateappointment = $mysqli->prepare("UPDATE appointment SET appointment_status = 'Completed' WHERE appointment_id = ? ");
	$updateappointment->bind_param('i',$appointmentid);

	$updateappointment->execute();
	?>
	<script> window.location = 'appointment.php'; </script>
	<?php
	}

?>