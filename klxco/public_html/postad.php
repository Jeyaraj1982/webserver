<?php
    include_once("header.php");
    $obj = new CommonController();
  /*  if($_SESSION['USER']['email']==""){
      echo " <script>location.href='https://www.klx.co.in/updateemail.php';</script>";   
    } else if($_SESSION['USER']['isemailverified']==0) {
        echo " <script>location.href='https://www.klx.co.in/emailverification.php';</script>";  
    }else {   */
    $slsubcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['subc']."'");                                                        
    $slcategory = $mysql->select("select * from _jcategory where categid='".$slsubcategory[0]['categid']."'");
?>
<style>
#div_1,#div_2,#div_3,#div_4,#div_5,#div_6{
    margin-left:15px;border:1px solid #ccc;text-align: center;height: 110px;width: 110px;float:left;margin-right:10px;margin-bottom:10px;
}
 #div_1:hover,#div_2:hover,#div_3:hover,#div_4:hover,#div_5:hover,#div_6:hover {
    border:1px solid #306dc5;                                                                              
 }
 
</style>                                                                                                     
<script>

    function getSubcategory(categoryID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getSubcategory&categoryID='+categoryID,success:function(data){
            $('#_subcategory').html(data);
        }});
    }
    function getStateNames(CountryID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getStateNames&countryid='+CountryID,success:function(data){
            $('#div_statenames').html(data);
            $('#district').html('<option value="0" selected="selected">Select District Name</option>');
        }});
    }
    function getDistrict(stateID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getDistrict&stateID='+stateID,success:function(data){
            $('#div_districtnames').html(data);
             $('#city').html('<option value="0" selected="selected">Select City Name</option>');
        }});
    }
    function getCityName(districtID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getcityname&districtID='+districtID,success:function(data){
            $('#div_citynames').html(data);
        }});
    }
    function getModel(brandid) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getModel&brandid='+brandid,success:function(data){
            $('#div_Model').html(data);
        }});
    }
    
     function getBrand(typeid) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getBrand&typeid='+typeid,success:function(data){
            $('#div_Brand').html(data);
        }});
    }
  
    function getVarient(modelid) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getVarient&modelid='+modelid,success:function(data){
            $('#div_Varient').html(data);
        }});
    }
