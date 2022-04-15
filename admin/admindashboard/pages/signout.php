
<?php
session_start();

unset($_SESSION['loggedin'],
$_SESSION['username'],
$_SESSION['Userid'],
$_SESSION['Email'], 
$_SESSION['Name']);


header('location: login.php');

?>