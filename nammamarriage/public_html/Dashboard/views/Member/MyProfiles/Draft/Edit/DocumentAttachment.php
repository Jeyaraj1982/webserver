<?php
    $page="DocumentAttachment";       
    $response = $webservice->GetDraftProfileInformation(array("ProfileCode"=>$_GET['Code'])); 
   ?>
<?php include_once("settings_header.php");?>
<style>
.photoview {
    float: left;
    margin-right: 10px;
    text-align: center;
    border: 1px solid #eaeaea;
    height: 253px;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
}
.photoview:hover{
    border:1px solid #9b9a9a;
}
</style>
<div class="col-sm-10 rightwidget">
<script>
$(document).ready(function () {
    $("#Documents").change(function() {
            if ($("#Documents").val()=="0") {
                $("#ErrDocuments").html("Please select Documents");  
            }else{
                $("#ErrDocuments").html("");  
            }
    });
    $("#File").change(function() {
            if ($("#File").val()=="") {
                $("#ErrFile").html("Please select File");  
            }else{
                $("#ErrFile").html("");  
            }
    });
    $("#check").change(function() {
            if (document.form1.check.checked == false) {
                $("#Errcheck").html("Please read the instruction");  
            }else{
                $("#Errcheck").html("");  
            }
    });
});
function submitUpload() {
            $('#ErrDocuments').html("");  
            $('#ErrFile').html("");  
            $('#Errcheck').html("");
            
            ErrorCount==0
            if ($("#Documents").val()=="0") {
                $("#ErrDocuments").html("Please select the Document Type");
                return false;
            }
            if ($("#File").val()=="") {
                $("#ErrFile").html("Please select the Document");
                return false;
            }
            if (document.form1.check.checked == false) {
                $("#Errcheck").html("Please read the instruction");
                return false;
            }
            if (ErrorCount==0) {
                
                            return true;
                        } else{
                            return false;
                        }

        }
