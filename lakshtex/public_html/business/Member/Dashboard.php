<?php

include_once("header.php");
if (! (isset($_SESSION['User']['MemberID']))) {
        ?>
        <script>
        location.href='../index.php';
        </script>
        <?php
    }

include_once("LeftMenu.php"); 

if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<br><br>
<div class="main-panel full-height">
            <div class="container"  style="margin-top: 30px;">
                <div class="page-inner">
                    <div class="row row-card-no-pd">  
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chart-pie text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Withdrawable Balance</p>
                                                <h4 class="card-title">Rs. <?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></h4>
                                                <p><a href="Dashboard.php?action=ViewAccountSummary">view statments</a></p>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chart-pie text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Voucher Balance</p>
                                                <h4 class="card-title"><?php echo number_format(GetUtilityBalance($_SESSION['User']['MemberCode']),2);?></span></h4>
                                                <p><a href="Dashboard.php?action=VoucherHistory">view statments</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                      
                            </div>
                        </div>
                         
                    </div>
                 
                    <div class="row">
                        <div class="col-sm-12">
                         <div class="card card-stats card-round">
                                <div class="card-body">
                                 <div class="col-3">
                                Your Referal Link
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                      <input type="text" id="ReferalLink" class="form-control" value="<?php echo AppUrl;?>/R<?php echo $_SESSION['User']['UID'];?>"> 
                                      <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2" onclick="CopyReferalLink()"><i class="fas fa-copy"></i></span>
                                      </div>
                                    </div>
                                    <span id="ErrReferalLink" style="font-size: 12px;color:green;font-weight:bold"></span>
                                 </div>
                                 <div class="col-12" style="font-size:11px;color:#555">
                                    <?php
                                    $q= $mysql->select("select * from linkhistory where LinkName='".$_SESSION['User']['UID']."'");
                                    if (sizeof($q)>0) {
                                        echo "Your referral link has opened <b>".sizeof($q)."</b> times";
                                    }
                                    ?>
                                 </div>
                                </div>
                                </div>
                        </div>
                         
                    </div>
                  
                     
                    
                    
                     
                    <div>
                       
                    </div>
                </div>

<?php } ?>
<?php include_once("footer.php");?>
<script>
function CopyReferalLink() {
  var copyText = document.getElementById("ReferalLink");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById("ErrReferalLink").innerHTML = "Copied !";
}
</script>