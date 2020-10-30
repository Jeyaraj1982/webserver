<?php                     
    $page="ProfilePhoto";       
    include_once("settings_header.php");
    
   
?>
<style>
.photoviewFirst {float: left;margin-right: 10px;text-align: center;border: 1px solid #eaeaea;height: 230px;padding: 10px;margin-bottom: 10px;border-radius: 10px;background: #ccc;color:black;}
.photoview {float: left;margin-right: 10px;text-align: center;border: 1px solid #eaeaea;height: 230px;padding: 10px;margin-bottom: 10px;border-radius: 10px;background: #ccc;color:black;}
.photoview:hover{border:1px solid #9b9a9a;}
</style>
<div class="col-sm-10 rightwidget">
<script>
function submitUpload() {
            $('#ErrProfilePhoto').html("");
            $('#Errcheck').html("");
            ErrorCount==0
            if ($("#ProfilePhoto").val()=="") {
                $("#ErrProfilePhoto").html("Please select the profile Photo");
                return false;
            }
            if (document.form1.check.checked == false) {
                $("#Errcheck").html("Please read the instruction");
                return false;
            }     
            
            if (ErrorCount==0) {
                setTimeout(function(){$("#UpdateProfilePhoto").attr('disabled', 'disabled');},100);
                            return true;
                        } else{
                            return false;
                        }

        }
</script>
<form method="post" onsubmit="return submitUpload()" name="form1" id="form1" action="<?php echo SiteUrl;?>Member/<?php echo $_GET['MCode'];?>/ProfileEdit/ProfilePhotoCrop/<?php echo $_GET['Code'];?>.htm" enctype="multipart/form-data">
    <h4 class="card-title">Profile Photo</h4>
    
    <?php
                 if (isset($_POST['btnCrop'])) {
            
    $targ_w = $targ_h = 250;
    $jpeg_quality = 90;
    
    $filename =  md5(time().$_GET['Code']).".jpg";
    $src =  'uploads/profiles/'.$_GET['Code'].'/uploads/'.$_POST['file'];
    $dst = 'uploads/profiles/'.$_GET['Code'].'/thumb/'.$filename;
    
    $img_r = imagecreatefromjpeg($src);
    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
    //header('Content-type: image/jpeg');
    //imagejpeg($dst_r,null,$jpeg_quality);
    imagejpeg($dst_r,$dst,$jpeg_quality);
    
            $_POST['ProfilePhoto']= $filename;
                        $res =$webservice->getData("Franchisee","AddProfilePhoto",$_POST);
                        echo  ($res['status']=="success") ? $dashboard->showSuccessMsg($res['message'])
                                                           : $dashboard->showErrorMsg($res['message']);
    
        }
        
    
    
                if (isset($_POST['UpdateProfilePhoto'])) {
                    
                    $target_dir = "uploads/";
                    $err=0;
                    $_POST['ProfilePhoto']= "";
                    $acceptable = array('image/jpeg',
                                        'image/jpg',
                                        'image/png'
                                    );
                    
                    if(($_FILES['ProfilePhoto']['size'] >= 5000000) || ($_FILES["ProfilePhoto"]["size"] == 0)) {
                        $err++;
                           echo "File too large. File must be less than 5 megabytes.";
                    }
                            
                    if((!in_array($_FILES['ProfilePhoto']['type'], $acceptable)) && (!empty($_FILES["ProfilePhoto"]["type"]))) {
                        $err++;
                           echo "Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                    }
                                                                
                    
                    if (isset($_FILES["ProfilePhoto"]["name"]) && strlen(trim($_FILES["ProfilePhoto"]["name"]))>0 ) {
                        $profilephoto = time().str_replace(" ","",$_FILES["ProfilePhoto"]["name"]);
                        if (!(move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $target_dir . $profilephoto))) {
                           $err++;
                           echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    
                    if ($err==0) {
                    
                        $_POST['ProfilePhoto']= $profilephoto;
                        $res =$webservice->getData("Franchisee","AddProfilePhoto",$_POST);
                        echo  ($res['status']=="success") ? $dashboard->showSuccessMsg($res['message'])
                                                           : $dashboard->showErrorMsg($res['message']);
                    } else {
                        $res =$webservice->getData("Franchisee","AddProfilePhoto");
                    }
                } else {                     
                     $res =$webservice->getData("Franchisee","AddProfilePhoto");
                     
                }
                $profile = $res['data'];
              
            ?>    
<div id="AddPhotoDiv">
   <span style="color:#555">"A picture is worth a thousand words". Adding your picture is one of the most important aspects of your profile, as per statistics it increases your chances up to 20 times. Most members won't even search a profile without a picture. Picture is the first impression that is given to the viewers and you don't want to give them a blank first impression.<Br><Br><br></span>          
    <div class="form-group row">
        <div class="col-sm-12">
            <input type="File" id="ProfilePhoto" name="ProfilePhoto" Placeholder="File">
            <span style="color:#888">supports png, jpg, jpeg & File size Lessthan 5 MB </span><br>
             <span class="errorstring" id="ErrProfilePhoto"></span>
        </div>
    </div>
    <input type="checkbox" name="check" id="check">&nbsp;<label for="check" style="font-weight:normal"> I read the instructions  </label>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="showLearnMore()">Learn more</a>
        <br><span class="errorstring" id="Errcheck"></span><br><br>
    <div class="form-group row" style="margin-bottom:0px;">
        <div class="col-sm-3">
            <button type="submit" id="UpdateProfilePhoto" name="UpdateProfilePhoto" class="btn btn-primary mr-2" style="font-family:roboto">Update</button>
        </div>
    </div><br>
    </div>
    <div style="text-align: right;" id="x"></div>
    <br>
    </form>
    <div>
    <?php if(sizeof($res['data'])==0){  ?>
         <div style="margin-right:10px;text-align: center;">
                 No Profile Photos Found                                                                                                                       
        </div>
   <?php }  else {       ?>
    <?php foreach($res['data'] as $d) { ?> 
        <?php if($d['PriorityFirst']==0) {?>
        <div id="photoview_<?php echo $d['ProfilePhotoID'];?>" class="photoview">
            <div style="text-align:right;height:22px;">
                <a href="javascript:void(0)" onclick="showConfirmDeleteProfilePhoto('<?php  echo $d['ProfilePhotoID'];?>','<?php echo $_GET['Code'];?>')" name="Delete" style="font-family:roboto"><button type="button" class="close" >&times;</button></a>    
            </div>
            <div><img src="<?php echo AppUrl;?>uploads/profiles/<?php echo $d['ProfileCode'];?>/thumb/<?php echo $d['ProfilePhoto'];?>" style="height:120px;"></div>
            <div>
                <?php if($d['IsApproved']==0){ echo "verification pending" ; }?>
            <?php if($d['IsApproved']==1){ echo "Approved" ; }?>
                <br><small><?php echo PutDateTime($d['UpdateOn']);?></small><br>
                
                <span id="priority_<?php echo $d['ProfilePhotoID'];?>" class="Profile_photo" onclick="_select('<?php echo $d['ProfilePhotoID'];?>','<?php echo $_GET['Code'];?>')" style="cursor: pointer;border: 1px;padding: 3px 10px;background:#eee;color:#353535">set as default</span>
                <br/>  
            </div>
        </div>
        <?php } else {   ?>
            <div id="photoview_<?php echo $d['ProfilePhotoID'];?>" class="photoview">
            <div style="text-align:right;height:22px;">
                <a href="javascript:void(0)" onclick="showConfirmDeleteProfilePhoto('<?php  echo $d['ProfilePhotoID'];?>','<?php echo $_GET['Code'];?>')" name="Delete" style="font-family:roboto"><button type="button" class="close" >&times;</button></a>    
            </div>
            <div><img src="<?php echo AppUrl;?>uploads/profiles/<?php echo $d['ProfileCode'];?>/thumb/<?php echo $d['ProfilePhoto'];?>" style="height:120px;"></div>
            <div>
                <?php if($d['IsApproved']==0){ echo "verification pending" ; }?>
            <?php if($d['IsApproved']==1){ echo "Approved" ; }?>
                <br><small><?php echo PutDateTime($d['UpdateOn']);?></small> <br>
                
                <span id="priority_<?php echo $d['ProfilePhotoID'];?>" class="Profile_photo" onclick="_select('<?php echo $d['ProfilePhotoID'];?>','<?php echo $_GET['Code'];?>')" style="cursor: pointer;border: 1px ;padding: 3px 10px;background:green;color:white">set as default</span>
                <br/>  
            </div>
        </div>
       <?php  }?>
        <?php }   ?>
         <div style="clear:both"></div>
         <?php }?>
         
         
    </div>
    <form method="post" id="form_ProfilePhotoID" name="form_ProfilePhotoID" >
        <input type="hidden" value="" name="txnPassword" id="txnPassword">
        <input type="hidden" value="" name="ProfilePhotoID" id="ProfilePhotoID">
        <input type="hidden" value="<?php echo $_GET['Code'];?>" name="ProfileID">
    </form>
    <br>
    <div class="form-group row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6" style="text-align:right">
             <ul class="pager" style="float:right;">
                  <li><a href="../CommunicationDetails/<?php echo $_GET['Code'].".htm";?>">&#8249; Previous</a></li>
                  <li>&nbsp;</li>
                  <li><a href="../PartnersExpectation/<?php echo $_GET['Code'].".htm";?>">Next  &#8250;</a></li>
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
<script>
function showLearnMore() {
      $('#LearnMore').modal('show'); 
      var content = '<div class="LearnMore_body" style="padding:20px">'
                    +   '<div  style="height:500px;">'
                            + '<button type="button" class="close" data-dismiss="modal">&times;</button>'
                        + '<h4 class="modal-title">Please follow the below instructions :</h4> <br>'
                            + '<ol> '
                                + '<li>The ID proof must have related to profile information </li>'
                                + '<li>The uploaded ID proofs are not displayed in public and it is purely for administrative purposes.</li>'
                                + '<li>ID proofs once uploaded cannot be edit or delete.</li>'
                                + '<li>If any changes. You should contact the admin for any updates to these documents with a valid reason.</li>'
                                + '</ol>'
                        +  '<button type="button" data-dismiss="modal" class="btn btn-primary">close</button>'
                       +  '</div><br>'
                +  '</div>'
            $('#LearnMore_body').html(content);
}
</script>
  <div class="modal" id="Delete" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="model_body" style="max-width:500px;min-height:300px;overflow:hidden"></div>
    </div>
</div>      
        <script>
         var available = "<?php echo sizeof($res['data']);?>";
         
         $('#x').html( available + " out 5 photos");
         
          function _select(ProfilePhotoID,ProfileID) {
         var mvar = "";
            $(".Profile_photo").each(function() {
               
               $(this).css({'background':'#eee','color':'#353535'});
            });
              $('#priority_'+ProfilePhotoID).css({'background':'green','color':'White'});
                $.ajax({
                url: API_URL + "m=Franchisee&a=ProfilePhotoBringToFront&ProfilePhotoID="+ProfilePhotoID+"&ProfileID="+ProfileID, 
                success: function(result){
                    //$.simplyToast("Profile photo ID: "+ProfileID+" has been set as Front", 'info');
                    $.simplyToast("Selected profile photo has been set to default photo"  , 'info');
            }});
          }
         
 
    function showConfirmDeleteProfilePhoto(ProfilePhotoID,ProfileID) {                                           
        $('#Delete').modal('show'); 
        var content ='<div class="modal-header">'
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
                            + '<input type="hidden" value="'+ProfilePhotoID+'" name="ProfilePhotoiD" id="ProfilePhotoiD">'
                            + '<div class="modal-footer">'
                                + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                                + '<button type="button" class="btn btn-primary" name="Delete"  onclick="GetTxnPswd(\''+ProfilePhotoID+'\')">Yes</button>'
                            + '</div>';
        $('#model_body').html(content);
    }
    function GetTxnPswd(ProfilePhotoID) {
           $("#ProfilePhotoID").val($("#ProfilePhotoiD").val());
             var content =  '<div class="modal-header">'
                            + '<h4 class="modal-title">Confirmation For remove</h4>'
                            + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                      + '</div>'
                      + '<div class="modal-body">'
                        + '<div class="form-group" style="text-align:center">'
                            + '<img src="'+ImgUrl+'icons/transaction_password.png" width="128px">' 
                            + '<h4 style="text-align:center;color:#ada9a9;margin-bottom: -13px;">Please Enter Your Transaction Password</h4>'
                        + '</div>'
                        + '<div class="form-group">'
                            + '<div class="input-group">'
                                + '<div class="col-sm-2"></div>'
                                + '<div class="col-sm-8">'
                                    + '<input type="password"  class="form-control" id="TransactionPassword" name="TransactionPassword" style="font-weight: normal;font-size: 13px;text-align: center;letter-spacing: 5px;font-family:Roboto;">'
                                    + '<div id="frmTxnPass_error" style="color:red;text-align:center"><br></div>'
                                + '</div>'
                                + '<div class="col-sm-2"></div>'
                            + '</div>'
                        + '</div>'
                      + '</div>'
                      + '<input type="hidden" value="'+ProfilePhotoID+'" name="ProfilePhotoiD" id="ProfilePhotoiD">'
                        + '<div class="modal-footer">'
                            + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                            + '<button type="button" onclick="ConfirmDeleteProfilePhoto(\''+ProfilePhotoID+'\')" class="btn btn-primary" >Continue</button>'
                        + '</div>';
        $('#model_body').html(content);              
}
function ConfirmDeleteProfilePhoto(ProfilePhotoID) {
        if ($("#TransactionPassword").val().trim()=="") {
             $("#frmTxnPass_error").html("Please enter transaction password");
             return false;
         }
    $("#txnPassword").val($("#TransactionPassword").val());
    $("#ProfilePhotoID").val($("#ProfilePhotoiD").val());
        var param = $( "#form_ProfilePhotoID").serialize();
        $('#model_body').html(preloading_withText("Deleting ...","95"));
        $.post(API_URL + "m=Franchisee&a=DeletProfilePhoto", param, function(result) {
            if (!(isJson(result.trim()))) {
                $('#model_body').html(result);
                return ;
            }  
            var obj = JSON.parse(result.trim());
            
            if (obj.status == "success") {
               
                var data = obj.data; 
                var content = '<div  style="height: 300px;">'                                                                              
                                +'<div class="modal-body" style="min-height:175px;max-height:175px;">'
                                    + '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/verifiedtickicon.jpg" width="100px"></p>'
                                    + '<h3 style="text-align:center;">'+ obj.message+'</h3>'             
                                    + '<p style="text-align:center;"><a data-dismiss="modal" class="btn btn-primary" style="cursor:pointer;color:white">Continue</a></p>'
                                +'</div>' 
                            +'</div>';
                $('#model_body').html(content);
                $('#photoview_'+ProfilePhotoID).hide();
                available--;
                DisplayAddProfilePhotoForm();
                $('#x').html( available + " out 5 photos");
            } else {
                var data = obj.data; 
                var content = '<div  style="height: 300px;">'                                                                              
                                +'<div class="modal-header">'
                                    +'<h4 class="modal-title">Confirmation For remove</h4>'
                                    +'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
                                +'</div>'
                                +'<div class="modal-body" style="min-height:175px;max-height:175px;">'
                                    + '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/exclamationmark.jpg" width="10%"><p>'
                                        + '<h5 style="text-align:center;color:#ada9a9">'+ obj.message+'</h5><br><br>'
                                        +'<div style="text-align:center"><a class="btn btn-primary" data-dismiss="modal" style="padding-top:5pxtext-align:center;color:white">Continue</a></div>'
                                +'</div>' 
                            +'</div>';
            $('#model_body').html(content);
            }
        }
    );
                    
      
        //$.ajax({url: API_URL + "m=Member&a=DeletDocumentAttachments",success: function(result2){$('#model_body').html(result2);}});
}
function changeColor(id)
{
  document.getElementById(id).style.color = "#ff0000"; // forecolor
 
}
function DisplayAddProfilePhotoForm() {
     if (available==5) {
          $('#AddPhotoDiv').hide();
      } else {
          $('#AddPhotoDiv').show();
      }
}

  setTimeout(function(){
        DisplayAddProfilePhotoForm(); 
      
  },500);
</script>
<?php include_once("settings_footer.php");?>                    

 