

<?php
session_start();

unset($_SESSION['Loggedin'],
$_SESSION['Username'],
$_SESSION['userid'],
$_SESSION['email'], 
$_SESSION['name']);
$loggedin = false;

header('location: index.php');

?>
