  <style>
 .mytd {border:1px solid #f1f1f1;padding:3px;color:#444}
 .mytd form{height:0px;}
 .mytdhead{font-weight:bold;text-align:center;color:#222;background:#ccc;padding:5px;font-size:12px;}
 .trodd{background:#fff;}
 .treven{background:#f6f6f6}
 .trodd:hover{background:#e9e9e9;cursor:pointer}
 .treven:hover{background:#e9e9e9;cursor:pointer}
</style>
<script src="./../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css">
 <body style="margin:0px;">
 <div class="titleBar">View Subscriber</div>
<?php 
    include_once("../../config.php");
?>
    <table cellspacing='0' cellspadding='5' style="width:100%;font-size:12px;font-family:'Trebuchet MS';">
        <tr>
            <td class="mytdhead" style="width:200px">Subscriber Name</td>
            <td class="mytdhead" style="width:180px">Subscriber Mobile Number</td>
            <td class="mytdhead" style="width:210px">Subscriber Email Address</td>
            <td class="mytdhead" style="width:180px">Others</td>
            <td class="mytdhead" style="width:110px">Posted On</td>
            <td class="mytdhead">&nbsp;</td>
        </tr>  <?php
        foreach(JSubscriber::getSubscriber() as $r)
        {                                                   
        ?>
         <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
               <td class="mytd"><?php echo $r["subscribname"];?></td> 
               <td class="mytd"><?php echo $r["subscribmob"];?></td>
               <td class="mytd"><?php echo $r["subscribemail"];?></td>
               <td class="mytd"><?php echo $r["others"];?></td>  
               <td class="mytd"><?php echo $r["postedon"];?></td>
               <td class="mytd"><form action='managesubscriber.php' method='post'>
                <input type='hidden' value='<?php echo $r["subscribid"]?>' name='rowid' id='rowid'>
                <input style='font-size:11px;' type='submit' name='viewbtn' value='View'> 
                <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'></form>
               </td>
         </tr>
         <?php
        }
     echo"</table>"                
?>
</body>
