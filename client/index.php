<?php

include_once 'header.php';

@$brand = $_GET['brand'];
@$model = $_GET['model'];

$query_brand = $mysqli->prepare("SELECT * FROM brand_master ORDER BY brand_name");
$query_brand->execute();
$result_brand = $query_brand->get_result();

if ($brand > 0) {
 $query_model = $mysqli->prepare("SELECT * FROM model_master WHERE brand_id = $brand ORDER BY model_name");
} else {
 $query_model = $mysqli->prepare("SELECT * FROM model_master ORDER BY model_name");
}

$query_model->execute();
$result_model = $query_model->get_result();

if ($model > 0) {
 $query_year = $mysqli->prepare("SELECT DISTINCT model_year FROM vehicle WHERE model_id = $model ORDER BY model_year DESC");
} else {
 $query_year = $mysqli->prepare("SELECT DISTINCT model_year FROM vehicle ORDER BY model_year DESC");
}

$query_year->execute();
$result_year = $query_year->get_result();

$feturedcarquery = $mysqli->prepare("SELECT * FROM vehicle JOIN model_master USING(model_id) JOIN brand_master USING(brand_id) JOIN transmission USING(transmission_id) ORDER BY RAND() LIMIT 5");
$feturedcarquery->execute();
$feturedcarresult = $feturedcarquery->get_result();

$brandquery = $mysqli->prepare("SELECT COUNT(*) as num FROM  brand_master");
$brandquery->execute();
$brandcount = $brandquery->get_result();

$modelquery = $mysqli->prepare("SELECT COUNT(*)  as num FROM  model_master");
$modelquery->execute();
$modelcount = $modelquery->get_result();

$appointmentquery = $mysqli->prepare("SELECT COUNT(*) as num FROM  appointment");
$appointmentquery->execute();
$appointment = $appointmentquery->get_result();

$vehiclequery = $mysqli->prepare("SELECT COUNT(*) as num FROM vehicle");
$vehicle      = $vehiclequery->execute();
$vehicle      = $vehiclequery->get_result();

$numbrand       = $brandcount->fetch_assoc(); // returns number of brand
$nummodel       = $modelcount->fetch_assoc(); // returns number of model
$numappointment = $appointment->fetch_assoc(); // returns number of appointment
$numvehicle     = $vehicle->fetch_assoc(); // returns number of vehicles in stock

?>

<body>

    <!--=================================header -->
    <section class="search-block find-car bg-1 bg-overlay-black-70 page-section-pt" id="vehicle_search">
        <div class="container " id="search">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-start">
                        <h2 class="text-white">FIND YOUR DREAM CAR </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row" id="search_form">
                <div class="col-lg-7 col-sm-12">
                    <form method="GET" action="listing.php" id="form">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Select brand</span>
                                <div class="selected-box">
                                    <select data-target="#search_form" class="selectpicker" name="brand" id="brand"
                                        onchange="fetch_models(this.form)">
                                        <option value="0"> --Brand-- </option>
                                        <?php while ($row = $result_brand->fetch_array()): ?>
                                        <!-- stores brand result into array  -->
                                        <?php if ($row['brand_id'] == $brand): ?>
                                        <option value="<?=$row['brand_id']; ?>" selected>
                                            <?=$row['brand_name']; ?></option>
                                        <?php else: ?>
                                        <option value="<?=$row['brand_id']; ?>">
                                            <?=$row['brand_name']; ?></option>
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span>Select model</span>
                                <div class="selected-box">
                                    <select class="selectpicker" name="model" id="model"
                                        onchange="fetch_years(this.form)">
                                        <option value="0"> --Model-- </option>
                                        <?php while ($row = $result_model->fetch_array()): ?>
                                        <!-- stores model result into arry  -->
                                        <?php if ($row['model_id'] == $model): ?>
                                        <option value="<?=$row['model_id']; ?>" selected>
                                            <?=$row['model_name']; ?></option>
                                        <?php else: ?>
                                        <option value="<?=$row['model_id']; ?>">
                                            <?=$row['model_name']; ?></option>
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span>Select year</span>
                                <div class="selected-box">
                                    <select class="selectpicker" name="year" id="year">
                                        <option value="0"> --Year-- </option>
                                        <?php while ($row = $result_year->fetch_array()): ?>
                                        <!-- stores year result into arry  -->
                                        <option value="<?=$row['model_year']; ?>">
                                            <?=$row['model_year']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span>Select vehicle Condition</span>
                                <div class="selected-box">
                                    <select class="selectpicker" name="condition" id="condition">
                                        <option value="0"> --Vehicle Condition-- </option>
                                        <option value="1">New</option>
                                        <option value="2">Used</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="price-search">
                                    <span class="mb-2">Enter minimum price</span>
                                    <div class="search">
                                        <i class="fa fa-rupee"></i>
                                        <input type="number" class="form-control placeholder" name="minPrice" min="0"
                                            max="100000000" placeholder=" --Minimum Price-- "
                                            style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="price-search">
                                    <span class="mb-2">Enter maximum price</span>
                                    <div class="search">
                                        <i class="fa fa-rupee"></i>
                                        <input type="number" class="form-control placeholder" name="maxPrice" min="0"
                                            max="100000000" placeholder=" --Maximum Price-- "
                                            style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <input class="button" type="submit" value="Search the Vehicle" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 align-self-end">
                    <img class="img-fluid center-block" src="images/03.png" alt="">
                </div>
            </div>
        </div>
    </section>



    <!-- Quick access links  -->

    <section class="quick-links white-bg">
        <div class="container  ">
            <div class="row no-gutter justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                    <div class="link text-center">
                        <a href="<?=$root; ?>/listing.php?condition=1">
                            <i class="fa fa-car"></i>
                            <h6>New Vehicles</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6  ">
                    <div class="link text-center">
                        <a href="<?=$root; ?>/listing.php?condition=2">
                            <i class="fa fa-car"></i>
                            <h6>Used Vehicles</h6>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                    <div class="link text-center">
                        <a href="<?=$root; ?>/listing.php">
                            <i class="fa fa-empire"></i>
                            <h6>AutoTrack Recomended</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                    <div class="link text-center">
                        <a href="<?=$root; ?>/contactus.php">
                            <i class="fa fa-phone"></i>
                            <h6>Contact Us</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
