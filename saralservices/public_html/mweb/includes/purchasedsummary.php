<h3 style="text-align: center;padding:10px;">Purchased Summary</h3>
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
                                        <input type="date"  data-date="" data-date-format="YYYY MMMM  DD"  class="form-control" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append" onclick="OpenCalndr('2')">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-12" style="margin-top:10px;">
                                     <button type="button" class="btn btn-black  btn-sm" onclick="location.href='dashboard.php?action=accounts';" style="background:#6c757d !important;width: 48%;">Back</button>
                                    <button type="submit" name="viewTransaction" class="btn btn-danger btn-sm" style="width: 48%;float:right">View Account Summary</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
     <?php
       $fdate = isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");
       $tdate = isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");
       
    $summary = $mysql->select("select * from `_tbl_accounts` where (date(TxnDate)>=date('".$fdate."') and date(TxnDate)<=date('".$tdate."') ) and `MemberID`='".$_SESSION['User']['MemberID']."' and TxnDoneBy  <>'".$_SESSION['User']['MemberID']."' order by AccountID desc");
    if (sizeof($summary)==0) {
        echo "<div style='text-align:center;padding:50px;'>No records found</div>";
    }  else {
        
        ?>
    
       
<table class="table table-striped">
    <tr>
        <td style="height:5px;">&nbsp;</td>
    </tr>
  <?php
    foreach($summary as $s) {
        ?>
        <tr>
            <td style="font-size:12px;border-top:#ccc;padding-left:15px;padding-right:15px;padding-bottom:10px !important;padding-top:10px !important;color:#333">
            <?php echo $s['TxnDate'];?><Br>
            <?php echo $s['Particulars'];?>
            <div class="row" style="margin-top:5px;">
            <div class="col-3" style="text-align:right;color:#333"><?php echo number_format($s['TxnValue'],2);?></div> 
            <div class="col-3" style="text-align:right;color:Green">+<?php echo number_format($s['Credit'],2);?></div> 
            <div class="col-3" style="text-align:right;color:red">-<?php echo number_format($s['Debit'],2);?></div> 
            <div class="col-3" style="text-align:right;color:#333;font-weight:bold"><?php echo number_format($s['Balance'],2);?></div>
            </div>
            </td>
        </tr>
        <?php
    }
    ?>
     <tr>
        <td style="height:5px;">&nbsp;</td>
    </tr>
</table> 
<?php } ?>
<style>
.card-body {padding:0px;}
</style>
 <script>
   // $('#From').datetimepicker({
    //        format: 'YYYY-MM-DD'
     //   });
     //   $('#To').datetimepicker({
      //      format: 'YYYY-MM-DD'
      //  });
     
     function OpenCalndr(t) {
         if (t=='1') {
             $( "#From" ).trigger( "focus" );
         }
         if (t=='2') {
             $( "#To" ).trigger( "focus" );
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