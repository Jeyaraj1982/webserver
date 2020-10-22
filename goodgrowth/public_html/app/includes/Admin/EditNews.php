<?php $news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'"); ?>
<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Edit News</span>
    </div>
    <Br>
    <?php
     function validateForm(&$ErrorString) {
            
           
            if (strlen(trim($_POST['NewsTitle']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Title");  
                return false;
            }
            
            if (strlen(trim($_POST['NewsDetails']))<2) {
                $ErrorString = ErrorMsg("Please enter details");  
                return false;
            }
            
             
             
            return true;
        }
        
        if (isset($_POST['CreateNewsBtn'])) {
            
            $res = validateForm($ErrorString);
            if ($res) {
           
              $mysql->execute("update _tbl_News set NewsTitle='".$_POST['NewsTitle']."', NewsDetails='".$_POST['NewsDetails']."', IsPublish='".$_POST['IsPublish']."' where NewsID='".$_GET['ID']."'");
              echo SuccessMsg("Updated successfully"); 
              unset($_POST);
            } else {
                echo $ErrorString;
            }   
        }
?>
<?php $news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'"); ?>
    <form action="" method="post">
    <table cellspacing="0" cellpadding="6" style="width:100%">
        <tr>
            <td style="width:150px;padding-bottom:0px;padding-top:0px">News Title</td>
            <td style="padding-bottom:0px;padding-top:0px;padding-left:3px">
                <input style="width:600px;" type="text" name="NewsTitle" placeholder="News Tile" value="<?php echo isset($_POST['NewsTitle']) ? $_POST['NewsTitle'] : $news[0]['NewsTitle'];?>">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px;vertical-align:top">Details</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <textarea  name="NewsDetails" style="width:600px;height:200px;"><?php echo isset($_POST['NewsDetails']) ? $_POST['NewsDetails'] : $news[0]['NewsDetails'];?></textarea>
            </td>
        </tr>
             <tr>
            <td style="padding-bottom:0px;padding-top:0px;">Publish Status</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <select name="IsPublish">
                    <option value="1" <?php echo $news[0]['IsPublish']==1 ? " selected='selected' " : ""; ?> >Published</option>
                    <option value="0" <?php echo $news[0]['IsPublish']==0 ? " selected='selected' " : ""; ?>  >Un Publish</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="SubmitBtn" name="CreateNewsBtn" value="Update News"></td>
        </tr>
    </table>
    </form>
</div>