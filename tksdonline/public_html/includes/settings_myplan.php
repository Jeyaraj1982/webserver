<?php
    $types= $mysql->select("select * from _tbl_operator_types");
?>
<h3 style="text-align: center;padding:10px;">My Plans</h3>
<table class="table table-striped ">
<?php foreach($types as $t) {?>
     <tr>
        <td style="background:Green;color:#fff;padding-left:2px"><?php echo $t['OperatorTypeName'];?></td>
        <td style="background:Green;color:#fff;text-align:right;width:150px">Cashback<br>(%)</td>
        <td style="background:Green;color:#fff;text-align:right;padding-right:2px;width:150px">Charge<br>(RS)</td>
     </tr>
     <?php $operators = $mysql->select("select * from _tbl_operators where OperatorType='".$t['OperatorTypeID']."'"); ?>
     <?php foreach($operators as $o) {
      $t = $mysql->select("select * from _tbl_member_operator where MemberID='".$_SESSION['User']['MemberID']."' and OperatorCode='".$o['OperatorCode']."'");
      ?>
     <tr>
        <td style="padding-left:2px"><?php echo $o['OperatorName'];?> 
        <?php echo sizeof($t)>0 ? "<span style='color:red'> Disabled  </span>" : ""; ?>
        </td>
        <td style="text-align:right"><?php echo $o['IsCashback'];?></td>
        <td style="text-align:right;padding-right:2px;">Mini:<?php echo $o['IsChargeable'];?><br>Max: 0.5%</td>
     </tr>
     <?php } ?>
<?php } ?>
</table> 
<a href="dashboard.php" class="btn btn-success glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: left;"></i></a><br><br>

                         