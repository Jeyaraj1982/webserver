<div class="container-fluid">
<?php                                                                                
    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'");

    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if (strlen(trim($_POST['FillingDate']))==0) {
            $FillingDate = "Please select date";
            $error++;
        }
        
        if (trim($_POST['IANumber'])=="") {
            $IANumber = "Please enter IA Number";
            $error++;
        }
        
        $AttachmentFileName = "";
        $Attachment_FileName = "";
        
        $target_dir = "assets/uploads/cases/";
        
        if (!(is_dir($target_dir.$CaseDetails[0]['CaseID']))) {
            mkdir($target_dir.$CaseDetails[0]['CaseID']);
        }
        $target_dir.=$CaseDetails[0]['CaseID'];

        
        if (!(is_dir($target_dir."/IADetails"))) {
            mkdir($target_dir."/IADetails");
        }
        $target_dir.="/IADetails/";
        
        if (isset($_FILES['Attachment']) && $_FILES['Attachment']['error']==0) {
            
            $AttachmentFileName = $target_dir .strtolower(time().basename($_FILES["Attachment"]["name"]));   
            if (move_uploaded_file($_FILES["Attachment"]["tmp_name"], $AttachmentFileName)) {
                $Attachment_FileName=$AttachmentFileName;
                 $FileName = basename($_FILES["Attachment"]["name"]);
            } else {
                $Attachment = "Sorry, there was an error uploading your file.";
                $error++;
            }      
        }
        
        if ($error==0) {
           $id =   $mysql->insert("_tbl_cases_ia_details",array("CaseID"                 => $CaseDetails[0]['CaseID'],
                                                    "FillingDate"                 => trim($_POST['FillingDate']),
                                                    "IANumber"            => trim($_POST['IANumber']),
                                                    "RestOfTheAdvocates"            => trim($_POST['RestOfTheAdvocates']),
                                                    "CreatedOn"              => date("Y-m-d H:i:s"),
                                                    "AttachedByAdminID"      => (isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['AdminID'] : 0),
                                                    "AttachedByAdminName"    => (isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['AdminName'] : ""),
                                                    "AttachedByStaffID"      => (isset($_SESSION['User']['StaffID']) ? $_SESSION['User']['StaffID'] : 0),
                                                    "AttachedByStaffName"    => (isset($_SESSION['User']['StaffID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['StaffName'] : ""),
                                                    "AttachedByAdvocateID"   => (isset($_SESSION['User']['AdvocateID']) ? $_SESSION['User']['AdvocateID'] : 0),
                                                    "AttachedByAdvocateName" => (isset($_SESSION['User']['AdvocateID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['AdvocateName'] : ""),
                                                    "IsActive"               => "1"));
           if ($Attachment_FileName!="") {
              $mysql->insert("_tbl_cases_attachments",array("CaseID"                 => $CaseDetails[0]['CaseID'],
                                                           "AttachmentFor"          => "IADetails",
                                                           "RecordID"               => $id,
                                                           "FileName"               => $FileName,
                                                           "AttachmentFile"         => $Attachment_FileName,
                                                           "AttachedOn"             => date("Y-m-d H:i:s"),
                                                           "AttachedByAdminID"      => (isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['AdminID'] : 0),
                                                           "AttachedByAdminName"    => (isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['AdminName'] : ""),
                                                           "AttachedByStaffID"      => (isset($_SESSION['User']['StaffID']) ? $_SESSION['User']['StaffID'] : 0),
                                                           "AttachedByStaffName"    => (isset($_SESSION['User']['StaffID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['StaffName'] : ""),
                                                           "AttachedByAdvocateID"   => (isset($_SESSION['User']['AdvocateID']) ? $_SESSION['User']['AdvocateID'] : 0),
                                                           "AttachedByAdvocateName" => (isset($_SESSION['User']['AdvocateID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['AdvocateName'] : ""),
                                                           "IsActive"               => "1")) ;
          }
            echo $mysql->error;
            unset($_POST);
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                            <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Information saved.</p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  else { ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                            <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to save information.</p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>
  <form action="" method="post" id="create_case_iadetails" name="create_case_iadetails" onsubmit="return formvalidation('create_case_iadetails');" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="margin-bottom:30px">IA Details Entry</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Filing Date</label>
                                <input  class="datepicker-here form-control digits" readonly="readonly"   data-language="en" data-date-format="yyyy-mm-dd" id="FillingDate" name="FillingDate" type="text" placeholder="Date" style="background:#fff"  value="<?php echo isset($_POST['FillingDate']) ? $_POST['FillingDate'] : "";?>">
                                <div id="ErrFillingDate" style="color:red"><?php echo isset($FillingDate) ? $FillingDate : "";?></div>
                            </div>
                             <div class="col-md-8">
                                <label class="form-label" for="validationCustom03">IA Number</label>
                                <input type="text" class="form-control" name="IANumber" id="IANumber" type="text" placeholder="IA Number" value="<?php echo isset($_POST['IANumber']) ? $_POST['IANumber'] : "";?>">
                                <div id="ErrIANumber" style="color:red"><?php echo isset($IANumber) ? $IANumber : "";?></div>
                            </div> 
                        </div>
                        
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Rest Of The Advocates</label>
                                <textarea class="form-control" name="RestOfTheAdvocates" id="RestOfTheAdvocates" type="text" placeholder="RestOfTheAdvocates"><?php echo isset($_POST['RestOfTheAdvocates']) ? $_POST['RestOfTheAdvocates'] : "";?></textarea>
                            </div>
                        </div>
                      
                        
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Attachments</label>
                                <input class="form-control" name="Attachment" id="Attachment" type="file" >
                                <div id="ErrAttachment" style="color:red"><?php echo isset($Attachment) ? $Attachment : "";?></div>
                            </div>
                                                  
                        </div>
                        
                         <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <a href="dashboard.php?action=Cases/view&sa=IADetails/list&case=<?php echo $_GET['case'];?>" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Save</button>
                            </div>
                        </div>
                </div>
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
                <p>Are you want to save information.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal-->