 <div style="border:1px solid #ccc;height:300px;overflow:auto">
          <?php $data = $mysql->select("select * from _clients where referringby=".$_SESSION['user']['id']." order by postedon desc "); ?> 
          <table style="font-size:12px;font-family:arial;" cellpadding="5" width="100%" cellspacing="0">
            <tr bgcolor='#ccc' style="font-weight:bold;text-align:center;background:#ccc">
                <td>Date</td>
                <td>Name</td>
                <td>Place</td>
                <td>Phone No</td>
                <td>Email id</td>
            </tr>      
            <?php foreach($data as $d) {?>
                <tr bgcolor="<?php echo ($d['isactive']==1) ? "#CFFFCD" : "white";?>">
                    <td><?php echo $d['postedon'];?></td>
                    <td><?php echo $d['firstname'];?></td>
                    <td><?php echo $d['city'];?></td>
                    <td><?php echo $d['mobileno'];?></td>
                    <td><?php echo $d['emailid'];?></td>
                </tr>
            <?php } ?>
          </table>            
        
        </div>
    <br><div style="border-bottom:1px solid #D4E3F6;"></div>