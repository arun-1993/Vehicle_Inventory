<?php include 'header.php'?>

<?php 
 

 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES)){
 $image = $_FILES['photo']['name'];
 $username= $_SESSION['username'];
 $query = "Update user set user_image = '$image' where username ='$username' ";
 mysqli_query($conn,$query);
 if(mysqli_query($conn,$query)){
	 $extension = pathinfo($image,PATHINFO_EXTENSION);
	 $random = rand(0,10000);
	 $rename = 'upload'.date('ymd'). $random;
	 $newname = $rename. '.' . $extension;
	 $query = "Update user set user_image = '$newname' where username ='$username' ";
	 mysqli_query($conn,$query);
	 move_uploaded_file($_FILES['photo']['tmp_name'],'../public/assets/images/users/'.$newname);

 }
 
 }
if (isset($_SESSION['username'])) {
	 
	$username =$_SESSION['username'];
	$selectuser = $mysqli->prepare(" SELECT * FROM USER WHERE username = ? OR email = ? AND (user_role_id=1 OR user_role_id=2) ") ;
	$selectuser->bind_param('ss',$username,$username);
	$selectuser->execute();
	$result = $selectuser->get_result();
	$row = $result->fetch_assoc();
}
else{
	
	?>
	<script>window.location= 'login.php';</script>
	<?php
	
}


?>




<body class="app sidebar-mini light-mode default-sidebar">
		<!-- Start Switcher -->
		<div class="switcher-wrapper">
		</div>
		<!-- End Switcher -->
<!---Global-loader-->
<div id="global-loader" >
	<img src="https://codeigniter.spruko.com/Dashtic/DASHTIC-LTR/public/assets/images/svgs/loader.svg" alt="loader">
	
</div>

<div class="page">
	<div class="page-main">

		<!--aside open-->
		<?php include 'sidebar.php';?> 
		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include 'pageheader.php';?>
				<!--/app header-->
						<!--Page header-->
						
						<!--End Page header-->
						<!--/app header-->
						
							<div class="page-leftheader">
								<h4 class="page-title">Profile</h4>
							</div>
					</br>
						<div class="main-proifle">
							<div class="row">
								<div class="col-lg-7">
									<div class="box-widget widget-user">
										<div class="widget-user-image d-sm-flex">
											<img alt="User Avatar" id = "output" class="rounded-circle border p-0" src="<?php echo $root?>/../public/assets/images/users/<?php echo $row['user_image'];?>" style ="height:25%;width:20%">
											
											<div class="ml-sm-4 mt-4">
												<h4 class="pro-user-username mb-3 font-weight-bold">&nbsp;&nbsp;<?php echo $row['first_name'] . '&nbsp'. $row['last_name']?>&nbsp;<i class="fa fa-check-circle text-success"></i></h4>
												<div class="d-flex mb-1">
			
												<div class="h6 mb-0 ml-3 mt-1"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['username']?></div>
												</div>
												<div class="d-flex mb-1">
													
													<div class="h6 mb-0 ml-3 mt-1"><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp; <?php echo $row['email']?></div>
												</div>
												<div class="d-flex mb-1">
													<div class="h6 mb-0 ml-3 mt-1">
														
														<form method="POST" enctype="multipart/form-data">
														<i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;&nbsp;
														<label for="upload-photo">Edit Image</label>&nbsp;&nbsp;
												    	<input type="file" name="photo"  onchange="loadFile(event)" id="upload-photo" style= "opacity: 0;position: absolute;z-index: -1;" required/>
														<input type="submit" value="Save"/>
														
													
													</form>
												</a>
</div>	
											</div>
											</div>
										</div>
									</div>
											
														<script>
																	var loadFile = function(event) {
																		// document.getElementById('output').style="height:100px;width:100px;visibility=visible";
																		var image = document.getElementById('output');
																		image.src = URL.createObjectURL(event.target.files[0]);
																	};
																	</script>
								</div>
								<div class="col-lg-5 col-md-auto">
									<div class="text-lg-right mt-4 mt-lg-0">
										</a>
									</div>
									
								</div>
							</div>
						</div>
						<!-- Row -->
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="border-0">
									<div class="tab-content">
										<div class="tab-pane active" id="tab-7">
											<div class="card">
												<div class="card-body border-top">
													<h5 class="font-weight-bold"><i class="fa fa-user-o"></i> Role</h5>
													<h6><?php if($row['user_role_id']==1){
														echo 'Super-Admin' ;}
														else{
															echo 'Admin';
														}
														?></h6>
												</div>	
											</div>													
											<div class="card">													
												<div class="card-body border-top">
													<h5 class="font-weight-bold">Contact</h5>
														<div class="h6 mb-0 ml-0 mt-1"><i class="fa fa-envelope"></i>&nbsp;&nbsp; <?php echo $row['email']?>
												</div>
											</div>
										</div>											
														
										<div class="card-body border-top">			
													<div class="logout" style ="padding-top:10px">
														<a href="<?php echo $root;?>/editprofile.php?id=<?php echo $row['user_id'];?>" class="btn btn-gray">Edit Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<a href="<?php echo $root;?>/signout.php" class="btn btn-gray">Sign Out</a>
													</div>
														</div>
													</div><!-- main-profile-contact-list -->
												</div>
											</div>
										</div>
										

									</div>
								</div>
							</div>
						</div>
						</div>
				</div><!-- end app-content-->
			</div>

			
		<?php include 'footer.php';?>

	</body>


</html>

