 
<div class="container-fluid">
<?php                                                                                
    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'");
    $edit_data = $mysql->select("select * from _tbl_cases_hirings where md5(concat(CreatedOn,CaseHiringID))='".$_GET['edit']."'");
    if (isset($_POST['CreateBtn'])) {
        
           if ($_POST['isDelete']==0) {
        
        $error=0;
         if (strlen(trim($_POST['CaseAttendDate']))==0) {
            $CaseAttendDate = "Please select Case Attend Date";
            $error++;
        }
        
        if ($_POST['CaseAttendAdvocateBy']==0) {
            $CaseAttendAdvocateBy = "Please select Advocate";
            $error++;
        }
        
        $AttachmentFileName = "";
        $Attachment_FileName = "";
        
        $target_dir = "assets/uploads/cases/";
        
        if (!(is_dir($target_dir.$CaseDetails[0]['CaseID']))) {
            mkdir($target_dir.$CaseDetails[0]['CaseID']);
        }
        $target_dir.=$CaseDetails[0]['CaseID'];

        
         if (!(is_dir($target_dir."/Hirings"))) {
            mkdir($target_dir."/Hirings");
        }
        $target_dir.="/Hirings/";
        
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
               $CaseAttendAdvocateName = $mysql->select("select * from _tbl_master_advocates where AdvocateID ='".$_POST[0]['CaseAttendAdvocateBy']."' ");
            $mysql->execute("update _tbl_cases_hirings set 
                                                               CaseAttendDate         = '".trim($_POST['CaseAttendDate'])."',
                                                               NextHiringDate         = '".trim($_POST['NextHiringDate'])."',
                                                               CaseAttendAdvocateBy         = '".trim($_POST['CaseAttendAdvocateBy'])."',
                                                               CaseAttendAdvocateName         = '".trim($CaseAttendAdvocateName[0]['AdvocateName'])."',
                                                               IANumber         = '".trim($_POST['IANumber'])."',
                                                               OtherSideApear         = '".trim($_POST['OtherSideApear'])."',
                                                               OtherSideAdvocateName         = '".trim($_POST['OtherSideAdvocateName'])."',
                                                               JudgeName         = '".trim($_POST['JudgeName'])."',
                                                               StateOfCase         = '".trim($_POST['StateOfCase'])."',
                                                               BreifOfStage         = '".trim($_POST['BreifOfStage'])."',
                                                               PointsOfDefense         = '".trim($_POST['PointsOfDefense'])."',
                                                               OtherDetails         = '".trim($_POST['OtherDetails'])."' 
                                                                 where md5(concat(CreatedOn,CaseHiringID))='".$_GET['edit']."'");
             if ($Attachment_FileName!="") {
                
                $mysql->insert("_tbl_cases_attachments",array("CaseID"                 => $CaseDetails[0]['CaseID'],
                                                             "AttachmentFor"          => "Hiring",
                                                             "RecordID"               => $edit_data[0]['CaseHiringID'],
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
               $mysql->execute("update _tbl_cases_hirings set IsActive          = '2',
                                                                       DeletedByAdminID  = '".(isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['AdminID'] : 0)."',
                                                                       DeletedByAdminName= '".(isset($_SESSION['User']['AdminID']) ? $_SESSION['User']['role'].": ".$_SESSION['User']['AdminName'] : "")."',
                                                                       DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                                       where md5(concat(CreatedOn,CaseHiringID))='".$_GET['edit']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b> information deleted.</p>
                      <br>
                      <a href="dashboard.php?action=Cases/view&sa=Hiring/list&case=<?php echo $_GET['case'];?>" class="btn btn-success">Continue</a>
                    </div>
                    </div>
              </div>
              </div>
              <style>
                #frmD{display:none}
              </style>
               <?php
    }
    }
    
    
    $edit_data = $mysql->select("select * from _tbl_cases_hirings where md5(concat(CreatedOn,CaseHiringID))='".$_GET['edit']."'");
?>
  <form id="frmD" action="" method="post" id="create_case_hiring" name="create_case_hiring" onsubmit="return formvalidation('create_case_hiring');" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="margin-bottom:30px">Edit Hirings</h6>
                        
                        <div class="row g-3  mb-3">
                        <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Case Attend Date</label>
                                <div class="col-xl-12 col-sm-12">
                                    <div class="input-group">
                                    <input class="datepicker-here form-control digits" readonly="readonly" style="background:#fff"  name="CaseAttendDate" id="CaseAttendDate" type="text" data-language="en" value="<?php echo isset($_POST['CaseAttendDate']) ? $_POST['CaseAttendDate'] : $edit_data[0]['CaseAttendDate'];?>" data-date-format="yyyy-mm-dd">
                                </div>
                                <div id="ErrCaseAttendDate" style="color:red"><?php echo isset($CaseAttendDate) ? $CaseAttendDate : "";?></div>
                          </div>
                        </div>  
                          <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Next Hiring Date</label>
                                <div class="col-xl-12 col-sm-12">
                                    <div class="input-group">
                                    <input class="datepicker-here form-control digits"  readonly="readonly" style="background:#fff"  name="NextHiringDate" id="NextHiringDate" type="text" data-language="en" value="<?php echo isset($_POST['NextHiringDate']) ? $_POST['NextHiringDate'] : $edit_data[0]['NextHiringDate'];?>" data-date-format="yyyy-mm-dd">
                                </div>
                                <div id="ErrNextHiringDate" style="color:red"><?php echo isset($NextHiringDate) ? $NextHiringDate : "";?></div>
                          </div>
                          
                        </div>
                        </div>
                         <div class="row g-3  mb-3">
                          <div class="col-md-8">
                                <label class="form-label" for="validationCustom01">Case Attend By</label>
                                <?php
                                    $advocates = $mysql->select("select * from _tbl_master_advocates where AdvocateID in (select AdvocateID from _tbl_cases_assigned_advocates where CaseID='".$CaseDetails[0]['CaseID']."' and IsActive='1') ");
                                   
                                ?>
                                <select class="form-select" name="CaseAttendAdvocateBy" id="CaseAttendAdvocateBy">
                                    <option value="0">Select Advocate</option>
                                    <?php 
                                    foreach($advocates as $advocate) {
                                        ?>
                                        <option value="<?php echo $advocate['AdvocateID'];?>" <?php echo ($advocate['AdvocateID']==$edit_data[0]['CaseAttendAdvocateBy']) ? ' selected="selected" ' : '';?> ><?php echo $advocate['AdvocateName'];?></option>
                                        <?php
                                    }        ?>
                                </select>
                                <div id="ErrCaseAttendAdvocateBy" style="color:red"><?php echo isset($CaseAttendAdvocateBy) ? $CaseAttendAdvocateBy : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">IA Number </label>
                                <input class="form-control" id="IANumber" name="IANumber" type="text" placeholder="IA Number"  value="<?php echo isset($_POST['IANumber']) ? $_POST['IANumber'] : $edit_data[0]['IANumber'];?>">
                                <div id="ErrIANumber" style="color:red"><?php echo isset($IANumber) ? $IANumber : "";?></div>
                            </div>
                          </div>
                         <div class="row g-3  mb-3"> 
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom01">Other Side Apear </label>
                                 <select class="form-select" name="OtherSideApear" id="OtherSideApear">
                                    <option value="0"  <?php echo ($edit_data[0]['OtherSideApear']==0) ? ' selected="selected" ' : '';?>>No</option>
                                    <option value="1"  <?php echo ($edit_data[0]['OtherSideApear']==1) ? ' selected="selected" ' : '';?>>Yes</option>
                                 </select>
                            </div>
                         
                            <div class="col-md-5">
                                <label class="form-label" for="validationCustom01">Other Advocate Name </label>
                                <input class="form-control" id="OtherSideAdvocateName" name="OtherSideAdvocateName" type="text" placeholder="Other Side Advocate Name"  value="<?php echo isset($_POST['OtherSideAdvocateName']) ? $_POST['OtherSideAdvocateName'] : $edit_data[0]['OtherSideAdvocateName'];?>">
                                <div id="ErrOtherSideAdvocateName" style="color:red"><?php echo isset($OtherSideAdvocateName) ? $OtherSideAdvocateName : "";?></div>
                            </div>
                            
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Judge Namae</label>
                                <input class="form-control" id="JudgeName" name="JudgeName" type="text" placeholder="JudgeName"  value="<?php echo isset($_POST['JudgeName']) ? $_POST['JudgeName'] : $edit_data[0]['JudgeName'];?>">
                                <div id="ErrJudgeName" style="color:red"><?php echo isset($JudgeName) ? $JudgeName : "";?></div>
                            </div>
                        </div>
                    
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">State Of Case</label>
                                <textarea class="form-control" name="StateOfCase" id="StateOfCase" type="text" placeholder="State Of Case"><?php echo isset($_POST['StateOfCase']) ? $_POST['StateOfCase'] : $edit_data[0]['StateOfCase'];?></textarea>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Brief of Stage</label>
                                <textarea class="form-control" name="BreifOfStage" id="BreifOfStage" type="text" placeholder="Breif Of Stage"><?php echo isset($_POST['BreifOfStage']) ? $_POST['BreifOfStage'] :  $edit_data[0]['BreifOfStage'];?></textarea>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">                                           
                                <label class="form-label" for="validationCustom03">Points of Defense</label>
                                <textarea class="form-control" name="PointsOfDefense" id="PointsOfDefense" type="text" placeholder="Points Of Defense"><?php echo isset($_POST['PointsOfDefense']) ? $_POST['PointsOfDefense'] :  $edit_data[0]['PointsOfDefense'];?></textarea>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Other Details</label>
                                <textarea class="form-control" name="OtherDetails" id="OtherDetails" type="text" placeholder="Other Details"><?php echo isset($_POST['OtherDetails']) ? $_POST['OtherDetails'] :  $edit_data[0]['OtherDetails'];?></textarea>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Attachments</label>
                                <?php
                                    $AttachmentFor = "Hiring";
                                    $RecordID      = $edit_data[0]['CaseHiringID'];
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
                                <a href="dashboard.php?action=Cases/view&sa=Hiring/list&case=<?php echo $_GET['case'];?>" class="btn btn-outline-primary">Back</a>
                                 <button class="btn btn-danger" type="button" onclick="confirmDelete()" name="deleteBtn" id="deleteBtn">Delete </button>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Update</button>
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