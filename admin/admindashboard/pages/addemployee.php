<?php

include 'header.php';

$msg = null;

if ("POST" == $_SERVER["REQUEST_METHOD"] && isset($_FILES)) {
 $firstname       = $_POST["firstname"];
 $lastname        = $_POST["lastname"];
 $email           = $_POST["email"];
 $Username        = $_POST["username"];
 $password        = $_POST["password"];
 $confirmPassword = $_POST["confirmPassword"];
 $address         = $_POST["address"];
 $role            = $_POST['role'];
 $defaultimage    = 'avatardefault_92824.png';

 $checkUsername = "SELECT * FROM `user` WHERE username LIKE  '$Username'";
 $userexists    = mysqli_query($conn, $checkUsername);
 $checkUsermail = "SELECT * FROM `user` WHERE email LIKE  '$email'";
 $mailexists    = mysqli_query($conn, $checkUsermail);

 if (mysqli_num_rows($userexists) >= 1 && mysqli_num_rows($mailexists) >= 1) {
  $msg = 'invalidboth';

 } elseif (mysqli_num_rows($mailexists) >= 1) {
  $msg = 'invalidmail';
 } elseif (mysqli_num_rows($userexists) >= 1) {
  $msg = 'invalidusername';
 } else {
  $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

  if ($password == $confirmPassword) {

   $insertinfo = $mysqli->prepare("INSERT INTO `user` (`user_role_id`, `first_name`, `last_name`, `email`, `username`, `password`, `address`,`user_image` )
        VALUES (?, ?, ?, ?, ?, ?, ?,?)");
   $insertinfo->bind_param('isssssss', $role, $firstname, $lastname, $email, $Username, $hashedpassword, $address, $defaultimage);
   $insertinfo->execute();
   header("Location: employee.php");

  } else {

   $msg = "mismatch";

  }
 }
}

?>

<div class="page">
    <div class="page-main">

        <!--sidebar open-->
        <?php include 'sidebar.php'; ?>
        <!--sidebar closed-->

        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <?php include 'pageheader.php'; ?>
                <!--/app header-->




                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Add Employee</h4>
                    </div>
                </div>
                <!--End Page header-->
                <!-- End Row -->

                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Employee</h4>
                            </div>
                            <div class="card-body">
                                <?php if (!is_null($msg)): ?>
                                <?php if ('invalidusername' == $msg): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> This username is already taken choose another one!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif ('invalidmail' == $msg): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> This email is already taken choose another one!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif ('invalidboth' == $msg): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> This username and email is already taken choose another one!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif ('mismatch' == $msg): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> Your entered password does not match with confirm password!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="" enctype="multipart/form-data" id="form">
                                        <div class="form-group">
                                            <label class="form-label">First Name*</label>
                                            <input type="text" class="form-control" name="firstname"
                                                placeholder="Enter First Name" minlength="2" maxlength="20"
                                                value="<?php echo @$firstname; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Last Name*</label>
                                            <input type="text" class="form-control" name="lastname"
                                                placeholder="Enter Last Name" value="<?php echo @$lastname; ?>"
                                                minlength="2" maxlength="20" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Username*</label>
                                            <input type="text" class="form-control" name="username" minlength="4"
                                                maxlength="20" placeholder="Enter Username"
                                                value="<?php echo @$Username; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email*</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email" minlength="0" maxlength="50"
                                                value="<?php echo @$email; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Role*</label>
                                            <input type="number" class="form-control"
                                                placeholder="1-superAdmin 2- Admin" name="role" min="1" max="2"
                                                value="<?php echo @$role; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password*</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password" minlength="8" required>
                                            <span style="color:red" id="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password*</label>
                                            <input type="password" class="form-control" name="confirmPassword"
                                                placeholder="Confirm Password" minlength="8" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address*</label>
                                            <textarea class="form-control" name="address" placeholder="Enter Address"
                                                minlength="5" maxlength="65535"
                                                required><?php echo @$address; ?></textarea>
                                        </div>

                                </div>
                                <button type="submit" name="emp_add" class="btn btn-primary mt-4 mb-0">Save
                                    Employee</button>
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

<script>
var password = document.getElementById("password");
var form = document.getElementById("form");
var errorElement = document.getElementById("error");
form.addEventListener('submit', (e) => {
    let message = [];
    if (password.value.length < 8) {
        message.push('Password must have minimum 8 characters')
    }
    if (message.length > 0) {
        e.preventDefault()
        errorElement.innerText = message.join(',')
    }
})
</script>
<?php include 'footer.php'; ?>
</body>

</html>

<script>
jQuery('#form').validate({
    rules: {
        firstname: {
            required: true,
            minlength: 3,
        },
    },
    messages: {},
    submitHandler: function(form) {
        form.submit();
    }
})
</script>