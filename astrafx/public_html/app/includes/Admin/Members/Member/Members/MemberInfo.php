<?php
$data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
    $memberTree->member_code = $data[0]['MemberCode'];
    $memberTree->GetNodeIDs($data[0]['MemberCode'],"L");
    $memberTree->GetNodeIDs($data[0]['MemberCode'],"R");
    $memberTree->Carryforward();                  
    $Check_Eligibility = $mysql->select("select * from _tbl_Members where MemberID='".$data[0]['MemberID']."'"); 
?>
<?php
    $leftCount = $memberTree->getTotalLeftCount($data[0]['MemberCode']);
    $leftPV=$memberTree->PV;
    $rightCount = $memberTree->getTotalRightCount($data[0]['MemberCode']);
    $rightPV=$memberTree->PV;
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Member Information </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-7">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title">General Statistics</div>
                                    <div class="card-category">
                                        Overall Members and available PVs<br>
                                        <span style="color:#aaa;font-size:11px;">values are display Today/Overall</span>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div id="circles-1"></div>
                                            <h6 class="fw-bold mt-3 mb-1">Left</h6>
                                            <h6>PV: <?php echo $memberTree->todayLeftPV." / ".$memberTree->leftPV;?></h6>
                                            <h6>Direct Left: <?php echo $Check_Eligibility[0]['DirectLeft'];?></h6> 
                                            <h6 style="color:#666;margin:10px;padding:10px;background:#f1f1f1;border:1px dashed #ccc;border-radius:10px">Carryforward Left: <?php echo $memberTree->availableLeftCarryForward;?></h6> 
                                        
                                        </div>
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div id="circles-2"></div>
                                            <h6 class="fw-bold mt-3 mb-1">Right</h6>
                                            <h6> PV: <?php echo $memberTree->todayRightPV." / ".$memberTree->rightPV;?></h6>
                                            <h6>Direct Left: <?php echo $Check_Eligibility[0]['DirectRight'];?></h6>
                                            <h6 style="color:#666;margin:10px;padding:10px;background:#f1f1f1;border:1px dashed #ccc;border-radius:10px">Carryforward Left: <?php echo $memberTree->availableRightCarryForward;;?></h6> 
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                        $MemberActivePackage = $mysql->select("SELECT * FROM _tbl_Members_Packages where Date('".date("Y-m-d")."')<=Date(BooserExpireOn) and MemberPackageID='".$data[0]['ActivePackageRefID']."'");
                                        $Memberinfo = $mysql->select("SELECT * FROM _tbl_Members where MemberID='".$data[0]['MemberID']."'");
                                        if (sizeof($MemberActivePackage)>0 && $MemberActivePackage[0]['BoosterEnabled']==0) {
                                    ?>
                                    <div class="alert alert-warning" style="width:95%;margin:0px auto">
                                        <strong> To enable ROI Booster</strong>, to join 2 Direct Higher Referals<br>
                                        (Left-1 : Right-1), before <?php echo  date("M d, Y",strtotime( $MemberActivePackage[0]['BooserExpireOn']));?> 10:00 PM
                                        <?php if ($Memberinfo[0]['HDirectLeft']>0 || $Memberinfo[0]['HDirectRight']>0) {?>
                                        <br>
                                        <span style='color:green'>You Placed Higher Package Left: <?php echo $Memberinfo[0]['HDirectLeft'];?> / Right: <?php echo $Memberinfo[0]['HDirectRight'];?></span>
                                        <?php } ?>
                                    </div>
                                    <?php } else { ?>
                                         <div  class="alert alert-success" style="width:95%;margin:0px auto">
                                            <strong>ROI Booster Enabled.</strong>,  
                                            <?php echo  date("M d, Y",strtotime( $MemberActivePackage[0]['BoosterEnabledOn']));?>
                                        </div>
                                        <?php } ?>
                                </div>
                            </div>    
                        </div>                          
                        <div class="col-md-5">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title">My Current Package Info</div>
                                    <div class="row py-3">
                                <?php
                                    $packageinfo = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$data[0]['CurrentPackageID']."'");
                                ?>
                                   <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                     <tr style="background:#fff;">
                                        <td style="height:auto;">Package Name</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['PackageName'];?></td>
                                     </tr>
                                      <tr style="background:#fff;">
                                        <td style="height:auto;">Package Price</td>
                                        <td style="height:auto;">:&nbsp;$<?php echo $packageinfo[0]['PackageAmount'];?></td>
                                     </tr>
                                       <tr style="background:#fff;">
                                        <td style="height:auto;">Celling</td>
                                        <td style="height:auto;">:&nbsp;$<?php echo $packageinfo[0]['CutOffPV'];?></td>
                                     </tr>
                                       <tr style="background:#fff;">
                                        <td style="height:auto;">Direct Referal Earning</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['DirectReferalCommission'];?>%</td>
                                     </tr>
                                       <tr style="background:#fff;">
                                        <td style="height:auto;">Direct Referal Settlement Days</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['DirectReferal_Days'];?></td>
                                     </tr>
                                     
                                       <tr style="background:#fff;">
                                        <td style="height:auto;">Binary Match Earning</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['BinaryCommission'];?>%</td>
                                     </tr>
                                       <tr style="background:#fff;">
                                        <td style="height:auto;">Binary Match Earning Settlement Days</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['BinaryCommission_Days'];?></td>
                                     </tr>
                                      <tr style="background:#fff;">
                                        <td style="height:auto;">ROI</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['ROI'];?>%</td>
                                     </tr>
                                     <tr style="background:#fff;">
                                        <td style="height:auto;">ROI Days</td>
                                        <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['ROI_Days'];?></td>
                                     </tr>
                                    <tr style="background:#fff;">
                                        <td style="height:auto;">Joined</td>
                                        <td style="height:auto;width:150px">:&nbsp;<?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></td>
                                     </tr> 
                                </table>
                                 
                            </div>             
                                                
                                            </div>
                                    <?php
                                         $roi = $mysql->select("select * from _tbl_roi_dates where date(TDate)>=date('".date("Y-m-d",strtotime($data[0]['CreatedOn']))."') limit 0,7");   
                                    ?>
                                    <div class="card-title">ROI</div>
                                    <div class="row py-3">
                                        <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                     <tr style="background:#fff;">
                                        <td style="height:auto;">Entrolled</td>
                                        <td style="height:auto;">:&nbsp;<?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></td>
                                     </tr> 
                                       <tr style="background:#fff;">
                                        <td style="height:auto;">ROI Starts</td>
                                        <td style="height:auto;">:&nbsp;<?php echo  date("M d, Y",strtotime( $roi[6]['TDate']));?></td>
                                     </tr>
                                     
                                     <tr style="background:#fff;">
                                        <td style="height:auto;">ROI Booster </td>
                                        <td style="height:auto;">:&nbsp;Not Enabled 
                                           
                                            
                                        </td>
                                     </tr> 
                                     <tr style="background:#fff;">
                                        <td style="height:auto;">ROI Status</td>
                                        <td style="height:auto;">:&nbsp;
                                        <?php
                                        if (strtotime($d[6]["TDate"])<=strtotime(date("Y-m-d"))) {
                                            echo "Not Started.";
                                        } else {
                                            echo "Started";
                                        }
                                        ?>
                                        
                                        
                                        </td>
                                     </tr>
                             
                                     
                                </table>
                                
                            </div>             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-secondary mr-3">
                        <i class="fa fa-dollar-sign"></i>
                    </span>
                    <div>
                        <?php
                        //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                            $income = $mysql->select("select sum(Credits*1) as amt from `_tbl_wallet_earnings` where MemberID='".$data[0]['MemberID']."' and (Ledger='3')"); 
                            $charges = $mysql->select("select sum(Debits*1) as amt from `_tbl_wallet_earnings` where MemberID='".$data[0]['MemberID']."' and (Ledger='30001')"); 
                            $binary_credits = (isset($income[0]['amt']) ? $income[0]['amt'] : "0");
                            $binary_debits = (isset($charges[0]['amt']) ? $charges[0]['amt'] : "0");
                            $binary_balance = $binary_credits-$binary_debits;
                        ?>
                        <h5 class="mb-1"><small>Binary Income</small></h5>
                        <h5 class="mb-1"><b><?php echo $binary_balance;?></b></h5>
                    </div>
                </div>
            </div>
        </div>                                                   
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-secondary mr-3" style="background-color: #31CE36 !important;">
                        <i class="fa fa-dollar-sign"></i>
                    </span>
                    <div>
                        <?php
                            //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                                $income = $mysql->select("select sum(Credits) as amt from `_tbl_wallet_earnings` where MemberID='".$data[0]['MemberID']."' and (Ledger='4')"); 
                                $charges = $mysql->select("select sum(Debits) as amt from `_tbl_wallet_earnings` where MemberID='".$data[0]['MemberID']."' and (Ledger='40001')"); 
                                $referral_roi_credits = (isset($income[0]['amt']) ? $income[0]['amt'] : "0");
                                $referral_roi_debits = (isset($charges[0]['amt']) ? $charges[0]['amt'] : "0");
                                $referral_roi_balance = $referral_roi_credits-$referral_roi_debits;
                            ?>
                        <h5 class="mb-1"><small>Referral ROI</small></h5>
                        <h5 class="mb-1"><b><?php echo $referral_roi_balance;?></b></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-secondary mr-3" style="background-color: #F25961 !important;">
                        <i class="fa fa-dollar-sign"></i>
                    </span>
                    <div>
                        <?php
                            //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                                $income = $mysql->select("select sum(Credits) as amt from `_tbl_wallet_earnings` where MemberID='".$data[0]['MemberID']."' and (Ledger='2')"); 
                                $charges = $mysql->select("select sum(Debits) as amt from `_tbl_wallet_earnings` where MemberID='".$data[0]['MemberID']."' and (Ledger='20001')"); 
                                $package_roi_credits = (isset($income[0]['amt']) ? $income[0]['amt'] : "0");
                                $package_roi_debits = (isset($charges[0]['amt']) ? $charges[0]['amt'] : "0");
                                $package_roi_balance = $package_roi_credits-$package_roi_debits;
                            ?>
                        <h5 class="mb-1"><small>Package ROI</small></h5>
                        <h5 class="mb-1"><b><?php echo $package_roi_balance;?></b></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>                
                    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Recent Referrals</div>
                        <div class="card-tools">
                            <!--<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>-->
                        </div> 
                    </div>
                </div>
                <div class="card-body">
                <?php      
                    $error = "No direct downline members found";
                      $Members = $mysql->select("SELECT * FROM _tbl_Members 
                                               LEFT JOIN _tbl_Settings_Packages 
                                               ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where 
                                               `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$data[0]['MemberCode']."'  ORDER BY `PlacementID` DESC) 
                                                order by `_tbl_Members`.`MemberID` Desc ");
                ?>

                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                     <th><b>Referral ID</b></th>
                                     <th><b>Referral's Name</b></th>
                                     <th><b>Sponsor ID</b></th>
                                     <th><b>Upline ID</b></th>
                                     <th><b>Created</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php 
                                $i=1;
                                foreach ($Members as $Member) {
                                if ($i<=2) {
                                 ?>
                                <tr>
                                    <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                    <td><?php echo $Member['MemberName'];?></td>
                                    <td><?php echo $Member['SponsorCode'];?></td>
                                    <td><?php echo $Member['UplineCode'];?></td>
                                    <td><?php echo date("M d, Y",strtotime($Member['CreatedOn']));?></td>
                                </tr>
                                <?php } }?> 
                            </tbody>
                        </table>
                        <p align="right">
                        <?php
                            if (sizeof($Members)>2) {
                                ?>
                                <a href="dashboard.php?action=Members/MyAllMembers">More Referrals</a>
                                <?php
                            }
                        ?>
                        </p>
                    </div>                                                      
                </div>
            </div>
        </div>
    </div>
                </div>     
            </div>
        </div>
    </div>
    <script>
$( document ).ready(function() {
    
        Circles.create({
            id:'circles-1',
            radius:45,
            value:60,
            maxValue:100,
            width:7,
            text: <?php echo $leftCount>0 ? $leftCount : 0;?>,
            colors:['#f1f1f1', '#FF9E27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

        Circles.create({
            id:'circles-2',
            radius:45,
            value:70,
            maxValue:100,
            width:7,
            text: <?php echo $rightCount >0 ? $rightCount : 0;?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });
      $('#circles-1 .circles-wrp .circles-text').html('0');
        $('#circles-2 .circles-wrp .circles-text').html('0');     
    setTimeout(function() {
        $('#circles-1 .circles-wrp .circles-text').html('<?php echo $leftCount;?>');
        $('#circles-2 .circles-wrp .circles-text').html('<?php echo $rightCount;?>');    
    },2400);
     
});
    </script>