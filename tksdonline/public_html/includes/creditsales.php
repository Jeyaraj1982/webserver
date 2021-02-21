<?php
if (isset($_GET['htxn'])) {
    $mysql->execute("update _tbl_user_credits set IsShow='0' where `MemberID`='".$_SESSION['User']['MemberID']."' and CreditID='".$_GET['htxn']."'");
}
    $summary = $mysql->select("select * from `_tbl_user_credits` where `MemberID`='".$_SESSION['User']['MemberID']."' and `IsShow`='1' order by CreditID desc");
    //$summary = $mysql->select("select * from `_tbl_user_credits` where `MemberID`='".$_SESSION['User']['MemberID']."'  order by CreditID desc");
    //$totalcredits = $mysql->select("select sum(Amount) as Amt from `_tbl_user_credits` where `MemberID`='".$_SESSION['User']['MemberID']."'  and `IsPaid`='0'");
    $totalcredits = $mysql->select("select sum(Amount) as Amt from `_tbl_user_credits` where `MemberID`='".$_SESSION['User']['MemberID']."'  and `PayableAmount`>0");
    
?>
<h3 style="text-align: center;padding:10px;">Credit Sales</h3>
<h6 style="color:#999;text-align:center"><?php echo number_format($totalcredits[0]['Amt'],2);?></h6>
<table class="table table-striped ">
    <tr>
        <td>Customer Details</td>
    </tr>
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;padding: 5px !important;">                
            <span style="color:#222 !important"><?php echo strtoupper($s['NickName']);?></span><Br> 
            <?php echo $s['CreditUpdated'];?><Br>
            <?php echo $s['summary'];?><br>Rs.<?php echo $s['TxnAmount'];?><Br><br>
            
            Credit Amt: Rs. <?php echo number_format($s['Amount'],2);  ?><br>
            Payable Amt: Rs. <?php echo number_format($s['PayableAmount'],2);  ?><br>
            <?php
                if ($s['PayableAmount']>0) {
                    $tmp = $mysql->select("select * from _tbl_credit_txn where CreditID='".$s['CreditID']."' order by CreditTxnID desc ");
                    if (sizeof($tmp)>0) {
                    ?>
                    <br>
                    <div onclick="viewCreditTransaction('<?php echo $s['CreditID'];?>');" style="background:#fcfacc;border-radius:5px;border:1px solid #ccc;font-size:10px;padding:10px;padding-top:5px;padding-bottom:5px;cursor:pointer">
                    Last paid <?php echo $s['PaidOn'];?>
                    <i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;margin-top:5px"></i>
                    
                    <br>
                    Rs. <?php echo number_format($tmp[0]['PaidAmount'],2);?>
                    </div>
                    <?php } ?>
             <br> 
            <a href="dashboard.php?action=credit_sales_paynow&paynow=<?php echo $s['CreditID'];?>" class="btn btn-success  glow position-relative" style="width: 120px !important;">Paynow</a><br>
            <a href="javascript:void(0)" onclick="viewCreditTransaction('<?php echo $s['CreditID'];?>');"><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>&nbsp;View</a>
             <?php
                } else {
                    ?>
                    <br>
                    <span style="color:Green;">Cleared</span><br>
                    <a href="javascript:void(0)" onclick="viewCreditTransaction('<?php echo $s['CreditID'];?>');"><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>&nbsp;View</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="javascript:void(0)" onclick="deleteCreditTrasnaction('<?php echo $s['CreditID'];?>');"><i id="icon-arrow" class="bx bx-trash"></i>&nbsp;Delete</a>
                    <?php
                }
            ?>
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> 
<div class="modal fade" id="ConfirmationDeletPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
function viewCreditTransaction(id) {
    location.href='dashboard.php?action=creditsales_txnlist&txn='+id;
}
function deleteCreditTrasnaction(id) {
    var txt ='<br>Are you want to delete?<br>'
             +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success  glow position-relative" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<a href="dashboard.php?action=creditsales&htxn='+id+'" class="btn btn-success  glow position-relative">Yes</a>'
                 +'</div>';   
    $('#xconfrimation_text').html(txt);
    $('#ConfirmationDeletPopup').modal("show");
    return false;
}
</script>