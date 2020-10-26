 <script>
     function XSubmitSearch() {
        $('#Errcontactdetails').html("");
        ErrorCount=0;
        if(IsNonEmpty("contactdetails","Errcontactdetails","Please Enter Name / Number")){
           IsSearch("contactdetails","Errcontactdetails","Please Enter more than 3 characters") 
        }
        if (ErrorCount==0) {
            return true;
        } else{
            return false;
        }
    }
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                My Contacts
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" onsubmit="return XSubmitSearch();"> 
                                <div class="form-group form-show-validation row">  
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="contactdetails" placeholder="Name / Number" name="contactdetails" value="<?php echo isset($_POST['contactdetails']) ? $_POST['contactdetails'] : '';?>" >
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1"><button type="submit" name="viewTransaction" style="border: none;background: none;margin:0px"><i class="fa fa-search"></i></button></span> 
                                            </div>
                                        </div>
                                        <small style="color:#737373; font-size:X-smaller;" >eg: name / number</small>  <br>
                                        <span class="errorstring" id="Errcontactdetails"><?php echo isset($Errcontactdetails)? $Errcontactdetails : "";?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php 
        if(isset($_POST['viewTransaction'])) { 
                    $summary = $mysql->select("select * from _tbl_my_contact where  ContactName like '%".$_POST['contactdetails']."%' or MobileNumber like '%".$_POST['contactdetails']."%' or DTHNumber like '%".$_POST['contactdetails']."%' or TNEBNumber like '%".$_POST['contactdetails']."%' and MemberID='".$_SESSION['User']['MemberID']."'");
        } else {
            $summary = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."'");
            }
?>     
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>DTH Number</th>                                                                                           
                                            <th>TNEB Number</th>                                                                                           
                                            <th></th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($summary as $s){ ?>
                                        <tr>
                                            <td style="font-size:13px;"><?php echo $s['ContactName'];?></td>
                                            <td style="font-size:13px;">
                                            <?php if (strlen($s['MobileNumber'])==10) {?>
                                                +91-<?php echo $s['MobileNumber'];?>&nbsp;(<?php echo $s['MobileOperator'];?>)<br>
                                                <a href="dashboard.php?action=MobileRecharge/Recharge&mobilenumber=<?php echo $s['MobileNumber'];?>">select</a>
                                            <?php } else {?>
                                                <a href="dashboard.php?action=Settings/EditMyContact&cid=<?php echo $s['ContactID'];?>">Add Mobile Number</a>
                                            <?php } ?>
                                            </td>  
                                            <td style="font-size:13px;">
                                            <?php if (strlen($s['DTHNumber'])>=5) {?>
                                                <?php echo $s['DTHNumber'];?>&nbsp;(<?php echo $s['DTHOperator'];?>) <br>
                                                <a href="dashboard.php?action=DTHRecharge/Recharge&dthnumber=<?php echo $s['DTHNumber'];?>">select</a>
                                            <?php }else { ?>
                                                <a href="dashboard.php?action=Settings/EditMyContact&cid=<?php echo $s['ContactID'];?>">Add DTH Number</a>
                                            <?php } ?>
                                            </td>
                                            <td style="font-size:13px;">
                                            <?php if (strlen($s['TNEBNumber'])>=5) {?>
                                                <?php echo $s['TNEBRegion'];?>-<?php echo $s['TNEBNumber'];?><br>
                                                <a href="dashboard.php?action=ElectricityBill&ebnumber=<?php echo $s['TNEBNumber'];?>&region=<?php echo $s['TNEBRegion'];?>">select</a>
                                            <?php } else {?>
                                                <a href="dashboard.php?action=Settings/EditMyContact&cid=<?php echo $s['ContactID'];?>">Add TNEB Number</a>
                                            <?php } ?>
                                            </td>
                                            <td style="font-size:13px;"><a href="dashboard.php?action=Settings/EditMyContact&cid=<?php echo $s['ContactID'];?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0);" onclick="ViewContacts('<?php echo $s['ContactName'];?>','<?php echo $s['MobileNumber'];?>','<?php echo $s['MobileOperator'];?>','<?php echo $s['DTHNumber'];?>','<?php echo $s['DTHOperator'];?>','<?php echo $s['TNEBNumber'];?>','<?php echo $TnebRegion[$s['TNEBRegion']]; ?>')">View</a></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (sizeof($summary)==0) {?>
                                       <tr>
                                            <td style="font-size:13px;text-align:center" colspan="7">No contacts found </td>
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
<script>$(document).ready(function(){ 
//{$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});
});
</script>
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
 function ViewContacts(Name,Mobile,MobOperator,DTH,DTHOperator,TNEB,Region) {
     var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Contact Details</h5> <br>'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="padding-left:78px;font-weight:bold;font-size:12px;">Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+Name+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group" style="margin-bottom: -14px;">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="padding-left:86px;font-weight:bold">+91</span>'
                            +'</div>'
                            +'<input type="text" value="'+Mobile+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align:left">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="font-weight:bold;font-size:12px;">Mobile Operator</span>'
                        +'</div>'
                        +'<input type="text" value="'+MobOperator+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:33px;font-weight:bold;font-size:12px;">DTH Number</span>'
                        +'</div>'    
                        +'<input type="text" value="'+DTH+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:25px;font-weight:bold;font-size:12px;">DTH Operator</span>'
                        +'</div>' 
                        +'<input type="text" value="'+DTHOperator+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-top: 4px;margin-bottom: -10px;">'
                   +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:33px;font-weight:bold;font-size:12px;">TNEB Region</span>'
                        +'</div>'
                        +'<input type="text" value="'+Region+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                   +'</div>'
                +'</div>'
                +'<div class="form-group" style="text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:42px;font-weight:bold;font-size:12px;">EB Number</span>'
                        +'</div>'
                        +'<input type="text" value="'+TNEB+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                    +'</div>' 
                +'</div>' 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
     $('#ConfirmationPopup').modal("show");
 }
 </script>