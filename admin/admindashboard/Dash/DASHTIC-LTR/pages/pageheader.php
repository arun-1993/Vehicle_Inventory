<?php include '_dbconnect.php';?>

<?php 
if (isset($_SESSION['username'])) {
	 
	$username =$_SESSION['username'];
	$query = " SELECT * FROM USER WHERE username = '$username' OR email = '$username' AND (user_role_id=1 OR user_role_id=2) ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
}
else{
	
	?>
	<script>window.location= 'login.php';</script>
	<?php
	
}

?>
				<div class="app-header header top-header">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="index.php">
								<img src="<?php echo $root?>/logoopt4.png" class="header-brand-img desktop-lgo" alt="logo">
								<img src="<?php echo $root?>/logoopt4.png" class="header-brand-img dark-logo" alt="logo">
								<img src="<?php echo $root?>/logo-icon.png" class="header-brand-img mobile-logo" alt="logo">
								<img src="<?php echo $root?>/logo-icon.png" class="header-brand-img darkmobile-logo" alt="logo">
							</a>
							<div class="dropdown side-nav">
								<div class="app-sidebar__toggle" data-toggle="sidebar">
									<a class="open-toggle" href="">
										<svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
									</a>
									<a class="close-toggle" href="">
										<svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
									</a>
								</div>
							</div>
							<div class="dropdown  header-option">
								
								<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
									<a class="dropdown-item" href="">
										App Design Projects
									</a>
									<a class="dropdown-item" href="">
										Web Design Projects
									</a>
									<a class="dropdown-item" href="">
										App Development Projects
									</a>
									<a class="dropdown-item" href="">
										Back-End Projects
									</a>
									<div class="text-left pr-5 pl-5 p-2 border-top">
										<a href="<?php echo $root;?>/" class="">View Projects</a>
									</div>
								</div>
							</div>
							<div class="d-flex order-lg-2 ml-auto">
				<div class="dropdown profile-dropdown">
									<a href="<?php echo $root;?>/profile.php" class="nav-link pr-0 leading-none"  >
										<span>
											<img src="<?php echo $root?>/../public/assets/images/users/<?php echo $row['user_image'];?>" alt="img" class="avatar avatar-md brround">
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
										<a class="dropdown-item d-flex" href="profile.php">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>&nbsp;&nbsp;&nbsp;&nbsp;
											<div class="mt-0">Profile</div>
										</a>										
										<a class="dropdown-item d-flex" href="signout.php">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
  <path d="M7.5 1v7h1V1h-1z"/>
  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg>&nbsp;&nbsp;&nbsp;&nbsp;
											<div class="mt-0">Sign Out</div>
										</a>
									</div>
								</div>
						</div>
					</div>
				</div>
</div>
							
                        