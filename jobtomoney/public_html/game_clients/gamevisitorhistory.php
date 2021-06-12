
                      <?php include_once("game_clients/menu.php");?>
 <div class="line">
            <div class="margin">
              
               <div class="s-12 m-6 l-12 margin-bottom">
                  <div class="box">

 <?php $data = $mysql->select("select * from _uservisits where userid=".$_SESSION['USER']['userid']." order by viewon desc "); ?> 
<h5 style="text-align: left;font-family: arial;">Visitor's History [<?php echo sizeof($data);?>]</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
      
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
     
</div>
</div>
               </div>
              

   
    </div>
</div>

 