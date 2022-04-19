<?php

include 'header.php';

$exist = false;

if (isset($_POST['updatebtn'])) {
 $mid         = $_POST['model_id'];
 $bid         = $_POST['brand_id'];
 $model       = $_POST['model_name'];
 $description = $_POST["general_description"];

 $updatemodel = $mysqli->prepare("UPDATE model_master SET  model_name=? , general_description=? WHERE model_id=?");
 $updatemodel->bind_param('ssi', $model, $description, $mid);
 $query_run = $updatemodel->execute();

 if ($query_run) {

  header("Location: model.php");
 } else {
  $exist = true;
 }
}

if (isset($_GET['id'])) {
 $mid = $_GET['id'];

 //echo $name;
 //echo $id;
 $query = $mysqli->prepare("select * from model_master m JOIN brand_master b where m.brand_id=b.brand_id and model_id= ? ");
 $query->bind_param('i', $mid);
 $query->execute();
 $query_run     = $query->get_result();
 $model_details = $query_run->fetch_assoc();
 $brand         = $model_details['brand_id'];
}

$sql1    = "SELECT * FROM brand_master ORDER BY brand_name";
$result1 = mysqli_query($conn, $sql1);

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
                        <h4 class="page-title">Model</h4>
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
                                <h4 class="card-title">Edit Model</h4>
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
                                <?php endif; ?>
                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name</label>
                                            <select class="form-control" name="brand_id" required>
                                                <option value=""> -- Select Brand -- </option>
                                                <?php while ($row1 = mysqli_fetch_array($result1)): ?>
                                                <option value="<?php echo $row1['brand_id']; ?>"
                                                    <?=$brand == $row1['brand_id'] ? 'selected' : ''; ?>>
                                                    <?php echo $row1['brand_name']; ?>
                                                </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="model_id" value="<?=$model_details['model_id']; ?>">
                                        <div class="form-group">
                                            <label class="form-label">Model Name</label>
                                            <input type="text" minlength="2" maxlength="20" class="form-control"
                                                name="model_name" value="<?php echo $model_details['model_name']; ?>"
                                                placeholder="Enter Model Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">General Description</label>
                                            <textarea class="form-control" minlength="10" maxlength="65535"
                                                name="general_description" placeholder="Enter a General Description"
                                                required><?php echo $model_details['general_description']; ?></textarea>
                                        </div>
                                        <a href="<?php echo $root; ?>/model.php"
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