<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Administrator</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
$data = $mysql->select("select * from _tbl_admin where md5(concat(CreatedOn,AdminID))='".$_GET['edit']."'");
    if (isset($_POST['CreateBtn'])) {
        
        if ($_POST['isDelete']==0) {
        
        $error=0;
        if (strlen(trim($_POST['AdminName']))==0) {
            $AdminName = "Please enter Administrator's Name";
            $error++;
        }
        
        if (strlen(trim($_POST['Email']))==0) {
            $Email = "Please enter Email";
            $error++;
        } else {
            if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
               $Email = "Please enter valid Mobile Number";
               $error++;
            } else {
                $duplicate = $mysql->select("select * from _tbl_admin where AdminID<>'".$data[0]['AdminID']."' and Email='".trim($_POST['Email'])."'");
                if (sizeof($duplicate)>0) {
                    $Email = "Email already exists";
                    $error++;  
                }
            }
        }
        
        if (strlen(trim($_POST['AdminMobileNumber']))==0) {
            $AdminMobileNumber = "Please enter Mobile Number";
            $error++;
        } else {
            if (!($_POST['AdminMobileNumber']>6000000000 && $_POST['AdminMobileNumber']<9999999999)) {
               $AdminMobileNumber = "Please enter valid Mobile Number";
               $error++;
            } else {
                $duplicate = $mysql->select("select * from _tbl_admin where AdminID<>'".$data[0]['AdminID']."' and AdminMobileNumber='".trim($_POST['AdminMobileNumber'])."'");
                if (sizeof($duplicate)>0) {
                    $AdminMobileNumber = "Mobile number already exists";
                    $error++;  
                }
            }
        }
        
          
        if (strlen(trim($_POST['LoginName']))==0) {
            $LoginName = "Please enter Login User Name";         
            $error++;
        } else {
            if(preg_match('/[^a-z_\-0-9]/i',trim($_POST['LoginName']))) {
                 $LoginName = "Login UserName allow only alphanumeric characters.";
                 $error++; 
            } else {
                $duplicate = $mysql->select("select * from _tbl_admin where  AdminID<>'".$data[0]['AdminID']."' and LoginName='".trim($_POST['LoginName'])."'");
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
        
        if ($error==0) {
            $mysql->execute("update _tbl_admin set AdminName         = '".trim($_POST['AdminName'])."',
                                                   Email             = '".trim($_POST['Email'])."',
                                                   AdminMobileNumber = '".trim($_POST['AdminMobileNumber'])."',
                                                   LoginName         = '".trim($_POST['LoginName'])."',
                                                   LoginPassword     = '".trim($_POST['LoginPassword'])."',
                                                   Remarks           = '".trim($_POST['Remarks'])."',
                                                   IsActive          = '".$_POST['IsActive']."'  where md5(concat(CreatedOn,AdminID))='".$_GET['edit']."'");
                                                   
          //  unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Administrator account updated.</p>
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
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update Administrator information.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
        } else {
               $mysql->execute("update _tbl_admin set IsActive          = '2',
                                                      Email             = 'no_need_".trim($_POST['Email'])."',
                                                      AdminMobileNumber = 'no_need_".trim($_POST['AdminMobileNumber'])."',
                                                      LoginPassword     = 'no_need_".trim($_POST['LoginPassword'])."',
                                                      DeletedOn         = '".date("Y-m-d H:i:s")."'
                                                      
                                                      where md5(concat(CreatedOn,AdminID))='".$_GET['edit']."'");
               unset($_POST);
               ?>
                   <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Administrator account deleted.</p>
                      <br>
                      <a href="dashboard.php?action=Administrators/list" class="btn btn-success">Continue</a>
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
    
    $data = $mysql->select("select * from _tbl_admin where md5(concat(CreatedOn,AdminID))='".$_GET['edit']."'");
?>
    <div class="row" id="frmD">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_admin" name="create_admin" onsubmit="return formvalidation('create_admin');">
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Administrator's Name</label>
                                <input class="form-control" id="AdminName" name="AdminName" type="text" placeholder="Admin Name"  value="<?php echo isset($_POST['AdminName']) ? $_POST['AdminName'] : $data[0]['AdminName'];?>">
                                <div id="ErrAdminName" style="color:red"><?php echo isset($AdminName) ? $AdminName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control" id="Email" name="Email" type="email" placeholder="jhon@gmail.com"  value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : $data[0]['Email'];?>">
                                <div id="ErrEmail" style="color:red"><?php echo isset($Email) ? $Email : "";?></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustomUsername">Mobile Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" onkeypress="return isNumber(event)"  id="AdminMobileNumber" name="AdminMobileNumber" type="text" placeholder="Mobile Number" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['AdminMobileNumber']) ? $_POST['AdminMobileNumber'] : $data[0]['AdminMobileNumber'];?>">
                                </div>
                                <div id="ErrAdminMobileNumber" style="color:red"><?php echo isset($AdminMobileNumber) ? $AdminMobileNumber : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Login User Name</label>&nbsp;<a class="example-popover" type="button" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Only allowe alphabets and numbers. Not allow space and other characters"><i class="fa fa-question-circle"></i></a>
                                <input class="form-control" name="LoginName" id="LoginName" type="text" placeholder="Login User Name" value="<?php echo isset($_POST['LoginName']) ? $_POST['LoginName'] : $data[0]['LoginName'];?>">
                                <div id="ErrLoginName" style="color:red"><?php echo isset($LoginName) ? $LoginName : "";?></div>
                            </div> 
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Login Password</label>
                                <input class="form-control" name="LoginPassword" id="LoginPassword" type="text" placeholder="Login Password" value="<?php echo isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] : $data[0]['LoginPassword'];?>">
                                <div id="ErrLoginPassword" style="color:red"><?php echo isset($LoginPassword) ? $LoginPassword : "";?></div>
                            </div>
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Is Active</label>
                                <select name="IsActive" id='IsActive' class="form-select">
                                    <option value='1' <?php echo $data[0]['IsActive']==1 ? 'selected="selected"' : '';?> >Yes </option>                                
                                    <option value='0' <?php echo $data[0]['IsActive']==0 ? 'selected="selected"' : '';?>  >No </option>                                
                                </select>
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
                                <a href="dashboard.php?action=Administrators/list" class="btn btn-outline-primary">Back</a>
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
                <p>Are you want to update administrator information</p>
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
                <p>Are you want to <b style="color:red">delete</b> administrator information</p>
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