<?php
    include_once("../config.php");
    $obj = new CommonController();  
    if (!($obj->isFranchiseeLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        echo "<a href='https://www.klx.co.in/klxfranchisee'>Click here to login</a>";
        exit;
    }   

include_once("header.php");
include_once("LeftMenu.php");   

if (isset($_GET['action'])) {    
         include_once($_GET['action'].".php"); 
     }   else {
         ?>
         <?php $bank = $mysql->select("select * from _tbl_franchisee_bank_details where FranchiseeID='".$_SESSION['FRANCHISEE']['userid']."'");    
            //if(sizeof($bank)=="0"){
            $t = false;
            if($t){                                 
                echo "<script>location.href='dashboard.php?action=AddBankAccount';</script>";    
            }else {?> 
         <div class="main-panel full-height">
            <div class="container">
                <br><br><br>
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Users</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select * from _jusertable where districtid='".$_SESSION['FRANCHISEE']['DistrictID']."' order by userid desc"));
                                                ?>
                                                </h4>
                                                <a href="dashboard.php?action=postad/listuser&f=a">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Today Registered Users</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select userid from _jusertable where districtid='".$_SESSION['FRANCHISEE']['DistrictID']."' and DATE(createdon)=DATE('".date("Y-m-d")."')"));
                                                ?>
                                                </h4>
                                                <a href="dashboard.php?action=postad/todayuser">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Today Ads</p>
                                                <h4 class="card-title">
                                                  <?php
                                                   $sql    = " where distcid='".$_SESSION['FRANCHISEE']['DistrictID']."' and date(postedon)=date('".date("Y-m-d")."') ";
                                                            echo sizeof(JPostads::getPostads(0,$sql));
                                                   ?>
                                                </h4>
                                                <a href="dashboard.php?action=postad/todaypostads">View</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Active Ad</p>
                                                <h4 class="card-title">
                                                  <?php echo sizeof($mysql->select("select * from _jpostads where distcid='".$_SESSION['FRANCHISEE']['DistrictID']."'  ")); ?>
                                                </h4>
                                                <a href="dashboard.php?action=postad/viewpostads">View</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                                                                                              
                    <div class="row">
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                   
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Feature Ads</p>
                                                <h4 class="card-title">
                                                <?php
                                                 $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and jad.distcid='".$_SESSION['FRANCHISEE']['DistrictID']."' and date(fad.enddate)>=date('".date("Y-m-d")."') ORDER BY fad.featureadid desc");
                                                 
                                                
                                                 echo sizeof($data); ?>
                                                </h4>
                                                <a href="dashboard.php?action=featured/list&f=a">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Package Upgrade</p>
                                                <h4 class="card-title">                                        
                                                <?php 
                                                   $count=0;
                                                    $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and date(fad.enddate)>=date('".date("Y-m-d")."') ORDER BY fad.featureadid desc"); 
                                                     $data = $mysql->select("select * from _tbl_user_packages order by UserPackageID desc");
                                                      foreach($data as $r){ 
                                                           $userinfo = $mysql->select("select * from _jusertable where userid ='".$r["UserID"]."'");   
                                                              if ($userinfo[0]['districtid']==$_SESSION['FRANCHISEE']['DistrictID']) {
                                                                  $count++;
                                                              }
                                                      } 
                                                      echo $count;
                                                
                                                ?>
                                                </h4>
                                                <a href="dashboard.php?action=upgradepackage/list&f=a">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Pending Withdrawal Request</p>
                                                <h4 class="card-title">                                        
                                                    <?php echo sizeof($mysql->select("select RequestID from _tbl_withdrawal_request where Status='0' and FranchiseeID='".$_SESSION['FRANCHISEE']['userid']."'")); ?>
                                                </h4>
                                                <a href="dashboard.php?action=Wallet/WithdrawalRequests&filter=Requested">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Wallet Balance</p>
                                                <h4 class="card-title">                                        
                                                    Rs. <?php echo number_format($application->getBalance($_SESSION['FRANCHISEE']['userid']),2);?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>                               
                   <div class="row">
                         <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Registers</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                        <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Created</th>
                                                            <th>User Name</th>                                                                                           
                                                            <th>Mobile Number</th> 
                                                            <th>Email</th> 
                                                            <th></th>
                                                        </tr>
                                                    </thead>                                                                         
                                                    <tbody>
                                                    <?php
                                                        $sql= $mysql->select("select * from _jusertable where districtid='".$_SESSION['FRANCHISEE']['DistrictID']."'  order by `userid` desc limit 0,5");
                                                        foreach($sql as $member){ 
                                                       ?>
                                                        <tr>
                                                            <td><?php echo date("d M, Y H:i",strtotime($member['createdon']));?></td>
                                                            <td><?php echo $member['personname'];?></td>  
                                                            <td><table><tr><td><?php if($member['ismobileverified']=="1"){?><span style="color: green"><i class="fas fa-check"></i></span><?php  }?></td><td><?php echo $member["mobile"];?></td></tr></table></td>
                                                            <td><?php echo $member['email'];?></td>
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
                   <div class="row">
                         <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-posts" role="tab" aria-controls="pills-members" aria-selected="true">Recent Posts</a>
                                        </li>                                                                                           
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                        <div class="tab-pane fade active show" id="pills-posts" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-striped">
                                                    <tbody>
                                                    <?php
                                                      
                                                        
                                                          $sql    = " where distcid='".$_SESSION['FRANCHISEE']['DistrictID']."' ";
                                                          
                                                            $result = JPostads::getPostads(0, $sql." order by postadid desc limit 0,5 ");
                                                            
                                                        foreach ($result as $r){ 
                                                            $cate = $mysql->select("select * from _jcategory where  categid='".$r['categid']."'");
                                                            $subc = $mysql->select("select * from _jsubcategory where  subcateid='".$r['subcateid']."'");
                                                            $country = $mysql->select("select * from _jcountrynames where  countryid='".$r['countryid']."'");
                                                            $district = $mysql->select("select * from _jdistrictnames where  distcid='".$r['distcid']."'");
                                                            $state = $mysql->select("select * from _jstatenames where  stateid='".$r['stateid']."'");
                                                            $city = $mysql->select("select * from _jcitynames where  citynameid='".$r['cityid']."'");
                                                            $user = $mysql->select("select * from _jusertable where  userid='".$r['postedby']."'");
                                                       ?>
                                                        <tr class='mytr'>
                                                           <td style='padding: 10px !important;width:70px'>
                                                                <img src="../../assets/<?php echo $config['thumb'].$r["filepath1"];?>"  style="height:70px;width:70px;"></img>
                                                            </td>
                                                            <td style="vertical-align: top;padding: 10px !important;">
                                                                <b><?php echo $r["title"]?></b>:
                                                                <!--<br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["content"]),0,300));?>... </span>-->
                                                                <div style="padding:3px;padding-left:0px;">
                                                                    Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp;
                                                                    Status:                         
                                                                    <?php if ($r["isactive"]) {?>
                                                                        <span style='color:#08912A;font-weight:bold;'>Active</span> 
                                                                    <?php } else { ?>
                                                                        <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                                                                    <?php } ?>
                                                                </div>
                                                                <?php echo $cate[0]["categname"];?> / <?php echo $subc[0]["subcatename"];?><br>
                                                                <?php echo $country[0]["countryname"];?> / <?php echo $state[0]["statenames"];?> / <?php echo $district[0]["districtname"];?> / <?php echo $city[0]["cityname"];?>
                                                            </td>
                                                            <td style="vertical-align: top;padding: 10px !important;">
                                                                <b><?php echo $user[0]["personname"]?></b>
                                                                <div style="padding:3px;padding-left:0px;">
                                                                    Email: <span style="color:#444;"><?php echo $user[0]["email"]; ?></span><br>
                                                                    Mobile:<span style="color:#444;"><?php echo $user[0]["mobile"]; ?></span>                         
                                                                </div>
                                                            </td>
                                                            <td width='160' style='text-align:center;'>
                                                                <a href="dashboard.php?action=postad/view&rowid=<?php echo  $r["postadid"];?>&btn=viewbtn">View</a>
                                                            </td>
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
                </div>
            </div>
            <?php } ?>
         <?php                                                                                                   
     }

include_once("footer.php");?>