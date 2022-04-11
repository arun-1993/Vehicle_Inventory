<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$modelid = $_GET['id'];
	$deletemodel = "delete from model_master where model_id = $modelid";
	$deleteresult = mysqli_query($conn,$deletemodel);
	
	if($deleteresult)
	{
		header("Location:model.php?msg=success");
	}
	else
	{
		header("Location:model.php?msg=failure");
	}	
}

?>