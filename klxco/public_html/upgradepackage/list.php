<?php
    if (isset($_POST['deleteBtn'])) {
        $mysql->execute("update _tbl_featured set ispublish='0' where featureadid='".$_POST['fid']."'");
        echo "<script>alert('Feature ad deleted');</script>";
    }                                                 
    if (isset($_GET['f']) && $_GET['f']=="a") {
          $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and date(fad.enddate)>=date('".date("Y-m-d")."') ORDER BY fad.featureadid desc");
          
          $title = "Active Ads";
    } elseif (isset($_GET['f']) && $_GET['f']=="e") {
         $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and  date(fad.enddate)<date('".date("Y-m-d")."')   ORDER BY fad.featureadid desc");
         $title = "Expire Ads";
     } elseif (isset($_GET['f']) && $_GET['f']=="d") {
         $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='0' ORDER BY fad.featureadid desc");
         $title = "Deleted Ads";
    } else {
        $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid ORDER BY fad.featureadid desc");    
        $title = "All Ads";
        $_GET['f']='all';
    }

    $data = $mysql->select("select * from _tbl_user_packages order by UserPackageID desc");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of <?php echo $title;?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="mytdhead" style="width:50px;">User ID</td>
                                            <td class="mytdhead" style="width:120px;">Name</td>
                                            <td class="mytdhead" style="width:120px;">Mobile Number</td>
                                            <td class="mytdhead" style="width:120px;">Email ID</td>
                                            <td class="mytdhead" style="width:120px;">Category</td>
                                            <td class="mytdhead" style="width:120px;">Package</td>
                                            <td class="mytdhead" style="width:60px;">Start Date</td>
                                            <td class="mytdhead" style="width:60px;">End Date</td>
                                            <td class="mytdhead" style="width:50px;">Total Ads</td>
                                            <td class="mytdhead" style="width:50px;">Posted Ads</td>
                                            <td class="mytdhead" style="width:50px;">Remaining</td>
                                            <td class="mytdhead" style="width:50px;">Type</td>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php
                                            foreach($data as $r){ 
                                            $userinfo = $mysql->select("select * from _jusertable where userid ='".$r["UserID"]."'");                                            
                                            $category = $mysql->select("select * from _jcategory where categid ='".$r["CategoryID"]."'");  
                                             $uPackages = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$r['PackageID']."'");                                          
                                       ?> 
                                        <tr>
                                           <td class="mytd"><?php echo $r["UserID"];?></td>
                                           <td class="mytd"><?php echo $userinfo[0]["personname"];?></td>
                                           <td class="mytd"><?php echo $userinfo[0]["email"];?></td>
                                           <td class="mytd"><?php echo $userinfo[0]["mobile"];?></td>
                                           <td class="mytd"><?php echo $category[0]["categname"];?></td>
                                           
                                           <td class="mytd"><?php echo $uPackages[0]["PackageTitle"];?></td>
                                           
                                           
                                           
                                           
                                           <td class="mytd"><?php echo date("Y-m-d",strtotime($r["PackageFrom"]));?></td>
                                           <td class="mytd"><?php echo date("Y-m-d",strtotime($r["PackageTo"]));?></td> 
                                           <td class="mytd"><?php echo $r["NumberOfAds"];?></td> 
                                           <td class="mytd"><?php echo $r["PostedAds"];?></td> 
                                           <td class="mytd"><?php echo $r["RemainingAds"];?></td> 
                                           <td class="mytd"><?php echo $r["PaymentID"]=="0" ? "Admin" : "Payment Gateway";?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody> 
                                 </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

