            <?php include '_dbconnect.php';?>

            <?php 

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])){
            $error = false;
            $userid = $_GET['id'];
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
            $confpassword = $_POST['confpassword'];
            $query = $mysqli->prepare("SELECT password from user where user_id = ?");
            $query->bind_param('i',$userid);
            $query->execute(); // finds the password of user
            $passwordverify = $query->get_result();
            $value = $passwordverify->fetch_assoc(); // stores the current password to verify
            if(password_verify($oldpassword,$value['password'])){
            if($newpassword === $confpassword && $newpassword !== $oldpassword){
            $hashedpassword = password_hash($newpassword,PASSWORD_DEFAULT);
            $query = $mysqli->prepare("UPDATE user SET password = ? where user_id = ?");
            $query->bind_param('si',$hashedpassword,$userid);
            $query->execute();
            ?>

            <script>
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