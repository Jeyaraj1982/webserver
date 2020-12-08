<?php include_once("../../config.php"); ?>
  <style>
 .mytd {border:1px solid #f1f1f1;padding:3px;color:#444}
 .mytd form{height:0px;}
 .mytdhead{font-weight:bold;text-align:center;color:#222;background:#ccc;padding:5px;font-size:12px;}
 .trodd{background:#fff;}
 .treven{background:#f6f6f6}
 .trodd:hover{background:#e9e9e9;cursor:pointer}
 .treven:hover{background:#e9e9e9;cursor:pointer}
</style>

 <body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>List of User</div>

    <table cellspacing='0' cellspadding='3' style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';">
        <tr>
            <td class="mytdhead" style="width:110px;">Created On</td>
            <td class="mytdhead">Person Name</td>
            <td class="mytdhead">Email ID</td>
            <td class="mytdhead">Mobile Number</td>
            <td class="mytdhead">Country</td>
            <td class="mytdhead">State</td>
            <td class="mytdhead">District</td>
            <td class="mytdhead">&nbsp;</td>
        </tr> <?php
        $data = $mysql->select("select * from _jusertable where districtid='".$_SESSION['USER']['DistrictID']."' order by userid desc"); 
        foreach($data as $r){                                                   
   ?> 
         <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
               <td class="mytd"><?php echo $r["createdon"];?></td>
               <td class="mytd"><?php echo $r["personname"];?></td>
               <td class="mytd"><?php echo $r["email"];?></td>
               <td class="mytd"><?php if($r['countryid']==1){ echo "+91-"; } ?><?php echo $r["mobile"];?></td>
               <td class="mytd"><?php echo $r["countryname"];?></td>
               <td class="mytd"><?php echo $r["statename"];?></td>
               <td class="mytd"><?php echo $r["districtname"];?></td>
         </tr>
         <?php
         }
     echo"</table>"
   ?>
    <?php for($i=1;$i<=intval($rows/$rsperpage);$i++) {?>
        <a href="todaypostads.php?view=<?php echo $i;?>"><?php echo $i;?></a>
    <?php } ?>

</body>
