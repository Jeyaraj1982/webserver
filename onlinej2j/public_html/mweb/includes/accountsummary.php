<?php $acsummarypage="acDatewise";?>
<h3 style="text-align: center;padding:10px;">Account Summary</h3>
<div class="form-group" style="text-align: center;">
   <div class="btn-group">
   <?php if($acsummarypage=="acDatewise"){ ?>
        <a href="dashboard.php?action=accountsummary" class="btn btn-success btn-sm" >Datewise</a>
        <a href="dashboard.php?action=accountsummarybynumber" class="btn btn-outline btn-sm">Search Summary</a>
   <?php } if($acsummarypage=="acNumberwise") { ?>
         <a href="dashboard.php?action=accountsummary" class="btn btn-outline btn-sm" >Datewise</a>
        <a href="dashboard.php?action=accountsummarybynumber" class="btn btn-success btn-sm">Search Summary</a>
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
        <button type="submit" name="viewTransaction" class="btn btn-success  glow w-100 position-relative" style="margin-bottom:15px">View Transactions</button>
        <button type="button" onclick="location.href='dashboard.php'" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></button>
    </div>
    </form>
</div>
</div>
<?php     
    $fromDate = isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");
    $toDate = isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");
    $summary = $mysql->select("select * from _tbl_accounts where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and MemberID='".$_SESSION['User']['MemberID']."' order by AccountID desc");
?>
<table class="table table-striped ">
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;">
            <?php echo $s['TxnDate'];?><Br>
            <?php echo $s['Particulars'];?>
            <div style="text-align:left;">
            <?php if ($s['Credit']>0) {?>
            <span style="color:Green">+<?php echo number_format($s['Credit'],2);?></span>
            <?php } else { ?>
            <span style="color:red">-<?php echo number_format($s['Debit'],2);?></span>
            <?php } ?>
            <br>
            <span style="color:#888"><?php echo number_format($s['Balance'],2);?></span>
            </div>
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> 


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