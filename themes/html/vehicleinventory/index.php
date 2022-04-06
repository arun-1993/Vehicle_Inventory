<?php include 'header.php'; ?>

<?php

@$brand = $_GET['brand'];
@$model = $_GET['model'];

$query_brand = "SELECT * FROM brand_master ORDER BY brand_name";
$result_brand = mysqli_query($conn, $query_brand);

if($brand > 0)
{
    $query_model = "SELECT * FROM model_master WHERE brand_id = $brand ORDER BY model_name";
}

else
{
    $query_model = "SELECT * FROM model_master ORDER BY model_name";
}

$result_model = mysqli_query($conn, $query_model);

if($model > 0)
{
    $query_year = "SELECT DISTINCT model_year FROM vehicle WHERE model_id = $model ORDER BY model_year DESC";
}

else
{
    $query_year = "SELECT DISTINCT model_year FROM vehicle ORDER BY model_year DESC";
}

$result_year = mysqli_query($conn, $query_year);

?>

<body>



<!--=================================
 header -->


<!--=================================
 rev slider -->

<div id="rev_slider_6_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider-7" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
<!-- START REVOLUTION SLIDER 5.2.6 fullwidth mode -->
  <div id="rev_slider_6_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.2.6">
<ul>  <!-- SLIDE  -->
    <li data-index="rs-11" data-transition="random-static,random,random-premium" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off"  data-randomtransition="on" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="default,default,default,default"  data-thumb="revolution/assets/slider-8/100x50_mainbg2.jpg"  data-rotate="0,0,0,0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
    <!-- MAIN IMAGE -->
        <img src="revolution/assets/slider-8/mainbg2.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
    <!-- LAYERS -->

    <!-- LAYER NR. 1 -->
    <div class="tp-caption   tp-resizeme"
       id="slide-11-layer-6"
       data-x="['left','left','center','center']" data-hoffset="['0','15','0','0']"
       data-y="['top','top','top','top']" data-voffset="['110','131','69','79']"
            data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"

       data-transform_in="x:right;s:820;e:Power2.easeInOut;"
       data-transform_out="x:left;s:650;e:Power3.easeIn;"
      data-start="850"
      data-responsive_offset="on"

       data-end="8350"

      style="z-index: 5;"><img src="revolution/assets/slider-8/audi_PNG1764.png" alt="" data-ww="['653px','586.873417721519','586px','451px']" data-hh="['237px','213','213px','164px']" data-no-retina> </div>

    <!-- LAYER NR. 2 -->
    <div class="tp-caption   tp-resizeme"
       id="slide-11-layer-3"
       data-x="['left','left','center','center']" data-hoffset="['710','628','0','0']"
       data-y="['top','top','top','top']" data-voffset="['120','144','303','272']"
            data-fontsize="['65','45','45','45']"
      data-lineheight="['65','45','45','45']"
      data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"

       data-transform_in="y:-50px;opacity:0;s:1120;e:Power2.easeInOut;"
       data-transform_out="opacity:0;s:560;"
      data-start="1690"
      data-splitin="none"
      data-splitout="none"
      data-responsive_offset="on"

       data-end="8380"

      style="z-index: 6; white-space: nowrap; font-size: 65px; line-height: 65px; font-weight: 700; color: rgba(255, 255, 255, 1.00);font-family:Roboto;text-transform:uppercase;">find the right <br>car for you </div>

    <!-- LAYER NR. 3 -->
    <div class="tp-caption rev-btn "
       id="slide-11-layer-4"
       data-x="['left','left','center','center']" data-hoffset="['720','636','0','0']"
       data-y="['top','top','top','top']" data-voffset="['289','271','421','389']"
        data-fontsize="['17','17','14','13']"
      data-lineheight="['17','17','14','13']"
            data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"
        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;"
       data-style_hover="c:rgba(0,0,0,1);bg:rgba(255,255,255,1);"

       data-transform_in="y:50px;opacity:0;s:760;e:Power2.easeInOut;"
       data-transform_out="opacity:0;s:540;"
      data-start="2340"
      data-splitin="none"
      data-splitout="none"
      data-responsive_offset="on"
      data-responsive="off"
       data-end="8410"

      style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1);font-family:Roboto;text-transform:uppercase;background-color:rgba(0, 0, 0, 1.00);padding:12px 35px 12px 35px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><a href = "#search">Search now </a></div>
  </li>
  <!-- SLIDE  -->
    <li data-index="rs-12" data-transition="random-static,random-premium,random" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off"  data-randomtransition="on" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="default,default,default,default"  data-thumb="revolution/assets/slider-8/100x50_mainbg3.jpg"  data-rotate="0,0,0,0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
    <!-- MAIN IMAGE -->
        <img src="revolution/assets/slider-8/mainbg3.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
    <!-- LAYERS -->

    <!-- LAYER NR. 1 -->
    <div class="tp-caption   tp-resizeme"
       id="slide-12-layer-6"
       data-x="['left','left','left','left']" data-hoffset="['50','50','249','101']"
       data-y="['top','middle','middle','middle']" data-voffset="['20','0','-98','-93']"
            data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"

       data-transform_in="x:-50px;opacity:0;s:1200;e:Power2.easeInOut;"
       data-transform_out="opacity:0;s:800;"
      data-start="1330"
      data-responsive_offset="on"


      style="z-index: 5;"><img src="revolution/assets/slider-8/left-car.png" alt="" data-ww="['223px','197px','141px','141px']" data-hh="['403px','357px','255px','255px']" data-no-retina> </div>

    <!-- LAYER NR. 2 -->
    <div class="tp-caption   tp-resizeme"
       id="slide-12-layer-7"
       data-x="['left','left','left','left']" data-hoffset="['273','247','389','242']"
       data-y="['top','middle','middle','middle']" data-voffset="['21','1','-97','-91']"
            data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"

       data-transform_in="x:50px;opacity:0;s:1210;e:Power2.easeInOut;"
       data-transform_out="opacity:0;s:800;"
      data-start="1310"
      data-responsive_offset="on"


      style="z-index: 6;"><img src="revolution/assets/slider-8/right-car.png" alt="" data-ww="['250px','224px','157.76425855513307','157.76425855513307']" data-hh="['401px','360px','253','253']" data-no-retina> </div>

    <!-- LAYER NR. 3 -->
    <div class="tp-caption   tp-resizeme"
       id="slide-12-layer-3"
       data-x="['left','left','center','center']" data-hoffset="['709','600','0','0']"
       data-y="['top','top','top','top']" data-voffset="['121','130','297','310']"
            data-fontsize="['65','45','45','40']"
      data-lineheight="['65','50','50','40']"
      data-color="['rgba(255, 255, 255, 1.00)','rgba(255, 255, 255, 1.00)','rgba(10, 10, 10, 1.00)','rgba(10, 10, 10, 1.00)']"
      data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"

       data-transform_in="y:-50px;opacity:0;s:730;e:Power2.easeInOut;"
       data-transform_out="opacity:0;s:770;"
      data-start="1910"
      data-splitin="none"
      data-splitout="none"
      data-responsive_offset="on"


      style="z-index: 7; white-space: nowrap; font-size: 65px; line-height: 65px; font-weight: 700; color: rgba(255, 255, 255, 1.00);font-family:Roboto;text-transform:uppercase;">Buy a new car<br>or used car ? </div>

    <!-- LAYER NR. 4 -->
    <div class="tp-caption rev-btn "
       id="slide-12-layer-4"
       data-x="['left','left','center','center']" data-hoffset="['720','607','0','-1']"
       data-y="['top','top','top','top']" data-voffset="['290','266','420','412']"
       data-fontsize="['17','17','14','13']"
      data-lineheight="['17','17','14','13']"
      data-width="none"
      data-height="none"
      data-whitespace="nowrap"
      data-transform_idle="o:1;"
        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;"
        data-style_hover="c:rgba(0,0,0,1);bg:rgba(255,255,255,1);"

       data-transform_in="y:50px;opacity:0;s:940;e:Power2.easeInOut;"
       data-transform_out="opacity:0;s:820;"
      data-start="2350"
      data-splitin="none"
      data-splitout="none"
      data-responsive_offset="on"
      data-responsive="off"

      style="z-index: 8; white-space: nowrap; font-size: 17px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1);font-family:Roboto;text-transform:uppercase;background-color:rgba(0, 0, 0, 1.00);padding:12px 35px 12px 35px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href = "#search" style = "">  Search now </a> </div>
  </li>
