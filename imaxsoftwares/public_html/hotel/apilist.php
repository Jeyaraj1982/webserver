<?php
  include_once("apiconfig.php");
 
?>
<table border="1" cellpadding="3" cellspacing="0" style="width: 100%;font-family:arial;font-size:12px;color:#333;">
    <tr style="font-weight:bold;">
        <td>apid</td>
        <td>Shop ID</td>
        <td>shopconstantkey</td>
        <td>Bill Number</td>
        <td>Bill Date</td>
        <td>Customer Name</td>
        <td>Mobile Number</td>
        <td>Bill Amount</td>
        <td>Credit Points</td>
        <td>Debit Points</td>
        <td>Available Points</td>
        <td>Requested</td>
    </tr>
    <?php
    $data = $mysql->select("select * from api order by apiid desc");
        foreach($data as $d) {
            ?>
                <tr>
        <td><?php echo $d['apiid'];?></td>
        <td><?php echo $d['shopid'];?></td>
        <td><?php echo $d['shopconstantkey'];?></td>
        <td><?php echo $d['billnumber'];?></td>
        <td><?php echo $d['billdate'];?></td>
        <td><?php echo $d['customername'];?></td>
        <td><?php echo $d['mobilenumber'];?></td>
        <td style="text-align: right"><?php echo number_format($d['billamount'],2);?></td>
        <td style="text-align: right"><?php echo $d['poinstoadd'];?></td>
        <td style="text-align: right"> <?php echo $d['pointstodebit'];?></td>
        <td style="text-align: right"><?php echo $d['availablepoints'];?></td>
        <td><?php echo $d['requestedon'];?></td>
        
    </tr>
            <?php
        }
    ?>
</table>
