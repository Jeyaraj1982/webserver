

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


<h5 style="text-align: left;font-family: arial;">Edit Request</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 

<form action="" method="post">


<?php
    if (isset($_POST['adminrequest']) && (strlen(trim($_POST['adminrequest']))>0)) {
        $data = $mysql->select("select * from _servicerequest where id=".$_POST['id']);  
        $description = "<br><b>Client</b>:<br>".$data[0]['description']."<br><b>Admin</b><br>".$_POST['adminrequest'];
        $sql = "update _servicerequest set description='".$description."',requeststats='".$_POST['requeststats']."', requestclosedon='".date("Y-m-d H:i:s")."' where id=".$_POST['id'];  
        $mysql->execute($sql);
        $headers  = "From: web@kejuinfotech.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $t = "Your Service Request ID : ".$data[0]['id'].", dt. ".$data[0]['postedon']." has been solved by administrator at ".date("Y-m-d H:i:s").". Please check your request.<br>By<br>Kejuinfotech Team";
        $email=$mysql->select("select * from _clients where id=".$data[0]['clientid']);
        mail("jeyaraj_123@yahoo.com","Request Solved : ".$data[0]['emailid'],$t,$headers);  
        mail($data[0]['emailid'],"Request Solved : ",$t,$headers); 
                    
    }
?>
<?php
    $data = $mysql->select("select * from _servicerequest where id=".$_POST['id']);
?>

<form target="_blank" method="post" action="editclient">
                    <input type="hidden" style="width:88px;border:1px solid #D4E3F6;padding:3px;margin-top: 5px;" name="clientid" maxlength="8" value="<?php echo $client[0]['id'];?>"><br><input type="submit" style="font-size:11px;margin-top: 5px;" value="View Client">
                </form>
                
<table  width="100%" cellpadding="3" cellspacing="0" style="font-family: arial;font-size:12px;">

    <tr>
        <td width="130">Request ID</td>
        <td><input type="hidden" value="<?php echo $_POST['id'];?>" name="id"><?php echo $_POST['id'];?></td>
    </tr>
    <tr>
        <td>Date</td>
        <td><?php echo $data[0]['postedon'];?></td>
    </tr>
    <tr>
        <td>Titlte</td>
        <td><?php echo $data[0]['requesttitle'];?></td>
    </tr>
    <tr>
        <td valign="top">Description</td>
        <td valign="top"><?php echo $data[0]['description'];?></td>
    </tr>  
    <?php if ($data[0]['requeststats']=="open") {?>
    <tr>
        <td valign="top">Admin Description</td>
        <td valign="top"><textarea name="adminrequest" style="width:100%;height:80px;"></textarea></td>
    </tr>  
    <tr>
        <td>Status</td>
        <td>
            <select name="requeststats">
                <option value="open" <?php echo ($data[0]['requeststats']=="open") ? 'selected=selected' : '';?> >Open</option>
                <option value="closed" <?php echo ($data[0]['requeststats']=="closed") ? 'selected=selected' : '';?>>Closed</option>
            </select>
        </td>
    </tr>    
        <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="Save"></td>
    </tr>                 
    <?php } else { ?>
             <tr>
        <td>Status</td>
       <td><?php echo $data[0]['requeststats'];?></td> 
    </tr>
                 <tr>
        <td>Request Closed on</td>
       <td><?php echo $data[0]['requestclosedon'];?></td> 
    </tr>
    <?php } ?>


</table>
</form>

</div>
</div>
               </div>
              

   
    </div>
</div>

 
