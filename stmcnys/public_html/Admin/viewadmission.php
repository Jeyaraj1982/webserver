<?php include_once("header.php");?>
<?php include_once("LeftMenu.php");
$data = $mysql->select("select * from _tbl_admissionform where AdmissionID='".$_GET['id']."'");        
?>
<style>
.form-control[readonly] {
    background: #fff !important;
    border-color: #e8e8e8 !important;
}
</style>
<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Admission Form</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Admission Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Admission Form</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12" style="background: white;">
							<div class="card">
								<div class="card-body">
								    <div class="row" >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8" style="margin:0px auto !important;border: 2px solid #ffd041;padding: 50px;border-radius: 10px;background: #fff;padding-bottom: 0px;">
                                        <div class="kamaraj-contact-col">
                                                <div class="row">
                                                    <form action="" method="post" class="wpcf7-form"  enctype="multipart/form-data" onsubmit="return checkInputs();">
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Name of the Applicant</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['ApplicantName'];?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter name of the applicant">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Email</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['ApplicantEmail'];?>" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter your email">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"> <span style="font-size: 16px;">Phone Number</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['ApplicantMobile'];?>"  size="40" maxlength="10" minlength="10" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;margin-bottom:0px;border-top: none;border-right: none;padding-left: 0px;" aria-required="true" aria-invalid="false" placeholder="Enter mobile number of Applicant">
                                                                </span>
                                                               
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Address</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                <span>
                                                                    <textarea class="form-control"readonly="readonly" style="font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;height:30px;margin-bottom: 0px" aria-required="true" aria-invalid="false" placeholder="Enter Address Here" style="margin-bottom:0px;width: 478px; height: 195px;"><?php echo $data[0]['ApplicantAddress'];?></textarea>
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Name of the Parent/Guardian</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                <span>
                                                                    <input type="text"  readonly="readonly" value="<?php echo $data[0]['ApplicantParentName'];?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter name of Parent/Guardian">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Parent's Mobile number</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['ApplicantParentMobile'];?>" size="40" maxlength="10" minlength="10" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter mobile number of Parent/Guardian">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        <div class="form-group row">
                                                         <div class="col-sm-6">
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Date of Birth</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['DateofBirth'];?>" size="40" maxlength="10" minlength="10" class="form-control" style="height:34px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="DateofBirth">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        </div> 
                                                        <div class="col-sm-6">
                                                            <div id="AgeDiv" class="registration_form_control">
                                                                <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Age</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                   <span>
                                                                        <input type="text" readonly="readonly"  id="Age" name="Age" value="<?php echo $data[0]['Age'];?>" size="40" maxlength="10" minlength="10" class="form-control" style="height:34px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="0">
                                                                    </span> 
                                                                </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="registration_form_control"  style="margin-bottom: 20px;">
                                                            <label style="width: 100%;"><span style="font-size: 16px;"> Gender</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span></label><br>
                                                            <span><input type="text" readonly="readonly" value="<?php echo $data[0]['Gender'];?>" size="40" maxlength="10" minlength="10" class="form-control" style="height:34px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="0"></span>
                                                        </div>
                                                         <div class="registration_form_control" style="margin-bottom: 20px;">
                                                            <label style="width: 100%;"><span style="font-size: 16px;"> Community</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                                <span><span><input type="text" readonly="readonly" value="<?php echo $data[0]['Community'];?>" size="40" maxlength="10" minlength="10" class="form-control" style="height:34px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="0"></span></span><br>
                                                            </label>
                                                        </div>
                                                                                                                         
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Nationality</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['Nationality'];?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Nationality">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Religion</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['Religion'];?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Nationality">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Caste</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['Caste'];?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Nationality">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Institution Last Studied</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['ApplicantInstitution'];?>" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Institution Last Studied">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                         <div class="registration_form_control" style="margin-bottom: 20px;">
                                                            <label style="width: 100%;"><span style="font-size: 16px;">Are you a Sports player/Athlete represented in District/State/National/International level</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span></label><br>
                                                            <span>
                                                                <input type="text" readonly="readonly" value="<?php echo $data[0]['SportsPlayer'];?>" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Institution Last Studied">
                                                            </span>
                                                        </div>
                                                        <?php if($data[0]['SportsPlayer']=="Yes"){ ?>
                                                        <div class="registration_form_control">
                                                            <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Sports File</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                                               <span>
                                                                    <input type="text" readonly="readonly" value="<?php echo $data[0]['SportsFile'];?>" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Institution Last Studied">
                                                                </span> 
                                                            </label>
                                                        </div>
                                                        <?php } ?>
                                                        
                                                       <div class="wpcf7-response-output wpcf7-display-none">
                                                       <br></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                                                               
                                        <div class="col-md-2"></div>
                                    </div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="background:#ffeaf4;border: 1px solid #f24395;">
         
         <div id="xconfrimation_text" style="font-size:15px;text-align:center"></div>  
      </div>
    </div>
  </div>
