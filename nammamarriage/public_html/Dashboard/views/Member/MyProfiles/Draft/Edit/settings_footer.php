              </div>
            </div>                               
          </div>
        </div>
      </div>
   </div>
  </div>
  <?php
   /* if (isset($_POST['Publish'])) {
        
        $response = $webservice->getData("Member","MemberProfilePublishNow",$_POST);
        if ($response['status']=="success") {
             $successmessage = $response['message']; 
        } else {
            $errormessage = $response['message']; 
        }
    } */
    ?>
    <div style="text-align: right">
        <a href="<?php echo GetUrl("MyProfiles/Draft/View/".$_GET['Code'].".htm ");?>" class="btn btn-primary" name="Preview" style="font-family:roboto">Preview Profile</a>&nbsp;
        <a href="javascript:void(0)" onclick="showConfirmPublish('<?php echo $_GET['Code'];?>')" class="btn btn-success" name="Publish" style="font-family:roboto">Submit to review</a>&nbsp;
		<a href="javascript:void(0)" onclick="showConfirmDelete('<?php echo $_GET['Code'];?>')" class="btn btn-danger" name="Delete" style="font-family:roboto">Delete Profile</a>
	</div>    
        
        
        <div class="modal" id="PubplishNow" data-backdrop="static" >
            <div class="modal-dialog" >
                <div class="modal-content" id="Publish_body"  style="max-height: 400px;min-height: 400px;" >
            
                </div>
            </div>
        </div>
		<div class="modal" id="DeleteNow" data-backdrop="static" >
            <div class="modal-dialog" >
                <div class="modal-content" id="Delete_body"  style="max-height: 529px;min-height: 529px;" >
            
                </div>
            </div>
        </div>
 <form method="post" id="frmfrDelete" >
			<textarea style="display:none;" name="DeleteRemarks_DraftProfile" id="DeleteRemarks_DraftProfile_1"></textarea>
			<input type="hidden" name="ProfileCode" id="ProfileCode" value="<?php echo $_GET['Code'];?>" >
            <input type="hidden" name="DeleteOtp" id="DeleteOtp_1" value="" >
			<input type="hidden" name="reqId" id="SequrityCode_1" value="" >
		</form>                                                                                                                      
<script>                                                                                                                              

/* CheckUploadAllDeatils(\''+ProfileID+'\')*/

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function showConfirmPublish(ProfileID) {
      $('#PubplishNow').modal('show'); 
      var content = '<div >'
						+'<div>'                                                                              
							+'<form method="post" id="frm_'+ProfileID+'" name="frm_'+ProfileID+'" action="" >'
								+'<input type="hidden" value="'+ProfileID+'" name="ProfileID">'
								+'<div class="modal-header">'
									+'<h4 class="modal-title">Submit to review</h4>'
									+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
								+'</div>'
								+'<div class="modal-body" style="max-height: 273px;min-height: 273px;">'
									+'<div style="text-align:left"> Dear ,<br></div>'
									+'<div style="text-align:left">You have selected to "Submit to review", In this action, your details will send to our Document Authentication Team (DAT), the team will review your profile informaiton and approve. Once DAT approved your profile, it will publish immediately. So requested, please verify all given data before submit to review.<br><br>'
									+'<div class="custom-control custom-checkbox">'
										+'<input type="checkbox" class="custom-control-input" id="agreetopublish" name="check" onclick="agreeToPublish();" value="1">'
										+'<label class="custom-control-label" for="agreetopublish" style="font-weight:normal;margin-top:3px">&nbsp;I agree the terms of conditions</label>'
									+'</div>'
									+'</div>'
								+'</div>' 
								+'<div class="modal-footer">'  
									+'<button type="button" disabled="disabled" class="btn btn-primary" name="Publish" id="PublishBtn"  onclick="SendOtpForProfileforPublish(\''+ProfileID+'\')" style="font-family:roboto">Yes, send request</button>&nbsp;&nbsp;&nbsp;'
									+'<a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>'
								+'</div>'
							+'</form>'                                                                                                          
						+'</div>'
					+'</div>';
            $('#Publish_body').html(content);
}

