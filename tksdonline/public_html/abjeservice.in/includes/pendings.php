
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>Pending Transaction</h3>


<?php     
    $summary = $mysql->select("select * from _tbl_transactions where memberid='".$_SESSION['User']['MemberID']."' and TxnStatus='requested' order by txnid desc ");
    if (sizeof($summary)==0) {
        echo "<div style='text-align:center;padding:50px;'>No transactions found</div>";
    } else {
?>
<table class="table table-striped ">
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;padding:5px !important">
            Txn ID  : <?php echo $s['txnid'];?><Br>
            Txn Date  : <?php echo $s['txndate'];?><Br>
            Number  : <?php echo $s['rcnumber'];?><Br>
            Operator  : <?php echo $operatorName[$s['operatorcode']];?><Br>
            Amount  : Rs. <?php echo  number_format($s['rcamount'],2);?><br> 
            
            <?php if ($s['TxnStatus']=="failure") {
                  echo "<span style='color:red'>Failure</span><br>";
            } else if ($s['TxnStatus']=="success") {
                  echo "<span style='color:green'>Success</span><br>";
                  echo "<span style='color:#888'>".$s['ApprovedOn']."</span>";
            } else { 
                  echo "<span style='color:blue'>Pending</span><br>";   
                
            }?>
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> 

  <?php } ?>
