<?php

include 'header.php';

$exist = false;

if (isset($_POST['updatebtn'])) {
 $fueltypeid = $_POST['edit_id'];
 $fuel       = $_POST['fuel_type'];

 $updatefueltype = $mysqli->prepare("UPDATE fuel_type SET fuel_type=? WHERE fuel_type_id= ?");
 $updatefueltype->bind_param('si', $fuel, $fueltypeid);
 $query_run = $updatefueltype->execute();

 if ($query_run) {
  header("Location: fueltype.php");
 } else {
  $exist = true;
 }
}

if (isset($_GET['id'])) {
 $fueltypeid = $_GET['id'];

 $selectfueltype = $mysqli->prepare("SELECT * from fuel_type  WHERE fuel_type_id= ? ");
 $selectfueltype->bind_param('i', $fueltypeid);
 $selectfueltype->execute();
 $query_run   = $selectfueltype->get_result();
 $fuel_detail = $query_run->fetch_array();
}

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
                        <h4 class="page-title">Fuel Type</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Fuel Type</h4>
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
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <input type="hidden" name="edit_id"
                                            value="<?php echo $fuel_detail['fuel_type_id']; ?>">
                                        <div class="form-group">
                                            <label class="form-label">Fuel Type</label>
                                            <input type="text" class="form-control" minlength="2" maxlength="20"
                                                name="fuel_type" value="<?php echo $fuel_detail['fuel_type']; ?>"
                                                placeholder="Enter Fuel Type" required>
                                        </div>
                                        <a href="<?php echo $root; ?>/fueltype.php"
                                            class="btn btn-danger mt-4 mb-0">Cancel</a>
                                        <button type="submit" name="updatebtn"
                                            class="btn btn-primary mt-4 mb-0">Update</button>
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
<?php include 'footer.php'; ?>
<!-- End Footer-->

</body>

</html>