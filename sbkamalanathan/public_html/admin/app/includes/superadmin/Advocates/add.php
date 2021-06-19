<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>New Advocate</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
<?php
    
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if (strlen(trim($_POST['AdvocateName']))==0) {
            $AdvocateName = "Please enter Advocate's Name";
            $error++;
        }

        if ($_POST['StateNameID']==0) {
            $StateName = "Please select State Name";
            $error++;
        } else {
            if ($_POST['DistrictNameID']==0) {
                $DistrictName = "Please select District Name";
                $error++;
            }
        }
        
        if ($_POST['YearOfBirth']==0) {
            $YearOfBirth = "Please select Year of Birth";
            $error++;
        }
        
         if (strlen(trim($_POST['EmailID']))>0) {
            if (!filter_var($_POST['EmailID'], FILTER_VALIDATE_EMAIL)) {
               $EmailID = "Please enter valid Email ID";
               $error++;
            } else {
                $duplicate = $mysql->select("select * from _tbl_master_advocates where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($duplicate)>0) {
                    $EmailID = "Email already exists";
                    $error++;  
                }
            }
        }
        
        /* Mobile Number */
        if (strlen(trim($_POST['MobileNumber']))==0) {
            $MobileNumber = "Please enter Mobile Number";
            $error++;
        } else {
            if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
               $MobileNumber = "Please enter valid Mobile Number";
               $error++;
            } else {
                $duplicate = $mysql->select("select * from _tbl_master_advocates where MobileNumber='".trim($_POST['MobileNumber'])."'");
                if (sizeof($duplicate)>0) {
                    $MobileNumber = "Mobile number already exists";
                    $error++;  
                }
            }
        }
        
        /* Whatsapp Number -- If customer entered  */
        if (strlen(trim($_POST['WhatsappNumber']))>0) {
            if (!($_POST['WhatsappNumber']>6000000000 && $_POST['WhatsappNumber']<9999999999)) {
               $WhatsappNumber = "Please enter valid Whatsapp Number";
               $error++;
            } else {
                $duplicate = $mysql->select("select * from _tbl_master_advocates where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                if (sizeof($duplicate)>0) {
                    $WhatsappNumber = "Whatsapp number already exists";
                    $error++;  
                }
            }
        }
        
        if (strlen(trim($_POST['LoginName']))==0) {
            $LoginName = "Please enter Login UserName";
            $error++;
        } else {
            if(preg_match('/[^a-z_\-0-9]/i', trim($_POST['LoginName']))) {
                 $LoginName = "Login UserName allow only alphanumeric characters.";
                 $error++; 
            } else {
                $duplicate = $mysql->select("select * from _tbl_master_advocates where LoginName='".trim($_POST['LoginName'])."'");
                if (sizeof($duplicate)>0) {
                    $LoginName = "Login UserName already exists";
                    $error++;  
                } 
            }
        } 
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            $LoginPassword = "Please enter Login Password";
            $error++;
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                $LoginPassword = "Password length minimum 6 characters";
                 $error++;
            }
        }
        
        $ProfilePhotoFileName = "";
        $ProfilePhoto_FileName = "";
        
        $Attachment1FileName  = "";
        $Attachment1_FileName  = "";
        
        $Attachment2FileName  = "";
        $Attachment2_FileName  = "";
        
        $target_dir = "assets/uploads/advocates/";
            
        if (isset($_FILES['ProfilePhoto']) && $_FILES['ProfilePhoto']['error']==0) {
            
            $ProfilePhotoFileName = strtolower($target_dir . time()."_profile_".basename($_FILES["ProfilePhoto"]["name"]));
            $uploadOk = 1;
            
            $imageFileType = strtolower(pathinfo($ProfilePhotoFileName,PATHINFO_EXTENSION));
               
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $ProfilePhoto = "Sorry, only jpg, jpeg, png files are allowed.";
                $uploadOk = 0;
            }
            
            // Check if image file is a actual image or fake image
            if ($uploadOk==1) {
                $check = getimagesize($_FILES["ProfilePhoto"]["tmp_name"]);
                if($check !== false) {
                    if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $ProfilePhotoFileName)) {
                        $uploadOk = 1;
                        $ProfilePhoto_FileName=$ProfilePhotoFileName;
                    } else {
                        $ProfilePhoto = "Sorry, there was an error uploading your file.";
                        $uploadOk = 0;
                    }
                } else {
                    $ProfilePhoto =  "File is not an image.";
                    $uploadOk = 0;
                }  
            }
            
            if ($uploadOk==0) {
                $error++;
            }
        }
        
        if (isset($_FILES['Attachment1']) && $_FILES['Attachment1']['error']==0) {
            
            $Attachment1FileName = strtolower($target_dir . time()."_attachement1_".basename($_FILES["Attachment1"]["name"]));
            $uploadOk = 1;
            
            $imageFileType = strtolower(pathinfo($Attachment1FileName,PATHINFO_EXTENSION));
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "zip" && $imageFileType != "rar" ) {
                $Attachment1 = "Sorry, only jpg, jpeg, png, zip, rar, pdf, doc & docx files are allowed.";
                $uploadOk = 0;
            }
                
            if ($uploadOk ==1 ) {
                if (move_uploaded_file($_FILES["Attachment1"]["tmp_name"], $Attachment1FileName)) {
                    $uploadOk = 1;
                    $Attachment1_FileName=$Attachment1FileName;
                } else {
                    $Attachment1 =  "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
            } 
            
            if ($uploadOk==0) {
                $error++;
            }
        }

        if (isset($_FILES['Attachment2']) && $_FILES['Attachment2']['error']==0) {
            
            $Attachment2FileName = strtolower($target_dir . time()."_attachement2_".basename($_FILES["Attachment2"]["name"]));
            $uploadOk = 1;
            
            $imageFileType = strtolower(pathinfo($Attachment2FileName,PATHINFO_EXTENSION));
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "zip" && $imageFileType != "rar" ) {
                $Attachment2 = "Sorry, only jpg, jpeg, png, zip, rar, pdf, doc & docx files are allowed.";
                $uploadOk = 0;
            }
            
            if ($uploadOk ==1 ) {
                if (move_uploaded_file($_FILES["Attachment2"]["tmp_name"], $Attachment2FileName)) {
                    $uploadOk = 1;
                    $Attachment2_FileName=$Attachment2FileName;
                } else {
                    $Attachment2 =  "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
            } 
            
            if ($uploadOk==0) {
                $error++;
            }
        }
        
        if ($error==0) {
            
            $district_name = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictNameID']."'");
            $state_name = $mysql->select("select * from _tbl_master_statenames where DistrictNameID='".$_POST['StateNameID']."'");
            
            $mysql->insert("_tbl_master_advocates",array("AdvocateName"          => trim($_POST['AdvocateName']),
                                                         "Gender"                => trim($_POST['Gender']),
                                                         "YearOfBirth"           => trim($_POST['YearOfBirth']),
                                                         "Qualification"         => trim($_POST['Qualification']),
                                                         "RatePerHour"           => trim($_POST['RatePerHour']),
                                                         "PersonalPanCardNumber" => trim($_POST['PersonalPanCardNumber']),
                                                         "Category"              => trim($_POST['Category']),
                                                         "AddressLine"           => trim($_POST['AddressLine']),
                                                         "StateNameID"           => trim($_POST['StateNameID']),
                                                         "StateNAme"             => $state_name[0]['StateName'], 
                                                         "DistrictNameID"        => trim($_POST['DistrictNameID']),
                                                         "DistrictName"          => $district_name[0]['DistrictName'],
                                                         "PlaceName"             => trim($_POST['PlaceName']),
                                                         "MobileNumber"          => trim($_POST['MobileNumber']),
                                                         "PhoneNumber1"          => trim($_POST['PhoneNumber1']),
                                                         "PhoneNumber2"          => trim($_POST['PhoneNumber2']),
                                                         "EmailID"               => trim($_POST['EmailID']),
                                                         "WhatsappNumber"        => trim($_POST['WhatsappNumber']),
                                                         "TelegramID"            => trim($_POST['TelegramID']),
                                                         "ProfilePhoto"          => $ProfilePhoto_FileName,
                                                         "Attachment1"           => $Attachment1_FileName,
                                                         "Attachment2"           => $Attachment2FileName,
                                                         "LoginName"             => trim($_POST['LoginName']),
                                                         "LoginPassword"         => trim($_POST['LoginPassword']),
                                                         "CompanyName"           => trim($_POST['CompanyName']),
                                                         "CompanyGSTIN"          => trim($_POST['CompanyGSTIN']),
                                                         "CompanyPAN"            => trim($_POST['CompanyPAN']),
                                                         "CompanyAddress"        => trim($_POST['CompanyAddress']),
                                                         "Remarks"               => trim($_POST['Remarks']),
                                                         "CreatedOn"             => date("Y-m-d H:i:s"),
                                                         "IsActive"              => "1"));
            unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Advocate account created.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }  else {
            ?>
               <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to create Advocate account.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
    }
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_advocate" name="create_advocate" onsubmit="return formvalidation('create_advocate');" enctype="multipart/form-data">
                        <div class="row g-3  mb-3">
                            <div class="col-md-9">
                                <label class="form-label" for="validationCustom01">Advocate's Name</label>
                                <input class="form-control" id="AdvocateName" name="AdvocateName" type="text" placeholder="Advocate's Name"  value="<?php echo isset($_POST['AdvocateName']) ? $_POST['AdvocateName'] : "";?>">
                                <div id="ErrAdvocateName" style="color:red"><?php echo isset($AdvocateName) ? $AdvocateName : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                           <div class="col-md-2">
                                <label class="form-label" for="validationCustom01">Gender</label>
                                <select class="form-select" name="Gender" id="Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">FeMale</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="validationCustom01">Year of Birth</label>
                                <select class="form-select" name="YearOfBirth" id="YearOfBirth">
                                     <option vlaue="0">Select Year</option>
                                     <?php for($i=1950;$i<=date("Y")-22;$i++) {?>
                                     <option value="<?php echo $i;?>" <?php echo ($_POST['YearOfBirth']==$i) ? ' selected="selected" ' : '';?> ><?php echo $i;?>
                                     <?php } ?>
                                </select>
                                <div id="ErrYearOfBirth" style="color:red"><?php echo isset($YearOfBirth) ? YearOfBirth : "";?></div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label" for="validationCustom01">Qualifications</label>
                                <input class="form-control" id="Qualification" name="Qualification" type="text" placeholder="Qualifications"  value="<?php echo isset($_POST['Qualification']) ? $_POST['Qualification'] : "";?>">
                                <div id="ErrQualification" style="color:red"><?php echo isset($Qualification) ? $Qualification : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-2">
                                <label class="form-label" for="validationCustom01">Hourly Rate (INR)</label>
                                <input class="form-control" id="RatePerHour" name="RatePerHour" type="text" placeholder="Rate /Hour"  value="<?php echo isset($_POST['RatePerHour']) ? $_POST['RatePerHour'] : "";?>">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="validationCustom01">PAN Number</label>
                                <input class="form-control" id="PersonalPanCardNumber" name="PersonalPanCardNumber" type="text" placeholder="Personal PAN"  value="<?php echo isset($_POST['PersonalPanCardNumber']) ? $_POST['PersonalPanCardNumber'] : "";?>">
                            </div>

                             <div class="col-md-8">
                                <label class="form-label" for="validationCustom01">Category</label>
                                <input class="form-control" id="Category" name="Category" type="text" placeholder="Category"  value="<?php echo isset($_POST['Category']) ? $_POST['Category'] : "";?>">
                            </div>
                            </div>
                        <h6 style="margin-top:50px">Contact Details</h6>
                        <hr>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Address Line</label>
                                <input class="form-control" name="AddressLine" id="AddressLine" type="text" placeholder="AddressLine"  value="<?php echo isset($_POST['AddressLine']) ? $_POST['AddressLine'] : "";?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                               <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Place Name</label>
                                <input class="form-control" name="PlaceName" id="PlaceName" type="text" placeholder="Place Name"  value="<?php echo isset($_POST['PlaceName']) ? $_POST['PlaceName'] : "";?>">
                            </div>
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">State Name</label>
                                <select class="form-select" name="StateNameID" id="StateNameID" onchange="getDistrictNames()">
                                <?php $StateNames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName");?>
                                    <option value="0">Select State Name</option>
                                    <?php foreach($StateNames as $StateName) { ?>
                                        <option value="<?php echo $StateName['StateNameID'];?>" <?php echo $_POST['StateNameID']==$StateName['StateNameID'] ? ' selected="selected" ' : '';?> ><?php echo $StateName['StateName'];?></option>
                                    <?php } ?>
                                </select>
                                <div id="ErrDistrictName" style="color:red"><?php echo isset($DistrictName) ? $DistrictName : "";?></div>
                            </div>
                            <div class="col-md-3">
                                <div id="district_nodata">
                                <label class="form-label" for="validationCustom03">District Name</label>
                                <select class="form-select" name="DistrictNameID" id="DistrictNameID" disabled="disabled">
                                    <option value="">Select District Name</option>
                                </select>
                                </div>
                                <div id="district_withdata" style="display: none;">
                                    <label class="form-label" for="validationCustom03">District Name</label>
                                    <select class="form-select" name="DistrictNameID" id="DistrictNameID" disabled="disabled">
                                        <option value="0">Select District Name</option>
                                    </select>
                                    <div id="ErrDistrictName" style="color:red"><?php echo isset($DistrictName) ? $DistrictName : "";?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Mobile Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" onkeypress="return isNumber(event)"  id="MobileNumber" name="MobileNumber" type="text" placeholder="Mobile Number" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>">
                                </div>
                                <div id="ErrMobileNumber" style="color:red"><?php echo isset($MobileNumber) ? $MobileNumber : "";?></div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Phone Number (1)</label>
                                <input class="form-control" name="PhoneNumber1" id="PhoneNumber1" type="text" placeholder="Phone Number (1)"  value="<?php echo isset($_POST['PhoneNumber1']) ? $_POST['PhoneNumber1'] : "";?>">
                            </div>
                               <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Phone Number (2)</label>
                                <input class="form-control" name="PhoneNumber2" id="PhoneNumber2" type="text" placeholder="Phone Number (2)"  value="<?php echo isset($_POST['PhoneNumber2']) ? $_POST['PhoneNumber2'] : "";?>">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                           <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control" id="EmailID" name="EmailID" type="email" placeholder="jhon@gmail.com"  value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : "";?>">
                                <div id="ErrEmailID" style="color:red"><?php echo isset($EmailID) ? $EmailID : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Whatsapp Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" onkeypress="return isNumber(event)"  id="WhatsappNumber" name="WhatsappNumber" type="text" placeholder="Whatsapp Number" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] : "";?>">
                                </div>
                                <div id="ErrWhatsappNumber" style="color:red"><?php echo isset($WhatsappNumber) ? $WhatsappNumber : "";?></div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Telegram ID</label>
                                <input class="form-control" name="TelegramID" id="TelegramID" type="text" placeholder="Telegram ID"  value="<?php echo isset($_POST['TelegramID']) ? $_POST['TelegramID'] : "";?>">
                            </div>
                        </div>
                        
                        <h6 style="margin-top:50px">Attachment Details</h6>
                        <hr>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Profile Phtoto</label>
                                <input class="form-control" name="ProfilePhoto" id="ProfilePhoto" type="file" >
                                <div id="ErrProfilePhoto" style="color:red"><?php echo isset($ProfilePhoto) ? $ProfilePhoto : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Doc Attachment (1)</label>
                                <input class="form-control" name="Attachment1" id="Attachment1" type="file" >
                                <div id="ErrAttachment1" style="color:red"><?php echo isset($Attachment1) ? $Attachment1 : "";?></div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Doc Attachment (2)</label>
                                <input class="form-control" name="Attachment2" id="Attachment2" type="file">
                                <div id="ErrAttachment2" style="color:red"><?php echo isset($Attachment2) ? $Attachment2 : "";?></div>
                            </div>
                        </div>
                        
                        <h6 style="margin-top:50px">Login Details</h6>
                        <hr>
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Login UserName</label>&nbsp;<a class="example-popover" type="button" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Only allowe alphabets and numbers. Not allow space and other characters"><i class="fa fa-question-circle"></i></a>
                                <input class="form-control" name="LoginName" id="LoginName" type="text" placeholder="Login User Name" value="<?php echo isset($_POST['LoginName']) ? $_POST['LoginName'] : "";?>">
                                <div id="ErrLoginName" style="color:red"><?php echo isset($LoginName) ? $LoginName : "";?></div>
                            </div>
                            <div class="col-md-6">                   
                                <label class="form-label" for="validationCustom03">Login Password</label>
                                <input class="form-control" name="LoginPassword" id="LoginPassword" type="text" placeholder="Login Password" value="<?php echo isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] : "";?>">
                                <div id="ErrLoginPassword" style="color:red"><?php echo isset($LoginPassword) ? $LoginPassword : "";?></div>
                            </div>
                        </div>
                        
                         <h6 style="margin-top:50px">Business Details</h6>
                        <hr>
                        
                        <div class="row g-3  mb-3">
                         <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Company Name</label>
                                <input class="form-control" id="CompanyName" name="CompanyName" type="text" placeholder="Company Name"  value="<?php echo isset($_POST['CompanyName']) ? $_POST['CompanyName'] : "";?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">GSTIN  Number</label>
                                <input class="form-control" id="CompanyGSTIN" name="CompanyGSTIN" type="text" placeholder="Company GSTIN"  value="<?php echo isset($_POST['CompanyGSTIN']) ? $_POST['CompanyGSTIN'] : "";?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">PAN Number</label>
                                <input class="form-control" id="CompanyPAN" name="CompanyPAN" type="text" placeholder="Company PAN"  value="<?php echo isset($_POST['CompanyPAN']) ? $_POST['CompanyPAN'] : "";?>">
                            </div>
                         </div>
                         <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Company Address</label>
                                <input class="form-control" name="CompanyAddress" id="CompanyAddress" type="text" placeholder="Company Address"  value="<?php echo isset($_POST['CompanyAddress']) ? $_POST['CompanyAddress'] : "";?>">
                            </div>
                        </div>
                        <h6 style="margin-top:50px">&nbsp;</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Remarks</label>
                                <input class="form-control" name="Remarks" id="Remarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <a href="dashboard.php?action=Advocates/list" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Create Advocate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!--<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Vertically centered</button>-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to create advocate account.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal-->               
