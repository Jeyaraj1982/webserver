<?php 
    $packages = $mysql->select("select * from _tbl_hotels_packages where IsActive='1' and md5(HotelID)='".$_GET['Hotel']."'");
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
                                    <a href="dashboard.php?action=Hotel/Package/AddPackage&Hotel=<?php echo $_GET['Hotel'];?>" class="btn btn-primary btn-xs">Add Package</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table id="tbl" class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                               
                                                <th scope="col">Package Name</th>
                                                <th scope="col" style="text-align:right;">Price</th>
                                                <th scope="col" style="text-align:right;">Offer Price</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            
                                            foreach($packages as $package){ 
                                            
                                               
                                        ?>   
                                            <tr>
                                                  <td><?php echo $package['PackageName'];?>
                                                <br><span style="color:#444;font-size:11px;">
                                                
                                                <?php echo $package['Details']; ?>
                                                </span>
                                                </td>
                                                <td style="text-align:right"><?php echo $package['Price'];?></td>
                                                <td style="text-align:right"><?php echo $package['OfferPrice'];?></td>
                                                
                                                 
                                                        
                                                 
                                            
                                                 
                                                <td style="text-align: right">                                                    
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Hotel/Package/EditPackage&id=<?php echo md5($package['HotelPackageID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Hotel/Package/ViewPackage&id=<?php echo md5($package['HotelPackageID']);?>" draggable="false">View</a>
                                                           <!-- <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $package['HotelPackageID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
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

$(document).ready(function() {
            $('#tbl').DataTable({
                 "lengthMenu": [[-1], ["All"]]
            });
});
</script>

