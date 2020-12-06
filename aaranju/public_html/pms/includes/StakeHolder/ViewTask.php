
<?php
if ($_SESSION['User']['IsAdmin']==1) {
$issues = $mysql->select("select * from _tblPStakeHolderTask where   TaskID=".$_GET['Task']."  ");
} else {
 $issues = $mysql->select("select * from _tblPStakeHolderTask where TaskPostedBy='".$_SESSION['User']['UserID']."' and TaskID=".$_GET['Task']."  ");   
}
if (sizeof($issues)==0) {
    echo "Access denied";
} else {
?>
<style>
    .remove {font-size:12px;color:red;text-decoration: none;}
    .remove:hover {text-decoration: underline;}
</style>

<script>
    function Itemremove(itemid) {
    
        var retVal = confirm("Do you want to remove?");
        if( retVal == true ){
            location.href="https://fix.iuongo.com/dashboard.php?action=StakeHolder/ViewTask&Task=<?php echo $_GET['Task'];?>&i="+itemid;
            return true;
        }
        return false;
    }
</script>
<div style="width:1300px;margin:0px auto"> 
<?php
                                           
     if (isset($_POST['btnComplete'])) {
         $mysql->insert("_tblPStakeHolderTaskItems",array("TaskID"          => $_GET['Task'],
                                                         "CreatedOn"       => date("Y-m-d H:i:s"),
                                                         "Hrs"             => "0",
                                                         "Mins"            => "0",
                                                         "TaskDescription" => "Task Completed"));
     
        $mysql->execute("update _tblPStakeHolderTask set TaskStatus='3',CompletedOn='".date("Y-m-d H:i:s")."', LastUpdatedOn='".date("Y-m-d H:i:s")."' where TaskPostedBy='".$_SESSION['User']['UserID']."' and TaskID=".$_GET['Task']);  
        echo "<div style='padding:5px;background:#e1ffd1;color:#50bf15;font-weight:bold;padding-left:15px;margin-bottom:10px;'>task completed successfully</div>";
        
    }
    
    if (isset($_GET['i'])) {
       $delItem = $mysql->select("select * from _tblPStakeHolderTaskItems where IsActive=1 and TaskID=".$_GET['Task']." and TaskItemID=".$_GET['i']); 
       if (sizeof($delItem)>0) {
          $mysql->execute("update _tblPStakeHolderTaskItems set IsActive=0 where IsActive=1 and TaskID=".$_GET['Task']." and TaskItemID=".$_GET['i']);  
           echo "<div style='padding:5px;background:#e1ffd1;color:#50bf15;font-weight:bold;padding-left:15px;margin-bottom:10px;'>Removed successfully</div>";
       }
    }
?>
<?php $issues = $mysql->select("select * from _tblPStakeHolderTask where TaskPostedBy='".$_SESSION['User']['UserID']."' and TaskID=".$_GET['Task']."  "); ?>

<table style="width: 100%;;">
    <tr>
        <td style="vertical-align:top;padding-right:10px;color:#555">
        <?php
             if (isset($_POST['postcomments'])) {
        
        $err=0;
        
        if (strlen(trim($_POST['TaskDescription']))<10) {
            $err++;
            $e[]= "<div style='padding:5px;background:#ffeaea;color:#ff0000;font-weight:bold;padding-left:15px;margin-bottom:10px;'>Please enter more works in description</div>";
        }
        
       
        if (!($_POST['Hrs']>=0)) {
            $err++;
            $e[]= "<div style='padding:5px;background:#ffeaea;color:#ff0000;font-weight:bold;padding-left:15px;margin-bottom:10px;'>Please select hour</div>";
        }
        
        if (!($_POST['Mins']>=0)) {
            $err++;
            $e[]= "<div style='padding:5px;background:#ffeaea;color:#ff0000;font-weight:bold;padding-left:15px;margin-bottom:10px;'>Please select minute</div>";
        }
        
        if ($err==0) {
        $mysql->insert("_tblPStakeHolderTaskItems",array("TaskID"          => $_GET['Task'],
                                                         "CreatedOn"       => date("Y-m-d H:i:s"),
                                                         "Hrs"             => ($_POST['Hrs']==0 ? '00' : $_POST['Hrs']),
                                                         "Mins"            => ($_POST['Mins']==0? '00' : $_POST['Mins']),
                                                         "TaskDescription" => $_POST['TaskDescription']));
        $mysql->execute("update _tblPStakeHolderTask set TaskStatus='2', LastUpdatedOn='".date("Y-m-d H:i:s")."' where TaskID=".$_GET['Task']);
        echo "<div style='padding:5px;background:#e1ffd1;color:#50bf15;font-weight:bold;padding-left:15px;margin-bottom:10px;'>Submitted successfully</div>";
        unset($_POST);
        } else {
            echo $e[0];
        }
    }
        ?>
        <?php  if ($issues[0]['TaskStatus']<=2) { ?>
        Enter work details
        
        <div style="text-align: right;">
            <form action="" method="post">
                <textarea style="height:100px;width:100%;margin-bottom:10px;" name="TaskDescription"><?php echo $_POST['TaskDescription'];?></textarea>
               <span style="color:#555;font-size:13px"> Number of working hours&nbsp;&nbsp;
               <select name="Hrs" style="padding:1px !important">
                <option value="">Hrs</option>
                <?php for($i=0;$i<=8;$i++) { ?>
                    <option value="<?php echo $i?>" <?php echo (isset($_POST['Hrs']) && $_POST['Hrs']==$i) ? " selected='selected' ": ""; ?> ><?php echo $i?></option>
                <?php } ?>
               </select>
               :
                <select name="Mins" style="padding:1px !important">
               
                <?php for($i=0;$i<=59;$i+=15) { ?>
                    <option value="<?php echo $i?>" <?php echo (isset($_POST['Mins']) && $_POST['Mins']==$i) ? " selected='selected' ": ""; ?> ><?php echo (strlen($i)==1) ? "0".$i: $i?></option>
                <?php } ?>
               </select>
               
                
                <input type="submit" value="Add task details" name="postcomments" style="padding:6px 15px;">
               
                </span>
            </form>
        </div>
        <?php } ?>
        
        <?php  $works = $mysql->select("select * from _tblPStakeHolderTaskItems where IsActive=1 and TaskID='".$_GET['Task']."' order by TaskItemID desc "); ?>
         <?php  if (sizeof($works)>0) { ?>
         Worked details
        <hr style="margin-top:0px;padding:10px;padding-top:0px;border:none;border-bottom:1px solid #ccc">
         
        <div>
          <?php
         
          $k=0;
              foreach($works as $w) {
               $k++;  
                  ?>
                    <div style="padding:10px;background:#<?php echo ($k%2==0) ? "f1f1f1" : "fff";?>">
                        <table style="width: 100%;">
                            <tr>
                                <td width="200px" style="font-size:12px;color:#888"><?php echo date("M d, Y H:i",strtotime($w['CreatedOn']));?></td>
                                <td style="text-align: right;font-size:12px;color:#888">
                                <?php  if (!( $w['Hrs']==0 &&  $w['Mins']==0)) { ?>
                                    Worked Hours: <span style="font-weight:bold;color:Green"><?php echo $w['Hrs']." : ".(strlen($w['Mins'])==1 ? "0".$w['Mins'] : $w['Mins']);?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                       <div style="text-align:left;">
                        <?php echo nl2br($w['TaskDescription']);?>
                        </div>
                        <?php
                            if ($issues[0]['TaskStatus']==2) {
                        ?>
                        <a href="javascript:void(0)" onclick="Itemremove('<?php echo $w['TaskItemID'];?>')" class="remove">Remove</a>
                        <?php } ?>
                    </div>
                    <hr style="padding:0px;;border:none;border-bottom:1px solid #d5d5d5">
                  <?php
              }
               
          ?>
        
        
        </div>
        <?php } ?>
        
        </td>
        <td style="vertical-align:top;width:400px;border-left:1px solid #ccc;padding-left:10px;">
            <table style="width: 100%;">
                        <tr>
                            <td>
                            <?php  if (sizeof($works)>0) { ?>
                                                <div style="text-align:left;font-size:13px;color:#777">
                        Worked Hours:&nbsp;&nbsp; <span style="font-weight:bold;color:#fff;background:green;padding:2px 10px;"><?php echo getTotalTimeWorked($_GET['Task']);?></span>
                    </div>
                     <?php } ?>
                            </td>
                            <td style="width:200px;text-align:right">
                            <?php
                                if ($issues[0]['TaskStatus']==3) {
                                    ?>
                                    <div style="color:green;font-weight:bold;">Completed</div>
                                    <div style="font-size:12px;color:#666"><?php echo date("M d, Y H:i",strtotime($issues[0]['CompletedOn']));?></div>
                                    
                                    <?php 
                                } else {
                                    if (sizeof($works)>0) {
                            ?>
                                <form action="" method="post" style="margin:0px;padding:0px">
                                    <input type="submit" value="Complete Now" name="btnComplete" style="padding:6px 15px;">
                                </form>
                                <?php } else { ?>
                                    <input type="button" title="Please submit your work details, then click to complete task" disabled="disabled" value="Complete Now" name="btnComplete" style="padding:6px 15px;"> 
                                <?php     
                                }
                                
                                }  ?>
                            </td>
                        </tr>
                    </table>
            <table style="width: 100%;">
                <tr>
                <td>
                    
                    <div style="font-weight:Bold;font-size:20px;"><?php echo $issues[0]['TaskTitle'];?></b></div>
                    <span style="color:#888;font-size:12px;"><b style="color:#333">Created:</b>&nbsp;&nbsp;&nbsp;<?php echo date("M d, Y H:i",strtotime($issues[0]['TaskCreatedOn']));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php 
                        if ($issues[0]['LastUpdatedOn']!=null) {
                            echo "<b style='color:#333'>Last Modified:</b>&nbsp;&nbsp;&nbsp;".date("M d, Y H:i",strtotime($issues[0]['LastUpdatedOn']));
                        }
                    ?>
                    </span>
                </td>
                </tr>
                <tr>
                    <td style="color:#333">
                        Description:
                        <div style="color:#555;min-height:200px;font-size:12px;overflow: auto;">
                            <?php echo nl2br($issues[0]['TaskDescription']);?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="height:167px;overflow:auto;border:1px solid #fff;padding-top:10px;">
                            <?php
                                $attachment = $mysql->select("select * from _tblAttachment where  TaskID=".$issues[0]['TaskID']);
                                foreach($attachment as $a) {
                            ?>
                            <div class="attachments">
                                <a href="stakeholdertask/<?php echo $a['FileName'];?>" target="blank">
                                <img src="stakeholdertask/<?php echo $a['FileName'];?>" style="height: 100px;border:1px solid #aaa;"> <br>
                                <?php echo $a['FileName'];?>
                                </a>
                            </div>
                            <?php } ?>
                        </div> 
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php } ?>