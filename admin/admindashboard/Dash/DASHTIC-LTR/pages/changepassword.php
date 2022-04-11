<?php include '_dbconnect.php';?>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])){
    $error = false;
    $id = $_GET['id'];
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$confpassword = $_POST['confpassword'];
	$query = "SELECT password from user where user_id = $id";
	$passwordverify = mysqli_query($conn,$query);
	$value = mysqli_fetch_assoc($passwordverify);
	if(password_verify($oldpassword,$value['password'])){
        if($newpassword === $confpassword && $newpassword !== $oldpassword){
            $hashedpassword = password_hash($newpassword,PASSWORD_DEFAULT);

            $updatepassword = $mysqli->prepare("UPDATE user SET password = ? where user_id = ?");
            $updatepassword->bind_param('si',$hashedpassword,$id);
            $updatepassword->execute();

            // $query = "UPDATE user SET password = '$hashedpassword' where user_id = $id";
            // mysqli_query($conn,$query);
            
            ?>

            <script>alert('Password Changed Succesfully');

            window.location = "profile.php";


        </script>

                <?php
            
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
        ?>

        <script> 
        window.location = "editprofile.php?error=<?php echo $error; ?>";


    </script>

            <?php
    }
}
?>


