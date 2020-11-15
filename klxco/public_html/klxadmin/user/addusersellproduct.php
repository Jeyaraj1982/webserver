<?php
    if (isset($_POST['btnsubmit'])) {
            $ErrorCount =0;
            $checkuser = $mysql->select("select * from _jusertable where userid='".$_POST['UserID']."'");
            if(sizeof($checkuser)==0){
                $ErrUserID="User not found";
                $ErrorCount++;   
            }
            if($ErrorCount==0){
                $mysql->execute("update _jusertable set `AllowtoSellProduct`   ='1' where userid='".$_POST['UserID']."'");
               
            ?>
            <script>
                $(document).ready(function() {
                    swal("User allow to add sell product successfully", {
                        icon:"success"
                    })
                });
            </script>
            <?php  } else { ?>
            <script>
                $(document).ready(function() {
                    swal("<?php echo $ErrUserID;?>", {
                        icon:"error"
                    })
                });
            </script>
            <?php } } ?>
<script>

$(document).ready(function () {
   
    $("#UserID").blur(function () {
        if(IsNonEmpty("UserID","ErrUserID","Please Enter UserID")){
            IsNumeric("UserID","ErrUserID","Please Enter Numerice Characters Only");
        }
    });
    
});

</script>
  <style>
 .has-success label {
    color: #495057 !important;
}
.has-success .form-control {
    border-color: #ebedf2 !important;
    color: #797979 !important;
}
 </style>      
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">                                                       
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add User Sell product</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name">User ID<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="UserID" name="UserID" placeholder="Enter UserID" value="<?php echo (isset($_POST['UserID']) ? $_POST['UserID'] :"");?>">
                                            <span class="errorstring" id="ErrUserID"><?php echo isset($ErrUserID)? $ErrUserID : "";?></span>
                                        </div> 
                                    </div>   
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add User</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add User</button>
                                                <a href="dashboard.php?action=user/usersellproducts" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
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
 
function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrUserID').html("");
        if(IsNonEmpty("UserID","ErrUserID","Please Enter UserID")){
            IsNumeric("UserID","ErrUserID","Please Enter Numerice Characters Only");
        }
       
        if(ErrorCount==0) {
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to add user sell product?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddUser()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function AddUser() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

  
         