<?php
    include_once("header.php");
    $adID = $_GET['ad'];
    $d = JPostads::getAd($adID,isset($_SESSION['USER']['userid']) ? $_SESSION['USER']['userid'] : 0);
    $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
    $t = "";
    foreach(explode(" ",$d[0]['title']) as $x) {
        if (trim($x)!="") {
            $x = str_replace(array(","),"",trim($x));
           $t.=trim($x); 
        }
        $t.="-";
    }
   $t .= $d[0]['postadid']; 
   
   if ($_GET['ad']==0) {
            ?>
              <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container">
            <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
                <div class="row">                                                     
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header" style="text-align: center;border:none">
                                <h2 style="text-transform: uppercase;font-size:17px">Heavy discount on Packages</h2>
                            </div>
                            <div class="card-body">
                                    <div class="row mb-2">
       <div class="col-sm-12">
           <label>Category</label>
             <select class="form-control" required name="categid" id="categid" onchange="getUpgradePackages($(this).val())">
                                <option value="" selected="selected">Select Category</option>
                                    <?php foreach(JPostads::getCategory() as $category) {?>
                                    <option value="<?php echo $category['categid'];?>"<?php echo isset($_POST['categid']) ? $_POST['categid'] : ""; ?>><?php echo $category['categname'];?></option>
                                    <?php } ?>
                                </select>
             <div id="category_info"></div>
                                </div>
      </div>
      
        <div class="row">
                                    <div class="col-md-12" id="UpgradePackages">
                                   
                                    
                                    
                                        
                                    </div>           
                                     
                                     <script>
                                       function getUpgradePackages(categoryID) {
      $.ajax({url:'<?php echo base_url;?>webservice.php?action=getUpgradePackages&categoryID='+categoryID,success:function(data){
           $('#UpgradePackages').html(data);
      }});
     }
                                     </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
   }  else {
?>
    <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container">
            <div class="page-inner">
                <div class="row">                                                     
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header" style="text-align: center;border:none">
                                <h2 style="text-transform: uppercase;font-size:17px">Heavy discount on Packages</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    <form action="https://www.klx.co.in/pay_upgrade_instamajo.php" method="post">
                                    <input type="hidden" value="<?php echo $adID;?>" name="adID">
                                    <div class="row">
                                         <?php
                                    $uPackages = $mysql->select("select * from _tbl_adsPackage where Categories like '%-".$d[0]['categid']."-%'");
                                        foreach($uPackages as $u) {
                                           
                                    ?>
                                        <div class="col-sm-12" style="margin-bottom:10px;">
                                            <div style="border:1px solid #82d6e5;padding:0px;padding-right:0px;padding-left:0px" onclick="$('#submitbtn').val('Pay Rs. <?php echo $u['SellingPrice'];?>');">
                                                <div>
                                                    <div class="custom-control custom-radio" style="background:#edfcff;margin-right:0px;padding-top:5px;padding-bottom:7px;width:100%">
                                                        <input type="radio" class="custom-control-input"  id="Plan_<?php echo $u['AdPackageID'];?>" name="Plan" value="<?php echo $u['AdPackageID'];?>">
                                                        <label class="custom-control-label" for="Plan_<?php echo $u['AdPackageID'];?>" ><b style="font-size:17px;"><?php echo $u['PackageTitle'];?></b></label>
                                                        <!--<span style="color:#999;font-size:12px">Reach upto 10 times more buyers</span></label>-->
                                                    </div> 
                                                    <div style="border-top:1px solid #ccc;text-align:center;padding:10px;">
                                                        <span style="font-weight:bold">₹ <?php echo $u['SellingPrice'];?></span>
                                                        <?php if ($u['SellingPrice']!=$u['PackageCost']) {?>
                                                        <br> 
                                                        <span style="color:#888"><strike>&#8377; <?php echo $u['PackageCost'];?></strike></span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                        <div class="col-sm-12" style="margin-top:10px">
                                           <input type="submit" value="Pay Rs. 299" id="submitbtn" name="submitbtn" class="btn btn-primary" style="width:100%">
                                        </div>
                                    </div>
                                     
                                    </form>
                                    
                                    
                                        
                                    </div>           
                                     
                                </div>   
                                
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<script>
var ht;
function requestToViewAdContact(id) {
    
    if (id==0) {
         $('#myModal').modal("show");
        return;
    }                        
    
    $.ajax({url:'<?php echo base_url;?>rest.php?action=requestToViewAdContact&postid='+id,success:function(data){
        ht = $('#contactinfo').html();
        $('#contactinfo').html(data);
        
    }});
}

function errorModal(msg) {
    $('#errormsg').html(msg);
     $('#myErrorModal').modal("show");
        return;
}
</script>

 <div class="modal fade " id="myModal">
<div class="modal-dialog">
    <div class="modal-content">

       
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       
      <div class="modal-body" style="text-align: center;">
       You must login <br>to view contact information<br><br><br>
       <a class="btn btn-outline-primary" href="<?php echo path_url;?>login" style="width: 200px;">
                                Login 
                            </a>        <br><br>
                                <a class="btn btn-primary" style="color:#fff;width:200px" href="<?php echo path_url;?>register">
                                Register 
                            </a>
                            <br><br>
        
      </div>

       
       
    </div>
  </div>
  </div>
  
  
   <div class="modal fade " id="myErrorModal">
<div class="modal-dialog">
    <div class="modal-content">

       
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       
      <div class="modal-body" id="errormsg" style="text-align: center;">
       
        
      </div>

       
       <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div> 
    </div>
  </div>
  </div>
  <script>
 
 setTimeout(function(){sendMessage(0);$('#Plan_<?php echo $uPackages[0]['AdPackageID'];?>').trigger("click") ;},1000);

  </script>
<?php include_once("footer.php"); ?>
