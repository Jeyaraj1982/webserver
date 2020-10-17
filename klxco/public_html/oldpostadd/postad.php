<?php
    include_once("header.php");
    $obj = new CommonController();
?>
<style>
#div_1,#div_2,#div_3,#div_4,#div_5,#div_6{
    margin-left:15px;border:1px solid #ccc;text-align: center;height: 96px;width: 96px;float:left;margin-right:10px;margin-bottom:10px;
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
</script>
<script>
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
        $("#image1").blur(function(){
            $('#Errimage1').html("");
            $('#div_1').css({"border": "1px solid #ccc"});
            var m = $('#image1').val().trim();
            if (m=="") {
                $('#Errimage1').html("Please Upload Image");
                $('#div_1').css({"border": "1px solid red"});
            }
        });
        
       $("#countryid").blur(function(){     
           $('#Errcountryid').html("");   
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
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
        $("#location").blur(function(){   
        $('#Errlocation').html("");     
        var loc = $('#location').val().trim();
            if (loc.length==0) {
                $('#Errlocation').html("Please Enter Location");
            } 
        });
        <?php if($_GET['subc']!="77") {?>
        $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=1000000)) {
                    $('#Erramount').html("Amount must have Rs.10 to  Rs.1000000");
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
        <?php if($_GET['subc']=="60" || $_GET['subc']=="61") { ?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        $("#Year").blur(function() {
            $('#ErrYear').html("");   
            var title = $('#Year').val().trim();
            if (title.length==0) {
                $('#ErrYear').html("Please Enter Year"); 
            } 
        });
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });
        <?php } ?>
        <?php if($_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66") { ?>
        
        $("#Year").blur(function() {
            $('#ErrYear').html("");   
            var title = $('#Year').val().trim();
            if (title.length==0) {
                $('#ErrYear').html("Please Enter Year"); 
            } 
        });
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
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
       $('#Errlocation').html("");
       $('#ErrBrand').html("");
       $('#ErrBrand').html("");
       $('#ErrYear').html("");
       $('#ErrKMDriven').html("");
       $('#Erramount').html("");
       $('#ErrSuperBuildUpArea').html("");
       $('#ErrCarpetArea').html("");
       $('#ErrPlotArea').html("");
       
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
        var im = $('#image1').val().trim();
            if (im=="") {
                $('#Errimage1').html("Please Upload Image");
                $('#div_1').css({"border": "1px solid red"});
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
        var loc = $('#location').val().trim();
            if (loc.length==0) {
                $('#Errlocation').html("Please Enter Location");
                error++;
            } 
        <?php if($_GET['subc']<>"77") {?>
            $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=1000000)) {
                    $('#Erramount').html("Amount must have Rs.10 to  Rs.1000000");
                }
            }   
        });       
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
        <?php  if($_GET['subc']=="60" || $_GET['subc']=="61") { ?>
                var Brand = $('#Brand').val().trim();
                   if (Brand==0) {
                        $('#ErrBrand').html("Please Enter Brand Name"); 
                        error++;
                    }
                   var Year = $('#Year').val().trim();
                   if (Year.length==0) {
                        $('#ErrYear').html("Please Enter Year"); 
                        error++;
                    }
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        }
        <?php } ?>
        <?php  if($_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66") { ?>
               
                   var Year = $('#Year').val().trim();
                   if (Year.length==0) {
                        $('#ErrYear').html("Please Enter Year"); 
                        error++;
                    }
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
       if (error>0) {
            return false;
        }
    }
