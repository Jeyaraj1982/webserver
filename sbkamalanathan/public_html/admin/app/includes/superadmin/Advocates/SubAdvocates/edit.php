<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Sub Advocate Information</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
 
    $data = $mysql->select("select * from _tbl_master_advocates_subadvocates where md5(concat(CreatedOn,SubAdvocateID))='".$_GET['edit']."'");
      $mainData = $mysql->select("select * from _tbl_master_advocates where AdvocateID='".$data[0]['AdvocateID']."'")  ;

    if (isset($_POST['CreateBtn'])) {
        
        if ($_POST['isDelete']==0) {
        
        $error=0;
        if (strlen(trim($_POST['AdvocateName']))==0) {
            $AdvocateName = "Please enter Advocate Name";
            $error++;
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
                $duplicate = $mysql->select("select * from _tbl_master_advocates_subadvocates where SubAdvocateID<>'".$data[0]['SubAdvocateID']."' and AdvocateID='".$data[0]['AdvocateID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
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
                $duplicate = $mysql->select("select * from _tbl_master_advocates_subadvocates where SubAdvocateID<>'".$data[0]['SubAdvocateID']."' and AdvocateID='".$data[0]['AdvocateID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                if (sizeof($duplicate)>0) {
                    $WhatsappNumber = "Whatsapp number already exists";
                    $error++;  
                }
            }
        }
        
        if ($error==0) {
            $mysql->execute("update _tbl_master_advocates_subadvocates set AdvocateName = '".trim($_POST['AdvocateName'])."',
                                                                        MobileNumber = '".trim($_POST['MobileNumber'])."',
                                                                        WhatsappNumber = '".trim($_POST['WhatsappNumber'])."',
                                                              Remarks  = '".trim($_POST['Remarks'])."' where SubAdvocateID='".$data[0]['SubAdvocateID']."'");
                                                   
          //  unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Advocate information updated.</p>
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
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update advocate information.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
        } else {
               $mysql->execute("update _tbl_master_advocates_subadvocates set IsActive          = '2',
                                                                 DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                                   where SubAdvocateID='".$data[0]['SubAdvocateID']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>advocate information deleted.</p>
                      <br>
                      <a href="dashboard.php?action=Advocates/edit&edit=<?php echo md5($mainData[0]['CreatedOn'].$mainData[0]['AdvocateID']);?>" class="btn btn-success">Continue</a>
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
    
        $data = $mysql->select("select * from _tbl_master_advocates_subadvocates where md5(concat(CreatedOn,SubAdvocateID))='".$_GET['edit']."'");
      $mainData = $mysql->select("select * from _tbl_master_advocates where AdvocateID='".$data[0]['AdvocateID']."'")  ;
    
?>
    <div class="row" id="frmD">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_subadvocate" name="create_subadvocate" onsubmit="return formvalidation('create_subadvocate');">
                         <div class="row g-3  mb-3">
                            <div class="col-md-8">
                                <label class="form-label" for="validationCustom01">Main Advocate Name</label>
                                <input class="form-control"  type="text"  value="<?php echo $mainData[0]['AdvocateName'];?>" disabled="disabled">
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-8">
                                <label class="form-label" for="validationCustom01">Advocate Name</label>
                                <input class="form-control" id="AdvocateName" name="AdvocateName" type="text" placeholder="Advocate Name"  value="<?php echo isset($_POST['AdvocateName']) ? $_POST['AdvocateName'] : $data[0]['AdvocateName'];?>">
                                <div id="ErrAdvocateName" style="color:red"><?php echo isset($AdvocateName) ? $AdvocateName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
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
                                <label class="form-label" for="validationCustomUsername">Whatsapp Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" onkeypress="return isNumber(event)"  id="WhatsappNumber" name="WhatsappNumber" type="text" placeholder="Whatsapp Number" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['WhatsappNumber']) ? $_POST['WhatsappNumber'] : $data[0]['WhatsappNumber'];?>">
                                </div>
                                <div id="ErrWhatsappNumber" style="color:red"><?php echo isset($WhatsappNumber) ? $WhatsappNumber : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Remarks</label>
                                <input class="form-control" name="Remarks" id="Remarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : $data[0]['Remarks'];?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <input type="hidden" value="0" id="isDelete" name="isDelete">
                                <a href="dashboard.php?action=Advocates/edit&edit=<?php echo md5($mainData[0]['CreatedOn'].$mainData[0]['AdvocateID']);?>" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-danger" type="button" onclick="confirmDelete()" name="deleteBtn" id="deleteBtn">Delete </button>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Update </button>
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
                <p>Are you want to update advocate information</p>
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
                <p>Are you want to <b style="color:red">delete</b> advocate information</p>
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