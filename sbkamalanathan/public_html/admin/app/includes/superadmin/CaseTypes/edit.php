<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Case Type</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
$data = $mysql->select("select * from _tbl_master_casetypes where md5(CaseTypeID)='".$_GET['edit']."'");
    if (isset($_POST['CreateBtn'])) {
        
        if ($_POST['isDelete']==0) {
        
        $error=0;
        if (strlen(trim($_POST['CaseTypeName']))==0) {
            $CaseTypeName = "Please enter CaseType Name";
            $error++;
        }
        
        $duplicate = $mysql->select("select * from _tbl_master_casetypes where CaseTypeID<>'".$data[0]['CaseTypeID']."' and CaseTypeName='".trim($_POST['CaseTypeName'])."'");
        if (sizeof($duplicate)>0) {
            $CaseTypeName = "CaseType Name already exists";
            $error++;  
        }
 
        if ($error==0) {
            $mysql->execute("update _tbl_master_casetypes set CaseTypeName = '".trim($_POST['CaseTypeName'])."', IsActive='".$_POST['IsActive']."',
                                                              Remarks  = '".trim($_POST['Remarks'])."' where md5(CaseTypeID)='".$_GET['edit']."'");
                                                   
          //  unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Case type information updated.</p>
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
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update casetype information.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
        } else {
               $mysql->execute("update _tbl_master_casetypes set IsActive          = '2',
                                                                 DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                                 where md5(CaseTypeID) = '".$_GET['edit']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Casetype information deleted.</p>
                      <br>
                      <a href="dashboard.php?action=CaseTypes/list" class="btn btn-success">Continue</a>
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
    
    $data = $mysql->select("select * from _tbl_master_casetypes where md5(CaseTypeID)='".$_GET['edit']."'");
?>
    <div class="row" id="frmD">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_casetype" name="create_casetype" onsubmit="return formvalidation('create_casetype');">
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Case Type Name</label>
                                <input class="form-control" id="CaseTypeName" name="CaseTypeName" type="text" placeholder="Case Type Name"  value="<?php echo isset($_POST['CaseTypeName']) ? $_POST['CaseTypeName'] : $data[0]['CaseTypeName'];?>">
                                <div id="ErrCaseTypeName" style="color:red"><?php echo isset($CaseTypeName) ? $CaseTypeName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Remarks</label>
                                <input class="form-control" name="Remarks" id="Remarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : $data[0]['Remarks'];?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Is Active</label>
                                <select name="IsActive" id='IsActive' class="form-select">
                                    <option value='1' <?php echo $data[0]['IsActive']==1 ? 'selected="selected"' : '';?> >Yes </option>                                
                                    <option value='0' <?php echo $data[0]['IsActive']==0 ? 'selected="selected"' : '';?>  >No </option>                                
                                </select>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <input type="hidden" value="0" id="isDelete" name="isDelete">
                                <a href="dashboard.php?action=CaseTypes/list" class="btn btn-outline-primary">Back</a>
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
                <p>Are you want to update case type information</p>
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
                <p>Are you want to <b style="color:red">delete</b> case type information</p>
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