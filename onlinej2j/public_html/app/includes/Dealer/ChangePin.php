<?php
    if (isset($_POST['btnsubmit'])) {
        $data = $mysql->select("select * from `_tbl_Members` where `MemberID`='".$_SESSION['User']['MemberID']."'");
        if($data[0]['MemberPin']==$_POST['CurrentPin']){
            $mysql->execute("update `_tbl_Members` set `MemberPin`='".$_POST['confirmnewPin']."' where `MemberID`='".$_SESSION['User']['MemberID']."'"); 
            unset($_POST);
           ?>
            <script>
                           jQuery(document).ready(function() {
           swal("Updated!", "New Pin updated", {
                        icon : "success",
                        buttons: {                    
                            confirm: {
                                className : 'btn btn-warning'
                            }
                        },
                    });
        });                                
                   
                 
                                                            </script>
           <?php
        } else {
            
             ?>
              <script>
                           jQuery(document).ready(function() {
           swal("Error!", "Incorrect Current Pin", {
                        icon : "error",
                        buttons: {                    
                            confirm: {
                                className : 'btn btn-warning'
                            }
                        },
                    });
        });                                
                   
                 
                                                            </script>
             <?php
        }
    }
    
?>
<script>
$(document).ready(function () {
    $("#CurrentPin").blur(function(){
            $('#ErrCurrentPin').html("");
            var m = $('#CurrentPin').val().trim();
            if (m.length==0) {
                $('#ErrCurrentPin').html("Please Enter Current Pin");
            } 
        });
      
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
        
        $('#ErrCurrentPin').html(""); 
        $('#ErrPin').html(""); 
        $('#ErrconfirmnewPin').html(""); 
        
        var ErrorCount=0;                                                                                    
        
        var Pin = $('#CurrentPin').val().trim();
        if (Pin.length==0) {
            $('#ErrCurrentPin').html("Please Enter Current Pin");
            ErrorCount++;
        }
        
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
                                    <div class="card-title">Change Pin</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitPin();">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Current Pin <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="Password" class="form-control" id="CurrentPin" name="CurrentPin" placeholder="Enter Current Pin" value="<?php echo (isset($_POST['CurrentPin']) ? $_POST['CurrentPin'] :"");?>">
                                                <span class="errorstring" id="ErrCurrentPin"><?php echo isset($ErrCurrentPin)? $ErrCurrentPin : "";?></span>
                                            </div>
                                        </div>
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
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Change Pin">
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            