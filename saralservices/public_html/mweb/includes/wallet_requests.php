
<h3 style="text-align: center;padding:10px;">Wallet requests</h3>

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
                                <div class="col-12">
                                    <select id="SearchTxn" class="form-control">
                                        <option value="All" <?php echo $_GET['filter']=="All" ? " selected='selected'": "";?>>All</option>
                                        <option value="Pending" <?php echo $_GET['filter']=="Pending" ? " selected='selected'": "";?>>Pending</option>
                                        <option value="Approved" <?php echo $_GET['filter']=="Approved" ? " selected='selected'": "";?>>Approved</option>
                                        <option value="Rejected" <?php echo $_GET['filter']=="Rejected" ? " selected='selected'": "";?>>Rejected</option>
                                    </select> 
                                </div>
                                <div class="col-12" style="margin-top:10px;">
                                     <button type="button" class="btn btn-black  btn-sm" onclick="location.href='dashboard.php?action=wallet';" style="background:#6c757d !important;width: 48%;">Back</button>
                                    <button type="submit" name="viewTransaction" class="btn btn-danger btn-sm" style="width: 48%;float:right">View Requests</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?>
        <?php
               $fdate = isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");
               $tdate = isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");
        ?> 
        <?php
        
            if($_GET['filter']=="All"){
            $summary = $mysql->select("select * from `_tbl_wallet_request` where (date(TxnDate)>=date('".$fdate."') and date(TxnDate)<=date('".$tdate."') ) and  `MemberID`='".$_SESSION['User']['MemberID']."' order by RequestID desc");
        }
        if($_GET['filter']=="Pending"){
            $summary = $mysql->select("select * from `_tbl_wallet_request` where (date(TxnDate)>=date('".$fdate."') and date(TxnDate)<=date('".$tdate."') ) and  `MemberID`='".$_SESSION['User']['MemberID']."' and Status='0' order by RequestID desc");
        }
        if($_GET['filter']=="Approved"){
            $summary = $mysql->select("select * from `_tbl_wallet_request` where (date(TxnDate)>=date('".$fdate."') and date(TxnDate)<=date('".$tdate."') ) and  `MemberID`='".$_SESSION['User']['MemberID']."' and Status='1' order by RequestID desc");
        }
        if($_GET['filter']=="Rejected"){
            $summary = $mysql->select("select * from `_tbl_wallet_request` where (date(TxnDate)>=date('".$fdate."') and date(TxnDate)<=date('".$tdate."') ) and  `MemberID`='".$_SESSION['User']['MemberID']."' and Status='2' order by RequestID desc");
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
            <?php echo $s['TransferTo'];?><Br>
            Rs. <?php echo $s['Amount'];?><br> 
            <?php echo $s['TransferMode'];?><Br> 
            <?php echo $s['Remarks'];?><Br> 
            <?php echo $s['TxnDate'];?><Br> 
            
            <?php if ($s['Status']=="0") {
                  echo "<span style='color:blue'>REQUESTED</span><br>";
                  echo "<span style='color:#888'>".$s['StatusOn']."</span>";
            } ?>
            <?php if ($s['Status']=="1") {
                  echo "<span style='color:green'>Approved</span><br>";
                  echo "<span style='color:#888'>".$s['ApprovedOn']."</span>";
            } ?>
             <?php if ($s['Status']=="2") {
                  echo "<span style='color:red'>Rejected</span><br>";
                  echo "<span style='color:#888'>".$s['RejectedOn']."</span>";                        
                  
            } ?>
            </td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td  colspan="2" style="height:5px;">&nbsp;</td>
    </tr>
    
</table> 
<?php } } else {  ?>
    <div style='text-align:center;padding:50px;'>No records found</div>
<?php } ?>

<style>
.card-body {padding:0px;}
</style>
 <script>
  
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
  
}  
    </style>
    <script>
    $('#SearchTxn').change(function() {
    location.href= location.href+'&filter='+ $(this).val();
});
    </script>