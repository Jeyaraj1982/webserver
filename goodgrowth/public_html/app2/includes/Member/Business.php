<style>
.dash_theme_gray {background:#fff;border:1px solid #f1f1f1;padding:15px;}
 .goldenDeActive {
background:radial-gradient(ellipse farthest-corner at right bottom, #cccccc 0%,  transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 70%, #aaa 8%,  #fff 100%);
border:1px solid #ccc;
 }
 
 .goldenActive {
background:radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%,  transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 70%, #FFFFAC 8%,  #5d4a1f 100%);
border:1px solid #FEDB37;
 }
</style>
<div class="content">
        <div class="row">
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Overall Members</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-network fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs">0</h3>
                        </div>
                    </div>
                    <!--<div class="panel-footer">
                        This is standard panel footer
                    </div>-->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Invoice Amount (Rs)</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-news-paper fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs">
                                <?php
                                    $invoice = $mysql->select("select sum(InvoiceAmount) as InvoiceAmount from _tbl_Accounts_Invoices Where MemberID='".$userData['MemberID']."'");
                                    echo isset($invoice[0]['InvoiceAmount']) ? convertcash($invoice[0]['InvoiceAmount']) : 0;
                                ?>
                            </h3>
                        </div>
                    </div>
                    <!--<div class="panel-footer">
                        This is standard panel footer
                    </div>-->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Receipt Amount (Rs)</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-news-paper fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs">
                                <?php
                                    $Receipt = $mysql->select("select sum(ReceiptAmount) as ReceiptAmount from _tbl_Accounts_Receipts  Where MemberID='".$userData['MemberID']."'");
                                     echo isset($Receipt[0]['ReceiptAmount']) ? convertcash($Receipt[0]['ReceiptAmount'])  : 0;
                                ?>
                            </h3>
                        </div>
                    </div>
                    <!--<div class="panel-footer">
                        This is standard panel footer
                    </div>-->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Non Invoice Amount (Rs)</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-news-paper fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs"> 
                            <?php
                                $d = convertcash($Receipt[0]['ReceiptAmount']-$invoice[0]['InvoiceAmount'])   ;
                                echo (strlen($d)>0) ? $d : 0;
                            ?>
                            </h3>
                        </div>
                    </div>
                    <!--<div class="panel-footer">
                        This is standard panel footer
                    </div>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="hpanel" style="height: 422px !important;">
                    <div class="panel-heading hbuilt">
                        Receipts & Invoices
                    </div>
                    <div class="panel-body" style="height: 385px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center small">
                                    <i class="fa fa-laptop"></i> Active users in current month (December)
                                </div>
                                <div class="flot-chart" style="height: 160px">
                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Wallet</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-wallet fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs">
                            <a href="dashboard.php?action=WalletTransactions" class="hlink"><?php echo number_format(getBalance($userData['MemberID']),2);?></a>
                            </h3>
                        </div>
                    </div>
              </div>
            </div><br>
             <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Points</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-cash fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs">
                            <?php echo Points::getAvailablePoints($userData['MemberID']);?>
                            </h3>
                        </div>
                    </div>
              </div>
            </div>
        </div>                                                     
        <div class="row">
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200" style="Padding: 0px;">
                        <div>
                            <table style="max-width: 100%;min-width: 100%;">
                            <tr>
                                <td colspan="3" class="dash_theme_gray <?php echo ($userData['PlanUpgradedD']==0)? "goldenDeActive": "goldenActive";?>"  valign="top" style="height: 197px;">
                                <div class="dash_widget_title" style="font-size:18px">G3 Members</div>
                                <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                <?php if ($userData['PlanUpgradedD']==0) { ?>  <br>
                                <div style="text-align:center;padding:6px">Not Activated.</div>
                                <?php } else { ?>
                                <div>
                                <br>
                                    <table style="width:100%">
                                     <?php 
                                        $recentMembes = $mysql->select("select * from _tbl_Members where PlanID='4' and ReferedBy='".$userData['MemberID']."' order by MemberID Desc limit 0,5 ");
                                        foreach($recentMembes as $rem) {
                                            ?>
                                            <tr>
                                                <td colspan="2"><?php echo ucwords(strtolower($rem['FirstName']));?> (<span style="color:Green"><?php echo $rem['MemberCode'];?></span>)</td>
                                            </tr>
                                            <tr>
                                                <td style="color:#999"><?php echo $rem['PlanString'];?> </td>
                                                <td style="color:#999;text-align:right"> <?php echo date("M d, H:i",strtotime($rem['CreatedOn']));?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><hr style="border:none;border-bottom:1px solid #f1f1f1"></td>
                                            </tr>
                                            <?php
                                        }
                                        if (sizeof($recentMembes)==0) {
                                            ?>
                                                                <tr>
                                                <td colspan="2" style="text-align:center">No Members found.</td>
                                            </tr>
                                            <?php
                                        }
                                     ?>
                                     </table>
                                </div>
                                <?php } ?>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200"  style="Padding: 0px;">
                        <div>
                            <table  style="max-width: 100%;min-width: 100%;">
                                <tr>
                                    <td colspan="3" class="dash_theme_gray  <?php echo ($userData['PlanUpgradedA']==0)? "goldenDeActive": "goldenActive";?>" valign="top" style="height: 197px;">
                                        <div class="dash_widget_title" style="font-size:18px">Goodway Members</div>
                                        <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                         <?php if ($userData['PlanUpgradedA']==0) { ?>      <br>
                                        <div style="text-align:center;padding:6px">Not Activated.</div>
                                        <?php } else { ?>
                                        <div>
                                        <br>
                                        <?php $recentMembes = $mysql->select("select * from _tbl_Members where PlanID='1' and ReferedBy='".$userData['MemberID']."'  order by MemberID Desc limit 0,5 "); 
                                         ?>
                                           <table style="width:100%">
                                           
                                             <?php 
                                                if(sizeof($recentMembes)>0)   {
                                             //   foreach($recentMembes as $rem) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="2" style="text-align:center"><?php echo sizeof($recentMembes);?> Members found.</td>
                                                    </tr>
                                             <?php } ?>
                                                  <!--  <tr>
                                                        <td colspan="2"><?php echo ucwords(strtolower($rem['FirstName']));?> (<span style="color:Green"><?php echo $rem['MemberCode'];?></span>)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#999"><?php echo $rem['PlanString'];?> </td>
                                                        <td style="color:#999;text-align:right"> <?php echo date("M d, H:i",strtotime($rem['CreatedOn']));?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><hr style="border:none;border-bottom:1px solid #f1f1f1"></td>
                                                    </tr> -->
                                                    <?php
                                             //   }
                                              if (sizeof($recentMembes)==0) {
                                                    ?>
                                                       <tr>
                                                        <td colspan="2" style="text-align:center">No Members found.</td>
                                                    </tr>
                                                    <?php
                                                }
                                             ?>
                                             </table> 
                                        </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200"  style="Padding: 0px;">
                        <div>
                            <table style="max-width: 100%;min-width: 100%;">
                                <tr>
                                    <td colspan="3" class="dash_theme_gray  <?php echo ($userData['PlanUpgradedB']==0)? "goldenDeActive": "goldenActive";?>" valign="top" style="height: 197px;">
                                        <div class="dash_widget_title" style="font-size:18px">My Gold Members</div>
                                        <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                         <?php if ($userData['PlanUpgradedB']==0) { ?>    <br>
                                        <div style="text-align:center;padding:6px">Not Activated.</div>
                                        <?php } else { ?>
                                        <div style="">
                                        <br>
                                            <table style="width:100%">
                                           
                                             <?php 
                                                $recentMembes = $mysql->select("select * from _tbl_Members where PlanID='2' and ReferedBy='".$userData['MemberID']."'  order by MemberID Desc limit 0,5 ");
                                                foreach($recentMembes as $rem) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="2"><?php echo ucwords(strtolower($rem['FirstName']));?> (<span style="color:Green"><?php echo $rem['MemberCode'];?></span>)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#999"><?php echo $rem['PlanString'];?> </td>
                                                        <td style="color:#999;text-align:right"> <?php echo date("M d, H:i",strtotime($rem['CreatedOn']));?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><hr style="border:none;border-bottom:1px solid #f1f1f1"></td>
                                                    </tr>
                                                    <?php
                                                }
                                                if (sizeof($recentMembes)==0) {
                                                    ?>
                                                       <tr>
                                                        <td colspan="2" style="text-align:center">No Members found.</td>
                                                    </tr>
                                                    <?php
                                                }
                                             ?>
                                             </table>
                                        </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200" style="Padding: 0px;">
                        <div>
                            <table style="max-width: 100%;min-width: 100%;">
                                <tr>
                                    <td colspan="3" class="dash_theme_gray  <?php echo ($userData['PlanUpgradedC']==0)? "goldenDeActive": "goldenActive";?>" valign="top" style="height: 197px;">
                                    <div class="dash_widget_title" style="font-size:18px">Super Gold Members</div>
                                    <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                     <?php if ($userData['PlanUpgradedC']==0) { ?>   <br>
                                    <div style="text-align:center;padding:6px">Not Activated.</div>
                                    <?php } else { ?>
                                    <div>
                                    <br>
                                        <table style="width:100%">
                                       
                                         <?php 
                                            $recentMembes = $mysql->select("select * from _tbl_Members where PlanID='3' and ReferedBy='".$userData['MemberID']."'  order by MemberID Desc limit 0,5 ");
                                            foreach($recentMembes as $rem) {
                                                ?>
                                                <tr>
                                                    <td colspan="2"><?php echo ucwords(strtolower($rem['FirstName']));?> (<span style="color:Green"><?php echo $rem['MemberCode'];?></span>)</td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#999"><?php echo $rem['PlanString'];?> </td>
                                                    <td style="color:#999;text-align:right"> <?php echo date("M d, H:i",strtotime($rem['CreatedOn']));?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><hr style="border:none;border-bottom:1px solid #f1f1f1"></td>
                                                </tr>
                                                <?php
                                            }
                                            if (sizeof($recentMembes)==0) {
                                                ?>
                                                   <tr>
                                                    <td colspan="2" style="text-align:center">No Members found.</td>
                                                </tr>
                                                <?php
                                            }
                                         ?>
                                         </table>
                                    </div>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200" style="Padding: 0px;">
                        <div>
                            <table style="max-width: 100%;min-width: 100%;">
                            <tr>
                                <td colspan="3" class="dash_theme_gray <?php echo ($userData['PlanUpgradedD']==0)? "goldenDeActive": "goldenActive";?>"  valign="top" style="height: 197px;">
                                <div class="dash_widget_title" style="font-size:18px">Gold Eagle Members</div>
                                <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                <?php if ($userData['PlanUpgradedD']==0) { ?>  <br>
                                <div style="text-align:center;padding:6px">Not Activated.</div>
                                <?php } else { ?>
                                
                                <?php } ?>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200" style="Padding: 0px;">
                        <div>
                            <table style="max-width: 100%;min-width: 100%;">
                            <tr>
                               <!-- <td colspan="3" class="dash_theme_gray <?php echo ($userData['PlanUpgradedD']==0)? "goldenDeActive": "goldenActive";?>"  valign="top" style="height: 197px;">
                                <div class="dash_widget_title" style="font-size:18px">Gold Finish Members</div>
                                <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                <?php if ($userData['PlanUpgradedD']==0) { ?>  <br>
                                <div style="text-align:center;padding:6px">Not Activated.</div>
                                <?php } else { ?>
                                
                                <?php } ?>
                                </td>  -->
                                <td colspan="3" class="dash_theme_gray <?php echo "goldenDeActive";?>"  valign="top" style="height: 197px;">
                                <div class="dash_widget_title" style="font-size:18px">Gold Finish Members</div>
                                <hr style="border:none;border-bottom:1px solid #f1f1f1">
                                <?php //if ($userData['PlanUpgradedD']==0) { ?>  <br>
                                <div style="text-align:center;padding:6px">Not Activated.</div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Order</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-cart fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                        <?php $Orders = $mysql->select("select * from `_tbl_Member_Orders` where `MemberID`='".$userData['MemberID']."' order by `OrderID` desc"); ?>
                            <h3 class="m-b-xs">
                               <?php echo sizeof($Orders);?>
                            </h3>
                        </div>
                    </div>
                    <!--<div class="panel-footer">
                        This is standard panel footer
                    </div>-->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-title pull-left">
                            <h4>Schemes</h4>
                        </div>
                        <div class="stats-icon pull-right"> 
                            <i class="pe-7s-note2 fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                            <h3 class="m-b-xs">
                             <?php $MemberSchemes = $mysql->select("select * from `_tbl_Members_Schemes` where `MemberID`='".$userData['MemberID']."' order by `MemberSchemeID` desc"); ?>
                                <?php echo sizeof($MemberSchemes);?>
                            </h3>
                        </div>
                    </div>
                    <!--<div class="panel-footer">
                        This is standard panel footer
                    </div>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                       Recently Joined Members 
                    </div>
                    <div class="panel-body list">
                        <div class="table-responsive project-list">
                            <table class="table table-striped">
                                    <?php 
                                        $recentMembes = $mysql->select("select * from _tbl_Members where  ReferedBy='".$userData['MemberID']."' order by MemberID Desc limit 0,5 ");
                                        foreach($recentMembes as $rem) {
                                    ?>
                                <tr>
                                    <td colspan="2"><?php echo ucwords(strtolower($rem['FirstName']));?> (<span style="color:Green"><?php echo $rem['MemberCode'];?></span>)</td>
                                    <td style="color:#999"><?php echo $rem['PlanString'];?> </td>
                                    <td style="color:#999;text-align:right"> <?php echo date("M d, H:i",strtotime($rem['CreatedOn']));?></td>
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hpanel">
                     <div class="panel-heading hbuilt">
                       Recent Wallet Refill Req. 
                    </div>
                    <div class="panel-body list">
                        <div class="table-responsive project-list">
                            <table class="table table-striped">
                                <?php                                                                                                                                             
                                    $data = $mysql->select("select * from _tbl_Wallet_Requests where IsApproved='0' and IsRejected='0' order by WalletRefillRequestID desc limit 0,5");
                                    foreach($data as $rem) {
                                        ?>
                                        <tr>
                                            <td colspan="2">Rs. <?php echo number_format($rem['Amount'],2);?> </td>
                                        </tr>
                                        <tr>
                                            <td style="color:#999"><?php echo $rem['TransferTo'];?> </td>
                                            <td style="color:#999;text-align:right"> <?php echo date("M d, H:i",strtotime($rem['RequestedOn']));?></td>
                                        </tr>
                                        
                                        <?php
                                    }
                                    if (sizeof($data)==0) {
                                        ?>
                                           <tr>
                                            <td colspan="2" style="text-align:center">No records found.</td>
                                            </tr>
                                        <?php
                                    }
                                 ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>