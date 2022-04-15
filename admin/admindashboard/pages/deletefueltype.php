<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$fueltypeid = $_GET['id'];
	$deletefueltype = $mysqli->prepare("delete from fuel_type where fuel_type_id = ?");
	$deletefueltype->bind_param('i',$fueltypeid);
	$deletefueltype->execute();
	$result = $deletefueltype->get_result();
	
	if($result)
	{
		header("Location:fueltype.php");
	}
	else
	{
		header("Location:fueltype.php");
	}	
}

?>