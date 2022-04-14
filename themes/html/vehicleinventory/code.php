 <?php  
 
 $query2 = "SELECT * FROM vehicle JOIN model_master USING(model_id) JOIN brand_master USING(brand_id) JOIN transmission USING(transmission_id) ORDER BY RAND() LIMIT 5";
 $result2 = mysqli_query($conn, $query2);
 
 ?>
 
  <!--=================================
  Recommendations -->
 
 <section class="feature-car white-bg page-section-ptb">
   <div class="container">
    <div class="row">
     <div class="col-md-12">
       <div class="section-title">
          
          <h2>Recommended Cars </h2>
          <div class="separator"></div>
       </div>
     </div>
    </div>
    <div class="row">
    <div class="col-md-12">
     <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="20">
     <?php while($row2 = mysqli_fetch_array($result2)) : ?>
     <div class="item">
         <div class="car-item car-item-4 text-center">
              <div class="car-image">
                <img class="img-fluid" src="images/car/<?php echo $row2['vehicle_image']; ?>" alt="" style = "height:200px;width:auto">
                <div class="car-overlay-banner">
                 <ul>
                   <li><a href="<?php echo $root;?>/single.php?vehicle=<?php echo $row2['vehicle_id']; ?>"><i class="fa fa-link"></i></a></li>
                   
                  </ul>
                </div>
              </div>
              <div class="car-list">
                <ul class="list-inline">
                  <li><i class="fa fa-registered"></i> <?php echo $row2['model_year']; ?></li>
                  <li><i class="fa fa-cog"></i> <?php echo strtok($row2['transmission_type'], " "); ?> </li>
                  <li><i class="fa fa-shopping-cart"></i> <?php echo $row2['kms_driven'] > 0 ? 'Used ' : "New"; ?></li>
                </ul>
             </div>
              <div class="car-content">
                 <a href="<?php echo $root;?>/single.php?vehicle=<?php echo $row2['vehicle_id']; ?>"> <?php echo $row2['brand_name'].'&nbsp&nbsp;'.$row2['model_name']; ?></a>
                <div class="separator"></div>
                <div class="price">
                  
                  <span class="new-price"><?php echo indMoneyFormat($row2['vehicle_price']); ?></span>
                </div>
              </div>
            </div>
        </div>
        <?php endwhile; ?>
      
      
    </div>
   </div>
   </div>
 </section>