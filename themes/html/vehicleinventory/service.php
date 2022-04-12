        <?php include 'header.php';?>

        <?php 

        $auditquery = "SELECT COUNT(*) as num FROM  vehicle_audit";
        $userquery = "SELECT COUNT(*)  as num FROM user";
        $appointmentquery = "SELECT COUNT(*) as num FROM  appointment";
        $vehiclequery = "SELECT COUNT(*) as num FROM vehicle";
        $audit = mysqli_query($conn,$auditquery);
        $user = mysqli_query($conn,$userquery);
        $appointment = mysqli_query($conn,$appointmentquery);
        $vehicle = mysqli_query($conn,$vehiclequery);
        $numaudit = mysqli_fetch_assoc($audit);
        $numuser = mysqli_fetch_assoc($user);
        $numappointment = mysqli_fetch_assoc($appointment);
        $numvehicle = mysqli_fetch_assoc($vehicle);

        $content_query = "SELECT * FROM edit_content WHERE content_id = 1";
        $content_result = mysqli_query($conn, $content_query);
        $content = mysqli_fetch_array($content_result)['content_text'];

        ?>

        <!--=================================
        inner-intro -->

        <section class="inner-intro bg-1 bg-overlay-black-70">
        <div class="container">
        <div class="row text-center intro-title">
        <div class="col-md-6 text-md-start d-inline-block">
        <h1 class="text-white">What we Provide </h1>
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
        service -->

        <section class="inner-service  page-section-ptb">
        <div class="container">
        <div class="row g-0">
        <div class="col-md-4 col-sm-6">
        <div class="feature-box-2 text-center">
        <div class="icon">
        <i class="glyph-icon flaticon-car"></i>
        </div>
        <div class="content">
        <h5>SUPER FAST</h5>
        <p>Galley of bled it lorem Ipsum is simply dummy text of the k a to make a type book. but also the leap into electronic typesetting.</p>
        </div>
        </div>
        </div>
        <div class="col-md-4 col-sm-6">
        <div class="feature-box-2 text-center">
        <div class="icon">
        <i class="glyph-icon flaticon-wallet"></i>
        </div>
        <div class="content">
        <h5>AFFORDABLE</h5>
        <p>Bled it to make a lorem Ipsum is simply dummy text of the k a galley of type book. but also the leap into electronic typesetting.</p>
        </div>
        </div>
        </div>


        <div class="col-md-4 col-sm-6">
        <div class="feature-box-2 no-bb text-center">
        <div class="icon">
        <i class="glyph-icon flaticon-gearstick"></i>
        </div>
        <div class="content">
        <h5>transmission</h5>
        <p>But also the leap into electronic typesetting. lorem Ipsum is simply dummy text of the k a galley of bled it to make a type book. </p>
        </div>
        </div>
        </div>

        </div>
        </div>
        </section>

        <!--=================================
        service -->


        <!--=================================
        Counter -->



        <section class="counter counter-style-2 bg-red bg-1 bg-overlay-black-70 page-section-ptb">
        <div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6 item">
        <div class="counter-block text-start mb-lg-0 mb-4">
        <div class="separator"></div>
        <div class="info">
        <h6 class="text-white">Vehicles in Stock</h6>
        <i class="glyph-icon flaticon-beetle"></i>
        <b class="timer text-white" data-to="<?php echo $numvehicle['num']?>" data-speed="10000"></b>
        </div>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6 item">
        <div class="counter-block text-start mb-lg-0 mb-4">
        <div class="separator"></div>
        <div class="info">
        <h6 class="text-white">Vehicles  Sold</h6>
        <i class="glyph-icon flaticon-beetle"></i>
        <b class="timer text-white" data-to="<?php echo $numaudit['num']?>" data-speed="10000"></b>
        </div>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6 item">
        <div class="counter-block text-start mb-sm-0 mb-4">
        <div class="separator"></div>
        <div class="info">
        <h6 class="text-white">Active users</h6>
        <i class="glyph-icon flaticon-circle"></i>
        <b class="timer text-white" data-to="<?php echo $numuser['num']?>" data-speed="10000"></b>
        </div>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6 item">
        <div class="counter-block text-start mb-0">
        <div class="separator"></div>
        <div class="info">
        <h6 class="text-white">Total Meets</h6>
        <i class="glyph-icon flaticon-cup"></i>
        <b class="timer text-white" data-to="<?php echo $numappointment['num']?>" data-speed="10000"></b>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>




        <section class="service-center  page-section-ptb">
        <div class="container">
        <div class="col-md-10">
        <div class="section-title">
        <span>Welcome to </span>
        <h3>AutoTrack</h3>
        <div class="separator"></div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        <?php echo nl2br($content); ?>
        <!-- <p>Before we get ahead of ourselves, we want to welcome you to AutoTrack. While nothing can replace thing on-the-lot experience.</p>
        <p>We appreciate you taking the time today to visit our web site. Our goal is to give you an interactive tour of our new and used inventory, as well as allow you to conveniently get a quote, schedule a service appointment, or apply for financing. The search for a luxury car is filled with high expectations.</p>
        <p>AutoTrack is your single stop for buying  used and fresh vehicles, all over India. We've brought together cutting-edge technology with country-wide partners and more importantly, deep understanding of what buyers  need. We solve all pain points associated with  purchasing a pre-loved one. Whether you're buying or selling, you get a quick, easy, fair, transparent, hassle (and haggle) free process.</p> -->
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
        <img class="img-fluid center-block" src="images/blog/07.jpg" alt="">
        </div>
        </div>
        </div>
        </section>



        <?php include 'footer.php' ?></body>
        </html>
