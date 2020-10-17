<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data=$mysql->select("select * from _tbl_resume_general_info where ResumeID='".$_GET['id']."'");
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
                
                     $mysql->execute("update _tbl_resume_general_info set `ResumeName`    ='".$_POST['Name']."',
                                                                          `MobileNumber`  ='".$_POST['MobileNumber']."',
                                                                          `WhatsappNumber`  ='".$_POST['WhatsappNumber']."',
                                                                          `EmailID`       ='".$_POST['EmailID']."',
                                                                          `WebsiteName`       ='".$_POST['WebsiteName']."',
                                                                          `Proffession`       ='".$_POST['Proffession']."',
                                                                          `AddressLine1`  ='".$_POST['AddressLine1']."',
                                                                          `AddressLine2`  ='".$_POST['AddressLine2']."',
                                                                          `AddressLine3`  ='".$_POST['AddressLine3']."',
                                                                          `Description`   ='".$_POST['Description']."',
                                                                          `ProfilePhoto`  ='".$file."' where ResumeID='".$data[0]['ResumeID']."'");
           
                $successmessage ="Updated Successfully";
        }else {
             $successmessage ="Error updating ";
        }
    }
    $data=$mysql->select("select * from _tbl_resume_general_info where ResumeID='".$_GET['id']."'");
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
                                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :$data[0]['ResumeName']);?>">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Enter Mobile Number" maxlength="10" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :$data[0]['MobileNumber']);?>">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Whatsapp Number<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="WhatsappNumber" name="WhatsappNumber" placeholder="Enter Mobile Number" maxlength="10" value="<?php echo (isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] :$data[0]['WhatsappNumber']);?>">
                                                <span class="errorstring" id="ErrWhatsappNumber"><?php echo isset($ErrWhatsappNumber)? $ErrWhatsappNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :$data[0]['EmailID']);?>">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Website<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="WebsiteName" name="WebsiteName" placeholder="Enter Website" value="<?php echo (isset($_POST['WebsiteName']) ? $_POST['WebsiteName'] :$data[0]['WebsiteName']);?>">
                                                <span class="errorstring" id="ErrWebsiteName"><?php echo isset($ErrWebsiteName)? $ErrWebsiteName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Proffession<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Proffession" name="Proffession" placeholder="Eg.Data Entry Operator" value="<?php echo (isset($_POST['Proffession']) ? $_POST['Proffession'] :$data[0]['Proffession']);?>">
                                                <span class="errorstring" id="ErrProffession"><?php echo isset($ErrProffession)? $ErrProffession : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :$data[0]['AddressLine1']);?>">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :$data[0]['AddressLine2']);?>">
                                                <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine3" name="AddressLine3" placeholder="Enter Address Line3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] :$data[0]['AddressLine3']);?>">
                                                <span class="errorstring" id="ErrAddressLine3"><?php echo isset($ErrAddressLine3)? $ErrAddressLine3 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Profile Photo<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if(strlen($data[0]['ProfilePhoto'])>1) { ?>
                                                        <img src="../<?php echo "share/uploads/".$data[0]['ProfilePhoto'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                                    <?php } ?>
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <textarea class="form-control" id="Description" name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Educational Information</div></div>
                                        <div class="col-md-6" style="text-align: right;"><button type="button" onclick="AddEducationDetails('<?php echo $data[0]['ResumeID'];?>')" class="btn btn-primary btn-sm">Add</button></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Course</th>
                                                        <th>Description</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Educations = $mysql->select("select * from _tbl_resume_education where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Educations as $Education) { ?>
                                                    <tr>
                                                        <td><?php echo $Education['AcademicYear'];?></td>
                                                        <td><?php echo $Education['Course'];?><br><span style="color:#acacac;"><?php echo $Education['Institute'];?> </span> </td>
                                                        <td><?php echo $Education['Description'];?></td>
                                                        <td style="text-align:right"><a href="javascript:void(0)" onclick="EditEducationDetails('<?php echo $Education['EducationID'];?>')">Edit</a>&nbsp;&nbsp;<span onclick="ConfirmationDeleteEducation('<?php echo $Education['EducationID'];?>','<?php echo $Education['AcademicYear'];?>','<?php echo $Education['Course'];?>','<?php echo $Education['Institute'];?>','<?php echo $Education['Description'];?>')" style="background: #ff5a5a;color:white;padding: 2px 5px 2px 5px;font-size: 12px;border-radius: 5px;cursor:pointer">Delete</span></td>
                                                    </tr>                                                                                                                                                                                                                                                                                                                                                                    
                                                    <?php } ?>
                                                    <?php if(sizeof($Educations)==0){ ?>
                                                        <tr>                                                                                                                                                                                                                                                  
                                                            <td colspan="4" style="text-align:center">No Educations Details Found</td>                                                                                                                                        
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Work Experience</div></div>
                                        <div class="col-md-6" style="text-align: right;"><button type="button" onclick="AddExperienceDetails('<?php echo $data[0]['ResumeID'];?>')" class="btn btn-primary btn-sm">Add</button></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                             <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Designation</th>
                                                        <th>Job Title</th>
                                                        <th>Job Description</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Epericences = $mysql->select("select * from _tbl_resume_experience where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Epericences as $Epericence) { ?>
                                                    <tr>
                                                        <td><?php echo $Epericence['FromYear']."-".$Epericence['ToYear'];?></td>
                                                        <td><?php echo $Epericence['Designation'];?></td>
                                                        <td><?php echo $Epericence['Title'];?><br><span style="color:#acacac;"><?php echo $Epericence['NameofCompany'];?><br><?php echo $Epericence['WorkingPlace'];?> </span> </td>
                                                        <td><?php echo $Epericence['Description'];?></td>
                                                        <td style="text-align:right"><a href="javascript:void(0)" onclick="EditExperienceDetails('<?php echo $Epericence['ExperienceID'];?>')">Edit</a>&nbsp;&nbsp;<span onclick="ConfirmationDeleteEpericence('<?php echo $Epericence['ExperienceID'];?>','<?php echo $Epericence['Year'];?>','<?php echo $Epericence['Title'];?>','<?php echo $Epericence['WorkingPlace'];?>','<?php echo $Epericence['Description'];?>')" style="background: #ff5a5a;color:white;padding: 2px 5px 2px 5px;font-size: 12px;border-radius: 5px;cursor:pointer">Delete</span></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(sizeof($Epericences)==0){ ?>
                                                        <tr>
                                                            <td colspan="5" style="text-align:center">No Experience Found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Skills</div></div>
                                        <div class="col-md-6" style="text-align: right;"><button type="button" onclick="AddSkillsDetails('<?php echo $data[0]['ResumeID'];?>')" class="btn btn-primary btn-sm">Add</button></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Skills = $mysql->select("select * from _tbl_resume_skills where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Skills as $Skill) { ?>
                                                    <tr>
                                                        <td><?php echo $Skill['Title'];?></td>
                                                        <td><?php echo $Skill['Description'];?></td>
                                                        <td style="text-align:right"><a href="javascript:void(0)" onclick="EditSkillsDetails('<?php echo $Skill['SkillsID'];?>')">Edit</a>&nbsp;&nbsp;<span onclick="ConfirmationDeleteSkills('<?php echo $Skill['SkillsID'];?>','<?php echo $Skill['Title'];?>','<?php echo $Skill['Description'];?>')" style="background: #ff5a5a;color:white;padding: 2px 5px 2px 5px;font-size: 12px;border-radius: 5px;cursor:pointer">Delete</span></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(sizeof($Skills)==0){ ?>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center">No Skills Found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Hobbies</div></div>
                                        <div class="col-md-6" style="text-align: right;"><button type="button" onclick="AddHobbiesDetails('<?php echo $data[0]['ResumeID'];?>')" class="btn btn-primary btn-sm">Add</button></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Hobbies = $mysql->select("select * from _tbl_resume_hobbies where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Hobbies as $Hobby) { ?>
                                                    <tr>
                                                        <td><?php echo $Hobby['Title'];?></td>
                                                        <td><?php echo $Hobby['Description'];?></td>
                                                        <td style="text-align:right"><a href="javascript:void(0)" onclick="EditHobbiesDetails('<?php echo $Hobby['HobbiesID'];?>')">Edit</a>&nbsp;&nbsp;<span onclick="ConfirmationDeleteHobbies('<?php echo $Hobby['HobbiesID'];?>','<?php echo $Hobby['Title'];?>','<?php echo $Hobby['Description'];?>')" style="background: #ff5a5a;color:white;padding: 2px 5px 2px 5px;font-size: 12px;border-radius: 5px;cursor:pointer">Delete</span></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(sizeof($Hobbies)==0){ ?>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center">No Hobbies Found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
function AddEducationDetails(ResumeID) {   
        $.ajax({url:'webservice.php?action=AddEducationDetails&ResumeID='+ResumeID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function AddEducation(ResumeID) {
    
    var Error=0;
    if($("#AcademicYear").val()==""){
       $("#ErrorAcademicYear").html("Please Enter Academic Year");
       Error++;
    }
    if($("#Course").val()==""){
       $("#ErrorCourse").html("Please Enter Course");
       Error++;
    }
    
    if(Error==0){
    
     var param = $( "#ResumeIDFrm"+ResumeID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=AddEducation",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
                                                                                                  
    });
   } else {
       return false;
   }
}
function EditEducationDetails(EducationID) {   
        $.ajax({url:'webservice.php?action=EditEducationDetails&EducationID='+EducationID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function UpdateEducation(EducationID) {
    
    var Error=0;
    if($("#AcademicYear").val()==""){
       $("#ErrorAcademicYear").html("Please Enter Academic Year");
       Error++;
    }
    if($("#Course").val()==""){
       $("#ErrorCourse").html("Please Enter Course");
       Error++;
    }
    if($("#Institute").val()==""){
       $("#ErrorInstitute").html("Please Enter Institute");
       Error++;
    }
    if(Error==0){
    
     var param = $( "#EducationFrm"+EducationID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=UpdateEducation",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
   } else {
       return false;
   }
}
function ConfirmationDeleteEducation(EducationID,AcademicYear,Course,Institute,Description){
    
    var text = '<form action="" method="POST" id="DeleteEducationFrm'+EducationID+'">'
                    +'<input type="hidden" value="'+EducationID+'" id="EducationID" Name="EducationID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete this record?<br>'
                                +'<div class="table-responsive">'
                                    +'<table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">'
                                        +'<thead>'
                                            +'<tr>'
                                                +'<th>Academic Year</th>'
                                                +'<th>Course</th>'
                                                +'<th>Description</th>'
                                            +'</tr>'
                                        +'</thead>'
                                        +'<tbody>'
                                            +'<tr>'
                                                +'<td>'+AcademicYear+'</td>'
                                                +'<td>'+Course+'<br>'+Institute+'</td>'
                                                +'<td>'+Description+'</td>'
                                            +'</tr>'
                                        +'</tbody>'
                                    +'</table>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteEducation(\''+EducationID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';
        $("#xconfrimation_text").html(text);
        $('#ConfirmationPopup').modal("show");
}
function DeleteEducation(EducationID) {
   
     var param = $( "#DeleteEducationFrm"+EducationID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=DeleteEducation",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
                                                                                                             
    });
   }
   
   
function AddExperienceDetails(ResumeID) {   
        $.ajax({url:'webservice.php?action=AddExperienceDetails&ResumeID='+ResumeID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function AddExperience(ResumeID) {
    
    var Error=0;
   
    if($("#Designation").val()==""){
       $("#ErrorDesignation").html("Please Enter Designation");
       Error++;
    }
    if($("#Title").val()==""){
       $("#ErrorTitle").html("Please Enter Job Title");
       Error++;
    }
    if($("#NameofCompany").val()==""){
       $("#ErrorNameofCompany").html("Please Enter Name of Company");
       Error++;
    }
    if($("#WorkingPlace").val()==""){
       $("#ErrorWorkingPlace").html("Please Enter Company Address");
       Error++;
    }
    if(Error==0){
    
     var param = $( "#ResumeExperienceFrm"+ResumeID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=AddExperience",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
   } else {
       return false;
   }
}
function EditExperienceDetails(ExperienceID) {   
        $.ajax({url:'webservice.php?action=EditExperienceDetails&ExperienceID='+ExperienceID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function UpdateExperience(ExperienceID) {
    
    var Error=0;
    if($("#Year").val()==""){
       $("#ErrorYear").html("Please Enter Year");
       Error++;
    }
    if($("#Title").val()==""){
       $("#ErrorTitle").html("Please Enter Title");
       Error++;
    }
    if($("#WorkingPlace").val()==""){
       $("#ErrorWorkingPlace").html("Please Enter Working Place");
       Error++;
    }
    if(Error==0){
    
     var param = $( "#ExperienceFrm"+ExperienceID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=UpdateExperience",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
   } else {
       return false;
   }
}
function ConfirmationDeleteEpericence(ExperienceID,Year,Title,WorkingPlace,Description){
    
    var text = '<form action="" method="POST" id="DeleteExperienceFrm'+ExperienceID+'">'
                    +'<input type="hidden" value="'+ExperienceID+'" id="ExperienceID" Name="ExperienceID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete this record?<br>'
                                +'<div class="table-responsive">'
                                    +'<table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">'
                                        +'<thead>'
                                            +'<tr>'
                                                +'<th>Year</th>'
                                                +'<th>Title</th>'
                                                +'<th>Description</th>'
                                            +'</tr>'
                                        +'</thead>'
                                        +'<tbody>'
                                            +'<tr>'
                                                +'<td>'+Year+'</td>'
                                                +'<td>'+Title+'<br>'+WorkingPlace+'</td>'
                                                +'<td>'+Description+'</td>'
                                            +'</tr>'
                                        +'</tbody>'
                                    +'</table>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteExperience(\''+ExperienceID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';
        $("#xconfrimation_text").html(text);
        $('#ConfirmationPopup').modal("show");
}
function DeleteExperience(ExperienceID) {
   
     var param = $( "#DeleteExperienceFrm"+ExperienceID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=DeleteExperience",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
                                                                                                             
    });
   }

function AddSkillsDetails(ResumeID) {   
        $.ajax({url:'webservice.php?action=AddSkillsDetails&ResumeID='+ResumeID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function AddSkills(ResumeID) {
    
    var Error=0;
    
    if($("#Title").val()==""){
       $("#ErrorTitle").html("Please Enter Title");
       Error++;
    }
    
    if(Error==0){
    
     var param = $( "#ResumeSkillsFrm"+ResumeID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=AddSkills",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
   } else {
       return false;
   }
}
function EditSkillsDetails(SkillsID) {   
        $.ajax({url:'webservice.php?action=EditSkillsDetails&SkillsID='+SkillsID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function UpdateSkills(SkillsID) {
    
    var Error=0;
    
    if($("#Title").val()==""){
       $("#ErrorTitle").html("Please Enter Title");
       Error++;
    }
    
    if(Error==0){
    
     var param = $( "#SkillsFrm"+SkillsID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=UpdateSkills",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
   } else {
       return false;
   }
}
function ConfirmationDeleteSkills(SkillsID,Title,Description){
    
    var text = '<form action="" method="POST" id="DeleteSkillsFrm'+SkillsID+'">'
                    +'<input type="hidden" value="'+SkillsID+'" id="SkillsID" Name="SkillsID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete this record?<br>'
                                +'<div class="table-responsive">'
                                    +'<table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">'
                                        +'<thead>'
                                            +'<tr>'
                                                +'<th>Title</th>'
                                                +'<th>Description</th>'
                                            +'</tr>'
                                        +'</thead>'
                                        +'<tbody>'
                                            +'<tr>'
                                                +'<td>'+Title+'</td>'
                                                +'<td>'+Description+'</td>'
                                            +'</tr>'
                                        +'</tbody>'
                                    +'</table>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteSkills(\''+SkillsID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';
        $("#xconfrimation_text").html(text);
        $('#ConfirmationPopup').modal("show");
}
function DeleteSkills(SkillsID) {
   
     var param = $( "#DeleteSkillsFrm"+SkillsID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=DeleteSkills",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");                                                               
        $("#xconfrimation_text").html(html);                                                                  
                                                                                                             
    });
   } 
   
function AddHobbiesDetails(ResumeID) {   
        $.ajax({url:'webservice.php?action=AddHobbiesDetails&ResumeID='+ResumeID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function AddHobbies(ResumeID) {
    
    var Error=0;
    
    if($("#Title").val()==""){
       $("#ErrorTitle").html("Please Enter Title");
       Error++;
    }
    
    if(Error==0){
    
     var param = $( "#ResumeHobbiesFrm"+ResumeID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=AddHobbies",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);                                                              
        
    });
   } else {
       return false;
   }
}
function EditHobbiesDetails(HobbiesID) {   
        $.ajax({url:'webservice.php?action=EditHobbiesDetails&HobbiesID='+HobbiesID,success:function(data){
            $("#xconfrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
function UpdateHobbies(HobbiesID) {
    
    var Error=0;
    
    if($("#Title").val()==""){
       $("#ErrorTitle").html("Please Enter Title");
       Error++;
    }
    
    if(Error==0){
    
     var param = $( "#HobbiesFrm"+HobbiesID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=UpdateHobbies",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#xconfrimation_text").html(html);
        
    });
   } else {
       return false;
   }
}
function ConfirmationDeleteHobbies(HobbiesID,Title,Description){
    
    var text = '<form action="" method="POST" id="DeleteHobbiesFrm'+HobbiesID+'">'
                    +'<input type="hidden" value="'+HobbiesID+'" id="HobbiesID" Name="HobbiesID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete this record?<br>'
                                +'<div class="table-responsive">'
                                    +'<table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">'
                                        +'<thead>'
                                            +'<tr>'
                                                +'<th>Title</th>'
                                                +'<th>Description</th>'
                                            +'</tr>'
                                        +'</thead>'
                                        +'<tbody>'
                                            +'<tr>'
                                                +'<td>'+Title+'</td>'
                                                +'<td>'+Description+'</td>'
                                            +'</tr>'
                                        +'</tbody>'
                                    +'</table>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteHobbies(\''+HobbiesID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';
        $("#xconfrimation_text").html(text);
        $('#ConfirmationPopup').modal("show");
}
function DeleteHobbies(HobbiesID) {
   
     var param = $( "#DeleteHobbiesFrm"+HobbiesID).serialize();
   // $("#confrimation_text").html(loading);                                                                
    $.post( "webservice.php?action=DeleteHobbies",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                          
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/updateresume&id="+obj.ResumeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");                                                               
        $("#xconfrimation_text").html(html);                                                                  
                                                                                                             
    });
   } 
   
   
</script>
        <?php include_once("footer.php");?>