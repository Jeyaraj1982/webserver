<?php 
 $m = $mysql->select("select * from _tbl_members where MemberID='".$_SESSION['User']['MemberID']."'");
                if(strlen($m[0]['MemberPin']==0)){
                  echo "<script>location.href='dashboard.php?action=create_pin';</script>";  
                exit;
                } else{
?>
<script>
 
    
     function XSubmitSearch() {
        
        $('#XErrMemberDetails').html("");
                                            
        ErrorCount=0;
        
        if(IsNonEmpty("XMemberDetails","ErrMemberDetails","Please Mobile/DTH Number")){
           IsSearch("XMemberDetails","ErrMemberDetails","Please Enter more than 3 characters") 
        }
        
        if (ErrorCount==0) {
            return true;
        } else{
            return false;
        }
    }
</script>
<div class="main-panel full-height">
            <div class="container">
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                             
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                
                <div class="row">
                <div class="col-md-12">
                    <?php
                        $downOptrs=array();
                        $downOptrsCode=array();
                        foreach(array('RA','RB','RJ','RV','RI','DA','DS','DV','DB','DT','DD') as $o) {
                            $temp_sql= $mysql->select("select * from `_tbl_operators` where APIID='0' and OperatorCode='".$o."'");
                            if (sizeof($temp_sql)==1) {
                                $downOptrs[]=$temp_sql[0]['OperatorName'];  
                                $downOptrsCode[]=$temp_sql[0]['OperatorCode'];  
                            }
                        }
                        if (sizeof($downOptrs)>0) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span style="color:red"><b><?php echo implode(",",$downOptrs); ?></b> currently down</span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
           <?php
                     $nsql= $mysql->select("select * from `_tbl_news` where (NewsFor='Retailers' or NewsFor='All') and IsPublish='1' and NewsID not in (select NewsID from _tbl_news_log where MemberID='".$_SESSION['User']['MemberID']."')  order by `NewsID` desc ");
                     foreach($nsql as $n) {
                ?>     
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading"><?php echo $n['NewsTitle'];?>
                   
                    </h4>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="doupdate('<?php echo $n['NewsID'];?>')">
    <span aria-hidden="true">&times;</span>
  </button>
                        <p><?php echo nl2br($n['NewsDescription']); ?></p>
                      
                        
                    </div>
 
            <?php } ?>

                <div class="row">
                                 
                                
                                <div class="col-sm-6" >
                                <div class="card" style="border:1px solid #ccc">
                                <div class="card-body">
                                     <form method="POST" action="dashboard.php?action=SearchTransactions" id="frms" onsubmit="return XSubmitSearch();"> 
                                        <div class="form-group form-show-validation row" style="padding-top: 2px;padding-bottom: 2px;">
                                            <div class="col-sm-9" style="padding-right:0px;padding-left:0px">
                                                <input type="text" class="form-control" id="XMemberDetails" placeholder="mobile/dth number" name="MemberDetails" style="border:1px solid #1572E8; border-radius: 5px 0px 0px 5px;border-right: none;padding-bottom: 11px; " value="<?php echo isset($_POST['MemberDetails']) ? $_POST['MemberDetails'] : '';?>" >
                                                <small style="color:#737373; font-size:X-smaller;" >eg: mobile/dth number</small>  <br>
                                                <span class="errorstring" id="XErrMemberDetails"><?php echo isset($ErrMemberDetails)? $ErrMemberDetails : "";?></span>
                                            </div>
                                            <div class="col-sm-3" style="padding-left:0px;">
                                                <button type="submit" class="btn btn-primary" name="BtnSearch" id="BtnSearch" style=" border-radius: 0px 5px 5px 0px;">Search</button>
                                            </div>
                                        </div>
                                     </form>
                                </div>
                                </div>
                                </div>
                            
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" style="border:1px solid #ccc">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="icon-wallet text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers" style="width: 100% !important;">
                                                <p class="card-category" style="color:#000">Utility Wallet</p>
                                                <h4 class="card-title" style="font-weight:bold;color:#888">
                                                    <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?>
                                                </h4>
                                                <a href="dashboard.php?action=UtilityWallet/WalletRequest"  style="font-size:12px">Add Fund</a>
                                            </div>
                                            <br>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round"  style="border:1px solid #ccc">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="icon-wallet text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category" style="color:#000">DMT Wallet</p>       
                                                <h4 class="card-title" style="font-weight:bold;color:#888">
                                                <?php echo number_format(0,2);?>
                                                </h4>
                                                <a href="dashboard.php?action=UtilityWallet/AutoWalletUpdate" style="font-size:12px">Add Fund</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                         
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                         <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                             <div class="card-title">Recent Recharge (mobile/dth) Transactions</div>
                        </div>
                    <div class="card-body" id="recentRecharges">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Cashback</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                    $txn = $mysql->select("select * from _tbl_transactions where MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc limit 0,5");
                                     foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                        if (sizeof($txn)==0) {
                                            ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;background:#fff;border-top:1px solid #ddd !important"> No transactions found</td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>    
                        </div>
                         
                    </div>
                 
                  <div class="row">
                        <div class="col-md-12">
                         <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                             <div class="card-title">
                             Recent Money Transfer Transactions</div>
                        </div>
                    <div class="card-body" id="recentRecharges">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th>Account Number</th>                                                                                           
                                            <th>IFSC Code</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Charges</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Bank Ref No</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                    $txn = $mysql->select("select * from _tbl_transactions where MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc limit 0,5");
                                     foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                        if (sizeof($txn)==0) {
                                            ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;background:#fff;border-top:1px solid #ddd !important"> No transactions found</td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
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
             
     
<script>       

function doupdate(nid) {
    $.ajax({url:'webservice.php?action=doupdate&N='+nid,success:function(data){}});
}
</script>
<?php } ?>