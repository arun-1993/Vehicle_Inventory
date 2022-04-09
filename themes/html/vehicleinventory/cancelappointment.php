<?php 
    include_once 'header.php';
?>

<?php

    if(isset($_GET['id'])){

        $appointmentid = $_GET['id'];
        // echo $appointmentid;
        
        $query = "update `appointment` set appointment_status='Cancelled' where appointment_id = '".$appointmentid."'";
        
        if(mysqli_query($conn,$query)){

            ?>
        <script>window.location = "myappointment.php";</script>
            <?php
        }

    }


?>