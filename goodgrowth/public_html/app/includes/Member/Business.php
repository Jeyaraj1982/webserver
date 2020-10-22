<style>
.dash_widget_title {text-align:left;font-size:14px;}
.dash_widget_Count {text-align:right;font-size:30px;padding-top:20px;color:green}
.dash_theme_gray {background:#fff;border:1px solid #f1f1f1;padding:15px;}
.dash_theme_widget {width:15%;}
 .goldenDeActive {
background:radial-gradient(ellipse farthest-corner at right bottom, #cccccc 0%,  transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 70%, #aaa 8%,  #fff 100%);
border:1px solid #ccc;
 }
 
 .goldenActive {
background:radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%,  transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 70%, #FFFFAC 8%,  #5d4a1f 100%);
border:1px solid #FEDB37;
 }
   
                
</style>

<table style="width:100%">
    <tr>
        <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">Overall Members</div>
            <div class="dash_widget_Count" id="overallmembers">
                <!--<?php echo sizeof($mysql->select("select MemberID from _tbl_Members where MemberID>1"));  ?>-->
            </div>
            <script>
$({ Counter: 0 }).animate({
  Counter: $('#overallmembers').text()
}, {
  duration: 2000,
  easing: 'swing',
  step: function() {
    $('#overallmembers').text(Math.ceil(this.Counter));
  }
});
</script>
        </td>
       <td style="width:2%">&nbsp;</td>
         <!--
         <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">My Members</div>
            <div class="dash_widget_Count" id="mymembers">
            <?php echo sizeof($mysql->select("select MemberID from _tbl_Members where  ReferedBy='".$userData['MemberID']."' "));  ?>
            </div>
            
            <script>
$({ Counter: 0 }).animate({
  Counter: $('#mymembers').text()
}, {
  duration: 1500,
  easing: 'swing',
  step: function() {
    $('#mymembers').text(Math.ceil(this.Counter));
  }
});
</script>

        </td>
        <td style="width:2%">&nbsp;</td>   -->
        
         <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">Invoiced Amt (Rs)</div>
            <div class="dash_widget_Count" id="Invoiced">
            <?php
                $invoice = $mysql->select("select sum(InvoiceAmount) as InvoiceAmount from _tbl_Accounts_Invoices Where MemberID='".$userData['MemberID']."'");
                echo isset($invoice[0]['InvoiceAmount']) ? convertcash($invoice[0]['InvoiceAmount']) : 0;
                ?>
            </div>
        </td> 
        <td style="width:2%">&nbsp;</td>
        
        <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">Receipt Amt (Rs)</div>
            <div class="dash_widget_Count">
            <?php
                $Receipt = $mysql->select("select sum(ReceiptAmount) as ReceiptAmount from _tbl_Accounts_Receipts  Where MemberID='".$userData['MemberID']."'");
                 echo isset($Receipt[0]['ReceiptAmount']) ? convertcash($Receipt[0]['ReceiptAmount'])  : 0;
                ?>
            </div>
        </td>
        <td style="width:2%">&nbsp;</td>
        
        <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">Non-Invoice Amt (Rs)</div>
            <div class="dash_widget_Count">
            <?php
                 $d = convertcash($Receipt[0]['ReceiptAmount']-$invoice[0]['InvoiceAmount'])   ;
                 echo (strlen($d)>0) ? $d : 0;
                ?>
            </div>
        </td>
        <td style="width:2%">&nbsp;</td>
        
        <td class="dash_theme_widget dash_theme_gray">
             <div class="dash_widget_title">Points</div>
            <div class="dash_widget_Count">
             <?php echo Points::getAvailablePoints($userData['MemberID']);?>
            </div> 
        </td>
        <td style="width:2%">&nbsp;</td>
        
        <td class="dash_theme_widget dash_theme_gray">
           <!-- <div class="dash_widget_title">Members Online</div>
            <div class="dash_widget_Count">
            <?php
                $u = $mysql->select("select * from _tbl_Members_LoginHistory where IsLogout='0' and  lastupdate>=(select '".date("Y-m-d H:i:s")."' + INTERVAL -30 MINUTE)");
                echo sizeof($u);
            ?>
            </div>-->
        </td>
    </tr>
    <tr>
        <td colspan="11">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="7" rowspan="3" class="dash_theme_gray" style="vertical-align:top">
        <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
    <?php
    $lables = "[";
    $datasets_invoice = "";
    $datasets_receipts = "";

if (isset($_POST['btnGraph'])) {
    $days = $_POST['days']-1;
} else {                                                                           
    $days = 4;
}
        for($i=$days; $i>=0; $i--){
     $lables .= "'".date('M d',strtotime("-$i day"))."',";
     $invoice = $mysql->select("select sum(InvoiceAmount) as amt from _tbl_Accounts_Invoices where  MemberID='".$userData['MemberID']."' and date(TxnDate)=date('".date('Y-m-d',strtotime("-$i day"))."')");
     $receipt = $mysql->select("select sum(ReceiptAmount) as amt from _tbl_Accounts_Receipts where  MemberID='".$userData['MemberID']."' and date(TxnDate)=date('".date('Y-m-d',strtotime("-$i day"))."')");
     $datasets_invoice .= ((isset($invoice[0]['amt'])) ? $invoice[0]['amt'] : 0) .", ";
     $datasets_receipts .= ((isset($receipt[0]['amt'])) ? $receipt[0]['amt'] : 0) .", ";
}


$lables = substr($lables,0,strlen($lables)-1)."]";
$datasets_invoice = substr($datasets_invoice,0,strlen($datasets_invoice)-1);
$datasets_receipts = substr($datasets_receipts,0,strlen($datasets_receipts)-1);
    ?>
    <div class="dash_widget_title" style="font-size:18px">Receipts & Invoices</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
        
        <div style="text-align:right">
         <form action="" method="post">
    <select name="days">   
        <option value="5"  <?php echo ($_POST['days']==5) ? " selected='selected' ": "";?> >Last 5 days</option>
        <option value="10"  <?php echo ($_POST['days']==10) ? " selected='selected' ": "";?> >Last 10 days</option>
        <option value="30" <?php echo ($_POST['days']==30) ? " selected='selected' ": "";?> >Last 30 days</option>
    </select>&nbsp;
    <input type="submit" value="Update" name="btnGraph" class="SubmitBtn" style="padding:3px 10px !important">
    </form>
        </div>
                  <div style="width:100%;">
        <canvas id="canvas"></canvas>
    </div>
     
   <!-- <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <button id="addData">Add Data</button>
    <button id="removeData">Remove Data</button>  -->
    <script>
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'line',
            data: {
                
                labels: <?php echo $lables;?>,
                datasets: [{
                    label: 'Invoices',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [<?php echo $datasets_invoice; ?>],
                    fill: false,
                }, {
                    label: 'Receipts',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        <?php echo $datasets_receipts;?>
                    ],
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: ''
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Transaction date'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Amount'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });

            });

            window.myLine.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[config.data.datasets.length % colorNames.length];
            var newColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + config.data.datasets.length,
                backgroundColor: newColor,
                borderColor: newColor,
                data: [],
                fill: false
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            config.data.datasets.push(newDataset);
            window.myLine.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (config.data.datasets.length > 0) {
                var month = MONTHS[config.data.labels.length % MONTHS.length];
                config.data.labels.push(month);

                config.data.datasets.forEach(function(dataset) {
                    dataset.data.push(randomScalingFactor());
                });

                window.myLine.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myLine.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            config.data.labels.splice(-1, 1); // remove the label first

            config.data.datasets.forEach(function(dataset) {
                dataset.data.pop();
            });

            window.myLine.update();
        });
    </script>
   
        </td>
        <td></td>
        <td colspan="3" class="dash_theme_gray" style="vertical-align:top">
        <div class="dash_widget_title" style="font-size:18px">Recently Joined Members</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
         
        <div style="">
        <br>
            <table style="width:100%">
             <?php 
                $recentMembes = $mysql->select("select * from _tbl_Members where  ReferedBy='".$userData['MemberID']."' order by MemberID Desc limit 0,5 ");
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
             ?>
             </table>
        </div>
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td style="width:2%">&nbsp;</td>
        <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">Send Emails</div>
            <div class="dash_widget_Count">
            <?php
                $emailCount  = $mysql->select("select MemberID from _tbl_Log_Emails  Where MemberID='".$userData['MemberID']."'");
                echo sizeof($emailCount);
            ?>
            </div>
            <br>
        </td>
        <td style="width:2%">&nbsp;</td>
        
        <td class="dash_theme_widget dash_theme_gray">
            <div class="dash_widget_title">Sent Mobile SMS</div>
            <div class="dash_widget_Count">
            <?php
                $smsCount  = $mysql->select("select MemberID from _tbl_Log_MobileSMS  Where MemberID='".$userData['MemberID']."'");
                echo sizeof($smsCount);
            ?>
            </div>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="11">&nbsp;</td>
    </tr>
    <tr>
         <td colspan="3" class="dash_theme_gray <?php echo ($userData['PlanUpgradedD']==0)? "goldenDeActive": "goldenActive";?>"  style="height:200px" valign="top">
        <div class="dash_widget_title" style="font-size:18px">G3 Members</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
        <?php if ($userData['PlanUpgradedD']==0) { ?>
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
        <td></td>
         <td colspan="3" class="dash_theme_gray  <?php echo ($userData['PlanUpgradedA']==0)? "goldenDeActive": "goldenActive";?>" style="height:200px"   valign="top">
        <div class="dash_widget_title" style="font-size:18px">Goodway Members</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
         <?php if ($userData['PlanUpgradedA']==0) { ?>
        <div style="text-align:center;padding:6px">Not Activated.</div>
        <?php } else { ?>
        <div>
        <br>
            <table style="width:100%">
           
             <?php 
                $recentMembes = $mysql->select("select * from _tbl_Members where PlanID='1' and ReferedBy='".$userData['MemberID']."'  order by MemberID Desc limit 0,5 ");
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
             ?>
             </table>
        </div>
        <?php } ?>
        </td>
        <td></td>
        <td colspan="3" class="dash_theme_gray" valign="top">
        <div class="dash_widget_title" style="font-size:18px">Recent Doc Verification Req</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
          
        </td>
    </tr>
    <tr>
        <td colspan="11">&nbsp;</td>
    </tr>
    <tr>
         <td colspan="3" class="dash_theme_gray  <?php echo ($userData['PlanUpgradedB']==0)? "goldenDeActive": "goldenActive";?>" style="height:200px" valign="top">
        <div class="dash_widget_title" style="font-size:18px">My Gold Members</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
         <?php if ($userData['PlanUpgradedB']==0) { ?>
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
        <td></td>
         <td colspan="3" class="dash_theme_gray  <?php echo ($userData['PlanUpgradedC']==0)? "goldenDeActive": "goldenActive";?>" style="height:200px" valign="top">
        <div class="dash_widget_title" style="font-size:18px">Super Gold Members</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
         <?php if ($userData['PlanUpgradedC']==0) { ?>
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
        <td></td>
        <td colspan="3" class="dash_theme_gray" valign="top">
        <div class="dash_widget_title" style="font-size:18px">Recent Wallet Refill Req.</div>
        <hr style="border:none;border-bottom:1px solid #f1f1f1">
        <div>
        <br>
            <table style="width:100%">
           
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
                    <tr>
                        <td colspan="2"><hr style="border:none;border-bottom:1px solid #f1f1f1"></td>
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
         
       
        </td>
    </tr>
</table>
 <br><BR><br>