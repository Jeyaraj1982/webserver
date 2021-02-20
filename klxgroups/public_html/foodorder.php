<?php include_once("header.php"); ?>
  
     
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="margin-bottom:0px">Food Order</h2>
          
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     

    <section id="contact" class="contact" style="padding-top:20px;">
      <div class="container">
           
           
        <div class="row  justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
           <!-- <h5 style="margin-bottom:20px">Taxi Booking</h5>-->
            <?php
                if (isset($_POST['submitOrder'])) {
                    
                    
  $id =   $mysql->insert("_tbl_booking_food",array("CustomerName"         => $_POST['CustomerName'],
                                             "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                             "CustomerDetails"      => $_POST['CustomerDetails'],
                                             "AddressLine1"      => $_POST['AddressLine1'],
                                             "AddressLine2"      => $_POST['AddressLine2'],
                                             "OrderValue"      => "0",
                                             "Orderon"          => date("Y-m-d H:i:s")));
                                             $total = 0;
  foreach($_SESSION['items'] as $k=>$v) {
      
             $productDetails = $mysql->select("select * from _tbl_foods_items where FoodID='".$k."'");
                       $hotel = $mysql->select("select * from _tbl_foods_hotels where HotelID='".$productDetails[0]['FoodHotelID']."'");
                       $place = $mysql->select("select * from _tbl_foods_citynames where HotelCityNameID='".$productDetails[0]['FoodHotelCityNameID']."'");
      $total += $v * $productDetails[0]['OfferPrice'];                 
                       $mysql->insert("_tbl_booking_food_items",array("FoodOrderID"=>$id,
                                                    "HotelID"=>$productDetails[0]['FoodHotelID'],
                                                    "ProductID"=>$k,
                                                    "ProductName"=>$productDetails[0]['ProductName'],
                                                    "Qty"=>$v,
                                                    "Price"=>$productDetails[0]['Price'],
                                                    "OfferPrice"=>$productDetails[0]['OfferPrice'],
                                                    "Amount"=>$productDetails[0]['OfferPrice']*$v));
                       
  }
  
  $mysql->execute("update _tbl_booking_food set OrderValue='".$total."' where FoodOrderID='".$id."'");
  unset($_SESSION['items']);
             ?>
              <div class="sent-message">Your request has submitted.</div>
             <?php
 
}    else {
            ?>
            <form action="" method="post" role="form" class="php-email-form" style="margin-bottom:20px">
            
             <div class="table-responsive">
            <table  class="table table-striped mt-3">
                <tr>
                    <td>Product Details</td>
                    <td style="text-align: right;">Amount</td>
                </tr>
                <?php
                     if (isset($_POST['remveItem'])) {
                unset($_SESSION['items'][$_POST['FoodID']]);
            }
                ?>
                <?php foreach($_SESSION['items'] as $k=>$v) {
                    $productDetails = $mysql->select("select * from _tbl_foods_items where FoodID='".$k."'");
                       $hotel = $mysql->select("select * from _tbl_foods_hotels where HotelID='".$productDetails[0]['FoodHotelID']."'");
                       $place = $mysql->select("select * from _tbl_foods_citynames where HotelCityNameID='".$productDetails[0]['FoodHotelCityNameID']."'");
                    ?>
                    <tr>
                        <td style="vertical-align:top;background:#fff">
                        <b><?php echo $productDetails[0]['ProductName'];?></b><br>
                        <div style="color:#666;font-size:12px">
                            <?php echo $hotel[0]['HotelName'];?>,<?php echo $place[0]['CityName'];?><Br>
                            Price :   <strike><?php echo number_format($productDetails[0]['Price'],2);?></strike>, 
                            <?php echo number_format($productDetails[0]['OfferPrice'],2);?><br>
                            Qty : <?php echo $v;?><br>
                            <form action="" method="post">
                            <input type="hidden" value="<?php echo $k;?>" name="FoodID">
                            <input type="submit" name="remveItem" value="Remove" class="btn btn-danger btn-sm" style="padding: 2px 10px !important;height: auto;font-size: 11px;margin-top:10px">
                            </form>
                        </div>
                        </td>
                        <td style="text-align: right;vertical-align:top;;background:#fff"><?php echo number_format($v*$productDetails[0]['OfferPrice'],2);?></td>
                    </tr>
                <?php } ?>
            </table>
            </div>
             </form>
             
           
            
            <form action="" method="post" role="form" class="php-email-form">
            
            <input type="hidden" value="1" name="SubmitTaxiRequest">
              
                
                 <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Your Name</label>
                  <input type="text" name="CustomerName" class="form-control" id="CustomerName" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter your name" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Your Mobile Number</label>
                  <input type="text" class="form-control" name="CustomerMobileNumber" id="CustomerMobileNumber" placeholder="Your Mobile Number" data-rule="minlen:10" data-msg="Please enter your mobile number" />
                  <div class="validate"></div>
                </div>
              </div>
              
                <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Address Line 1</label>
                  <input type="text" name="AddressLine1" class="form-control" id="AddressLine1" placeholder="Address Line 1" data-rule="minlen:4" data-msg="Please enter your name" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Address Line 2</label>
                  <input type="text" class="form-control" name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" data-rule="minlen:10" data-msg="Please enter your mobile number" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
               <label>Description</label>
                <textarea class="form-control" name="CustomerDetails" id="CustomerDetails" rows="3" data-rule="required" data-msg="Please write details" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your request has submitted.</div>
              </div>
              <div class="text-center"><button type="submit" name="submitOrder"  >Send Order Request</button></div>
            </form>
   <?php } ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script type="text/javascript">jssor_1_slider_init();</script>
   <?php include_once("footer.php");?>