</script>
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
        
        $("#title").blur(function() {
            $('#Errtitle').html("");   
            var title = $('#title').val().trim();
            if (title.length==0) {
                $('#Errtitle').html("Please Enter Title"); 
            } 
        });
        
        $("#content").blur(function(){
            $('#Errcontent').html("");
            var m = $('#content').val().trim();
            if (m.length==0) {
                $('#Errcontent').html("Please Enter Description");
            }
        });
        $("#countryid").blur(function(){     
           $('#Errcountryid').html("");   
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
            }
        });
        $("#uploadimage1").blur(function(){     
           $('#Errimage1').html("");   
            var im = $('#uploadimage1').val().trim();
                if (im.length==0) {
                    $('#Errimage1').html("Please Upload Image");
                }
        });
        $("#state").blur(function(){   
         $('#Errstate').html("");  
        var st = $('#state').val().trim();
            if (st==0) {
                $('#Errstate').html("Please Select State");
            }
        });
        $("#district").blur(function(){    
            $('#Errdistrict').html("");  
        var ds = $('#district').val().trim();
            if (ds==0) {
                $('#Errdistrict').html("Please Select District");
            }
        });
        $("#city").blur(function(){  
            $('#Errcity').html("");    
            var cty = $('#city').val().trim();
                if (cty==0) {
                    $('#Errcity').html("Please Select City");
                }
        });
        <?php if($_GET['subc']=="60" || $_GET['subc']=="61") { ?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        $("#Model").blur(function(){     
           $('#ErrModel').html("");   
        var Model = $('#Model').val().trim();
            if (Model==0) {
                $('#ErrModel').html("Please Select Model");
            }else {
                $('#ErrModel').html("");    
            }
        });
      /*  $("#Varient").blur(function(){     
           $('#ErrVarient').html("");   
        var Varient = $('#Varient').val().trim();
            if (Varient==0) {
                $('#ErrVarient').html("Please Select Varient");
            }
        }); */
        
        
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } else {
                if (!(is_Numeric(KMDriven))) {
                    $('#ErrKMDriven').html("Please Enter Numeric Characters Only");
                }
            } 
            });
        <?php } ?>
        <?php if($slsubcategory[0]['categid']!="5") {?>
        $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=1)) {
                    $('#Erramount').html("Amount must have Rs.1");
                }
            }   
        });
        <?php } ?>
        
        <?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22") {?>
        $("#SuperBuildUpArea").blur(function(){     
           $('#ErrSuperBuildUpArea').html("");   
        var cnt = $('#SuperBuildUpArea').val().trim();
            if (cnt==0) {
                $('#ErrSuperBuildUpArea').html("Please Enter Super Build Up Area");
            }
        });
        $("#CarpetArea").blur(function(){     
           $('#ErrCarpetArea').html("");   
        var cnt = $('#CarpetArea').val().trim();
            if (cnt==0) {
                $('#ErrCarpetArea').html("Please Enter Carpet Area");
            }
        });
        <?php } ?>
        <?php if($_GET['subc']=="96") {?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        <?php } ?>
        <?php if($_GET['subc']=="24") {?>
        $("#PlotArea").blur(function(){     
           $('#ErrPlotArea').html("");   
        var cnt = $('#PlotArea').val().trim();
            if (cnt==0) {
                $('#ErrPlotArea').html("Please Select Plot Area");
            }
        });
        <?php } ?>
        <?php if($_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66") { ?>
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });                                                                                          
        <?php } ?>
        <?php if($slsubcategory[0]['categid']=="5"){?>
            $("#SalaryFrom").blur(function() {
                $('#ErrSalaryFrom').html("");   
                var SalaryFrom = $('#SalaryFrom').val().trim();
                if (SalaryFrom.length==0) {
                    $('#ErrSalaryFrom').html("Please Enter Salary From"); 
                } 
            }); 
            $("#SalaryTo").blur(function() {
                $('#ErrSalaryTo').html("");   
                var SalaryFrom = $('#SalaryFrom').val().trim();
                var SalaryTo = $('#SalaryTo').val().trim();
                if (SalaryTo.length==0) {
                    $('#ErrSalaryTo').html("Please Enter Salary To"); 
                }else {
                    if(parseFloat(SalaryFrom) >= parseFloat(SalaryTo)) {
                        $('#ErrSalaryTo').html("Please Enter Salary To Greater Than Salary From");    
                    }
                } 
            });     
        <?php } ?>
        <?php if($_SESSION['USER']['isstaff']==1){ ?>
              $("#CustomerMobileNumber").blur(function() {
                $('#ErrCustomerMobileNumber').html("");   
                var CustomerMobileNumber = $('#CustomerMobileNumber').val().trim();
                if (CustomerMobileNumber.length==0) {
                    $('#ErrCustomerMobileNumber').html("Please Enter Customer Mobile Number"); 
                }  
            });    
            
            $("#CustomerEmailID").blur(function(){
                var Email = $('#CustomerEmailID').val().trim();
                 if(!(Email.length==0)) {
                        if (!(IsEmail(Email))) {                                                            
                            $('#ErrCustomerEmailID').html("Please Enter valid Email ID");
                        }else {
                            $('#ErrCustomerEmailID').html(""); 
                        }
                 }else{
                      $('#ErrCustomerEmailID').html(""); 
                 }
            });
             
        <?php } ?>
});
function dovalidation() {
       $('#Errtitle').html("");   
       $('#Errcontent').html("");
       $('#Errimage1').html("");
       $('#Errcountryid').html("");
       $('#Errstate').html("");
       $('#Errdistrict').html("");
       $('#Errcity').html("");
       
       $('#ErrBrand').html("");
       $('#ErrModel').html("");
       $('#ErrVariant').html("");
       $('#ErrKMDriven').html("");
       $('#ErrCustomerMobileNumber').html("");
       $('#ErrCustomerEmailID').html("");
       
       error=0;
       
       var title = $('#title').val().trim();
       if (title.length==0) {
            $('#Errtitle').html("Please Enter Title"); 
            error++;
        } 
        var m = $('#content').val().trim();
            if (m.length==0) {
                $('#Errcontent').html("Please Enter Description");
                error++;
            }
        var im = $('#uploadimage1').val().trim();
            if (im.length==0) {
                $('#Errimage1').html("Please Upload Image");
                error++;
            }
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
                error++;
            }
        var st = $('#state').val().trim();
            if (st==0) {
                $('#Errstate').html("Please Select State");
                error++;
            }
        var ds = $('#district').val().trim();
            if (ds==0) {
                $('#Errdistrict').html("Please Select District");
                error++;
            }
        var cty = $('#city').val().trim();
            if (cty==0) {
                $('#Errcity').html("Please Select City");
                error++;
            }
        <?php  if($_GET['subc']=="60" || $_GET['subc']=="61") { ?>
                var Brand = $('#Brand').val().trim();
                   if (Brand==0) {
                        $('#ErrBrand').html("Please Select Brand Name"); 
                        error++;
                    }
                var Model = $('#Model').val().trim();
                   if (Model==0) {
                        $('#ErrModel').html("Please Select Model"); 
                        error++;
                    }
              /*  var Varient = $('#Varient').val().trim();
                   if (Varient==0) {
                        $('#ErrVarient').html("Please Select Varient"); 
                        error++;
                    } */
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        } else {
                            if (!(is_Numeric(KMDriven))) {
                                $('#ErrKMDriven').html("Please Enter Numeric Characters Only");
                                error++;
                            }
                        } 
        <?php } ?>
        <?php if($slsubcategory[0]['categid']!="5") {?> 
        var amt = $('#amount').val().trim();   
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
                error++;
            } else {
                if (!(parseFloat(amt)>=1)) {
                    $('#Erramount').html("Amount must have Rs.1");
                    error++;
                }
            }   
        <?php } ?>
        <?php if($_GET['subc']=="96") {?>
            var Brand = $('#Brand').val().trim();
           if (Brand==0) {
                $('#ErrBrand').html("Please Enter Brand Name"); 
                error++;
            }        
        <?php } ?>
        <?php if($_GET['subc']=="24") {?>
            var Brand = $('#PlotArea').val().trim();
           if (Brand==0) {
                $('#ErrPlotArea').html("Please Enter Plot Area"); 
                error++;
            }        
        <?php } ?>
        <?php  if($_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66") { ?>
                  var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        }
        <?php } ?>
        <?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22") {?>
        var cnt = $('#SuperBuildUpArea').val().trim();
            if (cnt==0) {
                $('#ErrSuperBuildUpArea').html("Please Enter Super Build Up Area");
                 error++;
            }
        var cnt = $('#CarpetArea').val().trim();
            if (cnt==0) { 
                $('#ErrCarpetArea').html("Please Enter Carpet Area");
                 error++;
            }
        <?php } ?>
        <?php if($slsubcategory[0]['categid']=="5"){?>
                var SalaryFrom = $('#SalaryFrom').val().trim();
                if (SalaryFrom.length==0) {
                    $('#ErrSalaryFrom').html("Please Enter Salary From"); 
                    error++;
                } 
                
                var SalaryFrom = $('#SalaryFrom').val().trim();
                var SalaryTo = $('#SalaryTo').val().trim();
                if (SalaryTo.length==0) {
                    $('#ErrSalaryTo').html("Please Enter Salary To"); 
                    error++;
                }else {
                    if( parseFloat(SalaryFrom) >=  parseFloat(SalaryTo)) {
                        $('#ErrSalaryTo').html("Please Enter Salary To Greater Than Salary From");  
                        error++;  
                    }
                } 
        <?php } ?>
        <?php if($_SESSION['USER']['isstaff']==1){ ?>
                var CustomerMobileNumber = $('#CustomerMobileNumber').val().trim();
                if (CustomerMobileNumber.length==0) {
                    $('#ErrCustomerMobileNumber').html("Please Enter Customer Mobile Number"); 
                    error++;
                }
                var Email = $('#CustomerEmailID').val().trim();
                if(!(Email.length==0)) {
                        if (!(IsEmail(Email))) {                                                            
                            $('#ErrCustomerEmailID').html("Please Enter valid Email ID");
                            error++;
                        }else {
                            $('#ErrCustomerEmailID').html(""); 
                        }
                 }else{
                      $('#ErrCustomerEmailID').html(""); 
                 }
                
        <?php } ?>
        if (error>0) {
            $('#dosave').val("0");
            return false;
        }else{
            $('#dosave').val("1");
            $("#save").prop('disabled', true);
           CallConfirmation();
            return false;
        }
}
</script>
 <?php //include_once("postadvalidation.php");?>
