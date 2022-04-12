              <?php

              include 'header.php';
              use PHPMailer\PHPMailer\PHPMailer;
              use PHPMailer\PHPMailer\Exception;

              ?>

              <!--=================================
              header -->


              <!--=================================
              inner-intro -->
              <section class="inner-intro bg-1 bg-overlay-black-70">
              <div class="container">
              <div class="row text-center intro-title">
              <div class="col-md-6 text-md-start d-inline-block">
              <h1 class="text-white">Book An Appointment</h1>
              </div>

              <div class="col-md-6 text-md-end float-end">
              <ul class="page-breadcrumb">

              </ul>
              </div>
              </div>
              </div>
              </section>

              <!--=================================
              inner-intro -->


              <?php

              if($Signedin == false)
              echo '<script>window.location = "login.php?loc='. $_SERVER['REQUEST_URI']. '"</script>';

              //  require 'vendor/autoload.php';

              if($_SERVER["REQUEST_METHOD"] == "POST")
              {
              print_r($_POST);

              $user = $_SESSION['userid'];
              $name = $_SESSION['name'];
              $email = $_SESSION['email'];
              $vehicle_id = $_POST['vehicle_id'];
              $schedule = str_replace('T', ' ', $_POST['date']).':00';
              $date = explode(' ', $schedule)[0];
              $time = explode(' ', $schedule)[1];

              $comments = $_POST['comments'];

              $vehicle_query = "SELECT * FROM vehicle JOIN model_master USING (model_id) JOIN brand_master USING (brand_id) WHERE vehicle_id = $vehicle_id";
              $result = mysqli_query($conn, $vehicle_query);
              $vehicle_result = mysqli_fetch_array($result);
              $vehicle = $vehicle_result['brand_name'].' '.$vehicle_result['model_name'];

              $check_query = "SELECT * FROM appointment WHERE user_id = '$user' AND date(appointment_schedule) = date('$schedule') AND appointment_status = 'Requested'";
              // echo $check_query;
              // die;
              $check_result = mysqli_query($conn, $check_query);
              $num = mysqli_num_rows($check_result);
              if($num > 0)
              {
              ?>
              <script> alert("Already have Today's appointment. Please select a different day")</script>
              <script>window.location = 'single.php?vehicle=<?php echo $vehicle_id ?> ';</script>
              <?php
              }

             

              else
              {
              $insert_query = "INSERT INTO appointment (user_id, vehicle_id, appointment_schedule, appointment_comments) VALUES ('$user', '$vehicle_id', '$schedule', '$comments')";
              $insert_result = mysqli_query($conn, $insert_query);


              if($insert_result)
              {
            //   echo "<script>alert('Appointment scheduled for $schedule')</script>";
              echo "<div class='alert alert-success'>Appointment scheduled for $schedule</div>";

              $msg = "Dear $name,<br> Your appointment has been requested for $vehicle on $date at $time. Soon you will receive confirmation when your appointment has been accepted. If you have questions or concerns before your session, kindly contact us. <br> Regards, <br> Team Autotrack.";

              include_once('mail/login_credentials.php');

              require_once('mail/vendor/autoload.php');

              $mail = new PHPMailer(true);

              try {
              $mail->SMTPDebug = 0;
              $mail->isSMTP();
              $mail->Host       = 'smtp.gmail.com;';
              $mail->SMTPAuth   = true;
              $mail->Username   = Username;
              $mail->Password   = Password;
              $mail->SMTPSecure = 'tls';
              $mail->Port       = 587;

              $mail->setFrom('info.autotrackinida@gmail.com', 'AutoTrack');
              // $mail->addAddress('$email');
              $mail->addAddress('arun0306.r@gmail.com');
              $mail->addAddress('jitendrabhavsar469@gmail.com');
              $mail->addAddress('riyavora16@gmail.com');

              $mail->isHTML(true);
              $mail->Subject = 'Appointment for your dream car';
              $mail->Body    = $msg;

              $mail->AltBody = 'Body in plain text for non-HTML mail clients';
              $mail->send();
              // echo "Mail has been sent successfully!";
              } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
              }

              else
              {
            //   echo "<script>alert('Appointment not scheduled ".mysqli_error($conn)."')</script>";
              echo "<div class='alert alert-danger'>Appointment not scheduled ".mysqli_error($conn)."</div>";
              }
              }
              echo "<script>window.location='myappointment.php';</script>";
              }

              ?>



              

              <section class="contact-map">
              <div class="container-fluid">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.390221202824!2d72.5128349!3d23.0385443!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93964e2d29f45f40!2sGateway%20Group%20of%20Companies!5e0!3m2!1sen!2sin!4v1646982386558!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              </section>

              <!--=================================
              contact-map -->


              <!--=================================
              footer -->
              <?php include 'footer.php';?>
              </body>
              </html>
