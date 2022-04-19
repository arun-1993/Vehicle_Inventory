<?php include 'header.php'; ?>

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
                        <h4 class="page-title">Color</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Exterior Color</h4>
                            </div>
                            <div class="card-body">

                                <div class="">

                                    <?php

if (isset($_POST['edit_btn'])) {
 $colorid = $_POST['edit_id'];

 $colorselect = $mysqli->prepare("SELECT * from bodycolor WHERE color_id= ? ");
 $colorselect->bind_param('i', $colorid);
 $colorselect->execute();

 $query_run = $colorselect->get_result();

 foreach ($query_run as $row) {
  ?>


                                    <form method="POST" action="">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['color_id']; ?>">
                                        <div class="form-group">
                                            <label class="form-label">Exterior Body Color</label>
                                            <input type="text" class="form-control" minlength="2" maxlength="20"
                                                name="color" value="<?php echo $row['color']; ?>"
                                                placeholder="Enter a Color" required>
                                        </div>
                                </div>
                                <a href="<?php echo $root; ?>/bodycolor.php" class="btn btn-danger mt-4 mb-0">Cancel</a>
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
 $colorid = $_POST['edit_id'];
 $color   = $_POST['color'];

 $colorupdate = $mysqli->prepare("UPDATE bodycolor SET color=? WHERE color_id= ?");
 $colorupdate->bind_param('si', $color, $colorid);
 $query_run = $colorupdate->execute();

 if ($query_run) {

  ?>
    <script>
    window.location = "bodycolor.php"
    </script>
    <?php

 } else {
  ?>
    <script>
    window.location = "bodycolor.php"
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