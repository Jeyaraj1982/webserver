


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


<h5 style="text-align: left;font-family: arial;">Payment Gateway Transaction</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
 
  <?php

 
      $data = $mysql->select("select * from _tblPayments      order by PaymentID desc ");     
 
        
      
     

?>

<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">TxnDate</td>
        <td width="150"  style="border:1px solid #ccc;">ClientID</td>
        <td  style="border:1px solid #ccc;">TxnAmount</td>
        <td width="80"  style="border:1px solid #ccc;">TxnStatus</td>
        <td width="80"  style="border:1px solid #ccc;">Message</td>
        <td width="80"  style="border:1px solid #ccc;">PG ID</td>
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>
              <td style="border-bottom:1px solid #ccc;"><?php echo $d['TxnDate'];?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo $d['ClientID'];?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo $d['TxnAmount'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['TxnStatus'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['ErrorMessage'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['PaymentReqID'];?></td>
        </tr>
    <?php } ?>
</table>

</div>
</div>
               </div>
              

   
    </div>
</div>

 