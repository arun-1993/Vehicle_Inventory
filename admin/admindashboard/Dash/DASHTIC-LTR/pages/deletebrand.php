<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$brandid = $_GET['id'];
	$deletebrand = "delete from brand_master where brand_id = $brandid";
	$deleteresult = mysqli_query($conn,$deletebrand);
	
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