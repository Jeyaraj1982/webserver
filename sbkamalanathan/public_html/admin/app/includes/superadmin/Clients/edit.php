<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Client Information</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
<?php
if (isset($_POST['profilePhotoRemove'])) {
     $mysql->execute("update _tbl_master_clients set ProfilePhoto = '' where md5(concat(CreatedOn,ClientID))='".$_GET['edit']."'");   
   ?>
         <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>profile photo removed.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
   <?php  
}
$data = $mysql->select("select * from _tbl_master_clients  where md5(concat(CreatedOn,ClientID))='".$_GET['edit']."'");

    $ClientTypeNames = $mysql->select("select * from _tbl_master_clienttypes where IsActive='1' order by ClientTypeName");
    if (isset($_POST['CreateBtn'])) {
     
         if ($_POST['isDelete']==0) {    
        $error=0;
        if (strlen(trim($_POST['ClientName']))==0) {
            $ClientName = "Please enter Client's Name";
            $error++;
        }
        
        if ($_POST['ClientTypeID']==0) {
            $ClientType = "Please select Client Type";
            $error++;
        }
        
        if ($_POST['ReligionNameID']==0) {
            $ReligionNameID = "Please select Religion Name";
            $error++;
        }                                
        
        if ($_POST['NationalityID']==0) {
            $NationalityID = "Please select Nationality";
            $error++;
        }
        
        if ($_POST['Gender']=="0") {
          //  $Gender = "Please select Gender";
          //  $error++;
        }
        
        if ($_POST['StateNameID']==0) {
            $StateNameID = "Please select State Name";
            $error++;
        } else {
              if ($_POST['DistrictNameID']==0) {
                $DistrictNameID = "Please select District Name";
                $error++;
              }
        }
        
        if (strlen(trim($_POST['EmailID']))>0) {
            if (!filter_var($_POST['EmailID'], FILTER_VALIDATE_EMAIL)) {
               $EmailID = "Please enter valid Email ID";
               $error++;
            } else {
                $duplicate = $mysql->select("select * from _tbl_master_clients where ClientID<>'".$data[0]['ClientID']."' and EmailID='".trim($_POST['EmailID'])."'");
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
                $duplicate = $mysql->select("select * from _tbl_master_clients where  ClientID<>'".$data[0]['ClientID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
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
                $duplicate = $mysql->select("select * from _tbl_master_clients where  ClientID<>'".$data[0]['ClientID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                if (sizeof($duplicate)>0) {
                    $WhatsappNumber = "Whatsapp number already exists";
                    $error++;  
                }
            }
        }
        
        $ProfilePhotoFileName = "";
        $ProfilePhoto_FileName = "";
        
        $target_dir = "assets/uploads/clients/";
            
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
        
        if ($error==0) {
            //ProfilePhoto"               => $ProfilePhoto_FileName,
            $client_type = $mysql->select("select * from _tbl_master_clienttypes where ClientTypeID='".$_POST['ClientTypeID']."'");
            $nationality_names = $mysql->select("select * from _tbl_master_nationality where NationalityID='".$_POST['NationalityID']."'");
            $religion_names    = $mysql->select("select * from _tbl_master_religionnames where ReligionNameID='".$_POST['ReligionNameID']."'");
            $StateNameData     = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['StateNameID']."'");
            $DistrictNameData  = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictNameID']."'");
            
            $mysql->execute("update _tbl_master_clients set ClientName                 = '".trim($_POST['ClientName'])."',
                                                            FatherName                 = '".trim($_POST['FatherName'])."',
                                                            ClientTypeID               = '".trim($_POST['ClientTypeID'])."',
                                                            ClientTypeName             = '".$client_type[0]['ClientTypeName']."',
                                                            Gender                     = '".trim($_POST['Gender'])."',
                                                            DateOfBirth                = '".trim($_POST['DateOfBirth'])."',
                                                            EmailID                    = '".trim($_POST['EmailID'])."',
                                                            MobileNumber               = '".trim($_POST['MobileNumber'])."',
                                                            PersonalAlternativeNumbers = '".trim($_POST['PersonalAlternativeNumbers'])."',
                                                            WhatsappNumber             = '".trim($_POST['WhatsappNumber'])."',
                                                            ReligionNameID             = '".trim($_POST['ReligionNameID'])."',
                                                            ReligionName               = '".$religion_names[0]['ReligionName']."',
                                                            NationalityID              = '".trim($_POST['NationalityID'])."',
                                                            NationalityName            = '".$nationality_names[0]['NationalityName']."',
                                                            PersonalRemarks            = '".trim($_POST['PersonalRemarks'])."',
                                                            ContactAddressLine1        = '".trim($_POST['ContactAddressLine1'])."',
                                                            ContactAddressLine2        = '".trim($_POST['ContactAddressLine2'])."',
                                                            ContactAddressLine3        = '".trim($_POST['ContactAddressLine3'])."',
                                                            ContactPincode             = '".trim($_POST['ContactPincode'])."',
                                                            StateNameID                = '".trim($_POST['StateNameID'])."',
                                                            StateName                  = '".trim($StateNameData[0]['StateName'])."',
                                                            DistrictNameID             = '".trim($_POST['DistrictNameID'])."',
                                                            DistrictName               = '".trim($DistrictNameData[0]['DistrictName'])."',
                                                            ContactAdditonalNumbers    = '".trim($_POST['ContactAdditonalNumbers'])."',
                                                            ContactRemarks             = '".trim($_POST['ContactRemarks'])."',
                                                            OfficeAddressLine1         = '".trim($_POST['OfficeAddressLine1'])."',
                                                            OfficeAddressLine2         = '".trim($_POST['OfficeAddressLine2'])."',
                                                            OfficeAddressLine3         = '".trim($_POST['OfficeAddressLine3'])."',
                                                            OfficePincode              = '".trim($_POST['OfficePincode'])."',
                                                            OfficeAdditonalNumbers     = '".trim($_POST['OfficeAdditonalNumbers'])."',
                                                            OfficeRemarks              = '".trim($_POST['OfficeRemarks'])."',
                                                            IsActive                   = '".$_POST['IsActive']."' where md5(concat(CreatedOn,ClientID))='".$_GET['edit']."'");
            
            if ($ProfilePhoto_FileName!="") {
                 $mysql->execute("update _tbl_master_clients set ProfilePhoto = '".$ProfilePhoto_FileName."' where md5(concat(CreatedOn,ClientID))='".$_GET['edit']."'");
            }
            //echo $mysql->error;
            
            unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Client account updated.</p>
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
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update client account.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
         } else {
               $mysql->execute("update _tbl_master_clients set IsActive          = '2',
                                                      DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                      where  md5(concat(CreatedOn,ClientID))='".$_GET['edit']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Client information deleted.</p>
                      <br>
                      <a href="dashboard.php?action=Clients/list" class="btn btn-success">Continue</a>
                    </div>
                    </div>
              </div>
              </div>
              <style>
                #create_client{display:none}
              </style>
               <?php
        }
    }
    
    
    $data = $mysql->select("select * from _tbl_master_clients  where md5(concat(CreatedOn,ClientID))='".$_GET['edit']."'");
?>
  <form action="" method="post" id="create_client" name="create_client" onsubmit="return formvalidation('create_client');" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="margin-bottom:20px">Personal Details</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-9">
                                <label class="form-label" for="validationCustom01">Client's Name</label>
                                <input class="form-control" id="ClientName" name="ClientName" type="text" placeholder="Client's Name"  value="<?php echo isset($_POST['ClientName']) ? $_POST['ClientName'] : $data[0]['ClientName'];?>">
                                <div id="ErrClientName" style="color:red"><?php echo isset($ClientName) ? $ClientName : "";?></div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom01">Client Type</label>
                                <select class="form-select" id="ClientTypeID" name="ClientTypeID">
                                    <option value="0">Select ClientType</option>
                                    <?php foreach($ClientTypeNames as $ClientTypeName) { ?>
                                        <?php if (isset($_POST['ClientTypeID'])) {?>
                                        <option value="<?php echo $ClientTypeName['ClientTypeID'];?>" <?php echo $ClientTypeName['ClientTypeID']==$_POST['ClientTypeID'] ? ' selected="selected" ' : '';?> ><?php echo $ClientTypeName['ClientTypeName'];?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $ClientTypeName['ClientTypeID'];?>" <?php echo $ClientTypeName['ClientTypeID']==$data[0]['ClientTypeID'] ? ' selected="selected" ' : '';?> ><?php echo $ClientTypeName['ClientTypeName'];?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <div id="ErrClientTypeID" style="color:red"><?php echo isset($ClientTypeID) ? $ClientTypeID : "";?></div>
                            </div>
                        </div>
                         <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Fahter/Husband Name</label>
                                <input class="form-control" name="FatherName" id="FatherName" type="text" placeholder="Father/Husband Name" value="<?php echo isset($_POST['FatherName']) ? $_POST['FatherName'] : $data[0]['FatherName'];?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Gender</label>
                                <select class="form-select" id="Gender" name="Gender">
                                    <option value="0">Select Gender</option>
                                    <option value="Male" <?php echo $data[0]['Gender']=="Male" ? ' Selected="selected" ' : "";?>>Male</option>
                                    <option value="Female" <?php echo $data[0]['Gender']=="Female" ? ' Selected="selected" ' : "";?>>Female</option>
                                </select>
                                <div id="ErrGender" style="color:red"><?php echo isset($Gender) ? $Gender : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Date of Birth</label>
                                <div class="col-xl-12 col-sm-12">
                                    <div class="input-group">
                                    <input class="datepicker-here form-control digits"  name="DateOfBirth" id="DateOfBirth" type="text" data-language="en" value="<?php echo isset($_POST['DateOfBirth']) ? $_POST['DateOfBirth'] : $data[0]['DateOfBirth'];?>">>
                                </div>
                                <div id="ErrDateOfBirth" style="color:red"><?php echo isset($DateOfBirth) ? $DateOfBirth : "";?></div>
                          </div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control" id="EmailID" name="EmailID" type="email" placeholder="jhon@gmail.com"  value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : $data[0]['EmailID'];?>">
                                <div id="ErrEmailID" style="color:red"><?php echo isset($EmailID) ? $EmailID : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Mobile Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" onkeypress="return isNumber(event)"  id="MobileNumber" name="MobileNumber" type="text" placeholder="Mobile Number" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>">
                                </div>
                                <div id="ErrMobileNumber" style="color:red"><?php echo isset($MobileNumber) ? $MobileNumber : "";?></div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Alernative Contact Numbers</label>
                                <input class="form-control" name="PersonalAlternativeNumbers" id="PersonalAlternativeNumbers" type="text" placeholder="Alernative Contact Numbers"  value="<?php echo isset($_POST['PersonalAlternativeNumbers']) ? $_POST['PersonalAlternativeNumbers'] : $data[0]['PersonalAlternativeNumbers'];?>">
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Whatsapp Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" onkeypress="return isNumber(event)"  id="WhatsappNumber" name="WhatsappNumber" type="text" placeholder="Whatsapp Number" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] : $data[0]['WhatsappNumber'];?>">
                                </div>
                                <div id="ErrWhatsappNumber" style="color:red"><?php echo isset($WhatsappNumber) ? $WhatsappNumber : "";?></div>
                            </div>
                        </div>
                   
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Profile Phtoto</label>
                                <?php if (strlen(trim($data[0]['ProfilePhoto']))>0) { ?>
                                    <br><img src="<?php echo $data[0]['ProfilePhoto'];?>" style="height:100px;"><br>
                                    <br><input onclick="removePhoto()" type="button" value="Remove" class="btn btn-danger btn-sm"><br><br>
                                <?php } ?>
                                <input class="form-control" name="ProfilePhoto" id="ProfilePhoto" type="file" >

                                <div id="ErrProfilePhoto" style="color:red"><?php echo isset($ProfilePhoto) ? $ProfilePhoto : "";?></div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Religion</label>
                                <?php $religionnames = $mysql->select("select * from _tbl_master_religionnames where IsActive='1' order by ReligionName"); ?>
                                <select class="form-select" id="ReligionNameID" name="ReligionNameID">
                                    <option value="0">Select Religion</option>
                                    <?php foreach($religionnames as $religionname) { ?>
                                        <option value="<?php echo $religionname['ReligionNameID'];?>" <?php echo $religionname['ReligionNameID']==$data[0]['ReligionNameID'] ? ' selected="selected" ' : '';?> ><?php echo $religionname['ReligionName'];?></option>
                                    <?php } ?>
                                </select>
                                <div id="ErrReligionNameID" style="color:red"><?php echo isset($ReligionNameID) ? $ReligionNameID : "";?></div>
                            </div>
                                                                                 
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Nationality</label>
                                <?php $nationalities = $mysql->select("select * from _tbl_master_nationality where IsActive='1' order by NationalityName"); ?>
                                <select class="form-select" id="NationalityID" name="NationalityID">
                                    <option value="0">Select Nationality</option>
                                    <?php foreach($nationalities as $nationality) { ?>
                                        <option value="<?php echo $nationality['NationalityID'];?>" <?php echo $nationality['NationalityID']==$data[0]['NationalityID'] ? ' selected="selected" ' : '';?> ><?php echo $nationality['NationalityName'];?></option>
                                    <?php } ?>
                                </select>
                                <div id="ErrNationalityID" style="color:red"><?php echo isset($NationalityID) ? $NationalityID : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Remarks</label>
                                <input class="form-control" name="PersonalRemarks" id="PersonalRemarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['PersonalRemarks']) ? $_POST['PersonalRemarks'] : $data[0]['PersonalRemarks'];?>">
                            </div>
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Is Active</label>
                                <select  class="form-select" name="IsActive" id="IsActive" >
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Yes</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >No</option>
                                </select>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                  <h6 style="margin-bottom:20px">Contact Details</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom01">Address Line 1</label>
                                <input class="form-control" id="ContactAddressLine1" name="ContactAddressLine1" type="text" placeholder="Address Line 1"  value="<?php echo isset($_POST['ContactAddressLine1']) ? $_POST['ContactAddressLine1'] : $data[0]['ContactAddressLine1'];?>">
                                <div id="ErrContactAddressLine1" style="color:red"><?php echo isset($ContactAddressLine1) ? $ContactAddressLine1 : "";?></div>
                            </div>
                        </div>
                          <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom01">Address Line 2</label>
                                <input class="form-control" id="ContactAddressLine2" name="ContactAddressLine2" type="text" placeholder="Address Line 2"  value="<?php echo isset($_POST['ContactAddressLine2']) ? $_POST['ContactAddressLine2'] : $data[0]['ContactAddressLine2'];?>">
                                <div id="ErrContactAddressLine2" style="color:red"><?php echo isset($ContactAddressLine2) ? $ContactAddressLine2 : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-9">
                                <label class="form-label" for="validationCustom03">Address Line 3</label>
                                <input class="form-control" name="ContactAddressLine3" id="ContactAddressLine3" type="text" placeholder="Address Line 3"  value="<?php echo isset($_POST['ContactAddressLine3']) ? $_POST['ContactAddressLine3'] : $data[0]['ContactAddressLine3'];?>">
                            </div>
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">ContactPincode</label>
                                <input class="form-control" name="ContactPincode" id="ContactPincode" type="text" placeholder="Pincode"  value="<?php echo isset($_POST['ContactPincode']) ? $_POST['ContactPincode'] : $data[0]['ContactPincode'];?>">
                            </div>
                        </div>
                     
                       <script>
    function getDistrictNamesList(StateID,DivID,Selected) {
        $.ajax({url:'webservice.php?action=getDistrictNamesList&Selected='+Selected+'&DivID='+DivID+'&rand='+Math.random()+'&StateNameID='+StateID,success:function(data){
            $('#ajax_getDistrictNamesList').html(data);
        }});
    }
    
</script> 
                        <div class="row g-3 mb-3">
                        <div class="col-md-6">
        <label class="form-label" for="validationCustom01">State Name</label>
        <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
        <select class="form-select" id="StateNameID" name="StateNameID" onchange="getDistrictNamesList($(this).val(),'DistrictNameID',0)">
            <option value="0">Select State</option>
            <?php foreach($statenames as $statename) {?>
            <option value="<?php echo $statename['StateNameID'];?>" <?php echo ($statename['StateNameID']==$data[0]['StateNameID']) ? " selected='selected' " : ""; ?>><?php echo $statename['StateName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrStateNameID" style="color:red"><?php echo isset($StateNameID) ? $StateNameID : "";?></div>
        <span id="ajax_getDistrictNamesList"></span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="validationCustom01">District Name</label>
        <select class="form-select" id="DistrictNameID" name="DistrictNameID">
            <option value="0">Select District</option>
        </select>
        <div id="ErrDistrictNameID" style="color:red"><?php echo isset($DistrictNameID) ? $DistrictNameID : "";?></div>
    </div>
                        </div>
                            
                        <div class="row g-3 mb-3">
                             <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Additional Contact numbers</label>
                                <input class="form-control" name="ContactAdditonalNumbers" id="ContactAdditonalNumbers" type="text" placeholder="Additional Contact Numbers"  value="<?php echo isset($_POST['ContactAdditonalNumbers']) ? $_POST['ContactAdditonalNumbers'] : $data[0]['ContactAdditonalNumbers'];?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Additional Remarks</label>
                                <input class="form-control" name="ContactRemarks" id="ContactRemarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['ContactRemarks']) ? $_POST['ContactRemarks'] : $data[0]['ContactRemarks'];?>">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                  <h6 style="margin-bottom:20px">Office Details</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom01">Address Line 1</label>
                                <input class="form-control" id="OfficeAddressLine1" name="OfficeAddressLine1" type="text" placeholder="Address Line 1"  value="<?php echo isset($_POST['OfficeAddressLine1']) ? $_POST['OfficeAddressLine1'] : $data[0]['OfficeAddressLine1'];?>">
                                <div id="ErrOfficeAddressLine1" style="color:red"><?php echo isset($OfficeAddressLine1) ? $OfficeAddressLine1 : "";?></div>
                            </div>
                        </div>
                          <div class="row g-3  mb-3">
                          
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom01">Address Line 2</label>
                                <input class="form-control" id="OfficeAddressLine2" name="OfficeAddressLine2" type="text" placeholder="Address Line 2"  value="<?php echo isset($_POST['OfficeAddressLine2']) ? $_POST['OfficeAddressLine2'] : $data[0]['OfficeAddressLine2'];?>">
                                <div id="ErrOfficeAddressLine2" style="color:red"><?php echo isset($OfficeAddressLine2) ? $OfficeAddressLine2 : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-9">
                                <label class="form-label" for="validationCustom03">Address Line 3</label>
                                <input class="form-control" name="OfficeAddressLine3" id="OfficeAddressLine3" type="text" placeholder="Address Line 3"  value="<?php echo isset($_POST['OfficeAddressLine3']) ? $_POST['OfficeAddressLine3'] : $data[0]['OfficeAddressLine3'];?>">
                            </div>
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Pincode</label>
                                <input class="form-control" name="OfficePincode" id="OfficePincode" type="text" placeholder="Pincode"  value="<?php echo isset($_POST['OfficePincode']) ? $_POST['OfficePincode'] : $data[0]['OfficePincode'];?>">
                            </div>
                        </div>
                         
                        <div class="row g-3 mb-3">
                             <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Additional Contact numbers</label>
                                <input class="form-control" name="OfficeAdditonalNumbers" id="OfficeAdditonalNumbers" type="text" placeholder="Additonal Contact Numbers"  value="<?php echo isset($_POST['OfficeAdditonalNumbers']) ? $_POST['OfficeAdditonalNumbers'] : $data[0]['OfficeAdditonalNumbers'];?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Additional Remarks</label>
                                <input class="form-control" name="OfficeRemarks" id="OfficeRemarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['OfficeRemarks']) ? $_POST['OfficeRemarks'] : $data[0]['OfficeRemarks'];?>">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-bottom:50px;">
     
                            <div class="col-md-12" style="text-align: right;">
                                 <input type="hidden" value="0" id="isDelete" name="isDelete">
                                 <a href="dashboard.php?action=Clients/list" class="btn btn-outline-primary">Back</a>
                                 <button class="btn btn-danger" type="button" onclick="confirmDelete()" name="deleteBtn" id="deleteBtn">Delete </button>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Update</button>
                            </div>
                       
        </div>
        
    </div>
    </form>
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
                <p>Are you want to update client information</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to <b style="color:red">delete</b> client information</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="button" onclick="$('#isDelete').val('1');formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="removeProfilePhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to <b style="color:red">delete</b> profile photo</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" name="profilePhotoRemove" type="submit">Yes, Continue</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Tooltips and popovers modal--> 
<script>
function confirmDelete() {
   $('#exampleModalCenterDelete').modal('show') ;
   
}

function removePhoto() {
   $('#removeProfilePhoto').modal('show') ; 
}

</script>
<script>
    setTimeout(function(){
    <?php if (isset($data)) { ?>
        getDistrictNamesList('<?php echo $data[0]['StateNameID'];?>','DistrictNameID','<?php echo $data[0]['DistrictNameID'];?>');
    <?php } ?>
    },2000);
</script>