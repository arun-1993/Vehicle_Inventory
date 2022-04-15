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


                <?php

if (isset($_POST["brand_id"]) && isset($_POST["model_name"])) {
 $bid   = $_POST["brand_id"];
 $model = $_POST["model_name"];

 if ('' != $bid && '' != $model) {
  $insertmodel = $mysqli->prepare("insert into model_master(brand_id,model_name) values(?,?)");
  $insertmodel->bind_param('is', $bid, $model);

  //echo $sql;
  //die;
  $result = $insertmodel->execute();

  // echo "result = " . $result;

  if ($result) {

   ?>
                <script>
                window.location = "model.php"
                </script>
                <?php

  }
 } else {
  ?>
                <script>
                window.location = "model.php"
                </script>
                <?php

 }
}
?>
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

                                <div class="">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="form-label">Brand Name</label>
                                            <select class="form-control" id="l13" name="brand_id">
                                                <?php

$selectbrand = $mysqli->prepare("select * from brand_master");
$selectbrand->execute();

$result1 = $selectbrand->get_result();
while ($row1 = $result1->fetch_array()) {
 ?>
                                                <option value="<?php echo $row1['brand_id']; ?>">
                                                    <?php echo $row1['brand_name']; ?></option>
                                                <?php
}
?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Model Name</label>
                                            <input type="text" minlength="2" maxlength="20" class="form-control"
                                                name="model_name">
                                        </div>

                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Save
                                    Model</button>
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
<?php include 'footer.php'; ?>
<!-- End Footer-->
</body>

</html>