<?php
$data=$mysql->select("select * from _tbl_card_general_info where ResumeID='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            if($ErrorCount==0){
                if(strlen($_FILES["uploadimage1"]["name"])>0) {                                                 
                    $target_dir = "../share/uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;

                    if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                    } 
                    } else {
                           $file = $data[0]['ProfilePhoto'];
                    }
                
                       $mysql->execute("update _tbl_card_general_info set `ResumeName`    ='".$_POST['Name']."',
                                                                          `MobileNumber`  ='".$_POST['MobileNumber']."',
                                                                          `WhatsappNumber`='".$_POST['WhatsappNumber']."',
                                                                          `LandlineNumber`='".$_POST['LandlineNumber']."',
                                                                          `EmailID`       ='".$_POST['EmailID']."',
                                                                          `Website`       ='".$_POST['WebsiteName']."',
                                                                          `Proffession`   ='".$_POST['Proffession']."',
                                                                          `AddressLine1`  ='".$_POST['AddressLine1']."',
                                                                          `AddressLine2`  ='".$_POST['AddressLine2']."',
                                                                          `AddressLine3`  ='".$_POST['AddressLine3']."',
                                                                          `Twitter`       ='".$_POST['Twitter']."',
                                                                          `FaceBook`      ='".$_POST['FaceBook']."',
                                                                          `Instagram`     ='".$_POST['Instagram']."',
                                                                          `LinkedIn`      ='".$_POST['LinkedIn']."',
                                                                          `ProfilePhoto`  ='".$file."' where ResumeID='".$data[0]['ResumeID']."'");
           
        ?>
                
                <script>
                    $(document).ready(function() {
                        swal("updated successfully", {
                            icon : "success" 
                        });
                    });  
                </script>
    
      <?php }else {
             $successmessage ="Error updating ";
        }
    }
    $data=$mysql->select("select * from _tbl_card_general_info where ResumeID='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {
    $("#Name").blur(function () {
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#MobileNumber").blur(function () {
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
    });
    $("#WhatsappNumber").blur(function () {
        IsNonEmpty("WhatsappNumber","ErrWhatsappNumber","Please Enter Whatsapp Number");
    });
    $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
           IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
        }
    });
    $("#AddressLine1").blur(function () {
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    });
    $("#Proffession").blur(function () {
        if(IsNonEmpty("Proffession","ErrProffession","Please Enter Proffession")){
               IsAlphaNumeric("Proffession","ErrProffession","Please Enter Alpha Numerics Character"); 
            }
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrName').html("");
        $('#ErrMobileNumber').html("");
        $('#ErrWhatsappNumber').html("");
        $('#ErrEmailID').html("");
        $('#ErrProffession').html("");
        $('#ErrAddressLine1').html("");
        
            if(IsNonEmpty("Name","ErrName","Please Enter Name")){
               IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Character"); 
            }
            IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
            IsNonEmpty("WhatsappNumber","ErrWhatsappNumber","Please Enter Whatsapp Number");
            if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
               IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
            }
            IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
            if(IsNonEmpty("Proffession","ErrProffession","Please Enter Proffession")){
               IsAlphaNumeric("Proffession","ErrProffession","Please Enter Alpha Numerics Character"); 
            }
                return (ErrorCount==0) ? true : false;
         }