</ul>
<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> </div>
</div>

<!--=================================
 rev slider -->


<!--=================================

 quick-links -->

 

 <section class="quick-links white-bg">
  <div class="container  ">
   <div class="row no-gutter justify-content-center">
    <div class="col-lg-3 col-md-4 col-sm-6 px-2">
      <div class="link text-center">
       <a href="http://localhost/project/themes/html/vehicleinventory/listing.php?brand=0&model=0&year=0&condition=1&minPrice=&maxPrice=">
        <i class="fa fa-car"></i>
        <h6>New Vehicles</h6>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6  ">
      <div class="link text-center">
       <a href="http://localhost/project/themes/html/vehicleinventory/listing.php?brand=0&model=0&year=0&condition=2&minPrice=&maxPrice=">
        <i class="fa fa-car"></i>
        <h6>Used Vehicles</h6>
        </a>
      </div>
    </div>
    
   
    <div class="col-lg-3 col-md-4 col-sm-6 px-2">
      <div class="link text-center">
       <a href="listing.php">
        <i class="fa fa-empire"></i>
        <h6>AutoTrack Recomended</h6>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 px-2">
      <div class="link text-center">
       <a href="contactus.php">
        <i class="fa fa-phone"></i>
        <h6>Contact Us</h6>
        </a>
      </div>
     </div>
   </div>
  </div>
