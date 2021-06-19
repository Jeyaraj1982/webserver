<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>My Profile</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
    $data = $mysql->select("select * from _tbl_admin where AdminID='".$_SESSION['User']['AdminID']."'");
?>
    <div class="row" id="frmD">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_staff" name="create_staff" onsubmit="return formvalidation('create_staff');" enctype="multipart/form-data">
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Super Admin's Name</label>
                                <input class="form-control"  value="<?php echo $data[0]['AdminName'];?>" disabled="disabled">
                            </div>
                            
                        </div>
                         
                         
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Mobile Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control"  type="text"  value="<?php echo   $data[0]['AdminMobileNumber'];?>" disabled="disabled">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row g-3 mb-3">
                           <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control"  type="email" value="<?php echo  $data[0]['Email'];?>" disabled="disabled">
                                
                            </div>
                            
                        </div>
                    
                         
                          
                         
                    </form>
                </div>
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
                <p>Are you want to <b style="color:red">delete</b> staff information</p>
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