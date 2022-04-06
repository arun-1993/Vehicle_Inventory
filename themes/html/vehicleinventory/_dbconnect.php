<?php
$servername= "localhost";
    $username = "root";
    $password = "";
    $database  = "vehicle_inventory";
    
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo "error";
    }
else{
   // echo 'Connected!';
}

?>