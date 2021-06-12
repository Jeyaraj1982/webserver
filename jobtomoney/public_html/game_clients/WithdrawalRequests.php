    <?php include_once("game_clients/menu.php");?>
    
    
                 <?php include_once("game_clients/menu.php");?>
     <div class="line">
            <div class="box margin-bottom">
               
                   
                   
                 
<h4>Withdrawal Requests</h4>
 
                                                
<div class="row">

   <div class="col-sm-12">
   

    <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;width:100%" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#7dcde8;color:#333;font-weight:bold;text-align:center;">
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Requested On</td>
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Amount</td>
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Status</td>
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Bank Transfer On</td>
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Bank Txn ID</td>
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Rejected On</td>
            <td style="border-top:1px solid #333;border-bottom:1px solid #333;">Reason for reject</td>
        </tr>
        <?php
            $data = $mysql->select("select * from _game_withdrawls where MemberID='".$_SESSION['USER']['userid']."' order by GameWithdrwalRequest desc");
            $i = 0;
            foreach($data as $d) {
                 $bg = ($i%2 ==0) ? "#FFF2E0" : "#FFF8EF";  
        ?>
            <tr style="background:<?php echo $bg;?>">
                <td><?php echo $d['RequestedOn'];?></td>
                
                <td style="text-align:right"><?php echo number_format($d['Amount'],2);?></td>
                <td><?php 
                if ($d['Status']==1) {
                    echo "Requested";
                } elseif ($d['Status']==2) {
                    echo "Completed";
                } elseif ($d['Status']==3) {
                    echo "Rejected";
                }
                ?></td>
                <td><?php echo $d['CompletedOn'];?></td>
                <td><?php echo $d['BankTransactionID'];?></td>
                <td><?php echo $d['RejectedOn'];?></td>
                <td><?php echo $d['RejectedReason'];?></td>
                
            </tr>
        <?php } ?>
    </table>  
    
    </div>
    
   
   </div>
    
   </div>
   </div>