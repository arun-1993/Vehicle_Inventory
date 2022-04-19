<?php

include 'header.php';

$exist = false;

if (isset($_POST['updatebtn'])) {
 $brandid = $_POST['edit_id'];
 $brand   = $_POST['brand_name'];

 $brandupdate = $mysqli->prepare("UPDATE brand_master SET brand_name=? WHERE brand_id= ?");
 $brandupdate->bind_param('si', $brand, $brandid);
 $query_update = $brandupdate->execute();

 if ($query_update) {
  header("Location: brand.php");
 } else {
  $exist = true;
 }
}

if (isset($_GET['id'])) {
 $brandid = $_GET['id'];
 //echo $brandid;
 $brandselect = $mysqli->prepare("SELECT * from brand_master WHERE brand_id= ? ");
 $brandselect->bind_param('i', $brandid);
 $brandselect->execute();
 $query_fetch   = $brandselect->get_result();
 $brand_details = $query_fetch->fetch_array();
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
                        <h4 class="page-title">Brand</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Brand</h4>
                            </div>
                            <div class="card-body">
                                <?php if ($exist): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>OOPS!</strong> The brand you have entered already exists! Enter a different
                                    name.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <input type="hidden" name="edit_id"
                                            value="<?php echo $brand_details['brand_id']; ?>">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name</label>
                                            <input type="text" class="form-control" name="brand_name"
                                                placeholder="Enter Brand Name"
                                                value="<?php echo $brand_details['brand_name']; ?>" required>
                                        </div>
                                        <a href="<?php echo $root; ?>/brand.php"
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
<?php include 'footer.php'; ?>
</body>

</html>