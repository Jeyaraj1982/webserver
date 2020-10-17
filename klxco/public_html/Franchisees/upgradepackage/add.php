<?php
    include_once("../../config.php"); 
     $obj = new CommonController();
     
     
         if (isset($_POST['save']))  {
             $adspack = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$_POST['packageid']."'");
                    $RemainingAds = $adspack[0]['AdsCount'];
                    $categoryinfo = $mysql->select("select * from _jcategory where categid='".$_POST['categid']."'");
                    $id = $mysql->insert("_tbl_user_packages",array("UserID"        => $_POST['userID'],
                                                                    "PackageID"     => $adspack[0]['AdPackageID'],                
                                                                    "ActivatedOn"   => date("Y-m-d H:i:s"),
                                                                    "PaymentID"     => "0",
                                                                    "PackageFrom"   => date("Y-m-d H:i:s"),
                                                                    "PackageTo"     => date("Y-m-d H:i:s",strtotime(time()." '  + ".$adspack[0]['Validity']."days'")),
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
<script src="https://www.klx.co.in/assets/js/jquery.3.2.1.min.js"></script>
<link rel="stylesheet" href="../../assets/css/demo.css">
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
 <body style="margin:0px;">
 <div class="titleBar">Assign Package To User</div>
 <table cellpadding="5" cellspacing="0" width="100%">
    <tr>                                                 
        <td style="vertical-align: top;">
                <form action="" method="post" style="background-color:#fff;" enctype="multipart/form-data"> 
                    <table style="margin:0px auto;color: #333;font-family:'Trebuchet MS';font-size: 13px;" cellpadding="3" cellspacing="0" align="left">
                        <tr>
                             <td style="text-align:left;">User ID&nbsp;&nbsp;</td>
                             <td><input type="text" onblur="jgetUserInfo($(this).val())" name="userID" style="width:365px" maxlength="74" value="<?php echo isset($_POST['adid']) ? $_POST['adid'] : ""; ?>"></td> 
                       </tr>
                       <tr>
                        <td></td>
                        <td> <div  id="userDetails">     
                                   
                                    
                                    
                                        
                                    </div>  </td>
                       </tr>
                        <tr>
                            <td style="text-align:left;">Category</td>
                            <td>
                                <select class="form-control" required name="categid" id="categid" onchange="getUpgradePackages($(this).val())">
                                <option value="" selected="selected">Select Category</option>
                                    <?php foreach(JPostads::getCategory() as $category) {?>
                                    <option value="<?php echo $category['categid'];?>"<?php echo isset($_POST['categid']) ? $_POST['categid'] : ""; ?>><?php echo $category['categname'];?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>                                                
                         
                        <tr>
                            <td>Packages</td>
                            <td>
                              <div  id="UpgradePackages">
                                   
                                    
                                    
                                        
                                    </div>   
                            </td>
                        </tr>
                       <tr>
                            <td></td>
                            <td align="left"><input type="submit" name="save" value="Update Package" bgcolor="grey">  
                       </tr> 
                    </table>
                </form>
              <script>$('#success').hide(3000);</script> 
        </td>
    </tr>
  </table>
  </body>
                    


