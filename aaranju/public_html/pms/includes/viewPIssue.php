 <b>View Issue</b>
<?php
        //$issues = $mysql->select("select * from _tblIssues where IssueID=".$_GET['Issue']." and IssuePostedBy='".$_SESSION['User']['UserID']."' order by IssueID");
        $issues = $mysql->select("select * from _tblIssues where IssueID=".$_GET['Issue']." and ProjectID in (select p.ProjectID from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID and pa.UserID='".$_SESSION['User']['UserID']."' group by pa.ProjectID)   order by IssueID");
        //$issues = $mysql->select("select * from _tblIssues where IssueID=".$_GET['Issue']."  order by IssueID");
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
                <input type="text" style="width:100px;border:1px solid #ccc" value="<?php echo $issue[0]['IssueStatus']==1 ? "Open" : "Process";?>" readonly="readonly">
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
<br><br>
<br><br>
<br><br>
 