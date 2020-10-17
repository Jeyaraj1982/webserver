<?php
  {
     $obj = new CommonController();
     
     
         if (isset($_POST['save']))  {
              $adspack = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$_POST['packageid']."'");
          //   print_r($adspack);
                    $RemainingAds = $adspack[0]['AdsCount'];
                    
 

         echo $adspack[0]['Validity'];
$date=date_create(date("Y-m-d"));
date_add($date,date_interval_create_from_date_string($adspack[0]['Validity']." days"));
$Date2 = date_format($date,"Y-m-d");
//"PackageTo"     => date("Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s")." '  + ".$adspack[0]['Validity']." days' ") ),
                    $categoryinfo = $mysql->select("select * from _jcategory where categid='".$_POST['categid']."'");
                    $id = $mysql->insert("_tbl_user_packages",array("UserID"        => $_POST['userID'],
                                                                    "PackageID"     => $adspack[0]['AdPackageID'],                
                                                                    "ActivatedOn"   => date("Y-m-d H:i:s"),
                                                                    "PaymentID"     => "0",
                                                                    "PackageFrom"   => date("Y-m-d H:i:s"),                                                     
                                                                    
                                                                    "PackageTo"     => $Date2,
                                                                    "NumberOfAds"   => $adspack[0]['AdsCount'],
                                                                    "CategoryID"    => $categoryinfo[0]['categid'],
                                                                    "CategoryName"  => $categoryinfo[0]['categname'],
                                                                    "PostedAds"     => "0" ,
                                                                    "Days"          => $adspack[0]['Validity'] ,
                                                                    "RemainingAds"  => $RemainingAds ,
                                                                    "IsExpired"     => "0"));
                     
                    echo "Successfully added";
                    unset($_POST);
         }
      
                        
?>
<script>
     function getSubcategory(categoryID) {
      $.ajax({url:'../../webservice.php?f=1&action=getSubcategory&categoryID='+categoryID,success:function(data){
           $('#subcategory').html(data);
      }});
     }
 </script>
 <script>
     function getDistrict(stateID) {
      $.ajax({url:'../../webservice.php?f=1&action=getDistrict&stateID='+stateID,success:function(data){
           $('#district').html(data);
      }});
     }
     
      function getUpgradePackages(categoryID) {
      $.ajax({url:'../../webservice.php?action=jgetUpgradePackages&categoryID='+categoryID,success:function(data){
           $('#UpgradePackages').html(data);
      }});
     }
     
      function jgetUserInfo(userID) {
      $.ajax({url:'../../webservice.php?action=jgetUserInfo&userID='+userID,success:function(data){
           $('#userDetails').html(data);
      }});
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
                                Assign Package To User
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">User ID</label>
                                    <div class="col-md-3"><input type="text" onblur="jgetUserInfo($(this).val())" name="userID" class="form-control" maxlength="74" value="<?php echo isset($_POST['adid']) ? $_POST['adid'] : ""; ?>"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <div  id="userDetails">     
                                    
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Category</label>
                                    <div class="col-md-3">
                                        <select class="form-control" required name="categid" id="categid" onchange="getUpgradePackages($(this).val())">
                                            <option value="" selected="selected">Select Category</option>
                                                <?php foreach(JPostads::getCategory() as $category) {?>
                                                <option value="<?php echo $category['categid'];?>"<?php echo isset($_POST['categid']) ? $_POST['categid'] : ""; ?>><?php echo $category['categname'];?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                               </div>  
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Packages</label>
                                    <div class="col-md-3">
                                    <div  id="UpgradePackages">     
                                    
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">Update Package</button>
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
<?php } ?>