          <?php include 'header.php'; ?>
          <?php

$vehicleid = $_GET['vehicle'];

$selectvehiclequery = $mysqli->prepare("SELECT * FROM vehicle LEFT JOIN model_master ON vehicle.`model_id` = model_master.`model_id` LEFT JOIN brand_master ON model_master.`brand_id` = brand_master.`brand_id` LEFT JOIN fuel_type ON fuel_type.`fuel_type_id` = vehicle.`fuel_type_id` LEFT JOIN transmission ON transmission.`transmission_id` = vehicle.`transmission_id` LEFT JOIN bodycolor ON bodycolor.`color_id` = vehicle.`exterior_color`  where `vehicle_id`=?");
$selectvehiclequery->bind_param('i', $vehicleid);
$selectvehiclequery->execute();
$resultvehiclequery = $selectvehiclequery->get_result();
$vehiclerow         = $resultvehiclequery->fetch_array();
if (!$vehiclerow) {
 include 'error-404.php';
 die;
}
$query2  = "SELECT * FROM vehicle JOIN model_master USING(model_id) JOIN brand_master USING(brand_id) JOIN transmission USING(transmission_id) ORDER BY RAND() LIMIT 5";
$result2 = mysqli_query($conn, $query2);

?>




          <!--=================================
          inner-intro -->
          <section class="inner-intro bg-6 bg-overlay-black-70">
              <div class="container">
                  <div class="row text-center intro-title">
                      <div class="col-md-6 text-md-start d-inline-block">
                          <h1 class="text-white">
                              <?php echo $vehiclerow['brand_name'] . '&nbsp&nbsp' . $vehiclerow['model_name']; ?> </h1>
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


          <!--=================================
          car-details -->

          <section class="car-details page-section-ptb">
              <div class="container">
                  <div class="row">
                      <div class="col-md-9">
                          <h3><?php echo $vehiclerow['brand_name'] . '&nbsp&nbsp' . $vehiclerow['model_name']; ?></h3>
                          <!-- <p> <?php echo $vehiclerow['vehicle_description']; ?></p> -->
                      </div>
                      <div class="col-md-3">
                          <div class="car-price text-md-end">
                              <strong><?php echo indMoneyFormat($vehiclerow['vehicle_price']); ?></strong>
                              <span>Plus Taxes & Licensing</span>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                          <div class="slider-slick">
                              <div class=" slider-for detail--r-gallery">
                                  <img class="img-fluid" src="images/car/<?php echo $vehiclerow['vehicle_image']; ?>"
                                      alt="">
                              </div>
                              <?php if ("Available" == $vehiclerow['vehicle_status']) { ?>
                              <button class="button red float mt-4" id="appointment_button" onclick="myfunction();">Book
                                  An Appointment</button>
                              <?php } ?>
                          </div>

                      </div>
                      <div class="col-md-6">
                          <div class="car-details-sidebar">
                              <div class="details-block details-weight">
                                  <h5>SPECIFICATIONS</h5>
                                  <ul>
                                      <li> <span>Make</span> <strong
                                              class="text-end"><?php echo $vehiclerow['brand_name']; ?></strong></li>
                                      <li> <span>Model</span> <strong
                                              class="text-end"><?php echo $vehiclerow['model_name']; ?></strong></li>
                                      <li> <span>Registration date </span> <strong
                                              class="text-end"><?php echo $vehiclerow['model_year']; ?></strong></li>
                                      <li> <span>Condition</span> <strong
                                              class="text-end"><?php echo $vehiclerow['kms_driven'] == 0 ? 'New' : 'Used'; ?></strong>
                                      </li>
                                      <?php if ($vehiclerow['kms_driven'] > 0): ?>
                                      <li> <span>Distance Driven</span> <strong
                                              class="text-end"><?php echo indNumberFormat($vehiclerow['kms_driven']) . ' km'; ?></strong>
                                      </li>
                                      <?php endif; ?>
                                      <li> <span>Exterior Color</span> <strong
                                              class="text-end"><?php echo $vehiclerow['color']; ?></strong></li>
                                      <li> <span>Seating capacity</span> <strong
                                              class="text-end"><?php echo $vehiclerow['seating_capacity']; ?></strong>
                                      </li>
                                      <li> <span>Fuel Type</span> <strong
                                              class="text-end"><?php echo $vehiclerow['fuel_type']; ?></strong></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-9 col-md-9  col-sm-9">
                          <div id="tabs">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item icon-diamond" role="presentation">
                                      <button class="nav-link active" id="general-information-tab" data-bs-toggle="tab"
                                          data-bs-target="#general-information" type="button" role="tab"
                                          aria-controls="general-information" aria-selected="true">General
                                          Information</button>
                                  </li>
                              </ul>

                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="general-information" role="tabpanel"
                                      aria-labelledby="general-information-tab">
                                      <h6>General Information</h6>
                                      <p><?php echo $vehiclerow['general_description']; ?>
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <div class="row appointment" id="appointment" style="display: none;">
                              <div class="col-lg-8 col-sm-12 mb-lg-0 mb-1">
                                  <?php if ("Available" == $vehiclerow['vehicle_status']) { ?>

                                  <div class="gray-form row">
                                      <form class="form-horizontal" id='appointment_form' role="form" method="post"
                                          action="appointment.php">
                                          <h6>Schedule an appointment today for an in person viewing</h6>
                                          <div class="contact-form">
                                              <label for="date">Select Your Prefered Date Within 40 Days</label>
                                              <div class="mb-3">
                                                  <input id="appointment_date" type="text" class="form-control"
                                                      name="date" required>
                                              </div>
                                              <div class="mb-3">
                                                  <label class="form-label" for="comemnts">Additional comments for your
                                                      appointment <small>( Optional )</small> :</label>
                                                  <textarea id="appointment_comments" class="form-control input-message"
                                                      placeholder="Comments" rows="7" maxlength="65535"
                                                      name="comments"></textarea>
                                              </div>
                                              <input type="hidden" name="vehicle_id" id="vehicle_id"
                                                  value="<?php echo $_GET['vehicle']; ?>" />
                                              <div class="d-grid">
                                                  <button id="" name="submit" type="submit" value="Send"
                                                      class="button red btn-block"> Request An Appointment <i
                                                          class="fa fa-spinner fa-spin fa-fw btn-loader"
                                                          style="display: none;"></i></button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                  <?php } ?>
                              </div>
                          </div>



                      </div>
                      <div class="col-md-3">
                          <div class="car-details-sidebar">

                              <div class="details-location details-weight">
                                  <h5>Location</h5>
                                  <iframe
                                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.5991802858657!2d72.51073821535881!3d23.038484671513466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b4935196a4b%3A0x39be102933907d60!2sGateway%20Group%2C%20Bodakdev%2C%20Ahmedabad%2C%20Gujarat%20380053!5e0!3m2!1sen!2sin!4v1647928602038!5m2!1sen!2sin"
                                      width="600" height="450" style="border:0;" allowfullscreen=""
                                      loading="lazy"></iframe>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="feature-car">
                      <h6>Featured Vehicles</h6>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="owl-carousel" data-nav-arrow="true" data-nav-dots="false" data-items="3"
                                  data-md-items="4" data-sm-items="2" data-xs-items="2" data-space="15">
                                  <?php while ($row2 = mysqli_fetch_array($result2)): ?>
                                  <div class="item">
                                      <div class="car-item gray-bg text-center">
                                          <div class="car-image">
                                              <img class="img-fluid"
                                                  src="<?php echo $root; ?>/images/car/<?php echo $row2['vehicle_image']; ?>"
                                                  alt="" style="height:200px;width:auto">
                                              <div class="car-overlay-banner">
                                                  <ul>
                                                      <li><a
                                                              href="<?php echo $root; ?>/single.php?vehicle=<?php echo $row2['vehicle_id']; ?>"><i
                                                                  class="fa fa-link"></i></a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                          <div class="car-content">
                                              <ul class="list-inline">
                                                  <li><i class="fa fa-registered" title="Model Year"></i>
                                                      <?php echo $row2['model_year']; ?></li>
                                                  <li><i class="fa fa-cog" title="Transmission Type"></i>
                                                      <?php echo strtok($row2['transmission_type'], " "); ?> </li>
                                                  <li><i class="fa fa-dashboard" title="Distance Driven"></i>
                                                      <?php echo $row2['kms_driven'] > 0 ? indNumberFormat($row2['kms_driven']) . ' km' : "New"; ?>
                                                  </li>
                                              </ul>
                                              <a
                                                  href="<?php echo $root; ?>/single.php?vehicle=<?php echo $row2['vehicle_id']; ?>">
                                                  <?php echo $row2['brand_name'] . '&nbsp&nbsp;' . $row2['model_name']; ?></a>
                                              <div class="separator"></div>
                                              <div class="price">
                                                  <span
                                                      class="new-price"><?php echo indMoneyFormat($row2['vehicle_price']); ?>
                                                  </span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <?php endwhile; ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--=================================
          car-details  -->



          <script type="text/javascript" src="js/customme.js"></script>




          <script type="text/javascript">
function myfunction() {
    <?php if (isset($_SESSION['Loggedin']) == false) { ?>

    window.location = "login.php?loc=<?php echo $_SERVER['REQUEST_URI']; ?>";

    <?php
} else {
 ?>

    var x = document.getElementById("appointment");

    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

    document.getElementById("tabs").scrollIntoView({
        block: 'start',
        behavior: 'smooth',
        inline: 'start'
    });


    <?php } ?>
}
          </script>

          <!--=================================
          footer --><?php include 'footer.php'; ?>

          </body>

          </html>