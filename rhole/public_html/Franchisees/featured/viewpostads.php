<?php include_once("../../config.php"); ?>
 <style>
.mytr:hover{background:#f6f6f6;cursor:pointer}
</style>
<script src="./../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css">
<body style="margin:0px;">
<div class="titleBar">List of PostAds</div> 
<?php 

//print_r($_SESSION);
     $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
             
    echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:arial;color:#222;width:100%'>";
   
    foreach (JPostads::getPostads(0," order by postadid desc limit 0,50") as $r)
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
                    <form action='managepostads.php' method='post' style='height:0px;'>
                        <input type='hidden' value='<?php echo $r["postadid"];?>' name='rowid' id='rowid' >
                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                        <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                        <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                    </form>
                 </td>
          </tr>
          <tr>
            <td colspan='3'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
          </tr>
          <?php       
          }
     echo"</table>"     
?>
</body>