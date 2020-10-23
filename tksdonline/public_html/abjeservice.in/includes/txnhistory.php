<?php $txnpage="Datewise";?>
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>Transaction Report</h3>
<div class="form-group" style="text-align: center;">
   <div class="btn-group">
   <?php if($txnpage=="Datewise"){ ?>
        <a href="dashboard.php?action=txnhistory" class="btn btn-success btn-sm" >Datewise</a>
        <a href="dashboard.php?action=txnhistorybynumber" class="btn btn-outline btn-sm">Search Txn</a>
   <?php } if($txnpage=="Numberwise") { ?>
         <a href="dashboard.php?action=txnhistory" class="btn btn-outline btn-sm" >Datewise</a>
        <a href="dashboard.php?action=txnhistorybynumber" class="btn btn-success btn-sm">Search Txn</a>
   <?php } ?>
</div>
</div>
<div class="row" >
    <div class="col-12">
    <form action="" method="post">
    <div class="form-group">
        <div class="input-group">
            <input type="date"  data-date="" data-date-format="YYYY MMMM  DD"  class="form-control" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
            <div class="input-group-append" onclick="OpenCalndr('1')">
                <span class="input-group-text">
                    <i class="fa fa-calendar-check"></i>
                </span>
            </div>
        </div>  
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="date"  data-date="" data-date-format="YYYY MMMM DD"  class="form-control" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
            <div class="input-group-append" onclick="OpenCalndr('2')">
                <span class="input-group-text">
                    <i class="fa fa-calendar-check"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" name="viewTransaction" class="btn btn-success  glow w-100 position-relative">View Transactions</button>
    </div>
    </form>
</div>
</div>
<?php     
    $fromDate = isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");
    $toDate = isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");
        if (isset($_GET['operator'])) {
            $opt = $mysql->select("select * from _tbl_operators where `OperatorCode`='".$_GET['operator']."' ");
        $summary = $mysql->select("select * from `_tbl_transactions` where `operatorcode`='".$_GET['operator']."' and (date(txndate)>=date('".$fromDate."') and date(txndate)<=date('".$toDate."') ) and `MemberID`='".$_SESSION['User']['MemberID']."' order by txnid desc");
        $optttitle= $opt[0]['OperatorTypeCode']." <span style='color:green'>(".$opt[0]['OperatorName'].")</span><br>";
    } else {   
        $summary = $mysql->select("select * from _tbl_transactions where (date(txndate)>=date('".$fromDate."') and date(txndate)<=date('".$toDate."') ) and MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc");
        $optttitle = "";
    }
