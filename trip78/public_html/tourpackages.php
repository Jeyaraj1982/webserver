<?php include_once("header.php");?>


 <?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
   ?>
       <style>
    .box-container {
    padding: 10px;
    background: #fff;
    position: relative;
    margin: 10px 0;
}
.shadow {                                                                                         
    -webkit-box-shadow: 0 5px 16px rgba(0,0,0,.18);
    box-shadow: 0 5px 16px rgba(0,0,0,.18);
}                                                                                                          
    box-container--academy__titile, .tour-block-title {
    border-bottom: 1px solid rgba(0,0,0,.1);
    padding-bottom: 8px;
    margin-top: 0;
}

</style>
    <main class="main">
        <div class="wrap">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                    <li><a title="Travel guides"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>
                </ul>
            </nav>
            <div class="row">
                <div class="full-width">
                    <div class="box-container shadow ng-scope" ng-if="gitInternationalLoaded" style="height: 490px;">
                        <h2 class="tour-block-title"><?php echo $SubTours[0]['SubTourTypeName'];?></h2>
                        <div class="owl-stage-outer">
                            <div class="row">   
                                <?php foreach($Packages as $Package) { ?>
                                <article class="one-third">
                                    <div style="border:1px solid #ccc;overflow: auto;padding-bottom: 11px;">
                                        <figure><a href="" title=""><img src="uploads/package/<?php echo $Package['Image1'];?>" alt="" style="width: 100%;height: 200px;"></a></figure>
                                        <div style="height:30px;background: #f0ecec;padding: 5px 10px 10px 20px;text-align: center;">
                                            <span style="color: #666;margin-right:20px;"><?php echo $Package['NightsCount'];?>&nbsp;Nights</span>   
                                            <span style="color: #666;margin-right:20px;">&nbsp;<?php echo $Package['CityCount'];?>&nbsp;Cities</span>  
                                            <span style="color: #666;margin-right:20px;">&nbsp;<?php echo $Package['CountryCount'];?>&nbsp;Country</span>   
                                        </div>                                                              
                                        <div class="details" style="height: 75px;">
                                            <h4 style="float: left;text-align:left;margin-bottom: -23px;"><?php echo ucwords(strtolower($Package['PackageName']));?></h4>
                                        </div>
                                        <div style="padding: 10px 9px 15px;">
                                            <div style="cursor:pointer;width: 100%;border-radius: 3px;padding: 5px;flex-grow: 1;min-height: 41px;text-align: center;background-color: #ed1c24;color: #fff;display: flex;justify-content: space-around;align-items: center;font-size: 19px !important;">You Save RS.<?php echo $Package['SavePrice'];?> </div>  
                                        </div> 
                                        <div style="padding: 0px 9px 15px;">
                                            <div style="float: left;margin-right: 3px;">
                                                <a href="tourpackagedetails.php?tid=<?php echo md5($Package['PackageID']);?>" title="View all" class="gradient-button" style="border-radius:0px;height: -moz-max-content;line-height: 25px;padding:0 14px !important">View Details</a>
                                            </div>
                                            <div style="float: left;margin-right: 3px;">
                                                <button type="button" title="View all" class="gradient-button" style="border-radius:0px;border: none;height: -moz-max-content;line-height: 25px;padding:0 14px !important" onclick="getDateandCostDetails('<?php echo md5($Package['PackageID']);?>')">Date and Cost</button>
                                            </div>
                                            <div style="float: left;">
                                                <button type="button" title="View all" class="gradient-button" style="border-radius:0px;border: none;height: -moz-max-content;line-height: 25px;padding:0 14px !important;" onclick="getEnquiryDetails('<?php echo md5($Package['PackageID']);?>')">&nbsp;&nbsp;Enquiry&nbsp;</button>
                                            </div>
                                        </div>
                                    </div>                                                                                
                                </article>
                               <?php } ?>
                            </div>                                                                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>                                                                          
   <?php include_once("footer.php");?>
<div class="modal fade"  id="ConfirmationPopup"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>
   <script>
   var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
    function getDateandCostDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=getDateandCostDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
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