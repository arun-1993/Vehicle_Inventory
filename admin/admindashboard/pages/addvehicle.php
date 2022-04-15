 <?php include 'header.php'; ?>
 <?php

if (isset($_POST["submit"])) {
    $modelid        = $_POST["model_id"];
    $colorid        = $_POST["exterior_color"];
    $fueltypeid     = $_POST["fuel_type_id"];
    $transmissionid = $_POST["transmission_id"];
    $modelyear      = $_POST["model_year"];
    $capacity       = $_POST["seating_capacity"];
    $price          = $_POST["vehicle_price"];
    $vin            = $_POST["vehicle_vin"];
    $kms            = $_POST["kms_driven"];
    $decription     = $_POST["vehicle_description"];
    if (0 == $_FILES["image"]["error"]) {
        $image     = $_FILES["image"]["name"];
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $random    = rand(0, 10000);
        $rename    = 'upload' . date('ymd') . $random;
        $newname   = $rename . '.' . $extension; // new name is assigned to an uploaded image here
        move_uploaded_file($_FILES['image']['tmp_name'], '../../../client/images/car/' . $newname); // image with new name is moved to a folder
    } else {
        $newname = "ghost.png";
    }

    if ('' != $modelid && '' != $colorid && '' != $fueltypeid && '' != $transmissionid && '' != $modelyear && '' != $capacity && '' != $price && '' != $vin && '' != $kms && '' != $decription) {
        $insertvehicle = $mysqli->prepare("insert into vehicle(model_id,exterior_color,fuel_type_id,transmission_id,model_year,seating_capacity,vehicle_price,vehicle_vin,kms_driven,vehicle_description,vehicle_image) values(?,?,?,?,?,?,?,?,?,?,?)");
        $insertvehicle->bind_param('iiiiiiisiss', $modelid, $colorid, $fueltypeid, $transmissionid, $modelyear, $capacity, $price, $vin, $kms, $decription, $newname);
        $result = $insertvehicle->execute();
        if ($result) {

            ?>
 <script>
window.location = "vehicle.php"
 </script>
 <?php

        }
    } else {
        ?>
 <script>
alert("All fields are required to be filled");
 </script>
 <?php

    }
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
                         <h4 class="page-title">Add Vehicle</h4>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                         <div class="card">
                             <div class="card-header">
                                 <h4 class="card-title">Add Vehicle</h4>
                             </div>
                             <div class="card-body">

                                 <div class="">
                                     <form method="POST" action="" enctype="multipart/form-data">
                                         <div class="form-group">
                                             <label class="form-label">Model Name*</label>
                                             <select class="form-control" id="l13" name="model_id" required>
                                                 <option value=""> -- Select Model -- </option>
                                                 <?php

$selectmodel = "SELECT * FROM model_master ORDER BY model_name";
$modelresult = mysqli_query($conn, $selectmodel);
while ($row1 = mysqli_fetch_array($modelresult)) {
    ?>
                                                 <option value="<?php echo $row1['model_id']; ?>">
                                                     <?php echo $row1['model_name']; ?></option>
                                                 <?php
}
?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Color*</label>
                                             <select class="form-control" id="l13" name="exterior_color" required>
                                                 <option value=""> -- Select Body Color -- </option>
                                                 <?php

$selectcolor = "SELECT * FROM bodycolor ORDER BY color";
$colorresult = mysqli_query($conn, $selectcolor);
while ($row2 = mysqli_fetch_array($colorresult)) {
    ?>
                                                 <option value="<?php echo $row2['color_id']; ?>">
                                                     <?php echo $row2['color']; ?></option>
                                                 <?php
}
?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Fuel Type*</label>
                                             <select class="form-control" id="l13" name="fuel_type_id" required>
                                                 <option value=""> -- Select Fuel Type -- </option>
                                                 <?php

$selectfueltype = "SELECT * from fuel_type ORDER BY fuel_type";
$fueltyperesult = mysqli_query($conn, $selectfueltype);
while ($row3 = mysqli_fetch_array($fueltyperesult)) {
    ?>
                                                 <option value="<?php echo $row3['fuel_type_id']; ?>">
                                                     <?php echo $row3['fuel_type']; ?></option>
                                                 <?php
}
?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Transmission Type*</label>
                                             <select class="form-control" id="l13" name="transmission_id" required>
                                                 <option value=""> -- Select Transmission Type -- </option>
                                                 <?php

$selecttransmission = "SELECT * FROM transmission ORDER BY transmission_type";
$transmissionresult = mysqli_query($conn, $selecttransmission);
while ($row4 = mysqli_fetch_array($transmissionresult)) {
    ?>
                                                 <option value="<?php echo $row4['transmission_id']; ?>">
                                                     <?php echo $row4['transmission_type']; ?></option>
                                                 <?php
}
?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Model Year*</label>
                                             <input type="number" class="form-control" name="model_year"
                                                 placeholder="Enter Model Year" min="2010" max="<?=date("Y"); ?>"
                                                 minlength="5" required>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Seating Capacity*</label>
                                             <input type="number" class="form-control" name="seating_capacity"
                                                 placeholder="Enter Seating Capacity" min="4" max="10" required>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Vehicle Price*</label>
                                             <input type="number" class="form-control" name="vehicle_price"
                                                 placeholder="Enter Vehicle Price" min="0" max="100000000" required>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Vehicle Vin*</label>
                                             <input type="text" class="form-control" name="vehicle_vin"
                                                 placeholder="Enter VIN" minlength="17" maxlength="17" required>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Kilometers Driven*</label>
                                             <input type="number" class="form-control" name="kms_driven"
                                                 placeholder="Enter Distance Driven" min="0" max="500000" required>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Vehicle Description*</label>
                                             <textarea class="form-control" minlength="5" name="vehicle_description"
                                                 placeholder="Enter Vehicle Description" maxlength="65535"
                                                 required></textarea>
                                         </div>

                                         <div class="form-group">
                                             <label class="form-label">Vehicle Image</label>
                                             <input type="file" name="image" onchange="loadFile(event)">
                                         </div>

                                 </div>
                                 <button type="submit" name="submit" value="submit"
                                     class="btn btn-primary mt-4 mb-0">Save Vehicle</button>
                                 </form>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php include 'footer.php'; ?>
 </body>

 </html>