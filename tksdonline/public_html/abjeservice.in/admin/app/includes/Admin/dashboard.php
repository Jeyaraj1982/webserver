 <div class="page-inner">
                    <!-- Card -->
                    <h4 class="page-title">Dashboard</h4>
                  
                    <div class="row">
                  
                
                    <!--  <div class="col-sm-6 col-md-3" style="cursor:pointer">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Port</p>
                                                <h4 class="card-title">
                                                 <?php //echo PORT;?> <br>               
                                                </h4>
                                                <span style="color:#fff">
                                               <a href="javascript:void(0)" style="color:#FFF;"  onclick="loadPage('Settings/posttest')" >Test</a>&nbsp;|&nbsp;<a href="javascript:void(0)"  style="color:#FFF;" onclick="loadPage('Settings/Port')" >Cache</a> 
                                                                         </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  -->
                        
                        <div class="col-sm-6 col-md-3" style="cursor:pointer" onclick="loadPage('Agents/List')">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Users</p>
                                                <h4 class="card-title">
                                                <?php echo (sizeof($mysql->select("select MemberID from _tbl_member where IsMember='1'"))); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="icon-big text-center">
                                           <span style="font-size:12px;"> Subscribed in telegram : 
                                            
                                             
                                             <br>ABJ:
                                            <?php
                                                 echo sizeof($mysql->select("SELECT * FROM _tbl_member WHERE IsMember=1 and MapedTo='3' AND TelegramID>0"));
                                             ?>
                                             
                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" style="cursor:pointer" onclick="loadPage('Distributors/List')">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-interface-6"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers" >
                                                <p class="card-category">Distributors</p>
                                                <h4 class="card-title"><?php echo (sizeof($mysql->select("select MemberID from _tbl_member where IsDistributor='1'"))); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="icon-big text-center">
                                           <span style="font-size:12px;"> Subscribed in telegram : 
                                            <?php
                                                 echo sizeof($mysql->select("SELECT * FROM _tbl_member WHERE IsDistributor=1 AND TelegramID>0"));
                                             ?>
                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="col-sm-6 col-md-3" style="cursor:pointer" onclick="loadPage('ApiUsers/List')">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-interface-6"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers" >
                                                <p class="card-category">API</p>
                                                <h4 class="card-title"><?php echo (sizeof($mysql->select("select MemberID from _tbl_member where IsAPI='1'"))); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="icon-big text-center">
                                           <span style="font-size:12px;"> Subscribed in telegram : 
                                            <?php
                                                 echo sizeof($mysql->select("SELECT * FROM _tbl_member WHERE IsAPI=1 AND TelegramID>0"));
                                             ?>
                                             </span>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        -->
                        <div class="col-sm-6 col-md-3" style="cursor: pointer;" onclick="loadPage('Transactions/Transactions')">
                            <div class="card card-stats card-secondary card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Live Transaction</p>
                                                <h4 class="card-title"></h4>
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
                                                <p class="card-category">Today Overall Sales</p>
                                                <h4 class="card-title">
                                                <?php
                                                
                                                   $d = $mysql->select("SELECT SUM(rcamount) AS amt FROM _tbl_transactions WHERE DATE(txndate)=DATE('".date("Y-m-d")."') AND TxnStatus='success'");
                                                   echo number_format((isset($d[0]['amt']) ? $d[0]['amt'] : 0 ),2);
                                                ?>  
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         
                    </div>
                
                    
                    <div class="row">
                        <div class="col-sm-6 col-md-3" style="cursor: pointer;" onclick="loadPage('BillPayments/MoneyTransfer&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0" >
                                            <div class="numbers">
                                                <p class="card-category">IMPS</p>
                                                <h4 class="card-title">
                                                 <?php
                                                        $OperatorType = 7;
    $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3"  style="cursor: pointer;" onclick="loadPage('BillPayments/TNEB&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="flaticon-interface-6"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">TNEB Bill</p>
                                                <h4 class="card-title">
                                                 <?php
                                                        $OperatorType = 4;
    $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3"  style="cursor: pointer;" onclick="loadPage('BillPayments/Insurance&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="flaticon-graph"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Insurance</p>
                                                <h4 class="card-title">
                                                <?php
                                                        $OperatorType = 6;
    $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3"  style="cursor: pointer;" onclick="loadPage('BillPayments/Postpaid&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="flaticon-success"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Postpaid</p>
                                                <h4 class="card-title">
                                                 <?php
                                                        $OperatorType = 5;
    $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {                               
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                                                           
                        <div class="col-sm-6 col-md-3" style="cursor: pointer;" onclick="loadPage('BillPayments/Landline&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Landline</p>
                                                <h4 class="card-title">
                                                 <?php
                                                        $OperatorType = 3;
    $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" style="cursor: pointer;" onclick="loadPage('UtilityPayment/TNPolice&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">TN Police</p>
                                                <h4 class="card-title">
                                                 <?php
                                                        $OperatorType = 9;
    $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" style="cursor: pointer;" onclick="loadPage('BillPayments/Gas&filter=requested')">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Gas Bill</p>
                                                <h4 class="card-title">
                                                 <?php
                                                        $OperatorType = 10;
                                                        $data = $mysql->select("select * from _tbl_operators where OperatorType='".$OperatorType."'");
                                                        $OperatorTypeCodes = array();
                                                        foreach($data as $d) {
                                                             $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
                                                        }
                                                        $OperatorTypeCodes = implode(",",$OperatorTypeCodes);

                                                ?>
                                                <?php echo sizeof($mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='requested' order by txn.txnid desc"));?>
                                                </h4>
                                            </div>                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" style="cursor: pointer;" onclick="loadPage('Transactions/ListAll')">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="flaticon-interface-6"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Overall Bal </p>
                                                <h4 class="card-title">
                                                    <?php
                                                        $Rs  = $mysql->select("SELECT * FROM _tbl_member " );
                                                        $balance = 0;
                                                        foreach ($Rs as $rs){
                                                            $n = $application->getBalance($rs['MemberID']);
                                                            $balance +=  $n;
                                                        }  
                                                        echo  number_format($balance,2);
                                                    ?>     
                                                 </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                         
                    </div>  
                </div> 
                
                
                   <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Operatorwise Sales Report</h4>
                                        <div class="card-tools">
                                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                                            <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
                                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                                        </div>
                                    </div>
                                    <p class="card-category">
                                    Today Reports</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <?php
                                        $apicode[0]="";
                                        $apicode[1]="Mars";
                                        $apicode[2]="MRoboticsAPI";
                                        $apicode[3]="EzytmAPI";
                                        $apicode[4]="AaranjuLapu";
                                        $apicode[5]="TKSD";        
                                        
                                    ?>
                                        <div class="col-md-12">
                                            <div class="table-responsive table-hover table-sales">
                                             <?php $dreport = $mysql->select("SELECT operatorcode, SUM(rcamount) AS amt FROM _tbl_transactions WHERE DATE(txndate)=DATE('".date("Y-m-d")."') AND TxnStatus='success' group by operatorcode"); ?>    
                                             <table class="table">
                                                <thead>
                                                   <tr>
                                                        <th>Operator</th>
                                                        <th style="text-align:right">Amount</th>
                                                   </tr>
                                                </thead>           
                                                <tbody>
                                                    <?php foreach($dreport as $d) {
                                                        $o = $mysql->select("select * from _tbl_operators where OperatorCode='".$d['operatorcode']."'");
                                                        ?>
                                                    <tr>
                                                        <td style="height:auto;padding:8px;vertical-align:top !important;font-weight:bold;"><?php echo $o[0]['OperatorName']." (".$d['operatorcode'].")";?><br>
                                                        
                                                       <?php $api_report = $mysql->select("SELECT  APIID, SUM(rcamount) AS amt FROM _tbl_transactions WHERE  operatorcode= '".$d['operatorcode']."' and DATE(txndate)=DATE('".date("Y-m-d")."') AND TxnStatus='success' group by APIID"); ?>    
                                                       <div style="font-size:12px;font-weight:normal">
                                                       <?php
                                                        foreach($api_report as $ar) {
                                                            if ($ar['APIID']>=1) {
                                                            echo $apicode[$ar['APIID']]."-".$ar['amt']."<br>";
                                                            }
                                                        }
                                                       ?>
                                                       </div>
                                                        
                                                        
                                                        </td>
                                                        <td style="height:auto;padding:8px;text-align:right;vertical-align:top !important"><?php echo number_format($d['amt'],2);?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                             </table>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                  <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Distributors Summary</h4>
                                        <!--<div class="card-tools">
                                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                                            <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
                                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                                        </div>-->
                                    </div>
                                    <p class="card-category">
                                    <?php echo date("M d, Y");?>
                                     </p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive table-hover table-sales">
                                             <?php  $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsDistributor='1'" );  ?>
                                              <table   class="table" >
                                <thead>
                                    <tr>
                                        <th><b>Shop Name</b></th>
                                        <th style="text-align: right;"><b>Balance</b></th>
                                        <th style="text-align: right;"><b>Recharges</b></th>
                                        <th style="text-align: right;"><b>Bill Payments</b></th>
                                        <th style="text-align: right;"><b>IMPS</b></th>
                                        <th style="text-align: right;"><b>Tickets</b></th>
                                        <?php
                                            $optrs = $mysql->select("select * from _tbl_operators");
                                            foreach($optrs as $opt) {
                                                /*
                                                ?>
                                                <th><?php echo $opt['OperatorCode'];?></th>
                                                <?php
                                                */
                                            }
                                        ?>
                                    </tr>
                                </thead>                    
                                <tbody>
                                    <?php
                                    $TRSale=0;
                                     foreach ($Requests as $Request){
                                    
                                     ?>
                                    <tr>
                                        <td style="height:auto;padding:8px;border:1px solid #ccc;">
                                        <?php echo $Request['MemberName'];?>
                                        </td>
                                         
                                        <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                        <?php
                                             $mem = $mysql->select("select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."'");
                                        $bal =   $application->getBalance($Request['MemberID']);
                                        
                                        $t = 0;
                                        foreach($mem as $m) {
                                               $t+=$application->getBalance($m['MemberID']);
                                        }
                                        echo number_format($t+$application->getBalance($Request['MemberID']),2);                                                               
                                        ?>
                                        </td>
                                        <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details =  $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('RA','RB','RVX','RI','RJ','RV','TA','DB','DD','DS','DT','DV') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('RA','RB','RVX','RI','RJ','RV','TA','DB','DD','DS','DT','DV') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                                 $RSale =  ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ;
                                                 echo number_format($RSale,2)     ;
                                                 $TRSale+=$RSale;
                                            ?> 
                                        </td>
                                        
                                           <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BG','HPG','ING','LA','LB','ET','PA','PV','PJ','PB','IL','UTNP') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BG','HPG','ING','LA','LB','ET','PA','PV','PJ','PB','IL','UTNP') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                            ?>
                                          <?php // echo isset($details[0]['rcamount']) ? number_format($details[0]['rcamount'],2): "0.00";?>
                                            <?php // echo isset($sdetails[0]['rcamount']) ? number_format($sdetails[0]['rcamount'],2): "0.00";?> 
                                            <?php echo number_format( ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ,2) ;?> 
                                        </td>
                                        
                                           <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('MTB') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('MTB') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                            ?>
                                           <?php // echo isset($details[0]['rcamount']) ? number_format($details[0]['rcamount'],2): "0.00";?>
                                            <?php // echo isset($sdetails[0]['rcamount']) ? number_format($sdetails[0]['rcamount'],2): "0.00";?> 
                                            <?php echo number_format( ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ,2) ;?> 
                                        </td>
                                        
                                          <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BP') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BP') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".date("Y-m-d")."') ");
                                            ?>
                                            <?php // echo isset($details[0]['rcamount']) ? number_format($details[0]['rcamount'],2): "0.00";?>
                                            <?php //echo isset($sdetails[0]['rcamount']) ? number_format($sdetails[0]['rcamount'],2): "0.00";?> 
                                            <?php echo number_format( ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ,2) ;?> 
                                            
                                        </td>
                                      
 
                                             <?php
                                             foreach($optrs as $opt) { /*
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode='".$opt['OperatorCode']."' and  memberid='".$Request['MemberID']."' and  TxnStatus='success' ");
                                                 ?>
                                                   <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                                   <?php echo $details[0]['rcamount'];?>
                                                  </td>
                                                 <?php
                                                 */
                                             }
                                             ?>
                                       
                                         
                                            
                                                
                                         
                                        </td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No Datas Found</td>
                                    </tr>
                             <?php } else {?>  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right"><?php echo number_format($TRSale,2);?></td>
                                </tr>
                             <?php } ?>
                            </tbody>
                        </table>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                        
                        
                        
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Telegram </h4>
                                         
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive table-hover table-sales">
                                             <table class="table">
                                                <thead>
                                                   <tr>
                                                        <th>Route</th>
                                                        <th>Agents</th>
                                                        <th>Distributors</th>
                                                        <th>Customers</th>
                                                        <th>Incoming<br>SMS</th>
                                                        <th>outgoing<br>SMS</th>
                                                   </tr>
                                                </thead>
                                           
                                                <tbody>
                                                    
                                                                                                        <tr>
                                                        <td>ABJ</td>
                                                        <td>
                                                            <?php
                                                                echo sizeof($mysql->select("SELECT * FROM _tbl_member WHERE IsMember=1 and MapedTo='3' AND TelegramID>0"));
                                                            ?>
                                                        </td> 
                                                        <td>
                                                            0
                                                        </td>
                                                        <td>
                                                           <?php
                                                                echo sizeof($mysql->select("SELECT * FROM telegram_subscribers WHERE telegram_route='abj' and is_customer='1'"));
                                                           ?> 
                                                        </td>
                                                    </tr> 
                                                </tbody>
                                             </table>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            Jio POS Update
                                            <?php
                                                if (isset($_POST['jioposupdate'])) {
                                                     $mysql->execute("update _temp_settings set paramvalue='".$_POST['jpos']."' where param='jpos'");
                                                }
                                                $d = $mysql->select("select * from _temp_settings where param='jpos' ");
                                            ?>
                                            <form action="" method="post">
                                                <select name="jpos">
                                                    <option value="1" <?php echo $d[0]['paramvalue']==1 ? ' selected="selected" ' : "";?>>>on</option>
                                                    <option value="0" <?php echo $d[0]['paramvalue']==0 ? ' selected="selected" ' : "";?>>off</option>
                                                </select>
                                                <input type="submit" value="update" name="jioposupdate">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    
                <script>
                
                function loadPage(u) {
                    location.href="dashboard.php?action="+u;
                }
                
                </script>