
<?php

    $msg = "";

 
      if (isset($_POST['delete'])) {
        $pdata = explode("-",$_POST['delete']);
       
                        

        switch(trim($pdata[0])) {
            case 'f' :
                $mysql->execute("delete from _franchise where md5(id)='".$pdata[1]."'");
                
                $msg = "Franchise Details successfully Deleted";
break;
            case 'v' :
                $mysql->execute("delete from _visa where md5(id)='".$pdata[1]."'");
                $msg = "Visa Details successfully Deleted";
break;
        }
    }  
    
       if (strlen($msg)>2) {
        echo "<div style='border:1px solid #ccc;background:#f1f1f1;text-align:center;color:#222;padding:10px;'>".$msg."</div>";
    }
    
    $frachise = $mysql->select("select * from _franchise order by id desc");  
?>
      <h4 style="color:orange">Franchise</h4>
    <table style="font-family:arial;font-size:12px;border: 1px solid #ccc" cellpadding="5" cellspacing="0" width="100%">  
        <tr style="background: #f1f1f1;font-weight:bold;">
            <td>First Name </td>
            <td>Email id</td>
            <td>Phone No </td>
            <td>District</td>
            <td>State Name</td>
            <td>Posted On</td>
            <td>Action</td>
        </tr>
        <?php
        foreach($frachise as $f) {
            ?>
                      <tr>
            <td style="border: 1px solid #ccc"><?php echo $f['firstname']." (".$f['sex'].")";?>&nbsp;</td>
            <td style="border: 1px solid #ccc"><?php echo $f['emailid'];?>&nbsp;</td>
            <td style="border: 1px solid #ccc"><?php echo $f['mobileno'];?>&nbsp;</td>
            <td style="border: 1px solid #ccc"><?php echo $f['statename'];?>&nbsp;</td>
            <td style="border: 1px solid #ccc"><?php echo $f['districtname'];?>&nbsp;</td>
            <td style="border: 1px solid #ccc"><?php echo $f['postedon'];?></td>
            <td style="border: 1px solid #ccc">
             <form action='' method='post'>
                <input type='hidden' value="<?php echo "f-".md5($f['id']);?>" name="delete">
                <input type='submit'  value="Delete" >
            </form>
            </td>
        </tr>
            <?php
        }
?>
    </table>