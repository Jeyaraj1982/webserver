<?php $news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'"); ?>
<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Edit Slider</span>
    </div>
    <Br>
    <?php
    if (isset($_POST['CreateNewsBtn'])) {
         
         $mysql->execute("update _tbl_Web_Sliders set IsPublish='".$_POST['IsPublish']."' where ID='".$_GET['ID']."' ");
         
        echo "Slider information udpated successfully.";
        }
       $sliderInfo = $mysql->select("select * from _tbl_Web_Sliders where ID='".$_GET['ID']."'");
 
        if ($sliderInfo[0]['PublishArea']=="Index")  {
                 $target_dir = "../images/main-slider/";
            }
            
            if ($sliderInfo[0]['PublishArea']=="Health")  {
                 $target_dir = "../images/main-slider/";
            } 
            
            if ($sliderInfo[0]['PublishArea']=="Wealth")  {
                 $target_dir = "../images/wealth/";
            }
            
            if ($sliderInfo[0]['PublishArea']=="Entertainment")  {
                 $target_dir = "../images/entertainment/slider/";
            }
?>
<?php $news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'"); ?>
    <form action="" method="post" enctype="multipart/form-data">
    <table cellspacing="0" cellpadding="6" style="width:100%">
        <tr>
            <td colspan="2">
                <img src="<?php echo $target_dir.$sliderInfo[0]['SliderFileName'];?>" style="height:120px">
            </td>
        </tr>
        <tr>
            <td style="width:150px;padding-bottom:0px;padding-top:0px">Slider Area</td>
            <td style="padding-bottom:0px;padding-top:0px;padding-left:3px">
                <select name="PublishArea" disabled='disabled'>
                    <option value="Index" <?php echo ($sliderInfo[0]['PublishArea']=="Index") ? " selected='Selected'" : "";?>>Index</option>
                    <option value="Health" <?php echo ($sliderInfo[0]['PublishArea']=="Health") ? " selected='Selected'" : "";?>>Health</option>
                    <option value="Wealth" <?php echo ($sliderInfo[0]['PublishArea']=="Wealth") ? " selected='Selected'" : "";?>>Wealth</option>
                    <option value="Entertainment" <?php echo ($sliderInfo[0]['PublishArea']=="Entertainment") ? " selected='Selected'" : "";?>>Entertainment</option>
                </select>
            </td>
        </tr>
         
         <tr>
            <td style="padding-bottom:0px;padding-top:0px;">Publish Status</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <select name="IsPublish">
                    <option value="1" <?php echo ($sliderInfo[0]['IsPublish']=="1") ? " selected='Selected'" : "";?> >Published</option>
                    <option value="0" <?php echo ($sliderInfo[0]['IsPublish']=="0") ? " selected='Selected'" : "";?> >Un Publish</option>
                </select>
            </td>
        </tr>
          
       
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="SubmitBtn" name="CreateNewsBtn" value="Update Slider Information">
                &nbsp;&nbsp;<a href="dashboard.php?action=ManageSliders">List of Sliders</a>
                </td>
        </tr>
    </table>
    </form>
</div>