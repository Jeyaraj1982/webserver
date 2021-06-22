<?php 
if (isset($_GET['htxn'])) {
    $mysql->execute("update _tbl_admin_credits set `IsShow`='0' where CreditID='".$_GET['htxn']."'");
    $txn = $mysql->select("select * from _tbl_admin_credits where CreditID='".$_GET['htxn']."'");
    
    $member = $mysql->select("select * from _tbl_member where MemberID='".$txn[0]['MemberID']."'");
    
    if (isset($member[0]['TelegramID']) && $member[0]['TelegramID']>0) {
        $txn_amount = $mysql->select("select sum(Amount) as PayableAmount from _tbl_admin_credits where `IsShow`='1' and MemberID='".$txn[0]['MemberID']."'");
        $message = "Dear ".$member[0]['MemberName'].",  We recevied   Rs. ".$txn[0]['Amount'].".";
        if (isset($txn_amount[0]['Payableamount']) && $txn_amount[0]['Payableamount']>0){
            $message .= " Your total outstanding is Rs. ".$txn_amount[0]['Payableamount'];
        } else {
            $message .= " Your outstanding amount is Nill";
        }
        TelegramMessageController::sendSMS($member[0]['TelegramID'],$message,0,0);
    }
}
$summary = $mysql->select("select * from `_tbl_admin_credits` where `AdminID`='".$_SESSION['User']['AdminID']."' and `IsShow`='1' order by CreditID desc");
    $totalcredits = $mysql->select("select sum(Amount) as Amt from `_tbl_admin_credits` where `AdminID`='".$_SESSION['User']['AdminID']."'  and `IsPaid`='0'  order by AdminID desc");
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/CreditSales">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/CreditSales">Credit Sales</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Credit Sales</h4>
                </div>                            
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><b>Nick Name</b></th>
                                    <th><b>Credit Updated On</b></th>
                                    <th><b>Summary</b></th>
                                    <th><b>Txn Amount</b></th>
                                    <th><b>Credit Amount</b></th>
                                    <th><b>Payable Amount</b></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($summary as $s){ ?>
                                <tr>
                                    <td><?php echo $s['NickName'];?></td>
                                    <td><?php echo $s['CreditUpdated'];?></td>
                                    <td><?php echo $s['summary'];?></td>
                                    <td><?php echo $s['TxnAmount'];?></td>
                                    <td><?php echo number_format($s['Amount'],2);?></td>
                                    <td><?php echo number_format($s['PayableAmount'],2);?></td>
                                    <td>
                                        <?php  
                                             if ($s['PayableAmount']>0) {
                                             $tmp = $mysql->select("select * from _tbl_admin_credit_txn where CreditID='".$s['CreditID']."' order by CreditTxnID desc ");
                                             if (sizeof($tmp)>0) {
                                        ?>
                                                <div onclick="viewCreditTransaction('<?php echo $s['CreditID'];?>');" style="font-size:13px;cursor:pointer">
                                                Last paid <?php echo $s['PaidOn'];?> Rs. <?php echo number_format($tmp[0]['PaidAmount'],2);?>
                                                </div>
                                                <?php } ?>
                                        <a href="dashboard.php?action=Wallets/Credit_Sales_Paynow&paynow=<?php echo $s['CreditID'];?>" class="btn btn-success  glow position-relative" style="width: 120px !important;">Paynow</a><br>
                                        <a href="javascript:void(0)" onclick="viewCreditTransaction('<?php echo $s['CreditID'];?>');"><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>&nbsp;View</a>
                                         <?php
                                            } else {
                                                ?>
                                                <span style="color:Green;">Cleared</span><br>
                                                <a href="javascript:void(0)" onclick="viewCreditTransaction('<?php echo $s['CreditID'];?>');"><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>&nbsp;View</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="javascript:void(0)" onclick="deleteCreditTrasnaction('<?php echo $s['CreditID'];?>');"><i id="icon-arrow" class="bx bx-trash"></i>&nbsp;Delete</a>
                                                <?php
                                            }
                                        ?> 
                                    </td>
                                </tr>
                                <?php }?>  
                                <?php if(sizeof($summary)=="0"){?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">No Datas Found</td>
                                </tr>
                         <?php }?>  
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  /*  $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });          */
    
</script> 
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
    location.href='dashboard.php?action=Wallets/CreditSales_txnlist&txn='+id;
}
function deleteCreditTrasnaction(id) {
    var txt ='<br>Are you want to delete?<br>'
             +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success  glow position-relative" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<a href="dashboard.php?action=Wallets/CreditSales&htxn='+id+'" class="btn btn-success  glow position-relative">Yes</a>'
                 +'</div>';   
    $('#xconfrimation_text').html(txt);
    $('#ConfirmationDeletPopup').modal("show");
    return false;
}
</script>