<?php include 'header.php'; ?>

<!--=================================
 header -->


<!--=================================
 inner-intro -->

 <section class="inner-intro bg-1 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-start d-inline-block">
             <h1 class="text-white">product listing </h1>
           </div>
           <div class="col-md-6 text-md-end float-end">
             <ul class="page-breadcrumb">
                
             </ul>
           </div>
     </div>
  </div>
</section>

<!--=================================
 inner-intro -->
<?php  $results_per_page = 5;  
  
  @$brand = $_GET['brand'];
  @$model = $_GET['model'];
  @$year = $_GET['year'];
  @$condition = $_GET['condition'];
  @$min_price = strlen($_GET['minPrice']) == 0 ? 0 : $_GET['minPrice'];
  @$max_price = strlen($_GET['maxPrice']) == 0 ? 0 : $_GET['maxPrice'];

  //find the total number of results stored in the database  
  $query = "SELECT * FROM vehicle JOIN model_master USING (model_id) JOIN brand_master USING (brand_id) JOIN fuel_type USING (fuel_type_id) JOIN transmission USING (transmission_id) JOIN bodycolor ON bodycolor.color_id = vehicle.exterior_color ";

  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {
    $query .= "WHERE vehicle_price >= $min_price ";
    
    if($max_price != 0)
      $query .= "AND vehicle_price <= $max_price ";

    if($brand != 0)
      $query .= "AND brand_master.brand_id = $brand ";

    if($model != 0)
      $query .= "AND model_master.model_id = $model ";
    
    if($year != 0)
      $query .= "AND model_year = $year ";

    if($condition != 0)
      $query .= ($condition == 1) ? "AND kms_driven = 0 " : "AND kms_driven > 0 ";
  }


  if(isset($_GET['carbrand']))
  { $carbrand = $_GET['carbrand'];
    $query.="AND brand_name = '$carbrand'";
  }

  if(isset($_GET['car'])){

    $model_name =$_GET['car'];
    $query.="AND model_name = '$model_name'";
  }

  //echo $query;
  

  $result = mysqli_query($conn, $query);  
  $number_of_result = mysqli_num_rows($result);
  $pagination = 5;

  //determine the total number of pages available  
  $number_of_page = ceil ($number_of_result / $results_per_page);  

  //determine which page number visitor is currently on  
  if (!isset ($_GET['page']) ) {  
      $page = 1;  
  } else {  
      $page = $_GET['page'];  
  }  

  //determine the sql LIMIT starting number for the results on the displaying page  
  $page_first_result = ($page-1) * $results_per_page;  

  //retrieve the selected results from database   
  $query .= "LIMIT " . $page_first_result . ',' . $results_per_page;
  
  $result = mysqli_query($conn, $query);  
  
  if($number_of_result == 0)
  {
	 include 'error-404.php';
die;
  }
  
    
  //display the retrieved result on the webpage  
    


  
   ?>

<!--=================================
product-listing  -->
<section class="product-listing page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="listing-sidebar">
          <div class="widget-banner">
            <img class="img-fluid center-block" src="images/banner-2.jpg" alt="">
          </div>
        </div>
        
      </div>
      
      <div class="col-lg-9 col-md-8">
       

<?php while ($row = mysqli_fetch_array($result)) {?>  
        
 

        <div class="car-grid">
           <div class="row">
            <div class="col-lg-4 col-md-12">
              <div class="car-item gray-bg text-center">
               <div class="car-image">
                 <img class="img-fluid" src="images/car/<?php echo $row['vehicle_image'];?>" alt="">
               </div>
              </div>
             </div>
              <div class="col-lg-8 col-md-12">
                <div class="car-details">
                <div class="car-title">
                 <a href="single.php?vehicle=<?php echo $row['vehicle_id']; ?>"><?php echo $row['brand_name'].'&nbsp&nbsp;'.$row['model_name']; ?></a>
                 <p><?php echo $row['vehicle_description']?></p>
                  </div>
                  <div class="price">
                       
                       <span class="new-price"><?php echo IND_money_format($row['vehicle_price']); ?> </span>
                       <a class="button red float-end" href="single.php?vehicle=<?php echo $row['vehicle_id'];?>">Get Details</a>
                     </div>
                   <div class="car-list">
                     <ul class="list-inline">
                       <li><i class="fa fa-registered" title="Model Year"></i> <?php echo $row['model_year'];?></li>
                       <li><i class="fa fa-cog" title="Transmission Type"></i> <?php echo $row['transmission_type']?> </li>
                       <li><i class="fa fa-dashboard" title="Distance Driven"></i> <?php echo $row['kms_driven'] > 0 ? IND_number_format($row['kms_driven']). ' km' : "New"; ?></li>
                     </ul>
                   </div>
                  </div>
                </div>
               </div>
             </div>
            
<?php }  ?>
            
          </div>
        </div>
      </div>
      <div class="pagination-nav d-flex justify-content-center">
               <ul class="pagination">
                  <?php
                  if(!isset($_GET['page']) || $_GET['page'] <= 1)
                  {
                    $current_page = 1;
                  }
                  
                  elseif($_GET['page'] >= $number_of_page)
                  {
                    $current_page = $number_of_page;
                  }
                  
                  else
                  {
                    $current_page = $_GET['page'];
                  }

                  if($current_page <= 3)
                  {
                    $lower = 1;
                    $upper = 5;
                  }

                  elseif($current_page >= ($number_of_page - 2))
                  {
                    $lower = $number_of_page - 4;
                    $upper = $number_of_page;
                  }

                  else
                  {
                    $lower = $current_page - 2;
                    $upper = $current_page + 2;
                  }

                  $query = $_SERVER['QUERY_STRING'];
                  if(isset($_GET['page']))
                  {
                    $query = explode('&', $query);
                    array_pop($query);
                    $query = implode('&', $query);
                    
                  }

                  if($lower > 1)
                  {
                    echo "<li><a href='listing.php?$query&page=1' title='First Page'><<</a></li>";
                  }

                  if($current_page > 1)
                  {
                    $previous_page = $current_page - 1;
                    echo "<li><a href='listing.php?$query&page=$previous_page' title='Previous Page'><</a></li>";
                  }

                  for($page = $lower; $page<= $upper; $page++) 
                  {
                  ?>
                  <li>
                    <?php
                    if($page == $current_page)
                    {
                      echo "<a href='#' style = 'pointer-events: none; color: red;'>$page</a>";
                    }

                    else
                    {
                      echo "<a href='listing.php?$query&page=$page'>$page</a>";
                    }
                  ?>
                  </li>
                  
                  <?php
                  }

                  if($current_page < $number_of_page)
                  {
                    $next_page = $current_page + 1;
                    echo "<li><a href='listing.php?$query&page=$next_page' title='Next Page'>></a></li>";
                  }

                  if($upper < $number_of_page)
                  {
                    echo "<li><a href='listing.php?$query&page=$number_of_page' title='Last Page'>>></a></li>";
                  }
                  ?>
                
                </ul>
          </div>
</section>

<!--=================================
product-listing  -->


<!--=================================
 footer -->

<?php include 'footer.php'; ?></body>
</html>
