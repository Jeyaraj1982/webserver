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
<?php 
    include_once("../../config.php");
?>
    <table cellspacing='0' cellspadding='3' style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';">
        <tr>
            <td class="mytdhead" style="width:50px;">User ID</td>
            <td class="mytdhead" style="width:50px;">Person Name</td>
            <td class="mytdhead" style="width:40px;">Email Address</td>
            <td class="mytdhead" style="width:40px;">Mobile Number</td>
            <td class="mytdhead" style="width:40px;">Date of Birth</td>
            <td class="mytdhead" style="width:40px;">Password</td>
            <td class="mytdhead" style="width:110px;">Posted On</td>
            <td class="mytdhead">&nbsp;</td>
        </tr> <?php
        foreach(JUsertable::getUser() as $r){                                                   
   ?> 
         <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
               <td class="mytd"><?php echo $r["userid"];?></td>
               <td class="mytd"><?php echo $r["personname"];?></td>
               <td class="mytd"><?php echo $r["email"];?></td> 
               <td class="mytd"><?php echo $r["mobile"];?></td> 
               <td class="mytd"><?php echo $r["dob"];?></td> 
               <td class="mytd"><?php echo $r["pwd"];?></td> 
               <td class="mytd"><?php echo $r["createdon"];?></td>
         </tr>
         <?php
         }
     echo"</table>"
   ?>
    <?php for($i=1;$i<=intval($rows/$rsperpage);$i++) {?>
        <a href="todaypostads.php?view=<?php echo $i;?>"><?php echo $i;?></a>
    <?php } ?>

</body>
