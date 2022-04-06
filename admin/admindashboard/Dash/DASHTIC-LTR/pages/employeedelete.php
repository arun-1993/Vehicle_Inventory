<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from user where user_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:employee.php?msg=success");
	}
	else
	{
		header("Location:employee.php?msg=failure");
	}	
}

?>