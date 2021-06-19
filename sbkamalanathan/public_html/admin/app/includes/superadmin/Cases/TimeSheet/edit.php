 
<div class="container-fluid">
<?php                                                                                
    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'");
    $edit_data = $mysql->select("select * from _tbl_cases_timesheet where md5(concat(CreatedOn,CaseTimeSheetID))='".$_GET['edit']."'");
    if (isset($_POST['CreateBtn'])) {
        
           if ($_POST['isDelete']==0) {
        
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
            
           
            
            $mysql->execute("update _tbl_cases_timesheet set    
                                                               EventTime         = '".trim($_POST['EventTime'])."',
                                                               Particulars         = '".trim($_POST['Particulars'])."',
                                                               EventType         = '".trim($_POST['EventType'])."',
                                                               SpentHours         = '".trim($_POST['SpentHours'])."',
                                                               SpentMins         = '".trim($_POST['SpentMins'])."' where md5(concat(CreatedOn,CaseTimeSheetID))='".$_GET['edit']."'");
             if ($Attachment_FileName!="") {
                
                $mysql->insert("_tbl_cases_attachments",array("CaseID"                 => $CaseDetails[0]['CaseID'],
                                                             "AttachmentFor"          => "TimeSheet",
                                                             "RecordID"               => $edit_data[0]['CaseTimeSheetID'],
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
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Information updated.</p>
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
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update information.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
        
    }  else {
               $mysql->execute("update _tbl_cases_timesheet set IsActive          = '2',
                                                                       DeletedByAdminID  = '".(isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['AdminID'] : 0)."',
                                                                       DeletedByAdminName= '".(isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['AdminName'] : "")."',
                                                                       DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                                       where md5(concat(CreatedOn,CaseTimeSheetID))='".$_GET['edit']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b> information deleted.</p>
                      <br>
                      <a href="dashboard.php?action=Cases/view&sa=TimeSheet/list&case=<?php echo $_GET['case'];?>" class="btn btn-success">Continue</a>
                    </div>
                    </div>
              </div>
              </div>
              <style>
                .frmD{display:none}
              </style>
               <?php
    }
    }
    
    
    $edit_data = $mysql->select("select * from _tbl_cases_timesheet where md5(concat(CreatedOn,CaseTimeSheetID))='".$_GET['edit']."'");
?>
  <form class="frmD" action="" method="post" id="create_case_timesheet" name="create_case_timesheet" onsubmit="return formvalidation('create_case_timesheet');" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="margin-bottom:30px">Time Sheet Entry</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Date</label>
                                <input  class="datepicker-here form-control digits" readonly="readonly"   data-language="en" data-date-format="yyyy-mm-dd" id="EventTime" name="EventTime" type="text" placeholder="Date" style="background:#fff"  value="<?php echo isset($_POST['EventTime']) ? $_POST['EventTime'] : $edit_data[0]['EventTime'];?>">
                                <div id="ErrEventTime" style="color:red"><?php echo isset($EventTime) ? $EventTime : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Spent Hours</label><br>
                                <select name="SpentHours" id="SpentHours" style="padding: 9px 10px;background: #fff;border: 1px solid #ccc;border-radius: 3px;" >
                                    <option value="">HH</option>
                                    <option value="00" <?php echo $edit_data[0]['SpentHours']=="00" ? ' selected="selected"' : '';?>>00</option>
                                    <option value="01" <?php echo $edit_data[0]['SpentHours']=="01" ? ' selected="selected"' : '';?>>01</option>
                                    <option value="02" <?php echo $edit_data[0]['SpentHours']=="02" ? ' selected="selected"' : '';?>>02</option>
                                    <option value="03" <?php echo $edit_data[0]['SpentHours']=="03" ? ' selected="selected"' : '';?>>03</option>
                                    <option value="04" <?php echo $edit_data[0]['SpentHours']=="04" ? ' selected="selected"' : '';?>>04</option>
                                    <option value="05" <?php echo $edit_data[0]['SpentHours']=="05" ? ' selected="selected"' : '';?>>05</option>
                                    <option value="06" <?php echo $edit_data[0]['SpentHours']=="06" ? ' selected="selected"' : '';?>>06</option>
                                    <option value="07" <?php echo $edit_data[0]['SpentHours']=="07" ? ' selected="selected"' : '';?>>07</option>
                                    <option value="08" <?php echo $edit_data[0]['SpentHours']=="08" ? ' selected="selected"' : '';?>>08</option>
                                    <option value="09" <?php echo $edit_data[0]['SpentHours']=="09" ? ' selected="selected"' : '';?>>09</option>
                                    <option value="10" <?php echo $edit_data[0]['SpentHours']=="10" ? ' selected="selected"' : '';?>>10</option>
                                    <option value="11" <?php echo $edit_data[0]['SpentHours']=="11" ? ' selected="selected"' : '';?>>11</option>
                                    <option value="12" <?php echo $edit_data[0]['SpentHours']=="12" ? ' selected="selected"' : '';?>>12</option>
                                    <option value="13" <?php echo $edit_data[0]['SpentHours']=="13" ? ' selected="selected"' : '';?>>13</option>
                                    <option value="14" <?php echo $edit_data[0]['SpentHours']=="14" ? ' selected="selected"' : '';?>>14</option>
                                    <option value="15" <?php echo $edit_data[0]['SpentHours']=="15" ? ' selected="selected"' : '';?>>15</option>
                                    <option value="16" <?php echo $edit_data[0]['SpentHours']=="16" ? ' selected="selected"' : '';?>>16</option>
                                    <option value="17" <?php echo $edit_data[0]['SpentHours']=="17" ? ' selected="selected"' : '';?>>17</option>
                                    <option value="18" <?php echo $edit_data[0]['SpentHours']=="18" ? ' selected="selected"' : '';?>>18</option>
                                    <option value="19" <?php echo $edit_data[0]['SpentHours']=="19" ? ' selected="selected"' : '';?>>19</option>
                                    <option value="20" <?php echo $edit_data[0]['SpentHours']=="20" ? ' selected="selected"' : '';?>>20</option>
                                    <option value="21" <?php echo $edit_data[0]['SpentHours']=="21" ? ' selected="selected"' : '';?>>21</option>
                                    <option value="22" <?php echo $edit_data[0]['SpentHours']=="22" ? ' selected="selected"' : '';?>>22</option>
                                    <option value="23" <?php echo $edit_data[0]['SpentHours']=="23" ? ' selected="selected"' : '';?>>23</option>
                                </select>
                                  &nbsp;&nbsp;
                                 <select name="SpentMins" id="SpentMins" style="padding: 9px 10px;background: #fff;border: 1px solid #ccc;border-radius: 3px;" >
                                    <option value="">MM</option>
                                    <option value="00" <?php echo $edit_data[0]['SpentMins']=="00" ? ' selected="selected"' : '';?> >00</option>
                                    <option value="05" <?php echo $edit_data[0]['SpentMins']=="05" ? ' selected="selected"' : '';?> >05</option>
                                    <option value="10" <?php echo $edit_data[0]['SpentMins']=="10" ? ' selected="selected"' : '';?> >10</option>
                                    <option value="15" <?php echo $edit_data[0]['SpentMins']=="15" ? ' selected="selected"' : '';?> >15</option>
                                    <option value="20" <?php echo $edit_data[0]['SpentMins']=="20" ? ' selected="selected"' : '';?> >20</option>
                                    <option value="25" <?php echo $edit_data[0]['SpentMins']=="25" ? ' selected="selected"' : '';?> >25</option>
                                    <option value="30" <?php echo $edit_data[0]['SpentMins']=="30" ? ' selected="selected"' : '';?> >30</option>
                                    <option value="35" <?php echo $edit_data[0]['SpentMins']=="35" ? ' selected="selected"' : '';?> >35</option>
                                    <option value="40" <?php echo $edit_data[0]['SpentMins']=="40" ? ' selected="selected"' : '';?> >40</option>
                                    <option value="45" <?php echo $edit_data[0]['SpentMins']=="45" ? ' selected="selected"' : '';?> >45</option>
                                    <option value="50" <?php echo $edit_data[0]['SpentMins']=="50" ? ' selected="selected"' : '';?> >50</option>
                                    <option value="55" <?php echo $edit_data[0]['SpentMins']=="55" ? ' selected="selected"' : '';?> >55</option>
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
                                <textarea class="form-control" name="Particulars" id="Particulars" type="text" placeholder="Particulars"><?php echo isset($_POST['Particulars']) ? $_POST['Particulars'] : $edit_data[0]['Particulars'];?></textarea>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                         <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Type</label>
                                <div class="m-t-15 m-checkbox-inline custom-radio-ml" style="margin-top:0px !important">
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="appearingas1" type="radio" <?php echo ($edit_data[0]['EventType']=='Effective') ? ' checked="checked" ' : '';?> name="EventType" value="Effective" data-bs-original-title="" title="">
                                        <label class="form-check-label mb-0" for="appearingas1">Effective</label>
                                    </div>                                                   
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="appearingas2" type="radio"  <?php echo ($edit_data[0]['EventType']=='Effective') ? '' : ' checked="checked" '   ;?> name="EventType"  value="Non Effective / Procedural Appearance"  data-bs-original-title="" title="">
                                        <label class="form-check-label mb-0" for="appearingas2">Non Effective / Procedural Appearance</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Attachments</label 
                                 <?php
                                    $AttachmentFor = "TimeSheet";
                                    $RecordID      = $edit_data[0]['CaseTimeSheetID'];
                                    $CaseID        = $CaseDetails[0]['CaseID'];
                                    include_once(__DIR__."/../ShowAttachments.php");
                                ?>
                            </div>
                             <div class="col-md-3" style="overflow: hidden;">
                                <input class="form-control" name="Attachment" id="Attachment" type="file" >
                                <div id="ErrAttachment" style="color:red"><?php echo isset($Attachment) ? $Attachment : "";?></div>
                            </div>
                                                  
                        </div>
                        
                         <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                             <input type="hidden" value="0" id="isDelete" name="isDelete">
                                <a href="dashboard.php?action=Cases/view&sa=TimeSheet/list&case=<?php echo $_GET['case'];?>" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-danger" type="button" onclick="confirmDelete()" name="deleteBtn" id="deleteBtn">Delete </button>
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
                <p>Are you want to update information.</p>
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
                <p>Are you want to <b style="color:red">delete</b> information</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="button" onclick="$('#isDelete').val('1');formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal--> 
<script>
function confirmDelete() {
   $('#exampleModalCenterDelete').modal('show') ;
}
</script>
<!-- Tooltips and popovers modal-->