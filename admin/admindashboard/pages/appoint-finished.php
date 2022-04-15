<?php  
	include 'header.php';
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$completeappointment = $mysqli->prepare("UPDATE appointment SET appointment_status = 'Completed' WHERE appointment_id = ?");
		$completeappointment->bind_param('i',$id);
		$completeappointment->execute();
		header("Location: appointment.php");
	}
?>

