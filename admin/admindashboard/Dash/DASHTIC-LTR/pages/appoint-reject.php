<?php include('header.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_GET['id']))
{
	$appointmentid = $_GET['id'];
	$sql="update `appointment` set appointment_status='Cancelled' where appointment_id = '".$appointmentid."'";
	
	$result=mysqli_query($conn,$sql);
	
	if($result)
	{
			$sql = "SELECT * FROM appointment a JOIN vehicle v JOIN model_master m JOIN brand_master b JOIN user u WHERE a.vehicle_id=v.vehicle_id AND v.model_id=m.model_id AND m.brand_id=b.brand_id AND a.user_id=u.user_id AND a.appointment_id=$appointmentid";
			$res = mysqli_query($conn,$sql);
			$row =mysqli_fetch_array($res);
			$email = $row['email'];
			$date=date('y-m-d');
			$model = $row['model_name'];
			$msg = "<h3>Greetings, <br> Your Appointment For ".$model.". is rejected. Kindly, pick another day appointment. We would like to apology for the inconvenience. <br> This is System generated mail kindly do not reply. <br> Regards, <br> Team Autotrack.</h3>";
		
include_once('mail/login_credentials.php');
  
  require 'mail/vendor/autoload.php';
  
  $mail = new PHPMailer(true);
  
  try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com;';
    $mail->SMTPAuth   = true;
    $mail->Username   = Username;
    $mail->Password   = Password;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    
    $mail->setFrom('info.autotrackinida@gmail.com', 'AutoTrack');
    $mail->addAddress('arun0306.r@gmail.com');
    $mail->addAddress('jitendrabhavsar469@gmail.com');
    $mail->addAddress('riyavora16@gmail.com');
	  $mail->addAddress($email);
    
    $mail->isHTML(true);
    $mail->Subject = 'Appointment Rejected';
    $mail->Body    = 'Regarding to Your Appointment with AutoTrack'.$msg; 
    
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
	
    //echo "Mail has been sent successfully!";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
	
?>
<script>window.location= 'appointment.php';</script>
<?php
				
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