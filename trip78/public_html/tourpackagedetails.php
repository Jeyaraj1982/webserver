
    <?php include_once("header.php");?>
    <?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(PackageID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$Packages[0]['SubTourTypeID']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
         $Events = $mysql->select("select * from _tbl_package_day_event where PackageID='".$Packages[0]['PackageID']."' order by EventDay ASC");
         $adParam = $mysql->select("select * from _tbl_additional_params where PackageID='".$Packages[0]['PackageID']."'");
   ?>
    <main class="main">        
        <div class="wrap">
            <nav class="breadcrumbs">                                                 
                <ul>
                    <li><a href="index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                    <li><a title="Travel guides"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>                                       
                    <li><a title="Travel guides"><?php echo $Packages[0]['PackageName'];?></a></li>                                       
                </ul>
            </nav>  
              
                 <div class="row">  
                    <div class="full-width">                                                                           
                        <div class="col-sm-8">
                            <div class="gallery">                                                           
                        <ul id="image-gallery" class="cS-hidden">
                            
                            <li data-thumb="uploads/package/<?php echo $Packages[0]['Image2'];?>"> 
                                <img src="uploads/package/<?php echo $Packages[0]['Image2'];?>" alt="" / >
                            </li>
                            <li data-thumb="uploads/package/<?php echo $Packages[0]['Image3'];?>"> 
                                <img src="uploads/package/<?php echo $Packages[0]['Image3'];?>" alt="" />
                            </li>
                            <li data-thumb="uploads/package/<?php echo $Packages[0]['Image4'];?>"> 
                                <img src="uploads/package/<?php echo $Packages[0]['Image4'];?>" alt="" />  
                            </li>
                            <li data-thumb="uploads/package/<?php echo $Packages[0]['Image1'];?>"> 
                                <img src="uploads/package/<?php echo $Packages[0]['Image1'];?>" alt="" />
                            </li>
                        </ul>
                    </div> 
                            <section id="Itinerary" class="tab-content" style="float:left;width:100%">
                                <article>                                                                      
                                    <div class="col-xs-12">
                                        <h3 style="margin-bottom: 0px !important;font-size:20px;color: #2d3e52;line-height: 1.2222;font-weight: bold;"><?php echo $Packages[0]['PackageName'];?></h3>
                                        <p style="margin: 0px"><?php echo $Packages[0]['NightsCount'];?> <b>Nights</b></p>
                                        <p class style="margin: 0px;"><b>Egypt</b>: Alexandria 1N, Cairo 3N, Abu Simbel, Aswan, Kom Ombu, Edfu, Luxor, <b>Overnight Cruise</b>: Nile Cruise 3N.</p>
                                        <p style="margin:0px;">
                                        <b>Visit:</b>
                                        <span><strong><?php echo $Packages[0]['CityCount'];?></strong> <span>City</span> </span>
                                        <span><strong><?php echo $Packages[0]['CountryCount'];?></strong> <span> Country</span></span>
                                        </p>
                                    </div>

                                    
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php foreach($Events as $Event) { ?>
                                        <div class="panel panel-default" style="border: none;background:transparent">
                                            <div class="panel-heading" role="tab" id="headingOne" style="background: transparent;border-color: transparent;">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne_<?php echo $Event['DayandEventID'];?>" aria-expanded="true" aria-controls="collapseOne" style="min-height: 35px;border-top-left-radius: 15px;border-bottom-left-radius: 15px;display: flex;-webkit-box-align: center;align-items: center;padding-left: 45px;width: 100%;background-color: #ccc;padding: 7px 7px 7px 40px;color: #000;font-size: 15px;font-size: 15px;max-height: 41px;text-decoration:none">
                                                        <span style="margin-right:14px;margin-left: -42px;padding: 15px 22px 30px 22px;left: 0;height: 35px;width: 35px;top: 0;border-radius: 100%;display: flex;-webkit-box-align: center;justify-content: center;font-weight: 700;background-color: #ed1c24 !important;color: #fff;"><?php echo $Event['EventDay'];?></span>
                                                        <?php echo $Event['EventTitle'];?>
                                                    </a>
                                                </h4>
                                            </div>                                               
                                            <div id="collapseOne_<?php echo $Event['DayandEventID'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body" style="border-top:none">                                                                         
                                                      <?php echo $Event['EventDescription'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="general-point" style="margin-top: 20px;">
                                        <h3 style="font-size:20px;margin-bottom:0px;line-height: 1.2222;color: #2d3e52;margin-top: 0 !important;">Notes:</h3> 
                                        <ul style="padding-left: 0;list-style: none;margin-bottom: 10px;margin-top: 0;">
                                            <li style="position: relative;list-style: none;padding-left: 20px;"><?php echo $adParam[0]['PackagesNotes'];?><br /></li>
                                        </ul>
                                        <h3 style="font-size:20px;margin-bottom:0px;line-height: 1.2222;color: #2d3e52;margin-top: 0 !important;">Extra Topping:</h3>
                                        <ul style="padding-left: 0;list-style: none;margin-bottom: 10px;margin-top: 0;">
                                            <li style="position: relative;list-style: none;padding-left: 20px;"><?php echo $adParam[0]['ExtraToppings'];?></li>
                                        </ul>
                                        <h3 style="font-size:20px;margin-bottom:0px;line-height: 1.2222;color: #2d3e52;margin-top: 0 !important;">Our Speciality:</h3>
                                        <ul style="padding-left: 0;list-style: none;margin-bottom: 10px;margin-top: 0;">
                                            <li style="position: relative;list-style: none;padding-left: 20px;"><?php echo $adParam[0]['OurSpeciality'];?></li>
                                        </ul>
                                        <h3 style="font-size:20px;margin-bottom:0px;line-height: 1.2222;color: #2d3e52;margin-top: 0 !important;">Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                        <ul style="padding-left: 0;list-style: none;margin-bottom: 10px;margin-top: 0;">
                                            <li style="position: relative;list-style: none;padding-left: 20px;"><?php echo $adParam[0]['DroppingDetails'];?></li>
                                        </ul>
                                    </div>
                                </article>
                            </section>
                        </div>
                        <div class="col-sm-4">
                            <article class="widget">
                                <h4 style="border-bottom: 1px solid red;">Date Of Journey</h4>
                                <table class="table table-striped table-bordered table--dark-head">
                                    <thead>
                                        <tr>
                                            <td style="text-align:center">Departure Date</td>
                                            <td style="text-align:center">Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $DateandCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$Packages[0]['PackageID']."' and date(TourDate)>'".date("y-m-d")."' and IsActive='Yes'");?>
                                    <?php    foreach($DateandCosts as $DateandCost) {    ?>
                                        <tr>
                                            <td><?php echo date("M,d Y", strtotime($DateandCost['TourDate']))?></td>
                                            <td style="text-align: right;"><strike><?php echo "Rs " .number_format($DateandCost['PackagePrice'],2)?></strike><br><?php echo "Rs " .number_format($DateandCost['OfferPrice'],2)?></td>
                                       </tr>
                                    <?php } ?>                                                         
                                    </tbody>
                                </table>
                                <button type="button" title="View all" class="gradient-button" style="border-radius:0px;border: none;height: -moz-max-content;line-height: 25px;padding:0 14px !important;float:right" onclick="getEnquiryDetails('<?php echo md5($Packages[0]['PackageID']);?>')">&nbsp;&nbsp;Enquiry&nbsp;</button>
                            </article>
                        </div>  
                    </div>
                 </div>
               </div>
            </div>
    </main>
    <div class="modal fade"  id="ConfirmationPopup"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>                                                                                                      
    <?php include_once("footer.php");?>
    <script type="text/javascript">
         $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery:true,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                item:1,                                                          
                thumbItem:6,
                slideMargin: 0,
                speed:500,                                                                         
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
            
            $('#gallery1,#gallery2,#gallery3,#gallery4').lightGallery({
                download:false
            });
        });
       var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>"; 
         function getEnquiryDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=getEnquiryDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    
    function SaveEnquiryDetails() {
     var param = $( "#EnquiryFrom").serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=SubmitEnquiryDetails",param,function(data) {                                       
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='admin/assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
        } else {
            html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='admin/assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a data-dismiss='modal' class='gradient-button'>Continue</a></div></div>";
            html += "</div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
    </script>
    