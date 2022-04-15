<?php

include 'header.php';

$appointment_created = false;
$user_created        = false;
$user_found          = false;

if (isset($_POST["submit"])) {
 $brand_id   = $_POST['brand'];
 $model_id   = $_POST['model'];
 $first_name = $_POST['firstname'];
 $last_name  = $_POST['lastname'];
 $email      = $_POST['email'];
 $schedule   = $_POST['schedule'];
 $comments   = $_POST['comments'];

 $user_query  = "SELECT * FROM user WHERE email = '$email'";
 $user_result = mysqli_query($conn, $user_query);

 $vehicle_query  = "SELECT * FROM vehicle WHERE model_id = '$model_id' LIMIT 1";
 $vehicle_result = mysqli_query($conn, $vehicle_query);
 $vehicle_id     = mysqli_fetch_array($vehicle_result)['vehicle_id'];

 if (mysqli_num_rows($user_result) == 1) {
  $user_found = true;

  $user_id           = mysqli_fetch_array($user_result)['user_id'];
  $appointment_query = "INSERT INTO appointment (user_id, vehicle_id, appointment_schedule, appointment_status, appointment_comments) VALUES ($user_id, $vehicle_id, '$schedule', 'Upcoming', '$comments')";

  if ($appointment_result = mysqli_query($conn, $appointment_query)) {
   $appointment_created = true;

   $subject = 'AutoTrack Appointment';

   $mail_text = "Greetings $first_name $last_name,<br /><br />The appointment has been set for $schedule.<br />You can login to your account to view your appointment and edit your information.<br /><br />Kind regards,<br />AutoTrack Team";

   sendMail($subject, $mail_text);
  }
 } else {
  $username = explode('@', $email)[0];

  $password = createPassword(10);

  $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

  $create_query = "INSERT INTO user (user_role_id, first_name, last_name, email, username, password, address, user_status) VALUES (3, '$first_name', '$last_name', '$email', '$username', '$hashedpassword', 'Ahmedabad', 'Verified')";

  $user_created = true;

  if ($create_result = mysqli_query($conn, $create_query)) {
   $user_query  = "SELECT * FROM user WHERE email = '$email'";
   $user_result = mysqli_query($conn, $user_query);

   $user_id           = mysqli_fetch_array($user_result)['user_id'];
   $appointment_query = "INSERT INTO appointment (user_id, vehicle_id, appointment_schedule, appointment_status, appointment_comments) VALUES ($user_id, $vehicle_id, '$schedule', 'Upcoming', '$comments')";

   if ($appointment_result = mysqli_query($conn, $appointment_query)) {
    $appointment_created = true;

    $subject = 'AutoTrack Appointment';

    $mail_text = "Greetings $first_name $last_name,<br /><br />A new user has been created for you with the following credentials:<br />Username: $username<br />Password: $password<br />The appointment has been set for $schedule.<br />You can login to your account using the above credentials to view your appointment and edit your information.<br /><br />Kind regards,<br />AutoTrack Team";

    sendMail($subject, $mail_text);
   }

  }
 }
}

$brand_query  = "SELECT * FROM brand_master ORDER BY brand_name";
$brand_result = mysqli_query($conn, $brand_query);

if (isset($_GET['brand']) && $_GET['brand'] >= 1) {
 $brand_id    = $_GET['brand'];
 $model_query = "SELECT * FROM model_master WHERE brand_id = $brand_id ORDER BY model_name";
} else {
 $model_query = "SELECT * FROM model_master ORDER BY model_name";
}

$model_result = mysqli_query($conn, $model_query);

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
                        <h4 class="page-title">Appointment</h4>
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
                                <h4 class="card-title">Add Appointment</h4>
                            </div>
                            <div class="card-body">
                                <?php if ($user_created && $appointment_created): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> A new user has been created and the appointment
                                    set.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif ($user_found && $appointment_created): ?>
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> Appointment has been set for the user.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name *</label>
                                            <select class="form-control" id="brand" name="brand"
                                                onchange="fetch_models(this.form)" required>
                                                <option value=""> -- Select Brand -- </option>
                                                <?php while ($brand = mysqli_fetch_array($brand_result)): ?>
                                                <?php if ($brand_id == $brand['brand_id']): ?>
                                                <option value="<?php echo $brand['brand_id']; ?>" selected>
                                                    <?php echo $brand['brand_name']; ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo $brand['brand_id']; ?>">
                                                    <?php echo $brand['brand_name']; ?></option>
                                                <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Model Name *</label>
                                            <select class="form-control" id="model" name="model" required>
                                                <option value=""> -- Select Model -- </option>
                                                <?php while ($model = mysqli_fetch_array($model_result)): ?>
                                                <option value="<?php echo $model['model_id']; ?>">
                                                    <?php echo $model['model_name']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" name="firstname" maxlength="20"
                                                placeholder="Enter First Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" name="lastname" maxlength="20"
                                                placeholder="Enter Last Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email" maxlength="50"
                                                placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Datetime *</label>
                                            <input id="appointment_date" class="form-control" type="" name="schedule"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Comments <small>(Optional)</small></label>
                                            <textarea class="form-control" name="comments"
                                                placeholder="Extra comments about the appointment"></textarea>
                                        </div>
                                        <button type="submit" name="submit"
                                            class="btn btn-block btn-primary mt-4 mb-0">Add Appointment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div><!-- end app-content-->
</div>
<!--Footer-->
<?php include 'footer.php'; ?>
<!-- End Footer-->
<script>
function fetch_models(form) {
    var brand = form.brand.options[form.brand.options.selectedIndex].value;

    self.location = '?brand=' + brand;
}
</script>
</body>

</html>