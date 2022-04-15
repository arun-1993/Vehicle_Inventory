<?php
$servername= "localhost";
    $username = "root";
    $password = "";
    $database  = "vehicle_inventory";
    $mysqli = new mysqli($servername,$username,$password,$database);
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo "error";
    }
else{
   // echo 'Connected!';
}

?>