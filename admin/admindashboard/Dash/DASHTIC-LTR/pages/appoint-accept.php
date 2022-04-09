<?php include('header.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql="update `appointment` set appointment_status='Upcoming' where appointment_id = '".$id."'";
	
	$result=mysqli_query($conn,$sql);
	
	if($result)
	{
			$sql = "select * from appointment a JOIN vehicle v JOIN model_master m JOIN user u where a.vehicle_id=v.vehicle_id and v.model_id=m.model_id and a.user_id=u.user_id";
			$res = mysqli_query($conn,$sql);
			$row =mysqli_fetch_array($res);
			$email = $row['email'];
			$date=date('y-m-d');
			$model = $row['model_name'];
			$msg = "<h3>Your Appointment For ".$model." has been scheduled and confirmed.  This email is to let you know that your [Service name] appointment on $date has been confirmed. If you have questions or concerns before your session, kindly let us know in the contact us. <br> Regards, <br> Team Autotrack.</h3>";
       
		
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
    $mail->Subject = 'Appointment Confirmation';
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



 
