<?php include_once("header.php"); ?>

  <!-- ======= Hero Section ======= -->
   <!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
      

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Foods</strong></h2>
        <!--  <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>-->
        </div>
       <div class="row" style="display: none;">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-title">
                Ordered Items
                </div>
                <div class="card-body">
                
                </div>
                    
                </div>
                
                
            </div>
            <div class="col-lg-6 col-md-6">
                  <a href="foodorder.php" class="btn btn-primary">Order Now</a>
            </div>
       </div>
        <div class="row">
        <?php 
        $foods = $mysql->select("select * from _tbl_foods"); 
        foreach($foods  as $f) {
        ?>
          <div class="col-lg-3 col-md-3   " data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px">
            <div class="card">
            <div class="card-body" style="text-align: center;">
             <img src="assets/foods/<?php echo  $f['Thumb'];?>" style="height:150px;width:100%"> 
              <h4 style="margin-top:10px;"><a href="taxi.php"><?php echo $f['FoodName'];?></a></h4>
              <p><?php echo $f['Description'];?></p>
              <p style="padding:30px;padding-bottom:0px">
              Rs. <?php echo $f['Price'];?><br><br>
              <a href="taxi.php" class="btn btn-success btn-sm">&nbsp;&nbsp;Add Item&nbsp;&nbsp;</a></p>
                              </div>
                              </div>
          </div>
         <?php } ?>
    
           

           

           

        </div>

      </div>
    </section> 

    <!-- ======= Portfolio Section ======= -->
      

     
      

  </main> 
  <?php include_once("footer.php");?>