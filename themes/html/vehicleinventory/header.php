<?php 

session_start();
ob_start();
include '_dbconnect.php' ;
$root = $_SERVER["DOCUMENT_ROOT"];
echo $root;


$Signedin = false;
if (isset($_SESSION['Username']))
{
  $Signedin = true;    
}

function IND_money_format($money)
{
  $len = strlen($money);
  $m = '';
  $money = strrev($money);
  
  for($i=0;$i<$len;$i++)
  {
    if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len)
    {
      $m .=',';
    }
    
    $m .=$money[$i];
  }
  return '&#8377; '. strrev($m);
}

function IND_number_format($number)
{
  $len = strlen($number);
  $m = '';
  $money = strrev($number);
  
  for($i=0;$i<$len;$i++)
  {
    if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len)
    {
      $m .=',';
    }
    
    $m .=$money[$i];
  }
  return strrev($m);
}

$page = basename($_SERVER['PHP_SELF']);
$page = ucwords(explode('.',$page)[0]);

$popular_brands_query = "SELECT * FROM popular_list WHERE list_id = 1";
$popular_brands_result = mysqli_query($conn, $popular_brands_query);

$popular_brands = mysqli_fetch_array($popular_brands_result)['list_values'];
$popular_brands_array = explode(',', $popular_brands);

$brand_query = "SELECT * FROM brand_master WHERE brand_id IN ($popular_brands) ORDER BY brand_name";
$brand_result = mysqli_query($conn, $brand_query);

$popular_cars_query = "SELECT * FROM popular_list WHERE list_id = 2";
$popular_cars_result = mysqli_query($conn, $popular_cars_query);

$popular_cars = mysqli_fetch_array($popular_cars_result)['list_values'];
$popular_cars_array = explode(',', $popular_cars);

$car_query = "SELECT * FROM model_master JOIN brand_master USING(brand_id) WHERE model_id IN ($popular_cars) ORDER BY model_name";
$car_result = mysqli_query($conn, $car_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

  <!-- Getting current page title -->
<title>AutoTrack | <?php echo $page; ?></title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css" />

<!-- mega menu -->
<link rel="stylesheet" type="text/css" href="css/mega-menu/mega_menu.css" />

<!-- mega menu -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css" />

<!-- owl-carousel -->
<link rel="stylesheet" type="text/css" href="css/owl-carousel/owl.carousel.css" />

<!-- magnific-popup -->
<link rel="stylesheet" type="text/css" href="css/magnific-popup/magnific-popup.css" />

<!-- jquery-ui -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />

<!-- revolution -->
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">

<!-- main style -->
<link rel="stylesheet" type="text/css" href="css/style.css" />

<link rel="stylesheet" type="text/css" href="css/custom.css" />

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css" />

<!-- Slick css -->
<link rel="stylesheet" type="text/css" href="css/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css" />

</head>
<!--=================================
  loading -->

  <!-- <div id="loading">
  <div id="loading-center">
      <img src="images/loader4.gif" alt="">
 </div>
</div> -->

<!--=================================
  loading -->


  <!-- Starting session -->


<!--=================================
 header -->

<header id="header" class="topbar-dark logo-center" style= "background-color:#ebf3fa">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="topbar-left text-md-start text-center">
           <ul class="list-inline">
             <li> <i class="fa fa-envelope-o"> </i>info.autotrackindia@gmail.com</li>
             <li> <i class="fa fa-clock-o"></i> Mon - Sat 9.00 A.M - 9.00 P.M Sunday CLOSED</li>
            

           </ul>
           
        </div>
      </div>
      <div class="col-md-6">
        <div class="topbar-right text-md-end text-center">
           <ul class="list-inline">
             <li> <i class="fa fa-phone"></i> +91 7984856432</li>
             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
             <li><a href="#"><i class="fa fa-twitter"></i></a></li>
             <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                
             <!-- <li><?php if($Signedin==true){ echo "<strong>Welcome!  </strong>".$_SESSION['Username'];}?></li> -->
             <li><?php if($Signedin==true){ echo "<strong>Welcome!  </strong>".$_SESSION['name'];}?></li>
           </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!--=================================
    menu -->

<div class="menu">
  <!-- menu start -->
   <nav id="menu" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
     <div class="container">
      <div class="row">
       <div class="col-md-12 text-center position-relative">
         <!-- menu logo -->
          <ul class="menu-logo" style="padding:0px">
              <li >
                  <a href="index.php"><img id="" src="images/logoopt4.png" alt="logo" style = "width:auto; height:auto;padding-top:20px;"> </a>
              </li>
          </ul>
          <!-- menu links -->
          <ul class="menu-links">
              
            <li class=""><a href="index.php"> Home </a>
                

            </li>

            <li><a href="javascript:void(0)">Vehicles <i class="fa fa-angle-down fa-indicator"></i></a>
            <ul class="drop-down-multilevel ">

              <li>
                <a href="listing.php"> Cars <i class="fa fa-angle-right fa-indicator"></i> </a>
                  <ul class="drop-down-multilevel">
                    <li><a href="#" style = "pointer-events:none">Popular Brands <i class="fa fa-angle-right fa-indicator"></i></a>
                    <ul class="drop-down-multilevel">

                      <?php while($row = mysqli_fetch_array($brand_result)) : ?>
                      <li><a href="<?php echo 'listing.php?brand='. $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></a></li>
                      <?php endwhile; ?>
                      <li><a href="listing.php">All Brands</a></li>

                    </ul>
                    <li><a href="#" style = "pointer-events:none">Popular Cars<i class="fa fa-angle-right fa-indicator"></i></a>
                  
                    <ul class="drop-down-multilevel">

                      <?php while($row = mysqli_fetch_array($car_result)) : ?>
                        <li><a href="<?php echo 'listing.php?model='. $row['model_id']; ?>"><?php echo $row['brand_name'].' '.$row['model_name']; ?></a></li>
                        <!-- <li><a href="listing.php?car=city">Honda City</a></li>
                        <li><a href="listing.php?car=Kwid">Renault kwid</a></li>
                        <li><a href="listing.php?car=nexon">Tata Nexon</a></li>
                        <li><a href="listing.php?car=harrier">Tata Harrier</a></li> -->
                      <?php endwhile; ?>
                        <li><a href="listing.php">All Cars</a></li>

                        </ul>
  </ul>



                  
                  </li>
                
             </ul>
          
          
          </li>
            <li><a href="service.php">About Us  </a>          
            </li>	
			
            <li><a href="contactus.php"> Contact Us</a>            
            </li>

        <!-- checking logged in or not -->

<?php if (isset($_SESSION['Loggedin'])== true)
				
				{
					?>
				<li><a href="javascript:void(0)">My Account <i class="fa fa-angle-down fa-indicator"></i></a>
				<ul class="drop-down-multilevel">
					<li><a href="myappointment.php"> My Appointment</a></li>
					<li><a href="editprofile.php?Username=<?php echo $_SESSION['Username'];?>"> Edit Profile</a></li>
					<li><a href="logout.php?loc='. $_SERVER['REQUEST_URI']. '" > Sign Out</a></li>
				</ul>
			</li>
					
<?php
				}
				else{

                    echo '<li><a href="register.php" > Register</a></li>';
                    echo'<li><a href="login.php?loc='. $_SERVER['REQUEST_URI']. '" > Login</a></li>';
			?>

            <?php if( $Signedin == true){
                echo '';}
                 
                }
                
                ?>
        </ul>

      

       </div>
      </div>
     </div>
    </section>
   </nav>
  <!-- menu end -->
 </div>
</header>
<div id="scroll_anchor"></div>