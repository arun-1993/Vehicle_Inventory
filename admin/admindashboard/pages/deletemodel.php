<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$modelid = $_GET['id'];
	$deletemodel = $mysqli->prepare("delete from model_master where model_id = ?");
	$deletemodel->bind_param('i',$modelid);
	$deleteresult = $deletemodel->execute();
	
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