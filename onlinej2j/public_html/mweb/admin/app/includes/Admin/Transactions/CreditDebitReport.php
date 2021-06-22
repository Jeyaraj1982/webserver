<div style="padding:25px">
    <!--<div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Wallets</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Refill To Member</a></li>
        </ul>
    </div>  -->
        
       <style>
       .btn-light{border:1px solid #ccc !important}
       </style> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   
        <?php
            $formDate = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
    $toDate = $_POST['ty']."-".$_POST['tm']."-".$_POST['td'];
    $sql = " date(acc.TxnDate) >= date('".$formDate."') and date(acc.TxnDate)<= date('".$toDate."') and ";
    
    if ($_POST['Report']=="Credit") {
         $sql .= " (acc.Credit*1)>0 and ";
    } else {
         $sql .= " (acc.Debit*1)>0 and ";
    }
    if ($_POST['MemberCode']==0) {
        $summary = $mysql->select("select acc.*,mem.MemberName from `_tbl_accounts` as acc left join _tbl_member as mem on mem.MemberID=acc.MemberID where ".$sql."   acc.Voucher='-1' order by acc.AccountID desc");
    } else {
        $summary = $mysql->select("select  acc.*,mem.MemberName  from `_tbl_accounts` as acc left join _tbl_member as mem on mem.MemberID=acc.MemberID where  ".$sql." acc.`MemberID`='".$_POST['MemberCode']."' and acc.Voucher='-1' order by acc.AccountID desc");    
        
    }
        ?>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title"><?php echo  ($_POST['Report']=="Credit") ? "Credit" : "Debit"; ?> Sheet</div>
                      <?php echo $formDate ." To ".$toDate;?>
                </div>
            <div class="card-body">
            
        


<table class="table table-striped">
  
    <?php
    foreach($summary as $s) {
          
        ?>
        <tr>
            <td style="font-size:12px;">
            <?php echo $s['TxnDate'];?><Br>
            <?php echo $s['Particulars'];?><br>
            <?php echo $s['MemberName'];?>
            <div style="text-align:right;">
            <?php  if ($_POST['Report']=="Credit") { ?>
            <span style="color:Green">+<?php echo number_format($s['Credit'],2);?></span>
            <?php } else {?>
            <span style="color:Red">-<?php echo number_format($s['Debit'],2);?></span>
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


</div>
        </div>
        </div>
        </div>
        