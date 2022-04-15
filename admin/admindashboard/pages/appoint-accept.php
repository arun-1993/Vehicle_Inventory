<?php include('header.php');

if(isset($_GET['id']))
{ $status ='Upcoming';
	$id = $_GET['id'];
  $updateappointment = $mysqli->prepare("update `appointment` set appointment_status=? where appointment_id = ?");
  $updateappointment->bind_param('si',$status,$id);
  $result = $updateappointment->execute();
	
	
	if($result)
	{   $selectappointment = $mysqli->prepare("select * from appointment a JOIN vehicle v JOIN model_master m JOIN user u where a.vehicle_id=v.vehicle_id and v.model_id=m.model_id and a.user_id=u.user_id AND a.appointment_id =?");
      $selectappointment->bind_param('i',$id);
      $selectappointment->execute();
      $result = $selectappointment->get_result();
			$row =$result->fetch_assoc();
			$email = $row['email'];
			$date=date('y-m-d');
			$model = $row['model_name'];
			
      $subject = 'Appointment Confirmation';
      $msg = "<h3>Your Appointment For ".$model." has been scheduled and confirmed.  This email is to let you know that your appointment on $date has been confirmed. If you have questions or concerns before your session, kindly let us know in the contact us. <br> Regards, <br> Team Autotrack.</h3>";
      $content = 'Regarding to Your Appointment with AutoTrack '.$msg;
      sendMail($subject, $content);
      header("Location: appointment.php");
	}
}
?>



 
