<?php include 'header.php'; ?>
<?php
$notfound = false;
@$brand   = $_GET['brand'];
@$model   = $_GET['model'];

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

?>

<!--=================================
inner-intro -->



<!--=================================
inner-intro -->
<?php $results_per_page = 5;

@$brand     = $_GET['brand'];
@$model     = $_GET['model'];
@$year      = $_GET['year'];
@$condition = $_GET['condition'];
@$min_price = strlen($_GET['minPrice']) == 0 ? 0 : $_GET['minPrice'];
@$max_price = strlen($_GET['maxPrice']) == 0 ? 0 : $_GET['maxPrice'];

$price_range = [min($min_price, $max_price), max($min_price, $max_price)];

$min_price = $price_range[0];
$max_price = $price_range[1];

//find the total number of results stored in the database
$query = "SELECT * FROM vehicle JOIN model_master USING (model_id) JOIN brand_master USING (brand_id) JOIN fuel_type USING (fuel_type_id) JOIN transmission USING (transmission_id) JOIN bodycolor ON bodycolor.color_id = vehicle.exterior_color ";

if ('GET' == $_SERVER['REQUEST_METHOD']) {
 $query .= "WHERE vehicle_price >= $min_price ";

 if (0 != $max_price) {
  $query .= "AND vehicle_price <= $max_price ";
 }

 if (0 != $brand) {
  $query .= "AND brand_master.brand_id = $brand ";
 }

 if (0 != $model) {
  $query .= "AND model_master.model_id = $model ";
 }

 if (0 != $year) {
  $query .= "AND model_year = $year ";
 }

 if (0 != $condition) {
  $query .= (1 == $condition) ? "AND kms_driven = 0 " : "AND kms_driven > 0 ";
 }

}

if (isset($_GET['carbrand'])) {
 $carbrand = $_GET['carbrand'];
 $query .= "AND brand_name = '$carbrand'";
}

if (isset($_GET['car'])) {

 $model_name = $_GET['car'];
 $query .= "AND model_name = '$model_name'";
}

$result           = mysqli_query($conn, $query);
$number_of_result = mysqli_num_rows($result);
$pagination       = 5;

//determine the total number of pages available
$number_of_page = ceil($number_of_result / $results_per_page);

//determine which page number visitor is currently on
if (!isset($_GET['page'])) {
 $page = 1;
} else {
 $page = $_GET['page'];
}

//determine the sql LIMIT starting number for the results on the displaying page
$page_first_result = ($page - 1) * $results_per_page;

//retrieve the selected results from database
$query .= "LIMIT " . $page_first_result . ',' . $results_per_page;

$result = mysqli_query($conn, $query);

if (0 == $number_of_result) {
 $notfound = true;
}
; //display the retrieved result on the webpage

?>

<!--=================================
            header -->

<!--=================================
            product-listing  -->
