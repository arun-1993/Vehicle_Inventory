<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$colorid = $_GET['id'];
	$colordelete = $mysqli->prepare("delete from bodycolor where color_id = ?");
	$colordelete->bind_param('i',$colorid);
	
	$deleteresult =$colordelete->execute();
	
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