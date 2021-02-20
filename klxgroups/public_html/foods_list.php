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
               <?php
            if (isset($_POST['addCart'])) {
                $_SESSION['items'][$_POST['FoodID']]=$_POST['Qty'];
            }
            if (isset($_POST['removeCart'])) {
                unset($_SESSION['items'][$_POST['FoodID']]);
            }
        ?>
          <?php
                if (sizeof($_SESSION['items'])>0) {
            ?>
       <div class="row" style="margin-bottom:10px;" >
           
          
            <div class="col-lg-6 col-md-6">
             <?php echo sizeof($_SESSION['items']);?> items ordered<br>
                  <a href="foodorder.php" class="btn btn-primary">Order Now</a>
            </div>
           
       </div>
        <?php } ?>
        <div class="row">
        
        <?php 
        $foods = $mysql->select("select * from _tbl_foods_items where FoodHotelID='".$_GET['hotel']."'"); 
        foreach($foods  as $f) {
        ?>
          <div class="col-lg-3 col-md-3   " data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px">
            <div class="card">
            <div class="card-body" style="text-align: center;">
             <img src="assets/food/<?php echo  $f['FoodThumb'];?>" style="height:150px;width:100%"> 
              <h4 style="margin-top:10px;"><a href="taxi.php"><?php echo $f['ProductName'];?></a></h4>
              <p><?php echo $f['Description'];?></p>
              <p style="padding:30px;padding-bottom:0px">
             <strike> Rs. <?php echo $f['Price'];?></strike><br> 
              Rs. <?php echo $f['OfferPrice'];?><br><br>
              <?php if  (isset($_SESSION['items'][$f['FoodID']])) {?>
                 <form action="" method="post">
                <input type="hidden" value="<?php echo $f['FoodID'];?>" name="FoodID">
               Qty: <select name="Qty" style="padding:3px 10px;"  disabled="disabled">
                    <option value="<?php echo $_SESSION['items'][$f['FoodID']];?>"><?php echo $_SESSION['items'][$f['FoodID']];?></option>
                </select>
                <input type="submit" name="removeCart" class="btn btn-danger btn-sm" value="Remove Item"> 
              </form>
              <?php } else { ?>
              <form action="" method="post">
                <input type="hidden" value="<?php echo $f['FoodID'];?>" name="FoodID">
               Qty:: <select name="Qty" style="padding:3px 10px;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <input type="submit" name="addCart" class="btn btn-success btn-sm" value="Add Item"> 
              </form>
              <?php } ?>
              
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