<?php include 'header.php';
if(isset($_GET['username'])){
  $username = $_GET['username'];
  $mailselect = $mysqli->prepare("SELECT * FROM user where username=?");
  $mailselect->bind_param('s',$username);
  $mailselect->execute();
  $mailresult = $mailselect->get_result();
  $email=$mailresult['email'];
  $selectotp = $mysqli->prepare('SELECT * FROM email_verification WHERE verification_mail=?');
        $selectotp->bind_param('s',$email);
        $selectotp->execute();
        $result1= $selectotp->get_result();
        $result = $result1->fetch_array();
        echo $result['verification_token'];
        die;
        $OTP = $_POST['otp'];
        if($OTP ==$result['verification_token']){
            echo "<script>alert(1)</script>";
        }
        else{
            echo "<script>alert(0)</script>";
        }
  
}


?>


<section class="login-form page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="section-title">
            <h2>Verify OTP </h2>
           <h2></h2>
           <div class="separator"></div>
         
        

         
</div>
      </div>
    </div>

     <!-- forgot password form start-->
    <form action="" method = "post">

      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
          <div class="gray-form clearfix">
            <div class="mb-3">
              <label class="form-label" for="email" name = 'otp'>OTP</label>
              <input id="name" class="form-control" type="text" placeholder="Enter OTP Recived on mail" name="otp">
            </div>
            
            <div class="d-grid">
              <button name="submitotp"  class="button red btn-block">Verify OTP</button> 
            </div>
            <span>didn't recived OTP <a href="regenerateotp.php?username=<?php ?>" style= "color:blue">click here to generate again</a></span>
          </div>
        
        </div>
      </div>
    </form>
    <!-- forgot password form End-->
    </div>
  </section>
<?php 
    if(isset($_POST['submitotp']))
    {   $email=$_POST['email'];
        

    }

?>





























<?php include 'footer.php';

?>