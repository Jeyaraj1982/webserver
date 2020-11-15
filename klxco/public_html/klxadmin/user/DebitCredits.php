<?php
$user = $mysql->select("select * from _jusertable where md5(userid)='".$_GET['d']."'");
    if (isset($_POST['btnsubmit'])) {
        
                $id = $mysql->insert("_tbl_product_credits",array("UserID"        => $user[0]['userid'],
                                                                  "Particulars"   => "Debit Credits From Admin",
                                                                  "Credits"       => "0",
                                                                  "Debits"        => $_POST['Debits'],
                                                                  "Balance"       => $app::getTotalBalanceUserCredits($user[0]['userid'])-$_POST['Debits'],
                                                                  "RequestOn"     => date("Y-m-d H:i:s")));
                                                                  
            ?>
            <script>
                $(document).ready(function() {
                    swal("Credits Debited Successfully", {
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
   
    $("#Debits").blur(function () {
        if(IsNonEmpty("Debits","ErrDebits","Please Enter Debits")){
            IsNumeric("Debits","ErrDebits","Please Enter Numerice Characters Only");
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
                                    <div class="card-title">Debit Credits</div>
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
                                                <label for="Name">Debits<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="Debits" name="Debits" placeholder="Enter Debits" value="<?php echo (isset($_POST['Debits']) ? $_POST['Debits'] :"");?>">
                                                <span class="errorstring" id="ErrDebits"><?php echo isset($ErrDebits)? $ErrDebits : "";?></span>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Debit Credits</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Debit Credits</button>
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
        $('#ErrDebits').html("");
        if(IsNonEmpty("Debits","ErrDebits","Please Enter Debits")){
            IsNumeric("Debits","ErrDebits","Please Enter Numerice Characters Only");
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
                                +'Are you sure want to debit credits?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DebitCredits()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function DebitCredits() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

  
         