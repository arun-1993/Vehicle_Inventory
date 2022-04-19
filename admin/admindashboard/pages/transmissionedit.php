<?php

include 'header.php';

$exist = false;

if (isset($_POST['updatebtn'])) {
 $id           = $_POST['edit_id'];
 $transmission = $_POST['transmission_type'];

 $updatetransmission = $mysqli->prepare("UPDATE transmission SET transmission_type=? WHERE transmission_id=?");
 $updatetransmission->bind_param('si', $transmission, $id);

 $query_run = $updatetransmission->execute();

 if ($query_run) {
  header("Location: transmission.php");
 } else {
  $exist = true;
 }
}

if (isset($_GET['id'])) {
 $id = $_GET['id'];

 $selecttransmission = $mysqli->prepare("SELECT * from transmission WHERE transmission_id= ? ");
 $selecttransmission->bind_param('i', $id);
 $selecttransmission->execute();
 $query_run           = $selecttransmission->get_result();
 $transmission_detail = $query_run->fetch_array();
}

?>

<div class="page">
    <div class="page-main">

        <!--aside open-->
        <?php include 'sidebar.php'; ?>
        <!--aside closed-->

        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <?php include 'pageheader.php'; ?>
                <!--/app header-->
                <!--Page header-->

                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Transmission</h4>
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
                                <h4 class="card-title">Edit Transmission</h4>
                            </div>
                            <div class="card-body">
                                <?php if ($exist): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> The transmission type you have entered already exists! Enter
                                    a different
                                    transmission type.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <input type="hidden" name="edit_id"
                                            value="<?=$transmission_detail['transmission_id']; ?>">
                                        <div class="form-group">
                                            <label class="form-label">Transmission Type</label>
                                            <input type="text" class="form-control" name="transmission_type"
                                                value="<?=$transmission_detail['transmission_type']; ?>"
                                                placeholder="Enter Transmission Type" required>
                                        </div>
                                        <a href="<?php echo $root; ?>/transmission.php"
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