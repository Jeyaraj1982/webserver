<?php 
     $FromD = isset($_POST['FromD']) ? $_POST['FromD'] : date("d");
     $FromM = isset($_POST['FromM']) ? $_POST['FromM'] : date("m");
     $FromY = isset($_POST['FromY']) ? $_POST['FromY'] : date("Y");
     
     $ToD = isset($_POST['ToD']) ? $_POST['ToD'] : date("d");
     $ToM = isset($_POST['ToM']) ? $_POST['ToM'] : date("m");
     $ToY = isset($_POST['ToY']) ? $_POST['ToY'] : date("Y");
     
     
        $fromDate = $FromY."-".$FromM."-".$FromD;
        $toDate = $ToY."-".$ToM."-".$ToD;
        $_POST['FromDate']=$fromDate;
        $_POST['ToDate']=$toDate;
            $Orders = $mysql->select("SELECT * FROM _queen_orders where AgentID='".$_POST['Agent']."' and (date(OrderOn)>=date('".$_POST['FromDate']."') and date(OrderOn)<=date('".$_POST['ToDate']."') ) order by OrderID asc");
            $data = $mysql->select("select * from _queen_agent where AgentID='".$_POST['Agent']."'");
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
                                        Agent - Datewise Report
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                            <div class="form-group row" style="padding: 0px;">
                                    <div class="col-sm-6">
                                        <h5 class="card-title" style="margin-bottom:5px;font-size:15px"><b>Agent Details</b></h5>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-4" for="name">Agent Code</label>
                                            <div class="col-sm-8"><?php echo $data[0]['AgentCode'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-4" for="name">Agent Name</label>
                                            <div class="col-sm-8"><?php echo $data[0]['AgentName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-4" for="name">Sur Name</label>
                                            <div class="col-sm-8"><?php echo $data[0]['SurName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-4" for="name">Mobile Number</label>
                                            <div class="col-sm-8"><?php echo $data[0]['MobileNumber'];?></div> 
                                        </div>
                                        <!--<div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-3" for="name">Is Active</label>
                                            <div class="col-sm-9"><?php //if($data[0]['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></div> 
                                       </div>-->
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <h5 class="card-title" style="margin-bottom:5px;font-size:15px;text-align:right"><b>Reporting Details</b></h5>
                                        <?php if(!($_POST['FromDate']==$_POST['ToDate'])) { ?>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">From</label>
                                            <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['FromDate']));?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">To</label>
                                            <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['ToDate']));?></div> 
                                        </div>
                                        <?php }else { ?>
                                            <div class="form-group form-show-validation row" style="padding: 0px;">
                                                <label class="col-sm-5" for="name" style="text-align:right">Date</label>
                                                <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['FromDate']));?></div> 
                                            </div>    
                                        <?php } ?>
                                        <br>                                                     
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">Wallet Balance</label>
                                            <div class="col-sm-7"> <i class="fas fa-rupee-sign"></i> <?php echo number_format(getWalletBalance($data[0]['AgentID']),2);?><br></div> 
                                        </div>
                                    </div>                                                           
                               </div> 
                            <div class="table-responsive">
                                <form action="print.php" method="post" onsubmit="return gotoPrint();" target="_blank">
                                    <textarea cols="" rows="" id="content" name="content" style="display: none;"></textarea>
                                    <input type="submit" value="Print" class="btn btn-primary btn-sm" style="float: right;">
                                </form>
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Order ID.</th>
                                                <th style="text-align:right">Order Value</th>
                                                <th>Staff Name</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Orders as $Order){
                                        $OrderDate = date("d M, Y, H:i", strtotime($Order["OrderOn"]));
                                        $Agent = $mysql->select("select * from _queen_agent where AgentID='".$Order['AgentID']."'");
                                         ?>
                                            <tr>
                                                <td><?php echo $OrderDate;?></td>
                                                <td><?php echo $Order["OrderCode"];?></td>
                                                <td style="text-align:right"><?php echo number_format($Order["OrderTotal"],2);?></td>
                                                <td><?php echo $Order["StaffName"];?></td>
                                                <td><?php if($Order['IsPaid']=="1"){ echo "<span style='color:green'>Paid on : ".date("d M, Y H:i", strtotime($Order['PaidOn']))."</span>"; } else { echo "<span style='color:red'>Unpaid</span>";} ?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/view&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">View</a>
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Orders)=="0"){ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Orders Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="text-align:right;">
                                    <?php $unpaidamount = $mysql->select("select sum(OrderTotal) as bal from _queen_orders where AgentID='".$data[0]['AgentID']."' and IsPaid='0'");?>
                                    <b>Unpaid Amount : <i class="fas fa-rupee-sign"></i> <?php echo $unpaidamount[0]['bal'];?></b>
                                </div>
                                <div class="col-md-12">
                                    <label for="name">Reported On : <?php echo date("d M, Y H:i");?></label>
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
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;"><b>Agent - Datewise Report</b></h5>
                            <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Agent Details</b></h5>
                                         Agent Code      : <?php echo $data[0]['AgentCode'];?><br>
                                         Agent Name      : <?php echo $data[0]['AgentName'];?><br>
                                         Sur Name        : <?php echo $data[0]['SurName'];?><br>
                                         +91 <?php echo $data[0]['MobileNumber'];?><br>
                                         
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
                                        <b>Wallet Balance   : INR <?php echo number_format(getWalletBalance($data[0]['AgentID']),2);?><br></b>
                                    </div>
                                </div>                          
                            </div>                                                                     
                            <br><br> 
                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped mt-3" border="1" style="width:100%" cellspacing="0" cellpadding="3">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;width: 140px;">Date</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;width: 80px;">Order ID.</th>
                                                <th style="text-align:right">Order Value</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Staff Name</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Status</th>
                                            </tr>
                                        </thead>                             
                                        <tbody>
                                        <?php foreach($Orders as $Order){
                                        $OrderDate = date("d M, Y, H:i", strtotime($Order["OrderOn"]));
                                        $Agent = $mysql->select("select * from _queen_agent where AgentID='".$Order['AgentID']."'");
                                         ?>
                                            <tr>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $OrderDate;?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Order["OrderCode"];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Order["OrderTotal"],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Order["StaffName"];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php if($Order['IsPaid']=="1"){ echo "Paid on : ".date("d M, Y H:i", strtotime($Order['PaidOn'])); } else { echo "Unpaid";} ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Orders)=="0"){ ?>
                                            <tr>
                                                <td colspan="8" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: center;">No Orders Found</td>
                                            </tr>                                 
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                             <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="text-align:right;padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <b>Unpaid Amount : INR <?php echo $unpaidamount[0]['bal'];?></b>
                                </div>
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

 