</div>
<script>
function ConfirmationforWaiting(){
    var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to add waiting list?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Remarks</td>'
                            +'<td><textarea name="Remarks" id="Remarks" placeholder="Remarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"></textarea><div id="ErrRemarks" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'                                                                 
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doWeighting()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;background:#f24395">Yes, Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function doWeighting(){
    $('#WeightingRemarks').val($('#Remarks').val());
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
  
    $("#xconfrimation_text").html(loading);
        
        $.post( "../webservice.php?action=WeighingFirstYearForm",  $( "#FirstYearForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data);                                                                   
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='assets/accessdenied.png' style='width:128px'><br>Failed.<br>"+obj.message;
                  html += '<br><button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>';
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br>";
                html += '<br><a href="viewfirstyear.php?id='+obj.id+'" class="btn btn-outline" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;color: #f24395;">Continue</a></div>';
            }
            $("#xconfrimation_text").html(html);
        });
    }
function ConfirmationforApprove(){
    var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to Approve?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Remarks</td>'
                            +'<td><textarea name="Remarks" id="Remarks" placeholder="Remarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"></textarea><div id="ErrRemarks" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'                                                                 
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doApprove()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;background:#f24395">Yes, Confirm to Approve</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function doApprove(){
    $('#ApproveRemarks').val($('#Remarks').val());
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
  
    $("#xconfrimation_text").html(loading);
        
        $.post( "../webservice.php?action=ApproveFirstYearForm",  $( "#FirstYearForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='assets/accessdenied.png' style='width:128px'><br>Failed.<br>"+obj.message;
                  html += '<br><button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>';
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br>";
                html += '<br><a href="viewfirstyear.php?id='+obj.id+'" class="btn btn-outline" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;color: #f24395;">Continue</a></div>';
            }
            $("#xconfrimation_text").html(html);
        });
    }
function ConfirmationforReject(){
    var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to Reject?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Remarks</td>'
                            +'<td><textarea name="Remarks" id="Remarks" placeholder="Remarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"></textarea><div id="ErrRemarks" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'                                                                 
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doReject()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;background:#f24395">Yes, Confirm to Reject</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function doReject(){
    $('#RejectRemarks').val($('#Remarks').val());
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
  
    $("#xconfrimation_text").html(loading);
        
        $.post( "../webservice.php?action=RejectFirstYearForm",  $( "#FirstYearForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='assets/accessdenied.png' style='width:128px'><br>Failed.<br>"+obj.message;
                  html += '<br><button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>';
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br>";
                html += '<br><a href="viewfirstyear.php?id='+obj.id+'" class="btn btn-outline" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;color: #f24395;">Continue</a></div>';
            }
            $("#xconfrimation_text").html(html);
        });
    }
</script>
<?php include_once("footer.php");?> 
