<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from bodycolor where color_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:bodycolor.php?msg=success");
	}
	else
	{
		header("Location:bodycolor.php?msg=failure");
	}	
}

?>