<?php
  include_once("apiconfig.php");
 
?>
<table border="1">
    <tr>
        <td>apid</td>
        <td>shopid</td>
        <td>shopconstantkey</td>
        <td>billnumber</td>
        <td>billdate</td>
        <td>billamount</td>
        <td>mobilenumber</td>
        <td>customername</td>
        <td>pointstoadd</td>
        <td>pointstodebit</td>
        <td>requested</td>
    </tr>
    <?php
    $data = $mysql->select("select * from api");
        foreach($data as $d) {
            ?>
                <tr>
        <td><?php echo $d['apiid'];?></td>
        <td><?php echo $d['shopid'];?></td>
        <td><?php echo $d['shopconstantkey'];?></td>
        <td><?php echo $d['billnumber'];?></td>
        <td><?php echo $d['billdate'];?></td>
        <td><?php echo $d['billamount'];?></td>
        <td><?php echo $d['mobilenumber'];?></td>
        <td><?php echo $d['customername'];?></td>
        <td><?php echo $d['poinstoadd'];?></td>
        <td><?php echo $d['pointstodebit'];?></td>
        <td><?php echo $d['requestedon'];?></td>
        
    </tr>
            <?php
        }
    ?>
</table>
