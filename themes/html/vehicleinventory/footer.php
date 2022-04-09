<!--=================================
 footer -->

 <footer class="footer footer-black bg-2 bg-overlay-black-90">
  <div class="container">
    <div class="row">
     <div class="col-md-12">
      <div class="social">
        <ul>
          <li><a class="facebook" href="#">facebook <i class="fa fa-facebook"></i> </a></li>
          <li><a class="twitter" href="#">twitter <i class="fa fa-twitter"></i> </a></li>
          <li><a class="pinterest" href="https://pin.it/7zJanqx">pinterest <i class="fa fa-pinterest-p"></i> </a></li>
          <li><a class="dribbble" href="https://dribbble.com/atrackinfo">dribbble <i class="fa fa-dribbble"></i> </a></li>
         
          <li><a class="behance" href="https://www.behance.net/autotrackindia">behance <i class="fa fa-behance"></i> </a></li>
        </ul>
       </div>
      </div>
    </div>
   <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="about-content">
		   <h6 class="text-white">About AutoTrack</h6>
         <p>AutoTrack is your single stop for buying  used and fresh vehicles, all over India. AutoTrack provide everything you need to Buy a car for you and your family whether it is new or old ! </p>
        </div>
        
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="usefull-link">
        <h6 class="text-white">Popular Brands</h6>
         <ul>
			<li><a href="listing.php?carbrand=Maruti Suzuki">Maruti Suzuki</a></li>
            <li><a href="listing.php?carbrand=Hyundai">Hyundai</a></li>
            <li><a href="listing.php?carbrand=Ford">Ford</a></li>
            <li><a href="listing.php?carbrand=Kia">Kia</a></li>
            <li><a href="listing.php?carbrand=Honda">Honda</a></li>
		</ul>
        </div>
      </div>

 <?php  
 
 $query2 = "SELECT * FROM vehicle JOIN model_master USING(model_id) JOIN brand_master USING(brand_id) JOIN transmission USING(transmission_id) ORDER BY RAND() LIMIT 3";
 $result2 = mysqli_query($conn, $query2);
 
 ?>

      <div class="col-lg-3 col-md-6">	  
       <div class="recent-post-block">
        <h6 class="text-white">Recommended Cars</h6>
		<?php while($row2 = mysqli_fetch_array($result2)) : ?>
          <div class="recent-post">
            <div class="recent-post-image">
			<a href = "single.php?vehicle=<?php echo $row2['vehicle_id']?>">
              <img class="img-fluid" src="images/car/<?php echo $row2['vehicle_image']; ?>" alt="">
			  </a>
            </div>
            <div class="recent-post-info">
                <a href="single.php?vehicle=<?php echo $row2['vehicle_id']; ?>"></a>
                <span class="post-date"><?php echo $row2['brand_name'].'&nbsp;'.$row2['model_name']; ?></span>
				<span class="post-date"><?php echo $row2['kms_driven'] > 0 ? 'Used ' : "New"; ?></span>
            </div>
         </div>
		  <?php endwhile; ?>
       </div>	 
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="news-letter">
        <h6 class="text-white">Contact Us</h6>
        <div class="address">
          <ul>
            <li> <i class="fa fa-map-marker"></i><span><strong>Address</strong> <br/> B/81, Corporate House,<br> Judges Bunglow Rd, Bodakdev,<br> Ahmedabad, Gujarat 380054 </span> </li>
            <li> <i class="fa fa-phone"></i><span><strong>Phone</strong><br/> +91 7984856432</span> </li>
            <li> <i class="fa fa-envelope-o"></i><span><strong>Email</strong><br/>info.autotrackindia@gmail.com</span> </li>
          </ul>
        </div>
        </div>
      </div>
    </div>


  <div class="copyright">
   <div class="container">
     <div class="row">
      <div class="col-lg-6 col-md-12">
       <div class="text-lg-start text-center">
        <p>©Copyright 2021  Developed by AutoTrack</p>
       </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <ul class="list-inline text-lg-end text-center">
          <li><a href="privacy-policy.php">privacy policy </a> | </li>
          <li><a href="terms-and-conditions.php">terms and conditions </a> |</li>
          <li><a href="contactus.php">contact us </a></li>
        </ul>
       </div>
      </div>
     </div>
    </div>
</footer>

 <!--=================================
 footer -->



 <!--=================================
 back to top -->

<div class="car-top">
  <span><img src="images/car.png" alt=""></span>
</div>

 <!--=================================
 back to top -->

<!--=================================
 jquery -->

<!-- jquery  -->
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- slick -->
<script type="text/javascript" src="js/slick/slick.min.js"></script>

<!-- mega-menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>

<!-- appear -->
<script type="text/javascript" src="js/jquery.appear.js"></script>

<!-- counter -->
<script type="text/javascript" src="js/counter/jquery.countTo.js"></script>

<!-- isotope -->
<script type="text/javascript" src="js/isotope/isotope.pkgd.min.js"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>

<!-- magnific popup -->
<script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- jquery-ui -->
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type = "text/javascript" src = "js/jquery.datetimepicker.full.min.js"></script>

<!-- revolution -->
<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript">
            var tpj=jQuery;

      var revapi6;
      tpj(document).ready(function() {
        if(tpj("#rev_slider_6_1").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_6_1");
        }else{
          revapi6 = tpj("#rev_slider_6_1").show().revolution({
            sliderType:"standard",
            sliderLayout:"fullwidth",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
                             mouseScrollReverse:"default",
              onHoverStop:"off",
              arrows: {
                style:"hesperiden",
                enable:true,
                hide_onmobile:false,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                                    v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                                    v_offset:0
                }
              }
            },
            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:[1270,1024,778,480],
            gridheight:[450,450,500,500],
            lazyType:"none",
            shadow:0,
            spinner:"spinner0",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
              simplifyAll:"off",
              nextSlideOnWindowFocus:"off",
              disableFocusListener:false,
            }
          });
        }
      }); /*ready*/

      var page = '<?php echo basename($_SERVER['PHP_SELF']); ?>'
      if(page != 'index.php') {
        $(document).ready(function () {
          // alert(page);
          // Handler for .ready() called.
          $('html, body').animate({
            scrollTop: $('#scroll_anchor').offset().top
          }, 'slow');
        });
      }

      links = document.querySelectorAll("a")
  links.forEach(function (item) {
    item.addEventListener('click', function () {
      //reset the color of other links
      links.forEach(function (item) {
        item.style.backgroundColor = '#fff'
      })
      // apply the style to the link
      this.style.backgroundColor = '#ffcce9'
    });
  })


  function fetch_models(form)
    {
        var brand = form.brand.options[form.brand.options.selectedIndex].value;
  
        self.location = '?brand=' + brand + '#vehicle_search';
    }
  
    function fetch_years(form)
    {
        var brand = form.brand.options[form.brand.options.selectedIndex].value;
        var model = form.model.options[form.model.options.selectedIndex].value;
  
        self.location = '?brand=' + brand + '&model=' + model + '#vehicle_search';
    }
    </script>
