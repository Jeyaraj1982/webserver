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
    <div style="text-align: right" id="">
        <a href="<?php echo GetUrl("Member/".$_GET['MCode']."/ViewDraftProfile/".$_GET['Code'].".htm ");?>"  class="btn btn-primary" name="Preview" style="font-family:roboto">Preview Profile</a>&nbsp;
        <a href="javascript:void(0)" onclick="showConfirmPublish('<?php echo $_GET['Code'];?>')" class="btn btn-success" name="Publish" style="font-family:roboto">Submit Review</a>
		<a href="javascript:void(0)" onclick="showConfirmDelete('<?php echo $_GET['Code'];?>')" class="btn btn-danger" name="Delete" style="font-family:roboto">Delete Profile</a>
	 </div>    
        
        
        <div class="modal" id="PubplishNow" data-backdrop="static" >
            <div class="modal-dialog" >
                <div class="modal-content" id="Publish_body"  style="max-height: 300px;min-height: 300px;" >
            
                </div>
            </div>
        </div>

<script>
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
									+'<h4 class="modal-title">Submit profile to publish</h4>'
									+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
								+'</div>'
								+'<div class="modal-body">'
									+'<div style="text-align:left"> Dear ,<br></div>'
									+'<div style="text-align:left">You have selected to "Submit Profile", In this action, your details will send to our Document Authentication Team (DAT), the team will check your profile informaiton and approve. Once DAT approved your profile, it will publish immediately. So requested, please verify all given data before submit.<br><br>'
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
		$.post(API_URL + "m=Franchisee&a=SendOtpForProfileforPublish",param,function(result) {
			
			if (!(isJson(result))) {
				$('#Publish_body').html(result);
				return ;
			}
			var obj = JSON.parse(result);
			if (obj.status=="success") {
				$('#Publish_body').html(result);
			} else {
				var data = obj.data; 
				var content = '<div  style="height: 300px;">'                                                                              
								+'<div class="modal-header">'
									+'<h4 class="modal-title">Submit profile for verify</h4>'
									+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
								+'</div>'
								+'<div class="modal-body" style="min-height:175px;max-height:175px;">'
									+ '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/exclamationmark.jpg" width="10%"><p>'
                                        + '<h5 style="text-align:center;color:#ada9a9">' + obj.message+'</h5>'
								+'</div>' 
								+'<div class="modal-footer">'  
									+'<a class="btn btn-primary" href="'+AppUrl+'Member/'+data.MemberCode+'/ProfileEdit/'+data.EditPage+'/'+data.ProfileCode+'.htm" style="cursor:pointer">continue</a>'
								+'</div>'
							+'</div>';
            $('#Publish_body').html(content);
			
			 
			}
		});
}
function ProfilePublishOTPVerification(frmid) {
        var param = $( "#"+frmid).serialize();
        $('#Publish_body').html(preloading_withText("Submitting profile ...","95"));
        $.post( API_URL + "m=Franchisee&a=ProfilePublishOTPVerification",param).done(function(result) {
			if (!(isJson(result))) {
				$('#Publish_body').html(result);
				return ;
			}
			var obj = JSON.parse(result);
			if (obj.status=="success") {
				
				var data = obj.data; 
				var content = '<div  style="height: 300px;">'                                                                              
								+'<div class="modal-body" style="min-height:175px;max-height:175px;">'
									+ '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/verifiedtickicon.jpg" width="100px"></p>'
									+ '<h3 style="text-align:center;">Submission Successful</h3>'
                                    + '<h5 style="text-align:center;color:#ada9a9">' + obj.message+'</h5>'
									+ '<p style="text-align:center;"><a href="'+AppUrl+'" style="cursor:pointer">Continue</a></p>'
								+'</div>' 
							+'</div>';
            $('#Publish_body').html(content);
			
			 
			}
            
    });
}
function ResendSendOtpForProfileforPublish(frmid) {
     var param = $("#"+frmid).serialize();
    $('#Publish_body').html(preloading_withText("Submitting profile ...","95"));
	
        $.post(API_URL + "m=Franchisee&a=ResendSendOtpForProfileforPublish",param,function(result2) {$('#Publish_body').html(result2);});
}
function showConfirmDelete(ProfileID) {
      $('#PubplishNow').modal('show'); 
      var content = '<div>'
						+'<form method="post" id="frm_'+ProfileID+'" name="frm_'+ProfileID+'" action="" >'
						+'<input type="hidden" value="'+ProfileID+'" name="ProfileID">'
							+'<div class="modal-header">'
								+'<h4 class="modal-title">Delete Profile</h4>'
								+'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
							+'</div>'
							+'<div class="modal-body">'
								+'<div style="text-align:left"> Dear ,<br></div>'
								+'<div style="text-align:left">Are you sure want to delete?<br><br><br><br><br><br></div>'
							+'</div>'
							+'<div class="modal-footer">'  
								+'<button type="button" class="btn btn-primary" name="Delete" id="Delete"  onclick="DeleteProfile(\''+ProfileID+'\')" style="font-family:roboto">Yes</button>&nbsp;&nbsp;&nbsp;'
								+'<a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>'
							+'</div>'
						+'</form>'                                                                                                          
					+'</div>';
				$('#Publish_body').html(content);
}
function DeleteProfile(frmid) {
     var param = $("#"+frmid).serialize();
     $('#Publish_body').html(preloading_withText("Deleting profile ...","95"));
        $.post(API_URL + "m=Member&a=DeleteProfile",param,function(result2) {
			$('#Publish_body').html(result2);
		});
} 
</script>
 