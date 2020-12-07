
 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">
                  
       
<?php
    if (isset($_POST['nomineename']) && (isset($_POST['relation'])) && (isset($_POST['age'])) && (isset($_POST['details']))) {
      $isTrue = 0;     
      $isTrue += validate($_POST['nomineename']);
      $isTrue += validate($_POST['relation']);
      $isTrue += validate($_POST['age']);
      $isTrue += validate($_POST['details']);   
      
      if ($isTrue==0) {
             $rowData = array("id"=>'Null',
                   "clientid"       => $_SESSION['user']['id'],
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
<?php $data = $mysql->select("select * from _clients_nom_details where clientid=".$_SESSION['user']['id']); ?>
<?php if (sizeof($data)==0) {?>
 <h5 style="text-align: left;font-family: arial;">Enter Nominee Information</h5>  
<div style="border-bottom:1px solid #D4E3F6;"></div><br>
   
    <form action="" method="post">
        <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;" width="100%">
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
            <td><input type="submit" value="Save" class="btn btn-success"></td>
        </tr>
    </table>
    </form>
<?php } else { ?>
 <h5 style="text-align: left;font-family: arial;">Nominee Information</h5>  
<div style="border-bottom:1px solid #D4E3F6;"></div><br>
    <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;" width="100%">
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
</div>
               </div>
              

   
    </div>
</div>

 