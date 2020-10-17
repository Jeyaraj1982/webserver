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
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>List of Franchisees</div>
<?php 
    include_once("../../config.php");
?>
    <table cellspacing='0' cellspadding='3' style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';">
        <tr>
            <td class="mytdhead" style="width:50px;">Franchisee ID</td>
            <td class="mytdhead" style="width:50px;">Franchisee Name</td>
            <td class="mytdhead" style="width:40px;">Email ID</td>
            <td class="mytdhead" style="width:110px;">Created On</td>
            <td class="mytdhead">&nbsp;</td>
        </tr> <?php
        foreach(JFranchiseetable::getFranchisee() as $r){                                                   
   ?> 
         <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
               <td class="mytd"><?php echo $r["userid"];?></td>
               <td class="mytd"><?php echo $r["FranchiseeName"];?></td>
               <td class="mytd"><?php echo $r["EmailID"];?></td> 
               <td class="mytd"><?php echo $r["CreatedOn"];?></td>
               <td class="mytd"><a href="edit.php?frid=<?php echo $r["userid"];?>">Edit</a>&nbsp;&nbsp;
               <a href="view.php?frid=<?php echo $r["userid"];?>">View</a></td>
         </tr>
         <?php                                                 
         }
     echo"</table>"
   ?>
    
</body>
