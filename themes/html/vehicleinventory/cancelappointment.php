<?php 
    include_once 'header.php';
?>

<?php

    if(isset($_GET['id'])){

        $appointmentid = $_GET['id'];
        // echo $appointmentid;
        
        $query = $mysqli->prepare("update `appointment` set appointment_status='Cancelled' where appointment_id =? ");
        $query->bind_param('i',$appointmentid);
        $query->execute();
        
        if($query->execute()){

            ?>
        <script>window.location = "myappointment.php";</script>
            <?php
        }

    }


?>