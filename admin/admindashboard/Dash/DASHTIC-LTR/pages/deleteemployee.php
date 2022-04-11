<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$employeeid = $_GET['id'];
	$deleteemployee = $mysqli->prepare("delete from user where user_id = ?");
	$deleteemployee->bind_param('i',$employeeid);
	
	$deleteresult = $deleteemployee->execute();
	
	if($deleteresult)
	{
		header("Location:employee.php");
	}
	else
	{
		header("Location:employee.php");
	}	
}

?>