</script>

         
              
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Card</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Name<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :$data[0]['ResumeName']);?>">
                                        <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Proffession<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Proffession" name="Proffession" placeholder="Eg.Data Entry Operator" value="<?php echo (isset($_POST['Proffession']) ? $_POST['Proffession'] :$data[0]['Proffession']);?>">
                                        <span class="errorstring" id="ErrProffession"><?php echo isset($ErrProffession)? $ErrProffession : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Mobile Number<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Eg. +919000000000" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :$data[0]['MobileNumber']);?>">
                                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Whatsapp Number<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="WhatsappNumber" name="WhatsappNumber" placeholder="Eg. +919000000000" value="<?php echo (isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] :$data[0]['WhatsappNumber']);?>">
                                        <span class="errorstring" id="ErrWhatsappNumber"><?php echo isset($ErrWhatsappNumber)? $ErrWhatsappNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Landline Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="LandlineNumber" name="LandlineNumber" placeholder="Enter Landline Number" value="<?php echo (isset($_POST['LandlineNumber']) ? $_POST['LandlineNumber'] :$data[0]['LandlineNumber']);?>">
                                        <span class="errorstring" id="ErrLandlineNumber"><?php echo isset($ErrLandlineNumber)? $ErrLandlineNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Email ID<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :$data[0]['EmailID']);?>">
                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Website</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">https://</span>
                                            </div>
                                            <input type="text" class="form-control" id="WebsiteName" name="WebsiteName" placeholder="Enter Website" value="<?php echo (isset($_POST['WebsiteName']) ? $_POST['WebsiteName'] :$data[0]['Website']);?>">
                                        </div>
                                        <span class="errorstring" id="ErrWebsiteName"><?php echo isset($ErrWebsiteName)? $ErrWebsiteName : "";?></span>
                                    </div>
                                </div>                                                                                                                                                                 
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Address<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :$data[0]['AddressLine1']);?>">
                                        <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Address<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :$data[0]['AddressLine2']);?>">
                                        <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Address<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="AddressLine3" name="AddressLine3" placeholder="Enter Address Line3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] :$data[0]['AddressLine3']);?>">
                                        <span class="errorstring" id="ErrAddressLine3"><?php echo isset($ErrAddressLine3)? $ErrAddressLine3 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Twitter Url</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">https://twitter.com/</span>
                                            </div>
                                            <input type="text" class="form-control" id="Twitter" name="Twitter" placeholder="Enter Twitter Url" value="<?php echo (isset($_POST['Twitter']) ? $_POST['Twitter'] : $data[0]['Twitter']);?>">
                                        </div>
                                        <span class="errorstring" id="ErrTwitter"><?php echo isset($ErrTwitter)? $ErrTwitter : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Facebook Url</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">https://facebook.com/</span>
                                            </div>
                                            <input type="text" class="form-control" id="FaceBook" name="FaceBook" placeholder="Enter FaceBook Url" value="<?php echo (isset($_POST['FaceBook']) ? $_POST['FaceBook'] :$data[0]['FaceBook']);?>">
                                        </div>
                                        <span class="errorstring" id="ErrFaceBook"><?php echo isset($ErrFaceBook)? $ErrFaceBook : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Instagram Url</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">https://instagram.com/</span>
                                            </div>
                                            <input type="text" class="form-control" id="Instagram" name="Instagram" placeholder="Enter Instagram Url" value="<?php echo (isset($_POST['Instagram']) ? $_POST['Instagram'] : $data[0]['Instagram']);?>">
                                        </div>
                                        <span class="errorstring" id="ErrInstagram"><?php echo isset($ErrInstagram)? $ErrInstagram : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">LinkedIn Url</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">https://linkedin.com/</span>
                                            </div>
                                            <input type="text" class="form-control" id="LinkedIn" name="LinkedIn" placeholder="Enter LinkedIn Url" value="<?php echo (isset($_POST['LinkedIn']) ? $_POST['LinkedIn'] : $data[0]['LinkedIn']);?>">
                                        </div>
                                        <span class="errorstring" id="ErrLinkedIn"><?php echo isset($ErrLinkedIn)? $ErrLinkedIn : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-sm-3 text-left">Profile Photo<span class="required-label">*</span></label>
                                    <div class="col-sm-9">
                                        <?php if(strlen($data[0]['ProfilePhoto'])>1) { ?>
                                                <img src="<?php echo "../share/uploads/".$data[0]['ProfilePhoto'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                            <?php } ?>
                                        <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                        <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-9" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                            </div>
                            </div>                                                                        
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Save">&nbsp;
                                        <a href="dashboard.php?action=digitalresume/Cards/list" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 