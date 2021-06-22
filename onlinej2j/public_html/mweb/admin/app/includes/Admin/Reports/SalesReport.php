 
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Reports/SalesReport">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Reports/SalesReport">Sales Report</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Sales Report</div>
                </div>
                <div class="card-body">
                <?php
                    $d = isset($_GET['d']) ? $_GET['d'] : date("d");
$m = isset($_GET['m']) ? $_GET['m'] : date("m");
$y = isset($_GET['y']) ? $_GET['y'] : date("Y");
$reportDate = $y."-".$m."-".$d;
                ?>
                        <div class="col-md-12">
                        <form action="" method="get">
                <input type="hidden" value="Reports/SalesReport" name="action">
                <select name="d" style="padding: 5px 10px;">
                    <option value="1"  <?php echo $d==1 ? " selected='selected' " : "";?> >1</option>
                    <option value="2"  <?php echo $d==2 ? " selected='selected' " : "";?>>2</option>
                    <option value="3"  <?php echo $d==3 ? " selected='selected' " : "";?>>3</option>
                    <option value="4"  <?php echo $d==4 ? " selected='selected' " : "";?>>4</option>
                    <option value="5"  <?php echo $d==5 ? " selected='selected' " : "";?>>5</option>
                    <option value="6"  <?php echo $d==6 ? " selected='selected' " : "";?>>6</option>
                    <option value="7"  <?php echo $d==7 ? " selected='selected' " : "";?>>7</option>
                    <option value="8"  <?php echo $d==8 ? " selected='selected' " : "";?>>8</option>
                    <option value="9"  <?php echo $d==9 ? " selected='selected' " : "";?>>9</option>
                    <option value="10" <?php echo $d==10 ? " selected='selected' " : "";?>>10</option>
                    <option value="11" <?php echo $d==11 ? " selected='selected' " : "";?>>11</option>
                    <option value="12" <?php echo $d==12 ? " selected='selected' " : "";?>>12</option>
                    <option value="13" <?php echo $d==13 ? " selected='selected' " : "";?>>13</option>
                    <option value="14" <?php echo $d==14 ? " selected='selected' " : "";?>>14</option>
                    <option value="15" <?php echo $d==15 ? " selected='selected' " : "";?>>15</option>
                    <option value="16" <?php echo $d==16 ? " selected='selected' " : "";?>>16</option>
                    <option value="17" <?php echo $d==17 ? " selected='selected' " : "";?>>17</option>
                    <option value="18" <?php echo $d==18 ? " selected='selected' " : "";?>>18</option>
                    <option value="19" <?php echo $d==19 ? " selected='selected' " : "";?>>19</option>
                    <option value="20" <?php echo $d==20 ? " selected='selected' " : "";?>>20</option>
                    <option value="21" <?php echo $d==21 ? " selected='selected' " : "";?>>21</option>
                    <option value="22" <?php echo $d==22 ? " selected='selected' " : "";?>>22</option>
                    <option value="23" <?php echo $d==23 ? " selected='selected' " : "";?>>23</option>
                    <option value="24" <?php echo $d==24 ? " selected='selected' " : "";?>>24</option>
                    <option value="25" <?php echo $d==25 ? " selected='selected' " : "";?>>25</option>
                    <option value="26" <?php echo $d==26 ? " selected='selected' " : "";?>>26</option>
                    <option value="27" <?php echo $d==27 ? " selected='selected' " : "";?>>27</option>
                    <option value="28" <?php echo $d==28 ? " selected='selected' " : "";?>>28</option>
                    <option value="29" <?php echo $d==29 ? " selected='selected' " : "";?>>29</option>
                    <option value="30" <?php echo $d==30 ? " selected='selected' " : "";?>>30</option>
                    <option value="31" <?php echo $d==31 ? " selected='selected' " : "";?>>31</option>
                </select>
                <select name="m" style="padding: 5px 10px;">
                    <option value="1"  <?php echo $m==1 ? " selected='selected' " : "";?>>JAN</option>
                    <option value="2"  <?php echo $m==2 ? " selected='selected' " : "";?>>FEB</option>
                    <option value="3"  <?php echo $m==3 ? " selected='selected' " : "";?>>MAR</option>
                    <option value="4"  <?php echo $m==4 ? " selected='selected' " : "";?>>APR</option>
                    <option value="5"  <?php echo $m==5 ? " selected='selected' " : "";?> >MAY</option>
                    <option value="6"  <?php echo $m==6 ? " selected='selected' " : "";?> >JUN</option>
                    <option value="7"  <?php echo $m==7 ? " selected='selected' " : "";?> >JLY</option>
                    <option value="8"  <?php echo $m==8 ? " selected='selected' " : "";?>>AUG</option>
                    <option value="9"  <?php echo $m==9 ? " selected='selected' " : "";?>>SEP</option>
                    <option value="10" <?php echo $m==10 ? " selected='selected' " : "";?>>OCT</option>
                    <option value="11" <?php echo $m==11 ? " selected='selected' " : "";?>>NOV</option>
                    <option value="12" <?php echo $m==12 ? " selected='selected' " : "";?>>DEC</option>
                </select>
                <select name="y" style="padding: 5px 10px;">
                    <?php for($i=$_CONFIG['START_YEAR'];$i<=$_CONFIG['END_YEAR'];$i++) { ?>
                    <option value="<?php echo $i;?>"  <?php echo $y==$i ? " selected='selected' " : "";?>><?php echo $i;?></option>
                    <?php } ?>
                </select>
            
                
                  
                
