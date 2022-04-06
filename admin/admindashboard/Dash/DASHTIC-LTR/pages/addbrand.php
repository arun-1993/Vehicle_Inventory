<?php include('header.php');?>

<div class="page">
	<div class="page-main">

		<!--aside open-->
		<?php include('sidebar.php');?>
		<!--aside closed-->

		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include('pageheader.php');?>
				<!--/app header-->
						<!--Page header-->
						
						
<?php

if(isset($_POST["brand_name"]))
	{
		$bname = $_POST["brand_name"];
		
		if($bname!='')
		{			
			$sql = "insert into brand_master(brand_name) values('".$bname."')";
			//echo $sql;
			//die;
			$result = mysqli_query($conn,$sql);
			
		//	echo "result = " . $result;
			
			if($result)
			{
		
		?>
		<script>window.location = "brand.php"</script>
		<?php	
	}	
		}
		else
		{
		?>
		<script>alert("Please enter a Brand Name");</script>
		<?php
		
		}
	}
?>
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Add Brand</h4>
							</div>
						</div>
						<!--End Page header-->
						<!-- End Row -->

						<!-- Row -->
						<!-- Row -->
						<!-- End Row-->
						<div class="row">
							<div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Brand</h4>
									</div>
									<div class="card-body">
										
											<div class="">
												<form method="POST" action="">
												<div class="form-group">
													<label class="form-label">Brand Name</label>
													<input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name" required/>
												</div>												
											</div>
											<button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save Brand</button>
											</form>
									
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						</div>
				</div><!-- end app-content-->
			</div>		
		</div>
		
			<!--Footer-->
			<?php include('footer.php'); ?>
			<!-- End Footer-->
	</body>
</html>