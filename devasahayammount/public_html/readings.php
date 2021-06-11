<?php error_reporting(0);
include_once("config.php");
include_once("includes/header.php");


?>
  <div class="jTitle" style="margin-left:2px;">Readings</div> 
                    <?php 
                    $date =  (isset($_REQUEST['r'])) ? $_REQUEST['r'] : date("Y-m-d");
                    $reading = $mysql->select("select * from _jreading where date(`date`)=date('".$date."')");
                    $i = 0;
                    ?>
                    


                    <div style='text-align:center;color:red;font-weight:bold;font-size:15px;font-family:"Droid Sans";margin:20px;'>
                        <table align="center" width="540" cellspacing="0" cellpadding="5">
                            <tr>
                            <td style="text-align:right"><a style="font-size:14px" class='qLink' href="readings.php?l=<?php echo isset($_REQUEST['l']) ? $_REQUEST['l'] : 'e'; ?>&r=<?php echo date('Y-m-d', strtotime('-1 day', strtotime($date))) ?>" class="prev_day" title="Previous Day" ><img src="assets/left.png" style="border:0px;outline: none;height:50px;vertical-align:middle;margin-top:-5px;">&nbsp;<?php echo date('Y-m-d', strtotime('-1 day', strtotime($date))) ?></a> </td>
                            <td style="text-align:center;color:red;font-weight:bold;font-size:15px;font-family:'Droid Sans';"><?php echo $reading['0']['date'];?> </td>
                            <td style="text-align:left;"><a style="font-size:14px" class='qLink' href="readings.php?l=<?php echo isset($_REQUEST['l']) ? $_REQUEST['l'] : 'e'; ?>&r=<?php echo date('Y-m-d', strtotime('+1 day', strtotime($date))) ?>" class="next_day" title="Next Day" ><?php echo date('Y-m-d', strtotime('+1 day', strtotime($date))) ?>&nbsp;<img src="assets/right.png" style="border:0px;outline: none;height:50px;vertical-align:middle;margin-top:-5px;"></a></td>
                                </tr>
                        </table>
                                         
                    </div>
                    <div style="text-align:right;margin:20px;font-weight:bold;">
                    
                                                    <?php
                            if (isset($_REQUEST['l'])) {
                                if ($_REQUEST['l']=='e') {
                                    ?>
                                    <a  class='qLink' style="font-size:15px;color:green" href="readings.php?l=t&r=<?php echo $reading['0']['date']; ?>" class="prev_day">For Tamil</a>
                                    <?php
                                } else if ($_REQUEST['l']=='t') {
                                    ?>
                                    <a  class='qLink' style="font-size:15px;color:green" href="readings.php?l=e&r=<?php echo $reading['0']['date']; ?>" class="prev_day">For English</a>
                                    <?php
                                } else {
                                    ?>
                                    <a  class='qLink' style="font-size:15px;color:green" href="readings.php?l=t&r=<?php echo $reading['0']['date']; ?>" class="prev_day">For Tamil</a>
                                    <?php
                                }
                            } else {
                                ?>
                                <a  class='qLink' style="font-size:15px;color:green" href="readings.php?l=t&r=<?php echo $reading['0']['date']; ?>" class="prev_day">For Tamil</a>
                                <?php
                            }
                        ?>
                    </div>    
                    
                    <?php
                    foreach($reading as $r) {
                        
                                               if (isset($_REQUEST['l'])) {
                                if ($_REQUEST['l']=='e') {
                                    $title =  $r['title'];
                                    $details = $r['details'];
                                } else if ($_REQUEST['l']=='t') {
                                    $title =  $r['title_t'];
                                    $details = $r['details_t'];
                                } else {
                                    $title =  $r['title'];
                                    $details = $r['details'];
                                }
                            } else {
                                $title =  $r['title'];
                                $details = $r['details'];
                            }
                        
                        
                    if ($i>0)  {
                        echo '<hr style="width:80%;border:none;border-top:1px solid #cccccc">'    ;
                    } $i++;
                     ?>
                    
                    <div class="jContent_title"><?php echo $title;?></div>
                    <div style="margin:10px;font-size:13px;font-family:'Droid Sans';text-align:justify;"><?php echo preg_replace('/<a[^>]+>([^<]+)<\/a>/i','\1',$details); ?></div>
                    
                    <?php }
                    ?> 
                    
                    
<?php
include_once("includes/footer.php");
?>
