<?php

include 'header.php';
$appoint_id = $_GET['id'];

$appoint_query  = "SELECT * FROM appointment JOIN user USING (user_id) JOIN vehicle USING (vehicle_id) JOIN model_master USING (model_id) JOIN brand_master USING (brand_id) WHERE appointment_id = $appoint_id";
$appoint_result = mysqli_query($conn, $appoint_query);
$appoint        = mysqli_fetch_array($appoint_result);

$schedule_changed = 0;

if (isset($_POST["submit"])) {
 $schedule     = $_POST['schedule'];
 $id           = $_POST['appointment_id'];
 $first_name   = $appoint['first_name'];
 $last_name    = $appoint['last_name'];
 $old_schedule = $_POST['oldschedule'];

 $change_query  = "UPDATE appointment SET appointment_status = 'Upcoming',appointment_schedule = '$schedule' WHERE appointment_id = $id";
 $change_result = mysqli_query($conn, $change_query);

 if (mysqli_affected_rows($conn) == 1) {
  $schedule_changed = 1;

  $subject = "Appointment Rescheduled";

  $mail_text = "Greetings $first_name $last_name,<br /><br />Due to unavoidable circumstances, your appointment on $old_schedule has been rescheduled to $schedule.<br />We apologize for any inconvenience caused.<br />You can login to your account to view your appointment and edit your information.<br /><br />Kind regards,<br />AutoTrack Team";

  sendMail($subject, $mail_text);
 } else {
  $schedule_changed = 2;
 }
}

$appoint_id = $_GET['id'];

$appoint_query  = "SELECT * FROM appointment JOIN user USING (user_id) JOIN vehicle USING (vehicle_id) JOIN model_master USING (model_id) JOIN brand_master USING (brand_id) WHERE appointment_id = $appoint_id";
$appoint_result = mysqli_query($conn, $appoint_query);
$appoint        = mysqli_fetch_array($appoint_result);

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
                                <h4 class="card-title">Reschedule Appointment</h4>
                            </div>
                            <div class="card-body">
                                <?php if (1 == $schedule_changed): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> The appointment has been rescheduled.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif (2 == $schedule_changed): ?>
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> No changes were made in the appointment schedule.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name</label>
                                            <select class="form-control" name="brand" disabled>
                                                <option value="<?=$appoint['brand_id']; ?>" selected>
                                                    <?=$appoint['brand_name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Model Name</label>
                                            <select class="form-control" name="model" disabled>
                                                <option value="<?=$appoint['model_id']; ?>">
                                                    <?=$appoint['model_name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="firstname"
                                                value="<?=$appoint['first_name']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastname"
                                                value="<?=$appoint['last_name']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?=$appoint['email']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Datetime *</label>
                                            <input id="appointment_date" class="form-control" name="schedule"
                                                value="<?=$appoint['appointment_schedule']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments"
                                                disabled><?=$appoint['appointment_comments']; ?></textarea>
                                        </div>
                                        <input type="hidden" name="appointment_id"
                                            value="<?=$appoint['appointment_id']; ?>" />
                                        <input type="hidden" name="oldschedule"
                                            value="<?=$appoint['appointment_schedule']; ?>" />
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
</body>

</html>