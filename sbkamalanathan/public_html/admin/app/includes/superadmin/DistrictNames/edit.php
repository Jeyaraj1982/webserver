<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit District Name</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
$data = $mysql->select("select * from _tbl_master_districtnames where md5(DistrictNameID)='".$_GET['edit']."'");
    if (isset($_POST['CreateBtn'])) {
        
        if ($_POST['isDelete']==0) {
        
        $error=0;
        if (strlen(trim($_POST['DistrictName']))==0) {
            $DistrictName = "Please enter District Name";
            $error++;
        }
        
        $duplicate = $mysql->select("select * from _tbl_master_districtnames where DistrictNameId<>'".$data[0]['DistrictNameID']."' and DistrictName='".trim($_POST['DistrictName'])."'");
        if (sizeof($duplicate)>0) {
            $DistrictName = "District Name Name already exists";
            $error++;  
        }
 
        if ($error==0) {
             $statename=$mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['StateNameID']."'");
            $mysql->execute("update _tbl_master_districtnames set DistrictName = '".trim($_POST['DistrictName'])."',
                                                                  StateNameID      ='".$statename[0]['StateNameID']."',
                                                                  StateName      = '".$statename[0]['StateName']."',
                                                                  IsActive = '".$_POST['IsActive']."',
                                                                  Remarks  = '".trim($_POST['Remarks'])."' where md5(DistrictNameID)='".$_GET['edit']."'");
            
                                              
          //  unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>District Name updated.</p>
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
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update District Name.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
        } else {
               $mysql->execute("update _tbl_master_districtnames set IsActive          = '2',
                                                                 DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                                 where md5(DistrictNameID) = '".$_GET['edit']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>District Name deleted.</p>
                      <br>
                      <a href="dashboard.php?action=DistrictNames/list" class="btn btn-success">Continue</a>
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
    
    $data = $mysql->select("select * from _tbl_master_districtnames where md5(DistrictNameID)='".$_GET['edit']."'");
?>
    <div class="row" id="frmD">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_districtname" name="create_districtname" onsubmit="return formvalidation('create_districtname');">
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">District Name</label>
                                <input class="form-control" id="DistrictName" name="DistrictName" type="text" placeholder="District Name"  value="<?php echo isset($_POST['DistrictName']) ? $_POST['DistrictName'] : $data[0]['DistrictName'];?>">
                                <div id="ErrDistrictName" style="color:red"><?php echo isset($DistrictName) ? $DistrictName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                         <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">State Name</label>
                                <?php $statenames = $mysql->select("select * from _tbl_master_statenames where (IsActive=1 or IsActive=0)"); ?>
                                <select class="form-select" id="StateNameID" name="StateNameID">
                                <?php
                                
                                    foreach($statenames as $statename) {   
                                ?>
                                <option value="<?php echo $statename['StateNameID'];?>" <?php echo ($_POST['StateNameID']==$data[0]['StateNameID']) ? " selected='selected' " : "";?> ><?php echo $statename['StateName'];?></option>
                                 
                                 <?php } ?>
                                    
                                
                                </select>
                                <div id="ErrStateName" style="color:red"><?php echo isset($StateName) ? $StateName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Remarks</label>
                                <input class="form-control" name="Remarks" id="Remarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : $data[0]['Remarks'];?>">
                            </div>
                        </div>
                         <div class="row g-3 mb-3">
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
                                <a href="dashboard.php?action=DistrictNames/list" class="btn btn-outline-primary">Back</a>
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
                <p>Are you want to update district name</p>
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
                <p>Are you want to <b style="color:red">delete</b> district name</p>
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