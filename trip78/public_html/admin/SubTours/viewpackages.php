<?php 
    $packages = $mysql->select("select * from _tbl_tours_package");
    $t= $mysql->Select("select * from _tbl_tour where TourTypeID='".$packages[0]['TourTypeID']."'");
    //$st= $mysql->Select("select * from _tbl_sub_tour where SubTourTypeID='".$packages[0]['SubTourTypeID']."'");
    
    $st= $mysql->Select("select * from _tbl_sub_tour where md5(SubTourTypeID)='".$_GET['id']."'");
    $t= $mysql->Select("select * from _tbl_tour where TourTypeID='".$st[0]['TourTypeID']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title" style="line-height:22px">
                                        Manage Packages<br>
                                        <span style="color:#555;font-weight:normal;font-size:13px"><?php echo $t[0]['TourTypeName'];?> / <?php echo $st[0]['SubTourTypeName'];?></span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=ToursPackage/add&id=<?php echo $_GET['id'];?>" class="btn btn-primary btn-xs">Add Package</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Package Name</th>
                                                <th scope="col" style="text-align:right;">Price</th>
                                                <th scope="col" style="text-align:right;">Order</th>
                                                <th scope="col" style="text-align:right;">Rating</th>
                                                <!--<th scope="col">Upcoming Date</th>-->
                                                <!--<th scope="col">Expiry Date</th>-->
                                                <th scope="col"  style="text-align:right;">Enquiries</th>
                                                <th scope="col"> </th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $packages = $mysql->select("select * from _tbl_tours_package where md5(SubTourTypeID)='".$_GET['id']."'");
                                            foreach($packages as $package){ 
                                            $Enquiries= $mysql->Select("SELECT COUNT(PackageID) AS cnt FROM _tbl_tour_enquiry where PackageID='".$package['PackageID']."'"); 
                                            //$UpcomingDates= $mysql->Select("SELECT COUNT(DateandCostID) AS cnt FROM _tbl_package_date_cost where PackageID='".$package['PackageID']."' and date(TourDate)>='".date("Y-m-d")."'"); 
                                            //$ExpiryDates= $mysql->Select("SELECT COUNT(DateandCostID) AS cnt FROM _tbl_package_date_cost where PackageID='".$package['PackageID']."' and date(TourDate)<='".date("Y-m-d")."'"); 
                                              $tourThumb =   $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$package['PackageID']."' order by ImageOrder");
                                              
                                              if (sizeof($tourThumb)==0) {
                                     $path = "https://trip78.in/images/logo_footer.png";
                                 } else {
                                     $path = "https://www.trip78.in/uploads/package/".$tourThumb[0]['ImageName'];;
                                 }
                                        ?>   
                                            <tr>
                                                <td style="width:50px;text-align:center"><img src="<?php echo $path;?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $package['PackageName'];?>
                                                <br><span style="color:#444;font-size:11px;">
                                                <?php echo $package['JoiningPlace']; ?>-
                                                <?php echo $package['LeavingPlace']; ?>
                                                </span>
                                                </td>
                                                <td style="text-align:right"><?php echo $package['PackagePrice'];?></td>
                                                <td style="text-align:right"><?php echo $package['PackageOrder'];?></td>
                                                <td style="text-align:right"> 
                                                <div class="item_rating">               
                                             <?php for($i=1;$i<=$package['PackageRating'];$i++) {?>
                                <i class="fa fa-star" style="color:#1d72c1"></i>
                                <?php } ?>
                                 <?php for($i=$package['PackageRating'];$i<5;$i++) {?>
                                <i class="fa fa-star" style="color:#888"></i>
                                <?php } ?>
                                        </div>
                                        
                                                </td>
                                                <!--<td><?php echo $UpcomingDates[0]['cnt'];?></td>-->
                                                <!--<td><?php echo $ExpiryDates[0]['cnt'];?></td>-->
                                                <td  style="text-align:right;"><?php echo $Enquiries[0]['cnt'];?></td>
                                                <td>
                                                <?php
                                                     
                                                     $unsizeImages = 0;
                                                     foreach($tourThumb as $thumb) {
                                                          list($width, $height) = getimagesize("../uploads/package/".$thumb['ImageName']);
                                                          if (!($width==950 && $height=700)) {
                                                              $unsizeImages++;
                                                          }   
                                                     }
                                                     if ($unsizeImages==0) {
                                                           echo "<img src='assets/checked.png' style='width:16px'>&nbsp;";
                                                     }
                                                     echo "Images: ".sizeof($tourThumb);
                                                     
                                                     if ($unsizeImages>0) {
                                                     echo "<br><span style='color:red'>Unsize Image: ".$unsizeImages."</span>";
                                                     }  
                                                     if (strlen(trim($package['Description']))==0) {
                                                       echo "<br><span style='color:red'>Discription missing</span>";  
                                                     }
                                                ?>
                                                </td>
                                                <td style="text-align: right">                                                    
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=ToursPackage/edit&id=<?php echo md5($package['PackageID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=ToursPackage/view&id=<?php echo md5($package['PackageID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $package['PackageID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (sizeof($packages)==0) { ?>
                                            <tr>
                                                <td colspan="6" style="text-align:center ;">No Records found</td>
                                            </tr>
                                        <?php } ?>
                                        
                                        </tbody>
                                    </table>
                            </div>
                            
                        </div>
                    </div>                                                                                             
                </div>
                
                
               
                                        
                                            <div class="col-md-12">                                  
                                                <a href="dashboard.php?action=Tours/viewsubtours&id=<?php echo md5($t[0]['TourTypeID']);?>" class="btn btn-warning">Back</a>
                                            </div>                                        
                                         
                                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(PackageID){
    var txt = '<form action="" method="POST" id="TourFrm_'+PackageID+'">'
                    +'<input type="hidden" value="'+PackageID+'" id="PackageID" Name="PackageID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete tour package?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeletePackage(\''+PackageID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeletePackage(PackageID) {
     var param = $( "#TourFrm_"+PackageID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeletePackage",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>

