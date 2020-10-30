<?php include_once(__DIR__."/../header.php"); ?>
<style>
.mytr:hover{background:#f6f6f6;cursor:pointer}
</style>
 
 

<div class="title_Bar">List of Pages</div> 

<?php error_reporting(0);
//include_once("../../config.php");

     $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
 
     
    echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:arial;color:#222;width:100%'>";
   
    foreach (JPages::getPages(0,"pageid>0 order by pageid desc") as $r)
    {           
          ?>
            <tr class='mytr'>
            <td style='padding:5px'>
                <b><?php echo $r["pagetitle"]?></b>:
                <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["pagedescription"]),0,300));?>... </span>
                 <div style="padding:3px;padding-left:0px;">
                Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp;
                Last Modified: <span style="color:#444;font-weight:bold;"><?php echo $r["lastmodified"];?></span>&nbsp;&nbsp;
                No.of VisitedPage: <span style="color:#444;font-weight:bold;"><?php echo $r["noofvisit"];?></span>&nbsp;&nbsp; 
                Status: 
                <?php if ($r["ispublish"]) {?>
                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                <?php } ?>
                </div>
            </td>
            <td width='160' style='text-align:center;'>
                <form action='viewpage.php' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $r["pageid"];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                    <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                </form>
            </td>
          </tr>
          <tr>
            <td colspan='2'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
          </tr>
          
          <?php      
    }
     echo"</table>"
 ?>
</body>