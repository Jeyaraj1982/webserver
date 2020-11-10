<?php 
     $FromD = isset($_POST['FromD']) ? $_POST['FromD'] : date("d");
     $FromM = isset($_POST['FromM']) ? $_POST['FromM'] : date("m");
     $FromY = isset($_POST['FromY']) ? $_POST['FromY'] : date("Y");
     
     $ToD = isset($_POST['ToD']) ? $_POST['ToD'] : date("d");
     $ToM = isset($_POST['ToM']) ? $_POST['ToM'] : date("m");
     $ToY = isset($_POST['ToY']) ? $_POST['ToY'] : date("Y");
     
       if(isset($_POST['viewTransaction'])){
            $fromDate = $FromY."-".$FromM."-".$FromD;
            $toDate = $ToY."-".$ToM."-".$ToD;
            $_POST['FromDate']=$fromDate;
            $_POST['ToDate']=$toDate;
            $Orders = $mysql->select("SELECT * FROM _queen_orders where (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') ) order by OrderID asc");
       }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Orders<br>
                                        <span style="font-size:13px">Agent Wise</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row" style="max-width:350px;margin-right:0px;margin-left:0px;padding:5px">                  
                                        <label>From</label>
                                        <div class="col-sm-12" style="padding-right:0px;padding-left:0px">
                                          <div class="form-group row" style="padding: 0px;">
                                            <div class="col-sm-3" style="padding-right: 0px;">
                                                <select required="" name="FromD" id="date" class="form-control" style="border:1px solid #ccc">
                                                    <?php for($i=1;$i<=31;$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromD'])) ? (($_POST[ 'FromD']==$i) ? " selected='selected' " : "") : (($FromD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                    <?php } ?>                       
                                                </select>                          
                                            </div>
                                            <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                                                <select required="" style="border:1px solid #ccc" class="form-control" name="FromM" id="FromM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                    <option value="1"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==1) ? " selected='selected' " : "") : (($FromM==1) ? " selected='selected' " : "");?>>January</option>
                                                    <option value="2"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==2) ? " selected='selected' " : "") : (($FromM==2) ? " selected='selected' " : "");?>>February</option>
                                                    <option value="3"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==3) ? " selected='selected' " : "") : (($FromM==3) ? " selected='selected' " : "");?>>March</option>
                                                    <option value="4"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==4) ? " selected='selected' " : "") : (($FromM==4) ? " selected='selected' " : "");?>>April</option>
                                                    <option value="5"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==5) ? " selected='selected' " : "") : (($FromM==5) ? " selected='selected' " : "");?>>May</option>
                                                    <option value="6"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==6) ? " selected='selected' " : "") : (($FromM==6) ? " selected='selected' " : "");?>>June</option>
                                                    <option value="7"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==7) ? " selected='selected' " : "") : (($FromM==7) ? " selected='selected' " : "");?>>July</option>
                                                    <option value="8"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==8) ? " selected='selected' " : "") : (($FromM==8) ? " selected='selected' " : "");?>>August</option>
                                                    <option value="9"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==9) ? " selected='selected' " : "") : (($FromM==9) ? " selected='selected' " : "");?>>September</option>
                                                    <option value="10" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==10) ? " selected='selected' " : "") : (($FromM==10) ? " selected='selected' " : "");?>>October</option>
                                                    <option value="11" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==11) ? " selected='selected' " : "") : (($FromM==11) ? " selected='selected' " : "");?>>November</option>
                                                    <option value="12" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==12) ? " selected='selected' " : "") : (($FromM==12) ? " selected='selected' " : "");?>>December</option>
                                                </select> 
                                            </div>
                                            <div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">
                                                <select required="" style="border:1px solid #ccc" class="form-control" name="FromY" id="FromY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                    <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromY'])) ? (($_POST[ 'FromY']==$i) ? " selected='selected' " : "") : (($FromY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                    <?php } ?>                       
                                                </select>
                                            </div>                            
                                          </div>
                                        </div>
                                </div>
                                    <div class="form-group row" style="max-width:350px;margin-right:0px;margin-left:0px;padding:5px">  
                                        <label>To</label>
                                        <div class="col-sm-12" style="padding-right:0px;padding-left:0px">
                                            <div class="form-group row" style="padding: 0px;">
                                                    <div class="col-sm-3" style="padding-right: 0px;">
                                                        <select required="" name="ToD" id="ToD" class="form-control" style="border:1px solid #ccc">
                                                            <?php for($i=1;$i<=31;$i++) {?>
                                                            <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'ToD'])) ? (($_POST[ 'ToD']==$i) ? " selected='selected' " : "") : (($ToD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                            <?php } ?>                       
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                                                        <select required="" style="border:1px solid #ccc;" class="form-control" name="ToM" id="ToM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                             <option value="1"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==1) ? " selected='selected' " : "") : (($ToM==1) ? " selected='selected' " : "");?>>January</option>
                                                    <option value="2"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==2) ? " selected='selected' " : "") : (($ToM==2) ? " selected='selected' " : "");?>>February</option>
                                                    <option value="3"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==3) ? " selected='selected' " : "") : (($ToM==3) ? " selected='selected' " : "");?>>March</option>
                                                    <option value="4"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==4) ? " selected='selected' " : "") : (($ToM==4) ? " selected='selected' " : "");?>>April</option>
                                                    <option value="5"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==5) ? " selected='selected' " : "") : (($ToM==5) ? " selected='selected' " : "");?>>May</option>
                                                    <option value="6"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==6) ? " selected='selected' " : "") : (($ToM==6) ? " selected='selected' " : "");?>>June</option>
                                                    <option value="7"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==7) ? " selected='selected' " : "") : (($ToM==7) ? " selected='selected' " : "");?>>July</option>
                                                    <option value="8"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==8) ? " selected='selected' " : "") : (($ToM==8) ? " selected='selected' " : "");?>>August</option>
                                                    <option value="9"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==9) ? " selected='selected' " : "") : (($ToM==9) ? " selected='selected' " : "");?>>September</option>
                                                    <option value="10" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==10) ? " selected='selected' " : "") : (($ToM==10) ? " selected='selected' " : "");?>>October</option>
                                                    <option value="11" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==11) ? " selected='selected' " : "") : (($ToM==11) ? " selected='selected' " : "");?>>November</option>
                                                    <option value="12" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==12) ? " selected='selected' " : "") : (($ToM==12) ? " selected='selected' " : "");?>>December</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">
                                                        <select style="border:1px solid #ccc" required="" class="form-control" name="ToY" id="ToY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                            <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                            <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'ToY'])) ? (($_POST[ 'ToY']==$i) ? " selected='selected' " : "") : (($ToY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                            <?php } ?>                       
                                                        </select>
                                                    </div>           
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="max-width:350px;margin-right:0px;margin-left:0px;padding:5px">  
                                        <label>Filter</label>    
                                        <div class="col-sm-12" style="padding-right:0px;padding-left:0px">
                                        <select class="form-control" id="filter" name="filter">
                                            <option value="1" <?php echo ($_POST['filter']==1) ? " selected='selected' " : "";?>>All Agents</option>
                                            <option value="2" <?php echo ($_POST['filter']==2) ? " selected='selected' " : "";?>>Payable By Agents</option>
                                            <option value="3" <?php echo ($_POST['filter']==3) ? " selected='selected' " : "";?>>Payable By Admin</option>
                                            <option value="4" <?php echo ($_POST['filter']==4) ? " selected='selected' " : "";?>>Nill Payment</option>
                                        </select>   
                                        </div>
                                    </div>
                                    <div class="form-group row">  
                                        <div class="col-sm-2"><button type="submit" name="viewTransaction" class="btn btn-primary" style="padding-top: 8px;padding-bottom: 8px;">View Report</button></div>
                                    </div>
                            </form>
                            </div>
                        </div>                                                                                                                                            
                    </div>
                    <?php if(isset($_POST['viewTransaction'])){ ?> 
                    <div class="col-sm-12"> 
                    <div class="card">
                        <div class="card-body"> 
                            <div class="form-group row" style="padding: 0px;">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <h5 class="card-title" style="margin-bottom:5px;font-size:15px;text-align:center"><b>Reporting Details</b></h5>
                                        <?php if(!($_POST['FromDate']==$_POST['ToDate'])) { ?>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">From</label>
                                            <div class="col-sm-7"><?php echo date("d M, Y",strtotime($fromDate));?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">To</label>
                                            <div class="col-sm-7"><?php echo date("d M, Y",strtotime($toDate));?></div> 
                                        </div>
                                        <?php }else { ?>
                                            <div class="form-group form-show-validation row" style="padding: 0px;">
                                                <label class="col-sm-5" for="name" style="text-align:right">Date</label>
                                                <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['FromDate']));?></div> 
                                            </div>    
                                        <?php } ?>
                                    </div>                                                           
                               </div> 
                               <form action="print.php" method="post" onsubmit="return gotoPrint();" target="_blank">
                                    <textarea cols="" rows="" id="content" name="content" style="display: none;"></textarea>
                                    <input type="submit" value="Print" class="btn btn-primary btn-sm" style="float: right;">
                                </form>
                            <div class="table-responsive">
                                
                                <?php
                                    function PrintRow($Agent) {
                                        ?>
                                            <tr>
                                                <td><?php echo $Agent["AgentCode"];?></td>
                                                <td><?php echo $Agent["AgentName"];?><br><?php echo $Agent['SurName'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Agent['OrderValue'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Agent['PaidValue'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Agent['UnpaidValue'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Agent['OverallUnpaidValue'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Agent['Balance'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Agent['OverallUnpaidValue']-$Agent['Balance'],2);?></td>
                                            </tr>
                                        <?php
                                    }
                                ?> 
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Agent Code</th>
                                                <th>Agent Name</th>
                                                <th style="text-align:right">Order Value</th>
                                                <th style="text-align:right">Paid</th>
                                                <th style="text-align:right">Unpaid</th>
                                                <th style="text-align:right">Over all unpaid</th>
                                                <th style="text-align:right">Wallet Balance</th>
                                                <th style="text-align:right">Payable Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php 
                                        $Agents = $mysql->select("select * from _queen_agent");
                                        $AllUnPaidValue = 0;
                                        $AllOverUnpaidValue =0;
                                        $AllPaidValue =0;
                                        $WalletBalance =0;
                                        $PrintedRows = 0;
                                        foreach($Agents as $Agent){
                                            $Balance = getWalletBalance($Agent['AgentID']); 
                                            $Agent['Balance']=$Balance;
                                            
                                            $OrderValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') )");
                                            $OrderValue = isset($OrderValue[0]['OrderTotal']) ? $OrderValue[0]['OrderTotal'] : "0";
                                            $Agent['OrderValue']=$OrderValue;
                                            
                                            $PaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') ) and IsPaid='1'");
                                            $PaidValue = isset($PaidValue[0]['OrderTotal']) ? $PaidValue[0]['OrderTotal'] : "0";
                                            $Agent['PaidValue']=$PaidValue;
                                            
                                            $UnpaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') ) and IsPaid='0'");
                                            $UnpaidValue = isset($UnpaidValue[0]['OrderTotal']) ? $UnpaidValue[0]['OrderTotal'] : "0";
                                            $Agent['UnpaidValue']=$UnpaidValue;
                                            
                                            $OverallUnpaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and IsPaid='0'");
                                            $OverallUnpaidValue = isset($OverallUnpaidValue[0]['OrderTotal']) ? $OverallUnpaidValue[0]['OrderTotal'] : "0";
                                            $Agent['OverallUnpaidValue']=$OverallUnpaidValue;
                                            
                                            
                                            if($_POST['filter']==1){
                                                PrintRow($Agent);
                                                $PrintedRows++; 
                                                $AllUnPaidValue += $Agent['UnpaidValue'];
                                                $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                $AllPaidValue += $Agent['PaidValue'];   
                                                $WalletBalance += $Balance;   
                                            }
                                            if($_POST['filter']==2){
                                                if (($OverallUnpaidValue-$Balance)>0) {
                                                    PrintRow($Agent);  
                                                    $PrintedRows++;
                                                    $AllUnPaidValue += $Agent['UnpaidValue'];
                                                    $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                    $AllPaidValue += $Agent['PaidValue'];   
                                                    $WalletBalance += $Balance;   
                                                }
                                            }
                                            if($_POST['filter']==3){
                                                if (($OverallUnpaidValue-$Balance)<0) {
                                                    PrintRow($Agent); 
                                                    $PrintedRows++;
                                                    $AllUnPaidValue += $Agent['UnpaidValue'];
                                                    $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                    $AllPaidValue += $Agent['PaidValue'];   
                                                    $WalletBalance += $Balance;    
                                                } 
                                            }
                                            if($_POST['filter']==4){
                                                if (($OverallUnpaidValue-$Balance)==0) {
                                                    PrintRow($Agent);
                                                    $PrintedRows++;    
                                                    $AllUnPaidValue += $Agent['UnpaidValue'];
                                                    $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                    $AllPaidValue += $Agent['PaidValue'];   
                                                    $WalletBalance += $Balance; 
                                                }
                                            }                                             
                                         ?>
                                           
                                        <?php } ?>       
                                        <?php if ($PrintedRows>0) { ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right"><?php echo number_format($AllPaidValue,2);?></td>
                                            <td style="text-align: right"><?php echo number_format($AllUnPaidValue,2);?></td>
                                            <td style="text-align: right"><?php echo number_format($AllOverUnpaidValue,2);?></td>
                                            <td style="text-align: right"><?php echo number_format($WalletBalance,2);?></td>
                                            <td style="text-align: right"><?php echo number_format($AllOverUnpaidValue-$WalletBalance,2);?></td>
                                        </tr>
                                        <?php } else {?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Records Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Reported On : <?php echo date("d M, Y H:i");?></label>
                                </div>
                             </div>
                        </div>                                                                                                                                            
                    </div>
                    </div>   
                    <?php } ?>                                                                                        
                </div>
            </div>
        </div>
    </div>
<script>
$(document).ready(function() {
$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
});

</script> 
<script>
function gotoPrint() {
    $('#content').val($('#print').html());
    return true;
}
</script>
<div id="print" style="display:none">
    <div style="font-family:arial;font-size: 14px;letter-spacing: 0.05em;color: #2A2F5B;font-weight: 400;line-height: 1.5;">
        <div class="" style="width:850px;padding:25px;margin:0px auto;border:1px solid #333;">
            <div class="row" style="flex-wrap: wrap;">
                <div class="col-md-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                    <div class="card" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                        <div class="card-body" style="padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;"> 
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;"><b>Agent Wise Report</b></h5>
                            <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                       
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Reporting Details</b></h5>
                                        <?php if(!($_POST['FromDate']==$_POST['ToDate'])) {?>
                                        From : <?php echo date("d M, Y",strtotime($_POST['FromDate']));?><br>
                                        To   : <?php echo date("d M, Y",strtotime($_POST['ToDate']));?><br>
                                        <?php } else{ ?>
                                        Date : <?php echo date("d M, Y",strtotime($_POST['FromDate']));?><br>
                                        <?php } ?>
                                        <br>
                                    </div>
                                </div>                          
                            </div>                                                                     
                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped mt-3" border="1" style="width:100%" cellspacing="0" cellpadding="3">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Agent Name</th>
                                                <th colspan="3" style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;"><?php echo date("d M, Y",strtotime($_POST['FromDate']));?>-<?php echo date("d M, Y",strtotime($_POST['ToDate']));?></th>
                                                <th colspan="3" style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Over All Order Value</th>
                                                <th rowspan="2" style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Wallet <br>Balance</th>
                                                <th rowspan="2" style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Payable<br> Amount</th>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Value</th>    
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Paid</th>    
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Unpaid</th>    
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Value</th>    
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Paid</th>    
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: center;">Un Paid</th>    
                                            </tr>
                                        </thead>                             
                                        <tbody>                                                                                                             
                                        <?php
                                            function _PrintRow($Agent) {
                                        ?>
                                            <tr>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Agent["AgentName"];?><br><?php echo $Agent['SurName'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OrderValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['PaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['UnpaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OverallOrderValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OverallPaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OverallUnpaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['Balance'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OverallUnpaidValue']-$Agent['Balance'],2);?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        <?php 
                                        $Agents = $mysql->select("select * from _queen_agent");
                                        $AllOrderValue = 0;
                                        $AllUnPaidValue = 0;
                                        $AllOverUnpaidValue =0;
                                        $AllPaidValue =0;
                                        $WalletBalance =0;
                                        $PrintedRows = 0;
                                        foreach($Agents as $Agent){
                                            $Balance = getWalletBalance($Agent['AgentID']); 
                                            $Agent['Balance']=$Balance;
                                            
                                            $OrderValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') )");
                                            $OrderValue = isset($OrderValue[0]['OrderTotal']) ? $OrderValue[0]['OrderTotal'] : "0";
                                            $Agent['OrderValue']=$OrderValue;
                                            
                                            $PaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') ) and IsPaid='1'");
                                            $PaidValue = isset($PaidValue[0]['OrderTotal']) ? $PaidValue[0]['OrderTotal'] : "0";
                                            $Agent['PaidValue']=$PaidValue;
                                            
                                            $UnpaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') ) and IsPaid='0'");
                                            $UnpaidValue = isset($UnpaidValue[0]['OrderTotal']) ? $UnpaidValue[0]['OrderTotal'] : "0";
                                            $Agent['UnpaidValue']=$UnpaidValue;
                                            
                                            $OverallUnpaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and IsPaid='0'");
                                            $OverallUnpaidValue = isset($OverallUnpaidValue[0]['OrderTotal']) ? $OverallUnpaidValue[0]['OrderTotal'] : "0";
                                            $Agent['OverallUnpaidValue']=$OverallUnpaidValue;
                                            
                                            $OverallPaidValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."' and IsPaid='1'");
                                            $OverallPaidValue = isset($OverallPaidValue[0]['OrderTotal']) ? $OverallPaidValue[0]['OrderTotal'] : "0";
                                            $Agent['OverallPaidValue']=$OverallPaidValue;
                                            
                                            $OverallOrderValue = $mysql->select("select sum(OrderTotal) as OrderTotal from _queen_orders where AgentID='".$Agent['AgentID']."'");
                                            $OverallOrderValue = isset($OverallOrderValue[0]['OrderTotal']) ? $OverallOrderValue[0]['OrderTotal'] : "0";
                                            $Agent['OverallOrderValue']=$OverallOrderValue;
                                            
                                            if($_POST['filter']==1){
                                                _PrintRow($Agent);
                                                $PrintedRows++; 
                                                $AllOrderValue += $Agent['OrderValue'];
                                                $AllUnPaidValue += $Agent['UnpaidValue'];
                                                $AllPaidValue += $Agent['PaidValue'];  
                                                $AllOverOrderValue +=$Agent['OverallOrderValue'];
                                                $AllOverPaidValue +=$Agent['OverallPaidValue'];
                                                $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                $WalletBalance += $Balance;   
                                            }
                                            if($_POST['filter']==2){
                                                if (($OverallUnpaidValue-$Balance)>0) {
                                                    _PrintRow($Agent);  
                                                    $PrintedRows++;
                                                    $AllOrderValue += $Agent['OrderValue'];
                                                    $AllUnPaidValue += $Agent['UnpaidValue'];
                                                    $AllPaidValue += $Agent['PaidValue'];  
                                                    $AllOverOrderValue +=$Agent['OverallOrderValue'];
                                                    $AllOverPaidValue +=$Agent['OverallPaidValue'];
                                                    $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                    $WalletBalance += $Balance;    
                                                }
                                            }
                                            if($_POST['filter']==3){
                                                if (($OverallUnpaidValue-$Balance)<0) {
                                                    _PrintRow($Agent); 
                                                    $PrintedRows++;
                                                    $AllOrderValue += $Agent['OrderValue'];
                                                    $AllUnPaidValue += $Agent['UnpaidValue'];
                                                    $AllPaidValue += $Agent['PaidValue'];  
                                                    $AllOverOrderValue +=$Agent['OverallOrderValue'];
                                                    $AllOverPaidValue +=$Agent['OverallPaidValue'];
                                                    $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                    $WalletBalance += $Balance;  
                                                } 
                                            }
                                            if($_POST['filter']==4){
                                                if (($OverallUnpaidValue-$Balance)==0) {
                                                    _PrintRow($Agent);
                                                    $PrintedRows++;  
                                                    $AllOrderValue += $Agent['OrderValue'];
                                                    $AllUnPaidValue += $Agent['UnpaidValue'];
                                                    $AllPaidValue += $Agent['PaidValue'];  
                                                    $AllOverOrderValue +=$Agent['OverallOrderValue'];
                                                    $AllOverPaidValue +=$Agent['OverallPaidValue'];
                                                    $AllOverUnpaidValue +=$Agent['OverallUnpaidValue'];
                                                    $WalletBalance += $Balance;  
                                                }
                                            }                                             
                                         ?>
                                           
                                        <?php } ?>
                                        <?php if ($PrintedRows>0) { ?>
                                        <tr>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right">Total</td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOrderValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllPaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllUnPaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOverOrderValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOverPaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOverUnpaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($WalletBalance,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOverUnpaidValue-$WalletBalance,2);?></td>
                                        </tr>
                                        <?php } else {?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Records Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                             <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    Reported On   : <?php echo date("d M, Y H:i");?>
                                </div>
                             </div>
                            <br><br><br><br>                                
                        </div>                                                                                                                                             
                    </div>                                                                                             
                </div>                                                                   
            </div>
        </div>
    </div>
</div>