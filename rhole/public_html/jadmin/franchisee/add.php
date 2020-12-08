<?php
    include_once("../../config.php"); 
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
            
            $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_franchisee where EmailID='".$_POST['emailid']."'");
            if(sizeof($dupemail)>0){
                $Erremailid ="EmailID Already Exist";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
              $c = $mysql->select("select * from _jcountrynames where countryid='".$_POST['country']."'");
              
              $sn = $mysql->select("select * from _jstatenames where stateid='".$_POST['state']."'");
              
              $dn = $mysql->select("select * from _jdistrictnames where distcid='".$_POST['district']."'");  
              
         /*     if(JFranchiseetable::addFranchisee($_POST['franchiseename'],$_POST['emailid'],$_POST['password'],$_POST['country'],$c[0]['countryname'],$_POST['state'],$sn[0]['statenames'],$_POST['district'],$dn[0]['districtname'],date("Y-m-d H:i:s"))>0){
                        echo  CommonController::printSuccess("Franchisee added successfully");        
                } else {
                        echo CommonController::printError("Error Adding Franchisee"); 
                }  */   
                
              
                  
                  $param=array("FranchiseeName" => $_POST['franchiseename'],
                               "EmailID"        => $_POST['emailid'],
                               "Password"       => $_POST['password'],
                               "CountryID"      => $_POST['country'],                  
                               "CountryName"    => $c[0]['countryname'],                  
                               "StateID"        => $_POST['state'],
                               "StateName"      => $sn[0]['statenames'],
                               "DistrictID"     => $_POST['district'],
                               "DistrictName"   => $dn[0]['districtname'],
                               "CreatedOn"      => date("Y-m-d H:i:s"));
               $id = $mysql->insert("_tbl_franchisee",$param);
               if(sizeof($id)>0){
                   unset($_POST);
                  echo $obj->printSuccess("New Franchisees added successfully");
              }  else {
                  echo $obj->printError("Error adding Franchisees");
              }  
            }
      }                             
?>
 <script src="https://www.klx.co.in/assets/js/jquery.3.2.1.min.js"></script>
 <script>
 
     function getState(CountryID) {
        $.ajax({url:'../../webservice.php?action=getStateNames&countryid='+CountryID,success:function(data){
            $('#div_statenames').html(data);
        }});
    }
    function getDistrict(stateID) {
        $.ajax({url:'../../webservice.php?action=getDistrict&stateID='+stateID,success:function(data){
            $('#div_districtnames').html(data);
        }});
    }
  
     function is_AlphaNumeric(acname) {
    
        if (acname.length==0) {
            return false;
        }
        var reg = /^[a-z0-9\-\s]+$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
    
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
        $("#franchiseename").blur(function() { 
          $('#Errfranchiseename').html("");    
            var fr_name = $('#franchiseename').val().trim();
                if (fr_name.length==0) {
                    $('#Errfranchiseename').html("Please Enter Franchisee Name");   
                } else {
                    if (!(is_AlphaNumeric(fr_name))) {
                        $('#Errfranchiseename').html("Please Enter Alpha Numeric Characters Only");
                    }
                }
        });
        
        $("#emailid").blur(function() {   
            $('#Erremailid').html("");    
            var email = $('#emailid').val().trim();
            if (email.length==0) {
                $('#Erremailid').html("Please Enter Email ID");   
            } else {
                if (!(IsEmail(email))) {
                    $('#Erremailid').html("Please Enter Valid Email ID");
                }
            }
        });
        
        $("#password").blur(function() {   
            $('#Errpassword').html("");    
            var pass = $('#password').val().trim();
            if (pass.length==0) {
                $('#Errpassword').html("Please Enter Password");   
            } else {
                if (pass.length<6) {
                    $('#Errpassword').html("Please Enter Maximum 6 Charcters");
                }
            }
        });
        $("#confirmpassword").blur(function() {   
            $('#Errconfirmpassword').html("");    
            var cpass = $('#confirmpassword').val().trim();
            var pass = $('#password').val().trim();
            if (cpass.length==0) {
                $('#Errconfirmpassword').html("Please Enter Confirm Password");   
            } else {
               if (pass!=cpass) {
                    $('#Errconfirmpassword').html("Password & Confirm Password must have same");
                }
            }
        });
        $("#country").blur(function() {   
            $('#Errcountry').html("");    
            var country = $('#country').val().trim();
            if (country==0) {
                $('#Errcountry').html("Please Select Country");   
            } 
        });
 });
 
  function checkInputs() {
    $('#Errfranchiseename').html(""); 
    $('#Erremailid').html(""); 
    $('#Errpassword').html(""); 
    $('#Errcountry').html(""); 
   
    var ErrorCount=0;                                                                                    
     
       var fr_name = $('#franchiseename').val().trim();
        if (fr_name.length==0) {
            $('#Errfranchiseename').html("Please Enter Franchisee Name");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(fr_name))) {
                $('#Errfranchiseename').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
        var email = $('#emailid').val().trim();
        if (email.length==0) {
            $('#Erremailid').html("Please Enter Email ID");   
            ErrorCount++;      
        } else {
            if (!(IsEmail(email))) {
                $('#Erremailid').html("Please Enter Valid Email ID");
            ErrorCount++; 
            }
        }
        var pass = $('#password').val().trim();
        if (pass.length==0) {
            $('#Errpassword').html("Please Enter Password");   
            ErrorCount++;      
        } else {
            if (pass.length<6) {
                $('#Errpassword').html("Please Enter Maximum 6 Charcters");
            ErrorCount++; 
            }
        }
        var cpass = $('#confirmpassword').val().trim();
        if (cpass.length==0) {
            $('#Errconfirmpassword').html("Please Enter Confirm Password");   
            ErrorCount++;      
        } else {
           if (pass!=cpass) {
                $('#Errconfirmpassword').html("Password & Confirm Password must have same");
            ErrorCount++; 
            }
        }
         var country = $('#country').val().trim();
        if (country==0) {
            $('#Errcountry').html("Please Select Country");   
            ErrorCount++;      
        } 
         if (ErrorCount>0) {
            return false;
        }else {
            return true;
        }
        
       
   }
        
    
 </script>
 

