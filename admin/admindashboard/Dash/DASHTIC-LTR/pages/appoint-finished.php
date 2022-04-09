<?php  
	include 'header.php';
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "UPDATE appointment SET appointment_status = 'Completed' WHERE appointment_id = $id ";
	mysqli_query($conn,$query);?>
	<script> window.location = 'appointment.php'; </script>
	<?php
	}

?>