?>
<table class="table table-striped ">
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;padding:5px !important">
            <?php echo $s['txndate'];?><Br> 
            <?php echo $s['rcnumber'];?> (<?php echo $s['operatorcode'];?>)<br>
            Rs. <?php echo $s['rcamount'];?><br>
            <?php if ($s['TxnStatus']=="reversed") {
                  echo "<span style='color:orange'>".strtoupper($s['TxnStatus'])."</span><br>";
                  echo "<span style='color:#888'>".strtoupper($s['msg'])."</span><br>";
                  echo "<span style='color:#888'>".$s['revDate']."</span>";
            } ?>
            <?php if ($s['TxnStatus']=="success") {
                  echo "<span style='color:green'>".strtoupper($s['TxnStatus'])."</span><br>";
                  echo "<span style='color:#888'>".$s['OperatorNumber']."</span><div style='padding-top:5px;padding-bottom:5px;'>";
                  if ($s['CustomerBillGenerated']==1) {
                    echo "<a href='print.php?print=".md5($s['txnid'].'mmm_j2j')."' target='_new' style='color:#ccc;background:orange;color:#fff;padding:5px 10px;border:1px solid #ccc;border-radius:5px'>Print Bill</a></div>";
                  } else {
                      echo "<a href='dashboard.php?action=GenerateBill&txn=".md5($s['txnid'].'mmm_j2j')."' style='color:#ccc;background:orange;color:#fff;padding:5px 10px;border:1px solid #ccc;border-radius:5px'>Generate & Print Bill</a></div>";
                  }
            } ?>
             <?php if ($s['TxnStatus']=="failure") {
                  echo "<span style='color:red'>".strtoupper($s['TxnStatus'])."</span><br>";
                  echo "<span style='color:#888'>".strtoupper($s['msg'])."</span><br>";
                  
            } ?>
             <?php if ($s['TxnStatus']=="pending") {
                  echo "<span style='color:blue'>".strtoupper($s['TxnStatus'])."</span><br>";
            } ?>
              <?php if ($s['TxnStatus']=="requested") {
                  echo "<span style='color:purple'>".strtoupper($s['TxnStatus'])."</span><br>";
            } ?>
             <?php if ($s['TxnStatus']=="accepted") {
                  echo "<span style='color:purple'>".strtoupper($s['TxnStatus'])."</span><br>";
            } ?>  
            <?php if($s['operatorcode']=="UTNP"){ ?>
            <br><a href="javascript:openTxnTnPolicViewDialog('<?php echo $s['txnid'];?>')" class="btn btn-warning btn-sm" style="padding: 1px 7px;">View</a>
            <?php } ?>
            </td>
            <td style="text-align:center;padding-right:0px;font-size:10px;padding-left:0px;">
            
            <?php if ($s['IsCreditSale']=="0") {
                if (!($s['TxnStatus']=="failure" || $s['TxnStatus']=="reversed")) {
                    //if ($s['IsCreditSale']=="0")  {            ?>
            <a href="dashboard.php?action=creditsales_addtxnt&back=txnhistory&txn=<?php echo $s['txnid'];?>" ><i id="icon-arrow" class="bx bxs-pin"></i><br>credit<br>sale</a>
            <?php    
                }
                ?>
            
            <?php } ?>
            
            <?php if ($s['IsCreditSale']=="1") {
                $payable = $mysql->select("select * from _tbl_user_credits where MemberID='".$_SESSION['User']['MemberID']."' and CreditID='".$s['Credit_noteid']."'");
                ?>
                Rs. <?php echo number_format($payable[0]['PayableAmount'],2);?>
                <br>
                <a href="dashboard.php?action=creditsales_txnlist&back=txnhistory&txn=<?php echo $s['Credit_noteid'];?>">View Txn</a>
            <?php } ?>
            
            <?php if ($s['IsCreditSale']=="2") {?>
                Cleared<br>
                <a href="dashboard.php?action=creditsales_txnlist&back=txnhistory&txn=<?php echo $s['Credit_noteid'];?>">View Txn</a>
            <?php } ?>
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> 
<script>
function openTxnTnPolicViewDialog(txnid) {
       $('#txnData').html("Loading ...."); 
         $('#viewRxn').modal("show");
        $.ajax({url:'webservice.php?action=getTNPolic&txn='+txnid,success:function(data){
                 
                  var obj = JSON.parse(data); 
              var txt = '<div style="padding:10px;"><h5 class="modal-title" style="text-align: center;width:100%">Transaction Details</h5> <br>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<input type="text" value="'+obj.DocumentType+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<input type="text" value="'+obj.DocumentNumber+'" class="form-control" disabled="disabled">'
                 +'</div>'  ;
                 if (obj.ChassisNumber.trim().length!=0) {
                 txt +='<div class="form-group" style="text-align:left">'
                    +'<label>Chassis Number</label>'
                    +'<input type="text" value="'+obj.ChassisNumber+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 }
                 txt +='<div class="form-group" style="text-align:left">'
                    +'<label>Vehicle Owner Name</label>'
                    +'<input type="text" value="'+obj.VehicleOwnerName+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Amount</label>'
                    +'<input type="text" value="'+obj.Amount+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Customer Mobile Number</label>'
                    +'<input type="text" value="'+obj.CustomerMobileNumber+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                 +'</div></div>';  
               $('#txnData').html(txt);
              
        }});
                                              
      
}
</script>
<div class="modal fade" id="viewRxn" tabindex="-1" role="dialog" aria-labelledby="viewRxn" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="txnData">
       
       
    </div>                          
  </div>
</div>
<script>

$(document).ready(function() {     
     $('#From').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});
function OpenCalndr(t) {
         if (t=='1') {
             $( "#From" ).trigger( "click" );
         }
         if (t=='2') {
             $( "#To" ).trigger( "click" );
         }
         
     }
</script>