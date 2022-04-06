<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from vehicle where vehicle_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:vehicle.php?msg=success");
	}
	else
	{
		header("Location:vehicle.php?msg=failure");
	}	
}

?>