

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


<h5 style="text-align: left;font-family: arial;">Blocked Clients</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 

<?php  
 $data = $mysql->select("select * from _clients where isblock=1 and trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."' order by id desc");         
 


?>

<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">Client ID</td>
        <td width="150"  style="border:1px solid #ccc;">Client Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80"  style="border:1px solid #ccc;">Phone No</td>
        <td width="120" colspan="2"  style="border:1px solid #ccc;">Registered on</td>    
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>
            <td style="border-bottom:1px solid #ccc;"><?php echo $d['id'];?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['firstname']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['emailid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['mobileno'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['postedon']));?></td>
        </tr>
    <?php } ?>
</table>

</div>
</div>
               </div>
              

   
    </div>
</div>

 