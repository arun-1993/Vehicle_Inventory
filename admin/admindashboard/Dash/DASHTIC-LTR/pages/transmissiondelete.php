<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$deletetransmission =  $mysqli->prepare("delete from transmission where transmission_id = ?");
	$deletetransmission->bind_param('i',$id);
	
	$result =$deletetransmission->execute();
	
	if($result)
	{
		header("Location:transmission.php");
	}
	else
	{
		header("Location:transmission.php");
	}	
}

?>