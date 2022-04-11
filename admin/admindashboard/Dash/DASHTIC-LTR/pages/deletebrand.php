<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$brandid = $_GET['id'];
	$deletebrand = $mysqli->prepare("delete from brand_master where brand_id = ?");
	$deletebrand->bind_param('i',$brandid);
	$deletebrand->execute();
	$deleteresult = $deletebrand->get_result();
	
	if($deleteresult)
	{
		header("Location:brand.php?msg=success");
	}
	else
	{
		header("Location:brand.php?msg=failure");
	}	
}

?>