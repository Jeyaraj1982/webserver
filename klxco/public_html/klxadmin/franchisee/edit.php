<?php
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
            
            $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_franchisee where EmailID='".$_POST['emailid']."' and userid<>'".$_GET['frid']."'");
            if(sizeof($dupemail)>0){
                $Erremailid ="EmailID Already Exist";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
              $c = $mysql->select("select * from _jcountrynames where countryid='".$_POST['country']."'");
              
              $sn = $mysql->select("select * from _jstatenames where stateid='".$_POST['state']."'");
              
              $dn = $mysql->select("select * from _jdistrictnames where distcid='".$_POST['district']."'");  
        
             $id = $mysql->execute("update _tbl_franchisee set `FranchiseeName`  ='".$_POST['franchiseename']."',
                                                                `EmailID`        ='".$_POST['emailid']."',
                                                                `Password`       ='".$_POST['password']."',
                                                                `CountryID`      ='".$_POST['country']."',                  
                                                                `CountryName`    ='".$c[0]['countryname']."',                  
                                                                `StateID`        ='".$_POST['state']."',
                                                                `StateName`      ='".$sn[0]['statenames']."',
                                                                `DistrictID`     ='".$_POST['district']."',
                                                                `IsActive`       ='".$_POST['IsActive']."',
                                                                `DistrictName`   ='".$dn[0]['districtname']."' where userid='".$_GET['frid']."'");
               if(sizeof($id)>0){
                  echo $obj->printSuccess("Update Franchisees successfully");
              }  else {
                  echo $obj->printError("Error updating Franchisees");
              }  
            }
      } 
      $data = $mysql->select("select * from _tbl_franchisee where userid='".$_GET['frid']."'");                      
?>
<script>
 
     function getState(CountryID,StateID) {
        $.ajax({url:'../../webservice.php?action=getStateNames&countryid='+CountryID+'&stateid='+StateID,success:function(data){
            $('#div_statenames').html(data);
        }});
    }
    function getDistrict(stateID,DistrictID) {                                            
        $.ajax({url:'../../webservice.php?action=getDistrict&stateID='+stateID+'&distID='+DistrictID,success:function(data){
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
            $('#Erremailid').html("Please Enter Applicant Email ID");   
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
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Edit Franchisee
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkInputs();">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Franchisee Name</label>
                                    <div class="col-md-3">
                                        <input type="text" name="franchiseename" id="franchiseename" class="form-control" value="<?php echo isset($_POST['franchiseename']) ? $_POST['franchiseename'] : $data[0]['FranchiseeName']; ?>">
                                        <span class="errorstring" id="Errfranchiseename"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Email ID</label>
                                    <div class="col-md-3">
                                        <input type="text" name="emailid" id="emailid" class="form-control" value="<?php echo isset($_POST['emailid']) ? $_POST['emailid'] : $data[0]['EmailID']; ?>">
                                        <span class="errorstring" id="Erremailid"><?php echo $Erremailid;?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Password</label>
                                    <div class="col-md-3">
                                        <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : $data[0]['Password']; ?>">
                                        <span class="errorstring" id="Errpassword"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Country Name</label>
                                    <div class="col-md-3">
                                        <select name="country" id="country" onchange="getState($(this).val())" class="form-control" >
                                              
                                              
                                             <?php 
                                                $countrynames = JPostads::getCountryNames(); 
                                               $countrynames[sizeof($countrynames)+1]=array("countryid"=>"-1","countryname"=>"For Digital Service");
                                             ?>
                                                <?php foreach($countrynames as $countryname) {?>
                                                <option value="<?php echo $countryname['countryid'];?>" <?php echo (isset($_POST[ 'country'])) ? (($_POST[ 'country']== $countryname['countryid']) ? " selected='selected' " : "") : (($data[0][ 'CountryID']== $countryname['countryid']) ? " selected='selected' " : "");?>><?php echo $countryname['countryname'];?></option>
                                                <?php } ?>
                                         </select> 
                                         <span class="errorstring" id="Errcountry"></span>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">State Name</label>
                                    <div class="col-md-3">
                                        <div id="div_statenames">
                                           <select name="state" class="form-control" id="state" onchange="getDistrict($(this).val())" class="form-control" >
                                                    <option value="" selected="selected">Select State Name</option> 
                                             </select> 
                                             <script>
                                                    if($('#country').val()>0){
                                                      getState($('#country').val(),'<?php echo $data[0]['StateID'];?>');  
                                                    }
                                               </script>
                                        </div>
                                    </div>
                               </div>  
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">District Name</label>
                                    <div class="col-md-3">
                                        <div id="div_districtnames">
                                            <select class="form-control" name="district" id="district" class="form-control">
                                                <option value="" selected="selected">Select District Name</option> 
                                            </select> 
                                        </div>
                                        <script>
                                            getDistrict('<?php echo $data[0]['StateID'];?>','<?php echo $data[0]['DistrictID'];?>');  
                                        </script>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">IsActive</label>
                                    <div class="col-md-3">                                                       
                                        <select class="form-control" name="IsActive" id="IsActive">
                                            <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']== "1") ? " selected='selected' " : "") : (($data[0][ 'IsActive']== "1") ? " selected='selected' " : "");?>>Yes</option>
                                            <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']== "0") ? " selected='selected' " : "") : (($data[0][ 'IsActive']== "0") ? " selected='selected' " : "");?>>No</option>
                                        </select>
                                    </div>
                               </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">Save</button>
                                    </div>                                        
                                </div>
                            </div>
                        </form>                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>$('#success').hide(3000);</script> 