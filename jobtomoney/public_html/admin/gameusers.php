


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


<h5 style="text-align: left;font-family: arial;">Game Users List</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
 
  <?php

 
      $data = $mysql->select("select * from _usertable      order by userid desc ");     
 
        
      
   

?>

<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">User ID</td>
        <td width="150"  style="border:1px solid #ccc;">Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80"  style="border:1px solid #ccc;">Phone No</td>
        <td width="80"  style="border:1px solid #ccc;">Password</td>
        <td width="80"  style="border:1px solid #ccc;">StateName</td>
        <td width="80"  style="border:1px solid #ccc;">DistrictName</td>
        <td width="80"  style="border:1px solid #ccc;">Balance</td>
        <td width="80"  style="border:1px solid #ccc;">Points</td>
        <td width="120"   style="border:1px solid #ccc;">Registered on</td>
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>                                                         
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['userid']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['personname']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['emailid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['mobileno'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['password'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['StateName'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['DistrictName'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo number_format($dealmaass->getUserBalance($d['userid']),2);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $dealmaass->getPoints($d['userid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['dateofregister']));?></td>
        </tr>
    <?php } ?>
</table>

</div>
</div>
               </div>
              

   
    </div>
</div>

 