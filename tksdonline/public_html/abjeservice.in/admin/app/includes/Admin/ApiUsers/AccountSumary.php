<?php
 
 $summary = $mysql->select("select * from `_tbl_accounts` where md5(concat('j!j',MemberID))='".$_GET['d']."' order by AccountID desc");
 
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/AccountSummary">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/AccountSummary">Account Summary</a></li>
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
                                    <th class="border-top-0"><b>Particulars</b></th>
                                    <th class="border-top-0"><b>Amounts</b></th>
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
                                    
                                    <td class="list_td"><?php echo $request['TxnDate'];?></td>
                                    <td class="list_td"><?php echo $request['Particulars'];?></td>
                                    <td class="list_td">
                                     <div style="text-align:right;">
                                    <?php if ($request['Credit']>0) {?>
            <span style="color:Green">+<?php echo number_format($request['Credit'],2);?></span>
            <?php } else { ?>
            <span style="color:red">-<?php echo number_format($request['Debit'],2);?></span>
            <?php } ?>
            <br>
            <span style="color:#888"><?php echo number_format($request['Balance'],2);?></span>
            </div>
                                    </td>
                                     
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
 
 