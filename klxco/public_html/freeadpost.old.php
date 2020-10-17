<?php
    include_once("header.php");
    $obj = new CommonController();
?>
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
        }});
    }
</script> 
<style>.mobilemenu {display:none}</style>
<?php if (!($_SESSION['USER']['userid']>0)) { ?>
<script>
    alert("Your login expired.please login again");
    location.href='https://www.klx.co.in';
</script>
<?php } ?>
<?php
    if(isset($_POST["save"])) {
        $errorMessage= "";
        $errorMessage1= "";
        if ($obj->isEmptyField($_POST['title'])) {
            echo $obj->printError("Title Shouldn't be blank");
        }
        
        $total_free_ads_incurrent_category = $mysql->select("Select * from _jpostads where AdPackageID='0' and UserPackageID='0' and postedby='".$_SESSION['USER']['userid']."' and categid='".$_POST['categid']."'");                 
        $allow_create_ad = false;
        if (sizeof($total_free_ads_incurrent_category)<4) {
            $allow_create_ad = true;
            $adType="free";
        } else {
            $availableads = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$_POST['categid']."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
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
 
        $param=array("categid"      => $_POST['categid'],
                     "subcategory"  => $_POST['subcategory'],
                     "title"        => $_POST['title'],
                     "content"      => str_replace("'","\\'",$_POST['content']),
                     "adtype"       => $_POST['adtype'],
                     "state"        => $_POST['state'],
                     "district"     => $_POST['district'],
                     "countryid"    => $_POST['countryid'],
                     "location"     => $_POST['location'],
                     "amount"       => $_POST['amount'],
                     "postedby"     => $_SESSION['USER']['userid']); 
        if ( (isset($_FILES["filepath1"]["tmp_name"])) && (strlen(trim($_FILES["filepath1"]["tmp_name"]))>0)) { 
            $obj->fileUpload($_FILES['filepath1'],"./assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename1"],$errorMessage);  
        } 
        if ( (isset($_FILES["filepath2"]["tmp_name"])) && (strlen(trim($_FILES["filepath2"]["tmp_name"]))>0)) { 
            $obj->fileUpload($_FILES['filepath2'],"./assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename2"],$errorMessage1);  
        }
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
                $postedadid = JPostads::addPostads($param);  
            } else {
                $availableads = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$_POST['categid']."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
                if (sizeof($availableads)>0) {
                    $postedadid = JPostads::addPostads($param); 
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
                echo $obj->printError("Error adding Postads".$errorMessage."-".$errorMessage1);   
            }
        }  
    }
?>
<form action="" method="post"  enctype="multipart/form-data">
    <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container">
            <div class="page-inner" >
               <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
                <h3 style="text-align:center;margin-top:10px">Post Ad</h3>
                
                <div class="card">
                    <div class="card-body d">
                    
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Category</label>
                                <select class="form-control" required name="categid" id="categid" onchange="getSubcategory($(this).val())">
                                    <option value="" selected="selected">Select Category</option>
                                    <?php foreach(JPostads::getCategory() as $category) {?>
                                    <option value="<?php echo $category['categid'];?>"<?php echo isset($_POST['categid']) ? $_POST['categid'] : ""; ?>><?php echo $category['categname'];?></option>
                                    <?php } ?>
                                </select>
                                <div id="category_info"></div>
                            </div>
                        </div>
                        <div id="form_data" style="display: none;">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>Subcategory</label>
                                    <div id="_subcategory">
                                        <select name="subcategory" required id="subcategory" class="form-control">
                                            <option value="" selected="selected">Select Sub Category</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>   
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Published To</label>
                                    <select name="countryid" required id="countryid" class="form-control" onchange="getStateNames($(this).val())">
                                        <option value="0" selected="selected">Select Country</option> 
                                        <?php foreach(JPostads::getCountryNames() as $countryname) {?>
                                        <option value="<?php echo $countryname['countryid'];?>" <?php echo ($countryname['countryid']==$pageContent[0]['countryid'])? 'selected="selected"':'';?><?php echo isset($_POST['country']) ? $_POST['countryid'] : ""; ?>><?php echo $countryname['countryname'];?></option>
                                        <?php } ?>
                                    </select> 
                                </div>
                            </div>                                     
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>State Name</label>
                                    <div id="div_statenames">
                                        <select name="state" required class="form-control" id="state" onchange="getDistrict($(this).val())">
                                        <option value="" selected="selected">Select State Name</option> 
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2"> 
                                <div class="col-sm-12">
                                    <label>District Name</label>
                                    <div id="div_districtnames">
                                        <select class="form-control" required name="district" id="district">
                                        <option value="" selected="selected">Select District Name</option> 
                                        </select> 
                                    </div> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"  required  maxlength="74" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ""; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>Content</label>
                                    <textarea class="form-control" style="height:170px;" required name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ""; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>Locality</label>
                                    <input type="text" class="form-control" name="location" required   value="<?php echo isset($_POST['location']) ? $_POST['location'] : ""; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>Amount</label>
                                    <input class="form-control" type="text" name="amount" required  value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ""; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label>Attachement</label>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <input type="file"  name="filepath1" required class="col-sm-6 form-control"/>
                                  <!--  <input type="file"  name="filepath2" class="col-sm-6 form-control"/> -->
                                </div>
                            </div>
                            <?php if ($_SESSION['USER']['isadmin']==1) {?>
                            <div class="row mb-2" >
                                <div class="col-sm-12" style="background:#f1f1f1;border:1px solid #f9f9f9;padding:20px;">
                                    <label>Moblie Number</label>
                                    <input class="form-control" required type="text" name="uMobileNumber"   value="<?php echo isset($_POST['uMobileNumber']) ? $_POST['uMobileNumber'] : ""; ?>">
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <input type="submit"  name="save" value="Post Ad" class="btn btn-primary">
                                </div>
                            </div>
                        </div> 
                    </div>
            </div>
            </div>
        </div>
    </div>
</form>  
 
<string name="image_chooser">File Chooser</string>

<?php include_once("footer.php"); ?>