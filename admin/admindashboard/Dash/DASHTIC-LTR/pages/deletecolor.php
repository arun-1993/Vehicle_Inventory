<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$colorid = $_GET['id'];
	$colodelete = "delete from bodycolor where color_id = $colorid";
	$deleteresult = mysqli_query($conn,$colodelete);
	
	if($deleteresult)
	{
		header("Location:bodycolor.php?msg=success");
	}
	else
	{
		header("Location:bodycolor.php?msg=failure");
	}	
}

?>