</script>
<form method="post" onsubmit="return submitUpload()" name="form1" id="form1" action="" enctype="multipart/form-data"> 
<input type="hidden" value='<?php echo $_GET['Code'];?>' name="Code">  
    <h4 class="card-title">Document Attachments
    <span style="float:right;color:green">For administrator purpose only</span><br><span style="float:right;color:grey;font-size:12px">Not show to members or others</span></h4>
    
 
    
    <?php
                if (isset($_POST['BtnSave'])) {
                    
                    $target_dir = "uploads/";
					if (!is_dir('uploads/profiles/'.$_GET['Code'].'/kycdoc')) {
						mkdir('uploads/profiles/'.$_GET['Code'].'/kycdoc', 0777, true);
					}
                    $err=0;
                    $_POST['File']= "";
                    $acceptable = array('image/jpeg',
                                        'image/jpg',
                                        'image/png'
                                    );
                     
                  if(($_FILES['File']['size'] >= 5000000) || ($_FILES["File"]["size"] == 0)) {
                    $err++;
                           echo "Please upload file. File must be less than 5 megabytes.";
                    }
                            
                    if((!in_array($_FILES['File']['type'], $acceptable)) && (!empty($_FILES["File"]["type"]))) {
                        $err++;
                           echo "Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                    }

                    
                    if (isset($_FILES["File"]["name"]) && strlen(trim($_FILES["File"]["name"]))>0 ) {
                        $profilephoto = time().$_FILES["File"]["name"];
                        if (!(move_uploaded_file($_FILES["File"]["tmp_name"], 'uploads/profiles/'.$_GET['Code'].'/kycdoc/' . $profilephoto))) {
                           $err++;
                           echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    
                    if ($err==0) {
                        $_POST['File']= $profilephoto;
                        $res =$webservice->getData("Member","AttachDocuments",$_POST);
                        echo  ($res['status']=="success") ? $dashboard->showSuccessMsg($res['message'])
                                                           : $dashboard->showErrorMsg($res['message']);
                    } else {
                        $res =$webservice->getData("Member","AttachDocuments");
                    }
                } else {
                     $res =$webservice->getData("Member","AttachDocuments");
                     
                }
                $DocumentPhoto = $res['data'];
              
            ?>
   <div id="Attachdetails" style="padding-top:20px"> 
    <span style="color:#555">We have implemented certain measures for the safety of our members. registered members must have update      a copy of any specified government issued identity proof to add credibility to their profiles. </span><br><Br><br>
    <div class="form-group row">
        <label for="Documents" class="col-sm-2 col-form-label">Document Type<span id="star">*</span></label>
        <div class="col-sm-4">
            <select class="selectpicker form-control" data-live-search="true" id="Documents" name="Documents">
                <option value="0">Choose Documents</option>
                <?php foreach($response['data']['DocumentType'] as $Document) { ?>
                 <option value="<?php echo $Document['SoftCode'];?>" <?php echo ($_POST['Documents']==$Document['SoftCode']) ? " selected='selected' " : "";?>> <?php echo $Document['CodeValue'];?></option>
                    <?php } ?>
            </select>
            <span class="errorstring" id="ErrDocuments"></span>
        </div>
    </div>
    <div class="form-group row">
        <label for="Attachment" class="col-sm-2 col-form-label">Attachment<span id="star">*</span></label>
        <div class="col-sm-9">
            <input type="File" id="File" name="File" Placeholder="File">
            <span style="color:#888">supports png, jpg, jpeg and pdf & File size Lessthan 5 MB </span><br>
            <span class="errorstring" id="ErrFile"></span>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <span style="color:#ff6b6b;;">We do not share your documents with any 3rd party except local law enforcement agencies, if required.</span>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-9">
           <?php echo $errormessage;?><?php echo $successmessage;?>
        </div>
    </div>
    <div class="form-group row">                                                                                                                                                
        <div class="col-sm-12">
			<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="check" name="check">
					<label class="custom-control-label" for="check" style="vertical-align: middle;"> I read the instructions  </label>&nbsp;&nbsp;<a href="javascript:void(0)"  onclick="showLearnMore()">Learn more</a>
			</div>
			<span class="errorstring" id="Errcheck"></span>
		</div>
	</div>
    <div class="form-group row" style="margin-bottom:0px;">
        <div class="col-sm-3">
			<input type="submit" name="BtnSave" id="BtnSave" style="display:none"  value="Go">
			<a href="javascript:void(0)" onclick="ConfirmAttachDocument()" class="btn btn-primary" style="font-family:roboto">Update</a>
        </div>
    </div>
      <br><br><br>
    </div>
  
    
    <div style="text-align: right;" id="x"></div>
    <br>
    </form>
    
<div>
    <?php if(sizeof($res['data'])==0){  ?>
         <div style="margin-right:10px;text-align: center;">
                 No Documents Found   
        </div>
   <?php }  else {       ?>
    <?php
        foreach($res['data'] as $d) { ?> 
        <div id="photoview_<?php echo $d['AttachmentID'];?>" class="photoview">
            <div style="text-align:right;height:22px;">
                <a href="javascript:void(0)" onclick="showConfirmDeleteAttachment('<?php  echo $d['AttachmentID'];?>','<?php echo $_GET['Code'];?>')" name="Delete" style="font-family:roboto"><button type="button" class="close" >&times;</button></a>    
            </div>
            <div><img src="<?php echo AppUrl;?>uploads/profiles/<?php echo $_GET['Code'];?>/kycdoc/<?php echo $d['AttachFileName'];?>" style="height:120px;"></div>
            <div>
            <br><?php echo $d['DocumentType'];?><br> 
                <?php if($d['IsVerified']==0){ echo "verification pending" ; } else { echo "Verified" ; }?>
                <br><?php echo PutDateTime($d['AttachedOn']);?>   
            </div>
        </div>
   
        <?php }   ?>
         <div style="clear:both"></div>
         <?php }?>
    </div>  
   <div class="form-group row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6" style="text-align: right;">
            <ul class="pager" style="float:right;">
                  <li><a href="../PhysicalInformation/<?php echo $_GET['Code'].".htm";?>">&#8249; Previous</a></li>
                  <li>&nbsp;</li>
                  <li><a href="../CommunicationDetails/<?php echo $_GET['Code'].".htm";?>">Next &#8250;</a></li>
            </ul>
        </div>
   </div> 
</div>
<div class="modal" id="LearnMore" data-backdrop="static" style="padding-top:177px;padding-right:0px;background:rgba(9, 9, 9, 0.13) none repeat scroll 0% 0%;">
            <div class="modal-dialog" style="width: 367px;">
                <div class="modal-content" id="LearnMore_body" style="height:300px">
            
                </div>
            </div>
        </div>
<div class="modal" id="Delete" role="dialog" data-backdrop="static" style="padding-top:177px;padding-right:0px;background:rgba(9, 9, 9, 0.13) none repeat scroll 0% 0%;">
            <div class="modal-dialog" style="width: 367px;">
                <div class="modal-content" id="model_body" style="height: 300px;">
            
                </div>
            </div>
        </div>
<script>
 var available = "<?php echo sizeof($res['data']);?>";
 $('#x').html( available + " out 2 documents");
                                                                                                               
function showLearnMore() {
      $('#LearnMore').modal('show'); 
      var content = '<div class="LearnMore_body" style="padding:20px">'
                    +   '<div  style="height:500px;">'
                       + '<button type="button" class="close" data-dismiss="modal">&times;</button>'
                        + '<h4 class="modal-title">Please follow the below instructions</h4><br>'
                            + '<ol> '
                                + '<li>The ID proof must have related to profile information </li>'
                                + '<li>The uploaded ID proofs are not displayed in public and it is purely for administrative purposes.</li>'
                                + '<li>ID proofs once uploaded cannot be edit or delete.</li>'
                                + '<li>If any changes. You should contact the admin for any updates to these documents with a valid reason.</li>'
                                + '</ol>'
                        +  '<button type="button" data-dismiss="modal" class="btn btn-primary">Close</button>'
                       +  '</div><br>'
                +  '</div>'
            $('#LearnMore_body').html(content);                                                   
}

	function ConfirmAttachDocument(){
        if(submitUpload()) {
            $('#PubplishNow').modal('show'); 
            var content ='<div class="modal-header">'
                                + '<h4 class="modal-title">Confirmation for Attach Document</h4>'
                                + '<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;"></button>'
                            + '</div>'
							+ '<div class="modal-body">'
                                + '<div class="form-group row" style="margin:0px;padding-top:10px;">'
                                    + '<div class="col-sm-4">'
                                        + '<img src="<?php echo ImageUrl;?>icons/confirmation_profile.png" width="128px">' 
                                    + '</div>'
                                    + '<div class="col-sm-8"><br>'
                                        + '<div class="form-group row">'
                                            +'<div class="col-sm-12">Are sure want to add this occupation details</div>'
                                        + '</div>'                                                     
                                    + '</div>'
                                +  '</div>'                    
                            + '</div>' 
                            + '<div class="modal-footer">'
                                + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                                + '<button type="button" class="btn btn-primary" class="btn btn-primary" onclick="AddDocument()" style="font-family:roboto">Save Occupation Details</button>'
                            + '</div>';                                                                                               
            $('#Publish_body').html(content);
      }  
    }
	
	function AddDocument() {
		$( "#BtnSave" ).trigger( "click" );
		 setTimeout(function(){$("#BtnSave").attr('disabled', 'disabled');},100);
	}


    function showConfirmDeleteAttachment(AttachmentID,ProfileID) {
        $('#Delete').modal('show'); 
        var content =  '<form method="post" id="form_'+AttachmentID+'" name="form_'+AttachmentID+'" > '
                         + '<input type="hidden" value="'+AttachmentID+'" name="AttachmentID">'
                         + '<input type="hidden" value="'+ProfileID+'" name="ProfileID">'
                            +'<div class="modal-header">'
                                + '<h4 class="modal-title">Confirmation For remove</h4>'
                                + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                            + '</div>'
                            + '<div class="modal-body">'
                                + '<div class="form-group row" style="margin:0px;padding-top:10px;">'
                                    + '<div class="col-sm-4">'
                                        + '<img src="<?php echo ImageUrl;?>icons/confirmation_profile.png" width="128px">' 
                                    + '</div>'
                                    + '<div class="col-sm-8"><br>'
                                        + '<div class="form-group row">'
                                            +'<div class="col-sm-12">Are you sure want to Delete?</div>'
                                        + '</div>'
                                    + '</div>'
                                +  '</div>'                 
                            + '</div>' 
                            + '<div class="modal-footer">'
                                + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                                + '<button type="button" class="btn btn-primary" name="Delete"  onclick="ConfirmDelete(\''+AttachmentID+'\')">Yes</button>'
                            + '</div>';
        $('#model_body').html(content);
    }
function ConfirmDelete(AttachmentID) {
    var param = $("#form_"+AttachmentID).serialize();
    $('#model_body').html(preloader);
        $.post(getAppUrl() + "m=Member&a=DeletDocumentAttachments",param,function(result) {
             if (!(isJson(result))) {
                $('#model_body').html(result);
                return ;                                                                   
            }
            var obj = JSON.parse(result);
            if (obj.status=="success") {
                 var randString = "form_" + randomStrings(5);
                   var data = obj.data; 
                 var content = '<div class="modal-header">'
                            +'<h4 class="modal-title">Confirmation For Remove</h4>'
                            +'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
                        +'</div>'
                        +'<div class="modal-body" style="text-align:center">'
                            +'<p style="text-align:center;"><img src="'+AppUrl+'assets/images/verifiedtickicon.jpg" style="height:100px;"></p>'
                            +'<h5 style="text-align:center;color:#ada9a9">'+ obj.message+'</h4>    <br>'
                            +'<a data-dismiss="modal" class="btn btn-primary" style="cursor:pointer;color:white">Continue</a>'
                         +'</div>';
                 $('#model_body').html(content);
              $('#photoview_'+AttachmentID).hide();
                available--;
                DisplayDocAttachForm();
                $('#x').html( available + " out 2 documents");
            }
        });
}

function DisplayDocAttachForm() {
     if (available==2) {
          $('#Attachdetails').hide();
      } else {
          $('#Attachdetails').show();
      }
}

  setTimeout(function(){
        DisplayDocAttachForm(); 
      
  },500);

</script>
<?php include_once("settings_footer.php");?>                    