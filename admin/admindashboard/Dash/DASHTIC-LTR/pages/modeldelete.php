<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from model_master where model_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:model.php?msg=success");
	}
	else
	{
		header("Location:model.php?msg=failure");
	}	
}

?>