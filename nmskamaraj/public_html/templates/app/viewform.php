 
   <?php 
   $mysql =   new MySql();  
       if(Isset($_POST['submitbtn'])){
            if($_POST['Year']=="FirstYear"){
                $sql= $mysql->select("SELECT * FROM admission_firstyear WHERE AadhaarNumber='".$_POST['AadhaarNumber']."' and FathersMobile='".$_POST['FathersMobile']."'");
                if(sizeof($sql)!=0){
                    $_SESSION['F']=$sql[0]['AdmissionID'];
                    echo "<script>location.href='".$_SERVER['BASE_URL']."viewfirstyear'</script>";
                } else { $error="Form not found";   }
            }
            if($_POST['Year']=="SecondYear"){
                $sql= $mysql->select("SELECT * FROM admission_secondyear WHERE AadhaarNumber='".$_POST['AadhaarNumber']."' or FathersMobile='".$_POST['FathersMobile']."'");
                if(sizeof($sql)!=0){
                       $_SESSION['S']=$sql[0]['AdmissionID'];
                echo "<script>location.href='".$_SERVER['BASE_URL']."viewSecondYear'</script>";
                }else { $error="Form not found";  } }  }   
   ?>  
<script>
function is_Numeric(acname) {
    
        if (acname.length==0) {
            return false;
        }         
        var reg = /^[0-9]*$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
$(document).ready(function(){
    $("#AadhaarNumber").blur(function() { 
            $('#ErrAadhaarNumber').html(""); 
            var AadhaarNumber = $('#AadhaarNumber').val().trim();
            if (AadhaarNumber.length==0) {
                $('#ErrAadhaarNumber').html("Please Enter Aadhaar Number");   
            } else {
                if (!(is_Numeric(AadhaarNumber))) {
                    $('#ErrAadhaarNumber').html("Please Enter Numeric Characters Only");
                }
            }
        });
        $("#FathersMobile").blur(function() { 
            $('#ErrFathersMobile').html("");   
            var FathersMobile = $('#FathersMobile').val().trim();
            if (FathersMobile.length==0) {
                $('#ErrFathersMobile').html("Please Enter Father's Mobile Number");
            } else {
                if (!($('#FathersMobile').val().length==10 && parseInt($('#FathersMobile').val())>6000000000 && parseInt($('#FathersMobile').val())<9999999999)) {
                    $('#ErrFathersMobile').html("Please Enter Valid Mobile Number");
                }
            }
        });
});
function doConfrim() {
     $('#ErrAadhaarNumber').html(""); 
     $('#ErrFathersMobile').html(""); 
     
     var ErrorCount=0;
     
     var AadhaarNumber = $('#AadhaarNumber').val().trim();
        if (AadhaarNumber.length==0) {
            $('#ErrAadhaarNumber').html("Please Enter Aadhaar Number");   
            ErrorCount++;      
        } else {
            if (!(is_Numeric(AadhaarNumber))) {
                $('#ErrAadhaarNumber').html("Please Enter Numeric Characters Only");
            ErrorCount++; 
            }
        }
    var FathersMobile = $('#FathersMobile').val().trim();
        if (FathersMobile.length==0) {
            $('#ErrFathersMobile').html("Please Enter Father's Mobile Number");
            ErrorCount++;
        } else {
            if (!($('#FathersMobile').val().length==10 && parseInt($('#FathersMobile').val())>6000000000 && parseInt($('#FathersMobile').val())<9999999999)) {
                $('#ErrFathersMobile').html("Please Enter Valid Mobile Number");
            ErrorCount++;
            }
        }
    if(ErrorCount==0){
        return true;
    }else {
        return false;
    }
}
</script>      
<style>
.errorstring{width:100%;font-size:11px;color:red;}
</style>                                                                                                           
   
    <section class="kamaraj-contact-field">                                                                         
        <div class="container">
            <div class="row" >
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="POST" onsubmit="return doConfrim()">
                        <div class="col-md-12">
                            <label>Select Applied Year</label>
                            <select name="Year" id="Year" class="form-control">
                                <option value="FirstYear" <?php echo (($_POST[ 'Year']=="FirstYear") ? " selected='selected' " : "");?>>First Year</option>    
                                <option value="SecondYear" <?php echo (($_POST[ 'Year']=="SecondYear") ? " selected='selected' " : "");?>>Second Year</option>    
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Applicant's Aadhaar Number</label>
                            <input type="text" name="AadhaarNumber" id="AadhaarNumber" value="<?php echo isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : ""; ?>" class="form-control">
                            <div id="ErrAadhaarNumber" class="errorstring"></div>
                        </div>
                        <div class="col-md-12">
                            <label>Father's Mobile Number</label>
                            <input type="text" name="FathersMobile" maxlength="10" value="<?php echo isset($_POST['FathersMobile']) ? $_POST['FathersMobile'] : ""; ?>" id="FathersMobile" class="form-control">
                            <div id="ErrFathersMobile" class="errorstring"></div>
                        </div>
                        <div class="col-md-12" style="text-align: center;color:red;">
                            <?php echo $error;?>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <br><button type="submit" class="btn btn-default kamaraj-big-btn" name="submitbtn">View Application</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
                   
                </div>
            </div>
        </div>
    </section>
 