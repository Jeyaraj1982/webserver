
 <div class="row" style="padding:10px;text-align:center;margin-bottom:20px;">
    <div class="col-8" style="text-align: right;"><h3>My Contacts</h3></div>
    <div class="col-4"><a href="dashboard.php?action=my_contacts_add" class="btn btn-primary btn-sm" style="padding: 1px 6px;">Add Contact</a></div>
</div>
<div class="row" style="margin-bottom:0px">
        <div class="col-md-12">
            <div class="card" style="border-radius:0px;margin-bottom:0px;padding:0px">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row" style="padding:15px;">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="contactdetails" id="contactdetails" value="<?php echo isset($_POST['contactdetails']) ? $_POST['contactdetails'] : "";?>" placeholder="eg. Name / Number">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1"><button type="submit" name="viewTransaction" style="border: none;background: none;margin:0px"><i class="fa fa-search"></i></button></span> 
                                        </div>
                                    </div>
                                    <div class="Errorstring"><?php echo $Errcontactdetails;?></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<div class="row" style="margin-left: 0px;margin-right: 0px;">
            <?php 
            if(isset($_POST['viewTransaction'])) { 
                
                $Error=0;
                if (!(strlen(trim($_POST['contactdetails']))>0)) {
                $Errcontactdetails = "Please Enter Contact Details";
                $Error++;
                }
                if($Error==0){
                    $summary = $mysql->select("select * from _tbl_my_contact where  ContactName like '%".$_POST['contactdetails']."%' or MobileNumber like '%".$_POST['contactdetails']."%' or DTHNumber like '%".$_POST['contactdetails']."%' or TNEBNumber like '%".$_POST['contactdetails']."%' and MemberID='".$_SESSION['User']['MemberID']."'");
                }
            } else {
                $summary = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."'");
            }
                if (sizeof($summary)==0) {
                    echo "<div style='text-align:center;padding:50px;'>No records found</div>";
                } else {
?> 


<?php foreach($summary as $s) { ?>   
<div class="col-12" style="border:1px solid #ccc;border-radius:8px;padding:10px 15px;margin-bottom: 10px;">

<div class="row">
    <div class="col-9">
        <b style="color:#222"><?php echo $s['ContactName'];?></b>&nbsp;
    </div>
    <div class="col-3" style="text-align: right;padding-left:0px;">
        <a href="javascript:void(0);" onclick="ViewContacts('<?php echo $s['ContactName'];?>','<?php echo $s['MobileNumber'];?>','<?php echo $s['MobileOperator'];?>','<?php echo $s['DTHNumber'];?>','<?php echo $s['DTHOperator'];?>','<?php echo $s['TNEBNumber'];?>','<?php echo $TnebRegion[$s['TNEBRegion']]; ?>','<?php echo $s['ContactID'];?>')"><img src="assets/img/maximize.png"></a>
    </div>
</div>
<div class="row">
      <div class="col-4" style="padding-right:0px;text-align:center;font-size:12px">
        <?php if (strlen($s['MobileNumber'])==10) {?>
            <?php if($s['MobileOperator']=="RA"){ ?>
                <img src="assets/img/logo_airtel.png" style="height:48px !important;border-radius:50%;padding:10px"><br>
            <?php } if($s['MobileOperator']=="RB"){ ?>
                <img src="assets/img/logo_bsnl.png"  style="height:48px !important"><br>                                                                                                                                                                                                                                                           
            <?php } if($s['MobileOperator']=="RV"){ ?>
                <img src="assets/img/logo_vodafone.png"  style="height:48px !important"><br>
            <?php } if($s['MobileOperator']=="RI"){ ?>
                <img src="assets/img/logo_idea.png"  style="height:48px !important"><br>
            <?php } if($s['MobileOperator']=="RJ"){ ?>
                <img src="assets/img/logo_jio.png"  style="height:48px !important"><br>
            <?php } ?>
            <?php echo $s['MobileNumber'];?><br>
            <a href="dashboard.php?action=mobilerc&mobilenumber=<?php echo $s['MobileNumber'];?>" class="btn btn-primary btn-sm" style="padding: 2px 22px 4px;">select</a><br>
        <?php } else { ?>
            <div style="padding-top:30px;padding-bottom:30px"><a href="dashboard.php?action=my_contacts_edit&cid=<?php echo $s['ContactID'];?>" >Add Mobile Number</a></div>
        <?php } ?>
      </div>
      <div class="col-4" style="padding-right:0px;text-align:center;font-size:12px">
      <?php if (strlen($s['DTHNumber'])>=5) {?>
            <?php if($s['DTHOperator']=="DA"){ ?>
                <img src="assets/img/logo_airteldth.png" style="height:48px !important"><br>
            <?php } if($s['DTHOperator']=="DB"){ ?>
                <img src="assets/img/logo_bigtv.png" style="height:48px !important"><br>
            <?php } if($s['DTHOperator']=="DD"){ ?>
                <img src="assets/img/logo_dishtv.png" style="height:48px !important"><br>
            <?php } if($s['DTHOperator']=="DS"){ ?>
                <img src="assets/img/logo_sundirect.png" style="height:48px !important"><br>
            <?php } if($s['DTHOperator']=="DT"){ ?>
                <img src="assets/img/logo_tatasky.png" style="height:48px !important"><br>
            <?php } if($s['DTHOperator']=="DV"){ ?>
                <img src="assets/img/logo_videocond2h.png" style="height:48px !important"><br>
            <?php } ?>
            <?php echo $s['DTHNumber'];?><br>
            <a href="dashboard.php?action=dthrc&dthnumber=<?php echo $s['DTHNumber'];?>" class="btn btn-primary btn-sm" style="padding: 2px 22px 4px;">select</a>
      <?php } else { ?>
            <div style="padding-top:30px;padding-bottom:30px"><a href="dashboard.php?action=my_contacts_edit&cid=<?php echo $s['ContactID'];?>" >Add DTH Number</a></div>
      <?php } ?>
      </div>
      <div class="col-4" style="padding-right:0px;text-align:center;font-size:12px">
        <?php if (strlen($s['TNEBNumber'])>=5) {?>
            <img src="assets/img/logo_tneb.png" style="height:48px !important;border-radius:50%;padding:10px"><br>
            <?php echo $s['TNEBRegion'];?>-<?php echo $s['TNEBNumber'];?><br>
            <a href="dashboard.php?action=bill_tneb&ebnumber=<?php echo $s['TNEBNumber'];?>&region=<?php echo $s['TNEBRegion'];?>" class="btn btn-primary btn-sm" style="padding: 2px 22px 4px;">select</a>
        <?php }else { ?>
            <div style="padding-top:30px;padding-bottom:30px"><a href="dashboard.php?action=my_contacts_edit&cid=<?php echo $s['ContactID'];?>" >Add TNEB Number</a></div>
        <?php } ?>                                                                                         
      </div>
</div>
</div>

<?php }   ?>
<?php }  ?>   
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
 function ViewContacts(Name,Mobile,MobOperator,DTH,DTHOperator,TNEB,Region,contactid) {
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
                +'<div class="form-group"  style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;padding-left:36px;font-weight:bold;font-size:12px;">TNEB Region</span>'
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
                    +'<a href="dashboard.php?action=my_contacts_edit&cid='+contactid+'">Edit</a>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
     $('#ConfirmationPopup').modal("show");
 }
 </script>
<style>
.card-body {padding:0px;}
</style>
 <script>
  
     function OpenCalndr(t) {
         if (t=='1') {
             $( "#From" ).trigger( "click" );
         }
         if (t=='2') {
             $( "#To" ).trigger( "click" );
         }
         
     }
    </script>
    <style>
    .card {
        background:none !important;
    }
     .datepicker {
         margin:0px auto;
     }
     .card-body{padding:0px !important;}
.table-condensed td {
  text-align:center;
  padding:8px 12px;
  
}  
    </style>