<style>.mobilemenu {display:none}
 .errorstring{width:100%;font-size:12px;color:red}                                                                 
</style>
<?php if (!($_SESSION['USER']['userid']>0)) { ?>
<script>
    alert("Your login expired.please login again");
    location.href='https://www.klx.co.in';
</script>
<?php } ?>
<?php
    
    if(isset($_POST["dosave"]) && $_POST['dosave']=="1") {
        $errorMessage= "";
        $errorMessage1= "";
        if ($obj->isEmptyField($_POST['uploadimage1'])) {
            echo $obj->printError("Please upload image");
        }
        if ($obj->isEmptyField($_POST['title'])) {
            echo $obj->printError("Title Shouldn't be blank");
        }
        if ($obj->isEmptyField($_POST['content'])) {
            echo $obj->printError("Description Shouldn't be blank");
        }
        if ($_GET['subc']!=77 && $_GET['subc']!=25 && $_GET['subc']!=120 && $_GET['subc']!=28 && $_GET['subc']!=26 && $_GET['subc']!=73 && $_GET['subc']!=67 && $_GET['subc']!=71 && $_GET['subc']!=78 && $_GET['subc']!=69 && $_GET['subc']!=76 && $_GET['subc']!=27 && $_GET['subc']!=70 && $_GET['subc']!=75 && $_GET['subc']!=79 && $_GET['subc']!=95 && $_GET['subc']!=74 && $_GET['subc']!=68 && $_GET['subc']!=72){
            if ($obj->isEmptyField($_POST['amount'])) {
                echo $obj->printError("Amount Shouldn't be blank");
            }
        }                                                                                           
        
        $total_free_ads_incurrent_category = $mysql->select("Select * from _jpostads where AdPackageID='0' and UserPackageID='0' and postedby='".$_SESSION['USER']['userid']."' and categid='".$slsubcategory[0]['categid']."'");                 
        $allow_create_ad = false;
        if (sizeof($total_free_ads_incurrent_category)<4) {
            $allow_create_ad = true;
            $adType="free";
        } else {
            $availableads = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$slsubcategory[0]['categid']."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
            if (sizeof($availableads)>0) {
                $allow_create_ad = true; 
                $adType="paid";
            } else {
                $obj->err++;
        ?>
        <div>
            Your free limit has completed, Upgrade package and continue to post ads.
            <a href="https://www.klx.co.in/in/upgrade/c0" class="btn btn-primary btn-sm">View Packages</a>
        </div>
        <?php
                exit;
            }
        }
 
        $param=array("categid"      => $slcategory[0]['categid'],
                     "subcategory"  => $slsubcategory[0]['subcateid'],
                     "title"        => $_POST['title'],
                     "content"      => str_replace("'","\\'",$_POST['content']),
                     "amount"       => $_POST['amount'],
                     "countryid"    => $_POST['countryid'],
                     "state"        => $_POST['state'],
                     "district"     => $_POST['district'],
                     "city"         => $_POST['city'],
                     "location"     => $_POST['location'],
                     "postedby"     => $_SESSION['USER']['userid']); 
           
        $param['pposted']=$_SESSION['USER']['userid'];
        
        if ($obj->err==0) { 
            if ($_SESSION['USER']['isadmin']==1 || $_SESSION['USER']['isstaff']==1) {
                $user_param['personname']="";
                $user_param['email']="";
                $user_param['pwd']="!x!y!z!";
                $user_param['mobile']=$_POST['uMobileNumber'];
                $param['postedby']=JUsertable::addUser($user_param);
            }
            
            if ($adType=="free") {
             //   $postedadid = JPostads::addPostads($param);  
             
              
             $brandid = isset($_POST['Brand'])? $_POST['Brand'] : "0";
             $PositionType = isset($_POST['PositionType'])? $_POST['PositionType'] : "0";
             $salaryPeriod = isset($_POST['SalaryPeriod'])? $_POST['SalaryPeriod'] : "0";
             $salaryFrom = isset($_POST['SalaryFrom'])? $_POST['SalaryFrom'] : "0";
             $salaryTo = isset($_POST['SalaryTo'])? $_POST['SalaryTo'] : "0";
            
             $Year = isset($_POST['Year'])? $_POST['Year'] : "0";
             $Fuel = isset($_POST['Fuel'])? $_POST['Fuel'] : "0";
             $Transmission = isset($_POST['Transmission'])? $_POST['Transmission'] : "0";
             $KMDriven = isset($_POST['KMDriven'])? $_POST['KMDriven'] : "0";
             $NoofOwners = isset($_POST['NoofOwners'])? $_POST['NoofOwners'] : "0";
             $mtype = isset($_POST['MType'])? $_POST['MType'] : "0";
            
             $BedRooms = isset($_POST['BedRooms'])? $_POST['BedRooms'] : "0";
             $BathRooms = isset($_POST['BathRooms'])? $_POST['BathRooms'] : "0";
             $Furnishing = isset($_POST['Furnishing'])? $_POST['Furnishing'] : "0";
             $ListedBy = isset($_POST['ListedBy'])? $_POST['ListedBy'] : "0";
             $SuperBuildUpArea = isset($_POST['SuperBuildUpArea'])? $_POST['SuperBuildUpArea'] : "0";
             $CarpetArea = isset($_POST['CarpetArea'])? $_POST['CarpetArea'] : "0";
             $BachelorsAllowed = isset($_POST['BachelorsAllowed'])? $_POST['BachelorsAllowed'] : "0";
             $Maintenance = isset($_POST['Maintenance'])? $_POST['Maintenance'] : "0";
             $TotalFloors = isset($_POST['TotalFloors'])? $_POST['TotalFloors'] : "0";
             $FloorNo = isset($_POST['FloorNo'])? $_POST['FloorNo'] : "0";
             $CarParking = isset($_POST['CarParking'])? $_POST['CarParking'] : "0";
             $Facing = isset($_POST['Facing'])? $_POST['Facing'] : "0";
             $ProjectName = isset($_POST['ProjectName'])? $_POST['ProjectName'] : "0";
             $ConstructionStatus = isset($_POST['ConstructionStatus'])? $_POST['ConstructionStatus'] : "0";
             $Washrooms = isset($_POST['Washrooms'])? $_POST['Washrooms'] : "0";
             $PlotArea = isset($_POST['PlotArea'])? $_POST['PlotArea'] : "0";
             $Length = isset($_POST['Length'])? $_POST['Length'] : "0";
             $MealsIncluded = isset($_POST['MealsIncluded'])? $_POST['MealsIncluded'] : "0";
             $Varient= isset($_POST['Varient'])? $_POST['Varient'] : "0";
             $Model= isset($_POST['Model'])? $_POST['Model'] : "0";
             
             $CustomerName= isset($_POST['CustomerName'])? str_replace("'","\\'",$_POST['CustomerName'])   : "0";
             $CustomerMobileNumber= isset($_POST['CustomerMobileNumber'])? $_POST['CustomerMobileNumber'] : "0";
             $CustomerEmailID= isset($_POST['CustomerEmailID'])? $_POST['CustomerEmailID'] : "0";
             if (isset($_POST['Model'])) {
                 if (intval($_POST['Model'])>0) {
                   $Model = $_POST['Model'];  
                 } else {
                   $Model = $mysql->insert("_JModels",array("brandid"=>$brandid,"model"=>$_POST['model'],"iscustom"=>'1'));  
                 }                                            
             }
             
              $postedadid = $mysql->insert("_jpostads",array("categid"               => $slcategory[0]['categid'],
                                                             "subcateid"             => $slsubcategory[0]['subcateid'],
                                                             "title"                 => $_POST['title'],
                                                             "content"               => str_replace("'","\\'",$_POST['content']),
                                                             "amount"                => $_POST['amount'],
                                                             "countryid"             => $_POST['countryid'],
                                                             "stateid"               => $_POST['state'],
                                                             "distcid"               => $_POST['district'],
                                                             "cityid"                => $_POST['city'],
                                                             "location"              => $_POST['location'],
                                                             "filepath1"             => trim($_POST['uploadimage1']),
                                                             "filepath2"             => trim($_POST['uploadimage2']),
                                                             "filepath3"             => trim($_POST['uploadimage3']),
                                                             "filepath4"             => trim($_POST['uploadimage4']),
                                                             "filepath5"             => trim($_POST['uploadimage5']),
                                                             "filepath6"             => trim($_POST['uploadimage6']),
                                                             "brandid"               => $_POST['Brand'],
                                                             "Mtype"                 => $mtype,
                                                             "PositionType"          => $PositionType,
                                                             "SalaryPeriod"          => $salaryPeriod,
                                                             "SalaryFrom"            => $salaryFrom,
                                                             "salaryTo"              => $salaryTo,
                                                             "Year"                  => $Year,
                                                             "Fuel"                  => $Fuel,
                                                             "Transmission"          => $Transmission,
                                                             "KMDriven"              => $KMDriven,
                                                             "NoofOwners"            => $NoofOwners,
                                                             "BedRooms"              => $BedRooms,
                                                             "BathRooms"             => $BathRooms,
                                                             "Furnishing"            => $Furnishing,
                                                             "ListedBy"              => $ListedBy,
                                                             "SuperBuildUpArea"      => $SuperBuildUpArea,
                                                             "CarpetArea"            => $CarpetArea,
                                                             "BachelorsAllowed"      => $BachelorsAllowed,
                                                             "Maintenance"           => $Maintenance,
                                                             "TotalFloors"           => $TotalFloors,
                                                             "FloorNo"               => $FloorNo,
                                                             "CarParking"            => $CarParking,
                                                             "Facing"                => $Facing,
                                                             "ProjectName"           => $ProjectName,
                                                             "ConstructionStatus"    => $ConstructionStatus,
                                                             "Washrooms"             => $Washrooms,
                                                             "PlotArea"              => $PlotArea,
                                                             "Length"                => $Length,
                                                             "MealsIncluded"         => $MealsIncluded,
                                                             "Model"                 => $Model,
                                                             "Variant"               => $Varient,
                                                             "CustomerName"          => $CustomerName,
                                                             "CustomerMobileNumber"  => $CustomerMobileNumber,
                                                             "CustomerEmailID"       => $CustomerEmailID,
                                                             "postedon"              => date("Y-m-d H:i:s"),
                                                             "postedby"              => $_SESSION['USER']['userid']));  
                                                             
                   $adt =$mysql->qry;
            } else {
                $availableads = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$slsubcategory[0]['categid']."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
                if (sizeof($availableads)>0) {
                   // $postedadid = JPostads::addPostads($param); 
                    $mysql->execute("update _jpostads set AdPackageID='".$availableads[0]['PackageID']."',UserPackageID='".$availableads[0]['UserPackageID']."',ispaid='1' where postadid='".$postedadid."'");
                    $adspack = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$availableads[0]['UserPackageID']."'"); 
                    $mysql->execute("update _tbl_user_packages set RemainingAds='".($availableads[0]['RemainingAds']-1)."',PostedAds='".($availableads[0]['PostedAds']+1)."' where UserPackageID='".$availableads[0]['UserPackageID']."'")  ;
                ?>
                    <div>
                        <?php echo ($availableads[0]['RemainingAds']-1); ?> units left in package <?php echo $adspack[0]['PacakgeTitle'];?>. Please use the package  before  <?php echo date("Y-m-d H:i:s",strtotime($availableads[0]['PackageTo']));?>
                    </div>
                <?php
                } else {
                    echo $obj->printError("Error adding Postads may credits unavailable");   
                }    
            }
  
            if ($postedadid>0) {
                
                $message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="https://www.klx.co.in/assets/cms/klx_log.png" style="height:30px;">&nbsp;&nbsp;
                            <img src="https://www.klx.co.in/assets/img/in.png" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Hello,
                            <br><br>
                            Your ad is live, share it with friends to sell faster:
                            <br><br>
                            <p style="text-align:center">
                                <a href="'.path_url.'v'.$postedadid.'-'.$_POST['title'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>
                            </p>               
                            <br> 
                            Thanks <br>
                            KLX Team
                        </div>
                        <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                    </div>';

                    $mparam['MailTo']=$_SESSION['USER']['email'];
                    $mparam['MemberID']=$_SESSION['USER']['userid'];
                    $mparam['Subject']="KLX :) Your ad is now live!";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);       
                
            ?>
            <style>.d {display:none}</style>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12" style="text-align: center;">
                        <img src="assests/tick.jpg" style="width:120px"><br> <br>
                        Add Posted successfully.<br><br>
                        <a href="freeadpost.php">Create Post</a>
                    </div>
                </div>                                                                                            
            </div>       
            <?php
            } else {
                echo $obj->printError("Error adding Postads".$errorMessage."-".$errorMessage1.$adt);   
            }
        }  
    }
    
