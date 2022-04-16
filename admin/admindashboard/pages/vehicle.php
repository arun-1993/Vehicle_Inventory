<?php

include_once 'header.php';

$selectvehicle = $mysqli->prepare("SELECT * from vehicle v JOIN model_master m JOIN bodycolor c JOIN fuel_type f JOIN transmission t WHERE v.model_id=m.model_id and v.exterior_color=c.color_id and v.fuel_type_id=f.fuel_type_id and v.transmission_id=t.transmission_id AND v.vehicle_status='Available' ORDER BY model_name");
$selectvehicle->execute();
$vehicle = $selectvehicle->get_result();

?>

<div class="page">
    <div class="page-main">

        <!--aside open-->
        <?php include 'sidebar.php';?>
        <!--aside closed-->

        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <?php include 'pageheader.php';?>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Vehicle</h2>
                                    <h5>
                                        <a href="<?=$root;?>/addvehicle.php" style="color:blue;">
                                            ADD VEHICLE
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap" id="example1">
                                        <thead>
                                            <tr>
                                                <th class="wd-25p border-bottom-0">Vehicle Image</th>
                                                <th class="wd-15p border-bottom-0">Model Name</th>
                                                <th class="wd-15p border-bottom-0">Color</th>
                                                <th class="wd-20p border-bottom-0">Fuel Type</th>
                                                <th class="wd-15p border-bottom-0">Transmission Type</th>
                                                <th class="wd-10p border-bottom-0">Model Year</th>
                                                <th class="wd-25p border-bottom-0">Seating Capacity</th>
                                                <th class="wd-25p border-bottom-0">Vehicle Price</th>
                                                <th class="wd-25p border-bottom-0">Vehicle Vin</th>
                                                <th class="wd-25p border-bottom-0">Kms-driven</th>
                                                <th class="wd-25p border-bottom-0">Edit</th>
                                                <th class="wd-25p border-bottom-0">Mark As Sold</th>
                                                <th class="wd-25p border-bottom-0">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $vehicle->fetch_assoc()): ?>
                                            <tr>
                                                <td><img src="<?=$root;?>/../../../client/images/car/<?=$row['vehicle_image'];?>"
                                                        height="100" width="350" style="border-radius:12%"></td>
                                                <td><?=$row['model_name'];?></td>
                                                <td><?=$row['color'];?></td>
                                                <td><?=$row['fuel_type'];?></td>
                                                <td><?=$row['transmission_type'];?></td>
                                                <td><?=$row['model_year'];?></td>
                                                <td><?=$row['seating_capacity'];?></td>
                                                <td><?=indMoneyFormat($row['vehicle_price']);?></td>
                                                <td><?=$row['vehicle_vin'];?></td>
                                                <td><?=$row['kms_driven'] == 0 ? 'New' : indNumberFormat($row['kms_driven']) . ' km';?>
                                                </td>
                                                <td>
                                                    <a href="<?=$root;?>/vehicleedit.php?id=<?=$row['vehicle_id'];?>"
                                                        class="btn btn-success">EDIT</a>
                                                </td>
                                                <td>
                                                    <a href="<?=$root;?>/vehiclesold.php?id=<?=$row['vehicle_id'];?>"
                                                        class="btn btn-primary audit-confirmation">MARK SOLD</a>
                                                </td>
                                                <td>
                                                    <a href="<?=$root;?>/vehicledelete.php?id=<?=$row['vehicle_id'];?>"
                                                        class="btn btn-danger delete-confirmation">DELETE</a>
                                                </td>
                                            </tr>
                                            <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
        </div><!-- end app-content-->
    </div>

    <?php include 'footer.php';?>


    <script>
    var elems = document.getElementsByClassName('audit-confirmation');
    var confirmIt = function(e) {
        var dialog = 'Are you sure you want to mark this car as sold?'
        if (!confirm(dialog)) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
    </script>