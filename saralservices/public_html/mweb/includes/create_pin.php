<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div class="main-panel">
    <div class="container" style="margin-top:0px !important">
        <div class="page-inner"  style="padding: 0px;">
            <?php if (isset($_POST['submitRequest'])) { ?>
                <script>$('#myModal').modal("show");</script>
            <?php
                $id= $mysql->execute("update _tbl_Members set MemberPin='".$_POST['NPin']."' where MemberID='".$_SESSION['User']['MemberID']."'");
                  if(sizeof($id)>0){
                    $result['status']="success";
                } else {
                    $result['status']="failure";
                }
                echo "<script>$('#myModal').modal('hide');</script>";
                if ($result['status']=="success") {
                    
            ?>
           <script>
           $(document).ready(function(){
            var txt = "<span style='font-size:20px;'>Your New Pin Saved</span><br></div>"
                    +"<div style='padding:20px;text-align:center'>"
                        +"<a href='dashboard.php' class='btn btn-secondary'>Continue</button>"
                    +"</div>"; 
                $('#xconfrimation_text').html(txt);    
                $('#ConfirmationPopup').modal("show");
           });
           </script>
        <?php } else {?>
            <div class="row">
                <div class="col-md-12" style="padding: 5px;">
                    <div class="card" style="background: none;">
                        <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                            <?php echo $result['number']; ?><br>
                            Rs. <?php echo $result['amount']; ?><br>
                        </div>
                        <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                            Transaction failed<br>
                            <?php echo $result['message']; ?>
                        </div>
                         <a href="dashboard.php?action=settings" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
                <div class="row">
                    <div class="col-md-12" style="padding: 5px;">
                        <div class="card" style="background: none;">
                            <div class="card-header">
                                <div class="card-title" style="text-align: center;">Create Pin</div>
                            </div>
                            <div class="card-body" style="padding: 0px;">
                            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs();">
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">New Pin</label>
                                        <input type="password"  value="<?php echo isset($_POST['NPin']) ? $_POST['NPin'] : "";?>" maxlength="10" name="NPin" id="NPin" class="form-control" placeholder="New Pin" >
                                        <div class="errorstring" id="ErrNPin"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Confirm New Pin</label>
                                        <input type="password"  value="<?php echo isset($_POST['CPin']) ? $_POST['CPin'] : "";?>" maxlength="10" name="CPin" id="CPin" class="form-control" placeholder="Confirm Pin">
                                        <div class="errorstring" id="ErrCPin"><?php echo isset($error)? $error : "";?></div>
                                    </div>
                                </div>
                              
                                <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input type="submit" name="submitRequest" id="submitRequest" style="display:none">
                                        <button type="button" class="btn btn-danger" onclick="doConfrim()" style="width: 48%;">Save Pin</button>
                                    </div>                                        
                                </div>
                            </form>    
                            </div>
                        </div>  
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<script>
var IsConfirm=0;
$(document).ready(function(){
        
        $("#NPin").blur(function(){
            $('#ErrNPin').html("");
            var NPin = $('#NPin').val().trim();
            if (NPin.length==0) {
                $('#ErrNPin').html("Please Enter New Pin");
            }else{
                if (!(NPin.length>=4)) {
                  $('#ErrNPin').html("New Pin requires minimum 4 characters");  
                }
            }
        });
        $("#CPin").blur(function(){
            $('#ErrCPin').html("");
            var NPin = $('#CPin').val().trim();
            if (NPin.length==0) {
                $('#ErrCPin').html("Please Enter CPin");
            }else{
                if (!(NPin.length>=4)) {
                  $('#ErrCPin').html("Confirm New requires minimum 4 characters");  
                }
            }
        });
     
});
function checkInputs() {
    
        $('#ErrNPin').html(""); 
        $('#ErrCPin').html(""); 
        
        var error=0;                                                                                    
        
       
        var NPin = $('#NPin').val().trim();
        if (NPin.length==0) {
            $('#ErrNPin').html("Please Enter New Pin");
            error++;
        }else{
            if (!(NPin.length>=4)) {
              $('#ErrNPin').html("New Pin requires minimum 4 characters");  
              error++;
            }
        }
        var CPin = $('#CPin').val().trim();
        if (CPin.length==0) {
            $('#ErrCPin').html("Please Enter CPin");
            error++;
        }else{
            if (!(CPin.length>=4)) {
              $('#ErrCPin').html("Confirm Pin requires minimum 4 characters");  
              error++;
            }
        }
        
        if (NPin!=CPin) {
            $('#ErrCPin').html("New & Confirm Pin must have same");
            error++;
        }
           
        if (error>0) {
            return false;
        }
            return true;
}

function doConfrim() {
    if (checkInputs()) {
        var txt = "<span style='font-size:20px;'>Are you sure want to save?</span><br></div>"
                    +"<div style='padding:20px;text-align:center'>"
                        +"<button type='button' class='btn btn-warning' onclick='SavePin()' name='submitRequest' >Confirm</button>"
                    +"</div>"; 
        $('#xconfrimation_text').html(txt);    
        $('#ConfirmationPopup').modal("show");
    }else {
            return false;
        }
}
function SavePin(){
    $( "#submitRequest" ).trigger( "click" );
}
</script>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         <h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;">
      </div>
    </div>
  </div>
</div>