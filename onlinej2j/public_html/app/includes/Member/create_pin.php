<?php
    if (isset($_POST['btnsubmit'])) {
         $id = $mysql->execute("update `_tbl_members` set `MemberPin`='".$_POST['confirmnewPin']."' where `MemberID`='".$_SESSION['User']['MemberID']."'"); 
         if(sizeof($id)>0){  ?>
         
         <script>
              $(document).ready(function () {
                    $('#ConfirmationPopup').modal("show");
              });
         </script>
          
        <?php  }
    }
    
?>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;padding-top:20px;">
      
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;">
            <div style="width:100%;padding:10px;background:#fff;text-align:center;color:#222"><img src="https://www.saralservices.in/app/assets/tick.jpg" style="width:128px"><br><br>Your New Pin Saved<br></div>
            <div style="text-align:center;padding:10px;"><button type="button" class="btn btn-danger btn-sm" onclick="location.href='dashboard.php'">Continue</button></div>
         </div>
         
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {
   
        $("#Pin").blur(function(){
            $('#ErrPin').html("");
            var Pin = $('#Pin').val().trim();
            if (Pin.length==0) {
                $('#ErrPin').html("Please Enter New Pin");
            }else{
                if (!(Pin.length>=4)) {
                  $('#ErrPin').html("New Pin requires minimum 4 characters");  
                }
            }
        });
         $("#confirmnewPin").blur(function(){
            $('#ErrconfirmnewPin').html("");
            var NPin = $('#confirmnewPin').val().trim();
            if (NPin.length==0) {
                $('#ErrconfirmnewPin').html("Please Enter Confirm New Pin");
            }else{
                if (!(NPin.length>=4)) {
                  $('#ErrconfirmnewPin').html("Confirm New Pin requires minimum 4 characters");  
                }
            }
        });
    
});
function SubmitPin() {
        
        $('#ErrPin').html(""); 
        $('#ErrconfirmnewPin').html(""); 
        
        var ErrorCount=0;                                                                                    
        
       
        var NPin = $('#Pin').val().trim();
        if (NPin.length==0) {
            $('#ErrPin').html("Please Enter New Pin");
            ErrorCount++;
        }else{
            if (!(NPin.length>=4)) {
              $('#ErrPin').html("New Pin requires minimum 4 characters");  
              ErrorCount++;
            }
        }
        var CPin = $('#confirmnewPin').val().trim();
        if (CPin.length==0) {
            $('#ErrconfirmnewPin').html("Please Enter confirm New Pin");
            ErrorCount++;
        }else{
            if (!(CPin.length>=4)) {
              $('#ErrconfirmnewPin').html("Confirm Pin requires minimum 4 characters");  
              ErrorCount++;
            }
        }
        
        if (NPin!=CPin) {
            $('#ErrconfirmnewPin').html("Pins do not match");
            ErrorCount++;
        }
    
        return (ErrorCount==0) ? true : false;
         }
</script>

        <!-- Sidebar -->
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create Pin</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitPin();">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">New Pin <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="Password" class="form-control" id="Pin" name="Pin" placeholder="Enter New Pin" value="<?php echo (isset($_POST['Pin']) ? $_POST['Pin'] :"");?>">
                                                <span class="errorstring" id="ErrPin"><?php echo isset($ErrPin)? $ErrPin : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Confirm New Pin <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="Password" class="form-control" id="confirmnewPin" name="confirmnewPin" placeholder="Enter Confirm New Pin" value="<?php echo (isset($_POST['confirmnewPin']) ? $_POST['confirmnewPin'] :"");?>">
                                                <span class="errorstring" id="ErrconfirmnewPin"><?php echo isset($ErrconfirmnewPin)? $ErrconfirmnewPin : "";?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Save Pin">
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            