</section>

<!--=================================
 quick-links -->

 

 <!--=================================
 form -->

<section class="search-block find-car bg-1 bg-overlay-black-70 page-section-pt">
  <div class="container " id = "search">
  <div class="row">
    <div class="col-md-12">
      <div class="section-title text-start">
         <h2 class="text-white">FIND A DREAM CAR </h2>
         <div class="separator"></div>
      </div>
    </div>
   </div>
    <div class="row" id="search_form">
       <div class="col-lg-7 col-sm-12">
       <form method="GET" action="listing.php" id="form">
          <div class="row">
           <div class="col-md-6">
            <span>Select brand</span>
              <div class="selected-box">
                <select data-target="#search_form" class="selectpicker" name="brand" id="brand" onchange="fetch_models(this.form)">
                  <option value="0"> --Brand-- </option>
                  <?php while($row = mysqli_fetch_array($result_brand)) : ?>
                    <?php if($row['brand_id'] == $brand) : ?>
                    <option value="<?php echo $row['brand_id']; ?>" selected><?php echo $row['brand_name']; ?></option>
                    <?php else : ?>
                    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
            <span>Select model</span>
              <div class="selected-box">
               <select class="selectpicker" name="model" id="model" onchange="fetch_years(this.form)">
                <option value="0"> --Model-- </option>
                <?php while($row = mysqli_fetch_array($result_model)) : ?>
                  <?php if($row['model_id'] == $model) : ?>
                  <option value="<?php echo $row['model_id']; ?>" selected><?php echo $row['model_name']; ?></option>
                  <?php else : ?>
                  <option value="<?php echo $row['model_id']; ?>"><?php echo $row['model_name']; ?></option>
                  <?php endif; ?>
                <?php endwhile; ?>
               </select>
             </div>
            </div>
            <div class="col-md-6">
            <span>Select year</span>
             <div class="selected-box">
               <select class="selectpicker" name="year" id="year">
                <option value="0"> --Year-- </option>
                <?php while($row = mysqli_fetch_array($result_year)) : ?>
                <option value="<?php echo $row['model_year']; ?>"><?php echo $row['model_year']; ?></option>
                <?php endwhile; ?>
               </select>
              </div>
            </div>
            <div class="col-md-6">
            <span>Select vehicle Condition</span>
              <div class="selected-box">
                <select class="selectpicker" name="condition" id="condition">
                  <option value="0"> --Vehicle Condition-- </option>
                  <option value="1">New</option>
                  <option value="2">Used</option>
               </select>
             </div>
            </div>
            <div class="col-md-6">
              <div class="price-search">
                <span class="mb-2">Enter minimum price</span>
                <div class="search">
                  <i class="fa fa-rupee"></i>
                  <input type="number" class="form-control placeholder" name="minPrice" placeholder=" --Minimum Price-- " style="background-color: #fff;">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="price-search">
                <span class="mb-2">Enter maximum price</span>
                <div class="search">
                  <i class="fa fa-rupee"></i>
                  <input type="number" class="form-control placeholder" name="maxPrice" placeholder=" --Maximum Price-- " style="background-color: #fff;">
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-4">
              <input class="button" type="submit" value="Search the Vehicle" />
            </div>
          </div>
          </form>
         </div>
         <div class="col-md-5 align-self-end">
           <img class="img-fluid center-block" src="images/03.png" alt="">
         </div>
      </div>
    </div>
  </section>

 <!--=================================
 form -->
