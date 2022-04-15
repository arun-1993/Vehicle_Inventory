<?php include '_dbconnect.php';?>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])){
    $error = false;
    $id = $_GET['id'];
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$confpassword = $_POST['confpassword'];
	$query = $mysqli->prepare("SELECT password from user where user_id = ?");
    $query->bind_param('i',$id);
    
	$passwordverify = $query->execute();
    $fachresult = $query->get_result();
	$value = $fachresult->fetch_assoc();
	if(password_verify($oldpassword,$value['password'])){
        if($newpassword === $confpassword && $newpassword !== $oldpassword){
            $hashedpassword = password_hash($newpassword,PASSWORD_DEFAULT);

            $updatepassword = $mysqli->prepare("UPDATE user SET password = ? where user_id = ?");
            $updatepassword->bind_param('si',$hashedpassword,$id);
            $updatepassword->execute();

            // $query = "UPDATE user SET password = '$hashedpassword' where user_id = $id";
            // mysqli_query($conn,$query);
            
            header("Location: profile.php");
            
            

            
        }
        elseif($newpassword === $oldpassword)
        {
            $error = "same";
        }

        else
        {
            $error = "mismatch";
        }

    }
    else {
        $error = "old_false";
    }

    if($error)
    {
        header("location:editprofile.php?error=$error");
        ?>

        <script> 
        window.location = "";


    </script>

            <?php
    }
}
?>


