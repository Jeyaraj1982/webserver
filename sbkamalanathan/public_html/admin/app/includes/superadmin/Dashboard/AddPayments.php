<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        &nbsp;
        </div>
    </div>
</div>

<div class="container-fluid">
<?php                                                                                
    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'");

    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if (strlen(trim($_POST['Amount']))==0) {
            $Amount = "Please enter Amount";
            $error++;
        }
        
        if ($_POST['TxnDate']==0) {
            $TxnDate = "Please select date";
            $error++;
        }
        
        $AttachmentFileName = "";
        $Attachment_FileName = "";
        
        $target_dir = "assets/uploads/cases/";
        
        if (!(is_dir($target_dir.$CaseDetails[0]['CaseID']))) {
            mkdir($target_dir.$CaseDetails[0]['CaseID']);
        }
        $target_dir.=$CaseDetails[0]['CaseID'];

        
        if (!(is_dir($target_dir."/AmountRecevied"))) {
            mkdir($target_dir."/AmountRecevied");
        }
        $target_dir.="/AmountRecevied/";
        
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
            $id = $mysql->insert("_tbl_cases_receviedpayments",array("CaseID"                 => $CaseDetails[0]['CaseID'],
                                                               "TxnDate"                => trim($_POST['TxnDate']),
                                                               "Amount"                 => trim($_POST['Amount']),
                                                               "Description"            => trim($_POST['Description']),
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
                                                           "AttachmentFor"          => "AmountRecevied",
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
  <form action="" method="post" id="create_case_amountreceved" name="create_case_amountreceved" onsubmit="return formvalidation('create_case_amountreceved');" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h6 style="margin-bottom:30px">Case Amount Recevied</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom01">Recevied Amount</label>
                                <input class="form-control" id="Amount" name="Amount" type="text" placeholder="Amount"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>">
                                <div id="ErrAmount" style="color:red"><?php echo isset($Amount) ? $Amount : "";?></div>
                            </div>
                           <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Date</label>
                                <div class="col-xl-12 col-sm-12">
                                    <div class="input-group">
                                    <input class="datepicker-here form-control digits"  name="TxnDate" id="TxnDate" type="text" data-language="en" value="<?php echo isset($_POST['TxnDate']) ? $_POST['TxnDate'] : date("Y-m-d");?>" data-date-format="yyyy-mm-dd">
                                </div>
                                <div id="ErrTxnDate" style="color:red"><?php echo isset($TxnDate) ? $TxnDate : "";?></div>
                          </div>
                             
                        </div>
                        </div>
                          
                         
                         
                     
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Description</label>
                                <input class="form-control" name="Description" id="Description" type="text" placeholder="Description"  value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?>">
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
                                <a href="dashboard.php" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Save</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
           <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                       <h6 style="margin-bottom:30px">Case Summary</h6>
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