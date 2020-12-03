<?php
$user = $mysql->select("select * from _jusertable where md5(userid)='".$_GET['d']."'");
    if (isset($_POST['btnsubmit'])) {
        
                $id = $mysql->insert("_tbl_product_credits",array("UserID"        => $user[0]['userid'],
                                                                  "Particulars"   => "Add Credits From Admin",
                                                                  "Credits"       => $_POST['Credits'],
                                                                  "Debits"        => "0",
                                                                  "Balance"       => $app::getTotalBalanceUserCredits($user[0]['userid'])+$_POST['Credits'],
                                                                  "RequestOn"     => date("Y-m-d H:i:s")));
                                                                  
            ?>
            <script>
                $(document).ready(function() {
                    swal("Credits Added Successfully", {
                        icon:"success",
                        confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href='dashboard.php?action=user/usersellproducts'
                    });                                     
                });
            </script>
            <?php  } ?>
<script>

$(document).ready(function () {
   
    $("#Credits").blur(function () {
        if(IsNonEmpty("Credits","ErrCredits","Please Enter Credits")){
            IsNumeric("Credits","ErrCredits","Please Enter Numerice Characters Only");
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
                                    <div class="card-title">Add Credits</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="Name" class="col-md-3">Person Name</label>
                                            <div class="col-md-9">: <?php echo $user[0]['personname'];?></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Name" class="col-md-3">Email Address</label>
                                            <div class="col-md-9">: <?php echo $user[0]['email'];?></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Name" class="col-md-3">Mobile Number</label>
                                            <div class="col-md-9">: <?php echo $user[0]['mobile'];?></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <label for="Name">Credits<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="Credits" name="Credits" placeholder="Enter Credits" value="<?php echo (isset($_POST['Credits']) ? $_POST['Credits'] :"");?>">
                                                <span class="errorstring" id="ErrCredits"><?php echo isset($ErrCredits)? $ErrCredits : "";?></span>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Credits</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Credits</button>
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
        $('#ErrCredits').html("");
        if(IsNonEmpty("Credits","ErrCredits","Please Enter Credits")){
            IsNumeric("Credits","ErrCredits","Please Enter Numerice Characters Only");
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
                                +'Are you sure want to add credits?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddCredits()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function AddCredits() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

  
         