</script> 
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
    $slsubcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['subc']."'");
    $slcategory = $mysql->select("select * from _jcategory where categid='".$slsubcategory[0]['categid']."'");
    if(isset($_POST["save"])) {
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
        if($_GET['subc']!=77){
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
            if ($_SESSION['USER']['isadmin']==1) {
                $user_param['personname']="";
                $user_param['email']="";
                $user_param['pwd']="!x!y!z!";
                $user_param['mobile']=$_POST['uMobileNumber'];
                $param['postedby']=JUsertable::addUser($user_param);
            }
            
            if ($adType=="free") {
             //   $postedadid = JPostads::addPostads($param);  
             
             
             if($_GET['subc']=="2" || $_GET['subc']=="96" || $_GET['subc']=="61" ){
                 $brandid = $_POST['Brand'];
             }else {
                 $brandid= "0";
             }
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
             $Breadth = isset($_POST['Breadth'])? $_POST['Breadth'] : "0";
             $MealsIncluded = isset($_POST['MealsIncluded'])? $_POST['MealsIncluded'] : "0";
             
              $postedadid = $mysql->insert("_jpostads",array("categid"      => $slcategory[0]['categid'],
                                                             "subcateid"    => $slsubcategory[0]['subcateid'],
                                                             "title"        => $_POST['title'],
                                                             "content"      => str_replace("'","\\'",$_POST['content']),
                                                             "amount"       => $_POST['amount'],
                                                             "countryid"    => $_POST['countryid'],
                                                             "stateid"      => $_POST['state'],
                                                             "distcid"      => $_POST['district'],
                                                             "cityid"       => $_POST['city'],
                                                             "location"     => $_POST['location'],
                                                             "filepath1"    => trim($_POST['uploadimage1']),
                                                             "filepath2"    => trim($_POST['uploadimage2']),
                                                             "filepath3"    => trim($_POST['uploadimage3']),
                                                             "filepath4"    => trim($_POST['uploadimage4']),
                                                             "filepath5"    => trim($_POST['uploadimage5']),
                                                             "filepath6"    => trim($_POST['uploadimage6']),
                                                             "brandid"      => $brandid,
                                                             "Mtype"        => $mtype,
                                                             "PositionType" => $PositionType,
                                                             "SalaryPeriod" => $salaryPeriod,
                                                             "SalaryFrom"   => $salaryFrom,
                                                             "SalaryTo"     => $salaryTo,
                                                             "Year"         => $Year,
                                                             "Fuel"         => $Fuel,
                                                             "Transmission" => $Transmission,
                                                             "KMDriven"     => $KMDriven,
                                                             "NoofOwners"   => $NoofOwners,
                                                             "BedRooms"     => $BedRooms,
                                                             "BathRooms"        => $BathRooms,
                                                             "Furnishing"       => $Furnishing,
                                                             "ListedBy"         => $ListedBy,
                                                             "SuperBuildUpArea" => $SuperBuildUpArea,
                                                             "CarpetArea"       => $CarpetArea,
                                                             "BachelorsAllowed" => $BachelorsAllowed,
                                                             "Maintenance"      => $Maintenance,
                                                             "TotalFloors"      => $TotalFloors,
                                                             "FloorNo"          => $FloorNo,
                                                             "CarParking"       => $CarParking,
                                                             "Facing"           => $Facing,
                                                             "ProjectName"      => $ProjectName,
                                                             "ConstructionStatus"      => $ConstructionStatus,
                                                             "Washrooms"      => $Washrooms,
                                                             "PlotArea"      => $PlotArea,
                                                             "Length"      => $Length,
                                                             "Breadth"      => $Breadth,
                                                             "MealsIncluded"      => $MealsIncluded,
                                                             "postedby"         => $_SESSION['USER']['userid']));  
                                                             
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
                    <div class="col-sm-12">
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
<form action="" method="post"  enctype="multipart/form-data" onsubmit="return dovalidation();">
    <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container" style="margin-top:0px">
            <div class="page-inner" >
                <h3 style="text-align:center;margin-top:10px">Ad Post</h3>
                <?php if($_GET['subc']!=0){?>
                <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                    <div class="card-body d" style="padding-top: 10px;padding-bottom: 0px;">
                        <div class="row mb-2">
                            <div class="col-12">
                                <h4 style="font-weight:bold;font-size:13px;text-transform:uppercase;float:left">Selected Category</h4>&nbsp;&nbsp;&nbsp;<a href="https://www.klx.co.in/freeadpost1.php" style="color: blue;"><b style="font-size: 12px;float: right;">CHANGE</b></a><br>
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
                                if($slsubcategory[0]['categid']=="8"){ 
                                    include_once("includes/adpost_services.php");
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
                                    <label>Attachement<span style="color: red;">*</span></label>
                                </div>
                            </div>

                            <input type="hidden" name="uploadimage1" id="uploadimage1">
                            <input type="hidden" name="uploadimage2" id="uploadimage2">
                            <input type="hidden" name="uploadimage3" id="uploadimage3">
                            <input type="hidden" name="uploadimage4" id="uploadimage4">
                            <input type="hidden" name="uploadimage5" id="uploadimage5">
                            <input type="hidden" name="uploadimage6" id="uploadimage6">


                            <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                            <input type="file" onchange="image2_onchage()" name="image2" id="image2" style="display: none;">
                            <input type="file" onchange="image3_onchage()" name="image3" id="image3" style="display: none;">
                            <input type="file" onchange="image4_onchage()" name="image4" id="image4" style="display: none;">
                            <input type="file" onchange="image5_onchage()" name="image5" id="image5" style="display: none;">
                            <input type="file" onchange="image6_onchage()" name="image6" id="image6" style="display: none;">
                                                                                                                                                   
                            <div class="row mb-2">
                                <div id="div_1">
                                    <img id="src_image1" onclick="uploadimage('1')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div> 
                                <div  id="div_2">
                                    <img id="src_image2" onclick="uploadimage('2')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_3">
                                    <img id="src_image3" onclick="uploadimage('3')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_4">
                                    <img id="src_image4" onclick="uploadimage('4')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_5">
                                    <img id="src_image5" onclick="uploadimage('5')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div>
                                <div  id="div_6">
                                    <img id="src_image6" onclick="uploadimage('6')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                </div> 
                                  
                            </div>
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
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Locality<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="location" id="location" value="<?php echo isset($_POST['location']) ? $_POST['location'] : ""; ?>">
                                 <div class="errorstring" id="Errlocation"><?php echo isset($Errlocation)? $Errlocation : "";?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <input type="submit" name="save" value="Post Ad" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</form>  
 
<string name="image_chooser">File Chooser</string>
<script>
    var loadingGif="<img src='https://www.klx.co.in/assets/loading.gif' style='width:96px'>";
    function uploadimage(imgid){                                                                                       
        $('#image'+imgid).trigger("click");
    }
    /*Start Image 1 Process */
    function image1_close() {
        $('#uploadimage1').val("");
        $('#div_1').html('<img onclick="uploadimage(\'1\')" id="src_image1" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
        $('#div_1').css({"border":"1px solid red"});
        $('#Errimage1').html("Please Upload Image");
    }
    
    function image1_onchage() {
        $('#div_1').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image1')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
        
                if (response!="error") {
                    $('#uploadimage1').val(response);
                        $('#div_1').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image1_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                        $('#div_1').css({"border":"1px solid #ccc"});
                        $('#Errimage1').html("");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 1 Process */
    
    /*Start Image 2 Process */
    function image2_close() {
        $('#uploadimage2').val("");
        $('#div_2').html('<img onclick="uploadimage(\'2\')" id="src_image2" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image2_onchage() {
        $('#div_2').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image2')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage2').val(response);
                        $('#div_2').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image2_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 2 Process */
    
    /*Start Image 3 Process */
    function image3_close() {
        $('#uploadimage3').val("");
        $('#div_3').html('<img onclick="uploadimage(\'3\')" id="src_image3" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image3_onchage() {
        $('#div_3').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image3')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage3').val(response);
                        $('#div_3').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image3_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 3 Process */
    
    /*Start Image 4 Process */
    function image4_close() {
        $('#uploadimage4').val("");
        $('#div_4').html('<img onclick="uploadimage(\'4\')" id="src_image4" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image4_onchage() {
        $('#div_4').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image4')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage4').val(response);
                        $('#div_4').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image4_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 4 Process */
    
    /*Start Image 5 Process */
    function image5_close() {
        $('#uploadimage5').val("");
        $('#div_5').html('<img onclick="uploadimage(\'5\')" id="src_image5" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image5_onchage() {
        $('#div_5').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image5')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage5').val(response);
                        $('#div_5').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image5_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 5 Process */       
    
    /*Start Image 6 Process */
    function image6_close() {
        $('#uploadimage6').val("");
        $('#div_6').html('<img onclick="uploadimage(\'6\')" id="src_image6" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image6_onchage() {
        $('#div_6').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image6')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage6').val(response);
                        $('#div_6').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image6_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 6 Process */
    </script>          
<?php include_once("footer.php"); ?>