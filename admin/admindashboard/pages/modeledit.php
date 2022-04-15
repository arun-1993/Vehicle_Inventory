<?php include 'header.php'; ?>

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
                        <h4 class="page-title">Edit Form</h4>
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

                                <div class="">

                                    <?php

if (isset($_GET['id']) && isset($_GET['name'])) {
 $mid  = $_GET['id'];
 $name = $_GET['name'];

 //echo $name;
 //echo $id;
 $selectmodel = $mysqli->prepare("select * from model_master m JOIN brand_master b where m.brand_id=b.brand_id and model_id= ? ");
 $selectmodel->bind_param('i', $mid);
 $selectmodel->execute();
 $query_run = $selectmodel->get_result();

 foreach ($query_run as $row) {
  ?>


                                    <form method="POST" action="">
                                        <!--<input type="hidden" name="edit_id" value="<?php //echo $row['model_id']; ?>">-->
                                        <div class="form-group">
                                            <label class="form-label">Brand Name</label>
                                            <select class="form-control" name="brand_id" required>
                                                <option value=""> -- Select Brand -- </option>
                                                <?php
$selectbrand = $mysqli->prepare("SELECT * FROM brand_master ORDER BY brand_name");
  $selectbrand->execute();
  $result1 = $selectbrand->get_result();
  while ($row1 = $result1->fetch_array()) {
   ?>
                                                <option value="<?php echo $row1['brand_id']; ?>" <?php if ($name == $row1['brand_name']) {
    echo "selected";
   }
   ?>>
                                                    <?php echo $row1['brand_name']; ?>
                                                </option>
                                                <?php
}
  ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Model Name</label>
                                            <input type="text" minlength="2" maxlength="20" class="form-control"
                                                name="model_name" value="<?php echo $row['model_name']; ?>"
                                                placeholder="Enter Model Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">General Description</label>
                                            <textarea class="form-control" name="general_description"
                                                placeholder="Enter a General Description" minlength="10"
                                                maxlength="56663"
                                                required><?php echo $row['general_description']; ?></textarea>
                                        </div>
                                </div>
                                <a href="<?php echo $root; ?>/model.php" class="btn btn-danger mt-4 mb-0">Cancel</a>
                                <button type="submit" name="updatebtn" class="btn btn-primary mt-4 mb-0">Update</button>
                                </form>
                                <?php

 }
}
?>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div><!-- end app-content-->
    </div>

    <?php

if (isset($_POST['updatebtn'])) {
 //$id = $_POST['edit_id'];
 $bid         = $_POST['brand_id'];
 $model       = $_POST['model_name'];
 $description = $_POST["general_description"];

 $updatemodel = $mysqli->prepare("UPDATE model_master SET  model_name=?, general_description=? WHERE model_id=?");
 $updatemodel->bind_param('ssi', $model, $description, $mid);
 $query_run = $updatemodel->execute();

 if ($query_run) {

  ?>
    <script>
    window.location = "model.php"
    </script>
    <?php

 }

}

?>
</div>
<!--Footer-->
<?php include 'footer.php'; ?>
<!-- End Footer-->

</body>

</html>