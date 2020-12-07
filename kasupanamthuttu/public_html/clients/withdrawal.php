

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


<h5 style="text-align: left;font-family: arial;">My Withdrawals</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 

 

<table cellpadding="5" cellspacing="0" width="100%" style="font-size:12px;font-family:arial;">
    <tr style="font-weight: bold;text-align: center;background:#f5f5f5">
        <td width="100" style="border:1px solid #ccc;border-right:none;border-bottom:none;">Date</td>
        <td  style="border:1px solid #ccc;border-right:none;border-bottom:none;">Particulars</td>
        <td width="120"  style="border:1px solid #ccc;border-bottom :none;">Withdrawal Amount</td>
    </tr>
<?php
if (isset($_POST['acno'])) {
    $data = $mysql->select("select * from _clients_account where clientid=".$_POST['acno']);
} else {
  $data = $mysql->select("select * from _clients_account where clientid=".$_SESSION['user']['id']);  
}
  
  foreach($data as $d) {
      ?>
        <tr>
            <td align="center"  style="border:1px solid #ccc;"><?php echo $d['date'];?></td>
            <td  style="border:1px solid #ccc;"><?php echo $d['particulars'];?></td>
            <td align="right"  style="border:1px solid #ccc;"><?php echo $d['dramount'];?></td>
        </tr>
      <?php
      
  }
?>
<?php
    if (sizeof($data)==0) {
        ?>
             <tr>
                <td colspan="3" style="text-align: center;border:1px solid #ccc"> No Records Fund</td>
             </tr>
        <?php
    }
?>
</table>            



</div>
</div>
               </div>
              

   
    </div>
</div>

 