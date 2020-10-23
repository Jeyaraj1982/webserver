<h3 style="padding:10px;text-align:center">Charges Summary</h3>
<table class="table table-striped ">
    <tr>
        <td>Particulars</td>
        <td style="text-align:right !important">Txn Amt</td>
    </tr>
    <?php
    
    $summary = $mysql->select("select * from `_tbl_accounts` where `MemberID`='".$_SESSION['User']['MemberID']."' and (Voucher='32' or Voucher='42') and (Credit>0 or Debit>0) order by AccountID desc");
    foreach($summary as $s) {
        ?>                                             
        <tr>
            <td style="font-size:12px;">
            <?php echo $s['TxnDate'];?><Br>
            <?php echo $s['Particulars'];?>
            </td>
            <td style="text-align:right !important;font-size:12px;">
            <?php if ($s['Credit']>0) {?>
            <span style="color:Green">+<?php echo number_format($s['Credit'],2);?></span>
            <?php } else { ?>
            <span style="color:red">-<?php echo number_format($s['Debit'],2);?></span>
            <?php } ?>
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> 