<link rel="stylesheet" href="../../assets/css/demo.css">
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
.errorstring {color:red;}
</style>
 <body style="margin:0px;">
 <div class="titleBar">Add Franchisee</div>
 <table cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td style="vertical-align: top;">
                <form action="" method="post" style="background-color:#fff;" onsubmit="return checkInputs();"> 
                    <table style="margin:0px auto;color: #333;font-family:'Trebuchet MS';font-size: 13px;width:491px" cellpadding="3" cellspacing="0" align="left">
                       <tr>
                             <td style="text-align:left;">Franchisee Name&nbsp;&nbsp;</td>
                             <td>
                                <input type="text" name="franchiseename" id="franchiseename" style="width:365px" value="<?php echo isset($_POST['franchiseename']) ? $_POST['franchiseename'] : ""; ?>"><br>
                                <span class="errorstring" id="Errfranchiseename"></span>
                             </td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;">Email ID&nbsp;&nbsp;</td>
                             <td>
                                <input type="text" name="emailid" id="emailid" style="width:365px" value="<?php echo isset($_POST['emailid']) ? $_POST['emailid'] : ""; ?>"><br>
                                <span class="errorstring" id="Erremailid"><?php echo $Erremailid;?></span>
                             </td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;">Password&nbsp;&nbsp;</td>
                             <td>
                                <input type="password" name="password" id="password" style="width:365px" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""; ?>"><br>
                                <span class="errorstring" id="Errpassword"></span>
                             </td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;">Confirm Password&nbsp;&nbsp;</td>
                             <td>
                                <input type="password" name="confirmpassword" id="confirmpassword" style="width:365px" value="<?php echo isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : ""; ?>"><br>
                                <span class="errorstring" id="Errconfirmpassword"></span>
                             </td> 
                       </tr>
                       <tr>
                            <td style="text-align:left;">Country Name</td>
                            <td>
                                <select name="country" id="country" onchange="getState($(this).val())" style="width:100%" >
                                    <option value="0" selected="selected">Select Country</option> 
                                        <?php foreach(JPostads::getCountryNames() as $countryname) {?>
                                        <option value="<?php echo $countryname['countryid'];?>" <?php echo ($countryname['countryid']==$pageContent[0]['countryid'])? 'selected="selected"':'';?><?php echo isset($_POST['country']) ? $_POST['countryid'] : ""; ?>><?php echo $countryname['countryname'];?></option>
                                        <?php } ?>
                                 </select>  <br>
                                 <span class="errorstring" id="Errcountry"></span>
                            </td>
                        </tr> 
                        <tr>
                            <td style="text-align:left;">State Name</td>
                            <td>
                               <div id="div_statenames">
                               <select name="state" class="form-control" id="state" onchange="getDistrict($(this).val())" style="width:100%" >
                                        <option value="" selected="selected">Select State Name</option> 
                                 </select> 
                               </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">District Name</td>
                            <td>
                                <div id="div_districtnames">
                                <select class="form-control" name="district" id="district" style="width:100%" >
                                    <option value="" selected="selected">Select District Name</option> 
                                </select> 
                                </div>
                            </td>
                        </tr>
                        
                       <tr>
                            <td></td>
                            <td align="left"><input type="submit" name="save" value="Save" bgcolor="grey">  
                       </tr> 
                    </table>
                </form>
              <script>$('#success').hide(3000);</script> 
        </td>
    </tr>
  </table>
  </body>
                    


