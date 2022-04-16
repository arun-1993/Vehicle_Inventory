		<?php include 'header.php';
require_once '_dbconnect.php';
$emailtaken = false; // assumes that mail id is not taken initially

if ("POST" == $_SERVER["REQUEST_METHOD"] && isset($_SESSION['Username'])) {
 $username  = $_SESSION['Username'];
 $firstname = $_POST['firstname'];
 $lastname  = $_POST['lastname'];
 // $mail = $_POST['email'];

 $address = $_POST['address'];

 if (false == $emailtaken) {
  $mailupdatequery = $mysqli->prepare("UPDATE user SET first_name =?, last_name = ?,  address= ? WHERE username = ?");
  $mailupdatequery->bind_param('ssss', $firstname, $lastname, $address, $username);
  $mailupdatequery->execute();

  if ($mailupdatequery->execute()) {
   echo '<script> window.location = "index.php" </script>';
  }
 }
}
if (isset($_SESSION['Username'])) {
 $role             = 3;
 $Username         = $_SESSION['Username'];
 $fetchuserdetails = $mysqli->prepare("SELECT * FROM user where username = ?  AND user_role_id = ?");
 $fetchuserdetails->bind_param('si', $Username, $role);
 $fetchuserdetails->execute();

 $result = $fetchuserdetails->get_result();
 $row    = $result->fetch_array();

}

?>

		<!--=================================
		register-form-start  -->

		<section class="register-form page-section-ptb">
		    <div class="container">
		        <div class="row justify-content-center">
		            <div class="col-md-10">
		                <div class="section-title">
		                    <span> </span>
		                    <h2>Edit Profile</h2>
		                    <div class="separator"></div>
		                </div>
		            </div>
		        </div>
		        <?php ; ?>
		        <?php $error = false;
if (isset($_GET['error'])) {
 $error = $_GET['error'];
 switch ($error) {
  case "old_false": ?>
		        <div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>OOPS!</strong> the old password you entered is incorrect!
		            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		        </div>
		        <?php
break;
  case "same": ?>
		        <div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>OOPS!</strong> you can not choose old password as your new one!
		            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		        </div>
		        <?php
break;
 }
}

?>
		        <form action="" method="post" id="editprofile">

		            <div class="row justify-content-center">
		                <div class="col-lg-8 col-md-12">
		                    <div class="gray-form">
		                        <div class="row">
		                            <div class="mb-3 col-md-6">
		                                <label class="form-label">First Name*</label>
		                                <input type="text" class="form-control" placeholder="First Name*" value="<?php echo $row['first_name']; ?>"
		                                    name="firstname" minlength="2" maxlength="20" required>
		                            </div>
		                            <div class="mb-3 col-md-6">
		                                <label class="form-label">Last Name*</label>
		                                <input type="text" class="form-control" placeholder="Last Name*" value="<?php echo $row['last_name']; ?>"
		                                    name="lastname" minlength="2" maxlength="20" required>
		                            </div>
		                        </div>

		                        <div class="mb-3">
		                            <label class="form-label">Address*</label>
		                            <textarea class="form-control" placeholder="Address*"
		                                name="address" minlength="5" maxlength="65535" required><?php echo $row['address']; ?></textarea>
		                        </div>
		                        <div>
		                            <button type="submit" class="button red">Edit Profile</button>
		                        </div>
		        </form>
		        <p class="link">Want to Change your password? please <a href="#editPassword" id="btn_changepassword">
		                click here </a></p>
		    </div>
		    <script>
		    const editpassword = document.getElementById('btn_changepassword');
		    editpassword.addEventListener('click', (event) => {

		        document.getElementById('editPassword').style = "display:visible";

		    });
		    </script>

		    </div>


		    </div>
		    </div>
		    </br></br></br>
		    <div class="container" id="editPassword" style="display:none">
		        <div class="row justify-content-center">
		            <div class="col-md-10">
		                <div class="section-title">
		                    <h4>Change Password</h4>
		                    <div class="separator"></div>
		                </div>
		            </div>
		        </div>
		        <form action="changepassword.php?id=<?php echo $row['user_id']; ?>" method="post" id="editpassword">
		            <div class="row justify-content-center">
		                <div class="col-lg-8 col-md-12">
		                    <div class="gray-form">
		                        <div class="row">
		                            <div class="mb-3">
		                                <label class="form-label">Current Password*</label>
		                                <input type="password" class="form-control" id="oldpassword" placeholder="password" name="oldpassword" minlength="8" required>
		                            </div>
		                            <div class="mb-3">
		                                <label class="form-label">New Password*</label>
		                                <input type="password" class="form-control" id="newpassword" placeholder="password" name="newpassword" minlength="8" required>
		                            </div>

		                            <div class="mb-3">
		                                <label class="form-label">Confirm Password*</label>
		                                <input type="password" class="form-control" name="confpassword" placeholder="password" minlength="8" required>
		                            </div>
		                            <div class="row">
		                                <div class="mb-3 col-md-6">
		                                    <button type="submit" class="button red">Update Password</button>
		                                </div>
		                                <div class="mb-3 col-md-6">
		                                    <a href="javascript:void(0)" id="canceledit" class="button red"
		                                        style="margin-left: 24px;" style="color:black">Cancel</a>
		                                </div>
		                            </div>

		                            <script>
		                            const canceledit = document.getElementById('canceledit');
		                            canceledit.addEventListener('click', (event) => {

		                                document.getElementById('editPassword').style = "display:none";

		                            });
		                            </script>

		                        </div>
		        </form>
		    </div>
		    </div>
		    </div>
		    </div>

		</section>


	
		<?php include 'footer.php'; ?>

		  