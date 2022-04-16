<?php

include 'header.php';

$exist = false;

if (isset($_POST["color"])) {
    $cname = $_POST["color"];

    if ('' != $cname) {$colorinsert = $mysqli->prepare("INSERT INTO bodycolor (color) VALUES (?)");
        $colorinsert->bind_param('s', $cname);
        $insertresult = $colorinsert->execute();

        if ($insertresult) {

            header("Location: bodycolor.php");
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
                        <h4 class="page-title">Add Exterior Color</h4>
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
                                <h4 class="card-title">Add Exterior Color</h4>
                            </div>
                            <div class="card-body">
                                <?php if ($exist): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> The color you have entered already exists! Enter a different
                                    name.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif;?>
                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Color*</label>
                                            <input type="text" class="form-control" name="color"
                                                placeholder="Enter a Color" required>
                                        </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save
                                    Color</button>
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