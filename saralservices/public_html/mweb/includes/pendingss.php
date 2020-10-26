
 <div class="row" style="margin-top:20px;margin-bottom:20px;">
    <div class="col-4" style="text-align: center;">
          <button type="button" class="btn btn-black btn-sm" onclick="location.href='dashboard.php';" style="background:#6c757d !important;">Back</button>
    </div>
    <div class="col-8"><h3 style="text-align: center;">Transaction Summary</h3></div>
    
</div>

<?php
    $summary = $mysql->select("select * from _tbl_transactions where MemberID='".$_SESSION['User']['MemberID']."' and TxnStatus='accepted' order by txnid desc ");
    
    if (sizeof($summary)==0) {
        echo "<div style='text-align:center;padding:50px;'>No transactions found</div>";
    } else {
    ?> 
<table class="table table-striped ">
  <tr>
        <td  colspan="2" style="height:5px;">&nbsp;</td>
    </tr>
    
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;border-top:#ccc;padding-left:15px;padding-right:15px;padding-bottom:10px !important;padding-top:10px !important;color:#333">
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
    <tr>
        <td  colspan="2" style="height:5px;">&nbsp;</td>
    </tr>
    
</table> 
<?php  } ?>


<style>
.card-body {padding:0px;}
</style>

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
  
}  
    </style>