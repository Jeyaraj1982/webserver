<b>View Issue</b>
<?php
function SendTextTelegram($id,$message) {
    $url = "https://www.aaranju.in/telegram/api.php?apiusername=9944872965&apipassword=0202&clientid=".$id."&message=".urlencode($message)."&uid=".time()."&msgtype=text";
$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
return $url;
}

function IssueStatus($id) {
    
    if ($id==1) {
        return "Open";
    }
    
      if ($id==2) {
        return "Closed";
    }
    
     if ($id==5) {
        return "Processing";
    }
    
    return $id;
    
    
}                                                       
    if (isset($_POST['PostReply'])) {
      // //http://www.aaranju.in/telegram/api.php?apiusername=9944872965&apipassword=0202&clientid=1107300198&message=welcome%20to%20tksd&uid=1&msgtype=text   
    
       $id=   $mysql->insert("_tblIssues_reply",array(
                                    "IssueID"=>$_POST['IssueID'],
                                    "Description"=>$_POST['Description'],
                                    
                                    "PostedBy"=>$_SESSION['User']['UserID'],
                                    "PostedByName"=>$_SESSION['User']['EmployeeName'],
                                    "ReplyDateTime"=>date("Y-m-d H:i:s")));
                                    
                                
       if ($id>0) {
       $mysql->execute("update _tblIssues set IssueStatus='2', DeveloperID='".$_SESSION['User']['UserID']."', DeveloperName='".$_SESSION['User']['EmployeeName']."', ClosedOn='".date("Y-m-d H:i:s")."' where IssueID='".$_POST['IssueID']."'");    
        
             $issues = $mysql->select("select * from _tblIssues where IssueID='".$_POST['IssueID']."' ");
             
           $issuePostedOn = $issues[0]['IssueCreatedOn'];
           $issuePostedBy = $issues[0]['IssuePostedByName'];
           $issueID= $issues[0]['IssueID'];
           $projectID= $issues[0]['ProjectID'];
           $issueTitle = $issues[0]['IssueTitle'];
           $issueSovledBy=$_SESSION['User']['EmployeeName'];
           $message = "";
           
           //send message by user
           $u = $mysql->select("select * from _tblUser where UserID='".$issues[0]['IssuePostedBy']."'");
           if (strlen($u[0]['telegramid'])>3) {
               $message = "Dear *".trim($u[0]['EmployeeName'])."*,\nYou posted issue ID:".$issueID." (*".$issueTitle."*) has been solved by *".$issueSovledBy."*. Please check your side"; 
               SendTextTelegram($u[0]['telegramid'],$message);
           }
           
           //send message by org admin
           $admin = $mysql->select("select * from _tblUser where UserID='".$u[0]['CreatedBy']."'");
           if (strlen($admin[0]['telegramid'])>3) {
               $message = "Dear *".trim($admin[0]['EmployeeName'])."*,\nYour Staff *".$issuePostedBy."* has posted Issue ID:".$issueID." (*".$issueTitle."*) has been solved by *".$issueSovledBy."*. Please check your side"; 
               SendTextTelegram($admin[0]['telegramid'],$message);
           }
           
            $message = "IMAX,\n*".$issuePostedBy."* has posted Issue ID:".$issueID." (*".$issueTitle."*) has been solved by *".$issueSovledBy."*. Please check your side"; 
               SendTextTelegram("1107300198",$message);

           for($i=0;$i<sizeof($_FILES['image']['name']);$i++) {

                $target_dir = "uploads/";
              
                $filename = strtolower("_".time().$_FILES['image']['name'][$i]);
       
                if (move_uploaded_file($_FILES['image']["tmp_name"][$i], $target_dir.$filename)) {
                   
                        $mysql->insert("_tblAttachmentReply",array(
                                    "IssueID"=>$issueID,
                                    "ProjectID"=>$projectID,
                                    "UserID"=>$_SESSION['User']['UserID'],
                                    "FileName"=>$filename,
                                    "IsDirect"=>"1"));
                    
    } else {
        echo "file uploaded error".$_FILES["image"]["error"][$i];
    }  
    

 
 
      
 
    
            }
                  
       } else {
          // echo "error: Posting issue.";
       }
    }
?>
<?php
    $issues = $mysql->select("select * from _tblIssues where IssueID=".$_GET['Issue']." and ProjectID in (select p.ProjectID from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID and pa.UserID='".$_SESSION['User']['UserID']."' group by pa.ProjectID)   order by IssueID");
    
?>
<table style="width:100%;" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:140px;padding-left:0px;">Issue ID</td>
        <td>
                <input type="text" style="width:120px;border:1px solid #ccc" value="<?php echo $issues[0]['IssueID'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Created On&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:150px;border:1px solid #ccc" value="<?php echo $issues[0]['IssueCreatedOn'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Posted By&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:200px;border:1px solid #ccc" value="<?php echo $issues[0]['IssuePostedByName'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Status&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:100px;border:1px solid #ccc" value="<?php echo IssueStatus(trim($issues[0]['IssueStatus']));?>" readonly="readonly">
        </td>
    </tr>                                               
    <tr>
        <td style="width:140px;padding-left:0px;">Project</td>
        <td><input type="text"   style="width:100%;border:1px solid #ccc" value="<?php echo $issues[0]['ProjectName'];?>" readonly="readonly"></td>
    </tr>
    <tr>
        <td style=";padding-left:0px;">Issue Title</td>
        <td><input type="text"  style="width:100%;border:1px solid #ccc" value="<?php echo $issues[0]['IssueTitle'];?>" readonly="readonly"></td>
    </tr>
    <tr>
        <td style="vertical-align:top;;padding-left:0px;">Issue Description</td>
        <td><div style="height:250px;overflow:auto;border:1px solid #ccc;padding:5px;"><?php echo nl2br($issues[0]['IssueDescription']);?></div></td>
    </tr>
    
    <tr>
        <td style=";padding-left:0px;">Attachment</td>
        <td>
          <div style="height:167px;overflow:auto;border:1px solid #ccc;padding-top:10px;">
         
          <?php
              $attachment = $mysql->select("select * from _tblAttachment where IssueID=".$issues[0]['IssueID']);
              foreach($attachment as $a) {
                  ?>
                  <div class="attachments">
                    <a href="uploads/<?php echo $a['FileName'];?>" target="blank">
                    
                    <img src="uploads/<?php echo $a['FileName'];?>" style="height: 100px;border:1px solid #aaa;"> <br>
                    <?php echo $a['FileName'];?>
                    
                    </a>
                    </div>
                  <?php
              }
          ?>
              
          </div> 
        </td>
    </tr>
</table> 
<?php
    if ($_SESSION['User']['IsDeveloper']==1) {
        ?>
         <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="IssueID" value="<?php echo $issues[0]['IssueID'];?>">
         <table style="width:100%;" cellpadding="5" cellspacing="0">
          
    <tr>
        
        <td>Developer's  Description<Br><textarea name="Description" style="width:100%;height:300px"></textarea></td>
    </tr>
    <tr>
      
        <td>
            <input type="file" name="image[]" multiple>
        </td>
    </tr>
    <tr>
        <td style=";padding-left:0px;"><input type="submit" value="Close Issue" name="PostReply"></td>
    </tr>
</table> 

</form>
        <?php
    }
?>
<?php
     //http://www.aaranju.in/telegram/api.php?apiusername=9944872965&apipassword=0202&clientid=1107300198&message=welcome%20to%20tksd&uid=1&msgtype=text
 ?> 