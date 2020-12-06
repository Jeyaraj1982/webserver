<b>Task Details</b>
<?php 
if (isset($_POST['complete_now'])) {
    $id = $mysql->insert("_tblTaskConversation",array("TaskID"=> $_GET['Task'],
                                                      "DeveloperID"=>$_SESSION['User']['UserID'],    
                                                      "DeveloperName"=>$_SESSION['User']['EmployeeName'],    
                                                      "ConversationDate"=>date("Y-m-d H:i:s"),    
                                                      "Description"=>$_POST['developer_description']));
   if ($id>0) {
       $mysql->execute("update _tbltasklist set CompletedOn='".date("Y-m-d H:i:s")."', CompletedByName='".$_SESSION['User']['EmployeeName']."', CompletedByID='".$_SESSION['User']['UserID']."' where TaskID=".$_GET['Task']);
   }                                                       
}

$issues = $mysql->select("select * from _tbltasklist where TaskID=".$_GET['Task']."  "); ?>
<table style="width:100%;" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:180px;padding-left:0px;">Task ID</td>
        <td>
                <input type="text" style="width:50px;border:1px solid #ccc" value="<?php echo $issues[0]['TaskID'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Created On&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:150px;border:1px solid #ccc" value="<?php echo $issues[0]['TaskCreatedOn'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Posted By&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:120px;border:1px solid #ccc" value="<?php echo $issues[0]['TaskPostedByName'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Status&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:100px;border:1px solid #ccc" value="<?php echo $issue[0]['TaskStatus']==1 ? "Open" : "Process";?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Project&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:100px;border:1px solid #ccc" value="<?php echo $issues[0]['ProjectName'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Estimated Hrs&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:50px;border:1px solid #ccc" value="<?php echo $issues[0]['EstimatedHours'];?>" readonly="readonly">
        </td>
    </tr>                                               
    <tr>
        <td style=";padding-left:0px;">Task Title</td>
        <td><input type="text"  style="width:100%;border:1px solid #ccc" value="<?php echo $issues[0]['TaskTitle'];?>" readonly="readonly"></td>
    </tr>
    <tr>
        <td style="vertical-align:top;;padding-left:0px;">Task Description</td>
        <td><div style="height:250px;overflow:auto;border:1px solid #ccc;padding:5px;"><?php echo nl2br($issues[0]['TaskDescription']);?></div></td>
    </tr>
    <tr>
        <td style=";padding-left:0px;vertical-align: top;">Attachment</td>
        <td>
          <div style="height:167px;overflow:auto;border:1px solid #ccc;padding-top:10px;">
         
          <?php
              $attachment = $mysql->select("select * from _tblAttachment where PrototypeID=".$issues[0]['PrototypeID']);
              foreach($attachment as $a) {
                  ?>
                  <div class="attachments">
                    <a href="prototype/<?php echo $a['FileName'];?>" target="blank">
                    
                    <img src="prototype/<?php echo $a['FileName'];?>" style="height: 100px;border:1px solid #aaa;"> <br>
                    <?php echo $a['FileName'];?>
                    
                    </a>
                    </div>
                  <?php
              }
          ?>
          </div> 
        </td>
    </tr>
    <?php  if ($issues[0]['TaskAssignedTo']==$_SESSION['User']['UserID'] && $issues[0]['CompletedByID']==0)  { ?>
   <tr>
        <td style="vertical-align:top;;padding-left:0px;">Developer Description</td>
        <td>
        <form action="" method="post">
            <textarea style="width:100%;height:80px" name="developer_description">
        
            </textarea>
            <br><br>
            <!--<input type="Submit" value="Update Status" name="update_status">-->
            <input type="Submit" value="Complete Now" name="complete_now">
        </form>
        </td>
    </tr>
    
    <?php } ?>
    
    
          <tr>
        <td colspan="2" style="vertical-align:top;;padding-left:0px;">Developer Description</td>
        
    </tr>
  <?php
        $descriptions = $mysql->select("select * from _tblTaskConversation where TaskID=".$_GET['Task']);
        foreach($descriptions as $d) {
            ?>
            <tr>
                <td></td>
                <td>
                    <div style="border:1px solid #ccc;padding:10px;">
                     <?php echo $d['DeveloperName'];?>,  <?php echo date("M d, Y H:i",strtotime($d['ConversationDate']));?><Br>
                     <?php echo $d['Description'];?>
                     </div><br><br>
                </td>
            </tr>
            <?php
        }
    ?>  
    
</table> 
 
 