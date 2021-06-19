<div class="container-fluid">
<?php                                                                                
    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'");

    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if (strlen(trim($_POST['EventTime']))==0) {
            $EventTime = "Please select date";
            $error++;
        }
        
        if (trim($_POST['SpentHours'])=="") {
            $SpentHours = "Please enter Hour<br>";
            $error++;
        }
        
         if (trim($_POST['SpentMins'])=="") {
            $SpentMins = "Please enter Minutes";
            $error++;
        }
        
        $AttachmentFileName = "";
        $Attachment_FileName = "";
        
        $target_dir = "assets/uploads/cases/";
        
        if (!(is_dir($target_dir.$CaseDetails[0]['CaseID']))) {
            mkdir($target_dir.$CaseDetails[0]['CaseID']);
        }
        $target_dir.=$CaseDetails[0]['CaseID'];

        
        if (!(is_dir($target_dir."/TimeSheet"))) {
            mkdir($target_dir."/TimeSheet");
        }
        $target_dir.="/TimeSheet/";
        
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
           $id =   $mysql->insert("_tbl_cases_timesheet",array("CaseID"                 => $CaseDetails[0]['CaseID'],
                                                    "EventTime"                 => trim($_POST['EventTime']),
                                                    "Particulars"            => trim($_POST['Particulars']),
                                                    "EventType"            => trim($_POST['EventType']),
                                                    "SpentHours"            => trim($_POST['SpentHours']),
                                                    "SpentMins"            => trim($_POST['SpentMins']),
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
                                                           "AttachmentFor"          => "TimeSheet",
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
  <form action="" method="post" id="create_case_timesheet" name="create_case_timesheet" onsubmit="return formvalidation('create_case_timesheet');" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="margin-bottom:30px">Time Sheet Entry</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Date</label>
                                <input  class="datepicker-here form-control digits" readonly="readonly"   data-language="en" data-date-format="yyyy-mm-dd" id="EventTime" name="EventTime" type="text" placeholder="Date" style="background:#fff"  value="<?php echo isset($_POST['EventTime']) ? $_POST['EventTime'] : "";?>">
                                <div id="ErrEventTime" style="color:red"><?php echo isset($EventTime) ? $EventTime : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Spent Hours</label><br>
                                <select name="SpentHours" id="SpentHours" style="padding: 9px 10px;background: #fff;border: 1px solid #ccc;border-radius: 3px;" >
                                    <option value="">HH</option>
                                    <option value="00" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>00</option>
                                    <option value="01" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>01</option>
                                    <option value="02" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>02</option>
                                    <option value="03" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>03</option>
                                    <option value="04" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>04</option>
                                    <option value="05" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>05</option>
                                    <option value="06" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>06</option>
                                    <option value="07" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>07</option>
                                    <option value="08" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>08</option>
                                    <option value="09" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>09</option>
                                    <option value="10" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>10</option>
                                    <option value="11" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>11</option>
                                    <option value="12" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>12</option>
                                    <option value="13" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>13</option>
                                    <option value="14" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>14</option>
                                    <option value="15" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>15</option>
                                    <option value="16" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>16</option>
                                    <option value="17" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>17</option>
                                    <option value="18" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>18</option>
                                    <option value="19" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>19</option>
                                    <option value="20" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>20</option>
                                    <option value="21" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>21</option>
                                    <option value="22" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>22</option>
                                    <option value="23" <?php echo $_POST['SpentHours']=="00" ? ' selected="selected"' : '';?>>23</option>
                                </select>
                                  &nbsp;&nbsp;
                                 <select name="SpentMins" id="SpentMins" style="padding: 9px 10px;background: #fff;border: 1px solid #ccc;border-radius: 3px;" >
                                    <option value="">MM</option>
                                    <option value="00" <?php echo $_POST['SpentMins']=="00" ? ' selected="selected"' : '';?> >00</option>
                                    <option value="05" <?php echo $_POST['SpentMins']=="05" ? ' selected="selected"' : '';?> >05</option>
                                    <option value="10" <?php echo $_POST['SpentMins']=="10" ? ' selected="selected"' : '';?> >10</option>
                                    <option value="15" <?php echo $_POST['SpentMins']=="15" ? ' selected="selected"' : '';?> >15</option>
                                    <option value="20" <?php echo $_POST['SpentMins']=="20" ? ' selected="selected"' : '';?> >20</option>
                                    <option value="25" <?php echo $_POST['SpentMins']=="25" ? ' selected="selected"' : '';?> >25</option>
                                    <option value="30" <?php echo $_POST['SpentMins']=="30" ? ' selected="selected"' : '';?> >30</option>
                                    <option value="35" <?php echo $_POST['SpentMins']=="35" ? ' selected="selected"' : '';?> >35</option>
                                    <option value="40" <?php echo $_POST['SpentMins']=="40" ? ' selected="selected"' : '';?> >40</option>
                                    <option value="45" <?php echo $_POST['SpentMins']=="45" ? ' selected="selected"' : '';?> >45</option>
                                    <option value="50" <?php echo $_POST['SpentMins']=="50" ? ' selected="selected"' : '';?> >50</option>
                                    <option value="55" <?php echo $_POST['SpentMins']=="55" ? ' selected="selected"' : '';?> >55</option>
                                </select>
                                <div >
                                <span id="ErrSpentHours" style="color:red"><?php echo isset($SpentHours) ? $SpentHours : "";?></span>
                                <span id="ErrSpentMins" style="color:red"><?php echo isset($SpentMins) ? $SpentMins : "";?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Particulars</label>
                                <textarea class="form-control" name="Particulars" id="Particulars" type="text" placeholder="Particulars"><?php echo isset($_POST['Particulars']) ? $_POST['Particulars'] : "";?></textarea>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                         <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Type</label>
                                <div class="m-t-15 m-checkbox-inline custom-radio-ml" style="margin-top:0px !important">
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="appearingas1" type="radio" checked="checked"    name="EventType" value="" data-bs-original-title="" title="">
                                        <label class="form-check-label mb-0" for="appearingas1">Effective</label>
                                    </div>                                                   
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="appearingas2" type="radio" name="EventType"  value=""  data-bs-original-title="" title="">
                                        <label class="form-check-label mb-0" for="appearingas2">Non Effective / Procedural Appearance</label>
                                    </div>
                                </div>
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
                                <a href="dashboard.php?action=Cases/view&sa=TimeSheet/list&case=<?php echo $_GET['case'];?>" class="btn btn-outline-primary">Back</a>
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