<section class="product-listing page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="listing-sidebar">
                    <div class="widget-banner" style="position:sticky;top:2em">
                        <section class="search-block find-car  bg-overlay-black-70 page-section-pt" id="vehicle_search">
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
                                    <div class="container">
                                        <form method="GET" action="listing.php" id="form">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <span>Select brand</span>
                                                    <div class="selected-box">
                                                        <select data-target="#search_form" class="selectpicker"
                                                            name="brand" id="brand" onchange="fetch_models(this.form)">
                                                            <option value="0"> --Brand-- </option>
                                                            <?php while ($row = $result_brand->fetch_array()): ?>
                                                            <!-- stores brand result into arry  -->
                                                            <?php if ($row['brand_id'] == $brand): ?>
                                                            <option value="<?php echo $row['brand_id']; ?>" selected>
                                                                <?php echo $row['brand_name']; ?>
                                                            </option>
                                                            <?php else: ?>
                                                            <option value="<?php echo $row['brand_id']; ?>">
                                                                <?php echo $row['brand_name']; ?></option>
                                                            <?php endif; ?>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <span>Select model</span>
                                                    <div class="selected-box">
                                                        <select class="selectpicker" name="model" id="model"
                                                            onchange="fetch_years(this.form)">
                                                            <option value="0"> --Model-- </option>
                                                            <?php while ($row = $result_model->fetch_array()): ?>
                                                            <!-- stores model result into arry  -->
                                                            <?php if ($row['model_id'] == $model): ?>
                                                            <option value="<?php echo $row['model_id']; ?>" selected>
                                                                <?php echo $row['model_name']; ?>
                                                            </option>
                                                            <?php else: ?>
                                                            <option value="<?php echo $row['model_id']; ?>">
                                                                <?php echo $row['model_name']; ?></option>
                                                            <?php endif; ?>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <span>Select year</span>
                                                    <div class="selected-box">
                                                        <select class="selectpicker" name="year" id="year">
                                                            <option value="0"> --Year-- </option>
                                                            <?php while ($row = $result_year->fetch_array()): ?>
                                                            <!-- stores year result into arry  -->
                                                            <?php if ($row['model_year'] == $year): ?>
                                                            <option value="<?php echo $row['model_year']; ?>" selected>
                                                                <?php echo $row['model_year']; ?></option>
                                                            <?php else: ?>
                                                            <option value="<?php echo $row['model_year']; ?>">
                                                                <?php echo $row['model_year']; ?></option>
                                                            <?php endif; ?>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <span>Select vehicle Condition</span>
                                                    <div class="selected-box">
                                                        <select class="selectpicker" name="condition" id="condition">
                                                            <option value="0"> --Vehicle Condition--
                                                            </option>
                                                            <option value="1" <?=$condition == 1 ? 'selected' : ''; ?>>
                                                                New</option>
                                                            <option value="2" <?=$condition == 2 ? 'selected' : ''; ?>>
                                                                Used</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row-sm">
                                                    <div class="price-search">
                                                        <span class="mb-2" style="color:#fff">Minimum price
                                                            <i class="fa fa-rupee"></i></span>

                                                        <div class="search">
                                                            <input type="number" class="form-control placeholder"
                                                                name="minPrice" value=<?=$min_price; ?>
                                                                placeholder=" --Minimum Price-- " min="0" max="100000000"
                                                                style="background-color: #fff;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-sm">
                                                    <div class="price-search">
                                                        <span class="mb-2" style="color:#fff">Maximum price
                                                            <i class="fa fa-rupee"></i></span>
                                                        <div class="search">
                                                            <input type="number" class="form-control placeholder"
                                                                name="maxPrice" value="<?=$max_price; ?>" placeholder="
                                                                --Maximum Price-- " min="0" max="100000000"
                                                                style="background-color: #fff;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button class="button" type="submit"><i class="bi fa fa-search"></i>
                                                        Search Car</button>
                                                    <br>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5 align-self-end">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <br>
                        <img class="img-fluid center-block" src="images/banner-2.jpg" alt="">
                    </div>
                </div>

            </div>

            <div class="col-lg-9 col-md-8">
                <?php if (true == $notfound) {
 ?>
                <h2 class="text-center mt-4 text-danger">SORRY! no items found</h2>
                <?php
} ?>

                <?php while ($row = mysqli_fetch_array($result)) { ?>



                <div class="car-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid"
                                        src="<?php echo $root; ?>/images/car/<?php echo $row['vehicle_image']; ?>"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="car-details">
                                <div class="car-title">
                                    <a
                                        href="<?php echo $root; ?>/single.php?vehicle=<?php echo $row['vehicle_id']; ?>"><?php echo $row['brand_name'] . '&nbsp&nbsp;' . $row['model_name']; ?></a>
                                    <p><?php echo $row['vehicle_description']; ?></p>
                                </div>
                                <div class="price">

                                    <span class="new-price"><?php echo indMoneyFormat($row['vehicle_price']); ?>
                                    </span>
                                    <?php if($row['vehicle_status'] == 'Available'): ?>
                                    <a class="button red float-end"
                                        href="<?php echo $root; ?>/single.php?vehicle=<?php echo $row['vehicle_id']; ?>">Get
                                        Details</a>
                                    <?php else: ?>
                                    <a class="button red float-end"
                                        href="<?php echo $root; ?>/single.php?vehicle=<?php echo $row['vehicle_id']; ?>" style="pointer-events: none;">Unavailable</a>
                                    <?php endif; ?>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered" title="Model Year"></i>
                                            <?php echo $row['model_year']; ?></li>
                                        <li><i class="fa fa-cog" title="Transmission Type"></i>
                                            <?php echo $row['transmission_type']; ?> </li>
                                        <li><i class="fa fa-dashboard" title="Distance Driven"></i>
                                            <?php echo $row['kms_driven'] > 0 ? indNumberFormat($row['kms_driven']) . ' km' : "New"; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>
        </div>
    </div>
    <div class="pagination-nav d-flex justify-content-center">
        <ul class="pagination">
            <?php
if (!isset($_GET['page']) || $_GET['page'] <= 1) {
 $current_page = 1;
} elseif ($_GET['page'] >= $number_of_page) {
 $current_page = $number_of_page;
} else {
 $current_page = $_GET['page'];
}

if ($current_page <= 3) {
 $lower = 1;
 $upper = min(5, $number_of_page);
} elseif ($current_page >= ($number_of_page - 2)) {
 $lower = $number_of_page - 4;
 $upper = $number_of_page;
} else {
 $lower = $current_page - 2;
 $upper = $current_page + 2;
}

// echo "Lower: $lower - Upper:  $upper";

$query = $_SERVER['QUERY_STRING'];
if (isset($_GET['page'])) {
 $query = explode('&', $query);
 array_pop($query);
 $query = implode('&', $query);

}

if ($lower > 1) {
 echo "<li><a href='listing.php?$query&page=1' title='First Page'><<</a></li>";
}

if ($current_page > 1) {
 $previous_page = $current_page - 1;
 echo "<li><a href='listing.php?$query&page=$previous_page' title='Previous Page'><</a></li>";
}

for ($page = $lower; $page <= $upper; $page++) {
 ?>
            <li>
                <?php
if ($page == $current_page) {
  echo "<a href='#' style = 'pointer-events: none; color: red;'>$page</a>";
 } else {
  echo "<a href='listing.php?$query&page=$page'>$page</a>";
 }
 ?>
            </li>

            <?php
}

if ($current_page < $number_of_page) {
 $next_page = $current_page + 1;
 echo "<li><a href='listing.php?$query&page=$next_page' title='Next Page'>></a></li>";
}

if ($upper < $number_of_page) {
 echo "<li><a href='listing.php?$query&page=$number_of_page' title='Last Page'>>></a></li>";
}
?>

        </ul>
    </div>
</section>

<!--=================================
            product-listing  -->


<!--=================================
            footer -->

<?php include 'footer.php'; ?></body>

</html>