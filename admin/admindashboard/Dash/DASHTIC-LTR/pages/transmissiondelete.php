<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from transmission where transmission_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:transmission.php?msg=success");
	}
	else
	{
		header("Location:transmission.php?msg=failure");
	}	
}

?>