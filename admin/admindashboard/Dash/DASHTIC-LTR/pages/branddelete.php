<?php require_once("_dbconnect.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "delete from brand_master where brand_id = $id";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		header("Location:brand.php?msg=success");
	}
	else
	{
		header("Location:brand.php?msg=failure");
	}	
}

?>