<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from fuel_type where fuel_type_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:fueltype.php?msg=success");
	}
	else
	{
		header("Location:fueltype.php?msg=failure");
	}	
}

?>