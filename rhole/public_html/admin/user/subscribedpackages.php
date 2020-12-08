<?php
    if (isset($_POST['deleteBtn'])) {
        $mysql->execute("update _tbl_featured set ispublish='0' where featureadid='".$_POST['fid']."'");
        echo "<script>alert('Feature ad deleted');</script>";
    }                                                 

    

 $obj = new CommonController();
      
         
$user = new JUsertable();
$pageContent = $user->getUser($_GET['d']);
$data = $mysql->select("select * from _tbl_user_packages where UserID='".$_GET['d']."' order by UserPackageID desc  ");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Subscribed Packages
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Person Name</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email Address</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                            </div>
                            <br><br>
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

