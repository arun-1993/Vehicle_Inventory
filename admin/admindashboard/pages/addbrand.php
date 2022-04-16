<?php

include 'header.php';

$exist = false;

if (isset($_POST["brand_name"])) {
    $brandname = $_POST["brand_name"];

    if ('' != $brandname) {
        $brandinsert = $mysqli->prepare("INSERT INTO brand_master (brand_name) VALUES (?)");
        $brandinsert->bind_param('s', $brandname);
        $brandresult = $brandinsert->execute();

        // $brandinsert = "insert into brand_master(brand_name) values('".$brandname."')"; // insert into dB
        // $brandresult = mysqli_query($conn,$brandinsert);

        if ($brandresult) {
            header("Location: brand.php");
        } else {
            $exist = true;
        }
    }

}
?>

<div class="page">
    <div class="page-main">

        <!--sidebar open-->
        <?php include 'sidebar.php';?>
        <!--sidebar closed-->

        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <?php include 'pageheader.php';?>
                <!--/app header-->

                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Add Brand</h4>
                    </div>
                </div>
                <!--End Page header-->
                <!-- End Row -->
                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Brand</h4>
                            </div>
                            <div class="card-body">
                                <?php if($exist): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> The brand you have entered already exists! Enter a different name.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name*</label>
                                            <input type="text" class="form-control" name="brand_name"
                                                placeholder="Enter Brand Name" required />
                                        </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save
                                    Brand</button>
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

<!--Footer-->
<?php include 'footer.php';?>
<!-- End Footer-->
</body>

</html>