End quick-links -->





    <!--=================================
feature-car section start -->

    <section class="feature-car white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <span>Check out our recent cars</span>
                        <h2>Feature Car </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="4"
                        data-sm-items="2" data-xs-items="1" data-space="20">
                        <?php while ($feturedcarrow = $feturedcarresult->fetch_array()): ?>
                        <!-- retrives result array -->
                        <div class="item">
                            <div class="car-item car-item-4 text-center">
                                <div class="car-image">
                                    <img class="img-fluid"
                                        src="<?=$root; ?>/images/car/<?=$feturedcarrow['vehicle_image']; ?>" alt=""
                                        style="height:200px;width:auto">
                                    <div class="car-overlay-banner">
                                        <ul>
                                            <li><a
                                                    href="<?=$root; ?>/single.php?vehicle=<?=$feturedcarrow['vehicle_id']; ?>"><i
                                                        class="fa fa-link"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> <?=$feturedcarrow['model_year']; ?>
                                        </li>
                                        <li><i class="fa fa-cog"></i>
                                            <?=strtok($feturedcarrow['transmission_type'], " "); ?> </li>
                                        <li><i class="fa fa-shopping-cart"></i>
                                            <?=$feturedcarrow['kms_driven'] > 0 ? 'Used' : "New"; ?></li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="<?=$root; ?>/single.php?vehicle=<?=$feturedcarrow['vehicle_id']; ?>">
                                        <?=$feturedcarrow['brand_name'] . '&nbsp&nbsp;' . $feturedcarrow['model_name']; ?></a>
                                    <div class="separator"></div>
                                    <div class="price">

                                        <span
                                            class="new-price"><?=indMoneyFormat($feturedcarrow['vehicle_price']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>


                    </div>
                </div>
            </div>
    </section>
    <!--=================================
feature-car section End -->



    <!--=================================
form  start-->

    <section class="why-choose-us bg-2 bg-overlay-black-70 page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <span class="text-white">Because We are ultra creative agency</span>
                        <h2 class="text-white">WHY CHOOSE US </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box-2 box-hover ">
                        <div class="icon">
                            <i class="glyph-icon flaticon-beetle"></i>
                        </div>
                        <div class="content">
                            <h5>All brands</h5>
                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem acantium
                                doloremque laudantium.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-6">
                    <div class="feature-box-2 box-hover">
                        <div class="icon">
                            <i class="glyph-icon flaticon-wallet"></i>
                        </div>
                        <div class="content">
                            <h5>Affordable</h5>
                            <p class="mb-0">Perspiciatis sed ut unde omnis iste natus error sit voluptatem acantium
                                doloremque laudantium.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box-2 box-hover">
                        <div class="icon">
                            <i class="glyph-icon flaticon-gearstick"></i>
                        </div>
                        <div class="content">
                            <h5>transmission </h5>
                            <p class="mb-0">Omnis perspiciatis sed ut unde iste natus error sit voluptatem acantium
                                doloremque laudantium. </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="counter counter-style-2">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 item">
                        <div class="counter-block text-start">
                            <div class="separator"></div>
                            <div class="info">
                                <h6 class="text-white">Total Brands</h6>
                                <i class="glyph-icon flaticon-interface"></i>
                                <b class="timer text-white" data-to="<?=$numbrand['num']; ?>" data-speed="3000"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 item">
                        <div class="counter-block text-start">
                            <div class="separator"></div>
                            <div class="info">
                                <h6 class="text-white">Total Models</h6>
                                <i class="glyph-icon flaticon-circle"></i>
                                <b class="timer text-white" data-to="<?=$nummodel['num']; ?>" data-speed="3000"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 item">
                        <div class="counter-block text-start mb-0">
                            <div class="separator"></div>
                            <div class="info">
                                <h6 class="text-white">Your Appointments</h6>
                                <i class="glyph-icon flaticon-cup"></i>
                                <b class="timer text-white" data-to="<?=$numappointment['num']; ?>"
                                    data-speed="3000"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 item">
                        <div class="counter-block text-start">
                            <div class="separator"></div>
                            <div class="info">
                                <h6 class="text-white">Vehicles in Stock</h6>
                                <i class="glyph-icon flaticon-beetle"></i>
                                <b class="timer text-white" data-to="<?=$numvehicle['num']; ?>" data-speed="3000"></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
feature-car end  -->

    <section class="testimonial-1 white-bg page page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">

                        <h2>About Us </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="owl-carousel owl-theme" data-nav-dots="true" data-nav-arrow="false " data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="20"> -->
                    <div class="flex mx-auto" style="width:50% ;text-align:center">

                        <P>AutoTrack is your single stop for buying used and fresh vehicles, all over India. We've
                            brought together cutting-edge technology with country-wide partners and more importantly,
                            deep understanding of what buyers need. We solve all pain points associated with purchasing
                            a pre-loved one. Whether you're buying or selling, you get a quick, easy, fair, transparent,
                            hassle (and haggle) free process.

                        </P>
                        <a class="btn btn-outline-danger" href="service.php"> Read more</a>

                    </div>
                </div>
            </div>
    </section>
    <?php include_once 'footer.php'; ?>

</body>

</html>