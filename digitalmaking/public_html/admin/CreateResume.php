<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
           
            if($ErrorCount==0){
                
                    $target_dir = "../uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;
                   
                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                     // echo "<script>alert('a');</script>";
                     $id = $mysql->insert("_tbl_resume_general_info",array("ResumeName"    => $_POST['Name'],
                                                                           "Gender"        => $_POST['Gender'],
                                                                           "DateofBirth"   => $_POST['DateofBirth'],
                                                                           "FathersName"   => $_POST['FathersName'],
                                                                           "Community"     => $_POST['Community'],
                                                                           "Religion"      => $_POST['Religion'],
                                                                           "Nationality"   => $_POST['Nationality'],
                                                                           "MaritalStatus" => $_POST['MaritalStatus'],
                                                                           "Language"      => $_POST['Language'],
                                                                           "MobileNumber"  => $_POST['MobileNumber'],
                                                                           "WhatsappNumber"=> $_POST['WhatsappNumber'],
                                                                           "EmailID"       => $_POST['EmailID'],
                                                                           "Website"       => $_POST['WebsiteName'],
                                                                           "Proffession"   => $_POST['Proffession'],
                                                                           "AddressLine1"  => $_POST['AddressLine1'],
                                                                           "AddressLine2"  => $_POST['AddressLine2'],
                                                                           "AddressLine3"  => $_POST['AddressLine3'],
                                                                           "AddressLine3"  => $_POST['AddressLine3'],
                                                                           "ProfilePhoto"  => $file,
                                                                           "Description"   => $_POST['Description'],
                                                                           "PersonalInfo"   => $_POST['PersonalInfo'],
                                                                           "CareerObjectives"   => $_POST['CareerObjectives'],
                                                                           "CreatedBy"     => "Admin",
                                                                           "CreatedByID"   => $_SESSION['User']['AdminID'],
                                                                           "Url"           =>"",
                                                                           "CreatedOn"     => date("Y-m-d H:i:s")));
                     if($id>0){
                          $Url = ParseName($_POST['Name'])."-".$id ;
                        $mysql->execute("update _tbl_resume_general_info set Url='".$Url."' where ResumeID='".$id."'");
                      ?>
                     <script>
                     $(document).ready(function () {
                         SuccessPopup('<?php echo $id;?>');
                     });
                     </script>
                 <?php       unset($_POST);
                        $successmessage ="<span style='color: green;'>Created Successfully</span>";
                     }
                  }else {
                        $successmessage ="<span style='color: red;'>Error Create Resume</span>";
                  }
        
        } else {
                $successmessage =  "<span style='color: red;'>Sorry, there was an error uploading your file.</span>";
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
                                    <div class="card-title">General Information</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Name<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Proffession<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Proffession" name="Proffession" placeholder="Eg.Data Entry Operator" value="<?php echo (isset($_POST['Proffession']) ? $_POST['Proffession'] :"");?>">
                                                <span class="errorstring" id="ErrProffession"><?php echo isset($ErrProffession)? $ErrProffession : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Proffession Description<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="Description" name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Career Objectives</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="CareerObjectives" name="CareerObjectives" placeholder="Enter Career Objectives"><?php echo (isset($_POST['CareerObjectives']) ? $_POST['CareerObjectives'] :"");?></textarea>
                                                <span class="errorstring" id="ErrCareerObjectives"><?php echo isset($ErrCareerObjectives)? $ErrCareerObjectives : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Personal Information</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="PersonalInfo" name="PersonalInfo" placeholder="Enter Personal Info"><?php echo (isset($_POST['PersonalInfo']) ? $_POST['PersonalInfo'] :"");?></textarea>
                                                <span class="errorstring" id="ErrPersonalInfo"><?php echo isset($ErrPersonalInfo)? $ErrPersonalInfo : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Gender<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="Gender" name="Gender">
                                                    <option value="Male" <?php echo ($_POST['Gender']=="Male") ? " selected='selected' " : "";?>>Male</option>
                                                    <option value="Female" <?php echo ($_POST['Gender']=="Female") ? " selected='selected' " : "";?>>Female</option>
                                                </select>
                                                <span class="errorstring" id="ErrFemale"><?php echo isset($ErrFemale)? $ErrPersonalInfo : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Date of Birth<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="DateofBirth" name="DateofBirth" value="<?php echo (isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] :"");?>">
                                                <span class="errorstring" id="ErrDateofBirth"><?php echo isset($ErrDateofBirth)? $ErrDateofBirth : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Father's Name<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="FathersName" name="FathersName" placeholder="Enter Father's Name" value="<?php echo (isset($_POST['FathersName']) ? $_POST['FathersName'] :"");?>">
                                                <span class="errorstring" id="ErrFathersName"><?php echo isset($ErrFathersName)? $ErrFathersName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Mobile Number<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Eg. +919000000000" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Whatsapp Number<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="WhatsappNumber" name="WhatsappNumber" placeholder="Eg. +919000000000" value="<?php echo (isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] :"");?>">
                                                <span class="errorstring" id="ErrWhatsappNumber"><?php echo isset($ErrWhatsappNumber)? $ErrWhatsappNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Email ID<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>">
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
                                                    <input type="text" class="form-control" id="WebsiteName" name="WebsiteName" placeholder="Enter Website" value="<?php echo (isset($_POST['WebsiteName']) ? $_POST['WebsiteName'] :"");?>">
                                                </div>
                                                <span class="errorstring" id="ErrWebsiteName"><?php echo isset($ErrWebsiteName)? $ErrWebsiteName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Community</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Community" name="Community" placeholder="Enter Community" value="<?php echo (isset($_POST['Community']) ? $_POST['Community'] :"");?>">
                                                <span class="errorstring" id="ErrCommunity"><?php echo isset($ErrCommunity)? $ErrCommunity : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Religion</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Religion" name="Religion" placeholder="Enter Religion" value="<?php echo (isset($_POST['Religion']) ? $_POST['Religion'] :"");?>">
                                                <span class="errorstring" id="ErrReligion"><?php echo isset($ErrReligion)? $ErrReligion : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Nationality</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Nationality" name="Nationality" placeholder="Enter Nationality" value="<?php echo (isset($_POST['Nationality']) ? $_POST['Nationality'] :"");?>">
                                                <span class="errorstring" id="ErrNationality"><?php echo isset($ErrNationality)? $ErrNationality : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Marital Status</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="MaritalStatus" name="MaritalStatus" placeholder="Enter Marital Status" value="<?php echo (isset($_POST['MaritalStatus']) ? $_POST['MaritalStatus'] :"");?>">
                                                <span class="errorstring" id="ErrMaritalStatus"><?php echo isset($ErrMaritalStatus)? $ErrMaritalStatus : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Language</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Language" name="Language" placeholder="Enter Language" value="<?php echo (isset($_POST['Language']) ? $_POST['Language'] :"");?>">
                                                <span class="errorstring" id="ErrLanguage"><?php echo isset($ErrLanguage)? $ErrLanguage : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Address Line1<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Address Line2</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :"");?>">
                                                <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Address Line3</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="AddressLine3" name="AddressLine3" placeholder="Enter Address Line3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] :"");?>">
                                                <span class="errorstring" id="ErrAddressLine3"><?php echo isset($ErrAddressLine3)? $ErrAddressLine3 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Profile Photo<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-sm-9" style="text-align:center;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>                                                                        
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Save">&nbsp;
                                                <a href="dashboard.php?action=ResumesList" class="btn btn-warning btn-border">Back</a>
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
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=ResumesList' class='btn btn-outline-success'>Continue</a></div>"; 
        
        $("#xconfrimation_text").html(html);
        $('#ConfirmationPopup').modal("show");
        
    }
</script>
