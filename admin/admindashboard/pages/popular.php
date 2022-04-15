<?php include('header.php');?>

<?php

$brand_change = 0;
$car_change = 0;

if(isset($_POST['submit_brands']))
{
    $popular_brands = implode(',', $_POST['brands']);

    $brand_update = "UPDATE popular_list SET list_values = '$popular_brands' WHERE list_id = 1";
    mysqli_query($conn, $brand_update);

    if(mysqli_affected_rows($conn) != 0)
    {
        $brand_change = 2;
    }

    else
    {
        $brand_change = 1;
    }
}

if(isset($_POST['submit_cars']))
{
    $popular_cars = implode(',', $_POST['cars']);
    
    $car_update = "UPDATE popular_list SET list_values = '$popular_cars' WHERE list_id = 2";
    mysqli_query($conn, $car_update);

    if(mysqli_affected_rows($conn) != 0)
    {
        $car_change = 2;
    }

    else
    {
        $car_change = 1;
    }
}

$brand_query = "SELECT * FROM brand_master ORDER BY brand_name";
$brand_result = mysqli_query($conn, $brand_query);

$brand_list_query = "SELECT * FROM popular_list WHERE list_id = 1";
$brand_list = mysqli_query($conn, $brand_list_query);

$selected_brands = mysqli_fetch_array($brand_list)['list_values'];
$selected_brands = explode(',', $selected_brands);

$car_query = "SELECT * FROM model_master ORDER BY model_name";
$car_result = mysqli_query($conn, $car_query);

$car_list_query = "SELECT * FROM popular_list where list_id = 2";
$car_list = mysqli_query($conn, $car_list_query);

$selected_cars = mysqli_fetch_array($car_list)['list_values'];
$selected_cars = explode(',', $selected_cars);

?>

<div class="page">
	<div class="page-main">

		<!--sidebar open-->
		<?php include('sidebar.php');?>
		<!--sidebar closed-->

		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include('pageheader.php');?>
				<!--End Page header-->

                <div class="row">
                    <!-- <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12"> -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>About Us</h2>
                                </div>
                            </div>

                            <div class="card-body row">
                                <div class="col-6">
                                    <?php if($brand_change == 2) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Holy guacamole!</strong> The list of popular brands has been changed.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php elseif($brand_change == 1) : ?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>Holy guacamole!</strong> There were no changes made.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                    <h5>Popular Brands</h5>
                                    <form method="POST" id ="brand_form" enctype="multipart/form-data">
                                        <?php while($brand = mysqli_fetch_array($brand_result)) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="brands[]" value="<?php echo $brand['brand_id']; ?>" <?php echo in_array($brand['brand_id'], $selected_brands)? 'checked': ''; ?> />
                                            <label class="form-check-label" for="brands"><?php echo $brand['brand_name']; ?></label>
                                        </div>
                                        <?php endwhile; ?>
                                        <button type="submit" name="submit_brands" class="btn btn-primary mt-4 mb-0">Change Popular Brands</button>
                                    </form>
                                </div>

                                <div class="col-6">
                                    <?php if($car_change == 2) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Holy guacamole!</strong> The list of popular cars has been changed.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php elseif($car_change == 1) : ?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>Holy guacamole!</strong> There were no changes made.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                    <h5>Popular Cars</h5>
                                    <form method="POST" id ="car_form" enctype="multipart/form-data">
                                    <?php while($car = mysqli_fetch_array($car_result)) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="cars[]" value="<?php echo $car['model_id']; ?>" <?php echo in_array($car['model_id'], $selected_cars)? 'checked': ''; ?>/>
                                            <label class="form-check-label" for="cars"><?php echo $car['model_name']; ?></label>
                                        </div>
                                    <?php endwhile; ?>
                                        <button type="submit" name="submit_cars" class="btn btn-primary mt-4 mb-0">Change Popular Cars</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/div-->
                    </div>
                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- end app-content-->
    </div>
</div>
<?php include('footer.php') ?>