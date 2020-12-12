<?php
      if($_GET['filter']=="All"){
        $packages=$mysql->select("SELECT * FROM `_tbl_Members_Package_Elegible`");    
      }
      if($_GET['filter']=="NotAssign"){
        $packages=$mysql->select("SELECT * FROM `_tbl_Members_Package_Elegible` where PayoutType='0'");        
      }
      if($_GET['filter']=="Cash"){
        $packages=$mysql->select("SELECT * FROM `_tbl_Members_Package_Elegible` where PayoutType='1'");   
      }
      if($_GET['filter']=="Package"){
        $packages=$mysql->select("SELECT * FROM `_tbl_Members_Package_Elegible` where PayoutType='2'");   
      }
      if($_GET['filter']=="Coupon"){
        $packages=$mysql->select("SELECT * FROM `_tbl_Members_Package_Elegible` where PayoutType='3'");   
      }
      

    $title = "All Packages";
                                                                          
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/Packages">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/Packages">Manage Packages</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Members/Packages&filter=All" <?php echo ($_GET['filter']=="All") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=Members/Packages&filter=NotAssign" <?php echo ($_GET['filter']=="NotAssign") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>><small>Not Assign</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Members/Packages&filter=Cash" <?php echo ($_GET['filter']=="Cash") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>><small>Cash</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Members/Packages&filter=Package" <?php echo ($_GET['filter']=="Package") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>><small>Package</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Members/Packages&filter=Coupon" <?php echo ($_GET['filter']=="Coupon") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>><small>Coupon</small></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Packages</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                
                                <tr>
                                                <th class="border-top-0"><b>Member Code</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Eligible On</b></th>
                                                <th class="border-top-0"><b>Payout Type</b></th>
                                                <th class="border-top-0"><b>Description</b></th>
                                                <th class="border-top-0"><b>Updated On</b></th>
                                            </tr>
                               
                            </thead>
                            <tbody>
                                <?php if (sizeof($packages)==0) { ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($packages as $package){ ?>
                                <tr>
                                    <td><?php echo $package['MemberCode'];?></td>
                                    <td><?php echo $package['MemberName'];?></td>
                                    <td><?php echo $package['EligibledOn'];?></td>
                                    <td>
                                        <?php if($package['PayoutType']=="1"){ 
                                                 echo "Cash"; 
                                              }else if($package['PayoutType']=="2"){
                                                  echo "Package";
                                              }else if($package['PayoutType']=="3"){
                                                  echo "Coupon";
                                              }else if($package['PayoutType']=="0"){ ?>
                                                <a href="javascript:void(0)" onclick="AssignPackage('<?php echo $package['PackageEligibleID'];?>','<?php echo $package['MemberID'];?>')">Not Assign</a>
                                            <?php  }?>  
                                    </td>
                                    <td><?php echo $package['Description'];?><br><?php if(!($package['PayoutType']=="0")) { ?><a href="javascript:void(0)" onclick="EditPackageDescription('<?php echo $package['PackageEligibleID'];?>','<?php echo $package['MemberID'];?>','<?php echo $package['Description'];?>')">Edit</a><?php } ?></td>
                                    <td><?php echo $package['UplodatedOn'];?></td>
                               </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div> 
<script>
function AssignPackage(PackageEligibleID,MemberID){
            var txt ='<form action="" method="POST" id="PackageEligibleIDFrm'+PackageEligibleID+'">'
                        +'<input type="hidden" value="'+PackageEligibleID+'" id="PackageEligibleID" Name="PackageEligibleID">'
                        +'<input type="hidden" value="'+MemberID+'" id="MemberID" Name="MemberID">'
                        +'<div class="modal-header" style="padding-bottom:5px">'
                            +'<h4 class="heading"><strong>Assign Package</strong> </h4>'
                            +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                                +'<span aria-hidden="true" style="color:black">&times;</span>'
                            +'</button>'
                        +'</div>'
                        +'<div class="modal-body">'                                                                     
                            +'<div class="form-group row">'                                                          
                                +'<div class="col-md-12">'    
                                    +'<label>Assign package</label>'
                                    +'<select id="PackageType" name="PackageType" class="form-control">'
                                        +'<option value="1">Cash</option>'
                                        +'<option value="2">Package</option>'
                                        +'<option value="3">Coupon</option>'
                                    +'</select>'
                                +'</div>'
                            +'</div>'
                            +'<div class="form-group row">'                                                          
                                +'<div class="col-md-12">'    
                                    +'<label>Description</label>'
                                    +'<input type="text" id="Description" name="Description" class="form-control">'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="modal-footer">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                                +'<button type="button" class="btn btn-success" onclick="AssignPackageDetails(\''+PackageEligibleID+'\')" >Yes, Confirm</button>'
                        +'</div>'
                     +'</form>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function AssignPackageDetails(PackageEligibleID) {
    
     var param = $( "#PackageEligibleIDFrm"+PackageEligibleID).serialize();
   // $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=AssignPackageDetails",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Members/Packages&filter=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
}
function EditPackageDescription(PackageEligibleID,MemberID,Description){
            var txt ='<form action="" method="POST" id="PackageEligibleIDFrm'+PackageEligibleID+'">'
                        +'<input type="hidden" value="'+PackageEligibleID+'" id="PackageEligibleID" Name="PackageEligibleID">'
                        +'<input type="hidden" value="'+MemberID+'" id="MemberID" Name="MemberID">'
                        +'<div class="modal-header" style="padding-bottom:5px">'
                            +'<h4 class="heading"><strong>Edit Details</strong> </h4>'
                            +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                                +'<span aria-hidden="true" style="color:black">&times;</span>'
                            +'</button>'
                        +'</div>'
                        +'<div class="modal-body">'                                                                     
                            +'<div class="form-group row">'                                                          
                                +'<div class="col-md-12">'    
                                    +'<label>Description</label>'
                                    +'<input type="text" id="Description" name="Description" value="'+Description+'" class="form-control">'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="modal-footer">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                                +'<button type="button" class="btn btn-success" onclick="UpdatePackageDetails(\''+PackageEligibleID+'\')" >Update</button>'
                        +'</div>'
                     +'</form>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function UpdatePackageDetails(PackageEligibleID) {
    
     var param = $( "#PackageEligibleIDFrm"+PackageEligibleID).serialize();
   // $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=UpdatePackageDetails",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Members/Packages&filter=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
}

</script>