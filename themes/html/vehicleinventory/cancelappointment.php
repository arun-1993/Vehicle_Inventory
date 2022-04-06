<?php 
    include_once 'header.php';
?>

<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        echo $id;
        
        $query = "update `appointment` set appointment_status='Cancelled' where appointment_id = '".$id."'";
        
        if(mysqli_query($conn,$query)){

            ?>
        <script>window.location = "myappoint.php";</script>
            <?php
        }

    }


?>