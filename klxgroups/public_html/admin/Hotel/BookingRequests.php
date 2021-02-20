
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
                                        Hotel Booking Requests
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Requested On</th>
                                                <th scope="col">Hotel</th>
                                                <th scope="col">Package</th>
                                                <th scope="col">Check In</th>
                                                <th scope="col">Customer Details</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $enquirys = $mysql->select("select * from _tbl_booking_hotel order by HotelBookingID DESC");?>
                                        <?php 
                                         foreach($enquirys as $enquiry){ 
                                               $hotel = $mysql->select("select * from _tbl_hotels where HotelID='".$enquiry['HotelID']."'");     
                                               $hotel_city = $mysql->select("select * from _tbl_hotel_citynames where HotelCityNameID='".$hotel[0]['HotelCityNameID']."'");     
                                               $hotel_package = $mysql->select("select * from _tbl_hotels_packages where HotelPackageID='".$enquiry['PackageID']."'");     
                                               
                                        ?>
                                            <tr>
                                                <td style="vertical-align:top;"><?php echo date("M,d Y H:i", strtotime($enquiry['RequestedOn']));?></td>
                                                <td style="vertical-align:top;">
                                                
                                                <b><?php echo $hotel[0]['HotelName'];?></b><br>
                                                <?php echo $hotel_city[0]['CityName'];?>
                                               
                                                
                                                </td>
                                                <td style="vertical-align:top;">
                                                 <b><?php echo $hotel_package[0]['PackageName'];?></b><br>
                                                Price: <?php echo $hotel_package[0]['Price'];?><br>
                                                Offer Price: <?php echo $hotel_package[0]['OfferPrice'];?><br>
                                                
                                                </td>
                                                <td style="vertical-align:top;">
                                                    Checkin: <?php echo $enquiry['CheckInDate'];?><br>
                                                    Days: <?php echo $enquiry['NumberOfDays'];?><br>
                                                    Adult: <?php echo $enquiry['adult'];?><br>
                                                    Children: <?php echo $enquiry['children'];?><br><br>
                                                    
                                                    Pickuploaction: <?php echo $enquiry['PickupLocation'];?>
                                                    
                                                </td>
                                                <td style="vertical-align:top;">
                                                    Name: <?php echo $enquiry['CustomerName'];?><br>
                                                    Mobile: <?php echo $enquiry['CustomerMobileNumber'];?><br><br>
                                                  
                                                    
                                                    Details: <?php echo $enquiry['CustomerDetails'];?>
                                                    
                                                </td> 
                                                
                                               
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($enquirys)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No records found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
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