<input type="submit" value="Report">
                </form>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Operatorwise Sales Report</h4>
                                         
                                    </div>
                                  
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <?php
                                        $apicode[0]="";
                                        $apicode[1]="Mars";
                                        $apicode[2]="MRoboticsAPI";
                                        $apicode[3]="EzytmAPI";
                                        $apicode[4]="AaranjuLapu";
                                        
                                    ?>
                                        <div class="col-md-12">
                                            <div class="table-responsive table-hover table-sales">
                                             <?php $dreport = $mysql->select("SELECT operatorcode, SUM(rcamount) AS amt FROM _tbl_transactions WHERE DATE(txndate)=DATE('".$reportDate."') AND TxnStatus='success' group by operatorcode"); ?>    
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
                                                        
                                                       <?php $api_report = $mysql->select("SELECT  APIID, SUM(rcamount) AS amt FROM _tbl_transactions WHERE  operatorcode= '".$d['operatorcode']."' and DATE(txndate)=DATE('".$reportDate."') AND TxnStatus='success' group by APIID"); ?>    
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
                                                 $details =  $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('RA','RB','RVX','RI','RJ','RV','TA','DB','DD','DS','DT','DV') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('RA','RB','RVX','RI','RJ','RV','TA','DB','DD','DS','DT','DV') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                                 $RSale =  ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ;
                                                 echo number_format($RSale,2)     ;
                                                 $TRSale+=$RSale;
                                            ?> 
                                        </td>
                                        
                                           <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BG','HPG','ING','LA','LB','ET','PA','PV','PJ','PB','IL','UTNP') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BG','HPG','ING','LA','LB','ET','PA','PV','PJ','PB','IL','UTNP') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                            ?>
                                          <?php // echo isset($details[0]['rcamount']) ? number_format($details[0]['rcamount'],2): "0.00";?>
                                            <?php // echo isset($sdetails[0]['rcamount']) ? number_format($sdetails[0]['rcamount'],2): "0.00";?> 
                                            <?php echo number_format( ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ,2) ;?> 
                                        </td>
                                        
                                           <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('MTB') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('MTB') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                            ?>
                                           <?php // echo isset($details[0]['rcamount']) ? number_format($details[0]['rcamount'],2): "0.00";?>
                                            <?php // echo isset($sdetails[0]['rcamount']) ? number_format($sdetails[0]['rcamount'],2): "0.00";?> 
                                            <?php echo number_format( ((isset($sdetails[0]['rcamount']) ? $sdetails[0]['rcamount']: "0.00" ) + (isset($details[0]['rcamount']) ? $details[0]['rcamount']: "0.00")) ,2) ;?> 
                                        </td>
                                        
                                          <td style="border:1px solid #ccc;text-align: right;height:auto;padding:8px;">
                                            <?php
                                                 $details = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BP') and  memberid='".$Request['MemberID']."' and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
                                                 $sdetails = $mysql->select("SELECT  SUM(rcamount) as rcamount FROM _tbl_transactions WHERE operatorcode in ('BP') and  memberid in (select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."') and  TxnStatus='success' and date(txndate)=date('".$reportDate."') ");
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
                        
                        
                </div>
            </div>
        </div>
    </div>
</div>