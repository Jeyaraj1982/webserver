 <?php $data = $mysql->select("select * from _visitor where userid=".$_SESSION['user']['id']." order by viewon desc "); ?> 
        <h4>Visitor's History [<?php echo sizeof($data);?>]</h4>
     <div style="border:1px solid #ccc;height:300px;overflow:auto">
          
          <table style="font-size:12px;font-family:arial;" width="100%" cellpadding="5" cellspacing="0">
            <tr bgcolor='#ccc' style="font-weight:bold;text-align:center;background:#ccc">
                <td>Date Time</td>
                 <td>Browser</td>                 
                <td>IP Address</td>
                <td>Contry Name</td>
                <td>Region Name</td>
                <td>City Name</td>
                <td>Latitude</td>
                <td>Longitude</td>
            </tr>      
            <?php foreach($data as $d) {?>
                <tr>
                    <td><?php echo $d['viewon'];?></td>
                     <td><?php echo $d['browser'];?></td>  
                    <td><?php echo $d['ip'];?></td>
                    <td><?php echo $d['country'];?></td>
                    <td><?php echo $d['regionname'];?></td>
                    <td><?php echo $d['cityname'];?></td>
                    <td><?php echo $d['latitude'];?></td> 
                    <td><?php echo $d['longitude'];?></td> 
                </tr>
            <?php } ?>
          </table>            
        
        </div>