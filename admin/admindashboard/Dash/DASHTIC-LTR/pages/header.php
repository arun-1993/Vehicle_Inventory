<?php

session_start();
ob_start();
$root= "http://" . $_SERVER['SERVER_NAME'].substr(str_replace('\\', '/', realpath(dirname(__FILE__))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])))); 

include_once '_dbconnect.php';
include_once 'mail/login_credentials.php';  
include_once 'mail/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail(string $subject, string $html_content) : ?string
{
	$mail = new PHPMailer(true);
	
	try
	{
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com;';
		$mail->SMTPAuth   = true;
		$mail->Username   = Username;
		$mail->Password   = Password;
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		
		$mail->setFrom('info.autotrackindia@gmail.com', 'AutoTrack');
		$mail->addAddress('arun0306.r@gmail.com');
		$mail->addAddress('jitendrabhavsar469@gmail.com');
		$mail->addAddress('riyavora16@gmail.com');
		
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $html_content; 
		
		$mail->AltBody = strip_tags($html_content);
		$mail->send();
		//echo "Mail has been sent successfully!";

	} catch (Exception $e) {
		return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

	return null;
}

function create_password(int $password_length) : string
{
	$character_set = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$characters_length = strlen($character_set);
	$password = '';
	
	for ($i = 0; $i < $password_length; $i++)
	{
		$password .= $character_set[random_int(0, $characters_length - 1)];
	}
	
	return $password;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>

		<!-- Title -->
		<title>AutoTrack</title>

		<link href="../public/assets/css/bootstrap-datetimepicker.css" rel="stylesheet" />

		<link href="../public/assets/css/jquery.datetimepicker.min.css" rel="stylesheet" />
 
		<!--Favicon -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="../public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

		<!-- Style css -->
		<link href="../public/assets/css/style.css" rel="stylesheet" />

		<!-- Dark css -->
		<link href="../public/assets/css/dark.css" rel="stylesheet" />

		<!-- Skins css -->
		<link href="../public/assets/css/skins.css" rel="stylesheet" />

		<!-- Animate css -->
		<link href="../public/assets/css/animated.css" rel="stylesheet" />

		<!---Icons css-->
		<link href="../public/assets/plugins/web-fonts/icons.css" rel="stylesheet" />
		<link href="../public/assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="../public/assets/plugins/web-fonts/plugin.css" rel="stylesheet" />

		<!--Sidemenu css -->
        <link id="theme" href="../public/assets/css/sidemenu.css" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="../public/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

		<!-- Switcher css -->
		<link href="../public/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="../public/assets/switcher/demo.css" rel="stylesheet">

		</head>
		
		<body class="app sidebar-mini light-mode default-sidebar">

		

