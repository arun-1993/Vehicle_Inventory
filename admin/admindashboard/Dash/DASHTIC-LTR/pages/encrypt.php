<?php
$string= "riya@16";
$hashed = password_hash($string,PASSWORD_DEFAULT);
echo $hashed;


?>