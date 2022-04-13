          <!--=================================
          footer -->
          <footer class="footer footer-black bg-2 bg-overlay-black-90">
          <div class="container">
          <div class="row">
          <div class="col-md-12">
          <div class="social">    
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-lg-3 col-md-6">
          <div class="about-content">
          <h6 class="text-white">About AutoTrack</h6>
          <p>AutoTrack is your single stop for buying  used and fresh vehicles, all over India. AutoTrack provide everything you need to Buy a car for you and your family whether it is new or old ! </p>
          </div>
          <div class="social">
          <ul>
          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i> </a></li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i> </a></li>
          <li><a class="dribbble" href="https://dribbble.com/atrackinfo"><i class="fa fa-dribbble"></i> </a></li>       
          <li><a class="behance" href="https://www.behance.net/autotrackindia"><i class="fa fa-behance"></i> </a></li>
          </ul>
          </div>
          </div>
          <div class="col-lg-3 col-md-6">
          <div class="usefull-link">
          <h6 class="text-white">Popular Brands</h6>
          <ul>
          <?php foreach($brands as $brand) : ?>
          <li><a href="<?php echo $root;?>/<?php echo "listing.php?brand=$brand[0]"; ?>"><?php echo $brand[1]; ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?php echo $root;?>/listing.php">All Brands</a></li>
          </ul>
          </div>
          </div>

          <div class="col-lg-3 col-md-6">
          <div class="usefull-link">
          <h6 class="text-white">Popular Cars</h6>
          <ul>
          <?php foreach($cars as $car) : ?>
          <li><a href="<?php echo $root;?>/<?php echo "listing.php?model=$car[0]"; ?>"><?php echo $car[1]; ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?php echo $root;?>/listing.php">All Cars</a></li>
          </ul>
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
          <li><a href="<?php echo $root;?>/privacy-policy.php">privacy policy </a> | </li>
          <li><a href="<?php echo $root;?>/terms-and-conditions.php">terms and conditions </a> |</li>
          <li><a href="<?php echo $root;?>/contactus.php">contact us </a></li>
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
          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

          <script type="text/javascript" src="<?php echo $root;?>/js/jquery.validate.js"></script> 
          <!-- bootstrap -->
          <script type="text/javascript" src="<?php echo $root;?>/js/popper.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/js/bootstrap.min.js"></script>

          <!-- slick -->
          <script type="text/javascript" src="<?php echo $root;?>/js/slick/slick.min.js"></script>

          <!-- mega-menu -->
          <script type="text/javascript" src="<?php echo $root;?>/js/mega-menu/mega_menu.js"></script>

          <!-- appear -->
          <script type="text/javascript" src="<?php echo $root;?>/js/jquery.appear.js"></script>

          <!-- counter -->
          <script type="text/javascript" src="<?php echo $root;?>/js/counter/jquery.countTo.js"></script>

          <!-- isotope -->
          <script type="text/javascript" src="<?php echo $root;?>/js/isotope/isotope.pkgd.min.js"></script>

          <!-- owl-carousel -->
          <script type="text/javascript" src="<?php echo $root;?>/js/owl-carousel/owl.carousel.min.js"></script>

          <!-- magnific popup -->
          <script type="text/javascript" src="<?php echo $root;?>/js/magnific-popup/jquery.magnific-popup.min.js"></script>

          <!-- jquery-ui -->
          <script type="text/javascript" src="<?php echo $root;?>/js/jquery-ui.js"></script>
          <script type = "text/javascript" src = "<?php echo $root;?>/js/jquery.datetimepicker.full.min.js"></script>

          <!-- revolution -->
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/jquery.themepunch.tools.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/jquery.themepunch.revolution.min.js"></script>
          <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.actions.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.migration.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
          <script type="text/javascript" src="<?php echo $root;?>/revolution/js/extensions/revolution.extension.video.min.js"></script>

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
