<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$employeeid = $_GET['id'];
	$deleteemployee = "delete from user where user_id = $employeeid";
	$deleteresult = mysqli_query($conn,$deleteemployee);
	
	if($deleteresult)
	{
		header("Location:employee.php?msg=success");
	}
	else
	{
		header("Location:employee.php?msg=failure");
	}	
}

?>