
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>Transaction Summary</h3>

<div class="row" style="margin-bottom:0px">
        <div class="col-md-12">
            <div class="card" style="border-radius:0px;margin-bottom:0px;padding:0px">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row" style="padding:15px;">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="date"  data-date="" data-date-format="YYYY MMMM  DD"  class="form-control" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                        <div class="input-group-append" onclick="OpenCalndr('1')">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="date"  data-date="" data-date-format="YYYY MMMM DD"  class="form-control" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append" onclick="OpenCalndr('2')">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-12" style="margin-top:10px;">
                                     <button type="button" class="btn btn-black  btn-sm" onclick="location.href='dashboard.php';" style="background:#6c757d !important;width: 48%;">Back</button>
                                    <button type="submit" name="viewTransaction" class="btn btn-danger btn-sm" style="width: 48%;float:right">View Transactions</button>
                                </div>
                                <!--<div class="col-12" style="margin-top:10px;text-align:center">
                                     <a href="dashboard.php?action=txnhistory_num">Search Transactions</a>
                                </div>       -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 <?php
               $fdate = isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");
       $tdate = isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");
        ?> 
        <?php
        if (isset($_GET['operator'])) {
            $opt = $mysql->select("select * from _tbl_operators where `OperatorCode`='".$_GET['operator']."' ");
        $summary = $mysql->select("select * from `_tbl_transactions` where `operatorcode`='".$_GET['operator']."' and `MemberID`='".$_SESSION['User']['MemberID']."' order by txnid desc");
        $optttitle= $opt[0]['OperatorTypeCode']." <span style='color:green'>(".$opt[0]['OperatorName'].")</span><br>";
    } else {  
        $summary = $mysql->select("select * from `_tbl_transactions` where ".$sql." (date(txndate)>=date('".$fdate."') and date(txndate)<=date('".$tdate."') ) and  `MemberID`='".$_SESSION['User']['MemberID']."' order by txnid desc");
        $optttitle = "";
    }
?>     
<?php
         if (sizeof($summary)==0) {
        echo "<div style='text-align:center;padding:50px;'>No records found</div>";
    } else {
    ?> 
<table class="table table-striped ">
  <tr>
        <td  colspan="2" style="height:5px;">&nbsp;</td>
    </tr>
    
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;border-top:#ccc;padding-left:15px;padding-right:15px;padding-bottom:10px !important;padding-top:10px !important;color:#333">
            <?php echo $s['txndate'];?><Br> 
            <?php echo $s['rcnumber'];?> (<?php echo $s['operatorcode'];?>)<br>
            Rs. <?php echo $s['rcamount'];?><br>
            <?php if ($s['TxnStatus']=="reversed") {
                  echo "<span style='color:orange'>".strtoupper($s['TxnStatus'])."</span><br>";
                  echo "<span style='color:#888'>".$s['revDate']."</span>";
            } ?>
            <?php if ($s['TxnStatus']=="success") {
                  echo "<span style='color:green'>".strtoupper($s['TxnStatus'])."</span><br>";
                  echo "<span>".$s['OperatorNumber']."</span><div style='padding-top:5px;padding-bottom:5px;'>";
                  if ($s['CustomerBillGenerated']==1) {
                    echo "<a href='print.php?print=".md5($s['txnid'].'mmm_j2j')."' target='_new' style='color:#ccc;background:orange;color:#fff;padding:5px 10px;border:1px solid #ccc;border-radius:5px'>Print Bill</a></div>";
                  } else {
                      echo "<a href='dashboard.php?action=GenerateBill&txn=".md5($s['txnid'].'mmm_j2j')."' style='color:#ccc;background:orange;color:#fff;padding:5px 10px;border:1px solid #ccc;border-radius:5px'>Generate & Print Bill</a></div>";
                  }
            } ?>
             <?php if ($s['TxnStatus']=="failure") {
                  echo "<span style='color:red'>".strtoupper($s['TxnStatus'])."</span><br>";
                 // echo "<span style='color:#888'>".strtoupper($s['msg'])."</span><br>";
                  
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
    <tr>
        <td  colspan="2" style="height:5px;">&nbsp;</td>
    </tr>
    
</table> 
<?php } ?>


<style>
.card-body {padding:0px;}
</style>
 <script>
   // $('#From').datetimepicker({
     //       format: 'YYYY-MM-DD'
       // });
       // $('#To').datetimepicker({
       //     format: 'YYYY-MM-DD'
        //});
     
     function OpenCalndr(t) {
         if (t=='1') {
             $( "#From" ).trigger( "click" );
         }
         if (t=='2') {
             $( "#To" ).trigger( "click" );
         }
         
     }
    </script>
    <style>
    .card {
        background:none !important;
    }
     .datepicker {
         margin:0px auto;
     }
     .card-body{padding:0px !important;}
      
.datepicker,
.table-condensed td {
  text-align:center;
  padding:8px 12px;
  
}    /*
.prev {
    background:#ccc;
}
.next {
    background:#ccc;
}
         */
    </style>