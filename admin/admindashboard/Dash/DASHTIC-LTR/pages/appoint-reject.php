<?php

include('header.php');

if(isset($_GET['id']))
{
  $status = "Cancelled";
	$appointmentid = $_GET['id'];
	$updateappointment = $mysqli->prepare("update `appointment` set appointment_status=? where appointment_id = ?");
  $updateappointment->bind_param('si',$status,$appointmentid);
	
	$result=$updateappointment->execute();
	
	if($result)
	{
    $selectappointment = $mysqli->prepare("SELECT * FROM appointment a JOIN vehicle v JOIN model_master m JOIN brand_master b JOIN user u WHERE a.vehicle_id=v.vehicle_id AND v.model_id=m.model_id AND m.brand_id=b.brand_id AND a.user_id=u.user_id AND a.appointment_id=?");
    $selectappointment->bind_param('i',$appointmentid);
    $selectappointment->execute();
    $result = $selectappointment->get_result();
    $row =$result->fetch_assoc();
    $email = $row['email'];
    $date=date('y-m-d');
    $model = $row['model_name'];
    
    $subject = 'Appointment Rejected';
    $msg = "<h3>Greetings, <br> Your Appointment For ".$model.". is rejected. Kindly, pick another day appointment. We would like to apology for the inconvenience. <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.</h3>";
		$content = 'Regarding to Your Appointment with AutoTrack'.$msg;

    sendMail($subject, $content);
	
    header("Location: appointment.php");
	}
}
?>

 <?php


 

 if($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = $_POST ['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message= $_POST['message'];
  $msg = "Name : $name <br>Email : $email<br>Phone : $phone<br><br>$message"; 
   
  
}
  
?>