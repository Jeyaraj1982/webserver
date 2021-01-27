<?php

include_once("header.php");
if (! (isset($_SESSION['User']['MemberID']))) {
        ?>
        <script>
        location.href='../index.php';
        </script>
        <?php
    }

include_once("LeftMenu.php"); 

if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<br><br>
<div class="main-panel full-height">
            <div class="container"  style="margin-top: 30px;">
                <div class="page-inner">
                    <div class="row row-card-no-pd">  
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chart-pie text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Withdrawable Balance</p>
                                                <h4 class="card-title"><?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></h4>
                                                <p><a href="Dashboard.php?action=ViewAccountSummary">view statments</a></p>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chart-pie text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Earnings</p>
                                                <h4 class="card-title"><?php echo number_format(getOverallBalance($_SESSION['User']['MemberCode']),2);?></span></h4>
                                                <br><p><a href="Dashboard.php?action=EarningHistory">view statments</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Epin Summary (5H Series)</p>
                                                <h4 class="card-title"><?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where IsUsed='0' and SoldMemberCode='".$_SESSION['User']['MemberCode']."' and `PinPackageID`='1'")); ?>/<?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where SoldMemberCode='".$_SESSION['User']['MemberCode']."' and `PinPackageID`='1'")); ?></h4>
                                                <p><span class="pl-1"><a href="Dashboard.php?action=myepins">view pins</a></p>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-sm-12" style="text-align: right;" >
                              <a href="Dashboard.php?action=CreateMember">
                                <button class="btn btn-primary btn-round">
                                    Create Member
                                </button>
                              </a>
                              <br><br>
                        </div>
                        <div class="col-sm-12" style="text-align: center;" >
                          <a href="printmember.php">
                                <button class="btn btn-primary btn-round">
                                    Print
                                </button>
                          </a>
                          <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Level Chart
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    
                                     <?php
                            $level1=$mysql->select("select * from _tbl_member where SponsorCode='".$_SESSION['User']['MemberCode']."' order by MemberID");
                            $array=array();
                            $array['FM']="1H100002000030001";
                            //Level 1                                 
                            if (sizeof($level1)>0) {
                                $array['FM1']=$level1[0]['MemberCode'];
                                
                                 $level2=$mysql->select("select * from _tbl_member where SponsorCode='".$level1[0]['MemberCode']."' order by MemberID");
                                 if (sizeof($level2)>0) {
                                    $array['FM2']=$level2[0]['MemberCode']; 
                                    
                                     $level3=$mysql->select("select * from _tbl_member where SponsorCode='".$level2[0]['MemberCode']."' order by MemberID");
                                     if (sizeof($level3)>0) {
                                        $array['FM3']=$level3[0]['MemberCode']; 
                                        
                                        $level4=$mysql->select("select * from _tbl_member where SponsorCode='".$level3[0]['MemberCode']."' order by MemberID");
                                        if (sizeof($level4)>0) {
                                            $array['FM4']=$level4[0]['MemberCode']; 
                                            
                                            $level5=$mysql->select("select * from _tbl_member where SponsorCode='".$level4[0]['MemberCode']."' order by MemberID");
                                            if (sizeof($level5)>0) {
                                                $array['FM5']=$level5[0]['MemberCode'];
                                                
                                                $level6=$mysql->select("select * from _tbl_member where SponsorCode='".$level5[0]['MemberCode']."' order by MemberID");
                                                if (sizeof($level6)>0) {
                                                    $array['FM6']=$level6[0]['MemberCode'];
                                                    
                                                    $level7=$mysql->select("select * from _tbl_member where SponsorCode='".$level6[0]['MemberCode']."' order by MemberID");
                                                    if (sizeof($level7)>0) {
                                                        //$array['FM7']=$level7[0]['MemberCode']; 
                                                    } 
                                                } 
                                            }
                                        }
                                     }
                                 }
                            }
                            
                             $amount = array("","600","200","200","200","200","200","200");
                             $amount = array("","600","200","200","200","200","200");
                             $i=1;
                           // print_r($array);
                        ?>
                        
                                        <table style="width: 100%;" border="1" >
                                            <thead>
                                                <tr>
                                                    
                                                    <th style="text-align: center;font-weight:bold">Level</th>
                                                    <th style="text-align: center;font-weight:bold">Member Code</th>
                                                    <th style="text-align: center;font-weight:bold">Name & Address</th>
                                                    <th style="text-align: center;font-weight:bold">Admin & Amount</th>
                                                    <th style="text-align: center;font-weight:bold">Postal Details</th>
                                                    <th style="text-align: center;font-weight:bold">Bank Postal Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                              //   $allMembers = $mysql->select("Select * from _tbl_member where SponsorCode='".$_SESSION['User']['MemberCode']."' order by MemberID");
                                                 ?>
                                                <?php  
                                                //foreach ($allMembers as $allMember){
                                                foreach ($array as $k=>$v){
                                                
                                                     $allMembers = $mysql->select("Select * from _tbl_member where MemberCode='".$v."' order by MemberID");
                                                     $allMember=$allMembers[0];
                                                 ?>
                                                <tr>                        
                                                   
                                                    <td style="vertical-align:top"><?php echo $k;?></td>
                                                    <td style="vertical-align:top">
                                                        <b>ID Name:</b><br>
                                                        <?php echo $allMember['MemberCode'];?><br><br>
                                                       <b>Cell No:</b><br><?php echo $allMember['MemberMobileNumber'];?>
                                                    </td>
                                                    <td style="vertical-align:top">
                                                        <?php echo $allMember['MemberName'];?>,<br>
                                                        S/O <?php echo $allMember['MemberFatherName'];?>,<br>
                                                        <?php echo $allMember['AddressLine1'];?>,<bR>
                                                        <?php echo $allMember['AddressLine2'];?>,<Br>
                                                        <?php echo $allMember['City'];?>, <?php echo $allMember['State'];?>, 
                                                        <?php echo $allMember['Country'];?> - <?php echo $allMember['PinCode'];?>, 
                                                    </td>
                                                     <td style="text-align: center;;vertical-align:top"><?php 
                                                     if ($i==1) {
                                                         echo "Five Member Entry<br>and<br>Auto Filling";
                                                     } else {
                                                         echo "Member";
                                                     }
                                                     
                                                     ?><br>
                                                     Amount:
                                                         <?php if (isset($amount[$i])) { ?>
                                                     Rs.<?php echo $amount[$i];?>/-
                                                     <?php } ?>
                                                     </td>
                                                   
                                                    <td style="vertical-align:top">
                                                    <b>Village & Pin Code:</b><?php echo $allMember['MOVillage'];?><br>
                                                    <b>MO & A/C Number:</b><?php echo $allMember['MOAccount'];?><br>
                                                   
                                                          </td>
                                       <td style="vertical-align:top">
                                                    <b>A/C Number:</b><br>
                                                    <b>Bank & IFSC Code:</b><br>
                                                    <b>Name of Village:</b><br>
                                                       
                                                    </td>                    
                                            </tr>
                                            <?php $i++; }?>
                                            <?php if (sizeof($allMembers)==0) {?>
                                            <tr>
                                                <td colspan="6" style="text-align:center">No Members found</td>
                                            </tr>
                                            <?php } ?>
                                          </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>                                                                                             
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-sm-12" style="text-align: center;" >
                              <a href="Dashboard.php?action=MyMembers">
                                    <button class="btn btn-primary btn-round">
                                        More Members
                                    </button>
                              </a>
                        <br><br>
                        </div>
                    </div>
                    <div>
                       
                    </div>
                </div>

<?php } ?>
<?php include_once("footer.php");?>