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
        <a href="<?php echo GetUrl("MyProfiles/Publish/View/".$_GET['Code'].".htm ");?>" class="btn btn-primary" name="Preview" style="font-family:roboto">Preview</a>&nbsp;
        <a href="javascript:void(0)" onclick="showConfirmPublish('<?php echo $_GET['Code'];?>')" class="btn btn-success" name="Publish" style="font-family:roboto">Publish Now</a>
     </div>    
        
        
        <div class="modal" id="PubplishNow" data-backdrop="static" style="padding-top:177px;padding-right:0px;background:rgba(9, 9, 9, 0.13) none repeat scroll 0% 0%;">
            <div class="modal-dialog" style="width: 367px;">
                <div class="modal-content" id="Publish_body" style="height:315px">
            
                </div>
            </div>
        </div>
                                                                                                                       
<script>                                                                                                                              

/* CheckUploadAllDeatils(\''+ProfileID+'\')*/


function showConfirmPublish(ProfileID) {
      $('#PubplishNow').modal('show'); 
      var content = '<div class="Publish_body" style="padding:20px">'
                    +   '<div  style="height: 315px;">'                                                                              
                    +  '<form method="post" id="frm_'+ProfileID+'" name="frm_'+ProfileID+'" action="" >'
                     + '<input type="hidden" value="'+ProfileID+'" name="ProfileID">'
                          + '<button type="button" class="close" data-dismiss="modal">&times;</button>'
                        + '<h4 class="modal-title">Profile Publish</h4> <br>'
                        +'<div style="text-align:left"> Dear ,<br>'
                        +'<div style="text-align:left">You have selected to "Publish Now", In this action, your details will send to our Document Authentication Team (DAT). DAT has approved your profile, the profile will pubhlish immediately, so please verify all data before publish.<br><br>'
                        + '<input type="checkbox" name="check" id="agreetopublish" onclick="agreeToPublish();" value="1">&nbsp;<label for="check" style="font-weight:normal"> I agree the terms and conditions  </label><br><br>'
                        +  '<button type="button" disabled="disabled" class="btn btn-primary" name="Publish" id="PublishBtn"  onclick="SendOtpForProfileforPublish(\''+ProfileID+'\')" style="font-family:roboto">Yes, send request</button>&nbsp;&nbsp;&nbsp;'
                        +  '<a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>'
                       +  '</div><br>'
                    +  '</form>'                                                                                                          
                +  '</div>'
            +  '</div>';
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
     $('#Publish_body').html(preloader);
        $.post(API_URL + "m=Member&a=SendOtpForProfileforPublish",param,function(result2) {$('#Publish_body').html(result2);});
}

function ProfilePublishOTPVerification(frmid) {
         var param = $( "#"+frmid).serialize();
         $('#Publish_body').html(preloader);
                    $.post( API_URL + "m=Member&a=ProfilePublishOTPVerification", 
                            param,
                            function(result2) {
                                $('#Publish_body').html(result2);   
                            }
                    );
              
    }
    
function ResendSendOtpForProfileforPublish(frmid) {
     var param = $("#"+frmid).serialize();
     $('#Publish_body').html(preloader);
        $.post(API_URL + "m=Member&a=ResendSendOtpForProfileforPublish",param,function(result2) {$('#Publish_body').html(result2);});
} 

</script>
   
                                                                 
