<?php include '_dbconnect.php';?>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])){
    $error = false;
    $userid = $_GET['id'];
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$confpassword = $_POST['confpassword'];
	$query = "SELECT password from user where user_id = $userid"; // finds the password of user
	$passwordverify = mysqli_query($conn,$query);
	$value = mysqli_fetch_assoc($passwordverify); // stores the current password to verify
	if(password_verify($oldpassword,$value['password'])){
        if($newpassword === $confpassword && $newpassword !== $oldpassword){
            $hashedpassword = password_hash($newpassword,PASSWORD_DEFAULT);
            $query = "UPDATE user SET password = '$hashedpassword' where user_id = $userid";
            mysqli_query($conn,$query);
            ?>

            <script>alert('Password Changed Successfully');
            window.location = "index.php";


        </script>

                <?php
            
        }
        elseif($newpassword === $oldpassword)
        {
            $error = "same"; // occurs when user tries to set old password as new password
        }

        else
        {
            $error = "mismatch"; // occurs when user's enterd new and confirmed password mismatches
        }

    }
    else {
        $error = "old_false"; // occurs when user enters false old password
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