<?php include_once("header.php");?>
<?php
    if($_GET['fr']=="0" && $_GET['to']=="10000"){
        $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and offerPrice>='0' and offerPrice<='10000'");    
        $title = "Less than 10000 Packages";
    }
    if($_GET['fr']=="10000" && $_GET['to']=="20000"){
        $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and offerPrice>='10000' and offerPrice<=20000");   
        $title = "10000 to 20000 Packages"; 
    }
    if($_GET['fr']=="20000" && $_GET['to']=="20000"){
        $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and offerPrice>='20000' and offerPrice<=50000");    
        $title = "20000 to 20000 Packages"; 
    }
    if($_GET['fr']=="40000" && $_GET['to']=="60000"){
        $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and offerPrice>='40000' and offerPrice<=60000");   
        $title = "40000 to 60000 Packages";  
    }
    if($_GET['fr']=="60000" && $_GET['to']=="80000"){
        $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and offerPrice>='60000' and offerPrice<=80000");  
        $title = "60000 to 80000 Packages";    
    }
    if($_GET['fr']=="80000" && $_GET['to']=="above"){
        $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and offerPrice>='80000'");    
        $title = "Above 80000 Packages";   
    }
?>
<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
<?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tours[0]['TourTypeID']."'");?>
<style>
  .style-1 #js_frm_040 {
    height: 240px !important;
}
  </style>
 <div class="breadcrumb-content"> 
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page" ><?php echo $title;?></li>
        </ul>
      </nav>
    </div>
<section class="destinations" style="Padding-top:0px !important">
  <div class="container">
   <div class="row" style="margin-bottom:20px">
        <div class="col-md-12" style="text-align: right;">
            <a href="tourpackagebudjetwise.php?fr=<?php echo $_GET['fr'];?>&to=<?php echo $_GET['to'];?>&L=InterNatioanl" class="btn-blue btn-red" style="padding: 2px 10px;font-size:12px;<?php echo $style;?>" tabindex="-1">International</a>       
            <a href="tourpackagebudjetwise.php?fr=<?php echo $_GET['fr'];?>&to=<?php echo $_GET['to'];?>&L=Natioanl" class="btn-blue btn-red" style="padding: 2px 10px;font-size:12px;" tabindex="-1">India</a>       
        </div>
 </div>
    <div class="row">
        <div class="col-md-12">
        <?php foreach($Packages as $Package) { ?>
            <div class="recent-post clearfix sidebar-item" style="margin-bottom: 15px;padding:0px">
                <div class="row">
                    <div class="col-md-3 recent-image" >
                        <a href=""><img src="https://www.trip78.in/uploads/package/<?php echo $Package['Image1'];?>" class="img-responsive img-thumbnail" style="height: 136px;max-width: 200% !important;width:140px;padding: 0px;border: none;border-radius:0px"></a>
                    </div>
                    <div class="col-md-9 recent-content" style="padding-left:50px;padding-top:5px"> 
                        <h3 style="margin-top:0px;margin-bottom:0px;line-height:16px;font-size:13px"><a href="tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>" style="font-size: 15px;"><?php echo ucfirst(strtolower($Package['PackageName']));?></a></h3>
                        <div class="author-detail">
                            <p style="font-size:11px"><?php echo $Package['NightsCount'];?> <?php if($Package['NightsCount']>1) { echo " Nights"; } else { echo " Night"; } ?>&nbsp;|&nbsp;<?php echo $Package['CountryCount'];?> <?php if($Package['CountryCount']>1){ echo " Countries"; } else { echo " Country"; } ?>&nbsp;|&nbsp;<?php echo $Package['CityCount'];?> <?php if($Package['CityCount']>1){ echo " Cities"; } else { echo " City"; } ?></p>                            
                        </div>
                        <a style="padding-left:0px;font-size:15px;font-weight:bold" class="tag tag-blue"><?php echo "Rs. ". number_format($Package['OfferPrice'],2);?></a>
                        <div class="button" style="margin-top:10px">
                            <a href="tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>" class="btn-blue btn-red" style="padding: 2px 10px;font-size:12px;border-radius:15px" tabindex="-1">View Details</a>
                            <a onclick="getEnquiryDetails('<?php echo md5($Packages[0]['PackageID']);?>')" class="btn-blue btn-red" style="padding: 2px 10px;font-size:12px;border-radius:15px;background:white;color:#d60d45;border:1px solid #d60d45;" tabindex="-1">Enquiry</a> 
                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
        </div>
    </div>
 </div>                                                                                                                             
 </section>                                                                                                             
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
  $('.carousel-inner').find('.item').first().addClass('active');
}); 
</script>
<div class="modal fade"  id="ConfirmationPopup"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>
<script>
   var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/images/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
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
            html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/images/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
        } else {
            html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/images/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a data-dismiss='modal' class='gradient-button'>Continue</a></div></div>";
            html += "</div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
   </script>