<?php  

$query2 = "SELECT * FROM vehicle JOIN model_master USING(model_id) JOIN brand_master USING(brand_id) JOIN transmission USING(transmission_id) ORDER BY RAND() LIMIT 5";
$result2 = mysqli_query($conn, $query2);

?>

 <!--=================================
 feature-car -->

<section class="feature-car white-bg page-section-ptb">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <div class="section-title">
         <span>Check out our recent cars</span>
         <h2>Feature Car </h2>
         <div class="separator"></div>
      </div>
    </div>
   </div>
   <div class="row">
   <div class="col-md-12">
    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="20">
    <?php while($row2 = mysqli_fetch_array($result2)) : ?>
    <div class="item">
        <div class="car-item car-item-4 text-center">
             <div class="car-image">
               <img class="img-fluid" src="images/car/<?php echo $row2['vehicle_image']; ?>" alt="" style = "height:200px;width:auto">
               <div class="car-overlay-banner">
                <ul>
                  <li><a href="single.php?vehicle=<?php echo $row2['vehicle_id']; ?>"><i class="fa fa-link"></i></a></li>
                  
                 </ul>
               </div>
             </div>
             <div class="car-list">
               <ul class="list-inline">
                 <li><i class="fa fa-registered"></i> <?php echo $row2['model_year']; ?></li>
                 <li><i class="fa fa-cog"></i> <?php echo strtok($row2['transmission_type'], " "); ?> </li>
                 <li><i class="fa fa-shopping-cart"></i> <?php echo $row2['kms_driven'] > 0 ? 'Used' : "New"; ?></li>
               </ul>
            </div>
             <div class="car-content">
                <a href="single.php?vehicle=<?php echo $row2['vehicle_id']; ?>"> <?php echo $row2['brand_name'].'&nbsp&nbsp;'.$row2['model_name']; ?></a>
               <div class="separator"></div>
               <div class="price">
                 
                 <span class="new-price"><?php echo IND_money_format($row2['vehicle_price']); ?></span>
               </div>
             </div>
           </div>
       </div>
       <?php endwhile; ?>
     
     
   </div>
  </div>
  </div>
</section>
<!--=================================
 feature-car -->



<!--=================================
 form -->

