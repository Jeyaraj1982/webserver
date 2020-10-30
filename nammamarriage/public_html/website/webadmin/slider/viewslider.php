<?php include_once(__DIR__."/../header.php"); ?>
 <style>
.mytr:hover{background:#f6f6f6;cursor:pointer}
</style>

<body style="margin:0px;">
<div class="titleBar">List of Sliders</div>
<?php 
 

     $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
 
     
    echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:Trebuchet MS;color:#222;width:100%'>";
   
    foreach (JSlider::getSliders() as $r)
    {           
          ?>
            <tr class='mytr'>
                <td style='padding:5px;width:70px'>
                    <img src="<?php echo BaseUrl;?><?php echo $config['slider'].$r["filepath"];?>"  style="height:70px;"></img>
                </td>
                <td style="vertical-align: top;padding:10px;">
                    <b><?php echo $r["slidertitle"]?></b> 
                    <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["sliderdescription"]),0,300));?>... </span> 
                    <div>
                        Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp; 
                        Status: <?php echo ($r["ispublished"])  ? "<span style='color:#08912A;font-weight:bold;'>Published</span>" : "<span style='color:#FF090D;font-weight:bold;'>Un Published</span>"; ?>
                    </div>
            </td>
            <td width='160' style='text-align:center;'>
                <form action='manageslider.php' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $r["sliderid"];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                    <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                </form>
            </td>
          </tr>
          <tr>
            <td colspan='4'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
          </tr>
          <?php      
    }
     echo"</table>"
 ?>
</body>
