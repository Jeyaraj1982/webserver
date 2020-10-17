<?php include_once("../../config.php"); ?>
 <style>
 .mytr:hover{background:#f6f6f6;cursor:pointer}
</style>
<script src="./../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css">
<body style="margin:0px;">
<div class="titleBar">List of PostAds</div> 
<?php
$fromdate=date("Y-m-d");
if (isset($_POST['fd'])) {
  $fromdate=$_POST['fy']."-".$_POST['fm']."-".$_POST['fd'];  
}

$todate=date("Y-m-d");
if (isset($_POST['td'])) {
  $todate=$_POST['ty']."-".$_POST['tm']."-".$_POST['td'];  
}
 
      if ($_SESSION['USER']['DistrictID']>0) {
        $sql = " where distcid='".$_SESSION['USER']['DistrictID']."' and (date(postedon)>=date('".$fromdate."') and date(postedon)<=date('".$todate."') )  order by postadid desc ";        
      } 
  
   
  // print_r($_SESSION);
     //   print_r($_SESSION);            
   //$totalads =        JPostads::getPostads(0,$sql)
   $totalads =   $mysql->select("select * from _jpostads where distcid='".$_SESSION['USER']['DistrictID']."'");
               
      ?>
<form action="" method="post">
    <table>
        <tr>
            <td>From</td>
            <td>
                <select name="fd">
                    <option value="1" <?php echo (date("d",strtotime($fromdate))==1) ? " selected = 'selected' " : "";?> >1</option>
                    <option value="2" <?php echo (date("d",strtotime($fromdate))==2) ? " selected = 'selected' " : "";?>>2</option>
                    <option value="3" <?php echo (date("d",strtotime($fromdate))==3) ? " selected = 'selected' " : "";?>>3</option>
                    <option value="4" <?php echo (date("d",strtotime($fromdate))==4) ? " selected = 'selected' " : "";?>>4</option>
                    <option value="5" <?php echo (date("d",strtotime($fromdate))==5) ? " selected = 'selected' " : "";?>>5</option>
                    <option value="6" <?php echo (date("d",strtotime($fromdate))==6) ? " selected = 'selected' " : "";?>>6</option>
                    <option value="7" <?php echo (date("d",strtotime($fromdate))==7) ? " selected = 'selected' " : "";?>>7</option>
                    <option value="8" <?php echo (date("d",strtotime($fromdate))==8) ? " selected = 'selected' " : "";?>>8</option>
                    <option value="9" <?php echo (date("d",strtotime($fromdate))==9) ? " selected = 'selected' " : "";?>>9</option>
                    <option value="10" <?php echo (date("d",strtotime($fromdate))==10) ? " selected = 'selected' " : "";?>>10</option>
                    <option value="11" <?php echo (date("d",strtotime($fromdate))==11) ? " selected = 'selected' " : "";?>>11</option>
                    <option value="12" <?php echo (date("d",strtotime($fromdate))==12) ? " selected = 'selected' " : "";?>>12</option>
                    <option value="13" <?php echo (date("d",strtotime($fromdate))==13) ? " selected = 'selected' " : "";?>>13</option>
                    <option value="14" <?php echo (date("d",strtotime($fromdate))==14) ? " selected = 'selected' " : "";?>>14</option>
                    <option value="15" <?php echo (date("d",strtotime($fromdate))==15) ? " selected = 'selected' " : "";?>>15</option>
                    <option value="16" <?php echo (date("d",strtotime($fromdate))==16) ? " selected = 'selected' " : "";?>>16</option>
                    <option value="17" <?php echo (date("d",strtotime($fromdate))==17) ? " selected = 'selected' " : "";?>>17</option>
                    <option value="18" <?php echo (date("d",strtotime($fromdate))==18) ? " selected = 'selected' " : "";?>>18</option>
                    <option value="19" <?php echo (date("d",strtotime($fromdate))==19) ? " selected = 'selected' " : "";?>>19</option>
                    <option value="20" <?php echo (date("d",strtotime($fromdate))==20) ? " selected = 'selected' " : "";?>>20</option>
                    <option value="21" <?php echo (date("d",strtotime($fromdate))==21) ? " selected = 'selected' " : "";?>>21</option>
                    <option value="22" <?php echo (date("d",strtotime($fromdate))==22) ? " selected = 'selected' " : "";?>>22</option>
                    <option value="23" <?php echo (date("d",strtotime($fromdate))==23) ? " selected = 'selected' " : "";?>>23</option>
                    <option value="24" <?php echo (date("d",strtotime($fromdate))==24) ? " selected = 'selected' " : "";?>>24</option>
                    <option value="25" <?php echo (date("d",strtotime($fromdate))==25) ? " selected = 'selected' " : "";?>>25</option>
                    <option value="26" <?php echo (date("d",strtotime($fromdate))==26) ? " selected = 'selected' " : "";?>>26</option>
                    <option value="27" <?php echo (date("d",strtotime($fromdate))==27) ? " selected = 'selected' " : "";?>>27</option>
                    <option value="28" <?php echo (date("d",strtotime($fromdate))==28) ? " selected = 'selected' " : "";?>>28</option>
                    <option value="29" <?php echo (date("d",strtotime($fromdate))==29) ? " selected = 'selected' " : "";?>>29</option>
                    <option value="30" <?php echo (date("d",strtotime($fromdate))==30) ? " selected = 'selected' " : "";?>>30</option>
                    <option value="31" <?php echo (date("d",strtotime($fromdate))==31) ? " selected = 'selected' " : "";?>>31</option>
            
                </select>
                <select name="fm">
                         <option value="1"  <?php echo (date("m",strtotime($fromdate))==1) ? " selected = 'selected' " : "";?> >JAN</option>
                         <option value="2"  <?php echo (date("m",strtotime($fromdate))==2) ? " selected = 'selected' " : "";?> >FEB</option>
                         <option value="3"  <?php echo (date("m",strtotime($fromdate))==3) ? " selected = 'selected' " : "";?> >MAR</option>
                         <option value="4"  <?php echo (date("m",strtotime($fromdate))==4) ? " selected = 'selected' " : "";?> >APR</option>
                         <option value="5"  <?php echo (date("m",strtotime($fromdate))==5) ? " selected = 'selected' " : "";?> >MAY</option>
                         <option value="6"  <?php echo (date("m",strtotime($fromdate))==6) ? " selected = 'selected' " : "";?> >JUN</option>
                         <option value="7"  <?php echo (date("m",strtotime($fromdate))==7) ? " selected = 'selected' " : "";?> >JLY</option>
                         <option value="8"  <?php echo (date("m",strtotime($fromdate))==8) ? " selected = 'selected' " : "";?> >AUG</option>
                         <option value="9"  <?php echo (date("m",strtotime($fromdate))==9) ? " selected = 'selected' " : "";?> >SEP</option>
                         <option value="10" <?php echo (date("m",strtotime($fromdate))==10) ? " selected = 'selected' " : "";?> >OCT</option>
                         <option value="11" <?php echo (date("m",strtotime($fromdate))==11) ? " selected = 'selected' " : "";?> >NOV</option>
                         <option value="12" <?php echo (date("m",strtotime($fromdate))==12) ? " selected = 'selected' " : "";?> >DEC</option>
                </select>
                                 <select name="fy">
                   <option value="2019"  <?php echo (date("Y",strtotime($fromdate))==2019) ? " selected = 'selected' " : "";?>>2019</option>
                   <option value="2020"  <?php echo (date("Y",strtotime($fromdate))==2020) ? " selected = 'selected' " : "";?>>2020</option>
                   
                </select>

            </td>
        </tr>
        <tr>
            <td>To</td>
            <td>
                <select name="td">
                    <option value="1" <?php echo (date("d",strtotime($todate))==1) ? " selected = 'selected' " : "";?>>1</option>
                    <option value="2" <?php echo (date("d",strtotime($todate))==2) ? " selected = 'selected' " : "";?>>2</option>
                    <option value="3" <?php echo (date("d",strtotime($todate))==3) ? " selected = 'selected' " : "";?>>3</option>
                    <option value="4" <?php echo (date("d",strtotime($todate))==4) ? " selected = 'selected' " : "";?>>4</option>
                    <option value="5" <?php echo (date("d",strtotime($todate))==5) ? " selected = 'selected' " : "";?>>5</option>
                    <option value="6" <?php echo (date("d",strtotime($todate))==6) ? " selected = 'selected' " : "";?>>6</option>
                    <option value="7" <?php echo (date("d",strtotime($todate))==7) ? " selected = 'selected' " : "";?>>7</option>
                    <option value="8" <?php echo (date("d",strtotime($todate))==8) ? " selected = 'selected' " : "";?>>8</option>
                    <option value="9" <?php echo (date("d",strtotime($todate))==9) ? " selected = 'selected' " : "";?>>9</option>
                    <option value="10" <?php echo (date("d",strtotime($todate))==10) ? " selected = 'selected' " : "";?>>10</option>
                    <option value="11" <?php echo (date("d",strtotime($todate))==11) ? " selected = 'selected' " : "";?>>11</option>
                    <option value="12" <?php echo (date("d",strtotime($todate))==12) ? " selected = 'selected' " : "";?>>12</option>
                    <option value="13" <?php echo (date("d",strtotime($todate))==13) ? " selected = 'selected' " : "";?>>13</option>
                    <option value="14" <?php echo (date("d",strtotime($todate))==14) ? " selected = 'selected' " : "";?>>14</option>
                    <option value="15" <?php echo (date("d",strtotime($todate))==15) ? " selected = 'selected' " : "";?>>15</option>
                    <option value="16" <?php echo (date("d",strtotime($todate))==16) ? " selected = 'selected' " : "";?>>16</option>
                    <option value="17" <?php echo (date("d",strtotime($todate))==17) ? " selected = 'selected' " : "";?>>17</option>
                    <option value="18" <?php echo (date("d",strtotime($todate))==18) ? " selected = 'selected' " : "";?>>18</option>
                    <option value="19" <?php echo (date("d",strtotime($todate))==19) ? " selected = 'selected' " : "";?>>19</option>
                    <option value="20" <?php echo (date("d",strtotime($todate))==20) ? " selected = 'selected' " : "";?>>20</option>
                    <option value="21" <?php echo (date("d",strtotime($todate))==21) ? " selected = 'selected' " : "";?>>21</option>
                    <option value="22" <?php echo (date("d",strtotime($todate))==22) ? " selected = 'selected' " : "";?>>22</option>
                    <option value="23" <?php echo (date("d",strtotime($todate))==23) ? " selected = 'selected' " : "";?>>23</option>
                    <option value="24" <?php echo (date("d",strtotime($todate))==24) ? " selected = 'selected' " : "";?>>24</option>
                    <option value="25" <?php echo (date("d",strtotime($todate))==25) ? " selected = 'selected' " : "";?>>25</option>
                    <option value="26" <?php echo (date("d",strtotime($todate))==26) ? " selected = 'selected' " : "";?>>26</option>
                    <option value="27" <?php echo (date("d",strtotime($todate))==27) ? " selected = 'selected' " : "";?>>27</option>
                    <option value="28" <?php echo (date("d",strtotime($todate))==28) ? " selected = 'selected' " : "";?>>28</option>
                    <option value="29" <?php echo (date("d",strtotime($todate))==29) ? " selected = 'selected' " : "";?>>29</option>
                    <option value="30" <?php echo (date("d",strtotime($todate))==30) ? " selected = 'selected' " : "";?>>30</option>
                    <option value="31" <?php echo (date("d",strtotime($todate))==31) ? " selected = 'selected' " : "";?>>31</option>
            
                </select>
                 <select name="tm">
                         <option value="1"  <?php echo (date("m",strtotime($todate))==1) ? " selected = 'selected' " : "";?> >JAN</option>
                         <option value="2"  <?php echo (date("m",strtotime($todate))==2) ? " selected = 'selected' " : "";?> >FEB</option>
                         <option value="3"  <?php echo (date("m",strtotime($todate))==3) ? " selected = 'selected' " : "";?> >MAR</option>
                         <option value="4"  <?php echo (date("m",strtotime($todate))==4) ? " selected = 'selected' " : "";?> >APR</option>
                         <option value="5"  <?php echo (date("m",strtotime($todate))==5) ? " selected = 'selected' " : "";?> >MAY</option>
                         <option value="6"  <?php echo (date("m",strtotime($todate))==6) ? " selected = 'selected' " : "";?> >JUN</option>
                         <option value="7"  <?php echo (date("m",strtotime($todate))==7) ? " selected = 'selected' " : "";?> >JLY</option>
                         <option value="8"  <?php echo (date("m",strtotime($todate))==8) ? " selected = 'selected' " : "";?> >AUG</option>
                         <option value="9"  <?php echo (date("m",strtotime($todate))==9) ? " selected = 'selected' " : "";?> >SEP</option>
                         <option value="10" <?php echo (date("m",strtotime($todate))==10) ? " selected = 'selected' " : "";?> >OCT</option>
                         <option value="11" <?php echo (date("m",strtotime($todate))==11) ? " selected = 'selected' " : "";?> >NOV</option>
                         <option value="12" <?php echo (date("m",strtotime($todate))==12) ? " selected = 'selected' " : "";?> >DEC</option>
                </select>
                 <select name="ty">
                   <option value="2019"  <?php echo (date("Y",strtotime($todate))==2019) ? " selected = 'selected' " : "";?>>2019</option>
                   <option value="2020"  <?php echo (date("Y",strtotime($todate))==2020) ? " selected = 'selected' " : "";?>>2020</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input class="btn btn-success btn-sm" type="submit" value="View Result"></td>
        </tr>
        <tr>
            <td>
                <?php
                    if (sizeof($totalads)>0) {
                        echo sizeof($totalads) . " ads found";
                    }
                ?>
            </td>
        </tr>
    </table>
</form>
<form action="" method="post"> 
   <input type="hidden" name="fd" value="<?php echo date("d",strtotime($fromdate));?>">
   <input type="hidden" name="fm" value="<?php echo date("m",strtotime($fromdate));?>">
   <input type="hidden" name="fy" value="<?php echo date("Y",strtotime($fromdate));?>">
   
      <input type="hidden" name="td" value="<?php echo date("d",strtotime($todate));?>">
   <input type="hidden" name="tm" value="<?php echo date("m",strtotime($todate));?>">
   <input type="hidden" name="ty" value="<?php echo date("Y",strtotime($todate));?>">
  
<?php 

//print_r($_SESSION);
     $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
    
    echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:arial;color:#222;width:100%'>";
   
  
   // foreach (JPostads::getPostads(0," order by postadid desc limit 0,50") as $r)
    foreach ($totalads as $r)
    {                                             
        ?>
             <tr class='mytr'>
              
                 <td style='padding:5px;width:70px'>
                    <img src="../../assets/<?php echo $config['thumb'].$r["filepath1"];?>"  style="height:70px;width:70px;"></img>
                 </td>
                 <td style="vertical-align: top;padding:10px;">
                    <b><?php echo $r["title"]?></b>:
                    <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["content"]),0,300));?>... </span>
                    <div style="padding:3px;padding-left:0px;">
                        Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp;
                        Status:                         
                        <?php if ($r["isactive"]) {?>
                            <span style='color:#08912A;font-weight:bold;'>Active</span> 
                        <?php } else { ?>
                            <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                        <?php } ?>
                    </div>
                 </td>
                 <td width='160' style='text-align:center;'>
                    
                    <a href="managepostads.php?rowid=<?php echo  $r["postadid"];?>&btn=viewbtn">View</a>
                   <!-- <a href="managepostads.php?rowid=<?php echo  $r["postadid"];?>&btn=deletebtn">Delete</a>
                    <form action='managepostads.php' method='post' style='height:0px;'>
                        <input type='hidden' value='<?php echo $r["postadid"];?>' name='rowid' id='rowid' >
                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                        <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                        <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                    </form>-->
                 </td>
          </tr>
          <tr>
            <td colspan='3'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
          </tr>
          <?php       
          }
     echo"</table>"     
?>
</form>
</body>