?>
    <!--<form action="" method="post"  enctype="multipart/form-data" id="adpostfrom" onsubmit="return dovalidation();">-->
    <form action="" method="post"  enctype="multipart/form-data" id="adpostfrom">
        <input type="file" id='files' name="files[]" multiple style="display:none"><br>
        <input type="hidden" name="subc" id="subc" value="<?php echo $_GET['subc'];?>">
        <input type="hidden" name="uploadimage1" id="uploadimage1">
        <input type="hidden" name="uploadimage2" id="uploadimage2">
        <input type="hidden" name="uploadimage3" id="uploadimage3">
        <input type="hidden" name="uploadimage4" id="uploadimage4">
        <input type="hidden" name="uploadimage5" id="uploadimage5">
        <input type="hidden" name="uploadimage6" id="uploadimage6">
        
                                                                          
         
                            
        <div class="main-panel" style="width: 100%;height:auto !important">
            <div class="container" style="margin-top:0px">
                <div class="page-inner" >
                    <h3 style="text-align:center;margin-top:10px">Ad Post</h3>
                    <?php if($_GET['subc']!=0){?>
                        <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                            <div class="card-body d" style="padding-top: 10px;padding-bottom: 0px;">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h4 style="font-weight:bold;font-size:13px;text-transform:uppercase;float:left">Selected Category</h4>&nbsp;&nbsp;&nbsp;<a href="https://www.klx.co.in/in/freeadpost.php" style="color: blue;"><b style="font-size: 12px;float: right;">CHANGE</b></a><br>
                                        <div style="clear: both;"><?php echo $slcategory[0]['categname'];?>&nbsp;/&nbsp;<?php echo $slsubcategory[0]['subcatename'];?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                            <div class="card-body d">            
                                <?php
                                    if($slsubcategory[0]['categid']=="1"){ 
                                        include_once("includes/adpost_automobiles.php");
                                    }
                                    if($slsubcategory[0]['categid']=="2"){ 
                                        include_once("includes/adpost_mobiles.php");
                                    }
                                    if($slsubcategory[0]['categid']=="3"){ 
                                        include_once("includes/adpost_electronics.php");
                                    }
                                    if($slsubcategory[0]['categid']=="4"){ 
                                        include_once("includes/adpost_realestate.php");
                                    }           
                                    if($slsubcategory[0]['categid']=="5"){ 
                                        include_once("includes/adpost_jobs.php");
                                    }
                                    if($slsubcategory[0]['categid']=="6"){ 
                                        include_once("includes/adpost_fashion.php");
                                    }
                                    if($slsubcategory[0]['categid']=="7"){ 
                                        include_once("includes/adpost_educationandlearning.php");
                                    }
                                    if($slsubcategory[0]['categid']=="8"){ 
                                        include_once("includes/adpost_services.php");
                                    }
                                    if($slsubcategory[0]['categid']=="12"){ 
                                        include_once("includes/adpost_entertainment.php");
                                    }
                                    if($slsubcategory[0]['categid']=="13"){ 
                                        include_once("includes/adpost_pet.php");
                                    } 
                                    if($slsubcategory[0]['categid']=="14"){ 
                                        include_once("includes/adpost_furniture.php");
                                    }
                                    if($slsubcategory[0]['categid']=="15"){ 
                                        include_once("includes/adpost_books.php");
                                    }
                                ?>
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <br>
                                       <!-- <label>Attachement<span style="color: red;">*</span></label>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="$('#files').trigger('click');"><i class="fas fa-cloud-upload-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Upload Attachment</button>
                                        <div id="file_upload_progress" style="color:red"></div>
                                        <div id="file_upload_error" style="color:red"></div> -->
                                    </div>
                                </div>
                                <div class="row mb-2">
                                <div id="div_1">
                                    <img id="src_image1" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div> 
                                <div  id="div_2">
                                    <img id="src_image2" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_3">
                                    <img id="src_image3" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_4">
                                    <img id="src_image4" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_5">
                                    <img id="src_image5" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_6">
                                    <img id="src_image6" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div> 
                                  
                            </div>
                                <div id="previews"></div>
                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                <img src='https://www.klx.co.in/assets/loading.gif' style='width:0px'>
                            </div>
                        </div>
                        <!--<div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                            <div class="card-body d" style="padding-top: 10px;padding-bottom: 0px;">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h4 style="font-weight:bold;font-size:13px;text-transform:uppercase;float:left">Current Location</h4>&nbsp;&nbsp;&nbsp;<a href="" style="color: blue;"><b style="font-size: 12px;float: right;">CHANGE</b>
                                        <label><?php// echo $_SESSION['USER']['countryname'];?>&nbsp;/&nbsp;<?php //echo $_SESSION['USER']['statename'];?>&nbsp;/&nbsp;<?php //echo $_SESSION['USER']['districtname'];?></label></a>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <label >City Name</label>
                                        <select name="countryid" required="" id="countryid" class="form-control" style="padding-left: 0px;border: none;border-bottom: 1px solid #ccc;margin-left: -4px;">
                                            <option value="0" selected="selected">Select City</option> 
                                        </select> 
                                    </div>
                                </div> 
                            </div>
                        </div>-->
                
                <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                    <div class="card-body d">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label >Published To</label>
                                <select name="countryid" id="countryid" class="form-control" onchange="getStateNames($(this).val())">
                                    <option value="0" selected="selected">Select Country</option> 
                                    <?php foreach(JPostads::getCountryNames() as $countryname) {?>
                                    <option value="<?php echo $countryname['countryid'];?>" <?php echo ($countryname['countryid']==$pageContent[0]['countryid'])? 'selected="selected"':'';?><?php echo isset($_POST['country']) ? $_POST['countryid'] : ""; ?>><?php echo $countryname['countryname'];?></option>
                                    <?php } ?>
                                </select> 
                                 <div class="errorstring" id="Errcountryid"><?php echo isset($Errcountryid)? $Errcountryid : "";?></div>
                            </div>
                        </div>                                     
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>State Name</label>
                                <div id="div_statenames">
                                    <select name="state" class="form-control" id="state" onchange="getDistrict($(this).val())">
                                    <option value="" selected="selected">Select State Name</option> 
                                    </select> 
                                </div>
                                 <div class="errorstring" id="Errstate"><?php echo isset($Errstate)? $Errstate : "";?></div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-sm-12">
                                <label>District Name</label>
                                <div id="div_districtnames">
                                    <select class="form-control" name="district" id="district" onchange="getCityName($(this).val())">
                                    <option value="" selected="selected">Select District Name</option> 
                                    </select> 
                                </div> 
                                 <div class="errorstring" id="Errdistrict"><?php echo isset($Errdistrict)? $Errdistrict : "";?></div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-sm-12">
                                <label>City Name</label>
                                <div id="div_citynames">
                                    <select class="form-control" name="city" id="city">
                                    <option value="" selected="selected">Select city Name</option> 
                                    </select> 
                                </div> 
                                 <div class="errorstring" id="Errcity"><?php echo isset($Errcity)? $Errcity : "";?></div>
                            </div>
                        </div>
                     <!--   <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Locality<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="location" id="location" value="<?php echo isset($_POST['location']) ? $_POST['location'] : ""; ?>">
                                 <div class="errorstring" id="Errlocation"><?php echo isset($Errlocation)? $Errlocation : "";?></div>
                            </div>
                        </div>   -->
                    </div>
                </div>
                <?php if($_SESSION['USER']['isstaff']==1){ ?>       
                <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                    <div class="card-body d">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="CustomerName" id="CustomerName"  value="<?php echo isset($_POST['CustomerName']) ? $_POST['CustomerName'] : ""; ?>">
                                <div class="errorstring" id="ErrCustomerName"><?php echo isset($ErrCustomerName)? $ErrCustomerName : "";?></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Customer Mobile Number<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="CustomerMobileNumber" id="CustomerMobileNumber" value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : ""; ?>">
                                <div class="errorstring" id="ErrCustomerMobileNumber"><?php echo isset($ErrCustomerMobileNumber)? $ErrCustomerMobileNumber : "";?></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Customer Email ID</label>
                                <input type="text" class="form-control" name="CustomerEmailID" id="CustomerEmailID"  value="<?php echo isset($_POST['CustomerEmailID']) ? $_POST['CustomerEmailID'] : ""; ?>">
                                <div class="errorstring" id="ErrCustomerEmailID"><?php echo isset($ErrCustomerEmailID)? $ErrCustomerEmailID : "";?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="">
                    <div class="">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <input type="hidden" name="dosave" id="dosave" value="0">
                                <input type="button" onclick="dovalidation()" name="save" id="save" value="Post Ad" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            
        </div>
    </div>
</form>  

<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>                                   
</div>
<script>  
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://klx.co.in/klxadmin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function fupload() {
    $('#files').trigger('click');
}

function CallConfirmation(){
    if ($('#uploadimage1').val()=="") {
            $('#Errimage1').html("Please Upload First Image");
       }
      
    var txt = ' <div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to submit ad?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doPostAd()" >Yes, Confirm</button>'
                 +'</div> ';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

 function doPostAd() {
   
        var param = $("#adpostfrom").serialize();
        $("#confrimation_text").html(loading);
        
        $.post( "https://www.klx.co.in/webservice.php?action=doPostAd", param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://klx.co.in/klxadmin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                var buttons = "<div style='text-align:center;padding:10px;'><a href='https://www.klx.co.in/in/freeadpost' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://klx.co.in/klxadmin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
        });
     
}
</script>
<string name="image_chooser" style="display:none">File Chooser</string>
<script>
    var loadingGif="<img src='https://www.klx.co.in/assets/loading.gif' style='width:96px'>";
    
    
   var img_count=0;
   var uploaded_count=0;
   var img_path = '<?php echo "assets/".$config['thumb'];?>';
   
   function getUploadedFiles() {
       var Count=0;
       if ($('#uploadimage1').val()!="") {
           Count++
       }
       if ($('#uploadimage2').val()!="") {
           Count++;
       }
       if ($('#uploadimage3').val()!="") {
           Count++;
       }
       if ($('#uploadimage4').val()!="") {
           Count++;
       }
       if ($('#uploadimage5').val()=="") {
           Count++;
       } 
       if ($('#uploadimage6').val()=="") {
           Count++;
       }
   }
   $(document).ready(function(){
       
       $('#files').change(function() {
           $('#file_upload_progress').html();
           $('#Errimage1').html("");
           var form_data = new FormData();
           var p="";
           var error_txt="";
           var totalfiles = document.getElementById('files').files.length;
            
             
            //for (var index = 0; index < totalfiles; index++) {
           if ((getUploadedFiles()+totalfiles)>6) {
                $('#Errimage1').html("Maximum allowed 6 images"); 
                //alert("Maximum allowed 6 images"); 
                return true;
           }
               
         
          // for (var index = uploaded_count; index < (uploaded_count+totalfiles); index++) {
          var up=[];
            up[0]=0;
            up[1]=0;
            up[2]=0;
            up[3]=0;
            up[4]=0;
            up[5]=0;
            up[6]=0;
            up[7]=0;
           for (var index = 0; index < (totalfiles); index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
                  $('#Errimage1').html(document.getElementById('files').files[index]);
                
              //  p += "<div id='img"+img_count+"' style='border:1px solid #ccc;height:100px;width:100px;float:left;margin-right:5px;margin-bottom:5px;'>"+loadingGif+"</div>";
                
                //$('#div_'+(img_count+1)).html("<div id='img"+img_count+"' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                if ($('#uploadimage1').val()=="") {
                    $('#div_1').html("<div id='img1' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                    $('#uploadimage1').val("-");
                    up[index]=1;
                } else if ($('#uploadimage2').val()=="") {
                    $('#div_2').html("<div id='img2' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                    $('#uploadimage2').val("-");
                     up[index]=2;
                } else if ($('#uploadimage3').val()=="") {
                    $('#div_3').html("<div id='img3' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                    $('#uploadimage3').val("-");
                     up[index]=3;
                } else if ($('#uploadimage4').val()=="") {
                    $('#div_4').html("<div id='img4' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                    $('#uploadimage4').val("-");
                    up[index]=4;
                } else if ($('#uploadimage5').val()=="") {
                    $('#div_5').html("<div id='img5' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                    $('#uploadimage5').val("-");
                    up[index]=5;
                } else if ($('#uploadimage6').val()=="") {
                    $('#div_6').html("<div id='img6' style='height:100px;width:100px;'>"+loadingGif+"</div>");
                    $('#uploadimage6').val("-");
                     up[index]=6;
                }
                img_count++;
            }
            if (uploaded_count==0) {          
              //  $('#previews').html(p);
            } else {
               // $('#previews').html( $('#previews').html() + p );
            }
            // AJAX request
            $.ajax({                                     
                url: 'https://www.klx.co.in/ajaxfile.php',
                   type: 'post',
                   xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                      //  $(".progress-bar").width(percentComplete + '%');
                        $("#file_upload_error").html(percentComplete+'%');
                        
                    }
                }, false);
                return xhr;
            },
            beforeSend: function(){
             //   $(".progress-bar").width('0%');
                $('#file_upload_progress').html('-');
            },
             error:function(){
                $('#file_upload_progress').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
                   data: form_data,                
                   dataType: 'json',
                   contentType: false,                                            
                   processData: false,
                   success: function (response) {
                   $('#files').val("");
                   
                       
                   for(var index = 0; index < response.length; index++) {
                       if (response[index]['error']==0) {
                        var src = response[index]['filename'];
                            //$('#preview').append('<img src="https://klx.co.in/testupload/'+src+'" width="200px;" height="200px">');
                            
                            //$('#uploadimage'+(uploaded_count+1)).val(src);
                            //$('#img'+uploaded_count).html("<img src='https://www.klx.co.in/"+img_path+"/"+src+"' width='100px;' height='100px'><br><span onclick='image_close("+(uploaded_count+1)+")' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>");
                            
                            if (up[index]>0) {
                                $('#uploadimage'+up[index]).val(src);
                                $('#img'+up[index]).html("<img src='https://www.klx.co.in/"+img_path+"/"+src+"' width='100px;' height='100px'><br><span onclick='image_close("+up[index]+")' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>");
                            }
                            //$('#img'+uploaded_count).html("<img src='https://www.klx.co.in/"+img_path+"/"+src+"' width='100px;' height='100px'>");
                            uploaded_count++;       
                       } else {
                            $('#uploadimage'+(uploaded_count+1)).val("");
                            $('#img'+uploaded_count).html("<div style='font-size:10px;color:red;text-align:center'>"+response[index]['message']+"</div>");
                            $('#uploadimage'+up[index]).val();
                            uploaded_count++;  
                       }
                    }                                        
                    
                   
                }
            });
        });
    });                        
    
    
   
    
    </script>          
    <script type="text/javascript">
    <?php if($slsubcategory[0]['categid']!="5") {?>
         var amount = document.querySelector('#amount'), preAmount = amount.value;
        amount.addEventListener('input', function(){
            if(isNaN(Number(amount.value))){
                amount.value = preAmount;
                return;
            }

            var numberAfterDecimal = amount.value.split(".")[1];
            if(numberAfterDecimal && numberAfterDecimal.length > 3){
                amount.value = Number(amount.value).toFixed(3);;
            }
            preAmount = amount.value;
        })
    <?php } ?>
    <?php if($_GET['subc']=="60" || $_GET['subc']=="61"|| $_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66" ) { ?>
        var km = document.querySelector('#KMDriven'), preAmount = km.value;
        km.addEventListener('input', function(){
            if(isNaN(Number(km.value))){
                km.value = preAmount;
                return;
            }

            var numberAfterDecimal = km.value.split(".")[1];
            if(numberAfterDecimal && numberAfterDecimal.length > 3){
                km.value = Number(km.value).toFixed(3);;
            }
            preAmount = km.value;
        })
    <?php }?> 
    
    
       function image_close(id) {
        $('#uploadimage'+id).val("");
        $('#div_'+id).html('<img onclick="fupload()" id="src_image'+id+'" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
        $('#div_'+id).css({"border":"1px solid #ccc"});
          $('#uploadimage'+id).val("");
        //$('#Errimage1').html("Please Upload Image");
    }
       
    </script>
   
<?php // }  
include_once("footer.php"); ?>
