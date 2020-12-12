 <?php
 $data = $mysql->select("select * from _tbl_store_types where StoreTypeID='".$_GET['id']."'");
    if (isset($_POST['submitBtn'])) {
        $error =0;
        if ($error==0) {
            
           $filename = strtolower(time().$_FILES['StoreTypeImage']['name']);
                if (isset($_FILES['StoreTypeImage']['name'])) {
                    if (move_uploaded_file($_FILES['StoreTypeImage']['tmp_name'],"assets/stores/".$filename))     {
                        $filename = $filename;
                        $mysql->execute("update _tbl_store_types set StoreTypeImage='".$filename."' Where StoreTypeID='".$_GET['id']."'");
                    } else {
                        $filename = "";
                    }
                } else {
                    $filename = "";
                }
            
           
            $mysql->execute("update _tbl_store_types set StoreTypeName='".$_POST['StoreTypeName']."',IsActive='".$_POST['IsActive']."' Where StoreTypeID='".$_GET['id']."'");
            
            ?>
           <script>
            $(document).ready(function() {
                swal("Store Type Information updated successfully", {
                    icon : "success" 
                });
            });  
            </script>
             <?php                                                          
        }                                                                                                    
    }
    $data = $mysql->select("select * from _tbl_store_types where StoreTypeID='".$_GET['id']."'"); 
 ?>
 
 <style>
 .form-group{
     padding:0px !important;
 }
 </style>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewStore">Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewStore">Edit Store Type</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post" enctype="multipart/form-data">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Store Type Information</h4>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Type Name<span style="color:red">*</span></label>
                                <input name="StoreTypeName" id="StoreTypeName" placeholder="Store Name" value="<?php echo isset($_POST['StoreTypeName']) ? $_POST['StoreTypeName'] : $data[0]['StoreTypeName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter supporting center name" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="ErrStoreTypeName" style="font-size: 12px;color:red"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group user-test" id="user-exists">    
                                <label>Store Type Logo</label>
                                <div>
                                    <img src="assets/stores/<?php echo $data[0]['StoreTypeImage'];?>" style="height:200px"><br>   
                                    <input type="file" name="StoreTypeImage" id="StoreTypeImage" class="form-control">
                                </div>
                                <div class="help-block" style="color:red"><?php echo $errorStoreTypeImage;?></div>
                                <div class="help-block"><p class="error" id="ErrStoreTypeImage" style="font-size: 12px;color:red"></p></div>
                            </div>                                                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>IsActive<span style="color:red">*</span></label>
                                <select class="form-control" name="IsActive" id="IsActive">
                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']== "1") ? " selected='selected' " : "") : (($data[0][ 'IsActive']== "1") ? " selected='selected' " : "");?>>Yes</option>
                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']== "0") ? " selected='selected' " : "") : (($data[0][ 'IsActive']== "0") ? " selected='selected' " : "");?>>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="card-footer">
                     <div class="row"> 
                        <div class="col-md-12" style="text-align: right;"> 
                             <button type="button" onclick="CallConfirmationCreateStore()" class="btn btn-primary waves-effect waves-light">Update Store Type</button>
                             <button type="submit" style="display: none;" name="submitBtn" id="submitBtn" class="btn btn-primary waves-effect waves-light">Update Store Type</button>
                             <button type="button" onclick="location.href='dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=all'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  </div>  
 <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
    function CallConfirmationCreateStore(){
        ErrorCount=0;    
        $('#ErrStoreTypeName').html("");
        var store = $('#StoreTypeName').val();
        if(store.length==0){
           $('#ErrStoreTypeName').html("Please Enter Store Type Name"); 
           ErrorCount++;
        }
        
    if(ErrorCount==0){
            var txt = '<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to update store type<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="CreateStore()" >Yes, Confirm</button>'
                     +'</div>';  
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }else {
        return false;
    }
}
function CreateStore() {
    $("#submitBtn" ).trigger( "click" );
}

</script>