function agreeToPublish() {
    
    if($("#agreetopublish").prop("checked") == true){ 
        $('#PublishBtn').removeAttr("Disabled");
    }
    
    if($("#agreetopublish").prop("checked") == false){
        $('#PublishBtn').attr("Disabled","Disabled");
    }
}

	function SendOtpForProfileforPublish(formid) {
    var param = $("#frm_"+formid).serialize();
	$('#Publish_body').html(preloading_withText("Submitting profile ...","95"));
		$.post(getAppUrl() + "m=Member&a=SendOtpForProfileforPublish",param,function(result) {
			
			if (!(isJson(result))) {
				$('#Publish_body').html(result);
				return ;
			}
			var obj = JSON.parse(result);
			if (obj.status=="success") {
				var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                   if(data.resend>=3){
                       var resedlink = '';
                   } else {
                    var resedlink = '<h5 style="color:#ada9a9"><a onclick="ResendSendOtpForProfileforPublish(\''+randString+'\')" style="cursor: pointer;color: #1694b5;">&nbsp;Re-Send</a></h5>';
                   }
                 var content = '<div id="otpfrm">'
                                + '<form method="POST" id="'+randString+'" name="'+randString+'">'
                                + '<input type="hidden" value="'+data.securitycode+'" name="reqId">'
                                + '<input type="hidden" value="'+data.ProfileID+'" name="ProfileID">'
                                    +'<div class="modal-header">'
                                        + '<h4 class="modal-title">Submit to verify</h4>'
                                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                                    +'</div>'
                                    + '<div class="modal-body">'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12">We just sent your authentication code via email to '+data.EmailID+' &amp; sms to '+data.MobileNumber+'</div>'
                                         +'</div><br>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12"><input type="text"  class="form-control" id="PublishOtp" maxlength="4" name="PublishOtp" style="font-weight: bold;font-size: 22px;text-align: center;letter-spacing: 10px;font-family:Roboto;"></div>'
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center;color:red" id="frmPublishOtp_error"></div>' 
                                         +'</div>'            
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center"><button type="button" onclick="ProfilePublishOTPVerification(\''+randString+'\')" class="btn btn-primary" style="width:100%">Verify</button></div>'
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center">'+resedlink+'</div>' 
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center"><h5 style="text-align:center;color:#ada9a9"><a data-dismiss="modal" style="cursor:pointer">I will do later</a></h5></div>' 
                                         '</div>'
                                   +'</div>'
                           +' </form>'                                                                                                       
                        +'</div>';
                 $('#Publish_body').html(content);
			} else {
				var data = obj.data; 
				var content = '<div  style="height: 300px;">'                                                                              
								+'<div class="modal-header">'
									+'<h4 class="modal-title">Submit to review</h4>'
									+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
								+'</div>'
								+'<div class="modal-body" style="min-height:175px;max-height:175px;">'
									+ '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/exclamationmark.jpg" width="10%"><p>'
                                        + '<h5 style="text-align:center;color:#ada9a9">' + obj.message+'</h5>'
								+'</div>' 
								+'<div class="modal-footer">'  
									+'<a class="btn btn-primary"  href="'+AppUrl+'MyProfiles/Draft/Edit/'+data.EditPage+'/'+data.ProfileCode+'.htm" style="cursor:pointer">continue</a>'
								+'</div>'
							+'</div>';
            $('#Publish_body').html(content);
			
			 
			}
		});
}

    function ProfilePublishOTPVerification(frmid) {  
        if ($("#PublishOtp").val().trim()=="") {
             $("#frmPublishOtp_error").html("Please verification code");
             return false;
         }
        var param = $( "#"+frmid).serialize();
        $('#Publish_body').html(preloading_withText("Submitting profile ...","95"));
        $.post( getAppUrl() + "m=Member&a=ProfilePublishOTPVerification",param).done(function(result) {
			if (!(isJson(result))) {
				$('#Publish_body').html(result);
				return ;
			}
			var obj = JSON.parse(result);
			if (obj.status=="success") {   
				var data = obj.data; 
				var content = '<div  style="height: 300px;">'                                                                              
								+'<div class="modal-body" style="min-height:175px;max-height:175px;">'
									+ '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/success_icon.png" width="100px"></p>'
									+ '<h3 style="text-align:center;">Thank You for submitted to<br>review!</h3>'
                                    + '<h5 style="text-align:center;color:#ada9a9">' +obj.message+'</h5><br>'
									+ '<p style="text-align:center;"><a href="'+AppUrl+'" style="cursor:pointer">Continue</a></p>'
								+'</div>' 
							+'</div>';
            $('#Publish_body').html(content);
			}else {
                var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                    if(data.resend>=3){
                       var resedlink = '';
                   } else {
                    var resedlink = '<h5 style="color:#ada9a9"><a onclick="ResendSendOtpForProfileforPublish(\''+randString+'\')" style="cursor: pointer;color: #1694b5;">&nbsp;Re-Send</a></h5>';
                   }
                 var content = '<div id="otpfrm">'
                                + '<form method="POST" id="'+randString+'" name="'+randString+'">'
                                + '<input type="hidden" value="'+data.securitycode+'" name="reqId">'
                                + '<input type="hidden" value="'+data.ProfileID+'" name="ProfileID">'
                                    +'<div class="modal-header">'
                                        + '<h4 class="modal-title">Submit to verify</h4>'
                                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                                    +'</div>'
                                    + '<div class="modal-body">'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12">We just sent your authentication code via email to '+data.EmailID+' &amp; sms to '+data.MobileNumber+'</div>'
                                         +'</div><br>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12"><input type="text"  class="form-control" id="PublishOtp" maxlength="4" name="PublishOtp" style="font-weight: bold;font-size: 22px;text-align: center;letter-spacing: 10px;font-family:Roboto;"></div>'
                                         +'</div>' 
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center;color:red" id="frmPublishOtp_error">'+obj.message+'</div>' 
                                         +'</div>'           
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center"><button type="button" onclick="ProfilePublishOTPVerification(\''+randString+'\')" class="btn btn-primary" style="width:100%">Verify</button></div>'
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center">'+resedlink+'</div>' 
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center"><h5 style="text-align:center;color:#ada9a9"><a data-dismiss="modal" style="cursor:pointer">I will do later</a></h5></div>' 
                                         '</div>'
                                   +'</div>'
                           +' </form>'                                                                                                       
                        +'</div>';
                 $('#Publish_body').html(content);
            }
            
            
    });
}                           

function ResendSendOtpForProfileforPublish(frmid) {
    var param = $("#"+frmid).serialize();
    $('#Publish_body').html(preloading_withText("Submitting profile ...","95"));
        $.post(getAppUrl() + "m=Member&a=ResendSendOtpForProfileforPublish",param,function(result) {
            
             if (!(isJson(result))) {
                $('#Publish_body').html(result);
                return ;                                                                   
            }
            var obj = JSON.parse(result);
            if (obj.status=="success") {
                 var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                    if(data.resend>=3){
                       var resedlink = '';
                   } else {
                    var resedlink = '<h5 style="color:#ada9a9"><a onclick="ResendSendOtpForProfileforPublish(\''+randString+'\')" style="cursor: pointer;color: #1694b5;">&nbsp;Re-Send</a></h5>';
                   }
                 var content = '<div id="otpfrm">'
                                + '<form method="POST" id="'+randString+'" name="'+randString+'">'
                                + '<input type="hidden" value="'+data.securitycode+'" name="reqId">'
                                + '<input type="hidden" value="'+data.ProfileID+'" name="ProfileID">'
                                    +'<div class="modal-header">'
                                        + '<h4 class="modal-title">Submit to verify</h4>'
                                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                                    +'</div>'
                                    + '<div class="modal-body">'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12">We just sent your authentication code via email to '+data.EmailID+' &amp; sms to '+data.MobileNumber+'</div>'
                                         +'</div><br>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12"><input type="text"  class="form-control" id="PublishOtp" maxlength="4" name="PublishOtp" style="font-weight: bold;font-size: 22px;text-align: center;letter-spacing: 10px;font-family:Roboto;"></div>'
                                         +'</div>' 
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center;color:red" id="frmPublishOtp_error"></div>' 
                                         +'</div>'           
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center"><button type="button" onclick="ProfilePublishOTPVerification(\''+randString+'\')" class="btn btn-primary" style="width:100%">Verify</button></div>'
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center">'+resedlink+'</div>' 
                                         +'</div>'
                                         +'<div class="form-group row">'
                                            +'<div class="col-sm-12" style="text-align:center"><h5 style="text-align:center;color:#ada9a9"><a data-dismiss="modal" style="cursor:pointer">I will do later</a></h5></div>' 
                                         '</div>'
                                   +'</div>'
                           +' </form>'                                                                                                       
                        +'</div>';
                 $('#Publish_body').html(content);
        }
        });
}
function showConfirmDelete(ProfileID) {
      $('#DeleteNow').modal('show'); 
      var content = '<div>'
						+'<form method="post" id="frm_'+ProfileID+'" name="frm_'+ProfileID+'" action="" >'
						+'<input type="hidden" value="'+ProfileID+'" name="ProfileID">'
							+'<div class="modal-header">'
								+'<h4 class="modal-title">Delete Profile</h4>'
								+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
							+'</div>'
							+ '<div class="modal-body" style="max-height: 406px;min-height: 406px;">'
								+ '<div class="form-group row" style="margin:0px;">'
									+ '<div class="col-sm-4">'
										+ '<img src="'+AppUrl+'assets/images/icons/confirmation_profile.png" width="128px">' 
									+ '</div>'
									+ '<div class="col-sm-8">'
										+ '<div class="form-group row">'
											+'<div class="col-sm-12">Are you sure want to delete</div>'
										+ '</div>'
										+ 'Remarks<br>'
										+ '<textarea class="form-control" rows="2" cols="3" id="DeleteRemarks_DraftProfile"></textarea>'
										+'<div class="col-sm-12" id="frmDeleteRemarks_DraftProfile_error" style="color:red;text-align:center"></div>'
									+ '</div>'
								+ '</div>'                    
							+ '</div>' 
							+'<div class="modal-footer">'  
								+'<a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>&nbsp;&nbsp;&nbsp;'
								+'<button type="button" class="btn btn-primary" name="Delete" id="Delete"  onclick="SendOtpForProfileDelete(\''+ProfileID+'\')" style="font-family:roboto">Yes</button>'
							+'</div>'
						+'</form>'                                                                                                          
					+'</div>';
				$('#Delete_body').html(content);
}
function SendOtpForProfileDelete(formid) {
	if ($("#DeleteRemarks_DraftProfile").val().trim()=="") {
             $("#frmDeleteRemarks_DraftProfile_error").html("Please enter reason");
             return false;
         }
	  $("#DeleteRemarks_DraftProfile_1").val($("#DeleteRemarks_DraftProfile").val());
    var param = $("#frmfrDelete").serialize();
	
	$('#Delete_body').html(preloading_withText("Deleting profile ...","199"));
		$.post(getAppUrl() + "m=Member&a=SendOtpForProfileDelete",param,function(result) {
			
			if (!(isJson(result))) {
				$('#Delete_body').html(result);
				return ;
			}
			var obj = JSON.parse(result);
			if (obj.status=="success") {
                var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                 var content = '<div id="otpfrm">'
                                + '<form method="POST" id="'+randString+'" name="'+randString+'">'
                                + '<input type="hidden" value="'+data.securitycode+'" name="reqId" id="reqId">'
                                + '<input type="hidden" value="'+data.ProfileCode+'" name="ProfileID">'
                                    +'<div class="modal-header">'
                                        + '<h4 class="modal-title">Delete Profile</h4>'
                                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                                    +'</div>'
                                    +'<div class="modal-body">'
                                        +'<p style="text-align:center;"><img src="'+AppUrl+'assets/images/email_verification.png"></p>'
                                        +'<h5 style="text-align:center;color:#ada9a9">We have sent a 4 digit verification code to<br><h4 style="text-align:center;color:#ada9a9;font-size: 15px;">'+data.EmailID+' & '+data.MobileNumber+'</h4>'
                                        +'<div class="form-group">'
                                            +'<div class="input-group">'
                                                +'<div class="col-sm-12">'
                                                    +'<div class="col-sm-3"></div>'
                                                    +'<div class="col-sm-4"><input type="text"  class="form-control" id="DeleteOtp" maxlength="4" name="DeleteOtp" style="width: 126%;font-weight: bold;font-size: 22px;text-align: center;letter-spacing: 10px;font-family:Roboto;"></div>'
                                                    +'<div class="col-sm-2"><button type="button" onclick="ProfileDeleteOTPVerification(\''+randString+'\')" class="btn btn-primary" name="btnVerify" id="verifybtn">Verify</button></div>'
                                                    +'<div class="col-sm-3"></div>'
                                                +'</div>'                                                            
                                                +'<div class="col-sm-12" style="text-align:center;color:red" id="Error_delete_otp"></div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    +'<h5 style="text-align:center;color:#ada9a9">Did not receive the verification code?<a onclick="ResendSendOtpForProfileDelete(\''+randString+'\')" style="cursor: pointer;color: #1694b5;">&nbsp;Resend</a></h5> '
                                +'</form>'                                                                                                       
                            +'</div>';
				$('#Delete_body').html(content);
			} else {
				var data = obj.data; 
				var content = '<div  style="height: 300px;">'                                                                              
								+'<div class="modal-header">'
									+'<h4 class="modal-title">Delete profile</h4>'
									+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
								+'</div>'
								+'<div class="modal-body" style="min-height:175px;max-height:175px;">'
									+ '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/exclamationmark.jpg" width="10%"><p>'
                                        + '<h5 style="text-align:center;color:#ada9a9">' + obj.message+'</h5>'
								+'</div>' 
								+'<div class="modal-footer">'  
									+'<a class="btn btn-primary"  href="'+AppUrl+'MyProfiles/Draft/Edit/'+data.EditPage+'/'+data.ProfileCode+'.htm" style="cursor:pointer">continue</a>'
								+'</div>'
							+'</div>';
            $('#Delete_body').html(content);
		}
		});
}
function ProfileDeleteOTPVerification(frmid) {
	$("#Error_delete_otp").html("&nbsp;");
		 if ($("#DeleteOtp").val().trim()=="") {
			 $("#Error_delete_otp").html("Please enter verification code");
			 return false;
		 }
         $("#DeleteOtp_1").val( $("#DeleteOtp").val());
		 $("#SequrityCode_1").val( $("#reqId").val());
        var param = $( "#frmfrDelete").serialize();
        $('#Delete_body').html(preloading_withText("Deleting profile ...","199"));
        $.post( getAppUrl() + "m=Member&a=ProfileDeleteOTPVerification",param).done(function(result) {
			if (!(isJson(result))) {
				$('#Delete_body').html(result);
				return ;
			}
			var obj = JSON.parse(result);
			if (obj.status=="success") {
				var data = obj.data; 
				var content = '<div  style="height: 300px;">'                                                                              
								+'<div class="modal-body" style="min-height:175px;max-height:175px;">'
									+ '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/verifiedtickicon.jpg" width="100px"></p>'
									+ '<h3 style="text-align:center;">Deleted Successful</h3>'
                                    + '<h5 style="text-align:center;color:#ada9a9">' +obj.message+'</h5>'
									+ '<p style="text-align:center;"><a href="'+AppUrl+'" style="cursor:pointer">Continue</a></p>'
								+'</div>' 
							+'</div>';
            $('#Delete_body').html(content);
			} else {
                var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                 var content = '<div id="otpfrm">'
                                + '<form method="POST" id="'+randString+'" name="'+randString+'">'
                                + '<input type="hidden" value="'+data.ProfileCode+'" name="ProfileCode" id="ProfileCode">'
                                + '<input type="hidden" value="'+data.securitycode+'" name="reqId" id="reqId">'
                                    +'<div class="modal-header">'
                                        + '<h4 class="modal-title">Delete Profile</h4>'
                                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                                    +'</div>'
                                    +'<div class="modal-body">'
                                        +'<p style="text-align:center;"><img src="'+AppUrl+'assets/images/email_verification.png"></p>'
                                        +'<h5 style="text-align:center;color:#ada9a9">We have sent a 4 digit verification code to<br><h4 style="text-align:center;color:#ada9a9;font-size: 15px;">'+data.EmailID+' & '+data.MobileNumber+'</h4>'
                                        +'<div class="form-group">'
                                            +'<div class="input-group">'
                                                +'<div class="col-sm-12">'
                                                    +'<div class="col-sm-3"></div>'
                                                    +'<div class="col-sm-4"><input type="text" value="'+data.DeleteOtp+'" class="form-control" id="DeleteOtp" maxlength="4" name="DeleteOtp" style="width: 126%;font-weight: bold;font-size: 22px;text-align: center;letter-spacing: 10px;font-family:Roboto;"></div>'
                                                    +'<div class="col-sm-2"><button type="button" onclick="ProfileDeleteOTPVerification(\''+randString+'\')" class="btn btn-primary" name="btnVerify" id="verifybtn">Verify</button></div>'
                                                    +'<div class="col-sm-3"></div>'
                                                +'</div>'                                                            
                                                +'<div class="col-sm-12" style="text-align:center;color:red" id="Error_delete_otp">'+obj.message+'</div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    +'<h5 style="text-align:center;color:#ada9a9">Did not receive the verification code?<a onclick="ResendSendOtpForProfileDelete(\''+randString+'\')" style="cursor: pointer;color: #1694b5;">&nbsp;Resend</a></h5> '
                                +'</form>'                                                                                                       
                            +'</div>';
                $('#Delete_body').html(content);
            }
            
    });
}
function ResendSendOtpForProfileDelete(frmid) {
   var param = $("#frmfrDelete_"+frmid).serialize();
    $('#Delete_body').html(preloading_withText("Deleting profile ...","199"));
        $.post(getAppUrl() + "m=Member&a=ResendSendOtpForProfileDelete",param,function(result) {
            
            if (!(isJson(result))) {
                $('#Delete_body').html(result);
                return ;
            }
            var obj = JSON.parse(result);
            if (obj.status=="success") {
                var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                 var content = '<div id="otpfrm">'
                                + '<form method="POST" id="'+randString+'" name="'+randString+'">'
                                + '<input type="hidden" value="'+data.securitycode+'" name="reqId" id="reqId">'
                                + '<input type="hidden" value="'+data.ProfileCode+'" name="ProfileCode" id="ProfileCode">'
                                    +'<div class="modal-header">'
                                        + '<h4 class="modal-title">Delete Profile</h4>'
                                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                                    +'</div>'
                                    +'<div class="modal-body">'
                                        +'<p style="text-align:center;"><img src="'+AppUrl+'assets/images/email_verification.png"></p>'
                                        +'<h5 style="text-align:center;color:#ada9a9">We have sent a 4 digit verification code to<br><h4 style="text-align:center;color:#ada9a9;font-size: 15px;">'+data.EmailID+' & '+data.MobileNumber+'</h4>'
                                        +'<div class="form-group">'
                                            +'<div class="input-group">'
                                                +'<div class="col-sm-12">'
                                                    +'<div class="col-sm-3"></div>'
                                                    +'<div class="col-sm-4"><input type="text"  class="form-control" id="DeleteOtp" maxlength="4" name="DeleteOtp" style="width: 126%;font-weight: bold;font-size: 22px;text-align: center;letter-spacing: 10px;font-family:Roboto;"></div>'
                                                    +'<div class="col-sm-2"><button type="button" onclick="ProfileDeleteOTPVerification(\''+randString+'\')" class="btn btn-primary" name="btnVerify" id="verifybtn">Verify</button></div>'
                                                    +'<div class="col-sm-3"></div>'
                                                +'</div>'                                                            
                                                +'<div class="col-sm-12" style="text-align:center;color:red" id="Error_delete_otp"></div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    +'<h5 style="text-align:center;color:#ada9a9">Did not receive the verification code?<a onclick="ResendSendOtpForProfileDelete(\''+randString+'\')" style="cursor: pointer;color: #1694b5;">&nbsp;Resend</a></h5> '
                                +'</form>'                                                                                                       
                            +'</div>';
                $('#Delete_body').html(content);
            } else {
                var data = obj.data; 
                var content = '<div  style="height: 300px;">'                                                                              
                                +'<div class="modal-header">'
                                    +'<h4 class="modal-title">Delete profile</h4>'
                                    +'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
                                +'</div>'
                                +'<div class="modal-body" style="min-height:175px;max-height:175px;">'
                                    + '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/exclamationmark.jpg" width="10%"><p>'
                                        + '<h5 style="text-align:center;color:#ada9a9">' + obj.message+'</h5>'
                                +'</div>' 
                                +'<div class="modal-footer">'  
                                    +'<a class="btn btn-primary"  href="'+AppUrl+'MyProfiles/Draft/Edit/'+data.EditPage+'/'+data.ProfileCode+'.htm" style="cursor:pointer">continue</a>'
                                +'</div>'
                            +'</div>';
            $('#Delete_body').html(content);
        }
        });
}

</script>
   
                                                                 
