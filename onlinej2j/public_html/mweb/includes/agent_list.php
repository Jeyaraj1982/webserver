<?php
    $summary = $mysql->select("select * from `_tbl_member` where `MapedTo`='".$_SESSION['User']['MemberID']."' order by MemberName");
?>
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>My Agents</h3>
<?php if ($_SESSION['User']['IsDistributor']=="1") { ?>
<table class="table table-striped ">
    <tr>
        <td>Agent Names</td>
    </tr>
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;">
            <span style="color:#222"><?php echo strtoupper($s['MemberName']);?></span><Br> 
            <?php echo $s['MobileNumber'];?><Br> 
            <?php echo $s['CreatedOn'];?><Br> 
            
            Balance: Rs. <?php echo number_format($application->getBalance($s['MemberID']),2);  ?><br>
            <?php if ($s['IsActive']=="1") {
                  echo "<span style='color:orange'>Active</span><br>";
                  ?>
                   <br> 
            <a href="dashboard.php?action=agents_refill&agent=<?php echo $s['MemberID'];?>" class="btn btn-success  glow position-relative" style="width: 100px !important;">Refill</a>
                  <?php
            } ?>
            <?php if ($s['IsActive']=="0") {
                  echo "<span style='color:#aaa'>Deactived</span><br>";
            } ?>
            
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> 
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>
<?php } ?>
