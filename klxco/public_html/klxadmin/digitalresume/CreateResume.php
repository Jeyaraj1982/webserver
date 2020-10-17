<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            if($ErrorCount==0){
                
                    $target_dir = "../share/uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;
                   
                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                     // echo "<script>alert('a');</script>";
                     $id = $mysql->insert("_tbl_resume_general_info",array("ResumeName"    => $_POST['Name'],
                                                                           "MobileNumber"  => $_POST['MobileNumber'],
                                                                           "WhatsappNumber"  => $_POST['WhatsappNumber'],
                                                                           "EmailID"       => $_POST['EmailID'],
                                                                           "WebsiteName"       => $_POST['WebsiteName'],
                                                                           "Proffession"       => $_POST['Proffession'],
                                                                           "AddressLine1"  => $_POST['AddressLine1'],
                                                                           "AddressLine2"  => $_POST['AddressLine2'],
                                                                           "AddressLine3"  => $_POST['AddressLine3'],
                                                                           "AddressLine3"  => $_POST['AddressLine3'],
                                                                           "ProfilePhoto"  => $file,
                                                                           "Description"   => $_POST['Description'],
                                                                           "CreatedOn"     => date("Y-m-d H:i:s")));
                     if(sizeof($id)>0){ ?>
                     <script>
                     $(document).ready(function () {
                         SuccessPopup('<?php echo $id;?>');
                     });
                     </script>
                 <?php       unset($_POST);
                        $successmessage ="Created Successfully";
                     }
                  }else {
                        $successmessage ="Error Create Resume";
                  }
        
        } else {
                $successmessage =  "Sorry, there was an error uploading your file.";
              }
    }
    
?>
<script>
$(document).ready(function () {
    $("#Name").blur(function () {
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#MobileNumber").blur(function () {
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
        }
    });
    $("#WhatsappNumber").blur(function () {
        if(IsNonEmpty("WhatsappNumber","ErrWhatsappNumber","Please Enter Whatsapp Number")){
           IsMobileNumber("WhatsappNumber","ErrWhatsappNumber","Please Enter Valid Whatsapp Number"); 
        }
    });
    $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
           IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
        }
    });
    $("#AddressLine1").blur(function () {
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    });
    $("#WebsiteName").blur(function () {
        IsNonEmpty("WebsiteName","ErrWebsiteName","Please Enter Website Name");
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
        $('#ErrWebsiteName').html("");
        $('#ErrProffession').html("");
        $('#ErrAddressLine1').html("");
        
            if(IsNonEmpty("Name","ErrName","Please Enter Name")){
               IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Character"); 
            }
            if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
               IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
            }
            if(IsNonEmpty("WhatsappNumber","ErrWhatsappNumber","Please Enter Whatsapp Number")){
               IsMobileNumber("WhatsappNumber","ErrWhatsappNumber","Please Enter Valid Whatsapp Number"); 
            }
            if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
               IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
            }
            IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
            IsNonEmpty("WebsiteName","ErrWebsiteName","Please Enter Website");
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
                                    <div class="card-title">General Information</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" maxlength="10" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Whatsapp Number<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="WhatsappNumber" name="WhatsappNumber" maxlength="10" placeholder="Enter Whatsapp Number" value="<?php echo (isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] :"");?>">
                                                <span class="errorstring" id="ErrWhatsappNumber"><?php echo isset($ErrWhatsappNumber)? $ErrWhatsappNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Website<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="WebsiteName" name="WebsiteName" placeholder="Enter Website" value="<?php echo (isset($_POST['WebsiteName']) ? $_POST['WebsiteName'] :"");?>">
                                                <span class="errorstring" id="ErrWebsiteName"><?php echo isset($ErrWebsiteName)? $ErrWebsiteName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Proffession<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Proffession" name="Proffession" placeholder="Eg.Data Entry Operator" value="<?php echo (isset($_POST['Proffession']) ? $_POST['Proffession'] :"");?>">
                                                <span class="errorstring" id="ErrProffession"><?php echo isset($ErrProffession)? $ErrProffession : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line1<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line2</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :"");?>">
                                                <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line3</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine3" name="AddressLine3" placeholder="Enter Address Line3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] :"");?>">
                                                <span class="errorstring" id="ErrAddressLine3"><?php echo isset($ErrAddressLine3)? $ErrAddressLine3 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Profile Photo<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <textarea class="form-control" id="Description" name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>                                                                        
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Save">&nbsp;
                                                <a href="dashboard.php?action=digitalresume/ResumeList" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>                                               
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
    function SuccessPopup(ResumeID){
        html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>Resume Created<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/ResumeList' class='btn btn-outline-success'>Continue</a></div>"; 
        
        $("#xconfrimation_text").html(html);
        $('#ConfirmationPopup').modal("show");
        
    }
</script>
