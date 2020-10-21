<h2>List All Banners</h2>

<div style="margin:20px;">
       <?php
           if (isset($_REQUEST['unpid'])) {
               $mysql->execute("update _tblbanner set ispublish='0' where md5(concat(bannerid,bannerid))='".$_REQUEST['unpid']."'");
                echo successMessage("Successfully Unpublished");
           }
           
           if (isset($_REQUEST['pid'])) {
               $mysql->execute("update _tblbanner set ispublish='1' where md5(concat(bannerid,bannerid))='".$_REQUEST['pid']."'");
                echo successMessage("Successfully published");
           } 
           if (isset($_REQUEST['did'])) {
               $mysql->execute("delete from  _tblbanner   where md5(concat(bannerid,bannerid))='".$_REQUEST['did']."'");
                echo successMessage("Successfully Deleted");
           }
           
           if (isset($_POST['updateorder'])) {
               $mysql->execute("update _tblbanner set displayorder='".$_POST['displayorder']."' where md5(concat(bannerid,bannerid))='".$_POST['displaybanner']."'");
                echo successMessage("Successfully order updated");
           }
       ?>
<table style="width:100%;" cellpadding="3" cellspacing="0">
    <tr style="background:#f1f1f1;">
        <td style="width:10px;"></td>
        <td style="border:1px solid #ccc;border-left:none;width:100px;text-align:center;font-weight:bold;">&nbsp;</td>
    </tr>
</table>
<div style="height:500px;overflow:auto">   
<table style="width:98%;" cellpadding="3" cellspacing="0">
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
<?php
    $lists = $mysql->select("select * from _tblbanner order by ispublish desc ,displayorder"); //maincategoryid
    foreach($lists as $l) {
?>

    <tr style="background:<?php echo ($l['ispublish']==1) ? '#F1FCEF' : '#FFF2F2';?>">
       <td width="10" style="vertical-align:top"><img src="images/<?php echo ($l['ispublish']==1) ? 'icon-publish.gif' : 'icon-unpublish.png';?>"></td>
       <td style="color:#444"><img src="../banner/<?php echo $l['bannerpath'];?>" width="400"></td>
       <td>
       <form action="dashboard.php?to=list_banners" method="post">
       
      
        <input type="hidden" value="<?php echo md5($l['bannerid'].$l['bannerid']);?>" name="displaybanner">
        <input type="Text" autocomplete="off" maxlength="3" size="5" value="<?php echo $l['displayorder'];?>" name="displayorder">
        <input type="submit" value="Update Order" name="updateorder"  class="submitBtn">
         </form>
       </td>
       <td width="180" style="text-align: right;color:#444">
       <?php if ($l['ispublish']) {?>
            <a class="delete" href="dashboard.php?to=list_banners&unpid=<?php echo md5($l['bannerid'].$l['bannerid']);?>">Un Publish</a>&nbsp;
       <?php } else { ?> 
            <a class="delete" href="dashboard.php?to=list_banners&pid=<?php echo md5($l['bannerid'].$l['bannerid']);?>">Publish</a>&nbsp;
            
       <?php } ?>
       <a class="delete" href="dashboard.php?to=list_banners&did=<?php echo md5($l['bannerid'].$l['bannerid']);?>">Delte</a>&nbsp;
        &nbsp;</td>
    </tr>
<?php } ?> 
</table>
</div> 
</div>               