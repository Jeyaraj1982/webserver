 <?php include_once("pages/pj/header.php");?>
<table>
    <tr>
        <td width="760">
<?php
    if (isset($_POST['nomineename']) && (isset($_POST['relation'])) && (isset($_POST['age'])) && (isset($_POST['details']))) {
      $isTrue = 0;     
      $isTrue += validate($_POST['nomineename']);
      $isTrue += validate($_POST['relation']);
      $isTrue += validate($_POST['age']);
      $isTrue += validate($_POST['details']);   
      
      if ($isTrue==0) {
             $rowData = array("id"=>'Null',
                   "clientid"       => $_SESSION['PJUSER']['id'],
                   "nomineename"       => $_POST['nomineename'],
                   "relation"     => $_POST['relation'],
                   "age"   => $_POST['age'],
                   "details"       => $_POST['details'],
                   "updatedon"      => date("Y-m-d H:i:s")
             );
             $recordId = $mysql->insert("_clients_nom_details",$rowData);       
             
             if ($recordId>0) {
                 echo "<div style='padding:10px;border:1px solid #ccc;color:#222'>Nominee Information are updated successfully</div>";
             } else {
                 echo "<div style='padding:10px;border:1px solid #ccc;color:#222'>Error Occured when sending your Nominee Information to administrator. Please Try again.</div>";
             }
              
      } else {
          echo "<div style='padding:10px;border:1px solid #ccc;color:#222'>All Fields are required</div>";
      }
    }
?>
<?php $data = $mysql->select("select * from _clients_nom_details where clientid=".$_SESSION['PJUSER']['id']); ?>
<?php if (sizeof($data)==0) {?>
    <h3 style="font-family: arial;color:#264AA6">Enter Nominee Information</h3>
    <form action="" method="post" target="_self">
        <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;" width="90%">
        <tr>
            <td width="130">Nominee Name<span class="man">*</span></td>
            <td><input type="text" name="nomineename" value="<?php echo $_POST['nomineename'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>Relation<span class="man">*</span></td>
            <td><input type="text" name="relation" value="<?php echo $_POST['relation'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>Nominee's Age<span class="man">*</span></td>
            <td><input type="text" name="age" maxlength="2" value="<?php echo $_POST['age'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td valign="top">Nominee Account Details<span class="man">*</span></td>
            <td><textarea name="details" style="width: 100%;border:1px solid #DEEBFC;padding:2px;height:90px;"><?php echo $_POST['details'];?></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Save"></td>
        </tr>
    </table>
    </form>
<?php } else { ?>
<h3 style="font-family: arial;color:#264AA6">Your Bank Details</h3>
    <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;" width="90%">
    <tr>
        <td width="130">Nominee Name</td>
        <td>:&nbsp;<?php echo $data[0]['nomineename'];?></td>
    </tr>
    <tr>
        <td>Relation</td>
        <td>:&nbsp;<?php echo $data[0]['relation'];?></td>
    </tr>
    <tr>
        <td>Nominee's Age</td>
        <td>:&nbsp;<?php echo $data[0]['age'];?></td>
    </tr>
    <tr>
        <td valign="top">Nominee Account Details</td>
        <td valign="top"><div style="width:100%;height:100px;overflow:auto"><?php echo nl2br($data[0]['details']);?></div></td>
    </tr>
    <tr>
        <td>Updated On</td>
        <td>:&nbsp;<?php echo $data[0]['updatedon'];?></td>
    </tr>
    
</table>
<?php } ?>  
<br><div style="border-bottom:1px solid #D4E3F6;"></div>

</td>
<td valign="top">
           <?php include("pages/pj/rightside.php");?>
</td>
</tr>
</table>