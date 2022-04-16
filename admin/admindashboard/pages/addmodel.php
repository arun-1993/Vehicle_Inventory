<?php

include 'header.php';

$exist = false;

if (isset($_POST["brand_id"]) && isset($_POST["model_name"])) {
    $brandid     = $_POST["brand_id"];
    $modelname   = $_POST["model_name"];
    $description = $_POST["general_description"];

    if ('' != $brandid && '' != $modelname) {
        $modelinsert = $mysqli->prepare("INSERT INTO model_master (brand_id, model_name, general_description) values(?, ?, ?)");
        $modelinsert->bind_param('iss', $brandid, $modelname, $description);
        $insertresult = $modelinsert->execute();

        if ($insertresult) {
            header("Location: model.php");
        } else {
            $exist = true;
        }
    }
}

$sql1    = "SELECT * FROM brand_master ORDER BY brand_name";
$result1 = mysqli_query($conn, $sql1);

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
                        <h4 class="page-title">Add Model</h4>
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
                                <h4 class="card-title">Add Model</h4>
                            </div>
                            <div class="card-body">
                                <?php if ($exist): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> The model you have entered already exists! Enter a different
                                    name.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif;?>
                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name*</label>
                                            <select class="form-control" id="l13" name="brand_id" required>
                                                <option value=""> -- Select Brand -- </option>
                                                <?php while ($row1 = mysqli_fetch_array($result1)): ?>
                                                <option value="<?php echo $row1['brand_id']; ?>">
                                                    <?php echo $row1['brand_name']; ?></option>
                                                <?php endwhile;?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Model Name*</label>
                                            <input type="text" class="form-control" name="model_name" minlength="3"
                                                maxlength="20" placeholder="Enter Model Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">General Description*</label>
                                            <textarea class="form-control" name="general_description" minlength="10"
                                                maxlength="65553" placeholder="Enter a General Description"
                                                required></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save
                                            Model</button>
                                    </form>
                                </div>
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