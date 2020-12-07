 
 <?php
                            if (isset($_POST['SubmitBtn'])) {
                                 
                                $target_path = "assets/resumes/";
                                 
                                $filename = strtolower(time()."_".$_FILES['file']['name']);
                                   $filename = preg_replace('/\s+/', '', $filename);
                                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path.$filename)) {
                                    
                                      $id =  $mysql->insert("_full_time_job_resume",array("ResumeName"   =>$_POST['firstname'],
                                                                                          "EmailID"      =>$_POST['emailid'],              
                                                                                          "Gender"       =>$_POST['sex'],              
                                                                                          "City"         =>$_POST['city'],              
                                                                                          "Country"      =>$_POST['country'],              
                                                                                          "State"        =>$_POST['state'],              
                                                                                          "District"     =>$_POST['streetname'],              
                                                                                          "MobileNumber" =>$_POST['mobileno'],              
                                                                                          "Password"     =>$_POST['password'],              
                                                                                          "Expectations" =>$_POST['password'],              
                                                                                          "Resume"       =>$filename,              
                                                                                          "CreatedOn"    =>date("Y-m-d H:i:s")));       ?>
                                         <form action="https://www.kasupanamthuttu.com/pay_resume.php" method="post" id="frmd">
                                            <input type="hidden" name="record" value="<?php echo md5("x".$id);?>">
                                         </form>
                                         <script>
                                            $('#frmd').submit();
                                         </script>
                                        <div class="line"  id="successdiv" style="text-align: center;">
                                            <div class="box margin-bottom">
                                                <table>
                                                    <tr>
                                                        <td colspan="3" style="text-align:center">
                                                            <img src="../assets/tick.jpg" style="width: 120px;margin: 0px auto;"><br>
                                                            <h3 style="border-bottom: none;">Your information saved successfully</h3> <br>
                                                            <button class="btn btn-primary" >Pay Now</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                   <?php   } else {   ?>
                                        
                                        <div class="line"  id="successdiv">
                                            <div class="box margin-bottom">
                                                <div>
                                                    <article class="s-12 m-7 l-12" style="text-align:center;">
                                                        <h3>Couldn't save your information</h3>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                               <?php      }
                                     
                                }else {      ?>
                                
                                  <style>
.errorstring{width:100%;font-size:11px;color:red}
</style>
<script>

function IsEmail(email) {
        if (email.length==0) {
            return false;
        }
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/
        if (email.match(reg)) {
            return true
        }
        return false;
    } 
    
    $(document).ready(function(){
        $("#firstname").blur(function() { 
            $('#Errfirstname').html("");   
            var ac_name = $('#firstname').val().trim();
            if (ac_name.length==0) {
                $('#Errfirstname').html("Please Enter Name");   
            }
        });
        
        $("#emailid").blur(function() { 
            $('#Erremailid').html(""); 
            var ap_email = $('#emailid').val().trim();
            if (ap_email.length==0) {
                $('#Erremailid').html("Please Enter Email ID");   
            } else {
                if (!(IsEmail(ap_email))) {
                    $('#Erremailid').html("Please Enter Valid Email ID");
                }
            }
         });
        $("#city").blur(function() { 
            $('#Errcity').html(""); 
             var city = $('#city').val().trim();
             if (city.length==0) {
                $('#Errcity').html("Please Enter City");   
             }
         });
        $("#mobileno").blur(function() { 
            $('#Errmobileno').html(""); 
             var m = $('#mobileno').val().trim();
                if (m.length==0) {
                    $('#Errmobileno').html("Please Enter Mobile Number");
                } else {
                    if (!($('#mobileno').val().length==10 && parseInt($('#mobileno').val())>6000000000 && parseInt($('#mobileno').val())<9999999999)) {
                        $('#Errmobileno').html("Please Enter Valid Mobile Number");
                    }
                } 
        });
        $("#password").blur(function() { 
            $('#Errpassword').html(""); 
        var password = $('#password').val().trim();
         if (password.length==0) {
            $('#Errpassword').html("Please Enter Password");   
         }
         });
         
          $("#cpassword").blur(function() { 
            $('#Errcpassword').html(""); 
         var cpassword = $('#cpassword').val().trim();
         if (cpassword.length==0) {
            $('#Errcpassword').html("Please Enter Confirm Password");   
         }
         });
         $("#cpassword").blur(function() { 
            $('#Errcpassword').html(""); 
            var password = $('#password').val().trim();
            var cpassword = $('#cpassword').val().trim();
         if(!(password==cpassword)){
             $('#Errcpassword').html("Password do not match");   
         }
         });
         $("#expecations").blur(function() { 
            $('#Errexpecations').html("");
         var expecations = $('#expecations').val().trim();
         if (expecations.length==0) {
            $('#Errexpecations').html("Please Enter Expecations");   
         }
         });
         
           $("#file").blur(function() { 
            $('#Errfile').html("");
         var file = $('#file').val().trim();
         if (file.length==0) {
            $('#Errfile').html("Please upload resume");   
         }
         });
        
    });

function checkInputs() {
     $('#Errfirstname').html(""); 
     $('#Erremailid').html(""); 
     $('#Errcity').html(""); 
     $('#Errmobileno').html(""); 
     $('#Errpassword').html(""); 
     $('#Errcpassword').html(""); 
     $('#Errexpectations').html(""); 
     $('#Errfile').html(""); 
     
     var ErrorCount=0;
     
     var ac_name = $('#firstname').val().trim();
     if (ac_name.length==0) {
        $('#Errfirstname').html("Please Enter Name");   
        ErrorCount++;      
     }
     
     var ap_email = $('#emailid').val().trim();
        if (ap_email.length==0) {
            $('#Erremailid').html("Please Enter Email ID");   
            ErrorCount++;      
        } else {
            if (!(IsEmail(ap_email))) {
                $('#Erremailid').html("Please Enter Valid Email ID");
            ErrorCount++; 
            }
        }
     var city = $('#city').val().trim();
     if (city.length==0) {
        $('#Errcity').html("Please Enter City");   
        ErrorCount++;      
     }
     
     var m = $('#mobileno').val().trim();
        if (m.length==0) {
            $('#Errmobileno').html("Please Enter Mobile Number");
           ErrorCount++;   
        } else {
            if (!($('#mobileno').val().length==10 && parseInt($('#mobileno').val())>6000000000 && parseInt($('#mobileno').val())<9999999999)) {
                $('#Errmobileno').html("Please Enter Valid Mobile Number");
            ErrorCount++;           
            }
        } 
        
        var password = $('#password').val().trim();
         if (password.length==0) {
            $('#Errpassword').html("Please Enter Password");   
            ErrorCount++;      
         }
         var cpassword = $('#cpassword').val().trim();
         if (cpassword.length==0) {
            $('#Errcpassword').html("Please Enter Confirm Password");   
            ErrorCount++;      
         }
         if(!(password==cpassword)){
             $('#Errcpassword').html("Password do not match");   
            ErrorCount++; 
         }
         
         var expecations = $('#expecations').val().trim();
         if (expecations.length==0) {
            $('#Errexpecations').html("Please Enter Expecations");   
            ErrorCount++;      
         }
         var file = $('#file').val().trim();
         if (file.length==0) {
            $('#Errfile').html("Please upload resume");   
            ErrorCount++;      
         }
        
        
        if (ErrorCount>0) {
            return false;
        }else {
            return true;
        }
    
}
</script>



<div class="line"  id="formdiv">
    <div class="box margin-bottom">
        <div>
            <article class="s-12 m-7 l-12">
                <h5 style="text-align: left;font-family: arial;">Submit Your Resume</h5> 
                <form action="" method="post" enctype="multipart/form-data"  onsubmit="return checkInputs();">
                <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;width: 100%;">
                    <tr>
                        <td width="150">Name<span class="man">*</span></td>
                        <td><input type="text" name="firstname" id="firstname" value="<?php echo $_POST['firstname'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Errfirstname"></span></td>
                    </tr>
                    <tr>
                        <td>E-mail ID<span class="man">*</span></td>
                        <td><input type="text" name="emailid" id="emailid"  value="<?php echo $_POST['emailid'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Erremailid"></span></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select name="sex" style="border:1px solid #D4E3F6;padding:3px;">
                                <option value="male" <?php echo ($_POST['sex']=="male")? 'selected=selected':'';?>>Male</option>
                                <option value="female" <?php echo ($_POST['sex']=="female")? 'selected=selected':'';?>>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>City / Town<span class="man">*</span></td>
                        <td><input type="text" name="city" id="city"   value="<?php echo $_POST['city'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Errcity"></span></td>
                    </tr>
                    <tr>
                        <td>Country Name<span class="man">*</span></td>
                        <td>
                        <script>
                            function countryselect(val) {
                                if (val=='india') {
                                  $('#state').show();  
                                  $('#streetname').show();
                                }
                            }
                        </script>
                            <select name='country'  style="border:1px solid #D4E3F6;padding:3px;" onchange="countryselect($(this).val())">
                                <option value='india' selected="selected" <?php echo ($_POST['country']=='india')?'selected=selected':'';?> >India</option>
                            </select>
                        </td>  
                    </tr>
                    <tr>
                        <td>State Name</td>
                        <td>
                            <?php  $statenames=$mysql->select("select * from _statenames order by statenames"); ?>
                            <select id='state' name="state" style="border:1px solid #D4E3F6;padding:3px;width: 400px" onchange="$('#dis_name').html($('#_s'+$(this).val()).html())">
                            <option value="">Select State Name</option>
                            <?php foreach($statenames as $statename) { ?>
                                    <option value="<?php echo $statename['id'];?>"   <?php echo ((($statename['id']==$_POST['statename']) || ($statename['id']==31)) ? "selected=selected" : ""); ?> ><?php echo $statename['statenames'];?></option>
                            <?php } ?>
                            </select>  
                        </td>
                    </tr>
                    <tr>
                        <td>District Name</td>
                        <td>
                            <div id='dis_name'>
                                <select name="streetname" style="border:1px solid #D4E3F6;padding:3px;width: 400px">
                                    <option value="">Select District Name</option>
                                </select>  
                            </div>
                            <?php if (isset($_POST['statename'])) { ?>
                            <script>
                                $('#dis_name').html($('#_s31').html());
                            </script>
                            <?php } ?>
                        </td>
                    </tr>                      
                    <tr>
                        <td>Phone<span class="man">*</span></td>
                        <td><input type="text" name="mobileno" id="mobileno" value="<?php echo $_POST['mobileno'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Errmobileno"></span></td>
                    </tr>            
                    <tr>
                        <td>Password<span class="man">*</span></td>
                        <td><input type="password" name="password" id="password" value="<?php echo $_POST['password'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Errpassword"></span></td>
                    </tr>            
                    <tr>
                        <td>Confrim Password<span class="man">*</span></td>
                        <td><input type="password" name="cpassword" id="cpassword" value="<?php echo $_POST['cpassword'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Errcpassword"></span></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Your expectations<span class="man">*</span></td>
                        <td><textarea   name="expecations" id="expecations"   style="width: 100%;border:1px solid #D4E3F6;padding:3px;"><?php echo $_POST['expecations'];?></textarea><br> <span class="errorstring" id="Errexpecations"></span></td>
                    </tr>  
                    <tr>
                        <td>Attach Your Resume<span class="man">*</span></td>
                        <td><input type="file" name="file" id="file"   style="border:1px solid #D4E3F6;padding:3px;"><br> <span class="errorstring" id="Errfile"></span></td>
                    </tr> 
                    <tr>
                        <td>&nbsp;</td>
                        <td><button type="submit" class="btn btn-success" name="SubmitBtn">Submit Now</button></td>
                    </tr>
                </table>
                </form>
            </article>
            <?php
    $sn = $mysql->select("select * from _statenames order by statenames");
    foreach($sn as $s) {
        echo "<div id='_s".$s['id']."' style='display:none'>";
        
        $dn = $mysql->select("select * from _districtnames where stateid=".$s['id']);
        
        echo "<select id='streetname' name='streetname' style='border:1px solid #D4E3F6;padding:3px;width: 400px'>";
         
        if (sizeof($dn)>0) {
            foreach($dn as $d) {     ?>
            <option value="<?php echo trim(str_replace("\n","",$d['districtname']));?>"  <?php echo (($d['id']==$_POST['districtname']) ? "selected=selected" : ""); ?> ><?php echo $d['districtname'];?></option>
            <?php
            }
         } else {
             echo "<option value='-1'>None</option>";
         }
         echo "</select>";
        echo "</div>";
    }
?>
<script>
$('#dis_name').html($('#_s'+$('#state').val()).html());
</script>
        </div>
    </div>
</div> 
                                    
                     <?php       }
                        ?>

