<?php
 
 $summary = $mysql->select("select * from `_tbl_accounts` where md5(concat('j!j',MemberID))='".$_GET['d']."' order by AccountID desc");
 
?>

<?php
        if (isset($_GET['operator'])) {
            $opt = $mysql->select("select * from _tbl_operators where `OperatorCode`='".$_GET['operator']."' ");
        $summary = $mysql->select("select * from `_tbl_transactions` where `operatorcode`='".$_GET['operator']."' and `MemberID`='".$_SESSION['User']['MemberID']."' order by txnid desc");
        $optttitle= $opt[0]['OperatorTypeCode']." <span style='color:green'>(".$opt[0]['OperatorName'].")</span><br>";
    } else {   
        $summary = $mysql->select("select * from `_tbl_transactions` where  md5(concat('j!j',MemberID))='".$_GET['d']."'  order by txnid desc");
        $optttitle = "";
    }
?>

<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Transaction Summary</a></li>
        </ul>
    </div>
    <!--<div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=all"><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=unused" ><small>Unused</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=used"><small>Used</small></a>
        </div>
    </div>-->
    <style>
    .list_td {font-size:11px;padding:0px 5px !important;}
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transactions</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table onmousemove="updateid()" onmouseout="clearid()" onmousedown="updateid()" onmouseover="updateid()" onmouseup="updateid()" id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr>
                                    <th class="border-top-0"><b>Txn Date</b></th>
                                    <th class="border-top-0"><b>Operator</b></th>
                                    <th class="border-top-0"><b>Number</b></th>
                                    <th class="border-top-0"><b>Amount</b></th>
                                    <th class="border-top-0"><b>Status</b></th>
                                    <th class="border-top-0"><b>OperatorRef</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($requests)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($summary as $request){ ?>
                                <?php
                                    $color="#222";
                                    switch($request['TxnStatus']) {
                                        case 'success' : $color = "Green"; break;
                                        case 'reversed' : $color = "orange"; break;
                                        case 'failure' : $color = "red"; break;
                                        case 'accepted' : $color = "blue"; break;
                                        default: $color = "#222"; break;
                                    }
                                ?>
                                <tr>
                                    
                                    <td class="list_td"><?php echo $request['txndate'];?></td>
                                    <td class="list_td"><?php echo $request['operatorcode'];?></td>
                                    <td class="list_td"><?php echo $request['rcnumber'];?></td>
                                    <td class="list_td"><?php echo $request['rcamount'];?></td>
                                    <td class="list_td">
                                    <?php if ($request['TxnStatus']=="reversed") {
                  echo "<span style='color:orange'>".strtoupper($request['TxnStatus'])."</span><br>";
                  echo "<span style='color:#888'>".$request['revDate']."</span>";
            } ?>
            <?php if ($request['TxnStatus']=="success") {
                  echo "<span style='color:green'>".strtoupper($request['TxnStatus'])."</span><br>";
            } ?>
             <?php if ($request['TxnStatus']=="failure") {
                  echo "<span style='color:red'>".strtoupper($request['TxnStatus'])."</span><br>";
                  echo "<span style='color:#888'>".strtoupper($request['msg'])."</span><br>";
                  
            } ?>
             <?php if ($request['TxnStatus']=="pending") {
                  echo "<span style='color:blue'>".strtoupper($request['TxnStatus'])."</span><br>";
            } ?>
              <?php if ($request['TxnStatus']=="requested") {
                  echo "<span style='color:purple'>".strtoupper($request['TxnStatus'])."</span><br>";
            } ?>
             <?php if ($request['TxnStatus']=="accepted") {
                  echo "<span style='color:purple'>".strtoupper($request['TxnStatus'])."</span><br>";
            } ?>
                                    
                                    </td>
                                    <td class="list_td"><?php echo $request['OperatorNumber'];?></td> 
                                     
                                </tr>
                              
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
 
 