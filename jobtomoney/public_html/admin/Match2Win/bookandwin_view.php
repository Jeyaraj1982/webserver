
<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
        <div class="box">
            <?php include_once("rightmenu.php"); ?>
        </div>
    </div>
    <div class="s-12 m-6 l-9 margin-bottom">
        <div class="box">
            <h5 style="text-align: left;font-family: arial;">  Time Based Auction Information</h5> 
        <script>
                function cd(endDate,divId) {
                    var timeevent = new Date(endDate);
                    var now = new Date();
                    var timeDiff = timeevent.getTime() - now.getTime();
                    if (timeDiff <= 0) {
                        clearTimout(timer);
                        document.write("Template Countdown finished");
                    }
                    
                    var seconds = Math.floor(timeDiff / 1000);
                    var minutes = Math.floor(seconds / 60);
                    var hours = Math.floor(minutes / 60);
                    var days = Math.floor(hours /24);
                    var dd = ""; var hh = ""; var mm = ""; var ss = "";
                    hours %=24; minutes %= 60; seconds %=60;
                    if (seconds == 1) { ss = "Sec"; } else ss = "Secs";
                    if (minutes == 1) { mm = "Min"; } else mm = "Mins";
                    if (hours == 1)   { hh = "Hr"; } else hh = "Hrs";
                    if (days == 1) { dd = "Day"; } else dd = "Days";    
                    document.getElementById("daysBox_"+divId).innerHTML = days;
                    document.getElementById("hoursBox_"+divId).innerHTML = hours;
                    document.getElementById("minsBox_"+divId).innerHTML = minutes;
                    document.getElementById("secsBox_"+divId).innerHTML = seconds;
                    document.getElementById("ddBox_"+divId).innerHTML = dd;
                    document.getElementById("hhBox_"+divId).innerHTML = hh;
                    document.getElementById("mmBox_"+divId).innerHTML = mm;
                    document.getElementById("ssBox_"+divId).innerHTML = ss;
                    var timer = setTimeout("cd('"+endDate+"','"+ divId +"')",1000);
                }

        </script>
        <script src="../js/jquery.min.js"></script>
        <style>
            .timecaption {font-family:arial;font-size:10px;}
            .timeresult {font-family:arial;font-size:16px;font-weight:bold;}  
            #cBox {text-align:center;background:#45D4FF;border-radius:5px;padding:2px;width:27px;font-family:arial;font-size:12px;text-align:center;color:#ffffff;border:1px solid #37C9F2}      
            .fadein { position:relative;}
            .lmenu {text-decoration: none;color:#214689;}
            .lmenu:hover {text-decoration: underline;color:#214689;font-weight:bold}
            .fadein img { left:7; top:0; }    
            div {font-family:arial;font-size:12px;}     
            .sub_Menu {cursor:pointer;float:left;color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;text-align:left;border-right:1px dotted #cccccc;padding-left:20px;padding-right: 20px;}
        </style>
                                                                             
<?php
$_REQUEST['item'] = $_GET['item'];
    $item =  $mysql->select("select * from _items where md5(itemid)='".$_REQUEST['item']."'");
    $item = $item[0];
    
    $bidusers = $mysql->select("select * from _bids as b, _usertable as u where b.userid=u.userid and b.productid='".$item['itemid']."'"); 
?>
    <div class="row">
        <div class="col-sm-6" >
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding-left:5px">
                        <div style="color:#666666;font-family: arial;font-size:18px;">
                            <?php echo $item['itemname'];?> - <?php echo number_format($item['price'],2);?>/-
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="assets/products/<?php echo $item['productimage']; ?>" style="width:80%;margin:0px auto">
                    </td>
                </tr>
                
            <tr>
                <td style="background:#f1f1f1;padding:5px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">
                    Secret Key: <?php echo $item['skey'];?>
                </td>
            </tr>
            <tr>
                <td>
                 
                    
                    Total Sold Bid  : <?php echo sizeof($bidusers); ?> / <?php echo $item['maximumbids'];?><br>
                    Total Sold Value : <?php echo number_format(sizeof($bidusers)*$item['bidamount'],2); ?>
                
                
                <?php
                
                   // $bidusers = $mysql->select("select * from _bids as b where b.productid='".$item['productid']."'   ");
                   $percentage =  (sizeof($bidusers)/$item['maximumbids'])*100;
                   if ($percentage<100) {
                       
                        $percentage = number_format(100-$percentage,2);
                       
                   } else {
                       echo "Closed";
                       $percentage = 100;
                        echo "Winner :".$dealmaass->getWinnerM2W($item['itemid']);
                   }
                   ?>
                </td>
            </tr>    
        </table>
        <script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $i;?>');</script>
        <br><br>
    </div>

    <div class="col-sm-6">
        <h5>Secret Key Wise</h5>
        <table cellpadding="5" cellspacing="2" border="1">
            <tr>
                <td style="padding:2px;font-size:12px;font-weight:bold;">Bid Rate</td>
                <td style="padding:2px;font-size:12px;font-weight:bold">Count</td>
            </tr>
            <?php
                //$bid = $dealmaass->getLowestBidRate($item['itemid']);
                foreach($mysql->select("select count(*) as c, bidrate from  _bids where productid='".$item['itemid']."' group by bidrate") as $d) {
            ?>
            <tr style="<?php echo ($item['skey']==$d['bidrate']) ? 'background:lime' : '';?>">
                <td style="padding:2px;font-size:12px;"><?php echo  $d['bidrate'];?></td>
                <td style="padding:2px;font-size:12px;"><?php echo  $d['c'];?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

 <div class="row" >
        <div class="col-sm-6">

 <h5>Bid History</h5>
 <table cellpadding="5" cellspacing="0" border="1">
    <tr>
        <td style="padding:2px;font-size:12px;font-weight:bold">Date Time</td>
        <td style="padding:2px;font-size:12px;font-weight:bold;">User Name</td>
        <td style="padding:2px;font-size:12px;font-weight:bold;">User Key</td>
        <td style="padding:2px;font-size:12px;font-weight:bold;">Status</td>
    </tr>
    <?php
        $bidusers = $mysql->select("select * from _bids as b, _usertable as u where b.userid=u.userid and md5(b.productid)='".$_GET['item']."'   ");
        $bid = $dealmaass->getLowestBidRate($bidusers[0]['productid']);
        
        foreach($bidusers as $b) {
            ?>
             <tr style="<?php echo ($item['skey']==$b['bidrate']) ? 'background:lime' : '';?>">
                <td style="padding:2px;font-size:12px;"><?php echo $b['bidon'];?></td>
                <td style="padding:2px;font-size:12px;"><?php echo $b['personname'];?></td>
                <td style="padding:2px;font-size:12px;"><?php echo $b['bidrate'];?></td>
                <td style="padding:2px;font-size:12px;"><?php echo ($item['skey']==$b['bidrate']) ? 'Matched' : 'Not Match';?></td>
                
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
