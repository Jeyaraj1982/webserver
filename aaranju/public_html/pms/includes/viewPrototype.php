 <b>View Prototype</b>
<?php
        
        $issues = $mysql->select("select * from _tblPrototype where PrototypeID=".$_GET['Prototype']."  ");
    ?>

<table style="width:100%;" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:140px;padding-left:0px;">Issue ID</td>
        <td>
                <input type="text" style="width:120px;border:1px solid #ccc" value="<?php echo $issues[0]['PrototypeID'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Created On&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:150px;border:1px solid #ccc" value="<?php echo $issues[0]['PrototypeCreatedOn'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Posted By&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:200px;border:1px solid #ccc" value="<?php echo $issues[0]['PrototypePostedByName'];?>" readonly="readonly">
                &nbsp;&nbsp;&nbsp;&nbsp;Status&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" style="width:100px;border:1px solid #ccc" value="<?php echo $issue[0]['PrototypeStatus']==1 ? "Open" : "Process";?>" readonly="readonly">
        </td>
    </tr>                                               
    <tr>
        <td style="width:140px;padding-left:0px;">Project</td>
        <td><input type="text"   style="width:100%;border:1px solid #ccc" value="<?php echo $issues[0]['ProjectName'];?>" readonly="readonly"></td>
    </tr>
    <tr>
        <td style=";padding-left:0px;">Issue Title</td>
        <td><input type="text"  style="width:100%;border:1px solid #ccc" value="<?php echo $issues[0]['PrototypeTitle'];?>" readonly="readonly"></td>
    </tr>
    <tr>
        <td style="vertical-align:top;;padding-left:0px;">Issue Description</td>
        <td><div style="height:250px;overflow:auto;border:1px solid #ccc;padding:5px;"><?php echo nl2br($issues[0]['PrototypeDescription']);?></div></td>
    </tr>
    
    <tr>
        <td style=";padding-left:0px;">Attachment</td>
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
 
</table> 
<br><br>
<br><br>
<br><br>
 