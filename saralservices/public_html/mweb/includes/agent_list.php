<?php 
    if( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_Members` where `IsMember`='1' and MapedTo='".$_SESSION['User']['MemberID']."' and IsActive='1' order by `MemberName` ");
        $title="Active Retailers";
    }
    if( $_GET['Status']=="Deactive"){
        $sql= $mysql->select("select * from `_tbl_Members` where `IsMember`='1' and MapedTo='".$_SESSION['User']['MemberID']."' and IsActive='0' order by `MemberName`");
        $title="Deactive Retailers";
    }
?>
<br>
<div class="row" >
    <div class="col-6" style="text-align: left;">
        <button type="button" class="btn btn-black btn-sm" onclick="location.href='dashboard.php?action=agents_manage'" style="background:#868d93  !important;border: none;color:#f1f1f1">Back</button>    
    </div>
    <div class="col-6" style="text-align: right;">
        <div class="btn-group" role="group" aria-label="Basic example">
           <?php if($_GET['Status']=="Active"){  ?>
            <button type="button" class="btn btn-danger btn-sm" onclick="location.href='dashboard.php?action=agent_list&Status=Active'">Active</button>
            <button type="button" class="btn btn-black  btn-sm" onclick="location.href='dashboard.php?action=agent_list&Status=Deactive'" style="background:#868d93  !important;border: none;color:#f1f1f1">Deactive</button>
           <?php } ?>
           <?php if($_GET['Status']=="Deactive"){  ?>
            <button type="button" class="btn btn-black btn-sm" onclick="location.href='dashboard.php?action=agent_list&Status=Active'" style="background:#868d93  !important;border: none;color:#f1f1f1">Active</button>
            <button type="button" class="btn btn-danger  btn-sm" onclick="location.href='dashboard.php?action=agent_list&Status=Deactive'">Deactive</button>
           <?php } ?>
        </div>
     </div>  
</div>   <br>
<h3 style="text-align: center;padding:10px;"><?php echo $title;?></h3>
<?php if ($_SESSION['User']['IsDealer']=="1") { ?>
<table class="table table-striped ">
    <tr>
        <td  colspan="2" style="height:5px;">&nbsp;</td>
    </tr>
    <?php foreach($sql as $s) { ?>
        <tr>
            <td style="font-size:12px;">
            <b><br><span style="color:#222"><?php echo strtoupper($s['MemberName']);?></span></b><Br> 
            <?php echo $s['MobileNumber'];?><Br> 
            
            Rs. <?php echo number_format($application->getBalance($s['MemberID']),2);  ?><br><br>
            </td>
            <td style="text-align:center;padding-right:0px;font-size:10px;padding-left:0px;">
            <a href="javascript:void(0);" onclick="ViewRetailers('<?php echo $s['MemberName'];?>','<?php echo $s['MobileNumber'];?>','<?php echo $s['EmailID'];?>','<?php echo $s['Address1'];?>','<?php echo $s['Address2'];?>','<?php echo $s['PostalCode'];?>','<?php echo $s['GSTIN'];?>','<?php echo $s['MemberPassword'];?>')">View</a>
            </td>
        </tr>
        <?php  } ?>
        <?php  if (sizeof($sql)==0) {    ?>
        <tr>
        <td  colspan="2">No deactive retailers found</td>
        </tr>
        <?php }   ?>
     <tr><td  colspan="2" style="height:5px;">&nbsp;</td></tr>
</table> 
 
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>
<?php } ?>
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
 function ViewRetailers(Name,Mobile,Email,Address1,Address2,Pincode,GSTIN,Password) {
     var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Retailer Details</h5> <br>'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="padding-left:39px;font-weight:bold;font-size:12px;">Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+Name+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group" style="margin-bottom: -14px;">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="padding-left:47px;font-weight:bold">+91</span>'
                            +'</div>'
                            +'<input type="text" value="'+Mobile+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align:left">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:22px;font-weight:bold;font-size:12px;">Email ID</span>'
                        +'</div>'
                        +'<input type="text" value="'+Email+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:13px;font-weight:bold;font-size:12px;">Address 1</span>'
                        +'</div>'    
                        +'<input type="text" value="'+Address1+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:13px;font-weight:bold;font-size:12px;">Address 2</span>'
                        +'</div>' 
                        +'<input type="text" value="'+Address2+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:24px;font-weight:bold;font-size:12px;">Pincode</span>'
                        +'</div>'
                        +'<input type="text" value="'+Pincode+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                    +'</div>' 
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:35px;font-weight:bold;font-size:12px;">GSTIN</span>'
                        +'</div>'
                        +'<input type="text" value="'+GSTIN+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                    +'</div>' 
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
     $('#ConfirmationPopup').modal("show");                                 
 }
 </script>