<section class="why-choose-us bg-2 bg-overlay-black-70 page-section-ptb">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="section-title">
         <span class="text-white">Because We are ultra creative agency</span>
         <h2 class="text-white">WHY CHOOSE US </h2>
         <div class="separator"></div>
      </div>
    </div>
   </div>
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="feature-box-2 box-hover ">
         <div class="icon">
           <i class="glyph-icon flaticon-beetle"></i>
         </div>
         <div class="content">
          <h5>All brands</h5>
          <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem acantium doloremque laudantium.</p>
         </div>
        </div>
      </div>
     
     
      <div class="col-md-4 col-sm-6">
          <div class="feature-box-2 box-hover">
           <div class="icon">
             <i class="glyph-icon flaticon-wallet"></i>
           </div>
           <div class="content">
            <h5>Affordable</h5>
            <p class="mb-0">Perspiciatis sed ut unde omnis iste natus error sit voluptatem acantium doloremque laudantium.</p>
           </div>
          </div>
      </div>
      <div class="col-md-4 col-sm-6">
          <div class="feature-box-2 box-hover">
           <div class="icon">
             <i class="glyph-icon flaticon-gearstick"></i>
           </div>
           <div class="content">
            <h5>transmission </h5>
            <p class="mb-0">Omnis perspiciatis sed ut unde iste natus error sit voluptatem acantium doloremque laudantium. </p>
           </div>
          </div>
      </div>
      
    </div>
	
	<?php 
	
		$brandquery = "SELECT COUNT(*) as num FROM  brand_master";
		$modelquery = "SELECT COUNT(*)  as num FROM  model_master";
		$appointmentquery = "SELECT COUNT(*) as num FROM  appointment";
		$vehiclequery = "SELECT COUNT(*) as num FROM vehicle";
		$brand = mysqli_query($conn,$brandquery);
		$model = mysqli_query($conn,$modelquery);
		$appointment = mysqli_query($conn,$appointmentquery);
		$vehicle = mysqli_query($conn,$vehiclequery);
		$numbrand = mysqli_fetch_assoc($brand);
		$nummodel = mysqli_fetch_assoc($model);
		$numappointment = mysqli_fetch_assoc($appointment);
		$numvehicle = mysqli_fetch_assoc($vehicle);
	
	?>
	
    <div class="counter counter-style-2">
      <div class="row">
        <div class="col-lg-3 col-sm-6 item">
          <div class="counter-block text-start">
            <div class="separator"></div>
            <div class="info">
              <h6 class="text-white">Total Brands</h6>
              <i class="glyph-icon flaticon-interface"></i>
              <b class="timer text-white" data-to="<?php echo $numbrand['num']?>" data-speed="3000"></b>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 item">
          <div class="counter-block text-start">
            <div class="separator"></div>
            <div class="info">
              <h6 class="text-white">Total Models</h6>
              <i class="glyph-icon flaticon-circle"></i>
              <b class="timer text-white" data-to="<?php echo $nummodel['num']?>" data-speed="3000"></b>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 item">
          <div class="counter-block text-start mb-0">
            <div class="separator"></div>
            <div class="info">
              <h6 class="text-white">Your Appointments</h6>
              <i class="glyph-icon flaticon-cup"></i>
              <b class="timer text-white" data-to="<?php echo $numappointment['num']?>" data-speed="3000"></b>
            </div>
          </div>
        </div>
		 <div class="col-lg-3 col-sm-6 item">
          <div class="counter-block text-start">
            <div class="separator"></div>
            <div class="info">
              <h6 class="text-white">Vehicles in Stock</h6>
              <i class="glyph-icon flaticon-beetle"></i>
              <b class="timer text-white" data-to="<?php echo $numvehicle['num']?>" data-speed="3000"></b>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--=================================
 feature-car -->

<section class="testimonial-1 white-bg page page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
         
         <h2>About Us </h2>
         <div class="separator"></div>
      </div>
      </div>
    </div>
   <div class="row">
    <div class="col-md-12">
     <!-- <div class="owl-carousel owl-theme" data-nav-dots="true" data-nav-arrow="false " data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="20"> -->
     <div class="flex mx-auto" style = "width:50% ;text-align:center">

     <P>AutoTrack is your single stop for buying used and fresh vehicles, all over India. We've brought together cutting-edge technology with country-wide partners and more importantly, deep understanding of what buyers need. We solve all pain points associated with purchasing a pre-loved one. Whether you're buying or selling, you get a quick, easy, fair, transparent, hassle (and haggle) free process.

</P>
<a class = "btn btn-outline-danger" href = "service.php"> Read more</a>

     </div>
    </div>
   </div>
  </section>
  <?php include 'footer.php';?>
  <script>
    function fetch_models(form)
    {
        var brand = form.brand.options[form.brand.options.selectedIndex].value;
  
        self.location = '?brand=' + brand + '#search_form';
    }
  
    function fetch_years(form)
    {
        var brand = form.brand.options[form.brand.options.selectedIndex].value;
        var model = form.model.options[form.model.options.selectedIndex].value;
  
        self.location = '?brand=' + brand + '&model=' + model + '#search_form';
    }
    </script>
  </body>
</html>
