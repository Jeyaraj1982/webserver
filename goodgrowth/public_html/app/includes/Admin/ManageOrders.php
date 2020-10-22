<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1"><span>Orders</span></div>
    <Br>
    <?php $loginEntries = $mysql->select("select * from _tb_Orders order by OrderID desc"); 
    
    ?>
    <table class= "listTable" style="width:100%" cellspacing="0">
        <tr style="background:#eee">
            <th style="text-align: center;padding:5px;width:150px">Date</th>
            <th style="text-align: left;width:120px;">Order ID</th>
            <th style="text-align: left;width:120px">Mobile Number</th>
            <th style="text-align: left;">EMailAddress</th>
            <th></th>
        </tr>
        <?php foreach($loginEntries as $entry) {?>
        <tr class="logip">
            <td style="text-align: center;"><?php echo putDateTime($entry['OrderDate']);?></td>
            <td style="text-align: left;"><?php echo $entry['orderCode'];?></td>
            <td style="text-align: left;"><?php echo $entry['MobileNumber'];?></td>
            <td style="text-align: left;"><?php echo $entry['EMailAddress'];?></td>
            <td style="text-align: right;"><a href="../<?php echo $entry['orderCode'].".pdf";?>" >Download</a></td>
        </tr>
        <?php } ?>
    </table>
</div>