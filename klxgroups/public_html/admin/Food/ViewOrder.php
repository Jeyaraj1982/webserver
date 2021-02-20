
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Food Order Requests
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                               <form action="" method="post" role="form" class="php-email-form" style="margin-bottom:20px">
            
             <div class="table-responsive">
            <table  class="table table-striped mt-3">
                <tr>
                    <td>Product Details</td>
                    <td style="text-align: right;">Amount</td>
                </tr>
                   <?php $data = $mysql->select("select * from _tbl_booking_food where FoodOrderID='".$_GET['Order']."'");
                   $data_items = $mysql->select("select * from _tbl_booking_food_items where FoodOrderID='".$_GET['Order']."'");
                   ?>
                <?php foreach($data_items as $item) {
                      $hotel = $mysql->select("select * from _tbl_foods_hotels where HotelID='".$item['HotelID']."'");
                       $place = $mysql->select("select * from _tbl_foods_citynames where HotelCityNameID='".$hotel[0]['HotelCityNameID']."'");
                    ?>
                    <tr>
                        <td style="vertical-align:top;background:#fff">
                        <b><?php echo $item['ProductName'];?></b><br>
                        <div style="color:#666;font-size:12px">
                            <?php echo $hotel[0]['HotelName'];?>,<?php echo $place[0]['CityName'];?><Br>
                            Price :   <strike><?php echo number_format($item['Price'],2);?></strike>, 
                            <?php echo number_format($item['OfferPrice'],2);?><br>
                            Qty : <?php echo $item['Qty'];?>
                          
                        </div>
                        </td>
                        <td style="text-align: right;vertical-align:top;;background:#fff"><?php echo number_format($item['Amount'],2);?></td>
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
                  <input type="text" name="CustomerName" disabled="disabled" class="form-control" value="<?php echo $data[0]['CustomerName'];?>"  />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Your Mobile Number</label>
                  <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['CustomerMobileNumber'];?>"  id="" placeholder="Your Mobile Number" data-rule="minlen:10" data-msg="Please enter your mobile number" />
                  <div class="validate"></div>
                </div>
              </div>
              
                <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Address Line 1</label>
                  <input type="text" name="AddressLine1" disabled="disabled" value="<?php echo $data[0]['AddressLine1'];?>"   class="form-control" id="AddressLine1" placeholder="Address Line 1" data-rule="minlen:4" data-msg="Please enter your name" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Address Line 2</label>
                  <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['AddressLine2'];?>"   name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" data-rule="minlen:10" data-msg="Please enter your mobile number" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
               <label>Description</label>
                <textarea class="form-control" disabled="disabled" value="<?php echo $data[0]['CustomerDetails'];?>"  name="CustomerDetails" id="CustomerDetails" rows="3" data-rule="required" data-msg="Please write details" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
               
          
            </form>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:0px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>                                                                                                                                                                                                                        
    </div>
  </div>
</div>
<script>
var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
function ViewTaxiBookingDetails(EnquiryID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=ViewTaxiBookingDetails&EnquiryID='+EnquiryID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
</script>

