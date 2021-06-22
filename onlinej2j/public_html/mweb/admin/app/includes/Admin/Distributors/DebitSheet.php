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
         $Requests  = $mysql->select("SELECT * FROM _tbl_member  where `MemberID`='".$_GET['Distributor']."' " );
     ?>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Debit Sheet</div>
                    <p>Distributor : <?php echo $Requests[0]['MemberName'];?></p>
                </div>
            <div class="card-body">

<table class="table table-striped">
  
    <?php
    
    $summary = $mysql->select("select * from `_tbl_accounts` where `MemberID`='".$_GET['Distributor']."' and Voucher='-1' order by AccountID desc");
    foreach($summary as $s) {
          if ($s['Credit']>0) { } else {
                  ?>
        <tr>
            <td style="font-size:12px;">
            <?php echo $s['TxnDate'];?><Br>
            <?php echo $s['Particulars'];?>
            <div style="text-align:right;">
           
           
              
            <span style="color:red">-<?php echo number_format((isset($s['Debit']) ? $s['Debit'] : 0) ,2);?></span>
          
            <br>
            <span style="color:#888"><?php echo number_format($s['Balance'],2);?></span>
            </div>
            </td>
        </tr>
        <?php
    }
    }
    ?>
    
</table>  


</div>
        </div>
        </div>
        </div>
        