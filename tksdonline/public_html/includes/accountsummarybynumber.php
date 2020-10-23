<?php $acsummarypage="acNumberwise";?>
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
            <input type="text" class="form-control" name="contactdetails" id="contactdetails" value="<?php echo isset($_POST['contactdetails']) ? $_POST['contactdetails'] : "";?>" placeholder="eg. Number">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon1"><button type="submit" name="viewTransaction" style="border: none;background: none;margin:0px"><i class="fa fa-search"></i></button></span> 
            </div>
        </div>
         <div class="Errorstring"><?php echo $Errcontactdetails;?></div>
    </div>
    </form>
</div>
</div>

<?php   

 if(isset($_POST['viewTransaction'])) { 
    $summary = $mysql->select("select * from `_tbl_accounts` where Particulars like '%".$_POST['contactdetails']."%' and MemberID='".$_SESSION['User']['MemberID']."' order by AccountID desc");           
 }else {
     $summary = $mysql->select("select * from `_tbl_accounts` where MemberID='".$_SESSION['User']['MemberID']."' order by AccountID desc");           
 }
  
        
?>
<table class="table table-striped ">
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;">
            <?php echo $s['TxnDate'];?><Br>
            <?php echo $s['Particulars'];?>
            <div style="text-align:right;">
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