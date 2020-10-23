<?php $txnpage="Datewise";?>
<h3 style="text-align: center;padding:10px;">Money Transfer Limits</h3>
<?php
     $upper_lmit =getUpperLimit($_SESSION['User']['MemberID']);
    $today_transfer  = getTodayTransfered($_SESSION['User']['MemberID']);
    $today_dealer_transfer  = getDealerTodayTransfered($_SESSION['User']['MemberID']);
?>
<table>
    <tr>
        <td>Dealer's Upper Limit</td>
        <td style="text-align:right"><?php echo number_format($upper_lmit,2);?></td>
    </tr>
       <tr>
        <td>Transferred by Me</td>
        <td style="text-align:right"><?php echo number_format($today_transfer,2);?></td>
    </tr>
     <tr>
        <td>Transferred by Members</td>
        <td style="text-align:right"><?php echo number_format($today_dealer_transfer,2);?></td>
    </tr>
    <tr>
        <td>Remaining</td>
        <td style="text-align:right"><?php echo number_format($upper_lmit-($today_transfer+$today_dealer_transfer),2);?></td>
    </tr>
</table>
 